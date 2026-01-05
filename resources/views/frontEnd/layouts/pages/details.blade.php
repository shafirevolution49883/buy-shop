@extends('frontEnd.layouts.master')
@section('title', $details->name)

@push('seo')
<!-- === Your SEO meta tags as before === -->
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/zoomsl.css') }}">
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
@endpush

@section('content')
<div class="homeproduct main-details-page">
    <div class="container">
        <div class="row">
            {{-- LEFT IMAGES --}}
            <div class="col-12 col-sm-6 position-relative">
                @if($details->old_price)
                <div class="product-details-discount-badge">
                    <div class="sale-badge-box">
                        <span class="sale-badge-text">
                            <p>
                                @php $discount=(($details->old_price - $details->new_price)*100)/$details->old_price; @endphp
                                {{ number_format($discount,0) }}%
                            </p>
                            ছাড়
                        </span>
                    </div>
                </div>
                @endif
                {{-- Slider --}}
                <div class="details_slider owl-carousel">
                    @foreach ($details->images as $value)
                        <div class="dimage_item">
                            <img src="{{ asset($value->image) }}" alt="{{ $details->name }}" class="block__pic img-fluid"/>
                        </div>
                    @endforeach
                </div>
                {{-- Thumbs --}}
                <div class="indicator_thumb @if($details->images->count()>4) thumb_slider owl-carousel @endif">
                    @foreach ($details->images as $key => $image)
                        <div class="indicator-item" data-id="{{ $key }}">
                            <img src="{{ asset($image->image) }}" class="img-fluid"/>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT DETAILS --}}
            <div class="col-12 col-sm-6">
                <div class="details_right">
                    {{-- Breadcrumb --}}
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>/</span></li>
                            <li><a href="{{ url('/category/' . $details->category->slug) }}">{{ $details->category->name }}</a></li>
                        </ul>
                    </div>

                    {{-- Name + Price --}}
                    <p class="name">{{ $details->name }}</p>
                    <p class="details-price">
                        @if($details->old_price)<del>৳{{ $details->old_price }}</del>@endif
                        ৳{{ $details->new_price }}
                    </p>

                    {{-- Rating --}}
                    <div class="details-ratting-wrapper">
                        @php
                        $averageRating=$reviews->avg('ratting'); $filledStars=floor($averageRating);
                        $empty=5-$filledStars;
                        @endphp
                        @for($i=0;$i<$filledStars;$i++)<i class="fas fa-star"></i>@endfor
                        @if($averageRating>$filledStars)<i class="fas fa-star-half-alt"></i>@endif
                        @for($i=0;$i<$empty;$i++)<i class="far fa-star"></i>@endfor
                        <span>{{ number_format($averageRating,2) }}/5</span>
                        <a class="all-reviews-button" href="#writeReview">See Reviews</a>
                    </div>

                    <p><span>কোড:</span> {{ $details->product_code }}</p>

                    {{-- Cart Form --}}
                    <form action="{{ route('cart.store') }}" method="POST" name="formName">
                        @csrf
                        <input type="hidden" name="id" value="{{ $details->id }}"/>

                        {{-- Color --}}
                        @if($productcolors->count()>0)
                        <div class="color_inner">
                            <p>Color -</p>
                            <div class="selector">
                                @foreach($productcolors as $procolor)
                                <div class="selector-item">
                                    <input type="radio" id="color{{ $procolor->id }}" name="product_color"
                                        value="{{ $procolor->color? $procolor->color->colorName:'' }}"
                                        class="selector-item_radio" required/>
                                    <label for="color{{ $procolor->id }}" style="background-color: {{ $procolor->color? $procolor->color->color:'' }}" class="selector-item_label">
                                        <span><img src="{{ asset('public/frontEnd/images/check-icon.svg') }}" alt="Checked"/></span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Size --}}
                        @if($productsizes->count()>0)
                        <div class="size_inner">
                            <p>Size -</p>
                            <div class="selector">
                                @foreach($productsizes as $prosize)
                                <div class="selector-item">
                                    <input type="radio" id="size{{ $prosize->id }}" name="product_size"
                                        value="{{ $prosize->size? $prosize->size->sizeName:'' }}"
                                        class="selector-item_radio" required/>
                                    <label for="size{{ $prosize->id }}" class="selector-item_label">{{ $prosize->size? $prosize->size->sizeName:'' }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Unit --}}
                        @if($details->pro_unit)
                        <div class="pro_unig"><label>Unit: {{ $details->pro_unit }}</label></div>
                        @endif

                        {{-- Brand --}}
                        <div class="pro_brand"><p>Brand: {{ $details->brand? $details->brand->name : 'N/A' }}</p></div>

                        {{-- Quantity + Buttons --}}
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

                        {{-- Hotline --}}
                        <div class="mt-2">
                            <a class="btn btn-success w-100 call_now_btn" href="tel:{{ $contact->hotline }}">
                                <i class="fa fa-phone-square"></i> {{ $contact->hotline }}
                            </a>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="mt-2">
                            <a class="btn btn-success w-100 call_now_btn"
                               href="https://api.whatsapp.com/send?phone={{ $contact->whatsapp }}&text=হ্যালো, আমি এই পণ্যটির ব্যাপারে জানতে চাই: {{ urlencode(Request::url()) }}"
                               target="_blank">
                                <i class="fa fa-whatsapp"></i> এই পণ্যটি সম্পর্কে জিজ্ঞাসা করুন
                            </a>
                        </div>

                        {{-- Delivery Charges --}}
                        <div class="mt-2 del_charge_area">
                            <div class="alert alert-info text-xs">
                                <div class="flext_area">
                                    <i class="fa-solid fa-cubes"></i>
                                    <div>
                                        @foreach($shippingcharge as $value)
                                            <span>{{ $value->name }} <br/></span>
                                        @endforeach
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

{{-- Description --}}
<section id="description" class="pro_details_area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8">
                <div class="description">
                    <h2>বিস্তারিত</h2>
                    <p>{!! $details->description !!}</p>
                </div>
            </div>
            @if($details->pro_video)
            <div class="col-12 col-sm-4">
                <div class="pro_vide">
                    <h2>ভিডিও</h2>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/{{ $details->pro_video }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- Related Products --}}
<section class="related-product-section">
    <div class="container">
        <h5>Related Product</h5>
        <div class="product-inner owl-carousel related_slider">
            @foreach($products as $value)
            <div class="product_item wist_item">
                <div class="product_item_inner">
                    @if($value->old_price)
                    <div class="sale-badge">
                        <div class="sale-badge-box">
                            <span class="sale-badge-text">
                                <p> @php $discount=(((($details->old_price)-($details->new_price))*100) / ($details->old_price)) @endphp {{ number_format($discount, 0) }}%</p>
                                ছাড়
                            </span>
                        </div>
                    </div>
                    @endif
                    <div class="pro_img">
                        <a href="{{ route('product',$value->slug) }}">
                            <img src="{{ asset(optional($value->image)->image) }}" alt="{{ $value->name }}" class="img-fluid"/>
                        </a>
                    </div>
                    <div class="pro_name">
                        <a href="{{ route('product',$value->slug) }}">{{ Str::limit($value->name,35) }}</a>
                    </div>
                </div>
                <div class="pro_price"><p>@if($value->old_price)<del>৳{{ $value->old_price }}</del>@endif ৳{{ $value->new_price }}</p></div>
                <div class="pro_btn"><div class="cart_btn view_button">
                    <a href="{{ route('product',$value->slug) }}" class="viewproductbutton"><span>Order Now</span></a>
                </div></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontEnd/js/zoomsl.min.js') }}"></script>
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
@endpush