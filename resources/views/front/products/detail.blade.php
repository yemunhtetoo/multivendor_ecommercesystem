<?php use App\Models\Product; 
use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters();
// dd($productFilters);

if(isset($product['category_id'])){
    $category_id = $product['category_id'];
}
?>
@foreach($productFilters as $filter)
@if(isset($category_id))
<?php 
    $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$category_id);
?>
    @if($filterAvailable=="Yes")
    <div class="form-group">
        <label for="{{$filter['filter_column']}}">Select {{$filter['filter_name']}}</label>
        <select name="{{$filter['filter_column']}}" id="{{$filter['filter_column']}}" class="form-control text-dark">
            <option value="">Select</option>
            @foreach($filter['filter_values'] as $value)
            <option value="{{ $value['filter_value'] }}" @if(!empty($product[$filter['filter_column']]) && $value['filter_value']==$product[$filter['filter_column']]) selected="" @endif>{{ ucwords($value['filter_value']) }}</option>
            @endforeach
        </select>
    </div> 
    @endif
@endif
@endforeach

@extends('front.layout.layout')
@section('content')
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-box text-center">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="{{ url('/')}}">Home</a></li>
                        <li class="list-inline-item"><span>||</span> Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
        <section class="sg-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sg-img">

                                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                        <a href="{{ asset('front/images/product_images/large/'.$productDetails['product_image'])}}">
                                            <img src="{{ asset('front/images/product_images/large/'.$productDetails['product_image'])}}" alt="" width="300" height="300" />
                                        </a>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="thumbnails" style="margin-top: 30px">
                                        <a href="{{ asset('front/images/product_images/large/'.$productDetails['product_image'])}}" data-standard="{{ asset('front/images/product_images/small/'.$productDetails['product_image'])}}">
                                            <img width="70" height="70" src="{{ asset('front/images/product_images/small/'.$productDetails['product_image'])}}" alt="" />
                                        </a> 

                                        @foreach($productDetails['images'] as $image )
                                        <a href="{{ asset('front/images/product_images/large/'.$image['image'])}}" data-standard="{{ asset('front/images/product_images/small/'.$image['image'])}}">
                                            <img width="70" height="70" src="{{ asset('front/images/product_images/small/'.$image['image'])}}" alt="" />
                                        </a>  
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sg-content">
                                    <div class="pro-tag">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item"><a href="{{ url('/')}}">Home</a></li> /
                                            <li class="list-inline-item"><a href="javascript:;">{{ $productDetails['section']['name'] }}</a></li>
                                            <?php echo $categoryDetails['breadcrumbs']; ?>
                                        </ul>
                                    </div>
                                    {{-- <div class="pro-tag">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item"><a href="">Home Appliance ,</a></li>
                                            <li class="list-inline-item"><a href="">Smart Led Tv</a></li>
                                        </ul>
                                    </div> --}}
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
                                     <div class="pro-name">
                                         <p>{{ $productDetails['product_name'] }}</p>
                                     </div>
                                     <div class="pro-rating">
                                         <ul class="list-unstyled list-inline">
                                            @if($avgRating==0)
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                             @else
                                             
                                             <?php
                                             $star=1;
                                             while($star<=$avgStarRating){?>
                                             <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                             <?php $star++; }?>
                                             @endif
                                             <li class="list-inline-item"><a href="">( {{count($ratings)}} Review )</a></li>
                                             <li class="list-inline-item"><a href="">( {{$avgRating}} Average Rating )</a></li>
                                             
                                         </ul>
                                     </div>

                                     @if(count($groupProducts)>0)
                                     <div>
                                        <div><strong>Product Colors</strong></div>
                                        <div>
                                            @foreach ($groupProducts as $product)
                                                <a href="{{ url('product/'.$product['id'])}}"><img src="{{ asset('front/images/product_images/small/'.$product['product_image'])}}" style="width: 50px;"></a>
                                            @endforeach
                                        </div>
                                     </div>
                                     @endif
                                     <form action="{{ url('cart/add')}}" method="post" class="post-form"> @csrf
                                        <input type="hidden" name="product_id" value="{{ $productDetails['id']}}">
                                     <div class="pro-price">
                                         <ul class="list-unstyled list-inline">
                                            <?php $getDiscountPrice = Product::getDiscountPrice($productDetails['id']); ?>
                                            <span class="getAttributePrice">
                                                @if($getDiscountPrice > 0)
                                                    <li class="list-inline-item">Kyats: {{$getDiscountPrice}}</li>
                                                    <li class="list-inline-item">Kyats: {{ $productDetails['product_price']}}</li>
                                            @else
                                                    <li class="list-inline-item">Kyats: {{ $productDetails['product_price']}}</li>
                                            @endif
                                            </span>
                                         </ul>
                                         <p>Code : <span></span> <label>{{$productDetails['product_code']}}</label></p>
                                         <p>Color : <span></span> <label>{{$productDetails['product_color']}}</label></p>
                                         <p>Availability : 
                                            @if($totalStock>0)
                                            <span>In Stock</span>
                                            <span>{{$totalStock}} Available</span> 
                                            @else
                                            <span style="color:red;">Out of Stock</span>
                                            @endif
                                            
                                     </div>
                                     @if(isset($productDetails['vendor']))
                                     <div>Shop By <a href="/products/{{$productDetails['vendor']['id']}}"><b>{{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}</b></a></div>
                                     @endif
                                     <div class="colo-siz">
                                         <div class="color">
                                             <ul class="list-unstyled list-inline">
                                                 <li>Color :</li>
                                                 <li class="list-inline-item">
                                                     <input type="radio" id="color-1" name="color" value="color-1">
                                                     <label for="color-1"><span><i class="fa fa-check"></i></span></label>
                                                 </li>
                                                 <li class="list-inline-item">
                                                     <input type="radio" id="color-2" name="color" value="color-2">
                                                     <label for="color-2"><span><i class="fa fa-check"></i></span></label>
                                                 </li>
                                                 <li class="list-inline-item">
                                                     <input type="radio" id="color-3" name="color" value="color-3">
                                                     <label for="color-3"><span><i class="fa fa-check"></i></span></label>
                                                 </li>
                                                 <li class="list-inline-item">
                                                     <input type="radio" id="color-4" name="color" value="color-4">
                                                     <label for="color-4"><span><i class="fa fa-check"></i></span></label>
                                                 </li>
                                                 <li class="list-inline-item">
                                                     <input type="radio" id="color-5" name="color" value="color-5">
                                                     <label for="color-5"><span><i class="fa fa-check"></i></span></label>
                                                 </li>
                                             </ul>
                                         </div>

                                         <div class="sizes">
                                            <span>Available Size:</span>
                                            <div class="size-variant select-box-wrapper">
                                                <select name="size" id="getPrice" product-id="{{$productDetails['id']}}" class="select-box product-size" required="">
                                                    <option value="">Select Size</option>
                                                    @foreach($productDetails['attributes'] as $attribute)
                                                    
                                                        <option value="{{$attribute['size']}}">{{$attribute['size']}}</option>
                                                    
                                                 @endforeach
                                                 </select>
                                            </div>
                                         </div>
                                         {{-- <div class="size">
                                             
                                                 <span>Size :</span>
                                                 <div class="size-variant select-box-wrapper">
                                                 <select name="size" id="getPrice" product-id="{{$productDetails['id']}}" class="select-box product-size">
                                                    <option value="">Select Size</option>
                                                    @foreach ($productDetails['attributes'] as $attribute)
                                                    
                                                        <option value="{{$attribute['size']}}">{{$attribute['size']}}</option>
                                                    
                                                 @endforeach
                                                 </select>
                                                </div>
                                                
                                         </div> --}}
                                         <div class="qty-box">
                                             <ul class="list-unstyled list-inline">
                                                 <li class="list-inline-item">Qty :</li>
                                                 <li class="list-inline-item quantity buttons_added">
                                                     <input type="button" value="-" class="minus">
                                                     <input type="number" step="1" min="1" max="10" value="1" class="qty text" name="quantity">
                                                     <input type="button" value="+" class="plus">
                                                 </li>
                                             </ul>
                                         </div>
                                         <div class="pro-btns">
                                            <button type="submit" class="cart">Add To Cart</button>
                                              <a href="" class="fav-com" data-toggle="tooltip" data-placement="top" title="Wishlist"><img src="{{ asset('front/images/it-fav.png')}}" alt=""></a>
                                              <a href="" class="fav-com"  data-toggle="tooltip" data-placement="top" title="Compare"><img src="{{ asset('front/images/it-comp.png')}}" alt=""></a>
                                         </div>
                                     </div>
                                    </form>

                                    <br><br><b>Delivery</b>
                                    <input type="text" id="pincode" placeholder="Check pincoded" required="">
                                    <button type="button" id="checkPincode">Go</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="sg-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#pro-det">Product Details</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rev">Reviews ({{count($ratings)}})</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#spec">Specifications</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#video">Product Videos</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="pro-det" role="tabpanel">
                                            <p>{{ $productDetails['description']}}</p>

                                            <table>
                                                @foreach($productFilters as $filter)
                                                    @if(isset($productDetails['category_id']))
                                                    <?php 
                                                        $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$productDetails['category_id']);
                                                    ?>
                                                        @if($filterAvailable=="Yes")
                                                <tr>
                                                    <td>{{$filter['filter_name']}}</td>
                                                    <td> 
                                                        @foreach($filter['filter_values'] as $value)
                                                            @if(!empty($productDetails[$filter['filter_column']]) && $value['filter_value']==$productDetails[$filter['filter_column']])  
                                                                {{ ucwords($value['filter_value']) }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="rev" role="tabpanel">
                                            
                                            @if(count($ratings)>0)
                                            @foreach ($ratings as $rating)
                                            <div class="review-box d-flex">
                                                <div class="rv-img">
                                                    
                                                </div>
                                                <div class="rv-content">
                                                    <h6>{{$rating['user']['name']}} <span>{{$rating['created_at']}}</span></h6>
                                                    <ul class="list-unstyled list-inline">
                                                        <?php 
                                                            $count =0;
                                                            while($count<$rating['rating']){    
                                                        ?>
                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                            <?php $count++; }?>
                                                    </ul>
                                                    <p>{{$rating['review']}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            
                                            <div class="review-form">
                                                <h6>Add Your Review</h6>
                                                <form action="{{url('add-rating')}}" method="post" name="formRating" id="formRating">@csrf
                                                    <input type="hidden" name="product_id" class="rating-value" value="{{$productDetails['id']}}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="star-rating">
                                                                <label>Your Rating*</label>
                                                                <input style="display: none;" type="radio" name="rating" id="star5" value="5">
                                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                                <input style="display: none;" type="radio" name="rating" id="star4" value="4">
                                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                                <input style="display: none;" type="radio" name="rating" id="star3" value="3">
                                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                                <input style="display: none;" type="radio" name="rating" id="star2" value="2">
                                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                                <input style="display: none;" type="radio" name="rating" id="star1" value="1">
                                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                                <input type="hidden" name="rating" class="rating-value" value="0">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <label>Your Review*</label>
                                                            <textarea name="review" required=""></textarea>
                                                            <button type="submit">Add Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show " id="spec" role="tabpanel">
                                            <p>{{ $productDetails['description']}}</p>
                                        </div>
                                        <div class="tab-pane fade show " id="video" role="tabpanel">
                                            @if($productDetails['product_video'])
                                            <video width="320" height="240" controls>
                                            <source src="{{ url('front/videos/product_videos/'.$productDetails['product_video'])}}" type="video/mp4">
                                            </video>
                                            @else
                                                Product Video does not exist
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="sim-pro">
                                    <div class="sec-title">
                                        <h5>Similar Product</h5>
                                    </div>
                                    <div class="sim-slider owl-carousel">
                                        @foreach ($similarProducts as $product)
                                            <div class="sim-item">
                                                <div class="sim-img">
                                                    <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                                    @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="main-img img-fluid" src="{{ asset($product_image_path) }}" alt="">
                                                    @else
                                                    <img class="main-img img-fluid" src="{{ asset('front/images/product_images/small/no image.png') }}" alt="">
                                                    @endif
                                                    <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png')}}" alt="">
                                                    <div class="layer-box">
                                                        <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png')}}" alt=""></a>
                                                        <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png')}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="sim-heading">
                                                    <p><a href="{{ url('product/'.$product['id'])}}">{{ $product['product_name']}}</a></p>
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
                                                        <ul class="list-unstyled list-inline">
                                                            <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                            <span class="getAttributePrice similar">
                                                                @if($getDiscountPrice > 0)
                                                                    <li class="list-inline-item">Kyats: {{$getDiscountPrice}}</li>
                                                                    <li class="list-inline-item">Kyats: {{ $product['product_price']}}</li>
                                                            @else
                                                                    <li class="list-inline-item">Kyats: {{ $product['product_price']}}</li>
                                                            @endif
                                                            </span>
                                                         </ul>
                                                    </div>
                                                    <div>
                                                        <a href="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="{{ asset('front/images/it-cart.png')}}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="sim-pro">
                                    <div class="sec-title">
                                        <h5>Recently Viewed Products</h5>
                                    </div>
                                    <div class="sim-slider owl-carousel">
                                        @foreach ($recentlyViewedProducts as $product)
                                            <div class="sim-item">
                                                <div class="sim-img">
                                                    <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                                    @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="main-img img-fluid" src="{{ asset($product_image_path) }}" alt="">
                                                    @else
                                                    <img class="main-img img-fluid" src="{{ asset('front/images/product_images/small/no image.png') }}" alt="">
                                                    @endif
                                                    <img class="sec-img img-fluid" src="{{ asset('front/images/tab-16.png')}}" alt="">
                                                    <div class="layer-box">
                                                        <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png')}}" alt=""></a>
                                                        <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png')}}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="sim-heading">
                                                    <p><a href="{{ url('product/'.$product['id'])}}">{{ $product['product_name']}}</a></p>
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
                                                        <ul class="list-unstyled list-inline">
                                                            <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                                            <span class="getAttributePrice similar">
                                                                @if($getDiscountPrice > 0)
                                                                    <li class="list-inline-item">Kyats: {{$getDiscountPrice}}</li>
                                                                    <li class="list-inline-item">Kyats: {{ $product['product_price']}}</li>
                                                            @else
                                                                    <li class="list-inline-item">Kyats: {{ $product['product_price']}}</li>
                                                            @endif
                                                            </span>
                                                         </ul>
                                                    </div>
                                                    <div>
                                                        <a href="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><img src="{{ asset('front/images/it-cart.png')}}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-box">
                            <div class="sec-title">
                                <h6>Categories</h6>
                            </div>
                            <!-- accordion -->
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse1">
                                            <span>Clothing</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse1" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse2">
                                            <span>Electronics</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse2" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse3">
                                            <span>Home Appliance</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse3" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse4">
                                            <span>Smartphone</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse4" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse5">
                                            <span>Computer</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse5" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse6">
                                            <span>Kids Collection</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse6" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="" data-toggle="collapse" data-target="#collapse7">
                                            <span>Automobile</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                    <div id="collapse7" class="collapse">
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 1</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 2</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 3</a></li>
                                                <li><a href=""><i class="fa fa-angle-right"></i> Catagory 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ht-offer">
                            <div class="sec-title">
                                <h6>Hot Offer</h6>
                            </div>
                            <div class="ht-body owl-carousel">
                                <div class="ht-item">
                                    <div class="ht-img">
                                        <a href="#"><img src="{{ asset('front/images/tab-15.png')}}" alt="" class="img-fluid"></a>
                                        <span>- 59%</span>
                                        <ul class="list-unstyled list-inline counter-box">
                                            <li class="list-inline-item">185 <p>Days</p></li>
                                            <li class="list-inline-item">11 <p>Hrs</p></li>
                                            <li class="list-inline-item">39 <p>Mins</p></li>
                                            <li class="list-inline-item">51 <p>Sec</p></li>
                                        </ul>
                                    </div>
                                    <div class="ht-content">
                                        <p><a href="">Items Title Name Enter Here</a></p>
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
                                <div class="ht-item">
                                    <div class="ht-img">
                                        <a href="#"><img src="{{ asset('front/images/tab-14.png')}}" alt="" class="img-fluid"></a>
                                        <span>- 59%</span>
                                        <ul class="list-unstyled list-inline counter-box">
                                            <li class="list-inline-item">185 <p>Days</p></li>
                                            <li class="list-inline-item">11 <p>Hrs</p></li>
                                            <li class="list-inline-item">39 <p>Mins</p></li>
                                            <li class="list-inline-item">51 <p>Sec</p></li>
                                        </ul>
                                    </div>
                                    <div class="ht-content">
                                        <p><a href="">Items Title Name Enter Here</a></p>
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
        </section>
        
@endsection