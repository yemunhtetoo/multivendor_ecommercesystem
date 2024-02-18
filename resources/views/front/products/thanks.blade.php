<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Your order has been placed successfully</h3>
                        Your order number is {{Session::get('order_id')}} and grand total is Kyats {{Session::get('grand_total')}}
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End Shopping Cart -->
@endsection