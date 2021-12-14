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
   				<div class="col-12">
   					<div class="text-center">
	   					<h2>Congratulations on Finishing your Class!</h2>
	   					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
   					</div>
   				</div>
   			</div>
   		</div>
   		<div class="container-custom"><!-- Start container-custom -->
			<div class="row">
				<div class="col-12 class-item"><!-- Start class item -->
					<div class="row">
						<div class="col-md-3 col-sm-12 image-wrapper">
							<div class="image-bg" style="background-image: url({{ asset('frontend/images/product-1.png') }}); ">
							</div>
						</div>

						<div class="col-md-9">
							<h6>Art &amp; Craft - Drawing Shapes</h6>
							<div class="row">
								<div class="col-md-4 col-sm-12 text-wrapper">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
									<div class="item">
										<label>Total Video:</label>
										<div class="dropdown dropdown-style-2 video-dropdown-wrapper pl-1">
											<a class="dropdown-toggle" href="#" role="button" id="video-dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												3 Videos
											</a>
											<div class="dropdown-menu" aria-labelledby="video-dropdown-2">

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
												<a class="dropdown-item video-item mb-0"><!-- last item -->
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
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-8 item-wrapper">
											<div class="item">
												<label>
													Tagged Curriculum:
												</label>
												<span>-</span>
											</div>
											<div class="item">
												<label>
													Duration: 
												</label>
												<span>
													<b>2h 3mins</b>
												</span>
											</div>
											<div class="item">
												<label>
													Purchased Date:
												</label>
												<span>
													<b>07/07/2021</b>
												</span>
											</div>
											<div class="item">
												<label>
													Price:
												</label>
												<span><b>$23,52</b></span>
											</div>
										</div>
										<div class="col-4 text-right">
											<svg class="radial-progress" data-percentage="100" viewBox="0 0 80 80">
											    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
											    <circle class="complete" cx="40" cy="40" r="35"></circle>
											    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">100%</text>
										    </svg>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div><!-- End class item -->
				<div class="col-12 teacher-detail"><!-- Start Teacher Detail -->
	   				<h4>Teacher’s Detail</h4>
	   				<hr>
	   				<div class="row">
	   					<div class="col-md-6">
			   				<div class="creater d-flex">
			   					<div class="col-auto image-wrapper p-0">
				   					<img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="85">
				   				</div>
			   					<div class="col-9 text-wrapper">
									<h4 class="creater-name red">Jean</h4>
									<h6>Teacher - Art & Craft Drawing Shapes</h6>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
								<a href="#" class="red see-profile"><u>See Full Profile</u></a>
						</div>
						<div class="col-md-6 form-review">
							
							<div class="form-group">
								<label for="review">Write your review</label>
								<textarea class="form-control" id="review" rows="7" placeholder="Type here..."></textarea>
							</div>
							<div class="text-right">
								<button class="btn btn-red btn-width-auto" data-toggle="modal" data-target="#review-success-overlay">Send</button>
							</div>
							
						</div>
	   				</div>
	   			</div><!-- End Teacher Detail -->
   			</div>
   		</div><!-- End container-custom -->
		</div><!-- End container -->
</section>

	<!-- Related Products -->
<section id="related-cc" class="product-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3>Recommended Classes <span>(based on your Search Preferences)</span></h3>
            </div>
            <div class="col-4 text-right read-more-wrap">
                <a href="classes" class="read-more">More classes<img src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon"></a>
            </div>
        </div>
        <div class="row m-tab-slider">
            <div class="col-md-3">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="18" height="18">
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
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="18" height="18">
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
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="18" height="18">
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
                        <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                    </div>
                    <div class="creater">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="18" height="18">
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

<!-- Modal Review Sucess Class -->
<div class="modal fade" id="review-success-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title">Your review has been sent.</h2>
			</div>
			<div class="modal-body nicescroll text-center">
				<img src="{{ asset('frontend/images/icon-success.png') }}" alt="icon" width="157">
				<div class="text-wrapper"><p>The teacher will receive your review through their email.</p></div>
				<button class="btn btn-red btn-full" data-toggle="modal"
				data-dismiss="modal">
				Okay
				</button>
			</div>

		</div>
	</div>
</div>
@endsection

{{-- Additional scripts for this specific page --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/result.js') }}"></script>
@endsection
