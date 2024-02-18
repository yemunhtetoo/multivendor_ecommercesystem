<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-box text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="">Home</a></li>
                            <li class="list-inline-item"><span>||</span> Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->

    <!-- Checkout -->
    <section class="checkout">
        <div class="container">
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error: </strong><?php echo Session::get('error_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
                <div class="row">
                    <div class="col-md-6" id="deliveryAddresses">
                        @include('front.products.delivery_addresses')
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <form name="checkoutForm" id="checkoutForm" action="{{url('/checkout')}}" method="post"> @csrf

                                @if(count($deliveryAddresses)>0)
                                <h5> Delivery Addresses</h5>
                                @foreach($deliveryAddresses as $address)
                                    <div class="control-group" style="float:left; margin-right:5px;margin-top:5px;">
                                        <input type="radio" id="address{{$address['id']}}" name="address_id" value="{{$address['id']}}" shipping_charges="{{$address['shipping_charges']}}" total_price={{$total_price}} coupon_amount="{{Session::get('couponAmount')}}" codpincodeCount={{$address['codpincodeCount']}} prepaidpincodeCount={{$address['prepaidpincodeCount']}}>
                                    </div>
                                    <div>
                                        <label for="deliverydata" class="control-label">{{ $address['name'] }}, {{ $address['address'] }}, {{ $address['city'] }}, {{ $address['state'] }}, {{ $address['country'] }}, {{ $address['pincode'] }}, {{ $address['mobile'] }} </label>
                                        <a style="float:right;margin-left:5px;" href="javascript:;" data-addressid={{$address['id']}} class="editAddress" >Edit</a>&nbsp;
                                        <a style="float:right;" href="javascript:;" data-addressid={{$address['id']}} class="removeAddress">Remove</a>
                                    </div>
                                @endforeach<br>
                                @endif
                            <div class="col-md-12">
                                <div class="order-review">
                                    <h5>Order Review</h5>
                                    
                                    <div class="review-box">
                                        <ul class="list-unstyled">
                                            <li>Product <span>Total</span></li>
                                            @php $total_price = 0 @endphp
                                            @foreach ($getCartItems as $item)
                                            <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                                            //echo "<pre>"; print_r($getDiscountAttributePrice); die; ?>
                                            <li class="d-flex justify-content-between">
                                                <div class="pro">
                                                    <a href="{{url('product/'.$item['product_id'])}}"><img src="{{ asset('front/images/product_images/small/'.$item['product']['product_image'])}}" alt="" width="40"></a>
                                                    <p>{{$item['product']['product_name']}}</p>
                                                    <span>{{$item['quantity']}} X
                                                        @if($getDiscountAttributePrice['discount'] > 0)
                                                        ${{ $getDiscountAttributePrice['final_price'] }}
                                                        @else
                                                        ${{$getDiscountAttributePrice['product_price'] }}
                                                        @endif
                                                        </span>
                                                </div>
                                                <div class="prc">
                                                    <p>{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</p>
                                                </div>
                                            </li>
                                            @php $total_price =  $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                            @endforeach
                                            
                                            <li class="justify-content-between d-flex">Sub Total <span style="font-weight: bold">${{$total_price}}</span></li>
                                            <li class="justify-content-between d-flex">Shipping Charges <span style="font-weight: bold" class="shipping_charges">$00.00</span></li>
                                            <li>Coupon Discounts <span class="couponAmount">
                                                    @if(Session::has('couponAmount'))
                                                    Kyats.{{ Session::get('couponAmount')}}
                                                    @else
                                                    Kyats.0
                                                    @endif
                                                </span>
                                            </li>
                                            <li>Grand Total <span class="grand_total">Kyats.{{$total_price - Session::get('couponAmount')}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pay-meth">
                                    <h5>Payment Method</h5>
                                    <div class="pay-box">
                                        <ul class="list-unstyled">
                                            <li class="codMethod">
                                                <input type="radio" id="cash_on_delivery" name="payment_gateway" value="COD">
                                                <label for="cash_on_delivery"><span><i class="fa fa-circle"></i></span>Cash On Delivery</label>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque sint placeat illo animi quis minus accusantium ad doloribus, odit explicabo asperiores quidem.</p>
                                            </li>
                                            <li class="prepaidMethod">
                                                <input type="radio" id="paypal" name="payment_gateway" value="Paypal">
                                                <label for="paypal"><span><i class="fa fa-circle"></i></span>Paypal</label>
                                            </li>
                                            <li class="prepaidMethod">
                                                <input type="radio" id="iyzipay" name="payment_gateway" value="iyzipay">
                                                <label for="iyzipay"><span><i class="fa fa-circle"></i></span>Iyzipay</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class=""><input type="checkbox" name="accept_box" id="accept_box" value="Yes"><label for="accept_box">Accept the T & C</label></div>
                                </div>
                                <button type="submit" id="placeOrder" class="ord-btn">Place Order</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
@endsection       

<script>
    function formDeli() {
      var checkBox = document.getElementById("shipdifferentaddress");
      var text = document.getElementById("formdelivery");
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
         text.style.display = "none";
      }
    }
    </script>