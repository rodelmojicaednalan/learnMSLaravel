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
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    {{-- <script src="/js/pages/features/calendar/basic.js"></script> --}}
    <script>

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
                url: '{{ route("parent.schedule") }}',
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
        });

        calendar.render();
    })

    </script>

@endsection

