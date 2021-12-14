{{-- Extends layout --}}

@extends('layout.default')



{{-- Content --}}

@section('content')



    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">

                <h3 class="card-label">Manage Students

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
                        url: 'students/ajax/list',
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
                title: 'Student Name',
                template: function(data, type, row) {
                    var middlename = (data.child.middlename) ? data.child.middlename : '';
                    return `${data.child.firstname} ${middlename} ${data.child.lastname}`;
                },
            },{
                field: 'date_joined',
                title: 'Date Joined',
                template: function(data, type, row) {
                    return moment(data.child.created_at).format('DD MMMM YYYY');
                },
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
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-09-093151/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                <rect x="0" y="0" width="24" height="24"/>\
                                <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>\
                                <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>\
                                </g>\
                                </svg><!--end::Svg Icon--></span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-09-093151/theme/html/demo1/dist/../src/media/svg/icons/Media/Playlist2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                            <rect x="0" y="0" width="24" height="24"/>\
                            <path d="M11.5,5 L18.5,5 C19.3284271,5 20,5.67157288 20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L11.5,8 C10.6715729,8 10,7.32842712 10,6.5 C10,5.67157288 10.6715729,5 11.5,5 Z M5.5,17 L18.5,17 C19.3284271,17 20,17.6715729 20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 C4,17.6715729 4.67157288,17 5.5,17 Z M5.5,11 L18.5,11 C19.3284271,11 20,11.6715729 20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L5.5,14 C4.67157288,14 4,13.3284271 4,12.5 C4,11.6715729 4.67157288,11 5.5,11 Z" fill="#000000" opacity="0.3"/>\
                            <path d="M4.82866499,9.40751652 L7.70335558,6.90006821 C7.91145727,6.71855155 7.9330087,6.40270347 7.75149204,6.19460178 C7.73690043,6.17787308 7.72121098,6.16213467 7.70452782,6.14749103 L4.82983723,3.6242308 C4.62230202,3.44206673 4.30638833,3.4626341 4.12422426,3.67016931 C4.04415337,3.76139218 4,3.87862714 4,4.00000654 L4,9.03071508 C4,9.30685745 4.22385763,9.53071508 4.5,9.53071508 C4.62084305,9.53071508 4.73759731,9.48695028 4.82866499,9.40751652 Z" fill="#000000"/>\
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


