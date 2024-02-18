<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Please make <span style="color:red">Kyats {{Session::get('grand_total')}}</span> payment for your order</h3>
                        <a href="{{url('iyzipay/pay')}}"><button>Pay Now</button></a>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End Shopping Cart -->
@endsection