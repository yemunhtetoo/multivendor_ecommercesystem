@extends('front.layout.layout')
@section('content')

        <!-- Breadcrumb Area -->
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="">Home</a></li>
                                <li class="list-inline-item"><span>||</span> Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Register -->
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
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
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: </strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form id="accountForm" action="javascript:;" method="post"> @csrf
                            <h5>Update Contact Details</h5>
                            <p id="account-success"></p>
                            <p id="account-error"></p>
                            <div class="row">
                                    <div class="col-md-12">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="text-field" value="{{ Auth::user()->email }}" readonly="" disabled="" style="background-color: #f9f9f9;">
                                        <p id="account-email"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="useremail">Name</label>
                                        <input type="text" class="text-field" id="user-name" name="name" value="{{ Auth::user()->name }}">
                                        <p id="account-name"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="useremail">Address</label>
                                        <input type="text" class="text-field" id="user-address" name="address" value="{{ Auth::user()->address }}">
                                        <p id="account-address"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="usercity">City</label>
                                        <input type="text" class="text-field" id="user-city" name="city" value="{{ Auth::user()->city }}">
                                        <p id="account-city"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="userstate">State</label>
                                        <input type="text" class="text-field" id="user-state" name="state" value="{{ Auth::user()->state }}">
                                        <p id="account-state"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="usercountry">Country</label>
                                        <select name="country" id="user-country">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country['country_name']}}" @if($country['country_name']==Auth::user()->country) selected @endif>{{$country['country_name']}}</option>
                                            @endforeach
                                        </select>
                                        <p id="account-country"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="userpincode">Pincode</label>
                                        <input type="text" class="text-field" id="user-pincode" name="pincode" value="{{ Auth::user()->pincode }}">
                                        <p id="account-pincode"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="usermobile">Mobile</label>
                                        <input type="text" class="text-field" id="user-mobile" name="mobile" value="{{ Auth::user()->mobile }}">
                                        <p id="account-mobile"></p>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <button type="submit" name="button">Update</button>
                                    </div>
                            </div>
                        </form>

                        
                    </div>

                    <div class="col-md-6">
                        <form id="passwordForm" action="javascript:;" method="post"> @csrf
                            <h5>Update Password</h5>
                            <p id="password-success"></p>
                            <p id="password-error"></p>
                            <div class="row">
                                    <div class="col-md-12">
                                        <label for="current-password">Current Password</label>
                                        <input type="password" class="text-field" id="current-password" name="current_password" placeholder="Current Password">
                                        <p id="password-current_password"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="useremail">New Password</label>
                                        <input type="password" class="text-field" id="new-password" name="new_password" placeholder="New Password">
                                        <p id="password-new_password"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="usercity">Confirm Password</label>
                                        <input type="password" class="text-field" id="confirm-password" name="confirm_password" placeholder="Confirm Password">
                                        <p id="password-confirm_password"></p>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <button type="submit" name="button">Update</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End account -->

@endsection