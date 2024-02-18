<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="shopping-cart">
        
                    <div id="appendCartItems">
                        @include('front.products.cart_items')
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="shipping">
                                    <h6>Calculate Shipping and Tax</h6>
                                    <p>Enter your destination to get shipping estimate</p>
                                    <form action="#">
                                        <div class="country-box">
                                            <select class="country">
                                                <option>Select Country</option>
                                                <option>United State</option>
                                                <option>United Kingdom</option>
                                                <option>Germany</option>
                                                <option>Australia</option>
                                            </select>
                                        </div>
                                        <div class="state-box">
                                            <select class="state">
                                                <option>State/Province</option>
                                                <option>State 1</option>
                                                <option>State 2</option>
                                                <option>State 3</option>
                                                <option>State 4</option>
                                            </select>
                                        </div>
                                        <div class="post-box">
                                            <input type="text" name="zip" value="" placeholder="Zip/Postal Code">
                                            <button type="button">Get Estimate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="coupon">
                                    <h6>Discount Coupon</h6>
                                    <p>Enter your coupon code if you have one</p>
                                            <form id="ApplyCoupon" method="post" action="javascript:void(0);" @if(Auth::check()) user="1" @endif>@csrf
                                                <input type="text" name="code" id="code" placeholder="Enter Your Coupon">
                                                <button type="submit">Apply Code</button>
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
               
            
            
        </section>
        <!-- End Shopping Cart -->
@endsection