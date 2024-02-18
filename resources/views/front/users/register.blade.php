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
                    <div class="col-md-12">
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
                        <form id="registerForm" action="javascript:;" method="post"> @csrf
                            <h5>Create Your Account</h5>
                            <p id="register-success"></p>
                            <div class="row">
                                    <div class="col-md-12">
                                        <label for="username">Name</label>
                                        <input type="text" id="user-name" name="name" class="text-field" placeholder="user Name">
                                        <p id="register-name"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="usermobile">Mobile</label>
                                        <input type="text" id="user-mobile" name="mobile" class="text-field" placeholder="user Mobile">
                                        <p id="register-mobile"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="useremail">Email</label>
                                        <input type="email" id="user-email" name="email" class="text-field" placeholder="user Email">
                                        <p id="register-email"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="userpassword">Password</label>
                                        <input type="password" id="user-password" name="password" class="text-field" placeholder="user Password">
                                        <p id="register-password"></p>
                                    </div>
                                    <div class="col-md-7">
                                        <div>
                                            <input type="checkbox" class="check-box" name="accept" id="accept">
                                            <label for="t-box">I have read the terms and condition.</label>
                                        <p id="register-accept"></p>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="c-box" id="c-box">
                                            <label for="c-box">Subscribe for newsletter</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <button type="submit" name="button">Submit</button>
                                    </div>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Register -->

@endsection