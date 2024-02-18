@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Orders</h4>
              <p class="card-description">
                {{-- Add class <code>.table-bordered</code> --}}
              </p>
              @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong>{{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
                  @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong>{{Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
              <div class="table-responsive pt-3">
                <table id="orders" class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>
                        Order ID
                      </th>
                      <th>
                        Order Date
                      </th>
                      <th>
                        Customer Name
                      </th>
                      <th>
                        Customer Email
                      </th>
                      <th>
                        Ordered Products
                      </th>
                      <th>
                        Order Amount
                      </th>
                      <th>
                        Order Status
                      </th>
                      <th>
                        Payment Method
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    @if($order['orders_products'])
                    <tr>
                      <td>
                        {{ $order['id']}}
                      </td>
                      <td>
                        {{date("Y-m-d H:i:s", strtotime($order['created_at']))}}
                      </td>
                      <td>
                        {{ $order['name']}}
                      </td>
                      <td>
                        {{$order['email']}}
                      </td>
                      <td>
                        @foreach ($order['orders_products'] as $product)
                            {{ $product['product_code'] }} ({{$product['product_qty']}})<br>
                        @endforeach
                    </td>
                      <td>
                        {{ $order['grand_total']}}
                      </td>
                      <td>
                        {{ $order['order_status']}}
                      </td>
                      <td>
                        {{ $order['payment_method']}}
                      </td>
                      <td>
                        <a href="{{url('admin/orders/'.$order['id'])}}" title=""><i style="font-size:25px;" class="mdi mdi-file-document"></i></a>
                        <a href="{{url('admin/orders/invoice/'.$order['id'])}}" title=""><i style="font-size:25px;" class="mdi mdi-printer"></i></a>
                        <a href="{{url('admin/orders/invoice/pdf/'.$order['id'])}}" title=""><i style="font-size:25px;" class="mdi mdi-file-pdf-box"></i></a>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection