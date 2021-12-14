{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

 


    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage Partners' Deals
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                {{-- <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export</button>
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
                </div>
                <!--end::Dropdown--> --}}
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder action_user" data-action="add" data-toggle="modal" data-target="#exampleModal">
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
                </span>Add New Partner</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>

                       
                            </div>
                           
                            <div class="col-md-4 my-2 my-md-0">
                                  <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>

                            <!-- <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Gender:</label>
                                    <select class="form-control" id="kt_datatable_search_gender">
                                        <option value="">All</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>                                        
                                    </select>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                    </div> -->
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->

             <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>

           
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

                    <div class="form-group">
                    <label for="exampleInputEmail1">Partner</label>
                    <input type="text" class="form-control clear_data" id="txt_partner" placeholder="Partner">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control clear_data" id="txt_description" placeholder="Description">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Terms</label>
                    <input type="text" class="form-control clear_data" id="txt_terms" placeholder="Terms">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file"  id="customFile" />
                    </div>

           
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-primary" id="btnAdd">Save</button>
            <button type="button" class="btn btn-primary" style="display:none;" id="btnUpdate">Update</button>
        </div>
        </div>
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

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var datatable;


$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');



 if(action == "add")
 {

    $('.clear_data').val("");

    $('#form_txt').text("Add Partner");
    $('#btnAdd').show();
    $('#btnUpdate').hide();
 }
 if(action == "update")
 {

    $('#btnAdd').hide();
    $('#btnUpdate').show();

    $('#form_txt').text("Update Partner");
    var id = $(this).attr('data-id');

    $.ajax({
        type:'POST',
        url: 'partners/ajax/load_single_partner',
        dataType:"json",
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
   
            $('#txt_partner').val(data.partner);
            $('#txt_partner').attr("partner_id", data.id);
            $('#txt_description').val(data.deals_description);
            $('#txt_terms').val(data.terms);

       
        }
    });



    $("#exampleModal").modal('toggle');

 }

});

$(document).on('click','#btnAdd',function(e){


    var formData =  new FormData();

var partner = $('#txt_partner').val();
var description = $('#txt_description').val();
var terms = $('#txt_terms').val();
// var get_file = $('input[type=file]')[0].files[0];


formData.append('partner', partner);
formData.append('description', description)
formData.append('terms', terms);;
formData.append('fake_id', 0);
formData.append('get_file', $('input[type=file]')[0].files[0]);
formData.append('_token', CSRF_TOKEN);

$.ajax({
        type:'POST',
        url: 'partners/ajax/add_new_deal',
        dataType:"json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data:formData,
        // data:{
        //     partner: partner,
        //     description:description,
        //     terms:terms,
        //     fake_id:0,
        //     get_file:get_file,
        //    _token: CSRF_TOKEN,
        // },
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
                    // KTDatatableRemoteAjaxDemo.init();
                    datatable.reload();
                  
            }

            else {

            var err_txt = "";
            var get_text = "";
            for(var x=0 ; x < data.errors.length ; x++){

            get_text =  data.errors[x];

            err_txt += get_text + "<br>";
            }


            Swal.fire({
            icon: "error",
            title: "Add",
            html: err_txt,
            });

            }
   
            
       
        }
    });

});


$(document).on('click','#btnUpdate',function(e){

 var formData =  new FormData();

var partner = $('#txt_partner').val();
var id =$('#txt_partner').attr('partner_id');
var description = $('#txt_description').val();
var terms = $('#txt_terms').val();


formData.append('partner', partner);
formData.append('description', description)
formData.append('terms', terms);;
formData.append('fake_id', id);
formData.append('get_file', $('input[type=file]')[0].files[0]);
formData.append('_token', CSRF_TOKEN);

$.ajax({
        type:'POST',
        url: 'partners/ajax/add_new_deal',
        dataType:"json",
        processData: false,
        contentType: false,
        data:formData,
        // data:{
        //     partner: partner,
        //     description:description,
        //     terms:terms,
        //     fake_id:id,
        //    _token: CSRF_TOKEN,
        // },
        success:function(data)
        {
   

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Update",
                html: data.message,
                });

                    $("#exampleModal").modal('toggle');
                    datatable.reload();
    
                   

            }

            else {

            var err_txt = "";
            var get_text = "";
            for(var x=0 ; x < data.errors.length ; x++){

            get_text =  data.errors[x];

            err_txt += get_text + "<br>";
            }


            Swal.fire({
            icon: "error",
            title: "Add",
            html: err_txt,
            });

            }

              

        }
    });

});



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
                        url: 'partners/ajax/list',
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
            }, {
                field: 'partner',
                title: 'Partner',
            },{
                field: 'image_url',
                title: 'Logo',
                template: function(row) {
                    if(row.image_url === null || row.image_url === "")
                    {
                        return "<p>No image</p>";
                    }
                    else 
                    {

                        var site_url = document.location.origin;
                        var file_p = site_url + '/upload_img/'  + row.image_url;
                        return '<img style="width:150px;" src="'+ file_p +'">';

                   

                    }
                   
                }
            },{
                field: 'deals_description',
                title: 'Description',
            },{
                field: 'terms',
                title: 'Terms',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="update" data-id="'+ row.id +'" title="Edit details">\
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
