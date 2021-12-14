{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')

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
                <h2>Art & Craft - <br>Drawing Shapes</h2>
                <hr class="mt-0">
                <h6 class="about-teacher">About the Teacher</h6>
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
                        <a class="nav-item nav-link active" id="nav-timetable-tab" data-toggle="tab"
                            href="#nav-timetable" role="tab" aria-controls="nav-timetable" aria-selected="true">Time
                            Table</a>
                        <a class="nav-item nav-link" id="nav-faq-tab" data-toggle="tab" href="#nav-faq" role="tab"
                            aria-controls="nav-faq" aria-selected="false">FAQ <span class="tag count">5</span></a>
                    </div>
                </nav>
                <div class="tab-content px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-timetable" role="tabpanel"
                        aria-labelledby="nav-timetable-tab">
                        <div class="date-filter">
                            <div class="date">
                                <label>Select Available Date</label>
                                <select class="selectmenu" id="date-from">
                                    <option>Select date</option>
                                    <!--
                  <option selected value="2021-06-14">Monday, 14 06 2021</option>
                  <option value="2021-06-15">Tuesday, 15 06 2021</option>
                  <option value="2021-06-16">Wednesday, 16 06 2021</option>
                  <option value="2021-06-17">Thursday, 17 06 2021</option> -->
                                </select>
                                <!-- <div class="dropdown">
<button class="btn btn-full-width dropdown-toggle" type="button" id="date-frombtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Select date
</button>
<div class="dropdown-menu" aria-labelledby="date-frombtn">
<a class="dropdown-item" href="javascript:void(0)">Monday, 14/06/2021</a>
<a class="dropdown-item" href="javascript:void(0)">Tuesday, 15/06/2021</a>
<a class="dropdown-item" href="javascript:void(0)">Wednesday, 16/06/2021</a>
<a class="dropdown-item" href="javascript:void(0)">Thursday, 17/06/2021</a>
<a class="dropdown-item" href="javascript:void(0)">Monday, 21/06/2021</a>
</div>
</div> -->
                            </div>
                            <span class="text-to">to</span>
                            <div class="date">

                                <select class="selectmenu" id="date-to">
                                    <option>Select date</option>
                                    <!-- <option selected value="2021-06-16">Wednesday 16 06 2021</option>
                  <option value="2021-06-17">Thursday, 17/06/2021</option>
                  <option value="2021-06-19">Saturday, 19/06/2021</option> -->
                                </select>
                            </div>
                        </div>

                        <table width="100%" class="fixed-headers" id="time-table">
                            <thead>
                                <th>Class Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Taught by</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 1</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>14 06 2021</td>
                                    <td>10:00 AM - 11:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 2</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>14 06 2021</td>
                                    <td>13:00 PM - 14:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 3</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Wed, 16/06/2021</td>
                                    <td>10:00 AM - 11:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 4</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Thu, 17/06/2021</td>
                                    <td>15:00 PM - 16:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 5</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Fri, 18/06/2021</td>
                                    <td>10:00 AM - 11:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 6</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sat, 19/06/2021</td>
                                    <td>15:00 PM - 16:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 7</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sat, 19/06/2021</td>
                                    <td>15:00 PM - 16:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 8</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sat, 19/06/2021</td>
                                    <td>15:00 PM - 16:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 9</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sat, 19/06/2021</td>
                                    <td>15:00 PM - 16:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="pretty p-default p-round">
                                            <input type="radio" name="radio1">
                                            <div class="state">
                                                <label>Drawing shapes 10</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Sat, 19/06/2021</td>
                                    <td>15:00 PM - 16:00 PM</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md p-0">
                                                <div class="creater row align-items-center">
                                                    <div class="col-md-auto text-right">
                                                        <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle"
                                                            width="23" height="23" alt="Indra Greduard">
                                                    </div>
                                                    <div class="col-md-auto text-right">
                                                        <!-- note it would be short name -->
                                                        <h6 class="creater-name red">Indra</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="8" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md pr-0 pl-0 text-right">
                                                <a href="#" class="read-profile">See Full Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Select eligible child</label>
                                <select class="selectmenu" id="eligible-child">
                                    <option>Select child</option>
                                    <option>Claer</option>
                                </select>
                            </div>
                        </div>
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
        <div class="row">
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
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-2.png') }}" alt="product name" class="rounded">
                    </div>
                    <!--  <div class="move-text-left-top">
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

{{-- Additional scripts --}}
@section('scripts')
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/dataTables.dateTime.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/custom-datatable.js') }}"></script>
@endsection
