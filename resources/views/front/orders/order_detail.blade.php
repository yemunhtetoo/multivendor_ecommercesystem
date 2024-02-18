<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Your order id - {{$orderDetails['id'] }}</h4><br>
                        <h3><a href="{{url('user/orders')}}">Your Orders</a></h3><br>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-borderless table-dark">
                            <tr><td colspan="2"><strong>Order Details</strong></td></tr>
                            <tr><td>Order Date</td><td>{{date("Y-m-d H:i:s", strtotime($orderDetails['created_at']))}}</td></tr>
                            <tr><td>Order Status</td><td>{{$orderDetails['order_status']}}</td></tr>
                            <tr><td>Order Total</td><td>{{$orderDetails['grand_total']}}</td></tr>
                            <tr><td>Shipping Charges</td><td>{{$orderDetails['shipping_charges']}}</td></tr>
                            @if($orderDetails['coupon_code']!="")
                                <tr><td>Coupon Code</td><td>{{$orderDetails['coupon_code']}}</td></tr>
                                <tr><td>Coupon Amount</td><td>{{$orderDetails['coupon_amount']}}</td></tr>
                            @endif
                            @if($orderDetails['courier_name']!="")
                                <tr><td>Courier Name</td><td>{{$orderDetails['courier_name']}}</td></tr>
                                <tr><td>Tracking Number</td><td>{{$orderDetails['tracking_number']}}</td></tr>
                            @endif
                            <tr><td>Payment Method</td><td>{{$orderDetails['payment_method']}}</td></tr>
                        </table>
                        <table class="table table-striped table-borderless table-hover table-dark">
                            <tr>
                                <th>Product Image</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Size</th>
                                <th>Product Color</th>
                                <th>Product Quantity</th>
                            </tr>
                            @foreach ($orderDetails['orders_products'] as $product)
                                <tr>
                                    <td>
                                        @php $getProductImage = Product::getProductImage($product['product_id']) @endphp
                                        <a target="_blank" href="{{url('product/'.$product['product_id'])}}"><img width="50px" src="{{asset('front/images/product_images/small/'.$getProductImage )}}" alt=""></a>
                                    </td>
                                    <td>{{ $product['product_code']}}</td>
                                    <td>{{ $product['product_name']}}</td>
                                    <td>{{ $product['product_size']}}</td>
                                    <td>{{ $product['product_color']}}</td>
                                    <td>{{ $product['product_qty']}}</td>
                                </tr>
                                @if($product['courier_name'] !="")
                                <tr><td colspan="6">Courier Name: {{$product['courier_name']}}, {{$product['tracking_number']}}</td></tr>
                                @endif
                            @endforeach
                        </table>
                        <table class="table table-striped table-borderless table-hover table-dark">
                            <tr><td colspan="2"><strong>Delivery Address</strong></td></tr>
                            <tr><td>Name</td><td>{{$orderDetails['name']}}</td></tr>
                            <tr><td>Address</td><td>{{$orderDetails['address']}}</td></tr>
                            <tr><td>City</td><td>{{$orderDetails['city']}}</td></tr>
                            <tr><td>State</td><td>{{$orderDetails['state']}}</td></tr>
                            <tr><td>Country</td><td>{{$orderDetails['country']}}</td></tr>
                            <tr><td>Pincode</td><td>{{$orderDetails['pincode']}}</td></tr>
                            <tr><td>Mobile</td><td>{{$orderDetails['mobile']}}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End Shopping Cart -->
@endsection