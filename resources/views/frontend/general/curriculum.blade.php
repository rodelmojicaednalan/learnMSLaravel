{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/ion.rangeSlider.min.css') }}" media="all">
@endsection

{{-- Content --}}
@section('content')

<!-- Start banner slider -->
<section id="banner-slider-cc">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image"
                    style="background-image: url('{{ asset('frontend/images/classes/banner-1.png') }}');">
                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image"
                    style="background-image: url('{{ asset('frontend/images/classes/banner-2.png') }}');">

                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image"
                    style="background-image: url('{{ asset('frontend/images/classes/banner-1.png') }}');">

                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image"
                    style="background-image: url('{{ asset('frontend/images/classes/banner-2.png') }}');">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner slider -->

<!-- Menu  Section -->
@include('frontend.includes.nav-cc')
<!-- Menu  Section -->

<!-- Search Section -->
<section class="search-cc">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="post" id="search-cc-form" accept-charset="UTF-8">
                    <div class="form-item form-type-textfield form-item-search-cc-form">
                        <input title="" placeholder="Search Classes, categories ..." type="search" id="search-cc"
                            name="" value="" size="15" maxlength="128" class="form-text search-text">
                    </div>
                    <div class="form-actions form-wrapper" id="edit-actions">
                        <input type="submit" id="search-cc-submit" value="Search" class="form-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Search Section -->

<!-- Start Products -->

<section id="our-products" class="product-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 filter-overlay hidden-desktop">
                <button type="button" data-target="#filter-wrapper" aria-controls="navbars" aria-expanded="true"
                    aria-label="Toggle navigation" class="btn-filter-overlay btn btn-red btn-fullwidth">
                    Filter
                </button>
            </div>

            <div class="col-md-3 pr-md-35" id="filter-wrapper">
                <h3 class="filter-text">Filter</h3>
                <div class="nicescroll-mb">
                    <div class="checkbox-list-wrap">
                        <h5>By Recommendation</h5>
                        <ul class="checkbox-list">
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat1">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat1">Favorite Classes</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">Weekly Top Sellers</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="checkbox-list-wrap">
                        <h5>By Type of Curriculum</h5>
                        <ul class="checkbox-list">
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat1">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat1">Pre-Recorded</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">Live Class</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="checkbox-list-wrap">
                        <h5>By Education</h5>
                        <ul class="checkbox-list">
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat1">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat1">Pre-School</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">Elementary School</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">Junior High School</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">Senior High School</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">University</label>
                                    </div>
                                </div>
                            </li>


                        </ul>
                        <!-- <div class="note">
              <p>
                <span class="red">*Full-Time Teacher </span><br>
                *Freelance Teacher
              </p>
            </div> -->
                    </div>

                    <div class="checkbox-list-wrap">
                        <h5>By Courses</h5>
                        <ul class="checkbox-list">
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat1">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat1">Duration</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">Language</label>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat13">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat3">Country Origin</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat13">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat3">Others</label>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="checkbox-list-wrap">
                        <h5>By Price per Class</h5>
                        <ul class="checkbox-list">
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat1">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat1">Free</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat2">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat2">$1 - $50</label>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat13">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat3">$51 - $100</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat13">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat3">$101 - $150</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pretty p-default p-icon p-smooth">
                                    <input type="checkbox" id="checkboxcat13">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label class="checkbox-label" for="checkboxcat3">$151 - $200</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <!-- Range Slider -->
                    <!--  <div class="range-slider-wrap">
            <h5>Price</h5>

            <div class="filter-box">
              <div class="range-slider">
                <input type="text" class="js-range-slider" value="" />
              </div>
              <div class="row">
                <div class="input-wrapper col-md-6">
                  <label>Min</label>
                  <input type="text" class="js-input-from" value="0" />
                </div>
                <div class="input-wrapper col-md-6">
                  <label>Max</label>
                  <input type="text" class="js-input-to" value="0" />
                </div>
              </div>
            </div>
            <div class="action-wrapper">
              <button type="button" class="btn btn-red apply-btn">Apply</button>
              <a href="javascript:void(0);" class="reset-btn">Reset</a>
            </div>
          </div> -->
                </div>
            </div>
            <div class="col-md-9" id="our-products">
                <div id="generateCurriculum_list">
                    <div class="row">
                        @foreach ($curriculum_list as $curriculum)
                        <div class="col-md-4 col-xs-4 col-sm-6">
                            <div class="product-item">
                                <div class="image">
                                    <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                                </div>
                                <div class="move-text-left-top">
                                    <div class="tag bg-red">
                                        {{isset($curriculum['category']['level']['name']) ? $curriculum['category']['level']['name'] : 'N/A'}}</div>
                                </div>
                                <div class="creater">
                                    <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                                    <h6 class="creater-name">
                                        {{isset($curriculum['school']['school_name']) ? $curriculum['school']['school_name'] : 'N/A'}}</h6>
                                </div>
                                <h5> {{isset($curriculum['category']['subject']) ? $curriculum['category']['subject'] : 'N/A'}}
                                </h5>
                                <p class="desc">
                                    {{isset($curriculum['category']['type']) ? $curriculum['category']['type'] : 'N/A'}}
                                </p>
                                <div class="row">
                                    <div class="price col-6">
                                        {{isset($curriculum['fee']) ? $curriculum['fee'] . 'SGD' : 'N/A'}}
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href=" {{ url('/school/live-class-detail') }}">
                                            <button class="btn btn-secondary">
                                                Buy Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row pagination-wrapper">
                        {{$curriculum_list->links()}}
                        <div class="col-md-4 col-xs-4 col-sm-6 total-product text-right">
                            <div class="tag">
                                {{count($curriculum_count)}}
                            </div>
                            <span>Products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Products -->

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
<div class="overlay"></div>
@endsection

{{-- Additional Styles --}}
@section('scripts')
{{-- <script type="text/javascript" src="{{ asset('frontend/js/classes.js') }}"></script> --}}
<script src="{{asset('frontend/js/curriculum-list-paginate.js')}}"></script>
@endsection
