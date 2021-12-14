{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional styles for this specific page --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

    <section>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-7 item-details">
                    <div class="row">
                        <div class="col-12">
                            <h3>Order Summary</h3>
                            <p class="text-gray-2">Lorem ipsum donorsi amet lorem ipsum donorsi amet.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
    				        <h5>Item</h5>
                        </div>
                         <div class="col-5">
                            <h5>Price</h5>
                        </div>
                    </div>
    				<hr>
                    <?php $sub_total = 0; ?>
                    <div id="user_cart_content">
                        @foreach( $cart as $item )
                            <div class="class-item"><!-- Start class item -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6>{{ $item->class_details->title }}</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 text-wrapper">
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
                                                                    {{ count( $item->class_schedule_count) }}
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="video-dropdown">
                                                                    <div class="left-wrapper">
                                                                        <h5>Title</h5>
                                                                    </div>
                                                                    <div class="right-wrapper">
                                                                        <h5>Duration</h5>
                                                                    </div>
                                                                    
                                                                    <hr>
                                                                    @foreach ( $item->class_schedule_count as $schedule_class)

                                                                    <a class="dropdown-item video-item">
                                                                        <div class="left-wrapper">
                                                                            <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                                            <h6 class="title">{{ $schedule_class->class_name }}</h6>
                                                                        </div>
                                                                        <div class="right-wrapper red">
                                                                            40 min
                                                                        </div>
                                                                    </a>
                                                                    
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div><!-- End item -->
                                                    </div><!-- End text wrapper -->
                                                    <div class="col-md-6 item-wrapper">
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
                                                            <span><img src="http://127.0.0.1:8080/frontend/images/creater-image1.png" width="16" height="16"> <a href="/teacher/{{ $item->class_details->user_id }}" class="red text-decoration-underline">{{  $item->class_details->creator->fullname }}</a></span>
                                                        </div><!-- End item -->
                                                    </div><!-- End item wrapper -->
                                                    
                                                </div><!-- End row -->
                                            </div><!-- End col -->
                                        </div><!-- End row -->
                                    </div><!-- End col 9 -->
                                    <div class="col-md-3 col-sm-12 image-wrapper">
                                        <div class="image-bg" style="background-image: url('{{ asset('frontend/images/product-1.png') }}');">
                                        </div>
                                    
                                    </div><!-- End col 3 -->
                                </div><!-- End row -->
                                <div class="row price-item-wrapper">
                                    <div class="col-9">
                                        <div class="item">
                                            <label>Price:</label>
                                            <span class="red">{{ $item->class_details->price }} USD <strike>48.56 USD</strike></span>
                                            <?php  $sub_total += $item->class_details->price; ?>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="action-remove text-right">
                                            <a href="javascript:void(0)" id="remove-cart-item" data-toggle="modal" data-id="{{ $item->id }}"><img src="{{ asset('frontend/images/ic-actions-close-simple.png') }}"><span>Remove</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End class item -->
                        @endforeach
                    </div>
                    <hr>
                    <div class="row subtotal-wrap">
                        <div class="col-7">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-5">
                             <h6>{{ $sub_total }} USD</h6>
                        </div>
                    </div>
                    <div class="voucher-code-wrap">
                        <form>
                            <input type="text" name="" class="form-control" placeholder="Apply voucher code">
                            <input type="submit" name="" value="Apply now">
                        </form>
                    </div>
                    <div class="row total-wrap">
                        <div class="col-7">
                            <h6>Total Order</h6>
                        </div>
                        <div class="col-5">
                             <h3 class="total-price red">{{ $sub_total }} USD</h3>
                        </div>
                    </div>
    			</div>
    			<div class="col-md-5 pl-md-35">
                    <div class="pt-4">
                        <div class="payment-wrapper">
            				<h3>Payment</h3>
                            <div class="rounded-border">
                               
                                <label for="card-element" class="text-large text-black">Credit or debit card</label>
                                <div class="stripe-wrapper row">
                                    <div class="stripe-logo col-6">
                                        <img src="{{ asset('frontend/images/stripe.png') }}" style="max-width: 100%">
                                    </div>
                                    <div class="stripe-text pl-0 col-6">
                                        <p>Stripe is PCI compliant and your credit card information is sent securely, direct to Stripe.</p>
                                    </div>
                                </div>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                    <input type="text" name=""  placeholder="Card number">
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                               
                            </div>
                            
                        </div>
                        <div class="addition-wrapper">
                            <h3>Additional Information</h3>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea class="form-control" id="notes" rows="4" placeholder="Need a specific delivery day? Sending a gitf? Let’s say ..."></textarea>
                            </div>
                        </div>
                        <div class="confirmation-wrapper">
                            <h3>Confirmation</h3>
                            <p>Lorem ipsum donorsi amet lorem ipsum donorsi amet.</p>
                            <div class="rounded-border">
                                <div class="pretty p-default p-icon p-pulse">
                                    <input type="checkbox" id="" value="">
                                    <div class="state"><i class="icon icon-check"></i>
                                        <label>I agree with our <a href="#" class="red">terms and conditions</a> and <a href="#" class="red">privacy policy</a>.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="complete-btn-wrapper">
                            <a href="{{ url('checkout') }}">
                                <button class="btn btn-red">Complete order</button>
                            </a>
                        </div>
                        <div class="safe-data-info">
                            <img src="{{ asset('frontend/images/safe.png') }}" alt="icon"/>
                            <label>All your data are safe</label>
                            <p>We are using the most advanced security to provide you the best experience ever.</p>
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </section>

@endsection

{{-- Additional scripts for this specific page --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery.timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/dataTables.dateTime.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/custom-cart.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/class-filter.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/custom-filter-dashboard.js') }}"></script>

@endsection
