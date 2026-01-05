<?php $__env->startSection('title','Order Status'); ?>
<?php $__env->startSection('content'); ?>

<section class="customer-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                
                <?php 
                    $payment = App\Models\Payment::where('order_id',$order->id)->latest()->first();
                ?>

                <div class="mb-4 text-center">
                    <?php if($payment && $payment->payment_status == 'paid'): ?>
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#d4fc79,#96e6a1);">
                            <h2 class="fw-bold text-dark mb-3">✅ আপনার অর্ডার সফল হয়েছে!</h2>
                            <p class="text-dark text-center mb-0">আমাদের প্রতিনিধি শীঘ্রই আপনার সাথে যোগাযোগ করবে।</p>
                        </div>

                    <?php elseif($payment && $payment->payment_status == 'cancelled'): ?>
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#f8cdda,#f36265);">
                            <h2 class="fw-bold text-white mb-3">❌ আপনার পেমেন্ট ক্যান্সেল হয়েছে</h2>
                            <p class="text-white mb-0 text-center">পেমেন্ট ক্যান্সেল করার কারণে অর্ডার সম্পন্ন হয়নি।</p>
                        </div>

                    <?php elseif($payment && $payment->payment_status == 'failed'): ?>
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#f6d365,#fda085);">
                            <h2 class="fw-bold text-dark mb-3">⚠️ আপনার পেমেন্ট ব্যর্থ হয়েছে</h2>
                            <p class="text-dark mb-0 text-center">আবার চেষ্টা করুন অথবা অন্য পেমেন্ট পদ্ধতি ব্যবহার করুন।</p>
                        </div>

                    <?php else: ?>
                        <div class="p-5 rounded shadow text-center" style="background: linear-gradient(135deg,#89f7fe,#66a6ff);">
                            <h2 class="fw-bold text-dark mb-3">⌛ আপনার অর্ডার Pending অবস্থায় আছে</h2>
                            <p class="text-dark mb-0 text-center">আমাদের প্রতিনিধি শীঘ্রই আপনারর সাথে যোগাযগাযরু হবে।</p>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Your Order Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered mb-4 text-center">
                            <tr>
                                <td><strong>Invoice ID:</strong> <?php echo e($order->invoice_id); ?></td>
                                <td><strong>Date:</strong> <?php echo e($order->created_at->format('d-m-y')); ?></td>
                                <td><strong>Phone:</strong> <?php echo e($order->shipping?$order->shipping->phone:''); ?></td>
                                <td><strong>Total:</strong> ৳<?php echo e($order->amount); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <strong>Payment Method:</strong> <?php echo e($payment ? ucfirst($payment->payment_method) : 'N/A'); ?> <br>
                                    <strong>Status:</strong> <?php echo e($payment ? ucfirst($payment->payment_status) : 'N/A'); ?>

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
                                <?php $__currentLoopData = $order->orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->product_name); ?></td>
                                    <td><?php echo e($value->qty); ?></td>
                                    <td>৳<?php echo e($value->sale_price); ?></td>
                                    <td>৳<?php echo e($value->sale_price * $value->qty); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <h6 class="fw-bold">Summary:</h6>
                        <table class="table table-bordered w-50 ms-auto">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>৳<?php echo e($order->amount + $order->discount - $order->shipping_charge); ?></td>
                                </tr>
                                <?php if($order->discount): ?>
                                <tr>
                                    <th>Discount</th>
                                    <td>- ৳<?php echo e($order->discount); ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Shipping</th>
                                    <td>+ ৳<?php echo e($order->shipping_charge); ?></td>
                                </tr>
                                <tr class="table-primary">
                                    <th>Grand Total</th>
                                    <td><strong>৳<?php echo e($order->amount); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <h6 class="fw-bold">Billing Address</h6>
                        <p class="mb-0 fw-semibold"><?php echo e($order->shipping?$order->shipping->name:''); ?></p>
                        <p class="mb-0"><?php echo e($order->shipping?$order->shipping->phone:''); ?></p>
                        <p class="mb-0"><?php echo e($order->shipping?$order->shipping->address:''); ?></p>
                        <p><?php echo e($order->shipping?$order->shipping->area:''); ?></p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">🏠 Home</a>
                    <button onclick="downloadInvoicePDF()" class="btn btn-success"><i class="fa fa-print"></i> Save PDF</button>
                </div>

            </div>
        </div>
    </div>
</section>


<section id="customer-invoice" style="display:none;">
    <div class="invoice-innter" style="width:760px;margin:0 auto;background:#fff;overflow:hidden;padding:30px">
        <h2 style="text-align:center;margin-bottom:20px;">Invoice</h2>
        <p><strong>Invoice ID:</strong> <?php echo e($order->invoice_id); ?></p>
        <p><strong>Date:</strong> <?php echo e($order->created_at->format('d-m-y')); ?></p>
        <p><strong>Customer:</strong> <?php echo e($order->shipping?$order->shipping->name:''); ?> | <?php echo e($order->shipping?$order->shipping->phone:''); ?></p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th><th>Qty</th><th>Price</th><th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->product_name); ?></td>
                    <td><?php echo e($item->qty); ?></td>
                    <td><?php echo e($item->sale_price); ?></td>
                    <td><?php echo e($item->sale_price * $item->qty); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <h4 class="text-end">Grand Total: ৳<?php echo e($order->amount); ?></h4>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
function downloadInvoicePDF(){
    let invoiceSection = document.getElementById('customer-invoice');
    invoiceSection.style.display = 'block'; // Show hidden invoice

    let element = document.querySelector("#customer-invoice .invoice-innter");
    html2pdf().from(element).set({
        margin: 1,
        filename: 'invoice-<?php echo e($order->invoice_id); ?>.pdf',
        html2canvas: { scale: 2 },
        jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
    }).save().then(()=>{
        invoiceSection.style.display = 'none'; // Hide again after pdf save
    });
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/filekinb/borbix.incomekori.com/resources/views/frontEnd/layouts/customer/order_success.blade.php ENDPATH**/ ?>