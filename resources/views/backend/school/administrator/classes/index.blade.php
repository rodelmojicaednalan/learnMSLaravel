{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>

body {
  overflow: auto !important;
}

body > #zmmtg-root {
  display: none !important;
  height:0px;
  width:0px;
}

</style>

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage Classes
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder action_user" data-action="add" data-toggle="modal" data-target="#exampleModal" >
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add New Class</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="class_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Class</label>
                                    <select class="form-control" id="class_datatable_search_subject">
                                        <option value="">All</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Teacher:</label>
                                    <select class="form-control" id="class_datatable_search_teacher">
                                        <option value="">All</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--begin: Datatable-->

             <div class="datatable datatable-bordered datatable-head-custom" id="class_datatable"></div>


            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="form_txt"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('school-admin/class') }}" id="class_form">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label>Class</label>
                    <input class="form-control" id="class" name="class" placeholder="Class" type="text" />
                </div>

                <div class="form-group">
                    <label>Fee</label>
                    <input class="form-control" id="fee" name="fee" placeholder="Fee" type="number" />
                </div>

                <div class="form-group">
                    <label>Teacher</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Subjects</label>
                    <select class="form-control" id="subject_id" name="subject_id">
                        <option value=""></option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Levels</label>
                    <select class="form-control level-selector" name="level_id" id="level_id">

                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-submit btnAdd">Save</button>
            <button type="button" class="btn btn-primary btn-submit btnUpdate" style="display:none;">Update</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="training_txt">Manage Class Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <div class="modal-body" id="schedule_container">

                </div>

                <div id="schedule_container_update" style="display:none;">

                    <form class="form" id="update-class-schedule-form">
                        @csrf
                        <div class="card-body">

                            <input type="hidden" id="update_schedule_id" name="update_schedule_id">

                            <div class="form-group">
                                <label class="">Date</label>
                                <input type="text" class="form-control date_arr" id="start_date2" name="start_date2" readonly="readonly" value="{{ date('Y/m/d')}}" placeholder="Select date" />
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Start Time</label>
                                    <input class="form-control start_arr" id="start_time2" name="start_time2" readonly="readonly" placeholder="Start time" type="text" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>End Time</label>
                                    <input class="form-control end_arr" id="end_time2"  name="end_time2" readonly="readonly" placeholder="End time" type="text" />
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-success mr-2" id="update_schedule_btn" style="display:none;">Update</button>
                                        <button  class="btn btn-danger mr-2 action_user" id="update_cancel_btn" style="display:none;"  data-action="cancel_edit">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

{{-- Styles Section --}}
@section('styles')
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.6/css/react-select.css" />
@endsection


{{-- Scripts Section --}}
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

    <script src="https://source.zoom.us/1.9.6/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.6.min.js"></script>

    <script src="{{ asset('js/zoom/tool.js') }}"></script>
    <script src="{{ asset('js/zoom/vconsole.min.js') }}"></script>

    {{-- page scripts --}}

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var datatable;
        var global_level_id=0;
        var update_ctr=0;

        var addClass = function () {
            // Base elements
            var validator
            var formEl;

            var initValidation = function() {
                validator = formEl.validate({
                    // Validate only visible fields
                    ignore: ":hidden",
                    // ignore: ignoreFields,

                    errorClass: 'error invalid-feedback',
                    highlight: function(element, errorClass, formClass) {
                        $(element).find("[id$='-error']").addClass(errorClass);
                        $(element).addClass('is-invalid');
                    },

                    // Validation rules
                    rules: {
                        class: {
                            required: true
                        },
                        fee: {
                            required: true
                        },
                        user_id: {
                            required: true
                        },
                        subject_id: {
                            required: true
                        },
                        level_id: {
                            required: true
                        }
                    },

                    // Display error
                    invalidHandler: function(event, validator) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'There are some errors in your submission. Please correct them.',
                        })
                    },

                    // Submit valid form
                    submitHandler: function (form) {

                    }
                });
            }

            var initSubmit = function() {
                // var btn = formEl.find('[data-ktwizard-type="action-submit"]');
                var btn = $('.btn-submit');
                btn.on('click', function(e) {
                    e.preventDefault();

                    if (validator.form()) {

                        // See: http://malsup.com/jquery/form/#ajaxSubmit
                        formEl.ajaxSubmit({
                            type : 'POST',
                            success: function( data ) {

                                if (!data.success) {
                                    var error_msg = "";
                                    if ( data.messages ) {
                                        error_msg += '<ul class="form-error">';
                                        $.each( data.errors, function( key, value ) {
                                            error_msg += "<li>" + value + "</li>";
                                        });
                                        error_msg += "</ul>";
                                    }

                                    swal.fire({
                                        "title": data.messages.message,
                                        "html": error_msg,
                                        "type": "warning",
                                        "confirmButtonClass": "btn btn-secondary"
                                    });

                                }else{
                                    if (!data.updated) {
                                        formEl.trigger('reset');
                                    }

                                    Swal.fire(
                                        'Success!',
                                        'The application has been successfully submitted.',
                                        'success'
                                    )
                                    $('#level_id')
                                        .find('option')
                                        .remove()
                                        .end()
                                    ;
                                    datatable.reload()
                                }

                            },
                            error: function( data ) {

                                if ( data.status === 422 ) {
                                    var errors = $.parseJSON(data.responseText);
                                    var error_msg = '<ul class="form-error">';
                                    $.each(errors, function (key, value) {
                                        if($.isPlainObject(value)) {
                                            $.each(value, function (key, value) {
                                                error_msg += "<li>" + value + "</li>";
                                            });
                                        }
                                    });
                                    error_msg += "</ul>";

                                    swal.fire({
                                        "title": errors.message,
                                        "html": error_msg,
                                        "type": "warning",
                                        "confirmButtonClass": "btn btn-secondary"
                                    });
                                }else{
                                    swal.fire({
                                        "title": "The application is not submitted!",
                                        "text": "",
                                        "type": "warning",
                                        "confirmButtonClass": "btn btn-secondary"
                                    });
                                }

                            }
                        });
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    formEl = $('#class_form');

                    initValidation();
                    initSubmit();
                }
            };
        }();

        function loadSchedules(id)
        {
            $.ajax({
                type:'POST',
                url: 'classes/ajax/load_schedules',
                data:{
                    id: id,
                _token: CSRF_TOKEN,
                },
                success:function(data)
                {
                    $('#schedule_container').html(data);
                }
            });
        }

        $('#update-class-schedule-form').on('submit',function(e){
            e.preventDefault();

            $.ajax({
                type:'POST',
                url: 'classes/ajax/update_single_schedule',
                dataType:"json",
                data: $(this).serialize(),
                success:function(data)
                {
                    if(data.error == false){
                        Swal.fire({
                            icon: "success",
                            title: "Updated",
                            html: data.message,
                        });

                        loadSchedules($('#class_id').val());
                        $('#update_schedule_btn').hide();
                        $('#update_cancel_btn').hide();
                        $('#schedule_container_update').hide();
                        $('#schedule_container').show();
                    }
                }
            });
        });

        $(document).on('click','.action_user',function(e)
        {
            e.preventDefault();

            var action = $(this).attr('data-action');

            if(action == "add")
            {
                update_ctr=0;
                $('.clear_data').val("");
                $('#class_form').attr('action', '{{ url("school-admin/class/") }}')
                $('#class_form input[name="_method"]').val('POST');
                $('#form_txt').text("Add New Artbug Class");
                $('.btnAdd').show();
                $('.btnUpdate').hide();
            }

            if(action == "cancel_edit")
            {

                $('#update_schedule_btn').hide();
                $('#update_cancel_btn').hide();
                $('#schedule_container_update').hide();
                $('#schedule_container').show();

            }

            if(action == "update"){
                update_ctr=1;
                var id = $(this).attr('data-id');
                $('.btnAdd').hide();
                $('.btnUpdate').show();
                $('#class_form').attr('action', '{{ url("school-admin/class") }}/' + id)
                $('#class_form input[name="_method"]').val('PUT');
                $('#form_txt').text("Update Artbug Class");

                $.ajax({
                    type:'POST',
                    url: 'classes/ajax/load_single_class',
                    dataType:"json",
                    data:{
                        id: id,
                    _token: CSRF_TOKEN,
                    },
                    success:function(data)
                    {
                        global_level_id = data.level_id;
                        $('#class').val(data.class);
                        $('#class').attr("class_id", data.id);
                        $('#fee').val(data.fee);
                        $('#user_id').val(data.user_id).trigger('change');
                        $('#subject_id').val(data.subject_id).trigger('change');
                    }
                });

                $("#exampleModal").modal('toggle');

            }

            if(action == "manage_schedules"){
                var id = $(this).attr('data-id');
                loadSchedules(id);
                $("#scheduleModal").modal('toggle');

            }

        });

        function load_levels(subject_id)
        {
            console.log(subject_id);
            $("#level_id").empty();

            $.ajax({
                type:'POST',
                url: 'classes/ajax/load_levels',
                data:{
                    _token:CSRF_TOKEN,
                    id:subject_id,
                },
                dataType:"json",
                success:function(data)
                {

                    console.log(data);

                    var newOption;
                    $.each(data, function (key, arr_val) {
                        newOption = new Option(arr_val.name, arr_val.id, false, false);
                        $('#level_id').append(newOption);
                    });
                },
                complete: function() {
                    if(update_ctr == 1){
                        $('#level_id').val(global_level_id).trigger('change');
                    }
                }
            });
        }


        $(document).on('change','#subject_id',function()
        {
            load_levels($(this).val());
        });

        function tConvert (time) {
        // Check correct time format and split into components
        time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

        if (time.length > 1) { // If time format correct
            // console.log(time);
            time = time.slice (1);  // Remove full string match value
            time.splice(3, 1); // aken
            // console.log(time);
            time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
            time[0] = +time[0] % 12 || 12; // Adjust hours
        }

        return time.join ('');
        // return adjusted time or original string
        }


        var KTDatatableRemoteAjaxDemo = function() {
            // Private functions

            // basic demo
            var demo = function() {

                datatable = $('#class_datatable').KTDatatable({
                    // datasource definition
                    data: {
                        type: 'remote',

                        source: {
                            read: {
                                url: 'classes/ajax/list',
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                map: function(raw) {
                                    var dataSet = raw;
                                    if (typeof raw.data !== 'undefined') {
                                        dataSet = raw.data;
                                    }
                                    return dataSet;
                                },
                            },
                        },
                        pageSize: 10,
                        serverPaging: true,
                        serverFiltering: true,
                        serverSorting: true,
                    },

                    // layout definition
                    layout: {
                        scroll: false,
                        footer: false,
                    },

                    // column sorting
                    sortable: true,
                    pagination: true,

                    search: {
                        input: $('#class_datatable_search_query'),
                        key: 'generalSearch'
                    },

                    // columns definition
                    columns: [{
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        type: 'number',
                        selector: {
                            class: ''
                        },
                        textAlign: 'center',
                    }, {
                        field: 'class',
                        title: 'Class',
                        sortable: true,
                    },{
                        field: 'fee',
                        title: 'Fee',
                        sortable: true,
                    },{
                        field: 'dates',
                        title: 'Dates',
                        sortable: false,
                        template: function(row) {
                            var d = '';
                            var tmp_arr = [];
                            tmp_arr = row.schedule;
                            if (tmp_arr) {
                                for (var x=0; x < tmp_arr.length; x++) {

                                    var current_url = window.location.href;

                                    var meeting_number=tmp_arr[x].meeting_url.split('/')[4];

                                    var  zoom_url = "";
                                    var testTool = window.testTool;

                                    ZoomMtg.preLoadWasm();

                                    var API_KEY = "Pp9sDATNTMST-gRl29Q2wA";
                                    var API_SECRET = "9zgCZRmJIKaknmHRKeA0Tj5bs6dPhE1qnItC";

                                    var zoom_name = testTool.b64EncodeUnicode('Artbug');
                                    var zoom_email = testTool.b64EncodeUnicode('eugene.chen@orcasg.com');

                                    var signature = ZoomMtg.generateSignature({
                                    meetingNumber: meeting_number,
                                    apiKey: API_KEY,
                                    apiSecret: API_SECRET,
                                    role: 1,
                                    success: function (res) {
                                        console.log(res.result);
                                        zoom_url = "artbug-classes/meeting?name="+  zoom_name +"&mn="+ meeting_number + "&email="+ zoom_email +  '&pwd=&role=1&lang=en-US&signature='+ res.result +'&china=0&apiKey='+ API_KEY;

                                    },
                                    });


                                    d +=  moment(tmp_arr[x].start_date).format('DD MMMM YYYY') + '<br />';
                                    d +=  "<span class='ml-5'>" +tConvert(tmp_arr[x].start_time) + " to " + tConvert(tmp_arr[x].end_time) + '</span><br />';
                                    d +=  '<a href="'+ zoom_url +'"   target="_blank"><button class="btn btn-primary btn-sm">Join Meeting</button></a><br/>';
                                    d += "<hr>";
                                    }
                            }


                        return d;
                        }
                    },{
                        field: 'subject.subject',
                        title: 'Subject',
                        sortable: false,
                    },{
                        field: 'level.name',
                        title: 'Level',
                        sortable: false,
                    },
                    {
                        field: 'user.first_name',
                        title: 'Teacher',
                        sortable: false,
                    }, {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 200,
                        overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                <div class="dropdown dropdown-inline">\
                                <a href="javascript:;"  class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="update" data-id="'+ row.id +'" title="Edit Details"">\
                                <span class="svg-icon svg-icon-md">\
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                            <rect x="0" y="0" width="24" height="24"/>\
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                        </g>\
                                    </svg>\
                                </span>\
                                </a>\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon action_user" data-action="manage_schedules" data-id="'+ row.id +'" title="Edit details">\
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-09-093151/theme/html/demo1/dist/../src/media/svg/icons/Code/Settings4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                    <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
                                    </g>\
                                    </svg><!--end::Svg Icon--></span>\
                                </a>\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>\
                                    <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>\
                                    </g>\
                                    </svg></span>\
                                </a>\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo1/dist/../src/media/svg/icons/Communication/Share.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M10.9,2 C11.4522847,2 11.9,2.44771525 11.9,3 C11.9,3.55228475 11.4522847,4 10.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,16 C20,15.4477153 20.4477153,15 21,15 C21.5522847,15 22,15.4477153 22,16 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L10.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                    <path d="M24.0690576,13.8973499 C24.0690576,13.1346331 24.2324969,10.1246259 21.8580869,7.73659596 C20.2600137,6.12944276 17.8683518,5.85068794 15.0081639,5.72356847 L15.0081639,1.83791555 C15.0081639,1.42370199 14.6723775,1.08791555 14.2581639,1.08791555 C14.0718537,1.08791555 13.892213,1.15726043 13.7542266,1.28244533 L7.24606818,7.18681951 C6.93929045,7.46513642 6.9162184,7.93944934 7.1945353,8.24622707 C7.20914339,8.26232899 7.22444472,8.27778811 7.24039592,8.29256062 L13.7485543,14.3198102 C14.0524605,14.6012598 14.5269852,14.5830551 14.8084348,14.2791489 C14.9368329,14.140506 15.0081639,13.9585047 15.0081639,13.7695393 L15.0081639,9.90761477 C16.8241562,9.95755456 18.1177196,10.0730665 19.2929978,10.4469645 C20.9778605,10.9829796 22.2816185,12.4994368 23.2042718,14.996336 L23.2043032,14.9963244 C23.313119,15.2908036 23.5938372,15.4863432 23.9077781,15.4863432 L24.0735976,15.4863432 C24.0735976,15.0278051 24.0690576,14.3014082 24.0690576,13.8973499 Z" fill="#000000" fill-rule="nonzero" transform="translate(15.536799, 8.287129) scale(-1, 1) translate(-15.536799, -8.287129) "/>\
                                    </g>\
                                    </svg></span>\
                                </a>\
                            ';
                        },
                    }],

                });

                $('#class_datatable_search_subject').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'subject');
                });

                $('#class_datatable_search_teacher').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'teacher');
                });

                $('#class_datatable_search_subject').selectpicker();
                $('#class_datatable_search_teacher').selectpicker();

            };

            return {
                // public functions
                init: function() {
                    demo();
                },
            };
        }();


        var KTBootstrapTimepicker = function () {

        // Private functions
        var demos = function () {
        // minimum setup
        $('#kt_timepicker_1, #kt_timepicker_1_modal').timepicker();

        $('#kt_timepicker_2, #kt_timepicker_2_modal').timepicker();

        }

        return {
        // public functions
        init: function() {
        demos();
        }
        };
        }();


        var KTBootstrapDatepicker = function () {

        var arrows;
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

        // Private functions
        var demos = function () {
            // minimum setup
            $('#txt_date, #txt_date_validate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

            });

            // minimum setup for modal demo
            $('#txt_date_modal').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                dateFormat: 'yy-mm-dd',
                templates: arrows
            });

        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
        }();

        jQuery(document).ready(function() {

            KTBootstrapDatepicker.init();
            KTDatatableRemoteAjaxDemo.init();
            KTBootstrapTimepicker.init();
            addClass.init();

        });
    </script>
@endsection
