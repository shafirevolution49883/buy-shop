<form action="<?php echo e(route('moynapay.payment')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="cus_name" placeholder="Customer Name" required>
    <input type="email" name="cus_email" placeholder="Customer Email" required>
    <input type="number" step="0.01" name="amount" placeholder="Amount" required>
    <button type="submit">Pay with Moyna Pay</button>
</form>
<?php /**PATH /home/filekinb/borbix.incomekori.com/resources/views/moynapay_test.blade.php ENDPATH**/ ?>