<div class="modal fade" id="select-class-type-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Select Programme</h2>
				</div>
			</div>
			<div class="modal-body nicescroll text-center">
				<div class="row image-wrapper">
                    <div class="col-md-6 select-item" data-action="select_pre-recorded-type" data-type="pre_recorded_class" data-overlay="upload-pre-recorded-overlay">
                        <img src="{{ asset('frontend/images/pre-recorded-type.png') }}" alt="icon" />
                        <div class="title">Pre-Recorded</div>
                    </div>
                    <div class="col-md-6 select-item" data-action="select_live-class" data-type="live_class" data-overlay="upload-live-class-overlay">
                        <img src="{{ asset('frontend/images/live-class-type.png') }}" alt="icon"  />
                        <div class="title">Live</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-red btn-full disabled" id="selected-class-type" disabled="true"
                            data-toggle="modal" data-target="" data-dismiss="modal">Continue</button>
                    </div>
                </div>
			</div>

		</div>
	</div>
</div>
