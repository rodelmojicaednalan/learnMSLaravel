<!-- Modal Delete Class -->
<div class="modal fade" id="delete-class-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Are you sure you<br> want do delete this class?</h2>
				</div>
			</div>
			<div class="modal-body nicescroll text-center">
				<img src="{{ asset('frontend/images/icon-fail.png') }}">
				<div class="btn-wrapper">
					<button id="confirm-delete" class="btn btn-border-red btn-full">
						Yes, I’m sure
					</button>
					<br>
					<button class="btn btn-red btn-full"  data-toggle="modal"
					data-dismiss="modal">
						No, Wait
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
