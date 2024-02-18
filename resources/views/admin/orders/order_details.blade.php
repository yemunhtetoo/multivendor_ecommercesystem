<?php use App\Models\Product;
 use App\Models\OrdersLog;
 use App\Models\Vendor;
 use App\Models\Coupon;
 if(Auth::guard('admin')->user()->type=="vendor"){
 $getVendorCommission = Vendor::getVendorCommission(Auth::guard('admin')->user()->vendor_id);
}
?>
@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Order No. #{{$orderDetails['id']}}</h3>
                        <h6 class="font-weight-normal mb-0"> <a href="{{ url('admin/orders')}}">Back To Orders</a></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong>{{Session::get('success_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
      
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Orders Details</h4>
                    <div class="form-group">
                        <label for="orderdate">Order ID: </label>
                        <label>{{$orderDetails['id']}}</label>
                    </div>
                    <div class="form-group" style="height: 15px">
                      <label for="orderdate" style="font-weight:550;">Order Date: </label>
                      <label>{{date("Y-m-d H:i:s", strtotime($orderDetails['created_at']))}}</label>
                    </div>
                    <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Order Status: </label>
                        <label>{{$orderDetails['order_status']}}</label>
                      </div>
                      <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Order Total: </label>
                        <label>{{$orderDetails['grand_total']}}</label>
                      </div>
                      <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Shipping Charges: </label>
                        <label>{{$orderDetails['shipping_charges']}}</label>
                      </div>
                      @if(!empty($orderDetails['coupon_code']))
                      <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Coupon Code :</label>
                        <label>{{$orderDetails['coupon_code']}}</label>
                      </div>
                      <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Coupon Amount :</label>
                        <label>{{$orderDetails['coupon_amount']}}</label>
                      </div>
                      @endif
                      <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Payment Method :</label>
                        <label>{{$orderDetails['payment_method']}}</label>
                      </div>
                      <div class="form-group" style="height: 15px">
                        <label for="orderdate" style="font-weight:550;">Payment Gateway :</label>
                        <label>{{$orderDetails['payment_gateway']}}</label>
                      </div>
                  
                </div>
              </div>
            </div>
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer Details</h4>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer Name :</label>
                    <label>{{$userDetails['name']}}</label>
                  </div>
                  @if(!empty($userDetails['address']))
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer Address :</label>
                    <label>{{$userDetails['address']}}</label>
                  </div>
                  @endif
                  @if(!empty($userDetails['city']))
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer City :</label>
                    <label>{{$userDetails['city']}}</label>
                  </div>
                  @endif
                  @if(!empty($userDetails['state']))
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer State :</label>
                    <label>{{$userDetails['state']}}</label>
                  </div>
                  @endif
                  @if(!empty($userDetails['country']))
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer Country :</label>
                    <label>{{$userDetails['country']}}</label>
                  </div>
                  @endif
                  @if(!empty($userDetails['pincode']))
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer Pincode :</label>
                    <label>{{$userDetails['pincode']}}</label>
                  </div>
                  @endif    
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Customer Email :</label>
                    <label>{{$userDetails['email']}}</label>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">  
                <div class="card-body">
                  <h4 class="card-title">Delivery Information</h4>
                 
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Name :</label>
                    <label>{{$orderDetails['name']}}</label>
                  </div>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Address :</label>
                    <label>{{$orderDetails['address']}}</label>
                  </div>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">City :</label>
                    <label>{{$orderDetails['city']}}</label>
                  </div>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">State :</label>
                    <label>{{$orderDetails['state']}}</label>
                  </div>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Country :</label>
                    <label>{{$orderDetails['country']}}</label>
                  </div>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;">Pincode :</label>
                    <label>{{$orderDetails['pincode']}}</label>
                  </div>
                  <div class="form-group" style="height: 15px">
                    <label for="orderdate" style="font-weight:550;"> Mobile :</label>
                    <label>{{$orderDetails['mobile']}}</label>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">  
                <div class="card-body">
                  
                  <h4 class="card-title">Update Order Status</h4>
                  @if(Auth::guard('admin')->user()->type != "vendor")
                  <form action="{{url('admin/update-order-status')}}" method="post">@csrf
                    <input type="hidden" name="order_id" value="{{$orderDetails['id']}}">
                    <select name="order_status" id="order_status" required="">
                      <option value="" selected="">Select</option>
                      @foreach ($orderStatuses as $status)
                          <option value="{{$status['name']}}" @if(!empty($orderDetails['order_status']) && $orderDetails['order_status']==$status['name']) selected="" @endif>{{$status['name']}}</option>
                      @endforeach
                    </select>
                    <input type="text" name="courier_name" id="courier_name" placeholder="Courier Name">
                    <input type="text" name="tracking_number" id="tracking_number" placeholder="Trucking Number">
                    <button type="submit">Update</button>
                  </form>
                  <br>
                  @foreach ($orderLog as $key=> $log)
                        <strong>{{ $log['order_status']}}</strong><br>
                        @if(isset($log['order_item_id'])&&$log['order_item_id']>0)
                        @php $getItemDetails = OrdersLog::getItemDetails($log['order_item_id']) @endphp
                        -for item {{$getItemDetails['product_code']}}
                          @if(!empty($getItemDetails['courier_name']))
                          <span>Courier Name: {{$getItemDetails['courier_name']}}</span>
                          @endif
                          @if(!empty($getItemDetails['tracking_number']))
                          <br><span>Tracking Number: {{$getItemDetails['tracking_number']}}</span>
                          @endif
                        @endif
                        
                        <br>{{date("Y-m-d H:i:s", strtotime($log['created_at']))}}
                        <hr>
                    @endforeach
                  @else
                  <h4>This feature is restricted.</h4>
                  @endif
                </div>
              </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">  
                <div class="card-body">
                  <h4 class="card-title">Ordered Products</h4>
                  <div style="overflow-x:auto;"> 
                  <table class="table table-striped table-borderless table-hover table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Unit Price</th>
                        <th>Producty Qty</th>
                        <th>Total Price</th>
                        @if(Auth::guard('admin')->user()->type!="vendor")
                        <th>Product By</th>
                        @endif
                        <th>Commission</th>
                        <th>Final Amount</th>
                        <th>Item Status</th>
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
                            <td>{{ $product['product_price']}}</td>
                            <td>{{ $product['product_qty']}}</td>
                            <td>
                              @if($product['vendor_id']>0)
                                  @if($orderDetails['coupon_amount']>0)
                                    @php $couponDetails = Coupon::couponDetails($orderDetails['coupon_code']);@endphp
                                      @if($couponDetails['vendor_id']>0)
                                        {{ $total_price = $product['product_price']*$product['product_qty']-$item_discount}}
                                      @else
                                        {{ $total_price = $product['product_price']*$product['product_qty']}}
                                      @endif
                                  @else
                                    {{ $total_price = $product['product_price']*$product['product_qty']}}
                                  @endif
                              @else
                                {{ $total_price = $product['product_price']*$product['product_qty']}}
                              @endif
                            </td>
                            @if(Auth::guard('admin')->user()->type!="vendor")
                              @if($product['vendor_id']>0)
                              <td>
                                <a target="_blank" href="/admin/view-vendor-details/{{$product['admin_id']}}">Vendor</a></td>
                              @else
                              <td>Admin</td>
                              @endif
                            @endif
                            @if($product['vendor_id']>0)
                                {{-- @php $getVendorCommission = Vendor::getVendorCommission($product['vendor_id']); @endphp --}}
                            <td>{{ $commission = round($total_price * $product['commission'] /100,2)}}</td>
                            <td>{{ $total_price - $commission}}</td>
                            @else
                            <td>0</td>
                            <td>{{$total_price}}</td>
                            @endif
                            <td>
                              <form action="{{url('admin/update-order-item-status')}}" method="post">@csrf
                                <input type="hidden" name="order_item_id" value="{{$product['id']}}">
                                <select name="order_item_status" id="order_item_status" required="">
                                  <option value="" selected="">Select</option>
                                  @foreach ($orderItemStatuses as $status)  
                                      <option value="{{$status['name']}}" @if(!empty($product['item_status']) && $product['item_status']==$status['name']) selected="" @endif>{{$status['name']}}</option>
                                  @endforeach
                                </select>
                                <input type="text" name="item_courier_name" id="item_courier_name" placeholder="Courier Name" @if(!empty($product['courier_name'])) value="{{$product['courier_name']}}" @endif>
                                <input type="text" name="item_tracking_number" id="item_tracking_number" placeholder="Tracking Number" @if(!empty($product['tracking_number'])) value="{{$product['tracking_number']}}" @endif>
                                <button type="submit">Update</button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
              </div>
                </div>
              </div>
            </div>
            

          </div>
        </div>
    @include('admin.layout.footer')
</div>
@endsection