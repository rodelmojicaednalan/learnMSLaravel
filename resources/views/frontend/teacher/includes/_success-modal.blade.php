<div class="modal fade" id="upload-success-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex">

					<h2 class="modal-title">
						<!-- if a successfull add -->
						<span>Upload Success</span>
						<!-- if user click Publish -->
						<!-- <span>Success Publish</span> -->
						<!-- if user click Save as Draft -->
						<!-- <span>Success Draft</span> -->
					</h2>
						
				</div>
			</div>
			<div class="modal-body nicescroll text-center">
				<img src="{{ asset('frontend/images/icon-success.png') }}">
				<div class="text-wrapper">

					<p>Your video has been 
						<!-- if a successfull add -->
						<span>uploaded</span>
						<!-- if user click Publish -->
						<!-- <span>published</span> -->
						<!-- if user click Save as Draft -->
						<!-- <span>saved as draft</span> -->
						 successfully.
					</p>
			</div>
				<button class="btn btn-red btn-full" data-toggle="modal" data-dismiss="modal" data-target="">
				I Understand
				</button>
			</div>

		</div>
	</div>
</div>
