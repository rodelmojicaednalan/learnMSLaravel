{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>
    #payment-form {
        border-style: none;
        padding: 10px;
        margin-left: -5px;
        margin-right: -5px;
        background: rgba(18, 91, 152, 0.05);
        border-radius: 8px;
    }
    #card-element {
        margin-bottom: 10px;
    }

    #card-element .__PrivateStripeElement.styled {
        border: 1px solid #32325d !important;
        padding: 5px !important;
        border-radius: 5px;
    }

    #payment-form img {
        width: 120px;
    }

</style>

<!--begin::Card-->
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div class="row justify-content-center my-20">
			<!--begin: Pricing-->
			<div class="col-md-6 col-xxl-6">
				<div class="pt-30 pt-md-25 pb-15 px-5 text-center">
					<!--begin::Icon-->
					<div class="d-flex flex-center position-relative mb-25">
						<span class="svg svg-fill-primary opacity-4 position-absolute">
							<svg width="175" height="200">
								<polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0" />
							</svg>
						</span>
						<span class="svg-icon svg-icon-5x svg-icon-primary">
							<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Flower3.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M1.4152146,4.84010415 C11.1782334,10.3362599 14.7076452,16.4493804 12.0034499,23.1794656 C5.02500006,22.0396582 1.4955883,15.9265377 1.4152146,4.84010415 Z" fill="#000000" opacity="0.3" />
									<path d="M22.5950046,4.84010415 C12.8319858,10.3362599 9.30257403,16.4493804 12.0067693,23.1794656 C18.9852192,22.0396582 22.5146309,15.9265377 22.5950046,4.84010415 Z" fill="#000000" opacity="0.3" />
									<path d="M12.0002081,2 C6.29326368,11.6413199 6.29326368,18.7001435 12.0002081,23.1764706 C17.4738192,18.7001435 17.4738192,11.6413199 12.0002081,2 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</div>
					<!--end::Icon-->
					<!--begin::Content-->
					<span class="font-size-h1 d-block d-block font-weight-boldest text-dark-75 py-2">${{ number_format($subject->fee,2) }}</span>
					<h4 class="font-size-h6 d-block d-block font-weight-bold mb-7 text-dark-50">{{ $subject->subject }}</h4>
					<p class="mb-15 d-flex flex-column">
						<span>Lorem ipsum dolor sit amet edipiscing elit</span>
						<span>sed do eiusmod elpors labore et dolore</span>
						<span>magna siad enim aliqua</span>
					</p>
                    <form id="payment-form" data-checkout-type="teacher"  data-url="{{ route('teacher.payment.submit') }}">
                        <img src="{{ asset('media/stripe/Powered by Stripe - blurple.svg') }}" alt="Stripe">
                        <hr>
                        <input type="hidden" name="training_id" value="{{ $training->id }}">
                        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                        <input type="hidden" name="subject_name" value="{{ $subject->subject }}">
                        <input type="hidden" name="stripeToken" id="stripeToken">
                        <input type="hidden" name="return_url" value="{{ route('teacher.training.schedule', ['payment' => 'success']) }}">
                        @csrf
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        <button type="submit" class="btn btn-lg btn-block btn-primary" id="donate-btn">Checkout</button>
                    </form>
					{{-- <button type="button" class="btn btn-lg btn-block btn-primary checkout-training" data-tid="{{ $training->id }}" data-sid="{{ $subject->id }}" data-name="{{ $subject->subject }}" data-token="{{ csrf_token() }}">Checkout</button> --}}
					{{-- {{ $checkout->button('Buy') }} --}}
					<!--end::Content-->
				</div>
			</div>
			<!--end: Pricing-->

		</div>
	</div>
</div>
<!--end::Card-->


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection


{{-- Scripts Section --}}
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripe/stripe-pay.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        var test = $(document).find('.__PrivateStripeElement');
        $(test).css('border: 1px solid #32325d !important');
        $(test).css('padding: 5px !important');
        console.log($(test).attr('style'));
    });
</script>
@endsection
