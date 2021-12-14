{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<!--begin::Card-->
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div class="row justify-content-center my-20">
			<!--begin: Pricing-->
			<div class="col-md-4 col-xxl-3">
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
                    <button type="button" class="btn btn-lg btn-block btn-primary">
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
<script src="{{ asset('stripe/stripe-pay.js') }}"></script>
    <script type="text/javascript">
            // Create an instance of the Stripe object with your publishable API key
            var stripe = Stripe("{{ config('payment.stripe_key') }}");

            var checkoutButton = document.getElementsByClassName("checkout-training");
             var numProducts = checkoutButton.length;

             for (var i = 0; i < numProducts; i++) {
              checkoutButton[i].addEventListener("click", function () {

                  this.innerHTML = 'Processing ...';
                  this.disabled = true;

                  let formData = new FormData();
                    formData.append('subject_id', this.dataset.sid);
                    formData.append('training_id', this.dataset.tid);
                    formData.append('name', this.dataset.name);
                    formData.append('_token', this.dataset.token);

                  fetch("training/checkout", {
                    method: "POST",
                    body: formData
                  })
                    .then(function (response) {
                      return response.json();
                    })
                    .then(function (session) {
                      return stripe.redirectToCheckout({ sessionId: session.id });
                    })
                    .then(function (result) {
                      // If redirectToCheckout fails due to a browser or network
                      // error, you should display the localized error message to your
                      // customer using error.message.
                      if (result.error) {
                        alert(result.error.message);
                      }

                      this.innerHTML = 'Get Access Code';
                      this.disabled = false;
                    })
                    .catch(function (error) {
                      console.error("Error:", error);
                    });
                });
            }


             $('#requestDemoAccess').on('click',function(){
                $('#requestDemoAccess').prop("disabled", true);
                $('#requestDemoAccess').text("Processing...");
                $.ajax({
                    url: '../ajax/demo-request.php',
                    type: "POST",
                    data: $('#demo-access-form').serialize(),

                    success: function(res) {

                        alert(res.msg);

                        $('#requestDemoAccess').prop("disabled", false);
                        $('#requestDemoAccess').text("Submit");

                        if(res.status=='success')
                        {
                          location.reload();
                        }
                    }
                });
            });

            // checkoutButton.addEventListener("click", function () {
            //   alert(this.dataset.columns)
            //   fetch("create-checkout-session.php", {
            //     method: "POST",
            //     body: {'test':'x','test2':'x2'}
            //   })
            //     .then(function (response) {
            //       return response.json();
            //     })
            //     .then(function (session) {
            //       // return stripe.redirectToCheckout({ sessionId: session.id });
            //     })
            //     .then(function (result) {
            //       // If redirectToCheckout fails due to a browser or network
            //       // error, you should display the localized error message to your
            //       // customer using error.message.
            //       if (result.error) {
            //         alert(result.error.message);
            //       }
            //     })
            //     .catch(function (error) {
            //       console.error("Error:", error);
            //     });
            // });
    </script>
@endsection
