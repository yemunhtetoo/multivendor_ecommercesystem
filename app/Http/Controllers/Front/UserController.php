<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Cart;
use App\Models\Country;
use Auth;
use Session;
use Hash;

class UserController extends Controller
{
    
    public function login(){
        return view('front.users.login');
    }

    public function register(){
        return view('front.users.register');
    }
    
    public function userRegister(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data); die;

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:100',
                'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email|max:150|unique:users',
                'password' => 'required|min:6',
                'accept' => 'required'
            ],
        [
            'accept.required' => 'Please accept our Terms & Conditions'
        ]);
            if($validator->passes()){
                //Register the User
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();

                /* Activate the user when user confirm his email account */
                $email = $data['email'];
                $messageData = ['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message)use($email){
                     $message->to($email)->subject('Confirm your stack developer account');
                 });

                 //Redirect back user with success message
                 $redirectTo = url('user/login');
                 return response()->json(['type'=>'success','url'=>$redirectTo,'message'=>'Please confirm your email to active your account']);
                /* Activate the user without confirming his email account */

                //Send Register Email
                // $email = $data['email'];
                // $messageData = ['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
                // Mail::send('emails.register',$messageData,function($message)use($email){
                //     $message->to($email)->subject('Welcome To Ecommerce ');
                // });
                
                // if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    
                //     $redirectTo = url('cart');
                //     //Update User Cart with user id
                //     if(!empty(Session::get('session_id'))){
                //         $user_id = Auth::user()->id;
                //         $session_id = Session::get('session_id');
                //         Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                //     }
                //     return response()->json(['type'=>'success','url'=>$redirectTo]);
                // }


            }else {
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }
    }

    public function userAccount(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'address' => 'required|string|max:100',
                'mobile' => 'required|numeric|digits:10',
                'pincode' => 'required|digits:5',
            ]
        );
        if($validator->passes()){
            //Update User Details
            User::where('id',Auth::user()->id)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'city'=>$data['city'],'state'=>$data['state'],'country'=>$data['country'],'pincode'=>$data['pincode'],'address'=>$data['address']]);
            //Redirect user back with success messages
            return response()->json(['type'=>'success','message'=>'your account information updated successfully']);
        }else{
            return response()->json(['type'=>'error','errors'=>$validator->messages()]);
        }
        }else{
            $countries = Country::where('status',1)->get()->toArray();
            return view('front.users.user_account')->with(compact('countries'));
        }
    }

    public function userUpdatePassword(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(),[
                'current_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:new_password',
            ]
        );
        if($validator->passes()){
            $current_password = $data['current_password'];
            $checkPassword = User::where('id',Auth::user()->id)->first();
            if(Hash::check($current_password,$checkPassword->password)){

                //Update Current User Password
                $user =User::find(Auth::user()->id);
                $user->password = bcrypt($data['new_password']);
                $user->save();
                //Redirect user back with success messages
                return response()->json(['type'=>'success','message'=>'your account password updated successfully']);

            }else{
                //Redirect user back with error messages
            return response()->json(['type'=>'incorrect','message'=>'your current password is incorrect']);
            }
            //Redirect user back with success messages
            return response()->json(['type'=>'success','message'=>'your account information updated successfully']);
        }else{
            return response()->json(['type'=>'error','errors'=>$validator->messages()]);
        }
        }else{
            $countries = Country::where('status',1)->get()->toArray();
            return view('front.users.user_account')->with(compact('countries'));
        }
    }

    public function forgotPassword(Request $request){
       if($request->ajax()){
        $data = $request->all();
    //    echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(),[
                'email' => 'required|email|max:150|exists:users',
            ],
        [
            'email.exists' => 'Email does not exists!'
        ]);

        if($validator->passes()){
            //$userDetails = User::where('email',$data['email'])->first();
            //Generate New Password
             $new_password = Str::random(14); 

             //Update New Password
             User::where('email',$data['email'])->update(['password'=>bcrypt($new_password)]);

             //Get User Details
             $userDetails = User::where('email',$data['email'])->first()->toArray();

             //Sent Email to User
             $email = $data['email'];
             $messageData = ['name'=>$userDetails['name'],'email'=>$email,'password'=>$new_password];
            Mail::send('emails.user_forgot_passsword',$messageData,function($message)use($email){
                $message->to($email)->subject('New Password - Ecommerce System');
            });

            //Show Success Message
            return response()->json(['type'=>'success','message'=>'New password sent to your registered email.']);
        }else{
            return response()->json(['type'=>'error','errors'=>$validator->messages()]);
        }
       }
       else{
        return view('front.users.forget_password');
       }
    }

    public function userLogin(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(),[
                'email' => 'required|email|max:150|exists:users',
                'password' => 'required|min:6',
            ]);

            if($validator->passes()){
                
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    if(Auth::user()->status ==0){
                        Auth::logout();
                        return response()->json(['type'=>'inactive','message'=>'Your account is inactive. Please confirm your account to activate your account.']);
                        
                    }
                    //Update User Cart with user id
                    if(!empty(Session::get('session_id'))){
                        $user_id = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                    }
                    $redirectTo = url('cart');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }else {
                    return response()->json(['type'=>'incorrect','message'=>'Incorrect Email or Password']);
                }
            }else {
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }
    }
    public function userLogout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function confirmAccount($code){
        $email = base64_decode($code);
        $userCount = User::where('email',$email)->count();
        if($userCount>0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                // Redirect the user to login/register Page with error message
                return redirect('user/login-page')->with('error_message','Your account is already activated. You can login now');
            }else{
                User::where('email',$email)->update(['status'=>1]);
                //Send Welcome Email
                $messageData = ['name'=>$userDetails->name,'mobile'=>$userDetails->mobile,'email'=>$email];
                Mail::send('emails.register',$messageData,function($message)use($email){
                    $message->to($email)->subject('Welcome To Ecommerce ');
                });

                // Redirect the user to login/register Page with success message
                return redirect('user/login-page')->with('success_message','Your account is activated. You can login now');
            }
        }else{
            abort(404);
        }
    }
}

