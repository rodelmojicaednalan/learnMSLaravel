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
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/classes/banner-1.png') }}');">
                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/classes/banner-2.png') }}');">

                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/classes/banner-1.png') }}');">

                </div>
            </div>
            <div class="banner-slide">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/classes/banner-2.png') }}');">
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
                        <input title=""
                            placeholder="Search Classes, categories ..." type="search" id="search-cc" name=""
                            value="" size="15" maxlength="128" class="form-text search-text">
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

<section class="product-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 filter-overlay hidden-desktop">
                <button type="button" data-target="#filter-wrapper" aria-controls="navbars" aria-expanded="true" aria-label="Toggle navigation" class="btn-filter-overlay btn btn-red btn-fullwidth">
                Filter
                </button>
              </div>

              <div class="col-md-3 pr-md-35" id="filter-wrapper">
                <h3 class="filter-text">Filter</h3>

                <div class="nicescroll">
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
                  <h5>By Type of Class</h5>
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
                  <h5>By Creator</h5>
                  <ul class="checkbox-list">
                    <li>
                      <div class="pretty p-default p-icon p-smooth">
                        <input type="checkbox" id="checkboxcat1">
                        <div class="state"><i class="icon icon-check"></i>
                          <label class="checkbox-label" for="checkboxcat1">School</label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="pretty p-default p-icon p-smooth">
                        <input type="checkbox" id="checkboxcat2">
                        <div class="state"><i class="icon icon-check"></i>
                          <label class="checkbox-label" for="checkboxcat2">Freelance Teacher</label>
                        </div>
                      </div>
                    </li>
                  </ul>

              </div>

                <div class="checkbox-list-wrap">
                  <h5>By Age</h5>
                  <ul class="checkbox-list">
                    <li>
                      <div class="pretty p-default p-icon p-smooth">
                        <input type="checkbox" id="checkboxcat1">
                        <div class="state"><i class="icon icon-check"></i>
                          <label class="checkbox-label" for="checkboxcat1">Age 3 to 5</label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="pretty p-default p-icon p-smooth">
                        <input type="checkbox" id="checkboxcat2">
                        <div class="state"><i class="icon icon-check"></i>
                          <label class="checkbox-label" for="checkboxcat2">Age 6 - 12</label>
                        </div>
                      </div>
                    </li>

                    <li>
                      <div class="pretty p-default p-icon p-smooth">
                        <input type="checkbox" id="checkboxcat13">
                        <div class="state"><i class="icon icon-check"></i>
                          <label class="checkbox-label" for="checkboxcat3">Age 13 - 17</label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="pretty p-default p-icon p-smooth">
                        <input type="checkbox" id="checkboxcat13">
                        <div class="state"><i class="icon icon-check"></i>
                          <label class="checkbox-label" for="checkboxcat3">Age 18+</label>
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
              </div>
            </div>
            <div class="col-md-9" id="our-products">
                <div id="generateClass_list">
                  <div class="row">
                      @foreach ($classes as $item)
                        <div class="col-md-4 col-xs-4 col-sm-6">
                            <div class="product-item">
                                <div class="image">
                                  <!-- {{ $item['cover_photo'] == '' ? 'test' : 'test2' }} -->
                                    <img src="{{ $item['cover_photo'] != '' ? Storage::url('public/uploads/teacher/class/image/'. $item['cover_photo']) : asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                                    
                                </div>
                                <div class="move-text-left-top">
                                    <?=$item['class_type'] == 'pre_recorded_class' ? '<div class="tag bg-orange">Pre-Recorded</div>' : '<div class="tag bg-red">Live Class</div>'?>
                                </div>
                                <div class="creater">
                                    <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                                    <h6 class="creater-name">{{isset($item['user']) ? $item['user']['first_name']. ' ' .$item['user']['last_name'] : 'N/A'}}</h6>
                                </div>
                                <h5> {{isset($item['title']) ? $item['title'] : 'Not Available'}}</h5>
                                <p class="desc">{{isset($item['description']) ? Str::limit($item['description'], 40) : 'Not Description Available'}} </p>
                                <div class="row">
                                  <div class="price col-6">
                                    {{isset($item['price']) ? $item['price'] . ' SGD' : 'N/A'}}
                                  </div>
                                  <div class="col-6 text-right">
                                    <a href='<?=$item['class_type'] == 'live_class' ? '/class/live/' . $item['id'] : '/class/pre-recorded/' .$item['id'] ?>'>
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
                    {{$classes->links()}}
                    <div class="col-md-4 col-xs-4 col-sm-6 total-product text-right">
                        <div class="tag">
                            {{count($product_count)}}
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
{{-- Additional scripts --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/vendor/chosen.jquery.min.js') }}"></script>
<script src="{{asset('frontend/js/class-list-paginate.js')}}"></script>
@endsection