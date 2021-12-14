<div class="card card-custom">
   <div class="card-header card-header-tabs-line">
      <div class="card-title">
         <h3 class="card-label"><span class="text-muted">Class ID:</span> {{ $public_classes->id }} </h3>
      </div>
      <div class="card-toolbar">
         <ul class="nav nav-tabs nav-bold nav-tabs-line"">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#training_sched_list">
                        <span class="nav-icon">
                                <i class="flaticon-list-2"></i>
                        </span>
                        <span class="nav-text">Class Schedule</span>
                </a>
               {{-- <a class="nav-link active" data-toggle="tab" href="#training_sched_list">public_classes Schedule</a> --}}
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#training_add_schedule">
                        <span class="nav-icon">
                                <i class="flaticon-add-circular-button"></i>
                        </span>
                        <span class="nav-text action_schedule" data-action="add_new_schedule">Add New Schedule</span>
                </a>
               {{-- <a class="nav-link" data-toggle="tab" href="#training_add_schedule">Add New Schedule</a> --}}
            </li>            
         </ul>
      </div>
   </div>
   <div class="card-body">
      <div class="tab-content">
         <div class="tab-pane fade show active" id="training_sched_list" role="tabpanel" aria-labelledby="training_sched_list">
                @php

                        if(isset($public_classes->schedule))
                        {
                                $schedules = $public_classes->schedule
                @endphp

                <table class="table table-hover table-striped mb-6">
                        <thead class="thead-light">
                                <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>   
                                        <th scope="col">Action</th>                       
                                </tr>
                        </thead>
                        <tbody>
                                @php
                                $cnt =0;
                                @endphp
                                @foreach($schedules as $schedule)
                                <tr>
                                        <th  width="15%" scope="row">{{ $schedule->start_date }}</th>
                                        <td>{{ $schedule->start_time }}</td>
                                        <td width="20%">{{ $schedule->end_time }}</td>
                                        <td width="30%">

                                        <span class="svg-icon svg-icon-primary svg-icon-2x action_schedule"  data-start="{{ $schedule->start_time }}" data-end="{{ $schedule->end_time }}" data-date="{{ $schedule->start_date }}" data-id="{{ $schedule->id }}" data-action="edit_schedule"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>

                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>
                                        </td>
                                </tr>
                                @php
                                $cnt++;
                                @endphp
                                @endforeach              
                        </tbody>
                </table>


                @php
                        }
                @endphp
         </div>
         <div class="tab-pane fade" id="training_add_schedule" role="tabpanel" aria-labelledby="training_add_schedule">
            <form class="form" id="add-class-schedule-form">
                @csrf
                   <div class="card-body">

                    <div class="form-group">
                    <label class="">Date</label>
                    <input type="text" class="form-control date_arr" id="start_date" name="start_date" readonly="readonly" value="{{ date('Y/m/d')}}" placeholder="Select date" />
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label>Start Time</label>
                    <input class="form-control start_arr" id="start_time" name="start_time" readonly="readonly" placeholder="Start time" type="text" />
                    </div>
                    <div class="form-group col-md-6">
                    <label>End Time</label>
                    <input class="form-control end_arr" id="end_time"  name="end_time" readonly="readonly" placeholder="End time" type="text" />
                    </div>
                    </div>

        
                   </div>
                   <div class="card-footer">
                      <div class="row">
                         <div class="col-lg-3"></div>
                         <div class="col-lg-6">
                            <input type="hidden" id="class_id" name="class_id" value="{{ $public_classes->id }}">
                            <button type="submit" class="btn btn-success mr-2">Add New Schedule</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                         </div>
                      </div>
                   </div>
                </form>
         </div>
        
      </div>
   </div>
</div>
<script type="text/javascript">




                function time_convert (time) {
                // Check correct time format and split into components
                time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                if (time.length > 1) { // If time format correct
                // console.log(time);
                time = time.slice (1);  // Remove full string match value
                time.splice(3, 1); // aken
                // console.log(time); 
                time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
                }

                return time.join ('');
                // return adjusted time or original string
                }



                $(document).ready(function(){

                    if (KTUtil.isRTL()) {
                    arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                    }
                    } else {
                    arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                    }
                    }


                $('#start_time').timepicker();
                $('#end_time').timepicker();

                $('#start_time_modal').timepicker();
                $('#end_time_modal').timepicker();


                $('#start_date').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

                });


                $('#start_date_validate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

                });

                // minimum setup for modal demo
                $('#start_date_modal').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                dateFormat: 'yy-mm-dd',
                templates: arrows
                });


                        $(document).on('click','.action_schedule',function(e)
                        {
                        e.preventDefault();

                        var action = $(this).attr('data-action');

                        if(action == "add_new_schedule")
                        {
                        $('#update_schedule_btn').hide();
                        $('#update_cancel_btn').hide();
                        }

                        if(action == "edit_schedule")
                        {

                        var id = $(this).attr('data-id');
                        var start_time = $(this).attr('data-start');
                        var end_time = $(this).attr('data-end');
                        var start_date = $(this).attr('data-date');

                        $('#update_schedule_id').val(id);
                        $('#start_time2').val(time_convert(start_time));
                        // alert(time_convert(end_time));
                        $('#end_time2').val(time_convert(end_time));

                        // $('#update_level_number').val(number);
                        // $('#update_level_name').val(name);
                        // $('#update_level_hrs').val(hrs);
                        // $('#update_level_id').val(id);


                        $('#update_schedule_btn').show();
                        $('#update_cancel_btn').show();

                        $('#schedule_container_update').show();
                        $('#schedule_container').hide();

                        }

                        });



                $('#add-class-schedule-form').on('submit',function(e){
                        e.preventDefault();
                        
                        $.ajax({
                            
                                type:'POST',
                                url: '/teacher/private-classes/ajax/add_new_schedule',
                                dataType:"json",
                                data: $(this).serialize(),
                                success:function(data)
                                {
                                
                                 loadSchedules($('#class_id').val());
                                    datatable.reload();
                                }
                            });                       
                });
        })
</script>