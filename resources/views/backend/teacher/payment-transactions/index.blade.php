{{-- Extends layout --}}

@extends('layout.default')



{{-- Content --}}

@section('content')



    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">

                <h3 class="card-label">Manage Payment Transactions

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
                        url: 'payment-transactions/ajax/list',
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
                field: 'transaction_id',
                title: 'Transaction ID',
            },{
                field: 'payment_date',
                title: 'Date',
            },
            {
                field: 'description',
                title: 'Description',
            },{
                field: 'amount',
                title: 'Amount',
            },],

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

