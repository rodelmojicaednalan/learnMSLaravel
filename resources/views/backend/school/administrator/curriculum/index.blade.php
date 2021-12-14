{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


<div class="card card-custom" id="main_table">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage Curriculums
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
                <a href="#" class="btn btn-primary font-weight-bolder action_user" data-action="add" data-toggle="modal" data-target="#exampleModal" >
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
                </span>Add Curriculum</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">

         
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-xl-8">
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
                                <!-- <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Role:</label>
                                    <select class="form-control" id="kt_datatable_search_role">
                                        <option value="">All</option>
                                        <option value="1">Teacher</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Student</option>
                                    </select>
                                </div> -->
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <!-- <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Gender:</label>
                                    <select class="form-control" id="kt_datatable_search_gender">
                                        <option value="">All</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>                                        
                                    </select>
                                </div> -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <!-- <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a> -->
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
          

             <div class="datatable datatable-bordered datatable-head-custom" id="curriculum_datatable"></div>

     
            
        </div>
    </div>



    <div class="row" style="display:none;" id="show_table">
 
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                            <h3 class="card-label">Upload Curriculum Resources
                            <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                            </div>
                                <div class="card-toolbar">
                                      <button class="btn btn-success" id="btnBack">Back</button>
                                </div>
                        </div>
                        <!--begin::Form-->

                        <div class="card-body">

                                
                            <div>
                                
                            <div class="dropzone dropzone-default dropzone-primary" id="txtfile" >
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                    <span class="dropzone-msg-desc">Upload up to 10 files</span>
                                </div>
                            </div>

                            <div class="datatable datatable-bordered datatable-head-custom kt_datatable" id="kt_datatable"></div>

                            </div>

                            




                        </div>

                        <!--end::Form-->
                        </div>
                    <!--end::Card-->
                    </div>

  </div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Curriculum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="curr_name" id="curr_name">                               
                </div>

              

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="curr_description" id="curr_description">                               
                </div>

                <div class="form-group">
                    <label>Fee</label>
                    <input type="number" class="form-control" name="curr_fee" id="curr_fee">                               
                </div>


                <div class="dropdown">

                    <button class="btn btn-secondary dropdown-toggle" type="button" id="select_data" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Subject
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">    

                            <?php 
                            $last_cat = "";
                            for($x=0; $x < sizeof($subjects); $x++)
                            {   
                            if($last_cat != $subjects[$x]['category'])
                            {
                            $last_cat = $subjects[$x]['category'];
                            ?>
                            <h5 class="dropdown-item"><?php echo $subjects[$x]['category']; ?></h5>
                            <?php
                            }

                            ?>
                            <a class="dropdown-item action_user" data-action="select_subject" data-name="<?php echo $subjects[$x]['subject']; ?>" data-id="<?php echo $subjects[$x]['id']; ?>" href="#"><?php echo $subjects[$x]['subject']; ?></a>
                            <?php
                            }
                            ?>

                    </div>
                    <br>
                    <br>

                </div>

                    
                <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file"  id="curr_thumbnail" name="curr_thumbnail" />
                </div>

                      
                            
                </div>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  id="btnAddCurriculum">Add</button>
                    <button type="button" class="btn btn-primary"  style="display:none;" id="btnUpdateCurriculum">Update</button>
                  </div> 
            </div>
        </div>
 </div>


<div class="modal fade" id="materialModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    

                <div class="form-group">
                    <label>Description</label>
    
                    <input type="text" class="form-control" name="txt_description" id="txt_description">                               
                </div>


                 <div class="form-group">
                    <label>View Type</label>
                                <select class="form-control" id="kt_gender">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                                </select>
                    </div>

                             
                            
                </div>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  id="btnUpdateMaterial">Update</button>
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
Dropzone.autoDiscover = false;
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var datatable,curr_datatable;
var global_level_id = 0;
var level_click_counter = 0;
var subject_click_counter = 0;
var curr_click_counter = 0;
var page_reload = 0;
var global_material_id = 0;
var global_subject_id=0;
var global_currid = 0;
// var myDropzone;


var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    var curriculumControls = function() {
        $(document).on('click', '.btn-delete-material', function(e) {
            e.preventDefault()

                Swal.fire({
                title: 'Are you sure you want to delete this item?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {

                        $.ajax({
                        type:'POST',
                        url: 'curriculum/ajax/delete_material',
                        dataType:"json",
                        data:{
                            id: $(this).data('id'),
                            _token: CSRF_TOKEN,
                        },
                        success:function(data)
                        {
              

                            Swal.fire({
                            icon: "success",
                            title: "Delete",
                            html: data.message,
                            });
                            
                            datatable.reload()
                        }
                    });
             
                }
                })


           
        })
    }

    // basic demo
    var demo = function() {



         datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'curriculum/ajax/curriculum-list',
                        data:{
                        curr_id: function() { return global_currid },
                        _token: function() { return CSRF_TOKEN },
                        // level_id: global_level_id,
                        // _token: CSRF_TOKEN,
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
                template: function(row) {
                    return `<a download href="{{ asset('upload_img') }}/${row.path}" target="_blank">${row.name}</a>`;
                }
            }, {
                field: 'type',
                title: 'type',
            }, {
                field: 'view_type',
                title: 'Access',
            }, {
                field: 'size',
                title: 'Size',
            }, {
                field: 'description',
                title: 'Description',
            },{
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
                    return `
                     <a href="javascript:;" data-id="${row.id}" class="btn btn-sm btn-clean btn-icon action_user" data-action="update_file" title="Update">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>
                        </a>
                        <a href="javascript:;" data-id="${row.id}" class="btn btn-sm btn-clean btn-icon btn-delete-material" title="Delete">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    `;
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
            curriculumControls();
        },
    };
}();




$(document).on('click','#btnUpdateCurriculum',function(e)
{

        var formData =  new FormData();

        var description = $('#curr_description').val();
        var curr_fee = $('#curr_fee').val();
        var title = $('#curr_name').val();

        var old_img = $('#curr_name').attr('old_img');
        var old_name = $('#curr_name').attr('old_name');

        if(global_subject_id == 0)
        {
            global_subject_id ="";
        }
    
        formData.append('description', description);
        formData.append('fee', curr_fee);
        formData.append('name', title);
        formData.append('subject', global_subject_id)
        formData.append('id', global_currid);
        formData.append('old_img', old_img);
        formData.append('old_name', old_name);
        formData.append('get_file', $('input[type=file]')[0].files[0]);
        formData.append('_token', CSRF_TOKEN);


        $.ajax({
                type:'POST',
                url: 'curriculum/ajax/add_curriculum',
                dataType:"json",
                processData: false,
                contentType: false,
                data:formData,
                success:function(data)
                {
                
                    console.log(data);
        

                    if(data.error == false)
                    {
                        Swal.fire({
                        icon: "success",
                        title: "Add",
                        html: data.message,
                        });

                            $("#exampleModal").modal('toggle');
                            curr_datatable.reload();
            
                        

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

$(document).on('click','#btnAddCurriculum',function(e)
{

    var formData =  new FormData();

    var description = $('#curr_description').val();
    var curr_fee = $('#curr_fee').val();
    var title = $('#curr_name').val();


    if(global_subject_id == 0)
    {
        global_subject_id ="";
    }
 
    formData.append('description', description);
    formData.append('fee', curr_fee);
    formData.append('name', title);
    formData.append('subject', global_subject_id)
    formData.append('id', 0);
    formData.append('get_file', $('input[type=file]')[0].files[0]);
    formData.append('_token', CSRF_TOKEN);


    $.ajax({
            type:'POST',
            url: 'curriculum/ajax/add_curriculum',
            dataType:"json",
            processData: false,
            contentType: false,
            data:formData,
            success:function(data)
            {
            
                console.log(data);
    

                if(data.error == false)
                {
                    Swal.fire({
                    icon: "success",
                    title: "Add",
                    html: data.message,
                    });

                        $("#exampleModal").modal('toggle');
                        curr_datatable.reload();
        
                    

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
$(document).on('click','#btnBack',function(e)
{
    $('#show_table').hide();
     $('#main_table').show();
});

$(document).on('click','#btnUpdateMaterial',function(e)
{
    $.ajax({
    type:'POST',
    url: 'curriculum/ajax/update_single_material',
    dataType:"json",
    data:{
    id: global_material_id,
    description:$('#txt_description').val(),
    view_type: $('#kt_gender').val(),
    _token: CSRF_TOKEN,
    },
    success:function(data)
    {
        Swal.fire({
        icon: "success",
        title: "Update",
        html: data.message,
        });
        $('#materialModal').modal('toggle');
        datatable.reload();

    }
    });
});

$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');

if(action == "add")
{
    $('#btnUpdateCurriculum').hide();
    $('#btnAddCurriculum').show();

}
if(action == "select_subject")
{
    var id = $(this).attr('data-id');
    var get_name  = $(this).attr('data-name');

    global_subject_id = id;

    $('#select_data').html(get_name);

    if(subject_click_counter == 0)
    {
        KTDatatableRemoteAjaxDemo.init();

        subject_click_counter++;

    }
    else {
        datatable.reload();
    }

    $(".dz-preview").remove();
    
}

 if(action == "show_levels")
 {
    $('#upload_content').hide();
    var id = $(this).attr('data-id');
    $('.levels_tab_arr').removeClass('show active');
    $('#'+id).addClass("show active");
 }

 if(action == "update_file")
 {

     global_material_id = $(this).data('id');
     
    $('#materialModal').modal('toggle');
    $.ajax({
    type:'POST',
    url: 'curriculum/ajax/update_material',
    dataType:"json",
    data:{
    id: $(this).data('id'),
    _token: CSRF_TOKEN,
    },
    success:function(res)
    {

      
        $('#txt_description').val(res.description);
        $('#kt_gender').val(res.view_type);
       
     
    }
    });


 }

 if(action == "add_resource")
 {
     global_currid = $(this).data('id');
     $('#show_table').show();
     $('#main_table').hide();

        if(curr_click_counter == 0)
        {
            KTDatatableRemoteAjaxDemo.init();

            curr_click_counter++;

        }
        else {
            datatable.reload();
        }
 }

 if(action == "edit_curriculum")
 {
     $('#btnUpdateCurriculum').show();
     $('#btnAddCurriculum').hide();

    var id = $(this).attr('data-id');

        global_currid = id;

        $('#exampleModal').modal('toggle');
        
        $.ajax({
        type:'POST',
        url: 'curriculum/ajax/get_single_curriculum',
        dataType:"json",
        data:{
        id: $(this).data('id'),
        _token: CSRF_TOKEN,
        },
        success:function(res)
        {


            global_subject_id = res.subject.id;
            $('#select_data').html(res.subject.subject);
            $('#curr_name').val(res.name);
            $('#curr_name').attr("old_img", res.thumbnail);
            $('#curr_name').attr("old_name", res.name);
            $('#curr_description').val(res.description);
            $('#curr_description').val(res.description);
            $('#curr_fee').val(res.fee);

        
        }
        });
        


 }
 if(action == "levels_click")
 {

    var id = $(this).attr('data-id');
    var number = $(this).attr('data-number');
    var subject = $(this).attr('data-subject');
    global_level_id = id;
    $('.levels_click_arr').removeClass('active');
    $(this).addClass('active');

    var upload_txt = subject + " - Level " + number;
    $('#upload_header').text(upload_txt);

    $('#upload_content').show();

    if(level_click_counter == 0)
    {
        // KTDatatableRemoteAjaxDemo.init();

        level_click_counter++;

    }
    else {
        datatable.reload();
    }





 }

});



var curriculum_table = function() {
    // Private functions

    // basic demo
    var demo = function() {

         curr_datatable = $('#curriculum_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                source: {
                    read: {
                        url: 'curriculum/ajax/curriculum-table',
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
            },
            {
                field: 'subject.subject',
                title: 'Subject',
            },
            {
                field: 'fee',
                title: 'Fee',
            },
            {
                field: 'description',
                title: 'Description',
            },{
                field: 'thumbnail',
                title: 'thumbnail',
            }
            , {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="edit_curriculum" data-id="'+ row.id +'" title="Edit details">\
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
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="add_resource" data-id="'+ row.id +'" title="Edit details">\
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Communication/Archive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                <rect x="0" y="0" width="24" height="24"/>\
                                <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000"/>\
                                </g>\
                                </svg><!--end::Svg Icon--></span>\
                        </a>\
                    ';
                },
            }
            ],

        });

        $('#kt_datatable_search_role').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'role');
        });

       $('#kt_datatable_search_gender').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'gender');
        });



        $('#kt_datatable_search_role').selectpicker();

        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();



function initDropzones() {
    $('.dropzone').each(function () {

        let dropzoneControl = $(this)[0].dropzone;
        if (dropzoneControl) {
            dropzoneControl.destroy();
        }
    });
}

$(document).ready(function() {
    curriculum_table.init();
    initDropzones();



            // myDropzone = new Dropzone("#txtfile",
            // {
            // url: "curriculum/ajax/file_upload",
            // headers: {
            // 'X-CSRF-TOKEN': CSRF_TOKEN
            // },
            // paramName: "file",  // Set the url for your upload script location
            // uploadMultiple:true,
            // addRemoveLinks: true,
            // });

                    // var myDropzone = new Dropzone('#txtfile', {
                    // url: "curriculum/ajax/file_upload",
                    // maxFiles: 10,
                    // headers: {
                    // 'X-CSRF-TOKEN': CSRF_TOKEN
                    // },
                    // maxFilesize: 10,
                    // addRemoveLinks: true,
                    // });

                myDropzone =  $('#txtfile').dropzone({
                            url: "curriculum/ajax/file_upload", // Set the url for your upload script location
                            paramName: "file", // The name that will be used to transfer the file
                            maxFiles: 10,
                            headers: {
                            'X-CSRF-TOKEN': CSRF_TOKEN
                            },
                            maxFilesize: 10, // MB
                            addRemoveLinks: true,
                            init: function() {
                            this.on("sending", function(file, xhr, formData){

                                formData.append("curr_id", global_currid);
                            });
                            this.on("success", function(file){
                                datatable.reload();

                            });
                            },
                            accept: function(file, done) {
                                if (file.name == "justinbieber.jpg") {
                                    done("Naha, you don't.");
                                } else {
                                    done();
                                }
                            }
                    });

                    myDropzone.on("addedfile", function(file) {


                    });

                    myDropzone.on("success", function(file){

                    });

                    myDropzone.on("error", function(file) {

                    });


});



    </script>


@endsection
