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
                        <p id="forgot-error"></p>
                        <p id="forgot-success"></p>
                        <form id="forgotForm" action="javascript:;" method="post"> @csrf
                            <h5>Forget Password</h5>
                            
                            <div class="row">
                                   
                                    <div class="col-md-12">
                                        <label for="useremail">Email</label>
                                        <input type="email" id="user-email" name="email" class="text-field" placeholder="user Email">
                                        <p id="forgot-email"></p>
                                    </div>
                                    <div class="col-md-7">
                                        <div>
                                            <a href="{{ url('user/login') }}">Back To Login</a>
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