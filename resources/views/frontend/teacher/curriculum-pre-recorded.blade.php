{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/video-js.css') }}" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/videojs-playlist-ui.css') }}" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/videojs-playlist-ui.vertical.css') }}" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/videojs-playlist-ui.vertical.no-prefix.css') }}" media="all" />
@endsection

{{-- Content --}}
@section('content')


<section class="video-player-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8 preview-player">
				<div class="video-mask">
					<video 
					id="video" 
					class="video-js vjs-fluid vjs-big-play-centered"
					controls
					preload="auto"
					width="790"
					height="500"
					poster="{{ asset('frontend/video-poster/video-poster.png') }}"
					data-setup="{},"
					>
					    <source src="{{ asset('frontend/videos/flowers.mp4') }}" type="video/mp4" />
					    <!-- <source src="{{ asset('frontend/videos/flowers.webm') }}" type="video/webm" /> -->
					    
  					</video>
				</div>
                <div class="desc">
    				<h3 class="title">Introduction to Drawing Shapes</h3>
    				<h5><img src="{{ asset('frontend/images/icon-visibility.png') }}" alt="icon"> <b class="red">14k</b> students are watching this class</h5>
                </div>
                
			</div>
			<div class="col-md-4 vidoe-thumb-list-wrapper">
				<h6>8 Lessons (2hours)</h6>
				<hr>
				<div class="vjs-playlist" theme="inset-3">
                  <!--
                    The contents of this element will be filled based on the
                    currently loaded playlist
                  -->
                </div>
			</div>
		</div>
	</div>
</section>


<section>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h3>About This Curriculum</h3>
    			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat... </p>
    		</div>
    	</div>
    </div>
</section>
<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-7 left-content">
                <h3>About the School</h3>
                <div class="row">
                    <div class="col-8">
                        <div class="creater row">
                            <div class="col-auto">
                                <img src="{{ asset('frontend/images/creater-image3.png') }}" class="rounded-circle" width="64" height="64"
                                    alt="School Name" />
                            </div>
                            <div class="col-auto pl-0">
                                <h6 class="creater-name">School Name</h6>
                                <img src="{{ asset('frontend/images/like.png') }}" width="22" alt="icon" />
                                <span class="like-count">10k</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.
                </p>
            </div>
            <div class="col-md-5 right-content">
                 <div class="tag-wrapper">
                    <h2>Related Skills</h2>
                   <ul class="list-unstyled ">
                        <li><a href="#" class="tag border-gray">Life Style</a></li>
                        <li><a href="#" class="tag border-gray">Teaching</a></li>
                        <li><a href="#" class="tag border-gray">Artbug</a></li>
                    </ul>
                    <hr>
                    <div class="">
                        <a href="#" class="read-profile">See Full Profile</a>
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
                <h3>Recommended Curriculum <span>(based on your Search Preferences)</span></h3>
            </div>
            <div class="col-4 text-right read-more-wrap">
                <a href="{{ url('curriculum') }}" class="read-more">More curriculum<img src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon" /></a>
            </div>
        </div>
        <div class="row m-tab-slider">
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded" />
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image3.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">School Name</h6>
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
                        <img src="{{ asset('frontend/images/creater-image3.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">School Name</h6>
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
                        <img src="{{ asset('frontend/images/creater-image3.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">School Name</h6>
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
                        <img src="{{ asset('frontend/images/creater-image3.png') }}" class="rounded-circle" width="22" height="22" />
                        <h6 class="creater-name">School Name</h6>
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
<script type="text/javascript" src="{{ asset('frontend/js/vendor/video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/videojs-playlist.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/videojs-playlist-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/custom-video-player.js') }}"></script>
@endsection
