<div class="row schedule-row add-schedule align-items-center" data-index="{{ $index }}">
    <div class="col-md-4">
        <div class="form-group">
            <div class="datepicker-wrapper">
                <input class="form-control datepicker" required name="schedule[{{ $index }}][start_date]" type="text" placeholder="Date">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="timepicker-wrapper">
                <input class="form-control timepicker" required name="schedule[{{ $index }}][start_time]" type="text" placeholder="Time">
                <div class="dash">
                    -
                </div>
                <input class="form-control timepicker" required name="schedule[{{ $index }}][end_time]" type="text" placeholder="Time">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="action-remove text-right" data-parent="{{ $index }}">
            <a href="javascript:void(0)"><img src="{{ asset('frontend/images/ic-actions-close-simple.png') }}"><span>Remove</span></a>
        </div>
    </div>
</div>
