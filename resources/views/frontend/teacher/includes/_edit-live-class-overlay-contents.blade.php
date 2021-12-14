<form id="edit-live-class-form" autocomplete="off" class="edit-pre-recorded-class"  data-action="{{ url('/teacher/class/ajax/edit_live_class') }}" enctype="multipart/form-data">
@method('POST')
<input type="hidden" name="id" value="{{ $class->id }}">
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="title"><span class="label-required">Title</span></label>
            <input class="form-control with-validation" id="title" name="title" type="text" placeholder="Type the title" value="{{ $class->title }}">
            <small id="title_error" class="text-danger error" style="display:none;"></small>
        </div>
        <div class="form-group">
            <label for="title"><span class="label-required">Description</span></label>
            <textarea name="description" class="form-control with-validation" id="description" rows="3" placeholder="Type the description">{{ $class->description }}</textarea>
            <small id="description_error" class="text-danger error" style="display:none;"></small>
        </div>
        <div class="form-group">
            <label for="price-5"><span class="label-required">Price</span></label>
            <div class="price-input-group">
                <span class="prefix">$</span>
                <input class="form-control" id="price-5" name="price" type="number" value="{{$class->price}}">
            </div>
            <div class="note">*10% commission will be added to this price.</div>
        </div>
    </div>
    <div class="col-md-4">
        <!-- <div class="form-group">
            <label for="curriculum2">Curriculum</label>
            <select  name="orca_curricula_id" value="{{ $class->orca_curricula_id }}" class="selectmenu">
                <option value="">Select</option>
                <option {{ ($class->orca_curricula_id === 1) ? 'selected' : '' }} value="1">curriculum1</option>
                <option {{ ($class->orca_curricula_id === 2) ? 'selected' : '' }} value="2">curriculum2</option>
                <option {{ ($class->orca_curricula_id === 3) ? 'selected' : '' }} value="3">curriculum3</option>
            </select>
            <small id="orca_curricula_id_error" class="text-danger error" style="display:none;"></small>
        </div> -->
        <div class="form-group category-wrapper" id="category-wrapper2">
            <label for="cat-2">Category</label>
            <select id="cat-2" class="selectmenu category" name="orca_categories_id[]">
                <option value="">Select category</option>
                <option {{ (in_array(2, $class->orca_categories_id)) ? 'selected' : '' }} value="2">Academic</option>
                <option {{ (in_array(3, $class->orca_categories_id)) ? 'selected' : '' }} value="3">Enrichment</option>
            </select>
            <small id="orca_categories_id.0_error" class="text-danger error" style="display:none;"></small>
        </div>
        <div class="form-group">
            <label for="live-base-school-class">Based on School Class</label>
            <select id="live-base-school-class" class="selectmenu category">
            {{-- <select id="live-base-school-class" name="orca_categories_id[]" class="selectmenu category"> --}}
                <option value="">Select Class</option>
                <option value="2">Class 1</option>
                <option value="3">Class 2</option>
            </select>
            <small id="orca_categories_id.0_error" class="text-danger error" style="display:none;"></small>
        </div>
    </div>
    
    <div class="col-md-5">
        <label for="photocover">Photo Cover</label>
        <div class="upload-wrapper">
        <div class="form-group">
            <div class="image-area">
                <img id="imageResult2" src="{{ ($class->cover_photo) ? \Storage::url('public/uploads/teacher/class/image/' . $class->cover_photo) : asset('frontend/images/product-1.png') }}" alt="" class="img-fluid"></div>
            <div class="">
                <input id="upload2" name="cover_photo" type="file" class="form-control border-0">
                <div class="input-group-append">
                    <label for="upload2" class="btn btn-red">Upload <i class="fa fa-upload"></i></label>
                </div>
            </div>

        </div>
    </div>
    </div>
</div>
<div class="edit-schedule-wrapper">
    <div class="append">
        @if (count($class->liveClass) > 0)
            @foreach ($class->liveClass as $key => $liveClasses)
                <div class="row schedule-row add-schedule">
                    <div class="col-md-4">
                        <div class="form-group">
                            <!-- <label>Date</label> -->
                            <div class="datepicker-wrapper">
                                <input class="form-control datepicker" type="text" placeholder="Date" name="edit_schedule[{{$key}}][start_date]" value="{{$liveClasses['start_date']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <!-- <label>Time</label> -->
                            <div class="timepicker-wrapper">
                                <input class="form-control timepicker" type="text" placeholder="Time" name="edit_schedule[{{$key}}][start_time]" value="{{$liveClasses['start_time']}}">
                                <div class="dash">
                                    -
                                </div>
                                <input type="hidden" name="edit_schedule[{{$key}}][liveclass_id]" value="{{$liveClasses['id']}}">
                                <input class="form-control timepicker" type="text" placeholder="Time" name="edit_schedule[{{$key}}][end_time]" value="{{$liveClasses['end_time']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" name="edit_save_draft" value="1">
                        <div class="action-remove text-right">
                            <a href="#" id="remove_schedule" data-remove="{{$liveClasses['id']}}"><img src="{{ asset('frontend/images/ic-actions-close-simple.png') }}"><span>Remove</span></a>
                        </div>
                        {{-- <div class="form-group checkbox-wrapper">
                            <div class="pretty p-default p-icon p-pulse">
                                <input type="checkbox" id="checkbox_publish_{{ $liveClasses->id }}" value="publish-now" class="checkbox_publish">
                                <div class="state"><i class="icon icon-check"></i>
                                    <label class="checkbox-label">Publish Now</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row btn-wrapper">
        <div class="col-6">
            <button class="btn btn-border-red" id="edit-add-schedule-row">Add Schedule <i class="fa fa-plus"></i></button>
        </div>
        <div class="col-6 text-right">
            <button  class="btn btn-border-red edit-save-draft" type="button">Save as Draft</button>
            <button class="btn btn-red btn-publish edit-btn-publish" type="submit">Publish</button>
            {{-- <button class="btn btn-red disabled btn-publish edit-btn-publish" type="submit" disabled="true">Publish</button> --}}
        </div>
    </div>
</div>
</form>

<script>


        initializePicker();
        $('#edit-add-schedule-row').on('click', function(e){
            e.preventDefault();
            generateEditScheduleForm();

        });

        function generateEditScheduleForm(){

            var form = '';
            var schedule_wrapper = $('.edit-schedule-wrapper .append');
            var schedule_row_length = $('.edit-schedule-wrapper .add-schedule').length;
            console.log(schedule_row_length);
            $.ajax({
                type: 'POST',
                data: { index : schedule_row_length},
                url: '/teacher/class/ajax/get_schedule_form',
                success: (response) => {
                    schedule_wrapper.append(response);
                    initializePicker();

                
                },
                error: function(err){
                    console.log(err);
                }
            });

        }

        function initializePicker() {
            $('input.datepicker').datepicker();
            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                minTime: '8:00am',
                maxTime: '6:00pm',
                // defaultTime: '08:00',
                startTime: '8:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        }

</script>
