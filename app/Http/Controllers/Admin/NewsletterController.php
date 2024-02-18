<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetterSubscriber;
use App\Exports\subscribersExport;
use Maatwebsite\Excel\Facades\Excel;

use Session;

class NewsletterController extends Controller
{
    public function subscribers(){
        Session::put('page','subscribers');
        $subscribers = NewsLetterSubscriber::get()->toArray();
        // dd($subscribers);
        return view('admin.subscribers.subscribers')->with(compact('subscribers'));
    }

    public function updateSubscriberStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else {
                $status = 1;
            }
            NewsLetterSubscriber::where('id',$data['subscriber_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subscriber_id'=>$data['subscriber_id']]);
        }
    }

    public function deleteSubscriber($id){
        //Delete page
        NewsLetterSubscriber::where('id',$id)->delete();
        $message = "Subscribers has been deleted successfully";
        return redirect()->back()->with('success_message',$message);
    }

    public function exportSubscribers(){
        return Excel::download(new subscribersExport,'subscribers.xlsx');
    }
    
}
