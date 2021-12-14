<!-- Modal Verification -->
<div class="modal fade" id="verification-account-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Verification</h2>
				</div>
			</div>
			<div class="modal-body nicescroll">
				<div class="text-wrapper">
					<p class="text-center">We have sent you a high security one-time password to your mobile number.  The OTP will expire in 60 seconds</p>
				</div>
				<div class="form-group input-verification-code">
					<label class="text-center">Input Verification Code</label>
					<div class="input-group-wrapper">
						<input type="number" max="1"  onkeydown="return event.keyCode !== 69" />
						<input type="number" max="1"  onkeydown="return event.keyCode !== 69" />
						<input type="number" max="1"  onkeydown="return event.keyCode !== 69" />
						<input type="number" max="1"  onkeydown="return event.keyCode !== 69" />
						<input type="number" max="1"  onkeydown="return event.keyCode !== 69" />
						<input type="number" max="1"  onkeydown="return event.keyCode !== 69" />
					</div>
				</div>
				<div class="text-center btn-wrapper">
					<button class="btn btn-red btn-full" data-toggle="modal" data-dismiss="modal" data-target="#withdraw-success-overlay">Finish</button>
				</div>
			</div>
		</div>
	</div>
</div>
