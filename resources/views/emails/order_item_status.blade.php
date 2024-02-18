<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width: 700px;">
        <tr><td>&nbsp;</td></tr>
        <tr><td><img src="{{asset('front/images/main-logo/stack-developers-logo.png')}}" alt=""></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Hello {{$name}}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Your order #{{$order_id}} Item status has been updated to {{ $order_status }}-</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>
            @if(!empty($courier_name) && !empty($tracking_number))
                Courier name is {{$courier_name}} and Tracking Number is {{$tracking_number}}
            @endif
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Order Order Item details are as belows: </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>
                <table style="width: 95%" cellpadding="5" style="#f7f4f4">
                    <tr style="#cccccc">
                        <td>Prouct Name </td>
                        <td>Prouct Code </td>
                        <td>Prouct Size </td>
                        <td>Prouct Color </td>
                        <td>Prouct Quantity </td>
                        <td>Prouct Price </td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $order)
                        <tr>   
                            <td>{{ $order['product_name']}}</td>
                            <td>{{ $order['product_code']}}</td>
                            <td>{{ $order['product_size']}}</td>
                            <td>{{ $order['product_color']}}</td>
                            <td>{{ $order['product_qty']}}</td>
                            <td>{{ $order['product_price']}}</td>
                        </tr>
                    @endforeach
                    
                </table>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td><strong>Delivery Adress:</strong></td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['name']}}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['address']}}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['city']}}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['state']}}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['country']}}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['pincode']}}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['mobile']}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>For any queries, you can contact at Ye' Mun</td></tr>
    </table>
</body>
</html>