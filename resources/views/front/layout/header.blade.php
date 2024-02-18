<?php 
use App\Models\Section;
$sections = Section::sections();
// echo "<pre>"; print_r($sections); die;
$totalCartItems = totalCartItems();
?>
<section class="top-bar2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="top-left d-flex">
                    <div class="lang-box">
                        <span><img src="{{ asset('front/images/fl-eng.png') }}" alt="">English<i class="fa fa-angle-down"></i></span>
                        <ul class="list-unstyled">
                            <li><img src="{{ asset('front/images/fl-eng.png') }}" alt="">English</li>
                            <li><img src="{{ asset('front/images/fl-fra.png') }}" alt="">French</li>
                            <li><img src="{{ asset('front/images/fl-ger.png') }}" alt="">German</li>
                            <li><img src="{{ asset('front/images/fl-bra.png') }}" alt="">Brazilian</li>
                        </ul>
                    </div>
                    <div class="mny-box">
                        <span>USD<i class="fa fa-angle-down"></i></span>
                        <ul class="list-unstyled">
                            <li>USD</li>
                            <li>GBP</li>
                            <li>EUR</li>
                        </ul>
                    </div>
                    <div class="call-us">
                        <p><img src="{{ asset('front/images/phn.png') }}" alt="">+1 (111) 426 6573</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="top-right text-right">
                    <ul class="list-unstyled list-inline">
                        
                        <li class="list-inline-item account-area"><a href=""><img src="{{ asset('front/images/user.png') }}" alt="">@if(Auth::check())My Account @else Login/Register @endif</a>
                            <ul class="list-unstyled">
                                @if(Auth::check())
                                <li><a href="{{ url('user/account')}}">My Account</a></li>
                                <li><a href="{{ url('user/orders')}}">My Orders</a></li>
                                <li><a href="{{ url('user/logout')}}">Logout</a></li>
                                @else
                                <li><a href="{{ url('user/login-page')}}">User Login</a></li>
                                <li><a href="{{ url('vendor/login')}}">Vendor Login</a></li>
                                @endif
                                
                            </ul>
                        </li>
                        @if(Auth::check())
                        <li class="list-inline-item"><a href=""><img src="{{ asset('front/images/wishlist.png') }}" alt="">Wishlist</a></li>
                        <li class="list-inline-item"><a href=""><img src="{{ asset('front/images/checkout.png') }}" alt="">Checkout</a></li>
                        @endif

                        
                        {{-- <li class="list-inline-item"><a href=""><img src="{{ asset('front/images/login.png') }}" alt="">Login</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Top Bar 2 -->

<!-- Logo Area 2 -->
<section class="logo-area2">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{ asset('front/images/logo.png') }}" width="100%;" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 padding-fix">
                <form action="{{ url('/search-products')}}" method="get" class="search-bar d-flex">@csrf
                    <input type="text" name="search-bar" placeholder="I'm looking for..." @if(isset($_REQUEST['search-bar']) && !empty($_REQUEST['search-bar'])) value="{{$_REQUEST['search-bar']}}" @endif>
                    <div class="search-cat">
                        <select class="form-control scat-id" name="section_id">
                            <option>All Categories</option>
                            @foreach($sections as $section)
                                <option @if(isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id']==$section['id']) selected="" @endif value="{{ $section['id']}}">{{ $section['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-lg-3 col-md-2">
                <div class="carts-area d-flex">
                    <div class="wsh-box ml-auto">
                        <a href="" data-toggle="tooltip" data-placement="top" title="Wishlist">
                            <img src="{{ asset('front/images/heart.png') }}" alt="favorite">
                            <span>0</span>
                        </a>
                    </div>
                    <div class="cart-box ml-4">
                        <a href="" data-toggle="tooltip" data-placement="top" title="Shopping Cart" class="cart-btn">
                            <img src="{{ asset('front/images/cart.png') }}" alt="cart">
                            <span class="totalCartItems">{{ $totalCartItems}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Logo Area 2 -->

<!-- Cart Body -->
<div id="appendHeaderCartItems">
@include('front.layout.header_cart_items')
</div>
<!-- End Cart Body -->
<div class="cart-overlay"></div>
<!-- Sticky Menu -->
<section class="sticky-menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3">
                <div class="sticky-logo">
                    <a href="index.html"><img src="{{ asset('front/images/logo.png') }}" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="main-menu">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a>HOME <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown list-unstyled">
                                <li><a href="index.html">Home Style 1</a></li>
                                <li><a href="02-home-two.html">Home Style 2</a></li>
                            </ul>
                        </li>
                        
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=new-arrivals')}}">NEW ARRIVALS</a></li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=featured')}}">FEATURED </a></li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=best-seller')}}">BEST SELLERS</a></li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=discounted')}}">DISCOUNTED</a></li>
                        <li class="list-inline-item"><a href="{{url('contact')}}">CONTACT</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-2">
                <div class="carts-area d-flex">
                    <div class="src-box">
                        <form action="#">
                            <input type="text" name="search" placeholder="Search Here">
                            <button type="button" name="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="wsh-box ml-auto">
                        <a href="" data-toggle="tooltip" data-placement="top" title="Wishlist">
                            <img src="{{ asset('front/images/heart.png') }}" alt="favorite">
                            <span>0</span>
                        </a>
                    </div>
                    <div class="cart-box ml-4">
                        <a href="" data-toggle="tooltip" data-placement="top" title="Shopping Cart" class="cart-btn">
                            <img src="{{ asset('front/images/cart.png') }}" alt="cart">
                            <span class="totalCartItems">{{ $totalCartItems}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Sticky Menu -->

<!-- Menu Area 2 -->
<section class="menu-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-0">
                <div class="sidemenu">
                    <p>All Categories <i class="fa fa-bars"></i></p>
                    <ul class="list-unstyled gt-menu">
                        @foreach($sections as $section)
                        @if(count($section['categories'])>0)
                        <li><a href=""><img src="{{ asset('front/images/m-cloth.png') }}" alt="">{{$section['name']}}<i class="fa fa-angle-right"></i></a>
                            <div class="mega-menu">
                                <div class="row">
                                    @foreach($section['categories'] as $category)
                                    <div class="col-md-4">
                                        <div class="smartphone">
                                            <h6><a href="{{ url($category['url'])}}">{{ $category['category_name']}}</a></h6>
                                            @foreach($category['subcategories'] as $subcategory)
                                                <a href="{{ url($subcategory['url'])}}">- {{ $subcategory['category_name']}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="col-md-12">
                                        <div class="mg-bnr">
                                            <img src="{{ asset('front/images/ipn.png') }}" alt="">
                                            <div class="mg-content text-right">
                                                <h4>Iphone</h4>
                                                <span>Save upto 50% off</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        
                        <li><a href=""><img src="{{ asset('front/images/sm.png') }}" alt="">Smartphone & Tablet</a></li>
                        <li><a href=""><img src="{{ asset('front/images/com.png') }}" alt="">Computer & Office</a></li>
                        <li><a href=""><img src="{{ asset('front/images/tv.png') }}" alt="">Home Applience</a></li>
                        <li><a href=""><img src="{{ asset('front/images/shoe.png') }}" alt="">Leather & Shoes</a></li>
                        <li><a href=""><img src="{{ asset('front/images/kid.png') }}" alt="">Kids & Babies</a></li>
                        <li><a href=""><img src="{{ asset('front/images/watch.png') }}" alt="">Jewelary & Watches</a></li>
                        <li><a href=""><img src="{{ asset('front/images/health.png') }}" alt="">Health & Beauty</a></li>
                        <li><a href=""><img src="{{ asset('front/images/car.png') }}" alt="">Automobiles</a></li>
                        <li><a href=""><img src="{{ asset('front/images/sport.png') }}" alt="">Sports & Outdoors</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="main-menu">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a>View More <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown list-unstyled">
                                <li><a href="{{url('about-us')}}">About Us</a></li>
                                <li><a href="{{url('faq')}}">FAQ</a></li>
                            </ul>
                        </li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=new-arrivals')}}">NEW ARRIVALS</a></li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=featured')}}">FEATURED </a></li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=best-seller')}}">BEST SELLERS</a></li>
                        <li class="list-inline-item"><a href="{{url('search-products?search-bar=discounted')}}">DISCOUNTED</a></li>
                        <li class="list-inline-item"><a href="{{url('contact')}}">CONTACT</a></li>
                        <li class="list-inline-item cup-btn"><a href="">Get Your Coupon</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Menu Area 2 -->

<!-- Mobile Menu -->
<section class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <a href=""><img src="{{ asset('front/images/logo.png') }}" alt=""></a>
                        <a href=""><span>Sign In</span></a>
                        <ul class="list-unstyled">
                            <li><a href="">More</a>
                                <ul class="list-unstyled">
                                    <li><a href="index.html">About Us</a></li>
                                    <li><a href="02-home-two.html">Home Style 2</a></li>
                                </ul>
                            </li>
                            <li><a href="">Pages</a>
                                <ul class="list-unstyled">
                                    <li><a href="03-about-us.html">About Us</a></li>
                                    <li><a href="04-category.html">Category</a></li>
                                    <li><a href="05-single-product.html">Single Product</a></li>
                                    <li><a href="06-shopping-cart.html">Shopping Cart</a></li>
                                    <li><a href="07-checkout.html">Checkout</a></li>
                                    <li><a href="08-login.html">Log In</a></li>
                                    <li><a href="09-register.html">Register</a></li>
                                    <li><a href="10-wishlist.html">Wishlist</a></li>
                                    <li><a href="11-compare.html">Compare</a></li>
                                    <li><a href="15-track-order.html">Track Order</a></li>
                                    <li><a href="12-terms-condition.html">Terms & Condition</a></li>
                                    <li><a href="13-faq.html">Faq</a></li>
                                    <li><a href="14-404.html">404</a></li>
                                </ul>
                            </li>
                            <li><a href="">Blog</a>
                                <ul class="list-unstyled">
                                    <li><a href="16-blog-one.html">Blog Style 1</a></li>
                                    <li><a href="17-blog-two.html">Blog Style 2</a></li>
                                    <li><a href="18-blog-three.html">Blog Style 3</a></li>
                                    <li><a href="19-blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="20-contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
