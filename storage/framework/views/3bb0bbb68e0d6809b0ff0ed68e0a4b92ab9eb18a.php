<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <h2 class="mb-4 fw-bold text-center">Site Settings</h2>
    <div class="row">

        <!-- General Setting -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="General" width="40" class="mb-3">
                    <h5 class="card-title">General Setting</h5>
                    <p class="text-muted">Manage your site’s basic configurations.</p>
                    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-primary mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Pixels Setting -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="Pixels" width="40" class="mb-3">
                    <h5 class="card-title">Pixels Setting</h5>
                    <p class="text-muted">Configure tracking pixels for analytics.</p>
                    <a href="<?php echo e(route('pixels.index')); ?>" class="btn btn-success mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="Social Media" width="40" class="mb-3">
                    <h5 class="card-title">Social Media</h5>
                    <p class="text-muted">Manage social media links and settings.</p>
                    <a href="<?php echo e(route('socialmedias.index')); ?>" class="btn btn-info mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="Contact" width="40" class="mb-3">
                    <h5 class="card-title">Contact</h5>
                    <p class="text-muted">Update your contact details and form settings.</p>
                    <a href="<?php echo e(route('contact.index')); ?>" class="btn btn-warning mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Create Page -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="Create Page" width="40" class="mb-3">
                    <h5 class="card-title">Create Page</h5>
                    <p class="text-muted">Create and manage your static pages.</p>
                    <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-secondary mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Shipping Charge -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="Shipping" width="40" class="mb-3">
                    <h5 class="card-title">Shipping Charge</h5>
                    <p class="text-muted">Set and update your shipping charges.</p>
                    <a href="<?php echo e(route('shippingcharges.index')); ?>" class="btn btn-danger mt-auto">Open</a>
                </div>
            </div>
        </div>

        <!-- Order Status -->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body d-flex flex-column justify-content-center">
                    <img src="<?php echo e(asset('public/backEnd/assets/images/menu-icons/setting.png')); ?>" alt="Order Status" width="40" class="mb-3">
                    <h5 class="card-title">Order Status</h5>
                    <p class="text-muted">Manage and customize your order statuses.</p>
                    <a href="<?php echo e(route('orderstatus.index')); ?>" class="btn btn-dark mt-auto">Open</a>
                </div>
            </div>
        </div>

    </div>
</div>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/filekinb/borbix.incomekori.com/resources/views/backEnd/all.blade.php ENDPATH**/ ?>