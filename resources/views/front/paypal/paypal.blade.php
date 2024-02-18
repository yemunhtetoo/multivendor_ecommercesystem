<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

        <section class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Please make payment for your order</h3>
                        <form action="#" method="post">@csrf
                            <input type="text" name="amount" value="{{round(Session::get('grand_total')/80,2)}}">
                            <input type="image" src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/34_Blue_CheckOut_Pill_Button.png">
                        </form>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End Shopping Cart -->
@endsection