<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($generalsetting->name); ?></title>
        <!-- App favicon -->
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2355381278153504');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=2355381278153504&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
        <link rel="shortcut icon" href="<?php echo e(asset($generalsetting->favicon)); ?>" alt="Super Ecommerce Favicon" />
        <meta name="author" content="Super Ecommerce" />
        <link rel="canonical" href="" />
        <?php echo $__env->yieldPushContent('seo'); ?> 
        <?php echo $__env->yieldPushContent('css'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/animate.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/all.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.carousel.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.theme.default.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/mobile-menu.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/select2.min.css')); ?>" />
        <!-- toastr css -->
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets/css/toastr.min.css" />

        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/wsit-menu.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/style.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/responsive.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/main.css')); ?>" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <meta name="facebook-domain-verification" content="38f1w8335btoklo88dyfl63ba3st2e" />
        <style>
            .float{
            	position:fixed;
            	color:white;
            	width:60px;
            	height:60px;
            	bottom:40px;
            	left:40px;
            	background-color:#25d366;
            	color:#FFF;
            	border-radius:50px;
            	text-align:center;
                font-size:30px;
            	box-shadow: 2px 2px 3px #999;
                z-index:100;
            }
            
            .my-float{
            	margin-top:16px;
            }
            /* Media query to hide the .float class on screens 768px and smaller */
            @media (max-width: 767px) {
                .float {
                    display: none;
                }
            }
        </style>
        <?php $__currentLoopData = $pixels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pixel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Facebook Pixel Code -->
        <script>
            !(function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = "2.0";
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            })(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
            fbq("init", "<?php echo e($pixel->code); ?>");
            fbq("track", "PageView");
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id=<?php echo e($pixel->code); ?>&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php $__currentLoopData = $gtm_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gtm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Google tag (gtag.js) -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-<?php echo e($gtm->code); ?>');</script>
        <!-- End Google Tag Manager -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </head>
    <body class="gotop">
        <?php $subtotal = Cart::instance('shopping')->subtotal(); ?>
        <div class="mobile-menu">
                <div class="mobile-menu-logo">
                    <div class="logo-image">
                        <img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="" />
                    </div>
                    <div class="mobile-menu-close">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <ul class="first-nav">
                    <?php $__currentLoopData = $menucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="parent-category">
                        <a href="<?php echo e(url('category/'.$scategory->slug)); ?>" class="menu-category-name">
                            <img src="<?php echo e(asset($scategory->image)); ?>" alt="" class="side_cat_img" />
                            <?php echo e($scategory->name); ?>

                        </a>
                        <?php if($scategory->subcategories->count() > 0): ?>
                        <span class="menu-category-toggle">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                        <?php endif; ?>
                        <ul class="second-nav" style="display: none;">
                            <?php $__currentLoopData = $scategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="parent-subcategory">
                                <a href="<?php echo e(url('subcategory/'.$subcategory->slug)); ?>" class="menu-subcategory-name"><?php echo e($subcategory->subcategoryName); ?></a>
                                <?php if($subcategory->childcategories->count() > 0): ?>
                                <span class="menu-subcategory-toggle"><i class="fa fa-chevron-down"></i></span>
                                <?php endif; ?>
                                <ul class="third-nav" style="display: none;">
                                    <?php $__currentLoopData = $subcategory->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="childcategory"><a href="<?php echo e(url('products/'.$childcat->slug)); ?>" class="menu-childcategory-name"><?php echo e($childcat->childcategoryName); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <header id="navbar_top">
		
		
		
		            <div class="top_header" style="background-color:#1d2224">
                    <div class="container d-flex align-items-center">
                        <!-- Hotline button on the left side -->
                        <a href="tel:<?php echo e($contact->hotline); ?>" class="text-center bg-light px-2 d-none d-sm-block fw-bold fs-4" style="color:#1d2224;min-width:270px;">
                            <i class="fa-solid fa-headset"></i> <?php echo e($contact->hotline); ?>

                        </a>
                        
                        <!-- Marquee headline -->
                        <div class="d-flex align-items-center flex-grow-1">
                            <marquee direction="left" scrollamount="5" class="text-light fs-6" >
                                <?php echo e($generalsetting->top_headline); ?>

                            </marquee>
                        </div>
                    </div>
                </div>
				
            <div class="mobile-header sticky">
                <div class="mobile-logo">
                    <div class="menu-bar">
                        <a class="toggle">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                    <div class="menu-logo">
                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="" /></a>
                    </div>
                    <div class="menu-bag">
                        <p class="margin-shopping">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="mobilecart-qty"><?php echo e(Cart::instance('shopping')->count()); ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mobile-search">
                <form action="<?php echo e(route('search')); ?>">
                    <input type="text" placeholder="Search Product ... " value="" class="msearch_keyword msearch_click" name="keyword" />
                    <button><i data-feather="search"></i></button>
                </form>
                <div class="search_result"></div>
            </div>

            <div class="main-header">
                <!-- header to end -->
                <div class="logo-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="logo-header">
                                    <div class="main-logo">
                                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="" /></a>
                                    </div>
                                    <div class="main-search">
                                        <form action="<?php echo e(route('search')); ?>">
                                            <input type="text" placeholder="Search Product..." class="search_keyword search_click" name="keyword" />
                                            <button>
                                                <i data-feather="search"></i>
                                            </button>
                                        </form>
                                        <div class="search_result"></div>
                                    </div>
                                    <div class="header-list-items">
                                        <ul>
                                            <li class="track_btn">
                                                <a href="<?php echo e(route('customer.order_track')); ?>"> <i class="fa fa-truck"></i>Track Order</a>
                                            </li>
                                           

                                            <li class="cart-dialog" id="cart-qty">
                                                <a href="<?php echo e(route('customer.checkout')); ?>">
                                                    <p class="margin-shopping">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                        <span><?php echo e(Cart::instance('shopping')->count()); ?></span>
                                                    </p>
                                                </a>
                                                <div class="cshort-summary">
                                                    <ul>
                                                        <?php $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a href=""><img src="<?php echo e(asset($value->options->image)); ?>" alt="" /></a>
                                                        </li>
                                                        <li><a href=""><?php echo e(Str::limit($value->name, 30)); ?></a></li>
                                                        <li>Qty: <?php echo e($value->qty); ?></li>
                                                        <li>
                                                            <p>৳<?php echo e($value->price); ?></p>
                                                            <button class="remove-cart cart_remove" data-id="<?php echo e($value->rowId); ?>"><i data-feather="x"></i></button>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <p><strong>সর্বমোট : ৳<?php echo e($subtotal); ?></strong></p>
                                                    <a href="<?php echo e(route('customer.checkout')); ?>" class="go_cart"> অর্ডার করুন </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="catagory_menu">
                                    <ul class="heder__category">
                                        <div>
                                            <li class="all__category__list">
                                                <a href="#">ALL CATEGORIES <i class="fa-solid fa-list"></i>
                                                </a>
                                                <?php if(Request::is('/')): ?>
                                                <div></div>
                                                <?php else: ?>
                                                <div class="sidebar-menu side__bar">
                                                    <ul class="hideshow">
                                                        <?php $__currentLoopData = $menucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('category', $category->slug)); ?>">
                                                                    <img src="<?php echo e(asset($category->image)); ?>" alt="" />
                                                                    <?php echo e($category->name); ?>

                                                                    <i class="fa-solid fa-chevron-right"></i>
                                                                </a>
                                                                <ul class="sidebar-submenu side__barsub">
                                                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <a href="<?php echo e(route('subcategory', $subcategory->slug)); ?>">
                                                                                <?php echo e($subcategory->subcategoryName); ?> <i
                                                                                    class="fa-solid fa-chevron-right"></i> </a>
                                                                            <ul class="sidebar-childmenu side__barchild">
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
                                                <?php endif; ?>
                                           </li> 
                                        </div>


                                        <div> <li><a href="<?php echo e(route('home')); ?>">Home</a></li></div>
                                        <div><li><a href="<?php echo e(route('hotdeals')); ?>">Hotdeals</a></li></div>

                                        <div class="contact__menu"><li><a href="<?php echo e(route('contact')); ?>">Contact</a></li></div>
                                       <div class="right__menu__top">
                                            <?php if(Auth::guard('customer')->user()): ?>
                                            <li class="for_order">
                                                <p>
                                                    <a href="<?php echo e(route('customer.account')); ?>">
                                                        <i class="fa-regular fa-user"></i>

                                                        <?php echo e(Str::limit(Auth::guard('customer')->user()->name,14)); ?>

                                                    </a>
                                                </p>
                                            </li>
                                            <?php else: ?>
                                            <li class="for_order">
                                                <p>
                                                    <a href="<?php echo e(route('customer.login')); ?>">
                                                        <i class="fa-regular fa-user"></i>
                                                        Login / Sign Up
                                                    </a>
                                                </p>
                                            </li>
                                            <?php endif; ?>
                                       </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-header end -->
        </header>
        <div id="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
            <!-- content end -->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="footer-about">
                                <a href="<?php echo e(route('home')); ?>">
                                    <img src="<?php echo e(asset($generalsetting->white_logo)); ?>" alt="" />
                                </a>
                                <p><?php echo e($contact->address); ?></p>
                                <a href="tel:<?php echo e($contact->hotline); ?>" class="footer-hotlint"><?php echo e($contact->hotline); ?></a>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-3 mb-3 mb-sm-0 col-6">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Useful Link</a></li>
                                    <li>
                                        <a href="<?php echo e(route('contact')); ?>"> <a href="<?php echo e(route('contact')); ?>">Contact Us</a></a>
                                    </li>
                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('page',['slug'=>$page->slug])); ?>"><?php echo e($page->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-2 mb-3 mb-sm-0 col-6">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Link</a></li>
                                    <?php $__currentLoopData = $pagesright; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('page',['slug'=>$value->slug])); ?>"><?php echo e($value->name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                        <!-- col end -->
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title stay_conn"><a>Stay Connected</a></li>
                                </ul>
                                <ul class="social_link">
                                    <?php $__currentLoopData = $socialicons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="social_list">
                                        <a class="mobile-social-link" href="<?php echo e($value->link); ?>"><i class="<?php echo e($value->icon); ?>"></i></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="d_app">
                                    <h2>Download App</h2>
                                    <a href="">
                                        <img src="<?php echo e(asset('public/frontEnd/images/app-download.png')); ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col end -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="copyright">
                                
								
								
								<p><span style="color: white;">Copyright © <?php echo e(date('Y')); ?> <?php echo e($generalsetting->name); ?>. All rights reserved </span> | <span style="color: white;">Website Designed by: <a href="https://www.creativedesign.com.bd"><span style="color: white;">Creative Design</span></a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="footer_nav">
            <ul>
                <li>
                    <a class="toggle">
                        <span>
                            <i class="fa-solid fa-bars"></i>
                        </span>
                        <span>Category</span>
                    </a>
                </li>

                <li>
                    <a href="https://api.whatsapp.com/send?phone=<?php echo e($contact->whatsapp); ?>&text=Hello">
                        <span>
                            <i class="fa fa-whatsapp"></i>
                        </span>
                        <span>Message</span>
                    </a>
                </li>

                <li class="mobile_home">
                    <a href="<?php echo e(route('home')); ?>">
                        <span><i class="fa-solid fa-home"></i></span> <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('customer.checkout')); ?>">
                        <span>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span>Cart (<b class="mobilecart-qty"><?php echo e(Cart::instance('shopping')->count()); ?></b>)</span>
                    </a>
                </li>
                <?php if(Auth::guard('customer')->user()): ?>
                <li>
                    <a href="<?php echo e(route('customer.account')); ?>">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span>Account</span>
                    </a>
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo e(route('customer.login')); ?>">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span>Login</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        

        <div class="scrolltop" style="">
            <div class="scroll">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>

        
        <a href="https://api.whatsapp.com/send?phone=<?php echo e($contact->whatsapp); ?>&text=Hello" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
        </a>
        <!-- /. fixed sidebar -->

        <div id="custom-modal"></div>
        <div id="page-overlay"></div>
        <div id="loading"><div class="custom-loader"></div></div>

        <script src="<?php echo e(asset('public/frontEnd/js/jquery-3.6.3.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/mobile-menu.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/wsit-menu.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/mobile-menu-init.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/wow.min.js')); ?>"></script>
        <script>
            new WOW().init();
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- feather icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/toastr.min.js"></script>
        <?php echo Toastr::message(); ?> <?php echo $__env->yieldPushContent('script'); ?>
        <script>
            $(".quick_view").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('quickview')); ?>",
                        success: function (data) {
                            if (data) {
                                $("#custom-modal").html(data);
                                $("#custom-modal").show();
                                $("#loading").hide();
                                $("#page-overlay").show();
                            }
                        },
                    });
                }
            });
        </script>
        <!-- quick view end -->
        <!-- cart js start -->
        <script>
            $(".addcartbutton").on("click", function () {
                var id = $(this).data("id");
                var checkout = $(this).data("checkout");
                var qty = 1;
                if (id) {
                    $.ajax({
                        cache: "false",
                        type: "GET",
                        url: "<?php echo e(url('add-to-cart')); ?>/" + id + "/" + qty,
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart successfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
                if(checkout){
                    window.location.href = '<?php echo e(route('customer.checkout')); ?>'; 
                }
            });
            $(".cart_store").on("click", function () {
                var id = $(this).data("id");
                var qty = $(this).parent().find("input").val();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id, qty: qty ? qty : 1 },
                        url: "<?php echo e(route('cart.store')); ?>",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart succfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_remove").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('cart.remove')); ?>",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart() + cart_summary();
                            }
                        },
                    });
                }
            });

            $(".cart_increment").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('cart.increment')); ?>",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_decrement").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('cart.decrement')); ?>",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            function cart_count() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('cart.count')); ?>",
                    success: function (data) {
                        if (data) {
                            $("#cart-qty").html(data);
                        } else {
                            $("#cart-qty").empty();
                        }
                    },
                });
            }
            function mobile_cart() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('mobile.cart.count')); ?>",
                    success: function (data) {
                        if (data) {
                            $(".mobilecart-qty").html(data);
                        } else {
                            $(".mobilecart-qty").empty();
                        }
                    },
                });
            }
            function cart_summary() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('shipping.charge')); ?>",
                    dataType: "html",
                    success: function (response) {
                        $(".cart-summary").html(response);
                    },
                });
            }
        </script>
        <!-- cart js end -->
        <script>
            $(".search_click").on("keyup change", function () {
                var keyword = $(".search_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "<?php echo e(route('livesearch')); ?>",
                    success: function (products) {
                        if (products) {
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
            $(".msearch_click").on("keyup change", function () {
                var keyword = $(".msearch_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "<?php echo e(route('livesearch')); ?>",
                    success: function (products) {
                        if (products) {
                            $("#loading").hide();
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
        </script>
        <!-- search js start -->
        <script></script>
        <script></script>
        <script>
            $(".district").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "<?php echo e(route('districts')); ?>",
                    success: function (res) {
                        if (res) {
                            $(".area").empty();
                            $(".area").append('<option value="">Select..</option>');
                            $.each(res, function (key, value) {
                                $(".area").append('<option value="' + key + '" >' + value + "</option>");
                            });
                        } else {
                            $(".area").empty();
                        }
                    },
                });
            });
        </script>
        <script>
            $(".toggle").on("click", function () {
                $("#page-overlay").show();
                $(".mobile-menu").addClass("active");
            });

            $("#page-overlay").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
                $(".feature-products").removeClass("active");
            });

            $(".mobile-menu-close").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
            });

            $(".mobile-filter-toggle").on("click", function () {
                $("#page-overlay").show();
                $(".feature-products").addClass("active");
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".parent-category").each(function () {
                    const menuCatToggle = $(this).find(".menu-category-toggle");
                    const secondNav = $(this).find(".second-nav");

                    menuCatToggle.on("click", function () {
                        menuCatToggle.toggleClass("active");
                        secondNav.slideToggle("fast");
                        $(this).closest(".parent-category").toggleClass("active");
                    });
                });
                $(".parent-subcategory").each(function () {
                    const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                    const thirdNav = $(this).find(".third-nav");

                    menuSubcatToggle.on("click", function () {
                        menuSubcatToggle.toggleClass("active");
                        thirdNav.slideToggle("fast");
                        $(this).closest(".parent-subcategory").toggleClass("active");
                    });
                });
            });
        </script>

        <script>
            var menu = new MmenuLight(document.querySelector("#menu"), "all");

            var navigator = menu.navigation({
                selectedClass: "Selected",
                slidingSubmenus: true,
                // theme: 'dark',
                title: "ক্যাটাগরি",
            });

            var drawer = menu.offcanvas({
                // position: 'left'
            });

            //  Open the menu.
            document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
                evnt.preventDefault();
                drawer.open();
            });
        </script>

        <script>
            // document.addEventListener("DOMContentLoaded", function () {
            //     window.addEventListener("scroll", function () {
            //         if (window.scrollY > 200) {
            //             document.getElementById("navbar_top").classList.add("fixed-top");
            //         } else {
            //             document.getElementById("navbar_top").classList.remove("fixed-top");
            //             document.body.style.paddingTop = "0";
            //         }
            //     });
            // });
            /*=== Main Menu Fixed === */
            // document.addEventListener("DOMContentLoaded", function () {
            //     window.addEventListener("scroll", function () {
            //         if (window.scrollY > 0) {
            //             document.getElementById("m_navbar_top").classList.add("fixed-top");
            //             // add padding top to show content behind navbar
            //             navbar_height = document.querySelector(".navbar").offsetHeight;
            //             document.body.style.paddingTop = navbar_height + "px";
            //         } else {
            //             document.getElementById("m_navbar_top").classList.remove("fixed-top");
            //             // remove padding top from body
            //             document.body.style.paddingTop = "0";
            //         }
            //     });
            // });
            /*=== Main Menu Fixed === */

            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $(".scrolltop:hidden").stop(true, true).fadeIn();
                } else {
                    $(".scrolltop").stop(true, true).fadeOut();
                }
            });
            $(function () {
                $(".scroll").click(function () {
                    $("html,body").animate({ scrollTop: $(".gotop").offset().top }, "1000");
                    return false;
                });
            });
        </script>
        <script>
            $(".filter_btn").click(function(){
               $(".filter_sidebar").addClass('active');
               $("body").css("overflow-y", "hidden");
            })
            $(".filter_close").click(function(){
               $(".filter_sidebar").removeClass('active');
               $("body").css("overflow-y", "auto");
            })
        </script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K29C9BKJ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    </body>
</html>
<?php /**PATH /home/creativedesignbd/ecommerce1.creativedesign.com.bd/resources/views/frontEnd/layouts/master.blade.php ENDPATH**/ ?>