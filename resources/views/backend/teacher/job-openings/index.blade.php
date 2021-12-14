{{-- Extends layout --}}

@extends('layout.default')



{{-- Content --}}

@section('content')



    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">

                <h3 class="card-label">Manage Job Openings

                </h3>

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



@endsection



{{-- Styles Section --}}
@section('styles')
    {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/> --}}
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    {{-- <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script> --}}

    {{-- page scripts --}}

    <script>


var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                
                source: {
                    read: {
                        url: 'job-openings/ajax/list',
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
            columns: [ {
                field: 'class',
                title: 'Class',
            },{
                field: 'date',
                title: 'Date',
            },{
                field: 'time',
                title: 'Time',
            },{
                field: 'salary',
                title: 'Salary',
            },{
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function() {
                    return '\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-09-093151/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\
                                    <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>\
                                    </g>\
                                    </svg><!--end::Svg Icon--></span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-09-093151/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                            <rect x="0" y="0" width="24" height="24"/>\
                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>\
                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
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

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});


       
    </script>


@endsection

