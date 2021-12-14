{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/pretty-checkbox.min.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ion.rangeSlider.min.css') }}" media="all">
@endsection

{{-- Content --}}
@section('content')

<!-- Menu  Section -->
<?php // @include('includes/nav-cc.php')?>
<!-- Menu  Section -->

<!-- Start banner slider -->
<section id="banner-slider-detail">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/product-1.png') }}');">
                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/product-2.png') }}');">

                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/product-1.png') }}');">

                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/product-2.png') }}');">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner slider -->
<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-content">
                <h2>Art & Craft - <br>Crafting</h2>
                <hr class="mt-0">
                <h6 class="about-school">About the School</h6>
                <div class="row">
                    <div class="col-8">
                        <div class="creater row">
                            <div class="col-auto">
                                <img src="{{ asset('frontend/images/creater-image3.png') }}" class="rounded-circle" width="64" height="64"
                                    alt="Tbug">
                            </div>
                            <div class="col-auto pl-0">
                                <h6 class="creater-name red">Tbug</h6>
                                <img src="{{ asset('frontend/images/like.png') }}" width="22" alt="icon" />
                                <span class="like-count">10k</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#" class="read-profile">See Full Profile</a>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.
                </p>

                <h6 class="about-course"> About the Course</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.
                </p>
                <div class="item-wrapper">
                    <div class="sku-no item">
                        <label>SKU:</label>
                        <span>76645</span>
                    </div>
                    <div class="category item">
                        <label>Category:</label>
                        <span><u>Visual Art</u></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 right-content">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-class-tab" data-toggle="tab" href="#nav-class"
                            role="tab" aria-controls="nav-class" aria-selected="true">List of Classes</a>
                        <a class="nav-item nav-link" id="nav-faq-tab" data-toggle="tab" href="#nav-faq" role="tab"
                            aria-controls="nav-faq" aria-selected="false">FAQ <span class="tag count">4</span></a>
                    </div>
                </nav>
                <div class="tab-content px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-class" role="tabpanel"
                        aria-labelledby="nav-class-tab">
                        <table width="100%">
                            <thead>
                                <th>Class Name</th>
                                <th>Duration</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. Introduction to Crafting</td>
                                    <td>15 minutes</td>
                                </tr>
                                <tr>
                                    <td>2. Crafting 1</td>
                                    <td>35 minutes</td>
                                </tr>
                                <tr>
                                    <td>2. Crafting 2</td>
                                    <td>25 minutes</td>
                                </tr>
                                <tr>
                                    <td>2. Crafting 3</td>
                                    <td>30 minutes</td>
                                </tr>
                                <tr>
                                    <td>2. Crafting 4</td>
                                    <td>45 minutes</td>
                                </tr>
                                <tr>
                                    <td>Final Lesson</td>
                                    <td>1 hour 3 minutes</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="total-wrapper row">
                            <div class="col-6">
                                <div class="total">36.23 SGD</div>
                                <strike>48.56 USD</strike>
                            </div>
                            <div class="text-right col-6">
                                <button class="btn btn-red btn-addcart"><i class="fa fa-plus"></i> Add to cart</button>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-faq" role="tabpanel" aria-labelledby="nav-faq-tab">

                        <div class="nicescroll">
                            <div class="faq-item">
                                <h5>Lorem ipsum dolor sit amet, consectetur?</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                            <div class="faq-item">
                                <h5>Lorem ipsum dolor sit amet, consectetur?</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                            <div class="faq-item">
                                <h5>Lorem ipsum dolor sit amet, consectetur?</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                            <div class="faq-item">
                                <h5>Lorem ipsum dolor sit amet, consectetur?</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                        </div>
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
                <h3>More classes</h3>
            </div>
            <div class="col-4 text-right read-more-wrap">
                <a href="#" class="read-more">Read More<img src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon"></a>
            </div>
        </div>
        <div class="row m-tab-slider">
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                    </div>
                    <!--  <div class="move-text-left-top">
          <div class="tag bg-red">Live Class</div>
        </div> -->
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                        <h6 class="creater-name">Creator Name</h6>
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
                        <img src="{{ asset('frontend/images/product-2.png') }}" alt="product name" class="rounded">
                    </div>
                    <!-- <div class="move-text-left-top">
          <div class="tag bg-orange">Pre-Recorded</div>
        </div> -->
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                        <h6 class="creater-name">Creator Name</h6>
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
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                    </div>
                    <!-- <div class="move-text-left-top">
          <div class="tag bg-orange">Pre-Recorded</div>
        </div> -->
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                        <h6 class="creater-name">Creator Name</h6>
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
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                    </div>
                    <!-- <div class="move-text-left-top">
          <div class="tag bg-red">Live Class</div>
        </div> -->
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                        <h6 class="creater-name">Creator Name</h6>
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

<!-- Start Class Tags -->
<section>
    <div class="container tag-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h5>Class tags</h5>
                <ul>
                    <li><a href="#" class="tag bg-gray">Crafting</a></li>
                    <li><a href="#" class="tag bg-gray">Drawing</a></li>
                    <li><a href="#" class="tag bg-gray">Painting</a></li>
                    <li><a href="#" class="tag bg-gray">Clay</a></li>
                    <li><a href="#" class="tag bg-gray">Playdough</a></li>
                    <li><a href="#" class="tag bg-gray">Watercolor</a></li>
                    <li><a href="#" class="tag bg-gray">Mini Bookmarks</a></li>
                    <li><a href="#" class="tag bg-gray">Faux Stained Glass</a></li>
                    <li><a href="#" class="tag bg-gray">Chalk Rocks</a></li>
                    <li><a href="#" class="tag bg-gray">Yarn Sticks</a></li>
                    <li><a href="#" class="tag bg-gray">Paper Shapes</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Class Tags -->

@endsection
