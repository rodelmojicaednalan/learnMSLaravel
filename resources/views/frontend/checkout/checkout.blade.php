{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional styles for this specific page --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

<section>
    <div class="container">
        <div class="congrats-wrapper">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>We’ve Received your order!</h2>
                    <h5>Transaction no# 700184246651</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="rounded-border item-details">
                    <h3>Order Summary</h3>
                    <p class="text-gray-2">Lorem ipsum donorsi amet lorem ipsum donorsi amet.</p>

                    <div class="class-item"><!-- Start class item -->
                        <div class="row">
                            <div class="col-md-9">
                                <h6>Art &amp; Craft - Drawing Shapes having a long line</h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12 text-wrapper">
                                                <div class="item">
                                                    <label>
                                                        Duration:
                                                    </label>
                                                    <!-- total hours of videos -->
                                                    <span><b>3h 3mins</b></span>
                                                </div><!-- End item -->
                                                <div class="item">
                                                    <label>
                                                        Total videos:
                                                    </label>
                                                    <div class="pl-1 dropdown dropdown-style-2 video-dropdown-wrapper">
                                                        <a class="dropdown-toggle" href="#" role="button" id="video-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            3
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="video-dropdown">
                                                            <div class="left-wrapper">
                                                                <h5>Title</h5>
                                                            </div>
                                                            <div class="right-wrapper">
                                                                <h5>Duration</h5>
                                                            </div>

                                                            <hr>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <h6 class="title">Lesson 1 : Introduction to drawing</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    40 min
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <h6 class="title">Lesson 2 : Drawing shapes</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    60 min
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <h6 class="title">Lesson 3 : Drawing lines</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    40 min
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- End item -->
                                            </div><!-- End text wrapper -->
                                            <div class="col-md-7 item-wrapper">
                                                <div class="item">
                                                    <label>
                                                        Tagged Curriculum:
                                                    </label>
                                                    <span><b>Drawing Shapes</b></span>
                                                </div><!-- End item -->
                                                <div class="item">
                                                    <label>
                                                        Creator:
                                                    </label>
                                                    <span><img src="http://127.0.0.1:8080/frontend/images/creater-image1.png" width="16" height="16"> <a href="#" class="red text-decoration-underline">Teacher name</a></span>
                                                </div><!-- End item -->
                                            </div><!-- End item wrapper -->
                                            
                                        </div><!-- End row -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </div><!-- End col 9 -->
                            <div class="col-md-3 col-sm-12 image-wrapper">
                                <div class="image-bg" style="background-image: url('http://127.0.0.1:8080/frontend/images/product-1.png');">
                                </div>
                               
                            </div><!-- End col 3 -->
                        </div><!-- End row -->
                        <div class="row price-item-wrapper">
                            <div class="col-12">
                                <div class="item">
                                    <label>Price:</label>
                                    <span class="red">36.99 USD</span>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- End class item -->
                    <div class="class-item"><!-- Start class item -->
                        <div class="row">
                            <div class="col-md-9">
                                <h6>Art &amp; Craft - Drawing Shapes having a long line</h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12 text-wrapper">
                                                <div class="item">
                                                    <label>
                                                        Duration:
                                                    </label>
                                                    <!-- total hours of videos -->
                                                    <span><b>3h 3mins</b></span>
                                                </div><!-- End item -->
                                                <div class="item">
                                                    <label>
                                                        Total videos:
                                                    </label>
                                                    <div class="pl-1 dropdown dropdown-style-2 video-dropdown-wrapper">
                                                        <a class="dropdown-toggle" href="#" role="button" id="video-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            3
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="video-dropdown">
                                                            <div class="left-wrapper">
                                                                <h5>Title</h5>
                                                            </div>
                                                            <div class="right-wrapper">
                                                                <h5>Duration</h5>
                                                            </div>

                                                            <hr>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                    <h6 class="title">Lesson 1 : Introduction to drawing</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    40 min
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                    <h6 class="title">Lesson 2 : Drawing shapes</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    60 min
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                    <h6 class="title">Lesson 3 : Drawing lines</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    40 min
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- End item -->
                                            </div><!-- End text wrapper -->
                                            <div class="col-md-7 item-wrapper">
                                                <div class="item">
                                                    <label>
                                                        Tagged Curriculum:
                                                    </label>
                                                    <span><b>Drawing Shapes</b></span>
                                                </div><!-- End item -->
                                                <div class="item">
                                                    <label>
                                                        Creator:
                                                    </label>
                                                    <span><img src="http://127.0.0.1:8080/frontend/images/creater-image1.png" width="16" height="16"> <a href="#" class="red text-decoration-underline">Teacher name</a></span>
                                                </div><!-- End item -->
                                            </div><!-- End item wrapper -->
                                            
                                        </div><!-- End row -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </div><!-- End col 9 -->
                            <div class="col-md-3 col-sm-12 image-wrapper">
                                <div class="image-bg" style="background-image: url('http://127.0.0.1:8080/frontend/images/product-1.png');">
                                </div>
                               
                            </div><!-- End col 3 -->
                        </div><!-- End row -->
                        <div class="row price-item-wrapper">
                            <div class="col-12">
                                <div class="item">
                                    <label>Price:</label>
                                    <span class="red">36.99 USD</span>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- End class item -->
                    <div class="class-item"><!-- Start class item -->
                        <div class="row">
                            <div class="col-md-9">
                                <h6>Art &amp; Craft - Drawing Shapes having a long line</h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12 text-wrapper">
                                                <div class="item">
                                                    <label>
                                                        Duration:
                                                    </label>
                                                    <!-- total hours of videos -->
                                                    <span><b>3h 3mins</b></span>
                                                </div><!-- End item -->
                                                <div class="item">
                                                    <label>
                                                        Total videos:
                                                    </label>
                                                    <div class="pl-1 dropdown dropdown-style-2 video-dropdown-wrapper">
                                                        <a class="dropdown-toggle" href="#" role="button" id="video-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            3
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="video-dropdown">
                                                            <div class="left-wrapper">
                                                                <h5>Title</h5>
                                                            </div>
                                                            <div class="right-wrapper">
                                                                <h5>Duration</h5>
                                                            </div>

                                                            <hr>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                    <h6 class="title">Lesson 1 : Introduction to drawing</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    40 min
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                    <h6 class="title">Lesson 2 : Drawing shapes</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    60 min
                                                                </div>
                                                            </a>
                                                            <a class="dropdown-item video-item">
                                                                <div class="left-wrapper">
                                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                    <h6 class="title">Lesson 3 : Drawing lines</h6>
                                                                </div>
                                                                <div class="right-wrapper red">
                                                                    40 min
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!-- End item -->
                                            </div><!-- End text wrapper -->
                                            <div class="col-md-7 item-wrapper">
                                                <div class="item">
                                                    <label>
                                                        Tagged Curriculum:
                                                    </label>
                                                    <span><b>Drawing Shapes</b></span>
                                                </div><!-- End item -->
                                                <div class="item">
                                                    <label>
                                                        Creator:
                                                    </label>
                                                    <span><img src="http://127.0.0.1:8080/frontend/images/creater-image1.png" width="16" height="16"> <a href="#" class="red text-decoration-underline">Teacher name</a></span>
                                                </div><!-- End item -->
                                            </div><!-- End item wrapper -->
                                            
                                        </div><!-- End row -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </div><!-- End col 9 -->
                            <div class="col-md-3 col-sm-12 image-wrapper">
                                <div class="image-bg" style="background-image: url('http://127.0.0.1:8080/frontend/images/product-1.png');">
                                </div>
                               
                            </div><!-- End col 3 -->
                        </div><!-- End row -->
                        <div class="row price-item-wrapper">
                            <div class="col-12">
                                <div class="item">
                                    <label>Price:</label>
                                    <span class="red">36.99 USD</span>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- End class item -->
                    <hr>
                    <div class="row subtotal-wrap">
                        <div class="col-7">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-5">
                             <h6 class="text-right">73.98 USD</h6>
                        </div>
                    </div>
                    <div class="row total-wrap">
                        <div class="col-7">
                            <h6>Total Order</h6>
                        </div>
                        <div class="col-5">
                             <h3 class="total-price red text-right">89.84 USD</h3>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5 detail-wrapper pl-md-35">
                <h4>Details</h4>
                <hr>
                <div class="d-flex mb-2">
                    <label>Payment Method</label>
                    <span>Credit Card</span>
                </div>
                <div class="item">
                    <label>Additional Information</label>
                    <div class="rounded-border">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


    <!-- Related Products -->
<section id="related-cc" class="product-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3>Recommended Classes</h3>
            </div>
            <div class="col-4 text-right read-more-wrap">
                <a href="{{ url('classes') }}" class="read-more">More classes<img src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon" /></a>
            </div>
        </div>
        <div class="row m-tab-slider">
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded" />
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">Creater Name</h6>
                    </div>
                    <h5> Art & Craft - Drawing Shapes</h5>
                    <p class="desc">Space for a small product description </p>
                    <div class="row">
                        <div class="price col-6">
                            1.48 SGD
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-secondary">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-2.png') }}" alt="product name" class="rounded" />
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">Creater Name</h6>
                    </div>
                    <h5> Art & Craft - Drawing Shapes</h5>
                    <p class="desc">Space for a small product description </p>
                    <div class="row">
                        <div class="price col-6">
                            1.48 SGD
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-secondary">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded" />
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">Creater Name</h6>
                    </div>
                    <h5> Art & Craft - Drawing Shapes</h5>
                    <p class="desc">Space for a small product description </p>
                    <div class="row">
                        <div class="price col-6">
                            1.48 SGD
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-secondary">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-2.png') }}" alt="product name" class="rounded" />
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">Creater Name</h6>
                    </div>
                    <h5> Art & Craft - Drawing Shapes</h5>
                    <p class="desc">Space for a small product description </p>
                    <div class="row">
                        <div class="price col-6">
                            1.48 SGD
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-secondary">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Related Products -->
@endsection

{{-- Additional scripts for this specific page --}}
@section('scripts')
   
@endsection
