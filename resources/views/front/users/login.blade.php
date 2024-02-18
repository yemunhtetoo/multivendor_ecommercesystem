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
                        <li class="list-inline-item"><span>||</span> Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<!-- Log In -->
<section class="login">
    <div class="container">
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
        <div class="row">
            <div class="col-md-6">
                <div class="n-customer">
                    <h5>New Customer</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem est eum earum eius dolores, alias modi aut officia quo perferendis id aspernatur neque provident quas, quidem libero veritatis voluptatum illum!</p>
                    <a href="{{ url('/user/register')}}">Create an Account</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="r-customer">
                    <h5>Registered Customer</h5>
                    <p>If you have an account with us, please log in.</p>
                    <p id="login-error"></p>
                    <form class="pt-3" id="loginForm" action="javascript:;" method="post">@csrf
                        <div class="emal">
                            <label for="user-email">Email address</label>
                            <input type="email" name="email" id="users-email" class="text-field" placeholder="Email">
                            <p id="login-email"></p>
                        </div>
                        <div class="pass">
                            <label for="user-password">Password</label>
                            <input type="password" name="password" id="users-password"  class="text-field" placeholder="Password">
                            <p id="login-password"></p>
                        </div>
                        <div class="d-flex justify-content-between nam-btm">
                            <div>
                                <input type="checkbox" name="rememberme" id="rmme">
                                <label for="rmme">Remember Me</label>
                            </div>
                            <div>
                                <a href="{{ url('user/forgot-password') }}">Lost your password?</a>
                            </div>
                        </div>
                        <button type="submit" name="button">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection