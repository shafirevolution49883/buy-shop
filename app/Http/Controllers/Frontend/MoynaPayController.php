<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentGateway;
use Toastr;
use Illuminate\Support\Facades\Http;

class MoynaPayController extends Controller
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $gateway = PaymentGateway::where(['status' => 1, 'type' => 'moynapay'])->first();

        if ($gateway) {
            $this->apiKey = $gateway->app_key;
            $this->baseUrl = rtrim($gateway->base_url, '/');
        } else {
            $this->apiKey = '';
            $this->baseUrl = 'https://pay.moynapay.com/api';
        }
    }

    /**
     * Create MoynaPay Payment
     */
    public function create(Request $request)
    {
        $order = Order::where('id', $request->order_id)->firstOrFail();
        $amount = $order->amount;

        $payload = [
            "cus_name"    => $order->customer->name ?? "Guest User",
            "cus_email"   => $order->customer->email ?? "guest@example.com",
            "amount"      => $amount,
            "success_url" => url("moynapay/success?order_id=" . $order->id),
            "cancel_url"  => url("moynapay/cancel?order_id=" . $order->id),
            "webhook_url" => url("moynapay/webhook"),
        ];

        $response = Http::withHeaders([
            'API-KEY' => $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl . '/payment/create', $payload);

        $res = $response->json();

        if (isset($res['status']) && $res['status'] == true) {
            return redirect()->away($res['payment_url']);
        } else {
            Toastr::error("MoynaPay init failed: " . ($res['message'] ?? 'Unknown'));
            return redirect('customer/order-success/' . $order->id);
        }
    }

    /**
     * Success Callback
     */
    public function success(Request $request)
    {
        $transactionId = $request->transactionId;
        $orderId = $request->order_id;

        $verify = Http::withHeaders([
            'API-KEY' => $this->apiKey,
            'Content-Type' => 'application/json'
        ])->post($this->baseUrl . '/payment/verify', [
            "transaction_id" => $transactionId
        ]);

        $res = $verify->json();

        if (!empty($res) && ($res['status'] === "COMPLETED")) {
            $order = Order::find($orderId);
            if ($order) {
                $order->order_status = 1; // accepted
                $order->save();

                $payment = Payment::where('order_id', $orderId)->first();
                if ($payment) {
                    $payment->trx_id = $transactionId;
                    $payment->payment_status = "paid";
                    $payment->save();
                }
            }

            Toastr::success("MoynaPay payment successful", "Success!");
        } else {
            $order = Order::find($orderId);
            if ($order) {
                $order->order_status = 0; // failed
                $order->save();

                $payment = Payment::where('order_id', $orderId)->first();
                if ($payment) {
                    $payment->payment_status = "failed";
                    $payment->save();
                }
            }
            Toastr::error("MoynaPay verification failed", "Failed");
        }

        return redirect('customer/order-success/' . $orderId);
    }

    /**
     * Cancel Callback
     */
    public function cancel(Request $request)
    {
        $orderId = $request->order_id;
        $order = Order::find($orderId);
        if ($order) {
            $order->order_status = 0; // cancelled
            $order->save();

            $payment = Payment::where('order_id', $orderId)->first();
            if ($payment) {
                $payment->payment_status = "cancelled";
                $payment->save();
            }
        }

        Toastr::error("MoynaPay payment cancelled", "Cancelled");
        return redirect('customer/order-success/' . $orderId);
    }

    /**
     * Webhook (IPN)
     */
    public function webhook(Request $request)
    {
        \Log::info("MoynaPay Webhook", $request->all());
        return response()->json(["status" => "ok"]);
    }
}