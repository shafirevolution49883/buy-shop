<?php $__env->startSection('title', $details->name); ?>

<?php $__env->startPush('seo'); ?>
<!-- === Your SEO meta tags as before === -->
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/zoomsl.css')); ?>">
<style>
    /* === Global Fix === */
    html, body {
        max-width: 100%;
        overflow-x: hidden; 
    }
    header, footer { max-width:100%; overflow-x:hidden; }

    /* === Product Images === */
    .details_slider img,
    .dimage_item img,
    .indicator-item img,
    .pro_img img {
        max-width: 100%;
        height: auto;
        display: block;
    }
    .owl-carousel { width: 100% !important; }
    .owl-stage-outer { max-width: 100% !important; overflow: hidden; }
    .owl-stage { display:flex !important; }

    /* === Description Box === */
    .description {
        margin-top: 10px;
        background: #ffffff;
        padding: 15px;
        border: 1px solid #1830b8;  
        border-radius: 5px;    
        box-shadow: 0 2px 6px rgba(0,0,0,0.1); 
    }

    /* === Sale Badge === */
    .sale-badge-box {
        background-color: #1830b8;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .sale-badge-text {
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        font-size:10px;
        color:#fff;
        line-height:1.2;
        text-align:center;
    }
    .sale-badge-text p {
        margin:0;
        font-size:11px;
        font-weight:700;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="homeproduct main-details-page">
    <div class="container">
        <div class="row">
            
            <div class="col-12 col-sm-6 position-relative">
                <?php if($details->old_price): ?>
                <div class="product-details-discount-badge">
                    <div class="sale-badge-box">
                        <span class="sale-badge-text">
                            <p>
                                <?php $discount=(($details->old_price - $details->new_price)*100)/$details->old_price; ?>
                                <?php echo e(number_format($discount,0)); ?>%
                            </p>
                            ছাড়
                        </span>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="details_slider owl-carousel">
                    <?php $__currentLoopData = $details->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dimage_item">
                            <img src="<?php echo e(asset($value->image)); ?>" alt="<?php echo e($details->name); ?>" class="block__pic img-fluid"/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="indicator_thumb <?php if($details->images->count()>4): ?> thumb_slider owl-carousel <?php endif; ?>">
                    <?php $__currentLoopData = $details->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="indicator-item" data-id="<?php echo e($key); ?>">
                            <img src="<?php echo e(asset($image->image)); ?>" class="img-fluid"/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="col-12 col-sm-6">
                <div class="details_right">
                    
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                            <li><span>/</span></li>
                            <li><a href="<?php echo e(url('/category/' . $details->category->slug)); ?>"><?php echo e($details->category->name); ?></a></li>
                        </ul>
                    </div>

                    
                    <p class="name"><?php echo e($details->name); ?></p>
                    <p class="details-price">
                        <?php if($details->old_price): ?><del>৳<?php echo e($details->old_price); ?></del><?php endif; ?>
                        ৳<?php echo e($details->new_price); ?>

                    </p>

                    
                    <div class="details-ratting-wrapper">
                        <?php
                        $averageRating=$reviews->avg('ratting'); $filledStars=floor($averageRating);
                        $empty=5-$filledStars;
                        ?>
                        <?php for($i=0;$i<$filledStars;$i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                        <?php if($averageRating>$filledStars): ?><i class="fas fa-star-half-alt"></i><?php endif; ?>
                        <?php for($i=0;$i<$empty;$i++): ?><i class="far fa-star"></i><?php endfor; ?>
                        <span><?php echo e(number_format($averageRating,2)); ?>/5</span>
                        <a class="all-reviews-button" href="#writeReview">See Reviews</a>
                    </div>

                    <p><span>কোড:</span> <?php echo e($details->product_code); ?></p>

                    
                    <form action="<?php echo e(route('cart.store')); ?>" method="POST" name="formName">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($details->id); ?>"/>

                        
                        <?php if($productcolors->count()>0): ?>
                        <div class="color_inner">
                            <p>Color -</p>
                            <div class="selector">
                                <?php $__currentLoopData = $productcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="selector-item">
                                    <input type="radio" id="color<?php echo e($procolor->id); ?>" name="product_color"
                                        value="<?php echo e($procolor->color? $procolor->color->colorName:''); ?>"
                                        class="selector-item_radio" required/>
                                    <label for="color<?php echo e($procolor->id); ?>" style="background-color: <?php echo e($procolor->color? $procolor->color->color:''); ?>" class="selector-item_label">
                                        <span><img src="<?php echo e(asset('public/frontEnd/images/check-icon.svg')); ?>" alt="Checked"/></span>
                                    </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        
                        <?php if($productsizes->count()>0): ?>
                        <div class="size_inner">
                            <p>Size -</p>
                            <div class="selector">
                                <?php $__currentLoopData = $productsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prosize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="selector-item">
                                    <input type="radio" id="size<?php echo e($prosize->id); ?>" name="product_size"
                                        value="<?php echo e($prosize->size? $prosize->size->sizeName:''); ?>"
                                        class="selector-item_radio" required/>
                                    <label for="size<?php echo e($prosize->id); ?>" class="selector-item_label"><?php echo e($prosize->size? $prosize->size->sizeName:''); ?></label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        
                        <?php if($details->pro_unit): ?>
                        <div class="pro_unig"><label>Unit: <?php echo e($details->pro_unit); ?></label></div>
                        <?php endif; ?>

                        
                        <div class="pro_brand"><p>Brand: <?php echo e($details->brand? $details->brand->name : 'N/A'); ?></p></div>

                        
                        <div class="row">
                            <div class="qty-cart col-12">
                                <div class="quantity">
                                    <span class="minus">-</span>
                                    <input type="text" name="qty" value="1"/>
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            <div class="d-flex single_product col-12">
                                <input type="submit" class="btn px-4 add_cart_btn" name="add_cart" value="কার্টে যোগ করুন"/>
                                <input type="submit" class="btn px-4 order_now_btn order_now_btn_m" name="order_now" value="অর্ডার করুন"/>
                            </div>
                        </div>

                        
                        <div class="mt-2">
                            <a class="btn btn-success w-100 call_now_btn" href="tel:<?php echo e($contact->hotline); ?>">
                                <i class="fa fa-phone-square"></i> <?php echo e($contact->hotline); ?>

                            </a>
                        </div>

                        
                        <div class="mt-2">
                            <a class="btn btn-success w-100 call_now_btn"
                               href="https://api.whatsapp.com/send?phone=<?php echo e($contact->whatsapp); ?>&text=হ্যালো, আমি এই পণ্যটির ব্যাপারে জানতে চাই: <?php echo e(urlencode(Request::url())); ?>"
                               target="_blank">
                                <i class="fa fa-whatsapp"></i> এই পণ্যটি সম্পর্কে জিজ্ঞাসা করুন
                            </a>
                        </div>

                        
                        <div class="mt-2 del_charge_area">
                            <div class="alert alert-info text-xs">
                                <div class="flext_area">
                                    <i class="fa-solid fa-cubes"></i>
                                    <div>
                                        <?php $__currentLoopData = $shippingcharge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span><?php echo e($value->name); ?> <br/></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="description" class="pro_details_area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8">
                <div class="description">
                    <h2>বিস্তারিত</h2>
                    <p><?php echo $details->description; ?></p>
                </div>
            </div>
            <?php if($details->pro_video): ?>
            <div class="col-12 col-sm-4">
                <div class="pro_vide">
                    <h2>ভিডিও</h2>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/<?php echo e($details->pro_video); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="related-product-section">
    <div class="container">
        <h5>Related Product</h5>
        <div class="product-inner owl-carousel related_slider">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product_item wist_item">
                <div class="product_item_inner">
                    <?php if($value->old_price): ?>
                    <div class="sale-badge">
                        <div class="sale-badge-box">
                            <span class="sale-badge-text">
                                <p> <?php $discount=(((($details->old_price)-($details->new_price))*100) / ($details->old_price)) ?> <?php echo e(number_format($discount, 0)); ?>%</p>
                                ছাড়
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="pro_img">
                        <a href="<?php echo e(route('product',$value->slug)); ?>">
                            <img src="<?php echo e(asset(optional($value->image)->image)); ?>" alt="<?php echo e($value->name); ?>" class="img-fluid"/>
                        </a>
                    </div>
                    <div class="pro_name">
                        <a href="<?php echo e(route('product',$value->slug)); ?>"><?php echo e(Str::limit($value->name,35)); ?></a>
                    </div>
                </div>
                <div class="pro_price"><p><?php if($value->old_price): ?><del>৳<?php echo e($value->old_price); ?></del><?php endif; ?> ৳<?php echo e($value->new_price); ?></p></div>
                <div class="pro_btn"><div class="cart_btn view_button">
                    <a href="<?php echo e(route('product',$value->slug)); ?>" class="viewproductbutton"><span>Order Now</span></a>
                </div></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/frontEnd/js/zoomsl.min.js')); ?>"></script>
<script>
$(function(){
    $(".details_slider").owlCarousel({items:1,loop:true,margin:10,dots:false,autoplay:true,autoplayTimeout:6000});
    $(".indicator-item").click(function(){ $(".details_slider").trigger("to.owl.carousel",$(this).data("id")); });
    $(".related_slider").owlCarousel({
        margin:10,loop:true,dots:true,nav:true,
        responsive:{0:{items:2},600:{items:3},1000:{items:5}}
    });
    $(".thumb_slider").owlCarousel({items:4,loop:true,nav:true,margin:10});
    $(".minus").click(function(){ var $i=$(this).siblings("input"); var v=Math.max(1,parseInt($i.val())-1); $i.val(v); });
    $(".plus").click(function(){ var $i=$(this).siblings("input"); $i.val(parseInt($i.val())+1); });
    $(".block__pic").imagezoomsl({ zoomrange:[3,3] });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/filekinb/borbix.incomekori.com/resources/views/frontEnd/layouts/pages/details.blade.php ENDPATH**/ ?>