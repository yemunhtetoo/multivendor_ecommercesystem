<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Your orders</h3><br>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-borderless">
                            <tr>
                                <th>Order Id</th>
                                <th>Ordered Products</th>
                                <th>Payment Method</th>
                                <th>Grand Total</th>
                                <th>Created on</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td><a href="{{ url('user/orders/'.$order['id']) }}">{{$order['id']}}</a></td>
                                    <td>
                                        @foreach ($order['orders_products'] as $product)
                                            {{ $product['product_code'] }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{$order['payment_method']}}</td>
                                    <td>{{$order['grand_total']}}</td>
                                    <td>{{date("Y-m-d H:i:s", strtotime($order['created_at']))}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End Shopping Cart -->
@endsection