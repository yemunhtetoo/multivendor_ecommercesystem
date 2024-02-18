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
                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post"> @csrf
                            <h5>Create Your Account</h5>
                            <div class="row">
                                    <div class="col-md-12">
                                        <label for="vendorname">Name</label>
                                        <input type="text" id="vendorname" name="name" class="text-field" placeholder="Vendor Name">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="vendormobile">Mobile</label>
                                        <input type="text" id="vendormobile" name="mobile" class="text-field" placeholder="Vendor Mobile">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="vendoremail">Email</label>
                                        <input type="email" id="vendoremail" name="email" class="text-field" placeholder="Vendor Email">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="vendorpassword">Password</label>
                                        <input type="password" id="vendorpassword" name="password" class="text-field" placeholder="Vendor Password">
                                    </div>
                                    <div class="col-md-7">
                                        <div>
                                            <input type="checkbox" class="check-box" name="accept" id="accept">
                                            <label for="t-box">I have read the terms and condition.</label>
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