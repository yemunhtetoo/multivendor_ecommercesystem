<?php
 use App\Models\Product; 
 $getCartItems = getCartItems();
 ?>
<!-- Cart Body -->
<div class="cart-body">
    <div class="close-btn">
        <button class="close-cart"><img src="{{ asset('front/images/close.png') }}" alt="">Close</button>
    </div>
    <div class="crt-bd-box">
        <div class="cart-heading text-center">
            <h5>Shopping Cart</h5>
        </div>
        <div class="cart-content">
            @php $total_price = 0 @endphp
                @foreach ($getCartItems as $item)
                <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                // echo "<pre>"; print_r($getDiscountAttributePrice); die; ?>
                    <div class="content-item d-flex justify-content-between">
                        <div class="cart-img">
                            <a href="{{url('product/'.$item['product_id'])}}"><img src="{{ asset('front/images/product_images/small/'.$item['product']['product_image'])}}" alt="" width="50"></a>
                        </div>
                        <div class="cart-disc">
                            <p><a href="">{{$item['product']['product_name']}}</a></p>

                            <span>{{$item['quantity']}} x ${{$getDiscountAttributePrice['final_price'] }}</span>
                        </div>
                        <div class="delete-btn">
                            <a href=""><i class="fa fa-trash-o"></i></a>
                        </div>
                    </div>
                    @php $total_price =  $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                @endforeach
        </div>
        <div class="cart-btm">
            <p class="text-right">Sub Total: <span>${{$total_price}}</span></p>
            <a href="{{ url('checkout')}}">Checkout</a>
            <br>
            <a href="{{ url('cart')}}">View Cart</a>
        </div>
    </div>
</div>

<script>
    // $('.cart-btn').on('click', function(e){
	//     e.preventDefault();
	//     $('.cart-overlay').addClass('visible');
	//     $('.cart-body').addClass('open');
	// });
	// $('.close-cart, .cart-overlay').on('click', function(e){
	//     e.preventDefault();
	//     $('.cart-overlay').removeClass('visible');
	//     $('.cart-body').removeClass('open');
	// });
</script>

