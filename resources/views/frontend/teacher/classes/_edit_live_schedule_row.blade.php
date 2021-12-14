@foreach ($class->live_class as $schedule)
    <div class="row schedule-row add-schedule align-items-center">
        <div class="col-md-4">
            <div class="form-group">
                <div class="datepicker-wrapper">
                    <input class="form-control datepicker" required name="schedule[][start_date]" type="text" placeholder="Date" value="{{$schedule->start_date}}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="timepicker-wrapper">
                    <input class="form-control timepicker" required name="schedule[][start_time]" type="text" placeholder="Time" value="{{$schedule->start_time}}">
                    <div class="dash">
                        -
                    </div>
                    <input class="form-control timepicker" required name="schedule[][end_time]" type="text" placeholder="Time" value="{{$schedule->end_time}}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="action-remove text-right">
                <a href="javascript:void(0)"><img src="{{ asset('frontend/images/ic-actions-close-simple.png') }}"><span>Remove</span></a>
            </div>
        </div>
    </div>
@endforeach