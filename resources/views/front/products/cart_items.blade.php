<?php use App\Models\Product; ?>
<div class="container">
    <!-- Shopping Cart -->
    @if(Session::has('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error: </strong><?php echo Session::get('error_message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong><?php echo Session::get('success_message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="t-pro">Product</th>
                            <th class="t-price">Price</th>
                            <th class="t-qty">Quantity</th>
                            <th class="t-total">Total</th>
                            <th class="t-rem">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total_price = 0 @endphp
                        @foreach ($getCartItems as $item)
                        <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                        // echo "<pre>"; print_r($getDiscountAttributePrice); die; ?>
                        <tr>
                            <td class="t-pro d-flex">
                                <div class="t-img">
                                    <a href="{{url('product/'.$item['product_id'])}}"><img src="{{ asset('front/images/product_images/small/'.$item['product']['product_image'])}}" alt="" width="100"></a>
                                </div>
                                <div class="t-content">
                                    <p class="t-heading"><a href="{{url('product/'.$item['product_id'])}}">{{$item['product']['product_name']}}</a></p>
                                    <ul class="list-unstyled list-inline rate">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <ul class="list-unstyled col-sz">
                                        <li><p>Color : <span>{{$item['product']['product_color']}}</span></p></li>
                                        <li><p>Size : <span>{{$item['size']}}</span></p></li>
                                    </ul>
                                </div>
                            </td>
                            
                            <td class="t-price">
                                @if($getDiscountAttributePrice['discount'] > 0)
                                    <li class="list-inline-item">${{ $getDiscountAttributePrice['final_price'] }}</li>
                                    <li class="list-inline-item">${{$getDiscountAttributePrice['product_price'] }}</li>
                                @else 
                                    <li class="list-inline-item">${{$getDiscountAttributePrice['final_price'] }}</li>
                                    <li class="list-inline-item"></li>
                                @endif
                            </td>
                            <td class="t-qty">
                                <div class="qty-box">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus updateCartItem" data-cartid="{{ $item['id']}}" data-qty="{{$item['quantity']}}">
                                        <input type="number" step="1" min="1" max="10" value="{{$item['quantity']}}" class="qty text" size="4" readonly>
                                        <input type="button" value="+" class="plus updateCartItem" data-cartid="{{ $item['id']}}" data-qty="{{$item['quantity']}}">
                                    </div>
                                </div>
                            </td>
                            <td class="t-total">${{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</td>
                            <td class="t-rem"><button class="deleteCartItem"  data-cartid="{{ $item['id']}}"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        @php $total_price =  $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="crt-sumry">
                <h5>Cart Summery</h5>
                <ul class="list-unstyled">
                    <li>Subtotal <span>${{$total_price}}</span></li>
                    <li>Shipping & Tax <span>$00.00</span></li>
                    <li>CouponAmount <span class="couponAmount">
                        @if(Session::has('couponAmount'))
                        Kyats.{{ Session::get('couponAmount')}}
                        @else
                        Kyats.0
                        @endif
                    </span></li>
                    <li>Grand Total <span class="grand_total">Kyats.{{$total_price - Session::get('couponAmount')}}</span></li>
                </ul>
                <div class="cart-btns text-right">
                    <a href="{{url('/')}}" class="up-cart">Continue Shopping</a>
                    <a href="{{url('/checkout')}}" class="chq-out">Checkout</a>
                </div>
            </div>
        </div>
        
    </div>
</div>