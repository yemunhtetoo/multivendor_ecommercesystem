<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class IyzipayController extends Controller
{
    public function iyzipay(){
        if(Session::has('order_id')){
            return view('front.iyzipay.iyzipay');
        }else{
            return redirect('cart');
        }
    }

    public function pay(){
        echo Session::get('order_id');
        echo "Welcome To iyzipay";
    }
}
