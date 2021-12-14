{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                <h3 class="card-label">Manage Curriculums
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                </div>
            </div>
            <!--begin::Form-->
           
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-2">
                    <!-- Tabs nav -->
                        <div class="nav flex-column nav-pills nav-pills-custom" id="subjects_tab" role="tablist" aria-orientation="vertical">
                            <!-- <a class="nav-link mb-3 p-3 shadow active" id="v-pills-speech-tab" data-toggle="pill" href="#v-pills-speech" role="tab" aria-controls="v-pills-speech" aria-selected="true">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Speech and Drama</span>
                            </a>

                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-arts-tab" data-toggle="pill" href="#v-pills-arts" role="tab" aria-controls="v-pills-arts" aria-selected="false">
                            <i class="fa fa-calendar-minus-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Arts Class</span>
                            </a>                   -->
                        </div>
                    </div>


                    <div class="col-md-2">
                        <!-- Tabs content -->
                        <div class="tab-content" id="levels_tab">

                            <!-- <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-speech" role="tabpanel" aria-labelledby="v-pills-speech-tab">
                                
                                
                                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <h5 class="font-italic mb-4">Speech and Drama</h5>
                                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-speech-level1-tab" data-toggle="pill" href="#v-pills-speech-level1" role="tab" aria-controls="v-pills-speech-level1" aria-selected="true">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 1</span>
                                    </a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level2-tab" data-toggle="pill" href="#v-pills-speech-level2" role="tab" aria-controls="v-pills-speech-level2" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 2</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level3-tab" data-toggle="pill" href="#v-pills-speech-level3" role="tab" aria-controls="v-pills-speech-level3" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 3</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level4-tab" data-toggle="pill" href="#v-pills-speech-level4" role="tab" aria-controls="v-pills-speech-level4" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 4</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level5-tab" data-toggle="pill" href="#v-pills-speech-level5" role="tab" aria-controls="v-pills-speech-level5" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 5</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level6-tab" data-toggle="pill" href="#v-pills-speech-level6" role="tab" aria-controls="v-pills-speech-level6" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 6</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level7-tab" data-toggle="pill" href="#v-pills-speech-level7" role="tab" aria-controls="v-pills-speech-level7" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 7</span>
                                    </a>

                                 </div>

                            </div>           
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-arts" role="tabpanel" aria-labelledby="v-pills-arts-tab">
                                
                                
                                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <h5 class="font-italic mb-4">Arts Class</h5>
                                    <a class="nav-link mb-3 p-3 shadow " id="v-pills-arts-level1-tab" data-toggle="pill" href="#v-pills-arts-level1" role="tab" aria-controls="v-pills-arts-level1" aria-selected="true">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 1</span>
                                    </a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 2</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 3</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 4</span></a>
                                 </div>
                            </div>   -->


                        </div>
                        
                    </div>
               
                </div>
            </div>

            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>

    
  {{--   <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Files</h3>
                </div>
            </div>
            <!--begin::Form-->
            
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_9">
                            <div class="dropzone-msg dz-message needsclick">
                                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                <span class="dropzone-msg-desc">Upload up to 10 files</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div> --}}
  
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

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var datatable;


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
                        url: 'curriculum/ajax/curriculum-list',
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
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            },{
                field: 'name',
                title: 'Name',
            }, {
                field: 'type',
                title: 'type',
            },  {
                field: 'size',
                title: 'Size',
            }, {
                field: 'last_modified',
                title: 'Last Modified',
                type: 'date',
                format: 'MM/DD/YYYY',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function() {
                    return '\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                    </g>\
                                </svg>\
                            </span>\
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



function load_subjects() 
{
    $('#subjects_tab').html("");
    $('#levels_tab').html("");
    $.ajax({
        type:'POST',
        url: 'curriculum/ajax/subjects_list',
        dataType:"json",
        data:{
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
            var tmp_arr = data;
              console.log(tmp_arr);

              for(var x=0; x < tmp_arr.length; x++) 
              {
                var tab_id = "subject_"+tmp_arr[x].id;
                var href_id = tmp_arr[x].id + "_subject";

                $('#subjects_tab').append('<a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-tab" data-toggle="pill" href="#'+ href_id +'" role="tab" aria-controls="v-pills-speech" aria-selected="true">'+
                '<i class="fa fa-user-circle-o mr-2"></i>'+
                '<span class="font-weight-bold small text-uppercase">'+ tmp_arr[x].subject +'</span>'+
                '</a>');

                var levels_arr  =

                for(var z=0; z < sizeof())
                {

                }

                // $('#levels_tab').append('<div class="tab-pane fade shadow rounded bg-white p-5" id="'+ href_id +'" role="tabpanel" aria-labelledby="v-pills-arts-tab">'+
                //                 '<div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">'+
                //                 '<h5 class="font-italic mb-4">Arts Class</h5>'+
                //                 '<a class="nav-link mb-3 p-3 shadow " id="v-pills-arts-level1-tab" data-toggle="pill" href="#v-pills-arts-level1" role="tab" aria-controls="v-pills-arts-level1" aria-selected="true">'+
                //                 '<i class="fa fa-star mr-2"></i>'+
                //                 '<span class="font-weight-bold small text-uppercase">Level 1</span>'+
                //                '</a>'+
                //                 '<a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">'+
                //                 '<i class="fa fa-star mr-2"></i>'+
                //                 '<span class="font-weight-bold small text-uppercase">Level 2</span></a>'+
                //                 '<a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">'+
                //                 '<i class="fa fa-star mr-2"></i>'+
                //                 '<span class="font-weight-bold small text-uppercase">Level 3</span></a>'+
                //                 '<a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">'+
                //                 '<i class="fa fa-star mr-2"></i>'+
                //                 '<span class="font-weight-bold small text-uppercase">Level 4</span></a>'+
                //                 '</div>'+
                //                 '</div>');

              }

          

       
        }
    });

}

jQuery(document).ready(function() {
    load_subjects();
    KTDatatableRemoteAjaxDemo.init();
});


       
    </script>


@endsection
