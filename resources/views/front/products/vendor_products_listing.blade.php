<?php use App\Models\Product; ?>

<div class="row">
    @foreach($vendorProducts as $product)
    <div class="col-lg-12 col-md-6">
        <div class="tab-item2">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="tab-img">
                        <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                        <img class="main-img img-fluid" src="{{ asset($product_image_path) }}" alt="">
                        @else
                        <img class="main-img img-fluid" src="{{ asset('front/images/product_images/small/no image.png') }}" alt="">
                        @endif
                        <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png') }}" alt="">
                        <?php $isProductNew = Product::isProductNew($product['id']); ?>
                        @if($isProductNew=="Yes")
                        <span class="sale">NEW</span>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="item-heading d-flex justify-content-between">
                        <div class="item-top">
                            <ul class="list-unstyled list-inline cate">
                                <li class="list-inline-item"><a href="#">{{$product['brand']['name']}}</a></li>
                                <li class="list-inline-item"><a href="#">Smart Led</a></li>
                            </ul>
                            <p><a href="{{ url('product/'.$product['id'])}}">{{$product['product_name']}}</a></p>
                            <ul class="list-unstyled list-inline fav">
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="item-price">
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
                        
                    </div>
                    <div class="item-content">
                        <p>{{$product['description']}}</p>
                        <a href="" class="it-cart"><span class="it-img"><img src="{{ asset('front/images/it-cart.png') }}" alt=""></span><span class="it-title">Add To Cart</span></a>
                        <a href="" class="it-fav" data-toggle="tooltip" data-placement="top" title="Favourite"><img src="{{ asset('front/images/it-fav.png') }}" alt=""></a>
                        <a href="" class="it-comp" data-toggle="tooltip" data-placement="top" title="Compare"><img src="{{ asset('front/images/it-comp.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
