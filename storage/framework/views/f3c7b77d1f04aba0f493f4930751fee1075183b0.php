 <?php $__env->startSection('title', 'Home'); ?> <?php $__env->startPush('seo'); ?>
<meta name="app-url" content="" />
<meta name="robots" content="index, follow" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<!-- Open Graph data -->
<meta property="og:title" content="" />
<meta property="og:type" content="website" />
<meta property="og:url" content="" />
<meta property="og:image" content="<?php echo e(asset($generalsetting->white_logo)); ?>" />
<meta property="og:description" content="" />
<?php $__env->stopPush(); ?> <?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.carousel.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.theme.default.min.css')); ?>" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet" />
<?php $__env->stopPush(); ?> <?php $__env->startSection('content'); ?>
<section class="slider-section">
    <div class="container">
        <div class="row">
             
            <div class="col-sm-3 hidetosm">
                <div class="sidebar-menu">
                    <ul class="hideshow">
                        <?php $__currentLoopData = $menucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('category', $category->slug)); ?>">
                                   
                                    <?php echo e($category->name); ?>

                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('subcategory', $subcategory->slug)); ?>">
                                                <?php echo e($subcategory->subcategoryName); ?> <i
                                                    class="fa-solid fa-chevron-right"></i> </a>
                                            <ul class="sidebar-childmenu">
                                                <?php $__currentLoopData = $subcategory->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(route('products', $childcat->slug)); ?>">
                                                            <?php echo e($childcat->childcategoryName); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            
            <div class="col-sm-9">
                <div class="home-slider-container">
                    <div class="main_slider owl-carousel">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="slider-item">
                                <img src="<?php echo e(asset($value->image)); ?>" alt="" />
                            </div>
                            <!-- slider item -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider end -->
<section class="bottoads_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="bottoads_inner">
                    <?php $__currentLoopData = $sliderbottomads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ads_item">
                            <a href="<?php echo e($value->link); ?>">
                                <img src="<?php echo e(asset($value->image)); ?>" alt="" />
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <div class="timer_inner">
                            <div class="">
                                <span class="section-title-name"> Categories </span>
                            </div>
                        </div>
                    </h3>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="category-slider owl-carousel">
                    <?php $__currentLoopData = $menucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cat_item">
                            <div class="cat_img">
                                <a href="<?php echo e(route('category', $value->slug)); ?>">
                                    <img src="<?php echo e(asset($value->image)); ?>" alt="" />
                                </a>
                            </div>
                            <div class="cat_name">
                                <a href="<?php echo e(route('category', $value->slug)); ?>">
                                    <?php echo e($value->name); ?>

                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $hitdealsbaner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <a href="<?php echo e($hotads->link); ?>?sold=show">
                    <img class="img-fluid w-100" src="<?php echo e($hotads->image); ?>"/>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <div class="timer_inner">
                            <div class="">
                                <span class="section-title-name"> Hot Deal </span>
                            </div>

                            <div class="">
                                <div class="offer_timer" id="simple_timer"></div>
                            </div>
                        </div>
                    </h3>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="product_slider owl-carousel">
                    <?php $__currentLoopData = $hotdeal_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                            data-wow-delay="0.<?php echo e($key); ?>s">
                            <div class="product_item_inner">
                                <?php if($value->old_price): ?>
                                <div class="sale-badge">
                                    <div class="sale-badge-inner">
                                        <div class="sale-badge-box">
                                            <span class="sale-badge-text">
                                                <p><?php $discount=(((($value->old_price)-($value->new_price))*100) / ($value->old_price)) ?> <?php echo e(number_format($discount, 0)); ?>%</p>
                                                ছাড়
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="pro_img">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : '')); ?>"
                                            alt="<?php echo e($value->name); ?>" />
                                    </a>
                                </div>
                                <div class="pro_des">
                                    <div class="pro_name">
                                        <a
                                            href="<?php echo e(route('product', $value->slug)); ?>"><?php echo e(Str::limit($value->name, 35)); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $averageRating = $value->reviews->avg('ratting'); 
                                $filledStars = floor($averageRating);
                                $hasHalfStar = $averageRating - $filledStars >= 0.5;
                                $emptyStars = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                            ?>

                            <?php if($averageRating >= 0 && $averageRating <= 5): ?>
                                
                                <?php for($i = 0; $i < $filledStars; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>

                                
                                <?php if($hasHalfStar): ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php endif; ?>

                                
                                <?php for($i = 0; $i < $emptyStars; $i++): ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            <?php else: ?>
                                <span>Invalid rating range</span>
                            <?php endif; ?>

                             <div class="pro_price">
                                <p>
                                    <del>৳ <?php echo e($value->old_price); ?></del>
                                    ৳ <?php echo e($value->new_price); ?> <?php if($value->old_price): ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                            <div class="pro_btn">
                                <div class="cart_btn order_button">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>"
                                        class="addcartbutton">
                                        <span>অর্ডার করুন</span>
                                    </a>
                                </div>
                               
                            </div>
                            <?php else: ?>
                            <div class="pro_btn">
                                <div class="cart_btn order_button">
                                       <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                        <input type="hidden" name="qty" value="1" />
                                        <button type="submit">অর্ডার করুন</button>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $homepageads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <a href="<?php echo e($homeads->link); ?>?sold=show">
                    <img class="img-fluid w-100" src="<?php echo e($homeads->image); ?>"/>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>




<?php $__currentLoopData = $homeproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homecat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="homeproduct">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <span class="section-title-name"><?php echo e($homecat->name); ?></span>
                            <a href="<?php echo e(route('category', $homecat->slug)); ?>" class="view_more_btn">View More</a>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="product_slider owl-carousel">
                        <?php $__currentLoopData = $homecat->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                            data-wow-delay="0.<?php echo e($key); ?>s">
                            <div class="product_item_inner">
                                <?php if($value->old_price): ?>
                                <div class="sale-badge">
                                    <div class="sale-badge-inner">
                                        <div class="sale-badge-box">
                                            <span class="sale-badge-text">
                                                <p><?php $discount=(((($value->old_price)-($value->new_price))*100) / ($value->old_price)) ?> <?php echo e(number_format($discount, 0)); ?>%</p>
                                                ছাড়
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="pro_img">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>">
                                        <img src="<?php echo e(asset($value->image ? $value->image->image : '')); ?>"
                                            alt="<?php echo e($value->name); ?>" />
                                    </a>
                                </div>
                                <div class="pro_des">
                                    <div class="pro_name">
                                        <a
                                            href="<?php echo e(route('product', $value->slug)); ?>"><?php echo e(Str::limit($value->name, 35)); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $averageRating = $value->reviews->avg('ratting'); 
                                $filledStars = floor($averageRating);
                                $hasHalfStar = $averageRating - $filledStars >= 0.5;
                                $emptyStars = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
                            ?>

                            <?php if($averageRating >= 0 && $averageRating <= 5): ?>
                                
                                <?php for($i = 0; $i < $filledStars; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>

                                
                                <?php if($hasHalfStar): ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php endif; ?>

                                
                                <?php for($i = 0; $i < $emptyStars; $i++): ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            <?php else: ?>
                                <span>Invalid rating range</span>
                            <?php endif; ?>

                             <div class="pro_price">
                                <p>
                                    <del>৳ <?php echo e($value->old_price); ?></del>
                                    ৳ <?php echo e($value->new_price); ?> <?php if($value->old_price): ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                            <div class="pro_btn">
                                <div class="cart_btn order_button">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>"
                                        class="addcartbutton">
                                        <span>অর্ডার করুন</span>
                                    </a>
                                </div>
                               
                            </div>
                            <?php else: ?>
                            <div class="pro_btn">
                                <div class="cart_btn order_button">
                                    <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                        <input type="hidden" name="qty" value="1" />
                                        <button type="submit">অর্ডার করুন</button>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<section>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $homepageads2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homeads2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <a href="<?php echo e($homeads2->link); ?>?sold=show">
                    <img class="img-fluid w-100" src="<?php echo e($homeads2->image); ?>"/>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php if($reviews->count()>0): ?>
<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h5 class="text-center text-light py-2" style="background-color:#1d2224">
                        Positive reviews from valued customers
                    </h5>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="customer-review owl-carousel">
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border rounded">
                        <img class="img-fluid w-100" src="<?php echo e(asset($review->image)); ?>" />
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
        </div>
    </div>
</section>
<?php endif; ?>


<section class="footer_top_ads_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="footertop_ads_inner">
                    <?php $__currentLoopData = $footertopads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="footertop_ads_item">
                            <a href="<?php echo e($value->link); ?>">
                                <img src="<?php echo e(asset($value->image)); ?>" alt="" />
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?> <?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontEnd/js/jquery.syotimer.min.js')); ?>"></script>

<script>
    $(document).ready(function() {
        $(".main_slider").owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            nav: true,
            autoplayHoverPause: false,
            margin: 0,
            mouseDrag: true,
            smartSpeed: 8000,
            autoplayTimeout: 3000,
            animateOut: "fadeOutDown",
            animateIn: "slideInDown",

            navText: ["<i class='fa-solid fa-angle-left'></i>",
                "<i class='fa-solid fa-angle-right'></i>"
            ],
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".hotdeals-slider").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                },
            },
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".category-slider").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    nav: true,
                },
                600: {
                    items: 5,
                    nav: false,
                },
                1000: {
                    items: 8,
                    nav: true,
                    loop: false,
                },
            },
        });

        $(".product_slider").owlCarousel({
            margin: 15,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                600: {
                    items: 5,
                    nav: false,
                },
                1000: {
                    items: 5,
                    nav: false,
                },
            },
        });
		$(".customer-review").owlCarousel({
            margin: 8,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 5,
                    nav: false,
                },
            },
        });
    });
</script>

<script>
    $("#simple_timer").syotimer({
        date: new Date(2015, 0, 1),
        layout: "hms",
        doubleNumbers: false,
        effectType: "opacity",

        periodUnit: "d",
        periodic: true,
        periodInterval: 1,
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\resources\views/frontEnd/layouts/pages/index.blade.php ENDPATH**/ ?>