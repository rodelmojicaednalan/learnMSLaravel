{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>

 /* #zmmtg-root {
  display: none;
  height:0px;
  width:0px;
}  */

body {
  overflow: auto !important;
}

body > #zmmtg-root {
  display: none !important;
  height:0px;
  width:0px;
}

</style>



   <?php if($data_count == 0){
     ?>

   <div class="card card-custom" id="show_enrolled" style="display:none;">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Enrolled Training
                </h3>
            </div>
            <div class="card-toolbar">

            </div>
        </div>

        <div class="card-body">




            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable2"></div>

        </div>

    </div>

    <?php
      }
     ?>


   <?php if($data_count >= 1){
     ?>

   <div class="card card-custom" id="show_enrolled">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Enrolled Training </h3>
            </div>
            <div class="card-toolbar">

            </div>
        </div>

        <div class="card-body">




            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable2"></div>

        </div>

    </div>

    <?php
      }
     ?>







    <br>

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Available Training Schedule
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                {{-- <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export
                    </button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div> --}}
                <!--end::Dropdown-->
                <!--begin::Button-->
                <!--end::Button-->
            </div>
        </div>

        <div class="card-body">

            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-12 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            {{-- <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                            Search
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->


            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>

        </div>

    </div>





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enroll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

            <h3 id="txt_slots">Available Slots</h3>

            <button class="btn btn-primary">Enroll Now</button>






            </div>
            <div class="modal-footer">

            </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="materialsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Materials</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">

           <div class="datatable datatable-bordered datatable-head-custom kt_datatable" id="material_datatable"></div>


        </div>
        <div class="modal-footer">

        </div>

        </div>
    </div>
    </div>



@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.6/css/react-select.css" />
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

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
    var datatable2;
    var datatable3;
    var eventsCapture;

    var tables_click_counter=0;

    var global_subject_id = 0;


$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');


 if(action == "show_materials")
 {
   global_subject_id = $(this).attr('data-id')
   $('#materialsModal').modal('toggle');



   if(tables_click_counter == 0)
    {
        materialsTable.init();

        tables_click_counter++;

    }
    else {
        datatable3.reload();
    }

 }


 if(action == "enroll")
 {


    var id = $(this).attr('data-id'); //training_id
    var slots = $(this).attr('data-slots');

    Swal.fire({
        title: 'Are you sure you want to enroll?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Enroll`,
        denyButtonText: `Cancel`,
        }).then((result) => {
        if (result.isConfirmed) {

                window.location.href = "{{ route('teacher.pricing') }}" + '?training_id=' + id;
                    // $.ajax({
                    // type:'POST',
                    // url: 'training-schedule/ajax/enroll',
                    // dataType:"json",
                    // data:{
                    //     id:id,
                    //     slots:slots,
                    //     _token: CSRF_TOKEN,
                    // },
                    // success:function(data)
                    // {


                    //     if(data.error == false)
                    //     {
                    //         Swal.fire({
                    //         icon: "success",
                    //         title: "Enroll",
                    //         html: data.message,
                    //         });


                    //             datatable.reload();

                    //     }

                    //     else {

                    //     var err_txt = "";
                    //     var get_text = "";
                    //     for(var x=0 ; x < data.errors.length ; x++){

                    //     get_text =  data.errors[x];

                    //     err_txt += get_text + "<br>";
                    //     }


                    //     Swal.fire({
                    //     icon: "error",
                    //     title: "Enroll",
                    //     html: err_txt,
                    //     });

                    //     }



                    // }
                    // });



        } else if (result.isDenied) {

        }
        })

  }



});





function tConvert (time) {
  // Check correct time format and split into components
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join (''); // return adjusted time or original string
}


var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

         datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'training-schedule/ajax/list',
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
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
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'title',
                title: 'Title',
            },{
                field: 'subject.subject',
                title: 'Subject',
            },{
                field: 'slots',
                title: 'Available Slots',
            },{
                field: 'dates',
                title: 'Dates',
                template: function(row) {
                    var d = '';
                    var tmp_arr = [];
                    tmp_arr = row.schedule;
                    for (var x=0; x < tmp_arr.length; x++) {
                            d +=  moment(tmp_arr[x].start_date).format('DD MMMM YYYY') + '<br />';
                            d +=  "<span class='ml-5'>" +tConvert(tmp_arr[x].start_time) + " to " + tConvert(tmp_arr[x].end_time) + '</span><br />';
                            d += "<hr>";
                    }
                   return d;
                }
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    var d = '';
                    var tmp_arr = [];
                    tmp_arr = row.schedule;
                    for (var x=0; x < tmp_arr.length; x++) {
                        var currTimestamp = moment().format('YYYY-MM-DD HH:mm:ss');
                        var schedule = moment(row.schedule[x].start_date +' '+row.schedule[x].start_time, "YYYY-MM-DD HH:mm:ss").subtract(1, 'hours')

                        var dDiff = schedule.diff(currTimestamp);
                        if (dDiff > 0) {
                            return '\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-slots="' + row.slots + '" data-id="' + row.id + '" data-action="enroll" title="Edit details">\
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Money.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>\
                                        <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>\
                                        </g>\
                                        </svg><!--end::Svg Icon--></span>\
                                    </a>\
                                ';
                        }
                    }
                    return '';

                },
            }],

        });

        $('#kt_datatable_search_role').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'role');
        });

       $('#kt_datatable_search_gender').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'gender');
        });



        $('#kt_datatable_search_role').selectpicker();
        $('#kt_datatable_search_teacher').selectpicker();

    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();



var KTDatatableRemoteAjaxDemo2 = function() {
    // Private functions

    // basic demo
    var demo = function() {

         datatable2 = $('#kt_datatable2').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'training-schedule/ajax/training_list',
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
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
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'xd',
                title: 'Title',
                template: function(row) {
                        var d = row.training[0].title;
                       return d;

                }
            },{
                field: 'sub',
                title: 'Subject',
                template: function(row) {
                        var d = row.training[0].subject.subject
                       console.log(row);
                       return d;

                }
            },{
                field: 'dates',
                title: 'Dates',
                template: function(row) {
                    console.log(row);
                    var d = '';
                    var tmp_arr = [];
                    tmp_arr = row.training[0].schedule;


                    // console.log(row.dates_arr[0].end_time);
                    // tConvert(row.class_start_time)
                    // console.log(row['dates']);
                    for (var x=0; x < tmp_arr.length; x++) {

                          var current_url = window.location.href;
                          console.log(tmp_arr[x])
                            var meeting_number=tmp_arr[x].meeting_url.split('/')[4];

                            var  zoom_url = "";
                            var testTool = window.testTool;

                            ZoomMtg.preLoadWasm();

                            var API_KEY = "Pp9sDATNTMST-gRl29Q2wA";
                            var API_SECRET = "9zgCZRmJIKaknmHRKeA0Tj5bs6dPhE1qnItC";

                            // var zoom_name = testTool.b64EncodeUnicode('Artbug');
                            var zoom_name = testTool.b64EncodeUnicode('{{ auth()->user()->first_name ." " . auth()->user()->last_name }}');
                            var zoom_email = testTool.b64EncodeUnicode('{{ auth()->user()->email }}');

                            var signature = ZoomMtg.generateSignature({
                            meetingNumber: meeting_number,
                            apiKey: API_KEY,
                            apiSecret: API_SECRET,
                            role: 0,
                            success: function (res) {
                            console.log(res.result);
                            // meetingConfig.signature = res.result;
                            // meetingConfig.apiKey = API_KEY;
                            // var joinUrl = "/meeting.html?" + testTool.serialize(meetingConfig);
                            zoom_url = "training-schedule/meeting?name="+  zoom_name +"&mn="+ meeting_number + "&email="+ zoom_email +  '&pwd=&role=0&lang=en-US&signature='+ res.result +'&china=0&apiKey='+ API_KEY;


                            // console.log(joinUrl);
                            // window.open(joinUrl, "_blank");
                            },
                            });


                            d +=  moment(tmp_arr[x].start_date).format('DD MMMM YYYY') + '<br />';
                            d +=  '<a href="'+ zoom_url +'"   target="_blank"><button class="btn btn-primary btn-sm">Join Meeting</button></a><br/>';
                            d +=  "<span class='ml-5'>" +tConvert(tmp_arr[x].start_time) + " to " + tConvert(tmp_arr[x].end_time) + '</span><br />';
                            d += "<hr>";
                    }
                   return d;
                }
            },
            {
                field: 'zxc',
                title: 'Materials',
                template: function(row) {


                            return '\
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="show_materials" data-id="'+ row.training[0].subject_id +'">\
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\
                                    <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                    <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>\
                                    </g>\
                                </svg><!--end::Svg Icon--></span>\
                            </a>\
                            ';

                }
            },
         ],

        });



        $('#kt_datatable_search_role').on('change', function() {
            datatable2.search($(this).val().toLowerCase(), 'role');

        });

       $('#kt_datatable_search_gender').on('change', function() {
            datatable2.search($(this).val().toLowerCase(), 'gender');
        });

       eventsCapture = function() {
		$('#kt_datatable').on('datatable-on-init', function() {


		}).on('datatable-on-layout-updated', function() {

		}).on('datatable-on-ajax-done', function() {

		}).on('datatable-on-ajax-fail', function(e, jqXHR) {

		}).on('datatable-on-goto-page', function(e, args) {

		}).on('datatable-on-update-perpage', function(e, args) {

		}).on('datatable-on-reloaded', function(e) {

		}).on('datatable-on-check', function(e, args) {

		}).on('datatable-on-uncheck', function(e, args) {

		}).on('datatable-on-sort', function(e, args) {

		});
	};





        $('#kt_datatable_search_role').selectpicker();
        $('#kt_datatable_search_teacher').selectpicker();

    };

    return {
        // public functions
        init: function() {
            demo();
            eventsCapture();

        },
    };
}();


var materialsTable = function() {
    // Private functions

    // basic demo
    var demo = function() {

         datatable3 = $('#material_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'training-schedule/ajax/materials_list',
                        data:{
                        subject_id: function() { return global_subject_id },
                        _token: function() { return CSRF_TOKEN },
                        },
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
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
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'name',
                title: 'Name',
            }, {
                field: 'type',
                title: 'type',
            },  {
                field: 'size',
                title: 'Size',
            }, {
                field: 'updated_at',
                title: 'Last Modified',
                type: 'date',
                template: function(row) {
                    return moment(row.updated_at).format('DD MMMM YYYY');
                }
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {

                    var file_p = window.location.origin + '/upload_img/'  + row.path;

                    return '\
                        <a href="'+ file_p +'" class="btn btn-sm btn-clean btn-icon" title="Download" download>\
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Cloud-download.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                <polygon points="0 0 24 0 24 24 0 24"/>\
                                <path d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z" fill="#000000" opacity="0.3"/>\
                                <path d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.959697, 18.661508) rotate(-270.000000) translate(-11.959697, -18.661508) "/>\
                                </g>\
                                </svg><!--end::Svg Icon--></span>\
                        </a>\
                    ';
                },
            }],

        });

        $('#kt_datatable_search_role').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'role');
        });

       $('#kt_datatable_search_gender').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'gender');
        });



        $('#kt_datatable_search_role').selectpicker();
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
    KTDatatableRemoteAjaxDemo2.init();
    KTBootstrapTimepicker.init();
});

    </script>


@endsection
