
@extends('front.layout.layout')
@section('content')
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{ url('/') }}">Home</a></li>||
                                <li class="list-inline-item"><a href="">{{ $cmsPageDetails['title']}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- About Area -->
        <section class="about-us">
            <div class="container">
                <div class="row">
                        
                    <div class="col-md-12">
                        <div class="wc-box">
                            <h4>Welcome to <span>XeMart</span></h4>
                            <p><?php echo $cmsPageDetails['description']; ?></p>
                            <a href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row his-mis">
                            <div class="col-md-4">
                                <div class="about-bnr">
                                    <a href="#"><img src="images/banner-1.png" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="about-bnr">
                                    <a href="#"><img src="images/banner-2.png" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="about-bnr">
                                    <a href="#"><img src="images/banner-3-1.png" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="history">
                                    <h5>Our History</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ut iure doloribus ratione quia nam ducimus nemo, culpa vero eveniet magni fugit non nemo quas dolorum nisi ducimus laboriosam.</p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check"></i>Numquam nesciunt, ex obcaecati libero asperiores</li>
                                        <li><i class="fa fa-check"></i>Ipsa ut iure doloribus ratione quia nam ducimus</li>
                                        <li><i class="fa fa-check"></i>Reprehenderit ratione minus commodi magni</li>
                                        <li><i class="fa fa-check"></i>Porro et laudantium, atque similique</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="history">
                                    <h5>Our Mission</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam veniam doloribus officiis fuga! Laboriosam ea, earum! Molestias unde alias, soluta cupiditate possimus, vel, iste impedit provident numquam voluptatum enim? Tempora ratione minus commodi magni fugit non nemo quas dolorum nisi ducimus. Qui Lorem ipsum dolor sit amet.<br> Eos ipsum, ut! Numquam nesciunt, ex obcaecati libero asperiores reprehende ratione minus commodi magni fugit non nemo quas asperiores reprehende ratione minus commodi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->
        
@endsection