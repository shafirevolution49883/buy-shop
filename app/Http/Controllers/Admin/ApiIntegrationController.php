<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentGateway;
use App\Models\SmsGateway;
use App\Models\Courierapi;
use Toastr;
use DB;

class ApiIntegrationController extends Controller
{
    /**
     * Payment Gateway Manage Page
     */
    public function pay_manage()
    {
        $bkash     = PaymentGateway::where('type', 'bkash')->first();
        $shurjopay = PaymentGateway::where('type', 'shurjopay')->first();
        $moynapay  = PaymentGateway::where('type', 'moynapay')->first();

        return view('backEnd.apiintegration.pay_manage', compact('bkash','shurjopay','moynapay'));
    }

    /**
     * Update or Create Payment Gateway
     */
    public function pay_update(Request $request)
    {
        $gateway = PaymentGateway::find($request->id);

        if(!$gateway){
            // যদি id দিয়ে gateway খুঁজে না পায় → নতুন বানাও
            $gateway = new PaymentGateway();
            $gateway->type = $request->type;
        }

        $input = $request->all();
        $input['status'] = $request->status ? 1 : 0;

        // fill আপডেট
        $gateway->fill($input);
        $gateway->save();

        Toastr::success('Success','Payment Gateway updated successfully');
        return redirect()->back();
    }

    /**
     * SMS Manage
     */
    public function sms_manage()
    {  
        $sms = SmsGateway::first();
        return view('backEnd.apiintegration.sms_manage', compact('sms'));
    }

    public function sms_update(Request $request)
    {
        $update_data = SmsGateway::find($request->id);
        $input = $request->all();
        $input['status'] = $request->status ? 1 : 0;
        $input['order'] = $request->order ? 1 : 0;
        $input['forget_pass'] = $request->forget_pass ? 1 : 0;
        $input['password_g'] = $request->password_g ? 1 : 0;

        $update_data->update($input);

        Toastr::success('Success','SMS data updated successfully');
        return redirect()->back();
    }

    /**
     * Courier Manage
     */
    public function courier_manage()
    {
        $steadfast = Courierapi::where('type', 'steadfast')->first();
        $pathao    = Courierapi::where('type', 'pathao')->first();

        return view('backEnd.apiintegration.courier_manage', compact('steadfast','pathao'));
    }

    public function courier_update(Request $request)
    {
        $update_data = Courierapi::find($request->id);
        $input = $request->all();
        $input['status'] = $request->status ? 1 : 0;
        $update_data->update($input);

        Toastr::success('Success','Courier data updated successfully');
        return redirect()->back();
    }
}