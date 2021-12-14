{{-- Extends layout --}}

@extends('layout.default')

{{-- Content --}}

@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Schedule</h3>
                    </div>

                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary subscribe-calendar-btn" data-role="{{ auth()->user()->roles[0]->name }}" data-url="{{ url("calendar/generate") }}">
                            Subscribe to Calendar
                        </button>
                    </div>

                </div>

                <div class="card-body">

                    <div id="kt_calendar"></div>

                </div>
            </div>
        </div>
    </div>



    <div class="row mt-5">
        <div class="col-lg-4 col-xxl-4">
            <div class="card card-custom">
                <div class="card-body">
                    <div id="chart"></div>

                    {{-- <classes-conducted></classes-conducted> --}}

                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xxl-4">
            <div class="card card-custom">
                <div class="card-body">
                    <div id="chart2"></div>

                    {{-- <new-students></new-students> --}}

                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xxl-4">
            <div class="card card-custom">
                <div class="card-body">

                    <div id="chart3"></div>

                    {{-- <payment-received></payment-received> --}}

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="schedule-subject"></h3>
                    <p class="schedule-description"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

    <link rel="stylesheet" href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}">

@section('styles')

@endsection


{{-- Scripts Section --}}

@section('scripts')

    {{-- <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script> --}}

    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

    {{-- <script src="/js/pages/features/calendar/basic.js"></script> --}}

<script>

var KTCalendarBasic = function() {

return {
//main function to initiate the module
init: function() {
// Calendar Variables
    var todayDate = moment().startOf('day');
    var YM = todayDate.format('YYYY-MM');
    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
    var TODAY = todayDate.format('YYYY-MM-DD');
    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

    // Calendar Initialization
    var calendarEl = document.getElementById('kt_calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        themeSystem: 'bootstrap',

        isRTL: KTUtil.isRTL(),

        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        height: 800,
        contentHeight: 780,
        aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

        nowIndicator: true,
        now: TODAY + 'T09:25:00', // just for demo

        views: {
            dayGridMonth: { buttonText: 'month' },
            timeGridWeek: { buttonText: 'week' },
            timeGridDay: { buttonText: 'day' }
        },

        defaultView: 'dayGridMonth',
        defaultDate: TODAY,
        html: true,
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        navLinks: true,
        events: {
            url: '{{ route("teacher.schedule") }}',
        },
        eventRender: function(info) {
            console.log(info);
            var element = $(info.el);

            if (element.hasClass('fc-day-grid-event')) {
                element.data('content', info.event.extendedProps.description);
                element.data('placement', 'top');
                KTApp.initPopover(element);
            } else if (element.hasClass('fc-time-grid-event')) {
                element.find('.fc-title').append('&lt;div class="fc-description"&gt;' + info.event.extendedProps.description + '&lt;/div&gt;');
            } else if (element.find('.fc-list-item-title').lenght !== 0) {
                element.find('.fc-list-item-title').append('&lt;div class="fc-description"&gt;' + info.event.extendedProps.description + '&lt;/div&gt;');
            }
        },
        eventClick:  function(event, jsEvent, view) {
            $('#kt_modal_1 .modal-title').html(event.event.title);
            $('#kt_modal_1 .modal-body .schedule-subject').html(event.event.extendedProps.subject_name);
            $('#kt_modal_1 .modal-body .schedule-description').html(event.event.extendedProps.description);
            $('#kt_modal_1').modal();
        },
        dateClick: function(info) {

        }
    });

calendar.render();
}
};
}();



    $(document).ready(function() {

        $('.subscribe-calendar-btn').on('click touchstart', function(e) {
                e.preventDefault();

                const myUrlWithParams = new URL($(this).data('url'));

                myUrlWithParams.searchParams.append("role", $(this).data('role'));
                myUrlWithParams.searchParams.append("id", "{{ auth()->user()->id }}");

                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(myUrlWithParams).select();
                document.execCommand("copy");
                $temp.remove();
                alert("Link copied to Clipboard")
            })

        KTCalendarBasic.init();

            var options = {

                series: [{

                    name: "Classes",

                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]

                }],

                chart: {

                    height: 350,
                    type: 'line',
                    toolbar: {
                    show: false
                    },
                    zoom: {
                        enabled: false
                    }

                },

                dataLabels: {

                    enabled: false

                },

                stroke: {

                    curve: 'straight'

                },

                title: {

                    text: 'Classes Conducted',

                    align: 'left'

                },

                grid: {

                row: {

                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns

                    opacity: 0.5

                },

                },

                xaxis: {

                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],

                }

            };



        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();





        var options2 = {

                series: [{

                    name: "Students",

                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]

                }],

                chart: {

                    height: 350,

                    type: 'line',
                    toolbar: {
                    show: false
                    },

                    zoom: {

                        enabled: false

                    }

                },

                dataLabels: {

                    enabled: false

                },

                stroke: {

                    curve: 'straight'

                },

                title: {

                    text: 'New Students',

                    align: 'left'

                },

                grid: {

                row: {

                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns

                    opacity: 0.5

                },

                },

                xaxis: {

                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],

                }

            };



        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

        chart2.render();



        var options3 = {

            series: [{

                name: 'Payment Received',

                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]

            }

            ],

            chart: {

                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                    },

            },

            title: {

                    text: 'Payments Received',

                    align: 'left'

            },

            fill: {

                colors: ['#00E396']

            },

            plotOptions: {

                bar: {

                    borderRadius: 4,

                    horizontal: true,

                }

            },

            dataLabels: {

                enabled: false

            },

            xaxis: {

                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],

            },

            yaxis: {

                title: {

                text: '$ (thousands)'

                }

            },

            fill: {

                opacity: 1

            },

            tooltip: {

                y: {

                formatter: function (val) {

                    return "$ " + val + " thousands"

                }

                }

            }

        };



        var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);

        chart3.render();



    })



</script>



@endsection

