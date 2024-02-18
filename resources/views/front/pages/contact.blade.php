
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
                                <li class="list-inline-item"><span>||</span> Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Contact -->
        <section class="register">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success: </strong><?php echo Session::get('success_message'); ?>
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
                        <form action="{{url('contact')}}" method="post">@csrf
                            <h5>Get In Touch With Us</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>First Name*</label>
                                    <input type="text" name="name" placeholder="Name" value="{{old('name')}}">
                                </div>
                                <div class="col-md-12">
                                    <label>Email Address*</label>
                                    <input type="text" name="email" placeholder="Your email address" value="{{old('email')}}">
                                </div>
                                <div class="col-md-12">
                                    <label>Subject</label>
                                    <input type="text" name="subject" placeholder="Subject" value="{{old('subject')}}">
                                </div>
                                <div class="col-md-12">
                                    <label>Message</label>
                                    <input type="text" name="message" placeholder="Message" value="{{old('message')}}">
                                </div>
                                
                                <div class="col-md-5 text-right">
                                    <button type="submit" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact -->
@endsection