<?php 
use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters();
// dd($productFilters);
?>
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

    @if(!isset($_REQUEST['search-bar']))
    <?php $getSizes = ProductsFilter::getSizes($url); ?>
    
    
    <div class="cat-brand">
        <div class="sec-title">
            <h6>Size</h6>
        </div>
        <form class="facet-form" action="#" method="post">
            <div class="brand-box">
                <ul class="list-unstyled">
                    @foreach($getSizes as $key => $size)
                        <li><input type="checkbox" class="check-box size" id="size{{ $key }}" name="size[]" value="{{ $size }}"><label for="size{{ $key }}">{{ $size }}</label></li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>


    <div class="cat-brand">
        <div class="sec-title">
            <h6>Price</h6>
        </div>
        
        <form action="#" method="post">
            <div class="brand-box">
                <?php $prices = array('0-1000','1000-2000','2000-5000','5000-10000','10000-100000'); ?>
                <ul class="list-unstyled">
                    @foreach ($prices as $key => $price)
                    <li><input type="checkbox" class="check-box price" id="price{{ $key }}" name="price[]" value="{{ $price }}"><label for="price{{ $key }}">Ks. {{ $price }}</label></li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>

    <div class="cat-brand">
        <div class="sec-title">
            <h6>Brands</h6>
        </div>
        <?php $getBrands = ProductsFilter::getBrands($url); ?>
        <form action="#" method="post">
        <div class="brand-box">
            <ul class="list-unstyled">
                @foreach ($getBrands as $key => $brand)
                    <li><input type="checkbox" class="check-box brand" id="brand{{ $key }}" name="brand[]" value="{{ $brand['id'] }}"><label for="brand{{ $key }}">{{ $brand['name'] }}</label></li>
                @endforeach
            </ul>
        </div>
        </form>
    </div>

    @foreach($productFilters as $filter)
    <?php 
    $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$categoryDetails['categoryDetails']['id']);
    ?>
    @if($filterAvailable=="Yes")
    @if(count($filter['filter_values']) > 0)
    <div class="cat-brand">
        <div class="sec-title">
            <h6>{{$filter['filter_name']}}</h6>
        </div>
        <form class="facet-form" action="#" method="post">
        <div class="brand-box">
            <ul class="list-unstyled">
                @foreach($filter['filter_values'] as $value )
                <li><input type="checkbox" id="{{ $value['filter_value'] }}" name="{{$filter['filter_column']}}[]" class="check-box {{$filter['filter_column']}}" value="{{ $value['filter_value'] }}">
                    <label for="{{ $value['filter_value'] }}">{{ ucwords($value['filter_value']) }}</label></li>
                @endforeach
            </ul>
        </div>
        </form>
    </div>
    @endif
    @endif
    
    @endforeach

    <div class="price-range">
        <div class="sec-title">
            <h6>Price</h6>
        </div>
        <div class="price-filter">
            <div id="slider-range"></div>
            <input type="text" id="amount" readonly>
            <button type="button" name="button">Filter</button>
        </div>
    </div>

    <?php $getColors = ProductsFilter::getColors($url); ?>
    <div class="color">
        <div class="sec-title">
            <h6>Color</h6>
        </div>
        <form action="#" method="post">
            <ul class="list-unstyled color-box">
                @foreach($getColors as $key => $color)
                <li><input type="checkbox" class="check-box color" id="color{{ $key }}" name="color[]" value="{{ $color }}"><label for="color{{ $key }}"><span style="background: red;"></span>{{ $color }}</label></li>
                @endforeach
                {{-- <li><input type="checkbox" id="green" name="name"><label for="green"><span style="background: green;"></span>Green</label></li>
                <li><input type="checkbox" id="blue" name="name"><label for="blue"><span style="background: blue;"></span>Blue</label></li>
                <li><input type="checkbox" id="gold" name="name"><label for="gold"><span style="background: gold;"></span>Golden</label></li>
                <li><input type="checkbox" id="brown" name="name"><label for="brown"><span style="background: brown;"></span>Brown</label></li>
                <li><input type="checkbox" id="black" name="name"><label for="black"><span style="background: black;"></span>Black</label></li> --}}
            </ul>
        </form>
    </div>
    @endif
    <div class="pro-tag">
        <div class="sec-title">
            <h6>Product Tag</h6>
        </div>
        <div class="tag-box">
            <a href="">Shirt</a>
            <a href="">Smartphone</a>
            <a href="">Camera</a>
            <a href="">Pant</a>
            <a href="">Glass</a>
            <a href="">Smart Led Tv</a>
            <a href="">Watch</a>
            <a href="">Micro Oven</a>
            <a href="">Toy</a>
        </div>
    </div>
    <div class="add-box">
        <a href=""><img src="{{ asset('front/images/s-banner2.jpg') }}" alt="" class="img-fluid"></a>
    </div>
</div>