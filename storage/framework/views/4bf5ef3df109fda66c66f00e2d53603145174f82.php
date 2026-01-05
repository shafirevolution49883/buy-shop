 
<?php $__env->startSection('title','Hot Deals'); ?> 
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/jquery-ui.css')); ?>" />
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(".sort").change(function(){
       $('#loading').show();
       $(".sort-form").submit();
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\resources\views/frontEnd/layouts/pages/offers.blade.php ENDPATH**/ ?>