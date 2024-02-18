<?php 
use App\Models\Section;
$sections = Section::sectionsWithLimit();
// echo "<pre>"; print_r($sections); die;
$totalCartItems = totalCartItems();
?>
        <section class="brand2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tp-bnd owl-carousel">
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-01.png') }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-02.png') }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-03.png') }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-04.png') }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-05.png') }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-06.png') }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="bnd-items">
                                <a href="#"><img src="{{ asset('front/images/brand-07.png') }}" alt="" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Brand area 2 -->

        <!-- Footer Area -->
        <section class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="f-contact">
                            <h5>Contact Info</h5>
                            <div class="f-add">
                                <i class="fa fa-map-marker"></i>
                                <span>Address :</span>
                                <p>795 South Park Avenue, New York, NY USA 94107</p>
                            </div>
                            <div class="f-email">
                                <i class="fa fa-envelope"></i>
                                <span>Email :</span>
                                <p>enquery@domain.com</p>
                            </div>
                            <div class="f-phn">
                                <i class="fa fa-phone"></i>
                                <span>Phone :</span>
                                <p>+1 908 875 7678</p>
                            </div>
                            <div class="f-social">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-google-plus"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="f-cat">
                            <h5>Categories</h5>
                            <ul class="list-unstyled">
                                @foreach($sections as $section)
                                @if(count($section['categories'])>0)
                                @foreach($section['categories'] as $category)
                                <li><a href="{{url($category['url'])}}"><i class="fa fa-angle-right"></i>{{$category['category_name']}}</a></li>
                                @endforeach
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-link">
                            <h5>Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href=""><i class="fa fa-angle-right"></i>My Account</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Shopping Cart</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>My Wishlist</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Checkout</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Order History</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Log In</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Our Locations</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-sup">
                            <h5>Support</h5>
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/about-us') }}"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Payment Policy</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Return Policy</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Frequently asked questions</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Terms & Condition</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i>Delivery Info</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright &copy; 2020 | Designed With <i class="fa fa-heart"></i> by <a href="#" target="_blank">SnazzyTheme</a></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="{{ asset('front/images/payment.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="back-to-top text-center">
                <img src="{{ asset('front/images/backtotop.png') }}" alt="" class="img-fluid">
            </div>
        </section>
        