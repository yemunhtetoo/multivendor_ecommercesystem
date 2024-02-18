<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{ url('/') }}">Home /</a></li>
                                <li class="list-inline-item" style="font-weight: 500;color:black"><?php echo $categoryDetails['breadcrumbs']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Category Area -->
        <section class="category">
            <div class="container">
                <div class="row">
                    
                    @include('front.products.filters')
                    <div class="col-md-9">
                        <div class="product-box">
                            <div class="cat-box d-flex justify-content-between">
                                <!-- Nav tabs -->
                                <div class="view">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                @if(!isset($_REQUEST['search-bar']))
                                <form name="sortProducts" id="sortProducts">
                                    <input type="hidden" name="url" id="url" value="{{ $url }}">
                                    <div class="sortby">
                                        <span>Sort By</span>
                                        <select name="sort" id="sort" class="sort-box">
                                            <option>Position</option>
                                            <option selected="" value="">Select</option>
                                            <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort']=="product_latest") selected="" @endif>Sort By:Latest</option>
                                            <option value="price_lowest" @if(isset($_GET['sort']) && $_GET['sort']=="price_lowest") selected="" @endif>Sort By:Lowest Price</option>
                                            <option value="price_highest" @if(isset($_GET['sort']) && $_GET['sort']=="price_highest") selected="" @endif>Sort By:Highest Price</option>
                                            <option value="name_a_z" @if(isset($_GET['sort']) && $_GET['sort']=="name_a_z") selected="" @endif>Sort By:Name A - Z</option>
                                            <option value="name_z_a" @if(isset($_GET['sort']) && $_GET['sort']=="name_z_a") selected="" @endif>Sort By:Name Z - A</option>
                                        </select>
                                    </div>
                                </form>
                                @endif
                                {{-- <div class="show-item">
                                    <span>Show</span>
                                    <select class="show-box">
                                        <option>12</option>
                                        <option>24</option>
                                        <option>36</option>
                                    </select>
                                </div> --}}

                                <div class="show-item">
                                    <span>Showing</span>
                                    <select class="show-box">
                                        <option>{{ count($categoryProducts) }}</option>
                                        <option>Showing</option>
                                    </select>
                                </div>

                                <div class="page">
                                    <p>Page 1 of 20</p>
                                </div>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="list" role="tabpanel">
                                    
                                    <div class="filter_products">
                                        @include('front.products.ajax_products_listing')
                                    </div>
                                    @if(!isset($_REQUEST['search-bar']))
                                    @if(isset($_GET['sort']))
                                    <div>{{ $categoryProducts->appends(['sort'=>$_GET['sort']])->links() }}</div>
                                    @else
                                    <div>{{ $categoryProducts->links() }}</div>
                                    @endif
                                    @endif
                                    <div>&nbsp;</div>
                                    <div>{{ $categoryDetails['categoryDetails']['description']}}</div>
                                </div>

                                <div class="tab-pane fade" id="grid" role="tabpanel">
                                    <div class="row">
                                        @foreach($categoryProducts as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="tab-item">
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
                                                    <div class="layer-box">
                                                        <a href="" class="it-comp" data-toggle="tooltip" data-placement="left" title="Compare"><img src="{{ asset('front/images/it-comp.png') }}" alt=""></a>
                                                        <a href="" class="it-fav" data-toggle="tooltip" data-placement="left" title="Favourite"><img src="{{ asset('front/images/it-fav.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="tab-heading">
                                                    <p><a href="">{{ $product['product_name'] }}</a></p>
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
                                        </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="filter_products">
                                        @include('front.products.ajax_products_listing')
                                    </div> --}}
                                    @if(!isset($_REQUEST['search-bar']))
                                    @if(isset($_GET['sort']))
                                    <div>{{ $categoryProducts->appends(['sort'=>$_GET['sort']])->links() }}</div>
                                    @else
                                    <div>{{ $categoryProducts->links() }}</div>
                                    @endif
                                    @endif
                                    <div>&nbsp;</div>
                                    <div>{{ $categoryDetails['categoryDetails']['description']}}</div>
                                </div>
                                
                            </div>
                            <?php /*<div class="pagination-box text-center">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a href="">1</a></li>
                                    <li class="list-inline-item"><a href="">2</a></li>
                                    <li class="active list-inline-item"><a href="">3</a></li>
                                    <li class="list-inline-item"><a href="">4</a></li>
                                    <li class="list-inline-item"><a href="">...</a></li>
                                    <li class="list-inline-item"><a href="">12</a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-angle-right"></i></a></li>
                                    <li class="list-inline-item"><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div> */ ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@endsection