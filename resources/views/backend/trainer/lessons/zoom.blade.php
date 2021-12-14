
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>

<style>
ul[role="menu"] {
  display: none;
}

.meeting-client .footer-button__button-label{
    color: rgba(255, 255, 255, 0.5);
}

</style>

 {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>  --}}

 <body>

 </body>

 </html>
{{--
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script> --}}
    <script>
        window.zoomControls = {
            returnUrl : '{{ route("trainer.lessons") }}'
        }
    </script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.6.min.js"></script>

    <script src="{{ asset('js/zoom/tool.js') }}"></script>
    <script src="{{ asset('js/zoom/vconsole.min.js') }}"></script>
    <script src="{{ asset('js/zoom/meeting.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


