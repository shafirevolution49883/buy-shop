@extends('frontEnd.layouts.master')
@section('title','Order Status')
@section('content')

<section class="customer-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- ✅ Order Status Message --}}
                @php 
                    $payment = App\Models\Payment::where('order_id',$order->id)->latest()->first();
                @endphp

                <div class="mb-4 text-center">
                    @if($payment && $payment->payment_status == 'paid')
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#d4fc79,#96e6a1);">
                            <h2 class="fw-bold text-dark mb-3">✅ আপনার অর্ডার সফল হয়েছে!</h2>
                            <p class="text-dark text-center mb-0">আমাদের প্রতিনিধি শীঘ্রই আপনার সাথে যোগাযোগ করবে।</p>
                        </div>

                    @elseif($payment && $payment->payment_status == 'cancelled')
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#f8cdda,#f36265);">
                            <h2 class="fw-bold text-white mb-3">❌ আপনার পেমেন্ট ক্যান্সেল হয়েছে</h2>
                            <p class="text-white mb-0 text-center">পেমেন্ট ক্যান্সেল করার কারণে অর্ডার সম্পন্ন হয়নি।</p>
                        </div>

                    @elseif($payment && $payment->payment_status == 'failed')
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#f6d365,#fda085);">
                            <h2 class="fw-bold text-dark mb-3">⚠️ আপনার পেমেন্ট ব্যর্থ হয়েছে</h2>
                            <p class="text-dark mb-0 text-center">আবার চেষ্টা করুন অথবা অন্য পেমেন্ট পদ্ধতি ব্যবহার করুন।</p>
                        </div>

                    @else
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#89f7fe,#66a6ff);">
                            <h2 class="fw-bold text-dark mb-3">⌛ আপনার অর্ডার Pending অবস্থায় আছে</h2>
                            <p class="text-dark mb-0 text-center">আমাদের প্রতিনিধি শীঘ্রই আপনারর সাথে যোগাযগাযরু হবে।</p>
                        </div>
                    @endif
                </div>

                {{-- ✅ Order Details --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Your Order Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered mb-4 text-center">
                            <tr>
                                <td><strong>Invoice ID:</strong> {{$order->invoice_id}}</td>
                                <td><strong>Date:</strong> {{$order->created_at->format('d-m-y')}}</td>
                                <td><strong>Phone:</strong> {{$order->shipping?$order->shipping->phone:''}}</td>
                                <td><strong>Total:</strong> ৳{{$order->amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <strong>Payment Method:</strong> {{ $payment ? ucfirst($payment->payment_method) : 'N/A'}} <br>
                                    <strong>Status:</strong> {{ $payment ? ucfirst($payment->payment_status) : 'N/A'}}
                                </td>
                            </tr>
                        </table>

                        <h6 class="fw-bold">Ordered Products:</h6>
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderdetails as $value)
                                <tr>
                                    <td>{{$value->product_name}}</td>
                                    <td>{{$value->qty}}</td>
                                    <td>৳{{$value->sale_price}}</td>
                                    <td>৳{{$value->sale_price * $value->qty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h6 class="fw-bold">Summary:</h6>
                        <table class="table table-bordered w-50 ms-auto">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>৳{{$order->amount + $order->discount - $order->shipping_charge}}</td>
                                </tr>
                                @if($order->discount)
                                <tr>
                                    <th>Discount</th>
                                    <td>- ৳{{$order->discount}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Shipping</th>
                                    <td>+ ৳{{$order->shipping_charge}}</td>
                                </tr>
                                <tr class="table-primary">
                                    <th>Grand Total</th>
                                    <td><strong>৳{{$order->amount}}</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <h6 class="fw-bold">Billing Address</h6>
                        <p class="mb-0 fw-semibold">{{$order->shipping?$order->shipping->name:''}}</p>
                        <p class="mb-0">{{$order->shipping?$order->shipping->phone:''}}</p>
                        <p class="mb-0">{{$order->shipping?$order->shipping->address:''}}</p>
                        <p>{{$order->shipping?$order->shipping->area:''}}</p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{route('home')}}" class="btn btn-primary">🏠 Home</a>
                    <button onclick="downloadInvoicePDF()" class="btn btn-success"><i class="fa fa-print"></i> Save PDF</button>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ✅ Hidden Invoice Section for PDF Export --}}
<section id="customer-invoice" style="display:none;">
    <div class="invoice-innter" style="width:760px;margin:0 auto;background:#fff;overflow:hidden;padding:30px">
        <h2 style="text-align:center;margin-bottom:20px;">Invoice</h2>
        <p><strong>Invoice ID:</strong> {{$order->invoice_id}}</p>
        <p><strong>Date:</strong> {{$order->created_at->format('d-m-y')}}</p>
        <p><strong>Customer:</strong> {{$order->shipping?$order->shipping->name:''}} | {{$order->shipping?$order->shipping->phone:''}}</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th><th>Qty</th><th>Price</th><th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderdetails as $item)
                <tr>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->sale_price}}</td>
                    <td>{{$item->sale_price * $item->qty}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end">Grand Total: ৳{{$order->amount}}</h4>
    </div>
</section>

@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
function downloadInvoicePDF(){
    let invoiceSection = document.getElementById('customer-invoice');
    invoiceSection.style.display = 'block'; // Show hidden invoice

    let element = document.querySelector("#customer-invoice .invoice-innter");
    html2pdf().from(element).set({
        margin: 1,
        filename: 'invoice-{{$order->invoice_id}}.pdf',
        html2canvas: { scale: 2 },
        jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
    }).save().then(()=>{
        invoiceSection.style.display = 'none'; // Hide again after pdf save
    });
}
</script>
@endpush