<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<style>
    
.subscribe {
	display: block;
	align-items: center;
	justify-content: center;
	background: white;
	margin-bottom: 50px;
    position: relative;
	border-radius: 10px;
	box-shadow: 0 4px 20px rgba(61, 159, 255, 0.2)
}

.subscribe__title {
	font-weight: bold;
	font-size: 26px;
	margin-bottom: 18px;
}

.get-alignment-naw{
    text-align: center;
    margin: 30px 0 30px 0;
}

.subscribe__copy {
	text-align: center;
	margin-bottom: 53px;
	line-height: 1.5;
}

.form__email {
	padding: 20px 25px;
	border-radius: 5px;
 	border: 1px solid #CAD3DB;
	width: 431px;
	font-size: 18px;
	color: #0F121F;
}

.form__email:focus {
	outline: 1px solid #3D9FFF;
}

.form__button {
	background: #3D9FFF;
	padding: 10px;
	border: none;
	width: 244px;
	height: 65px;
	border-radius: 5px;
	font-size: 18px;
	color: white;
	box-shadow: 0 4px 20px rgba(61, 159, 255, 0.7);
}

.form__button:hover {
	box-shadow: 0 10px 20px rgba(61, 159, 255, 0.7);
}

.notice {
	width: 345px;
}

</style>
        <!-- Slider Area 2 -->
        <section class="slider-area2">
            <div class="slider-wrapper owl-carousel">
                @foreach($sliderBanners as $banner)
                <div class="slider-item slider1">
                    <div class="slider-table">
                        <div class="slider-tablecell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-0">
                                        <div class="img1 wow fadeInRight effect" data-wow-duration="1s" data-wow-delay="0s">
                                            <img src="{{ url('front/images/banner_images/'.$banner['image'])}}" alt="{{ $banner['alt'] }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="slider-box">
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.5s">
                                                <h4>Smartphone Deal</h4>
                                            </div>
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.6s">
                                                <h1>{{ $banner['title'] }}</h1>
                                            </div>
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.7s">
                                                <p>The Smart Power In Your Hand</p>
                                            </div>
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s" data-wow-delay="0.8s">
                                                <a @if(!empty($banner['link'])) href="{{ url($banner['link'])}}" @else href="javascript:;" @endif>Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </section>
        <!-- End Slider Area 2 -->

        <!-- Service Area -->
        <section class="service-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="service-box d-flex">
                            <div class="sr-img">
                                <img src="{{ asset('front/images/service-1.png') }}" alt="">
                            </div>
                            <div class="">
                                <h6>Free Shipping</h6>
                                <p>Ullam et rem cum totam accusantium quos dolorem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box d-flex">
                            <div class="sr-img">
                                <img src="{{ asset('front/images/service-2.png') }}" alt="">
                            </div>
                            <div class="">
                                <h6>Money Back Guarantee</h6>
                                <p>Ullam et rem cum totam accusantium quos dolorem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-box d-flex">
                            <div class="sr-img">
                                <img src="{{ asset('front/images/service-3.png') }}" alt="">
                            </div>
                            <div class="">
                                <h6>Secure Payment</h6>
                                <p>Ullam et rem cum totam accusantium quos dolorem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Service Area -->

        <!-- Feature Product Area -->
        <section class="feat-pro2">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sec-title">
                            <h5>Feature Product</h5>
                        </div>
                        <div class="feat-box">
                            <img src="{{ asset('front/images/appliance.jpg') }}" alt="" class="img-fluid">
                            <div class="ft-bx-content">
                                <h5>Feature Product</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12 padding-fix-l20">
                                <div class="ftr-product">
                                    <div class="tab-box d-flex justify-content-end">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#all">Featured Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#elec">New Arrival</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#smart">Best Sellers</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#shoe">Discounted Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="all" role="tabpanel">
                                            <div class="tab-slider owl-carousel">
                                                @foreach($featuredProducts as $product)
                                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                                <div class="tab-item">
                                                    <div class="tab-img">
                                                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="main-img img-fluid" src="{{asset($product_image_path)}}" alt="">
                                                        @else
                                                        <img class="main-img img-fluid" src="{{asset('front/images/product_images/small/no image.png')}}" alt="">
                                                        @endif
                                                        <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png') }}" alt="">
                                                        <div class="layer-box">
                                                            <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png') }}" alt=""></a>
                                                            <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-heading">
                                                        <p><a href="{{ url('product/'.$product['id'])}}">{{$product['product_name'] }}</a></p>
                                                    </div>
                                                    <div class="img-content d-flex justify-content-between">
                                                        <div>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                                @if($getDiscountPrice > 0)
                                                                    <li class="list-inline-item">${{ $getDiscountPrice }}</li>
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                @else 
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                    <li class="list-inline-item"></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <a href="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="{{ asset('front/images/it-cart.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="elec" role="tabpanel">
                                            
                                            <div class="tab-slider owl-carousel">
                                                @foreach($newProducts as $product)
                                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                                <div class="tab-item">
                                                    <div class="tab-img">
                                                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="main-img img-fluid" src="{{asset($product_image_path)}}" alt="">
                                                        @else
                                                        <img class="main-img img-fluid" src="{{asset('front/images/product_images/small/no image.png')}}" alt="">
                                                        @endif
                                                        <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png') }}" alt="">
                                                        <div class="layer-box">
                                                            <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png') }}" alt=""></a>
                                                            <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-heading">
                                                        <p><a href="{{ url('product/'.$product['id'])}}">{{$product['product_name'] }}</a></p>
                                                    </div>
                                                    <div class="img-content d-flex justify-content-between">
                                                        <div>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                                @if($getDiscountPrice > 0)
                                                                    <li class="list-inline-item">${{ $getDiscountPrice }}</li>
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                @else 
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                    <li class="list-inline-item"></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <a href="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="{{ asset('front/images/it-cart.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="smart" role="tabpanel">
                                            <div class="tab-slider owl-carousel">
                                                @foreach($bestSellers as $product)
                                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                                <div class="tab-item">
                                                    <div class="tab-img">
                                                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="main-img img-fluid" src="{{asset($product_image_path)}}" alt="">
                                                        @else
                                                        <img class="main-img img-fluid" src="{{asset('front/images/product_images/small/no image.png')}}" alt="">
                                                        @endif
                                                        <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png') }}" alt="">
                                                        <div class="layer-box">
                                                            <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png') }}" alt=""></a>
                                                            <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-heading">
                                                        <p><a href="{{ url('product/'.$product['id'])}}">{{$product['product_name'] }}</a></p>
                                                    </div>
                                                    <div class="img-content d-flex justify-content-between">
                                                        <div>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                                @if($getDiscountPrice > 0)
                                                                    <li class="list-inline-item">${{ $getDiscountPrice }}</li>
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                @else 
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                    <li class="list-inline-item"></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <a href="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="{{ asset('front/images/it-cart.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="shoe" role="tabpanel">
                                            <div class="tab-slider owl-carousel">
                                                @foreach($discountedProducts as $product)
                                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                                <div class="tab-item">
                                                    <div class="tab-img">
                                                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="main-img img-fluid" src="{{asset($product_image_path)}}" alt="">
                                                        @else
                                                        <img class="main-img img-fluid" src="{{asset('front/images/product_images/small/no image.png')}}" alt="">
                                                        @endif
                                                        <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png') }}" alt="">
                                                        <div class="layer-box">
                                                            <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png') }}" alt=""></a>
                                                            <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="tab-heading">
                                                        <p><a href="{{ url('product/'.$product['id'])}}">{{$product['product_name'] }}</a></p>
                                                    </div>
                                                    <div class="img-content d-flex justify-content-between">
                                                        <div>
                                                            <ul class="list-unstyled list-inline fav">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="list-unstyled list-inline price">
                                                                <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                                @if($getDiscountPrice > 0)
                                                                    <li class="list-inline-item">${{ $getDiscountPrice }}</li>
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                @else 
                                                                    <li class="list-inline-item">${{$product['product_price'] }}</li>
                                                                    
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <a href="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="{{ asset('front/images/it-cart.png') }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Feature Product Area -->

        <!-- Full Banner -->
        <section class="f-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="f-bnr-img">
                            <a href="#"><img src="{{ asset('front/images/f-banner-1.jpg') }}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="f-bnr-img">
                            <a href="#"><img src="{{ asset('front/images/f-banner-2.jpg') }}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Full Banner -->

        <!-- Best Offer -->
        <section class="best-ofr">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="bst-slider">
                            <div class="sec-title">
                                <h6>New Product</h6>
                            </div>
                            <div class="bst-body owl-carousel">
                                <div class="bst-items">
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-1.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-2.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-3.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-4.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bst-items">
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-5.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-6.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-7.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-8.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bst-slider">
                            <div class="sec-title">
                                <h6>Hot Offer</h6>
                            </div>
                            <div class="bst-body owl-carousel">
                                <div class="bst-items">
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-9.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-10.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-11.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-12.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bst-items">
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-13.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-14.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-3.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-6.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bst-slider">
                            <div class="sec-title">
                                <h6>Top Rated</h6>
                            </div>
                            <div class="bst-body owl-carousel">
                                <div class="bst-items">
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-7.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-13.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-11.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-8.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bst-items">
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-3.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-5.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-2.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bst-box d-flex">
                                        <div class="bst-img">
                                            <a href="#"><img src="{{ asset('front/images/sbar-9.png') }}" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="bst-content">
                                            <p><a href="">Items Title Name Here</a></p>
                                            <ul class="list-unstyled list-inline fav">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <ul class="list-unstyled list-inline price">
                                                <li class="list-inline-item">$120.00</li>
                                                <li class="list-inline-item">$150.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Best Offer -->

        <!-- Banner Three -->
        <section class="banner3">
            <div class="container">
                <div class="row">
                    @if(isset($fixBanners[0]['image']))
                        <div class="col-md-4">
                            <div class="banner3-box">
                                <a href="{{ url($fixBanners[0]['link'])}}"><img src="{{ asset('front/images/banner_images/'.$fixBanners[0]['image'])}}" alt="{{ $fixBanners[0]['alt']}}" title="{{ $fixBanners[0]['title'] }}" class="img-fluid"></a>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-4">
                        <div class="banner3-box">
                            <a href="#"><img src="{{ asset('front/images/m-banner-4.jpg') }}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner3-box">
                            <a href="#"><img src="{{ asset('front/images/m-banner-2.jpg') }}" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- End Banner Three -->

        <!-- Front blog area -->
        <section class="f-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-title">
                            <h5>Latest News</h5>
                        </div>
                        <div class="fb-slider owl-carousel">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="#"><img src="{{ asset('front/images/news-1.jpg') }}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="blog-content">
                                    <h5><a href="">Sint eius inventore magni quod.</a></h5>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="">John</a></li>
                                        <li class="list-inline-item"><i class="fa fa-calendar"></i>Feb 10, 2020</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Delectus, expedita dolorum tenetur soluta. sunt in culpa qui...</p>
                                </div>
                            </div>
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="#"><img src="{{ asset('front/images/news-2.jpg') }}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="blog-content">
                                    <h5><a href="">Sint eius inventore magni quod.</a></h5>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="">John</a></li>
                                        <li class="list-inline-item"><i class="fa fa-calendar"></i>Feb 10, 2020</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Delectus, expedita dolorum tenetur soluta. sunt in culpa qui...</p>
                                </div>
                            </div>
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="#"><img src="{{ asset('front/images/news-3.jpg') }}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="blog-content">
                                    <h5><a href="">Sint eius inventore magni quod.</a></h5>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="">John</a></li>
                                        <li class="list-inline-item"><i class="fa fa-calendar"></i>Feb 10, 2020</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Delectus, expedita dolorum tenetur soluta. sunt in culpa qui...</p>
                                </div>
                            </div>
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="#"><img src="{{ asset('front/images/news-4.jpg') }}" alt="" class="img-fluid"></a>
                                </div>
                                <div class="blog-content">
                                    <h5><a href="">Sint eius inventore magni quod.</a></h5>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-user-o"></i><a href="">John</a></li>
                                        <li class="list-inline-item"><i class="fa fa-calendar"></i>Feb 10, 2020</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectet adipisicing elit. Delectus, expedita dolorum tenetur soluta. sunt in culpa qui...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Front blog area -->
        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 get-alignment-naw">
                        <h2 class="subscribe__title">Let's keep in touch</h2>
                        <p class="subscribe__copy">Subscribe to keep up with fresh news and exciting updates. We promise not to spam you!</p>
                        <form class="form">
                            <input type="email" class="form__email" placeholder="Enter your email address" name="subscriber_email" id="subscriber_email" required=""/>
                            <button type="button" class="form__button" onclick="addSubscriber()">Send</button>
                            {{-- <button type="button" class="button" onclick="addSubscriber()">Submit</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection