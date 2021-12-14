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

        #enroll_modal table tr td:first-child {
            width: 100px;
        }
    </style>

    @include('backend.parent.classes._classes-table')



    @include('backend.parent.classes._recommended-class-table')

    <div class="modal fade" id="enroll_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enroll to <span class="class-name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <input type="hidden" name="class_id" class="class_id">
                        <tbody>
                            <tr>
                                <td><strong>Subject</strong></td>
                                <td><span class="subject-name"></span></td>
                            </tr>
                            <tr>
                                <td><strong>Date(s)</strong></td>
                                <td><div class="dates"></div></td>
                            </tr>
                            <tr>
                                <td><strong>Teacher</strong></td>
                                <td><span class="teacher"></span></td>
                            </tr>
                            <tr>
                                <td><strong>Child</strong></td>
                                <td>
                                    <div class="form-group child"></div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Fees</strong></td>
                                <td><span class="fees"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary confirm-payment">Confirm and Pay</button>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- Styles Section --}}

@section('styles')

    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>

@endsection





{{-- Styles Section --}}
@section('styles')
    {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/> --}}
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.6/css/react-select.css" />
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    {{-- <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script> --}}

    {{-- page scripts --}}

    <script src="https://source.zoom.us/1.9.6/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.6.min.js"></script>

    <script src="{{ asset('js/zoom/tool.js') }}"></script>
    <script src="{{ asset('js/zoom/vconsole.min.js') }}"></script>

    <script>

    var arr_subjects = [];
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).on('click', '.confirm-payment', function(e) {
        e.preventDefault();
        var id = $('.class_id').val();
        var atLeastOneIsChecked = $('input[name="child[]"]:checked').length > 0;
            console.log();
            if (atLeastOneIsChecked) {
                var checked = $('input[name="child[]"]:checked').serialize();
                window.location.href = "{{ route('parent.pricing') }}" + '?class_id=' + id + '&' + checked;
            }else{
                alert('Please select atleast one child');
            }
    })

    $(document).on('click','.action_user',function(e)
    {
        e.preventDefault();

        var action = $(this).attr('data-action');

        if(action == "enroll")
        {
            var class_id = $(this).data('id'); // class_id
            var teacher_id = $(this).data('teacher-id');

            $.ajax({
                type:'POST',
                url: 'child/ajax/get_class_details',
                data:{
                    class_id : class_id,
                    teacher_id : teacher_id,
                    _token: CSRF_TOKEN,
                },
                success:function(res)
                {
                    if (res) {
                        $('.class_id').val(class_id);
                        $('.class-name').html(res.class.class)
                        $('.subject-name').html(res.class.subject.subject)
                        $('.fees').html(res.class.fee)
                        $('.teacher').html(`${res.class.user.first_name} ${res.class.user.last_name}`);
                        $('#enroll_modal').modal('show');
                        var d = '';
                        tmp_arr = res.class.schedule;
                        for (var x=0; x < tmp_arr.length; x++) {
                                d +=  moment(tmp_arr[x].start_date).format('DD MMMM YYYY') + '<br />';
                                d +=  "<span class='ml-5'>" +tConvert(tmp_arr[x].start_time) + " to " + tConvert(tmp_arr[x].end_time) + '</span><br />';
                                if (tmp_arr.length > 1) {
                                    d += "<hr>";
                                }
                        }
                        var child = '';
                        $.each(res.child, function( k, v ) {
                            child += `
                                    <label class="kt-checkbox">
                                        <input name="child[]" class="child-input" type="checkbox" value="${v.id}"> ${v.firstname} ${(v.middlename) ? v.middlename : ''} ${v.lastname}
                                        <span></span>
                                    </label><br>`;
                        })

                        $('.dates').html(d);
                        $('.child').html(child);

                    }else{
                        alert('Error on retreiving details');
                    }
                }
            });

            // Swal.fire({
            //     title: 'Are you sure you want to enroll?',
            //     showDenyButton: true,
            //     showCancelButton: false,
            //     confirmButtonText: `Enroll`,
            //     denyButtonText: `Cancel`,
            //     }).then((result) => {
            //     if (result.isConfirmed) {

            //             window.location.href = "{{ route('parent.pricing') }}" + '?class_id=' + id;

            //     } else if (result.isDenied) {

            //     }
            // })
        }
    });

$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

   var action = $(this).attr('data-action');
    if(action == "clear")
    {
        $(".arr_subjects").prop('checked', false);
    }

 });

$(document).on('click','#btnRequest',function(e){


arr_subjects = [];

var children_id = $('#txt_children').val();


$(".arr_subjects").each(function(){


if ($(this).is(":checked"))
{
    arr_subjects.push($(this).val());

}
});

if(arr_subjects.length == 0)
{
    Swal.fire({
    icon: "error",
    title: "Request Grading",
    html: "Please select a subject",
    });

}

else {

$.ajax({
type:'POST',
url: 'grading-request/ajax/schedule_request_grading',
data:{
    children_id:children_id,
    subjects: JSON.stringify(arr_subjects),
    _token: CSRF_TOKEN,
},
success:function(data)
{

        if(data.error == false)
        {
        Swal.fire({
        icon: "success",
        title: "Add",
        html: data.message,
        });

            $("#exampleModal").modal('toggle');

        }



}
});

}

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

        var private_class_datatable = $('#private-class').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'classes/ajax/private-class-list',
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
                input: $('#private_class_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'classID',
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
                template: function ( data, type, row ) {
                    return `${data.class.class}`;
                },
            },
            // {
            //     field: 'date',
            //     title: 'Date',
            //     template: function ( data, type, row ) {
            //         var sc = '';
            //         $.each(data.schedule, function(k, v) {
            //             sc = `${moment(v.start_date).format('DD MMMM YYYY')}`
            //         })
            //         return sc;
            //     }
            // },
            // {
            //     field: 'time',
            //     title: 'Time',
            //     template: function ( data, type, row ) {
            //         var sc = '';
            //         $.each(data.schedule, function(k, v) {
            //             sc = `${tConvert(v.start_time)} - ${tConvert(v.end_time)}`
            //         })
            //         return sc;
            //     }
            // },
            {
                field: 'teacher',
                title: 'Teacher',
                template: function ( data, type, row ) {
                    return `${data.class.user.first_name} ${data.class.user.last_name}`;
                },
            },
            {
                field: 'child',
                title: 'Child',
                template: function ( data, type, row ) {
                    var middlename = (data.child.middlename) ? data.child.middlename : '';
                    return `${data.child.firstname} ${middlename} ${data.child.lastname}`;
                },
            },{
                field: 'dates',
                title: 'Dates',
                template: function(row) {
                    console.log(row);
                    var d = '';
                    var tmp_arr = [];
                    tmp_arr = row.schedule;

                    for (var x=0; x < tmp_arr.length; x++) {

                          var current_url = window.location.href;
                          console.log(tmp_arr[x])
                            var meeting_number=tmp_arr[x].meeting_url.split('/')[4];

                            var  zoom_url = "";
                            var testTool = window.testTool;

                            ZoomMtg.preLoadWasm();

                            var API_KEY = "Pp9sDATNTMST-gRl29Q2wA";
                            var API_SECRET = "9zgCZRmJIKaknmHRKeA0Tj5bs6dPhE1qnItC";

                            var zoom_name = testTool.b64EncodeUnicode('{{ auth()->user()->first_name ." " . auth()->user()->last_name }}');
                            var zoom_email = testTool.b64EncodeUnicode('{{ auth()->user()->email }}');

                            var signature = ZoomMtg.generateSignature({
                            meetingNumber: meeting_number,
                            apiKey: API_KEY,
                            apiSecret: API_SECRET,
                            role: 0,
                            success: function (res) {
                            console.log(res.result);
                            zoom_url = "training-schedule/meeting?name="+  zoom_name +"&mn="+ meeting_number + "&email="+ zoom_email +  '&pwd=&role=0&lang=en-US&signature='+ res.result +'&china=0&apiKey='+ API_KEY;

                            },
                            });

                            var currTimestamp = moment().format('YYYY-MM-DD HH:mm:ss');
                            var schedule = moment(row.schedule[0].start_date +' '+row.schedule[0].start_time, "YYYY-MM-DD HH:mm:ss").subtract(1, 'hours')

                            var dDiff = schedule.diff(currTimestamp);
                            d +=  moment(tmp_arr[x].start_date).format('DD MMMM YYYY') + '<br />';
                            if (dDiff > 0) {

                                d +=  '<a href="'+ zoom_url +'"   target="_blank"><button class="btn btn-primary btn-sm">Join Meeting</button></a><br/>';

                            }else{
                                d += '';
                            }
                            d +=  "<span class='ml-5'>" +tConvert(tmp_arr[x].start_time) + " to " + tConvert(tmp_arr[x].end_time) + '</span><br />';
                                d += "<hr>";
                    }
                   return d;
                }
            }],

        });

        var public_class_datatable = $('#public-class').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'classes/ajax/public-class-list',
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
                input: $('#public_class_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'classID',
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
                template: function ( data, type, row ) {
                    return `${data.class.class}`;
                },
            },
            {
                field: 'teacher',
                title: 'Teacher',
                template: function ( data, type, row ) {
                    return `${data.class.user.first_name} ${data.class.user.last_name}`;
                },
            },
            {
                field: 'child',
                title: 'Child',
                template: function ( data, type, row ) {
                    var middlename = (data.child.middlename) ? data.child.middlename : '';
                    return `${data.child.firstname} ${middlename} ${data.child.lastname}`;
                },
            }, {
                field: 'dates',
                title: 'Dates',
                template: function(row) {
                    console.log(row);
                    var d = '';
                    var tmp_arr = [];
                    tmp_arr = row.schedule;

                    for (var x=0; x < tmp_arr.length; x++) {

                          var current_url = window.location.href;
                          console.log(tmp_arr[x])
                            var meeting_number=tmp_arr[x].meeting_url.split('/')[4];

                            var  zoom_url = "";
                            var testTool = window.testTool;

                            ZoomMtg.preLoadWasm();

                            var API_KEY = "Pp9sDATNTMST-gRl29Q2wA";
                            var API_SECRET = "9zgCZRmJIKaknmHRKeA0Tj5bs6dPhE1qnItC";

                            var zoom_name = testTool.b64EncodeUnicode('{{ auth()->user()->first_name ." " . auth()->user()->last_name }}');
                            var zoom_email = testTool.b64EncodeUnicode('{{ auth()->user()->email }}');

                            var signature = ZoomMtg.generateSignature({
                            meetingNumber: meeting_number,
                            apiKey: API_KEY,
                            apiSecret: API_SECRET,
                            role: 0,
                            success: function (res) {
                            console.log(res.result);
                            zoom_url = "training-schedule/meeting?name="+  zoom_name +"&mn="+ meeting_number + "&email="+ zoom_email +  '&pwd=&role=0&lang=en-US&signature='+ res.result +'&china=0&apiKey='+ API_KEY;

                            },
                            });

                            var currTimestamp = moment().format('YYYY-MM-DD HH:mm:ss');
                            var schedule = moment(row.schedule[0].start_date +' '+row.schedule[0].start_time, "YYYY-MM-DD HH:mm:ss").subtract(1, 'hours')

                            var dDiff = schedule.diff(currTimestamp);
                            d +=  moment(tmp_arr[x].start_date).format('DD MMMM YYYY') + '<br />';
                            if (dDiff > 0) {

                                d +=  '<a href="'+ zoom_url +'"   target="_blank"><button class="btn btn-primary btn-sm">Join Meeting</button></a><br/>';

                            }else{
                                d+= '';
                            }

                            d +=  "<span class='ml-5'>" +tConvert(tmp_arr[x].start_time) + " to " + tConvert(tmp_arr[x].end_time) + '</span><br />';
                                d += "<hr>";
                    }
                   return d;
                }
            }],

        });
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

        var private_class_recommended_datatable = $('#private-class-recommended').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'classes/ajax/private-class-list-recommend',
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
                input: $('#private-class-recommended_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'classID',
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
            },
            {
                field: 'teacher',
                title: 'Teacher',
                template: function ( data, type, row ) {
                    console.log(data);
                    return `${data.user.first_name} ${data.user.last_name}`;
                },
            },
            {
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
                        var schedule = moment(row.schedule[0].start_date +' '+row.schedule[0].start_time, "YYYY-MM-DD HH:mm:ss").subtract(1, 'hours')

                        var dDiff = schedule.diff(currTimestamp);
                        if (dDiff > 0) {
                            return '\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-teacher-id="' + row.teacher_id + '" data-id="' + row.id + '" data-action="enroll" title="Enroll Subject">\
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

        var public_class_recommended_datatable = $('#public-class-recommended').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'classes/ajax/public-class-list-recommend',
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
                input: $('#public-class-recommended_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'classID',
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
            },
            {
                field: 'teacher',
                title: 'Teacher',
                template: function ( data, type, row ) {
                    console.log(data);
                    return `${data.user.first_name} ${data.user.last_name}`;
                },
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
                        var schedule = moment(row.schedule[0].start_date +' '+row.schedule[0].start_time, "YYYY-MM-DD HH:mm:ss").subtract(1, 'hours')

                        var dDiff = schedule.diff(currTimestamp);
                        if (dDiff > 0) {
                            return '\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-teacher-id="' + row.teacher_id + '" data-id="' + row.id + '" data-action="enroll" title="Enroll Subject">\
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

    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
    KTDatatableRemoteAjaxDemo2.init();
});



    </script>





@endsection

