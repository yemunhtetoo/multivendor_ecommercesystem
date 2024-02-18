<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\ProductsFilter;
use App\Models\ProductsAttribute;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use App\Models\DeliveryAddress;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\ShippingCharge;
use App\Models\Sms;
use App\Models\Rating;
use Session;
use DB;
use Auth;

class ProductsController extends Controller
{
    public function listing(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $url = $data['url'];
            $_GET['sort'] = $data['sort'];
       $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
       if($categoryCount>0){
        //Get Category Details
        $categoryDetails = Category::categoryDetails($url);
        $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);

        // Checking for Dynamic filters
        $productFilters = ProductsFilter::productFilters();
        foreach($productFilters as $key => $filter) {
            # if filter is selected
            if(isset($filter['filter_column']) && isset($data[$filter['filter_column']]) && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])){
                $categoryProducts->whereIn($filter['filter_column'],$data[$filter['filter_column']]);
            }
        }
       

        //Checking for sort
        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            if($_GET['sort'] == "product_latest"){
                $categoryProducts->orderby('products.id','Desc');
            }else if($_GET['sort'] == "price_lowest"){
                $categoryProducts->orderby('products.product_price','Asc');
            }else if($_GET['sort'] == "price_highest"){
                $categoryProducts->orderby('products.product_price','Desc');
            }else if($_GET['sort'] == "name_z_a"){
                $categoryProducts->orderby('products.product_name','Desc');
            }else if($_GET['sort'] == "name_a_z"){
                $categoryProducts->orderby('products.product_name','Asc');
            }
        }

        //  checking for size filter
        if(isset($data['size']) && !empty($data['size'])){
            $productIds = ProductsAttribute::select('product_id')->whereIn('size',$data['size'])->pluck('product_id')->toArray();
            $categoryProducts->whereIn('products.id',$productIds);
        }

        //  checking for color filter
        if(isset($data['color']) && !empty($data['color'])){
            $productIds = Product::select('id')->whereIn('product_color',$data['color'])->pluck('id')->toArray();
            $categoryProducts->whereIn('products.id',$productIds);
        }


        // if(isset($data['price']) && !empty($data['price'])){
        //     // $implodePrices = implode('-',$data['price']);
        //     // $explodePrices = explode('-',$implodePrices);
        //     // $min = reset($explodePrices);
        //     // $max = end($explodePrices);
        //      // echo "<pre>"; print_r($explodePrices); die;
        //     // $productIds = Product::select('id')->whereBetween('product_price',[$min,$max])->pluck('id')->toArray();
        //     // $categoryProducts->whereIn('products.id',$productIds);
           
        //     foreach($data['price'] as $key => $price){
        //         $priceArr = explode("-",$price);
        //         
        //         $productIds[] = Product::select('id')->whereBetween('product_price',[$priceArr[0],$priceArr[1]])->pluck('id')->toArray();
        //         }
        //     
        //     $productIds = call_user_func_array('array_merge',$productIds);
        //     // echo "<pre>"; print_r($productIds); die;
        //     $categoryProducts->whereIn('products.id',$productIds);
        // }

        //  checking for price filter
        $productIds = array();
        if(isset($data['price']) && !empty($data['price'])){
           
            foreach($data['price'] as $key => $price){
                $priceArr = explode("-",$price);
                if(isset($priceArr[0]) && isset($priceArr[1])){
                $productIds[] = Product::select('id')->whereBetween('product_price',[$priceArr[0],$priceArr[1]])->pluck('id')->toArray();
                }
            }
            $productIds = array_unique(array_flatten($productIds));
            // echo "<pre>"; print_r($productIds); die;
            $categoryProducts->whereIn('products.id',$productIds);
        }

        //  checking for brand filter
        if(isset($data['brand']) && !empty($data['brand'])){
            $productIds = Product::select('id')->whereIn('brand_id',$data['brand'])->pluck('id')->toArray();
            $categoryProducts->whereIn('products.id',$productIds);
        }

        $categoryProducts = $categoryProducts->paginate(30);
        // dd($categoryDetails);
        // echo "Category exists"; die;
        $meta_title = $categoryDetails['categoryDetails']['meta_title'];
        $meta_keywords = $categoryDetails['categoryDetails']['meta_keywords'];
        $meta_description = $categoryDetails['categoryDetails']['meta_description'];
        return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url','meta_title','meta_keywords','meta_description'));
       }
       else{
        abort(404);
       }

        }else {
            if(isset($_REQUEST['search-bar']) && !empty($_REQUEST['search-bar'])){
                if($_REQUEST['search-bar']=="new-arrivals" || $_REQUEST['search-bar']=="new-arrival"){
                    $search_product = $_REQUEST['search-bar'];
                    $categoryDetails['breadcrumbs'] = "New Arrivals";
                    $categoryDetails['categoryDetails']['category_name'] = "New Arrivals";
                    $categoryDetails['categoryDetails']['description'] = "New Arrivals Products ";
                    $categoryProducts = Product::select('products.id','products.section_id','products.category_id','products.brand_id','products.vendor_id','products.product_name','products.product_code','products.product_color','products.product_price','products.product_discount','products.product_image','products.description')->with('brand')->
                    join('categories','categories.id','=','products.category_id')->where('products.status',1)->orderBy('id','Desc');
                }else if($_REQUEST['search-bar']=="best-seller"){
                    $search_product = $_REQUEST['search-bar'];
                    $categoryDetails['breadcrumbs'] = "Best Seller";
                    $categoryDetails['categoryDetails']['category_name'] = "Best Seller";
                    $categoryDetails['categoryDetails']['description'] = "Best Seller Products ";
                    $categoryProducts = Product::select('products.id','products.section_id','products.category_id','products.brand_id','products.vendor_id','products.product_name','products.product_code','products.product_color','products.product_price','products.product_discount','products.product_image','products.description')->with('brand')->
                    join('categories','categories.id','=','products.category_id')->where('products.status',1)->where('products.is_bestseller','Yes');
                }else if($_REQUEST['search-bar']=="featured"){
                    $search_product = $_REQUEST['search-bar'];
                    $categoryDetails['breadcrumbs'] = "Featured Products";
                    $categoryDetails['categoryDetails']['category_name'] = "Featured Products";
                    $categoryDetails['categoryDetails']['description'] = "Featured Products";
                    $categoryProducts = Product::select('products.id','products.section_id','products.category_id','products.brand_id','products.vendor_id','products.product_name','products.product_code','products.product_color','products.product_price','products.product_discount','products.product_image','products.description')->with('brand')->
                    join('categories','categories.id','=','products.category_id')->where('products.status',1)->where('products.is_featured','Yes');
                }else if($_REQUEST['search-bar']=="discounted"){
                    $search_product = $_REQUEST['search-bar'];
                    $categoryDetails['breadcrumbs'] = "Discounted Products";
                    $categoryDetails['categoryDetails']['category_name'] = "Discounted Products";
                    $categoryDetails['categoryDetails']['description'] = "Discounted Products";
                    $categoryProducts = Product::select('products.id','products.section_id','products.category_id','products.brand_id','products.vendor_id','products.product_name','products.product_code','products.product_color','products.product_price','products.product_discount','products.product_image','products.description')->with('brand')->
                    join('categories','categories.id','=','products.category_id')->where('products.status',1)->where('products.product_discount','>',0);
                }else{
                    $search_product = $_REQUEST['search-bar'];
                    $categoryDetails['breadcrumbs'] = $search_product;
                    $categoryDetails['categoryDetails']['category_name'] = $search_product;
                    $categoryDetails['categoryDetails']['description'] = "Search Result for ".$search_product;
                    $categoryProducts = Product::select('products.id','products.section_id','products.category_id','products.brand_id','products.vendor_id','products.product_name','products.product_code','products.product_color','products.product_price','products.product_discount','products.product_image','products.description')->with('brand')->
                    join('categories','categories.id','=','products.category_id')->where(function($query)use($search_product){
                        $query->where('products.product_name','like','%'.$search_product.'%')
                        ->orWhere('products.product_code','like','%'.$search_product.'%')
                        ->orWhere('products.product_color','like','%'.$search_product.'%')
                        ->orWhere('products.description','like','%'.$search_product.'%')
                        ->orWhere('categories.category_name','like','%'.$search_product.'%');
                    })->where('products.status',1);
                }
                
                if(isset($_REQUEST['session_id']) && !empty($_REQUEST['session_id'])){
                    $categoryProducts = $categoryProducts->where('products.section_id',$_REQUEST['section_id']);
                }
                $categoryProducts = $categoryProducts->get();
                // dd($categoryProducts);
                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts'));
                //dd($categoryDetails['categoryDetails']['description']);
            }else{
                $url = Route::getFacadeRoot()->current()->uri(); 
                $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    
    
                if($categoryCount>0){
                    //Get Category Details
                    $categoryDetails = Category::categoryDetails($url);
                    $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
    
                    //Checking for sort
                    if(isset($_GET['sort']) && !empty($_GET['sort'])){
                        if($_GET['sort'] == "product_latest"){
                            $categoryProducts->orderby('products.id','Desc');
                        }else if($_GET['sort'] == "price_lowest"){
                            $categoryProducts->orderby('products.product_price','Asc');
                        }else if($_GET['sort'] == "price_highest"){
                            $categoryProducts->orderby('products.product_price','Desc');
                        }else if($_GET['sort'] == "name_z_a"){
                            $categoryProducts->orderby('products.product_name','Desc');
                        }else if($_GET['sort'] == "name_a_z"){
                            $categoryProducts->orderby('products.product_name','Asc');
                        }
                    }
                    $categoryProducts = $categoryProducts->paginate(3);
                    // dd($categoryDetails);
                    // echo "Category exists"; die;
                    $meta_title = $categoryDetails['categoryDetails']['meta_title'];
                    $meta_keywords = $categoryDetails['categoryDetails']['meta_keywords'];
                    $meta_description = $categoryDetails['categoryDetails']['meta_description'];
                    return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url','meta_title','meta_keywords','meta_description'));
                }
                else{
                    abort(404);
                }
            }
            
                }
       
    }

    public function vendorListing($vendorid){
        //Get Vendor Shop Name
        $getVendorShop = Vendor::getVendorShop($vendorid); 

        //Get Vendor Products
        $vendorProducts = Product::with('brand')->where('vendor_id',$vendorid)->where('status',1);
        $vendorProducts = $vendorProducts->paginate(30);
        // dd($vendorProducts);
        return view('front.products.vendor_listing')->with(compact('getVendorShop','vendorProducts'));
    }
    public function detail($id){
        $productDetails = Product::with(['section','category','brand','attributes'=>function($query){
            $query->where('stock','>',0)->where('status',1);
        },'images','vendor'])->find($id)->toArray();
        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);
        // dd($productDetails);

        //Get Similar Products
        $similarProducts = Product::with('brand')->where('category_id',$productDetails['category']['id'])->where('id','!=',$id)->limit(6)->inRandomOrder()->get()->toArray();
        // dd($similarProducts);

        //set session for recently viewed products
        if(empty(Session::get('session_id'))){
            $session_id = md5(uniqid(rand(), true));
        }else{
            $session_id = Session::get('session_id');
        }

        Session::put('session_id',$session_id);

        //Insert product in table if not already exists
        $countRecentlyViewedProducts = DB::table('recently_viewed_products')->where(['product_id'=>$id,'session_id'=>$session_id])->count();
        if($countRecentlyViewedProducts==0){
            DB::table('recently_viewed_products')->insert(['product_id'=>$id,'session_id'=>$session_id]);
        }

        // Get Recently Viewed Products Ids
        $recentProductsIds = DB::table('recently_viewed_products')->select('product_id')->where('product_id','!=',$id)->where('session_id',$session_id)->inRandomOrder()->get()->take(4)->pluck('product_id');
        // dd($recentProductsIds);

        //Get Recently Viewed Products
        $recentlyViewedProducts = Product::with('brand')->whereIn('id',$recentProductsIds)->get()->toArray();
        // dd($recentlyViewedProducts);

        //Get Group Products (Product Colors)
        $groupProducts = array();
        if(!empty($productDetails['group_code'])){
            $groupProducts = Product::select('id','product_image')->where('id','!=',$id)->where(['group_code'=>$productDetails['group_code'],'status'=>1])->get()->toArray();
            // dd($groupProducts);
        }

        //Get All Ratings of products
        $ratings = Rating::with('user')->where(['product_id'=>$id,'status'=>1])->get()->toArray();
        // dd($ratings);

        //Get Average Rating of product
        $ratingSum = Rating::where(['product_id'=>$id,'status'=>1])->sum('rating');
        $ratingCount = Rating::where(['product_id'=>$id,'status'=>1])->count();

        if($ratingCount>0){
            $avgRating = round($ratingSum/$ratingCount,2);
            $avgStarRating = round($ratingSum/$ratingCount);
        }else{
            $avgRating =0;
            $avgStarRating = 0;
        }
        
        $totalStock = ProductsAttribute::where('product_id',$id)->sum('stock');
        // dd($totalStock);
        $meta_title = $productDetails['meta_title'];
        $meta_keywords = $productDetails['meta_keywords'];
        $meta_description = $productDetails['meta_description'];
        return view('front.products.detail')->with(compact('productDetails','categoryDetails','similarProducts','recentlyViewedProducts','groupProducts','totalStock','meta_title','meta_keywords','meta_description','ratings','avgRating','avgStarRating'));
    }

    public function getProductPrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'],$data['size']);
            return $getDiscountAttributePrice;
        }
    }
    public function cartAdd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            Session::forget('couponAmount');
            Session::forget('couponCode');
            if($data['quantity']<=0){
                $data['quantity']=1;
            }
            //Check Product Stock is available or not
            $getProductStock = ProductsAttribute::getProductStock($data['product_id'],$data['size']); 
            if($getProductStock<$data['quantity']){
                return redirect()->back()->with('error_message','Required Quantity is not available');
            }

            //Generate Session Id if not exists
            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }
            
            //Check Product if already exists in the User Cart
            if(Auth::check()){
                //User is logged in
                $user_id= Auth::user()->id;
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>$user_id])->count();
            }else{
                //User is not logged in
                $user_id = 0;
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>$session_id])->count();
            }
            if($countProducts>0){
                return redirect()->back()->with('error_message','Product already exists in cart!');
            }

            //Save products in carts table
            $item = new Cart;
            $item->session_id = $session_id;
            $item->user_id = $user_id;
            $item->product_id = $data['product_id'];
            $item->size = $data['size'];
            $item->quantity= $data['quantity'];
            $item->save();
            return redirect()->back()->with('success_message','Product has been added in Cart<a style="text-decoration:underline !important;" href="/cart">View Cart</a>');
        }
    }

    public function cart(){
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);
        $meta_title = "Shopping Cart - Ye Mun";
        $meta_description = "Shopping Cart, ye mun website";
        return view('front.products.cart')->with(compact('getCartItems','meta_title','meta_description')); 
    }

    public function cartUpdate(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            Session::forget('couponAmount');
            Session::forget('couponCode');

            //Get cart details
            $cartDetails = Cart::find($data['cartid']);
            //Get Available Product stock
            $availableStock = ProductsAttribute::select('stock')->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])->first()->toArray();
            // echo "<pre>"; print_r($availableStock); die;
        
        // Check if desired Stock from user is available
        if($data['qty']>$availableStock['stock']){
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'status'=>false,
                'message'=>'Product Stock is not available',
                'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
        }

        //Check if product size is available
        $availableSize = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size'],'status'=>1])->count();
        if($availableSize==0){
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'status'=>false,
                'message'=>'Product Size is not available Please remove this Product and choose another one!',
                'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
        }

        //Update the quantity
            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            return response()->json([
                'status'=>true,
                'totalCartItems'=>$totalCartItems,
                'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
        ]);
        }
    }

    public function cartDelete(Request $request){
        if($request->ajax()){
            $data = $request->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            // echo "<pre>"; print_r($data); die;
            Cart::where('id',$data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();
            return response()->json([
                'totalCartItems'=>$totalCartItems,
                'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                ]);
        }
    }

    public function applyCoupon(Request $request){
        if($request->ajax()){
            $data = $request->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            // echo "<pre>"; print_r($data); die;
            $getCartItems = Cart::getCartItems();
            // echo "<pre>"; print_r($getCartItems); die;
            $totalCartItems = totalCartItems();
            $couponCount = Coupon::where('coupon_code',$data['code'])->count();
            if($couponCount==0){
                return response()->json([
                    'status'=>false,
                    'totalCartItems'=>$totalCartItems,
                    'message'=>'The Coupon is not valid.',
                    'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                    ]);
            }else{
                //Check for other coupon conditions

                //Check if coupon is not active
                $couponDetails = Coupon::where('coupon_code',$data['code'])->first();
                if($couponDetails->status==0){
                    $message = "The coupon is not active!";
                }

                //Check if coupon is expired
                $expiry_Date = $couponDetails->expiry_date;
                $current_Date = date('Y-m-d');
                if($expiry_Date<$current_Date){
                    $message = "The coupon is expired!";
                }

                //Check if coupon code is single time
                if($couponDetails->coupon_type == "Single Times"){
                    //Check in orders table if coupon already availed by the user
                    $couponCount = Order::where(['coupon_code'=>$data['code'],'user_id'=>Auth::user()->id])->count();
                    if($couponCount>=1){
                        $message = "This coupon code is already availed by you!";
                    }
                }
                //Check if coupon is from selected categories
                //Get all selected categories from coupon
                    $catArr = explode(",",$couponDetails->categories);
                //Check if any cart item not belong to coupon category
                $total_amount = 0;
                foreach($getCartItems as $key => $item){
                    if(!in_array($item['product']['category_id'],$catArr)){
                        $message = "This coupon code is not for one of the selected products";
                    }
                    $attrPrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                    // echo "<pre>";print_r($attrPrice);die;
                    $total_amount = $total_amount + ($attrPrice['final_price']*$item['quantity']);
                    // echo "<pre>";print_r($total_amount);die;

                }

                //Check if coupon is from selected users
                //Get all selected users from coupon and convert to array
                if(isset($couponDetails->users)&&!empty($couponDetails->users)){
                    $usersArr = explode(",",$couponDetails->users);
                    //Get User Id's of all selected users
                    if(count($usersArr)){
                        foreach($usersArr as $key=>$user){
                            $getUserId = User::select('id')->where('email',$user)->first()->toArray();
                            $usersId[] = $getUserId['id'];
                        }

                        //Check if any cart item not belong to coupon user
                        foreach($getCartItems as $item){
                            if(!in_array($item['user_id'],$usersId)){
                                $message = "This coupon code is not for you. try with the valid coupon code!";
                            }
                        }
                    }
                }

                //Check the vendors' coupon
                if($couponDetails->vendor_id>0){
                    // echo "<pre>";print_r($couponDetails->vendor_id); die;
                    $productIds = Product::select('id')->where('vendor_id',$couponDetails->vendor_id)->pluck('id')->toArray();
                    // echo "<pre>";print_r($productIds); die;

                    foreach($getCartItems as $item){
                        if(!in_array($item['product']['id'],$productIds)){
                            $message = "This coupon code is not for you. try with the valid coupon code!(Vendor Validation)";
                        }
                    }
                }

                //If error message is coming
                if(isset($message)){
                    return response()->json([
                        'status'=>false,
                        'totalCartItems'=>$totalCartItems,
                        'message'=>$message,
                        'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                        ]);
                }else{
                    //Coupon code is correct
                    //Check if coupon amount type is fixed or percentage
                    if($couponDetails->amount_type=="Fixed"){
                        $couponAmount = $couponDetails->amount;
                    }else{
                        $couponAmount = $total_amount * ($couponDetails->amount/100);
                    }

                    $grand_total = $total_amount - $couponAmount;

                    //Add Coupon code & amount in Session variables
                    Session::put('couponAmount',$couponAmount);
                    Session::put('couponCode',$data['code']);

                    $message = "Coupon code successfully applied. You are availing discount!";
                    return response()->json([
                        'status'=>true,
                        'totalCartItems'=>$totalCartItems,
                        'couponAmount'=>$couponAmount,
                        'grand_total'=>$grand_total,
                        'message'=>$message,
                        'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                        ]);
                }
            }
        }
    }

    public function checkout(Request $request){
        $countries = Country::where('status',1)->get()->toArray();
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);
        // dd($deliveryAddresses);
        if(count($getCartItems)==0){
            $message = "Shopping Cart is empty. Please add products to chekout";
            return redirect()->back()->with('error_message',$message);
        }
        $total_price = 0;
        $total_weight = 0;
        foreach ($getCartItems as $item) {
            // echo "<pre>";print_r($item); die;
            $attrPrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
            $total_price = $total_price + ($attrPrice['final_price']*$item['quantity']);
            $product_weight = $item['product']['product_weight']*$item['quantity'];;
            $total_weight = $total_weight + $product_weight;
        }
        $deliveryAddresses = DeliveryAddress::deliveryAddresses();
        foreach ($deliveryAddresses as $key => $value) {
            $shippingCharges = ShippingCharge::getShippingCharges($total_weight,$value['country']);
            $deliveryAddresses[$key]['shipping_charges'] = $shippingCharges;
            //COD Pincode is Available or not
            $deliveryAddresses[$key]['codpincodeCount'] = DB::table('cod_pincodes')->where('pincode',$value['pincode'])->count();
            //Prepaid Pincode is Available or not
            $deliveryAddresses[$key]['prepaidpincodeCount'] = DB::table('prepaid_pincodes')->where('pincode',$value['pincode'])->count();

        }
        // dd($deliveryAddresses);
       
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            //Website security
            foreach ($getCartItems as $item) {
                //Prevent Disabled Products to Order
                $product_status = Product::getProductStatus($item['product_id']);
                if($product_status==0){
                    // Product::deleteCartProduct($item['product_id']);
                    // $message = "One of the product is disabled! Please try again.";
                    $message = $item['product']['product_name']." with ".$item['size']." Size is not available. Please remove from cart and choose some other products.";
                    return redirect('/cart')->with('error_message',$message);
                }

                //Prevent Sold out product to Order
                $getProductStock = ProductsAttribute::getProductStock($item['product_id'],$item['size']);
                if($getProductStock == 0){
                    // Product::deleteCartProduct($item['product_id']);
                    // $message = "One of the product is sold out! Please try again.";
                    $message = $item['product']['product_name']." with ".$item['size']." Size is not available. Please remove from cart and choose some other products.";
                    return redirect('/cart')->with('error_message',$message);
                }

                //Prevent Disabled attribute to Order
                $getAttributeStatus = ProductsAttribute::getAttributeStatus($item['product_id'],$item['size']);
                if($getAttributeStatus == 0){
                    // Product::deleteCartProduct($item['product_id']);
                    // $message = "One of the product attribute is disabled! Please try again.";
                    $message = $item['product']['product_name']." with ".$item['size']." Size is not available. Please remove from cart and choose some other products.";
                    return redirect('/cart')->with('error_message',$message);
                }

                //Prevent Disabled Categorys products to order
                $getCategoryStatus = Category::getCategoryStatus($item['product']['category_id']);
                if($getCategoryStatus == 0){
                    // Product::deleteCartProduct($item['product_id']);
                    // $message = "One of the category is disabled! Please try again.";
                    $message = $item['product']['product_name']." with ".$item['size']." Size is not available. Please remove from cart and choose some other products.";
                    return redirect('/cart')->with('error_message',$message);
                }
            }
            //Delivery Address Validation
            if(empty($data['address_id'])){
                $message = "Please Select Delivery Address!";
                return redirect()->back()->with('error_message',$message);
            }

            //Payment Method Validation
            if(empty($data['payment_gateway'])){
                $message = "Please Select Payment Method!";
                return redirect()->back()->with('error_message',$message);
            }

            //Accept T & C Validation
            if(empty($data['accept_box'])){
                $message = "Please Click Accept Box to Agree T & C!";
                return redirect()->back()->with('error_message',$message);
            }
            
            //Get Delivery Address from address_id
            $deliveryAddress = DeliveryAddress::where('id',$data['address_id'])->first()->toArray();
            // dd($deliveryAddress);

            //Set Payment method as COD if COD is selected from user otherwise set as Prepaid
            if($data['payment_gateway']=="COD"){
                $payment_method = "COD";
                $order_status = "New";
            }else{
                $payment_method = "Prepaid";
                $order_status = "Pending";
            }

            DB::beginTransaction();
            //Fetch order total price
            $total_price = 0;
            foreach ($getCartItems as $item) {
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                $total_price =  $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']);
            }
             //Calculate Shipping Charges
             $shipping_charges = 0;

             //Get Shipping Charges
             $shipping_charges = ShippingCharge::getShippingCharges($total_weight,$deliveryAddress['country']);
             
             //Calculate grand total
             $grand_total = $total_price + $shipping_charges - Session::get('couponAmount');

             // Insert Grand total in Session Variable
             Session::put('grand_total',$grand_total);

             //Insert Order Details
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = $deliveryAddress['name'];
            $order->address = $deliveryAddress['address'];
            $order->city = $deliveryAddress['city'];
            $order->state = $deliveryAddress['state'];
            $order->country = $deliveryAddress['country'];
            $order->pincode = $deliveryAddress['pincode'];
            $order->mobile = $deliveryAddress['mobile'];
            $order->email = Auth::user()->email;
            $order->shipping_charges = $shipping_charges;
            $order->coupon_code = Session::get('couponCode');
            $order->coupon_amount = Session::get('couponAmount');
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_gateway = $data['payment_gateway'];
            $order->grand_total = $grand_total;
            $order->save();
            $order_id = DB::getPdo()->lastInsertId();
            foreach ($getCartItems as $item) {
                $cartItem = new OrdersProduct;
                $cartItem->order_id = $order_id;
                $cartItem->user_id = Auth::user()->id;
                $getProductDetails = Product::select('vendor_id','admin_id','product_name','product_code','product_color')->where('id',$item['product_id'])->first()->toArray();
                // dd($getProductDetails);
                $cartItem->admin_id = $getProductDetails['admin_id'];
                $cartItem->vendor_id = $getProductDetails['vendor_id'];
                if($getProductDetails['vendor_id']>0){
                    $vendorCommission = Vendor::getVendorCommission($getProductDetails['vendor_id']);
                    $cartItem->commission = $vendorCommission;
                }else{
                    $cartItem->commission = 0;
                }
                
                $cartItem->product_id = $item['product_id'];
                $cartItem->product_name = $getProductDetails['product_name'];
                $cartItem->product_code = $getProductDetails['product_code'];
                $cartItem->product_color = $getProductDetails['product_color'];
                $cartItem->product_size = $item['size'];
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                $cartItem->product_price = $getDiscountAttributePrice['final_price'];
                $cartItem->product_qty = $item['quantity'];
                $cartItem->item_status = "Pending";
                $cartItem->save();
                
                //Reduce Stock Script Starts
                $getProductStock = ProductsAttribute::getProductStock($item['product_id'],$item['size']);
                $newStock = $getProductStock - $item['quantity'];
                ProductsAttribute::where(['product_id'=>$item['product_id'],'size'=>$item['size']])->update(['stock'=>$newStock]);
                //Reduce Stock Script End
            }
            //Insert order_id in Session Variable
            Session::put('order_id',$order_id);

            DB::commit();

            $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();
            if($data['payment_gateway']=="COD"){
                //Send Order Email
            $email = Auth::user()->email;
            $messageData = [
                'email'=>$email,
                'name'=>Auth::user()->name,
                'order_id'=>$order_id,
                'orderDetails' => $orderDetails
            ];

            Mail::send('emails.order',$messageData,function($message)use($email){
                $message->to($email)->subject('Order Placed - StackDevelopers.in');
            });
            //Send Order SMS
            // $message = "Dear Customer, your order ".$order_id."has been successfully placed with Ye' Mun. We will intimate you once your order is shipped.";
            // $mobile = Auth::user()->mobile;
            // Sms::sendSms($message,$mobile);

            }else if($data['payment_gateway']=="Paypal"){
                //Paypal - Redirect user to Paypal page after saving order
                return redirect('/paypal');
            }else if($data['payment_gateway']=="iyzipay"){
                //Paypal - Redirect user to Paypal page after saving order
                return redirect('/iyzipay');
            }else{
                echo "Other Prepaid payment methods coming soon";
            }
            return redirect('thanks');
             
        }

        // echo $total_price; die;
        return view('front.products.checkout')->with(compact('deliveryAddresses','countries','getCartItems','total_price'));
    }

    public function thanks(){
        if(Session::has('order_id')){
            //Empty the cart
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('front.products.thanks');
        }else{
            return redirect('cart');
        }
    }

    public function checkPincode(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //COD Pincode is Available or not
            $codPincodeCount = DB::table('cod_pincodes')->where('pincode',$data['pincode'])->count();
            //Prepaid Pincode is Available or not
            $prepaidPincodeCount = DB::table('prepaid_pincodes')->where('pincode',$data['pincode'])->count();
            if($codPincodeCount==0 && $prepaidPincodeCount==0){
                echo "This pincode is not available for Delivery";
            }else{
                echo "This pincode is available for Delivery";
            }
        }
    }

}