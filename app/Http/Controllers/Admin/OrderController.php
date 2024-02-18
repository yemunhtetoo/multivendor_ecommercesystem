<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use App\Models\OrderItemStatus;
use App\Models\OrdersProduct;
use App\Models\OrdersLog;
use Session;
use Auth;
use Dompdf\Dompdf;

class OrderController extends Controller
{
    public function orders(){
        Session::put('page','orders');
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        if($adminType == "vendor"){
            $vendorStatus = Auth::guard('admin')->user()->status;
            if($vendorStatus == 0){
                return redirect("admin/update-vendor-details/personal")->with('error_message','Your vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details');
            }
        }
        if($adminType == "vendor"){
            $orders = Order::with(['orders_products'=>function($query)use($vendor_id){
                $query->where('vendor_id',$vendor_id);
            }])->orderBy('id','Desc')->get()->toArray();
        }else{
            $orders = Order::with('orders_products')->orderBy('id','Desc')->get()->toArray();
        }
                // dd($orders);
        return view('admin.orders.orders')->with(compact('orders'));
    }

    public function orderDetails($id){
        Session::put('page','orders');
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        $admin_id = Auth::guard('admin')->user()->id;

        if($adminType == "vendor"){
            $vendorStatus = Auth::guard('admin')->user()->status;
            if($vendorStatus == 0){
                return redirect("admin/update-vendor-details/personal")->with('error_message','Your vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details');
            }
        }
        
        if($adminType == "vendor"){
            $ordersId = Order::find($id);
        foreach ($ordersId['orders_products'] as $orderId){
            if(($orderId->vendor_id != $vendor_id) && ($adminType!="superadmin")) {
                $message = "Sorry, This page is restricted";
                return redirect('admin/orders')->with('error_message',$message);
            }
            $orderDetails = Order::with(['orders_products'=>function($query)use($vendor_id){
                $query->where('vendor_id',$vendor_id);
            }])->where('id',$id)->first()->toArray();
        }
        }
        else{
                $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        }
        // dd($orderDetails);
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        // dd($userDetails);
        $orderStatuses = OrderStatus::where('status',1)->get()->toArray();
        $orderItemStatuses = OrderItemStatus::where('status',1)->get()->toArray();
        $orderLog = OrdersLog::with('orders_products')->where('order_id',$id)->orderBy('id','Desc')->get()->toArray();

        // dd($orderLog);

        // Calculate total items in cart
        $total_items = 0;
        foreach ($orderDetails['orders_products'] as $product) {
          $total_items = $total_items + $product['product_qty'];
        }
// dd($total_items);
        //Calculate item discount
        if($orderDetails['coupon_amount']>0){
          $item_discount= round($orderDetails['coupon_amount']/$total_items,2);
        }else{
          $item_discount = 0;
        }

        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails','orderStatuses','orderItemStatuses','orderLog','item_discount'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            // echo "<pre>"; print_r($data); die;
            //Update Order Status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            
            //Update courier number and tracking number
            if(!empty($data['courier_name']) && !empty($data['tracking_number'])){
                    Order::where('id',$data['order_id'])->update(['courier_name'=>$data['courier_name'],'tracking_number'=>$data['tracking_number']]);
                }
            
            //Update Order Logs
            $log = new OrdersLog;
            $log->order_id = $data['order_id'];
            $log->order_status = $data['order_status'];
            $log->save();

            //Get Delivery Details 
            $deliveryDetails = Order::select('mobile','email','name')->where('id',$data['order_id'])->first()->toArray();
            // dd($deliveryDetals);

            $orderDetails = Order::with('orders_products')->where('id',$data['order_id'])->first()->toArray();
            
            if(!empty($data['courier_name']) && !empty($data['tracking_number'])){
                    //Send Order Status update Email
                    $email = $deliveryDetails['email'];
                    $messageData = [
                        'email'=>$email,
                        'name'=>$deliveryDetails['name'],
                        'order_id'=>$data['order_id'],
                        'orderDetails' =>$orderDetails,
                        'courier_name' =>$data['courier_name'],
                        'tracking_number'=>$data['tracking_number'],
                        'order_status' =>$data['order_status']
                    ];

                    Mail::send('emails.order_status',$messageData,function($message)use($email){
                            $message->to($email)->subject('Order Placed - StackDevelopers.in');
                        });

                        //Send Order Status update Sms
                        // $message = "Dear Customer, your order #".$data['order_id']."has been updated to ".$data['order_status']." placed with StackDevelopers.in";

                        // $mobile = $deliveryDetals['mobile'];
                        // Sms::sendSms($message,$mobile);
            }else{
                    //Send Order Status update Email
                    $email = $deliveryDetails['email'];
                    $messageData = [
                        'email'=>$email,
                        'name'=>$deliveryDetails['name'],
                        'order_id'=>$data['order_id'],
                        'orderDetails' =>$orderDetails,
                        'order_status' =>$data['order_status']
                    ];

                    Mail::send('emails.order_status',$messageData,function($message)use($email){
                        $message->to($email)->subject('Order Placed - StackDevelopers.in');
                    });

                    //Send Order Status update Sms
                    // $message = "Dear Customer, your order #".$data['order_id']."has been updated to ".$data['order_status']." placed with StackDevelopers.in";

                    // $mobile = $deliveryDetals['mobile'];
                    // Sms::sendSms($message,$mobile);
            }
            
            $message = "Order Status has been updated successfully";
            return redirect()->back()->with('success_message',$message);
        }
    }

    public function updateOrderItemStatus(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            // echo "<pre>"; print_r($data); die;
            //Update Order Item Status
            OrdersProduct::where('id',$data['order_item_id'])->update(['item_status'=>$data['order_item_status']]);

            //Update Item courier number and tracking number
            if(!empty($data['item_courier_name']) && !empty($data['item_tracking_number'])){
                OrdersProduct::where('id',$data['order_item_id'])->update(['courier_name'=>$data['item_courier_name'],'tracking_number'=>$data['item_tracking_number']]);
            }

            // $getOrderItemId  = OrdersProduct::where('product_id',$data['order_item_id'])->first()->toArray();
            // dd($getOrderItemId);
            //Get Order Id
            $getOrderId = OrdersProduct::select('order_id')->where('id',$data['order_item_id'])->first()->toArray();
            // dd($getOrderId);
        
            //Update Order Logs
            $log = new OrdersLog;
            $log->order_id = $getOrderId['order_id'];
            $log->order_item_id = $data['order_item_id'];
            $log->order_status = $data['order_item_status'];
            $log->save();

            //Get Delivery Details 
            $deliveryDetails = Order::select('mobile','email','name')->where('id',$getOrderId['order_id'])->first()->toArray();
            // dd($deliveryDetals);

            $order_item_id =$data['order_item_id'];
            // $orderDetails = Order::with(['orders_products'=>function($query)use($getOrderItemId){
            //     $query->where('id',$getOrderItemId['id']);
            // }])->where('id',$getOrderId['order_id'])->first()->toArray();
            $orderDetails = Order::with(['orders_products'=>function($query)use($order_item_id){
                $query->where('id',$order_item_id);
            }])->where('id',$getOrderId['order_id'])->first()->toArray();
            // dd($orderDetails);

            if(!empty($data['item_courier_name']) && !empty($data['item_tracking_number'])){
                //Send Order Status update Email
                $email = $deliveryDetails['email'];
                $messageData = [
                    'email'=>$email,
                    'name'=>$deliveryDetails['name'],
                    'order_id'=>$getOrderId['order_id'],
                    'orderDetails' =>$orderDetails,
                    'order_status' =>$data['order_item_status'],
                    'courier_name' =>$data['item_courier_name'],
                    'tracking_number'=>$data['item_tracking_number']
                ];

                Mail::send('emails.order_item_status',$messageData,function($message)use($email){
                    $message->to($email)->subject('Order Placed - StackDevelopers.in');
                });
            }else{
                //Send Order Status update Email
                $email = $deliveryDetails['email'];
                $messageData = [
                    'email'=>$email,
                    'name'=>$deliveryDetails['name'],
                    'order_id'=>$getOrderId['order_id'],
                    'orderDetails' =>$orderDetails,
                    'order_status' =>$data['order_item_status']
                ];

                Mail::send('emails.order_item_status',$messageData,function($message)use($email){
                    $message->to($email)->subject('Order Placed - StackDevelopers.in');
                });
            }
           
            $message = "Order Item Status has been updated successfully";
            return redirect()->back()->with('success_message',$message);
        }
    }

    public function viewOrderInvoice($order_id){
        $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
    }

    public function viewPDFInvoice($order_id){
        $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();

        $invoiceHTML = '<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <title>Example 1</title>
            <style>
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
              }
              
              a {
                color: #5D6975;
                text-decoration: underline;
              }
              
              body {
                position: relative;
                width: 21cm;  
                height: 29.7cm; 
                margin: 0 auto; 
                color: #001028;
                background: #FFFFFF; 
                font-family: Arial, sans-serif; 
                font-size: 12px; 
                font-family: Arial;
              }
              
              header {
                padding: 10px 0;
                margin-bottom: 30px;
              }
              
              #logo {
                text-align: center;
                margin-bottom: 10px;
              }
              
              #logo img {
                width: 90px;
              }
              
              h1 {
                border-top: 1px solid  #5D6975;
                border-bottom: 1px solid  #5D6975;
                color: #5D6975;
                font-size: 2.4em;
                line-height: 1.4em;
                font-weight: normal;
                text-align: center;
                margin: 0 0 20px 0;
                background: url(dimension.png);
              }
              
              #project {
                float: left;
              }
              
              #project span {
                color: #5D6975;
                text-align: right;
                width: 52px;
                margin-right: 10px;
                display: inline-block;
                font-size: 0.8em;
              }
              
              #company {
                float: right;
                text-align: right;
              }
              
              #project div,
              #company div {
                white-space: nowrap;        
              }
              
              table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px;
              }
              
              table tr:nth-child(2n-1) td {
                background: #F5F5F5;
              }
              
              table th,
              table td {
                text-align: center;
              }
              
              table th {
                padding: 5px 20px;
                color: #5D6975;
                border-bottom: 1px solid #C1CED9;
                white-space: nowrap;        
                font-weight: normal;
              }
              
              table .service,
              table .desc {
                text-align: left;
              }
              
              table td {
                padding: 20px;
                text-align: right;
              }
              
              table td.service,
              table td.desc {
                vertical-align: top;
              }
              
              table td.unit,
              table td.qty,
              table td.total {
                font-size: 1.2em;
              }
              
              table td.grand {
                border-top: 1px solid #5D6975;;
              }
              
              #notices .notice {
                color: #5D6975;
                font-size: 1.2em;
              }
              
              footer {
                color: #5D6975;
                width: 100%;
                height: 30px;
                position: absolute;
                bottom: 0;
                border-top: 1px solid #C1CED9;
                padding: 8px 0;
                text-align: center;
              }
            </style>
          </head>
          <body>
            <header class="clearfix">
              <div id="logo">
                INVOICE LETTER
              </div>
              <h1>INVOICE 3-2-1</h1>
              <div id="company" class="clearfix">
                <div>Invoice To</div>
                <div>'.$orderDetails['name'].'<br />'.$orderDetails['address'].'</div>
                <div>'.$orderDetails['city'].', '.$orderDetails['state'].', '.$orderDetails['country'].'-'.$orderDetails['pincode'].'</div>
                <div><a href="mailto:'.$orderDetails['email'].'">'.$orderDetails['email'].'</a></div>
              </div>
              <div id="project">
                <div><span>ORDER ID</span>'.$orderDetails['id'].' </div>
                <div><span>ORDER DATE</span>'.date("Y-m-d H:i:s", strtotime($orderDetails['created_at'])).'</div>
                <div><span>ORDER AMOUNT</span> '.$orderDetails['grand_total'].'</div>
                <div><span>ORDER STATUS</span>'.$orderDetails['order_status'].'</div>
                <div><span>PAYMENT METHOD</span> '.$orderDetails['payment_method'].'</div>
            
              </div>
            </header>
            <main>
              <table>
                <thead>
                  <tr>
                    <th class="service">Product Code</th>
                    <th class="desc">Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>TOTAL</th>
                  </tr>
                </thead>
                <tbody>';
                $subTotal = 0;
                foreach($orderDetails['orders_products'] as $product){
                  $invoiceHTML .=' 
                  <tr>
                    <td class="service">'.$product['product_code'].'</td>
                    <td class="desc">'.$product['product_size'].'</td>
                    <td class="desc">'.$product['product_color'].'</td>
                    <td class="qty">'.$product['product_qty'].'</td>
                    <td class="unit">'.$product['product_price'].'</td>
                    <td class="total">'.$product['product_price']*$product['product_qty'].'</td>
                  </tr>';
                  $subTotal = $subTotal + ($product['product_price']*$product['product_qty']);
                }

                  $invoiceHTML .='<tr>
                    <td colspan="4">SUBTOTAL</td>
                    <td class="total">'.$subTotal.'</td>
                  </tr>
                  <tr>
                    <td colspan="4">TAX </td>
                    <td class="total">0.00</td>
                  </tr>
                  <tr>
                    <td colspan="4">Coupon Discount</td>';
                    if($orderDetails['coupon_amount']>0){
                      $invoiceHTML .='<td class="total">'.$orderDetails['coupon_amount'].'</td>';
                    }else{
                      $invoiceHTML .='<td class="total">0.00</td>';
                    }
                   $invoiceHTML .='</tr>
                  <tr>
                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">'.$orderDetails['grand_total'].'</td>
                  </tr>
                </tbody>
              </table>
              <div id="notices">
                <div>NOTICE:</div>
                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
              </div>
            </main>
            <footer>
              Invoice was created on a computer and is valid without the signature and seal.
            </footer>
          </body>
        </html>';
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($invoiceHTML);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

}
