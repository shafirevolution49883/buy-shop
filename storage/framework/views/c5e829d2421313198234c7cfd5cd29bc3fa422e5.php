
<?php $__env->startSection('title','Order Success'); ?>
<?php $__env->startSection('content'); ?>
<section class="customer-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="success-img">
                    <img src="<?php echo e(asset('public/frontEnd/images/order-success.png')); ?>" alt="">
                </div>
                <div class="success-title">
                    <h2>আপনার অর্ডারটি আমাদের কাছে সফলভাবে পৌঁছেছে, কিছুক্ষনের মধ্যে আমাদের একজন প্রতিনিধি আপনার নাম্বারে কল করবেন </h2>
                </div>

                <h5 class="my-3">Your Order Details</h5>
                <div class="success-table">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Invoice ID</p>
                                    <p><strong><?php echo e($order->invoice_id); ?></strong></p>
                                </td>
                                <td>
                                    <p>Date</p>
                                    <p><strong><?php echo e($order->created_at->format('d-m-y')); ?></strong></p>
                                </td>
                                <td>
                                    <p>Phone</p>
                                    <p><strong><?php echo e($order->shipping?$order->shipping->phone:''); ?></strong></p>
                                </td>
                                <td>
                                    <p>Total</p>
                                    <p><strong>৳ <?php echo e($order->amount); ?></strong></p>
                                </td>
                            </tr>
                            <tr>
                                <?php 
                                    
                                    $payments = App\Models\Payment::where('order_id',$order->id)->orderBy('id','desc')->first();
                                
                                ?>
                                <td colspan="4">
                                    <p>Payment Method</p>
                                    <p><strong><?php echo e($payments->payment_method); ?></strong></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- success table -->
                <h5 class="my-4">Pay with cash upon delivery</h5>
                <div class="success-table">
                    <h6 class="mb-3">Order Delivery</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <p><?php echo e($value->product_name); ?> x <?php echo e($value->qty); ?></p>
                                    
                                </td>
                                <td><p><strong>৳ <?php echo e($value->sale_price); ?></strong></p></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th  class="text-end px-4">Net Total</th>
                                <td><strong id="net_total">৳<?php echo e($order->amount + $order->discount- $order->shipping_charge); ?></strong></td>
                            </tr>
                            <?php if($order->discount): ?>
                            <tr>
                                <th  class="text-end px-4">Discount</th>
                                <td><strong id="net_total">৳<?php echo e($order->discount); ?></strong></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th  class="text-end px-4">Shipping Cost</th>
                                <td>
                                    <strong id="cart_shipping_cost">৳<?php echo e($order->shipping_charge); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th  class="text-end px-4">Grand Total</th>
                                <td>
                                    <strong id="grand_total">৳<?php echo e($order->amount); ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="my-4">Billing Address</h5>
                                    <p><?php echo e($order->shipping?$order->shipping->name:''); ?></p>
                                    <p><?php echo e($order->shipping?$order->shipping->phone:''); ?></p>
                                    <p><?php echo e($order->shipping?$order->shipping->address:''); ?></p>
                                    <p><?php echo e($order->shipping?$order->shipping->area:''); ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- success table -->
                <a href="<?php echo e(route('home')); ?>" class=" my-5 btn btn-primary">Go To Home</a>
                <button onclick="showTotalAndDownload()"class="no-print btn btn-xs btn-success waves-effect waves-light"><i class="fa fa-print"></i> Save PDF</button>
            </div>
        </div>
    </div>
</section>
<section id="customer-invoice" class="customer-invoice" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <div class="invoice-innter" style="width:760px;margin: 0 auto;background: #fff;overflow: hidden;padding: 30px;padding-top: 0;">
                    <table style="width:100%">
                        <tr>
                            <td style="width: 40%; float: left; padding-top: 15px;">
                                <img src="<?php echo e(asset($generalsetting->white_logo)); ?>" width="190px" style="margin-top:25px !important" alt="">
                                <p style="font-size: 14px; color: #222; margin: 20px 0;"><strong>Payment Method:</strong> <span style="text-transform: uppercase;"><?php echo e($order->payment?$order->payment->payment_method:''); ?></span></p>
                                <div class="invoice_form">
                                    <p style="font-size:16px;line-height:1.8;color:#222"><strong>Invoice From:</strong></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222"><?php echo e($generalsetting->name); ?></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222"><?php echo e($contact->phone); ?></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222"><?php echo e($contact->email); ?></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222"><?php echo e($contact->address); ?></p>
                                </div>
                            </td>
                            <td  style="width:60%;float: left;">
                                <div class="invoice-bar" style=" background: #4DBC60; transform: skew(38deg); width: 100%; margin-left: 65px; padding: 20px 60px; ">
                                    <p style="font-size: 30px; color: #fff; transform: skew(-38deg); text-transform: uppercase; text-align: right; font-weight: bold;">Invoice</p>
                                </div>
                                <div class="invoice-bar" style="background: #fff; transform: skew(36deg); width: 72%; margin-left: 182px; padding: 12px 32px; margin-top: 6px;">
                                    <p style="font-size: 15px; color: #222;font-weight:bold; transform: skew(-36deg); text-align: right; padding-right: 18px">Invoice ID : <strong>#<?php echo e($order->invoice_id); ?></strong></p>
                                    <p style="font-size: 15px; color: #222;font-weight:bold; transform: skew(-36deg); text-align: right; padding-right: 32px">Invoice Date: <strong><?php echo e($order->created_at->format('d-m-y')); ?></strong></span></p>
                                </div>
                                <div class="invoice_to" style="padding-top: 20px;">
                                    <p style="font-size:16px;line-height:1.8;color:#222;text-align: right;"><strong>Invoice To:</strong></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222;text-align: right;"><?php echo e($order->shipping?$order->shipping->name:''); ?></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222;text-align: right;"><?php echo e($order->shipping?$order->shipping->phone:''); ?></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222;text-align: right;"><?php echo e($order->shipping?$order->shipping->address:''); ?></p>
                                    <p style="font-size:16px;line-height:1.8;color:#222;text-align: right;"><?php echo e($order->shipping?$order->shipping->area:''); ?></p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table class="table" style="margin-top: 30px;margin-bottom: 0;">
                        <thead style="background: #4DBC60; color: #fff;">
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($value->product_name); ?> <br> <?php if($value->product_size): ?> <small>Size: <?php echo e($value->product_size); ?></small> <?php endif; ?>   <?php if($value->product_color): ?> <small>Color: <?php echo e($value->product_color); ?></small> <?php endif; ?> </td>
                                <td>৳<?php echo e($value->sale_price); ?></td>
                                <td><?php echo e($value->qty); ?></td>
                                <td>৳<?php echo e($value->sale_price*$value->qty); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="invoice-bottom">
                        
                        <table class="table" style="width: 300px; float: right;    margin-bottom: 30px;">
                            <tbody style="background:#f1f9f8">
                                <tr>
                                    <td><strong>SubTotal</strong></td>
                                    <td><strong>৳<?php echo e($order->amount + $order->discount- $order->shipping_charge); ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Shipping(+)</strong></td>
                                    <td><strong>৳<?php echo e($order->shipping_charge); ?></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Discount(-)</strong></td>
                                    <td><strong>৳<?php echo e($order->discount); ?></strong></td>
                                </tr>
                                <tr style="background:#4DBC60;color:#fff">
                                    <td><strong>Final Total</strong></td>
                                    <td><strong>৳<?php echo e($order->amount); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="terms-condition" style="overflow: hidden; width: 100%; text-align: center; padding: 20px 0; border-top: 1px solid #ddd;">
                            <h5 style="font-style: italic;"><a href="<?php echo e(route('page',['slug'=>'terms-condition'])); ?>">Terms & Conditions</a></h5>
                            <p style="text-align: center; font-style: italic; font-size: 15px; margin-top: 10px;">* This is a computer generated invoice, does not require any signature.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/frontEnd/')); ?>/js/parsley.min.js"></script>
<script src="<?php echo e(asset('public/frontEnd/')); ?>/js/form-validation.init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
function showTotalAndDownload() {
    // Show the total section
    document.getElementById('customer-invoice').style.display = 'block';
    
    // Download PDF after showing the total section
    var element = document.querySelector('.invoice-innter'); // Select the invoice section to convert to PDF
    html2pdf().from(element).set({
        margin: 1,
        filename: 'invoice.pdf',
        html2canvas: { scale: 2 },
        jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4' }
    }).save();
    
    // Optionally, hide the total section again after saving the PDF
    setTimeout(() => {
        document.getElementById('customer-invoice').style.display = 'none';
    }, 100);
}
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\resources\views/frontEnd/layouts/customer/order_success.blade.php ENDPATH**/ ?>