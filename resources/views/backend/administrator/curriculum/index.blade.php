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

                    <div class="col-md-8">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-speech-level1" role="tabpanel" aria-labelledby="v-pills-speech-level1-tab">
                              <div id="upload_content" style="display:none;">
                                <h4 class="font-italic mb-4" id="upload_header"></h4>
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                    <div class="dropzone dropzone-default dropzone-primary" id="txtfile">
														<div class="dropzone-msg dz-message needsclick">
															<h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
															<span class="dropzone-msg-desc">Upload up to 10 files</span>
														</div>
													</div>

                                                <div class="datatable datatable-bordered datatable-head-custom kt_datatable" id="kt_datatable"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!--end::Form-->
        </div>
        <!--end::Card-->
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
var datatable;
var global_level_id = 0;
var level_click_counter = 0;
var page_reload = 0;
var global_material_id = 0;
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
                        level_id: function() { return global_level_id },
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



function load_subjects()
{
    $('#subjects_tab').html("");
    // $('#levels_tab').html("");
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
            //   console.log(tmp_arr);

              for(var x=0; x < tmp_arr.length; x++)
              {
                var tab_id = "subject_"+tmp_arr[x].id;
                var href_id = tmp_arr[x].id + "_subject";

                var get_lvlid=0;


                $('#subjects_tab').append('<a class="nav-link mb-3 p-3 shadow subjects_tab_arr action_user" id="'+ tab_id +'" data-id="'+href_id+'" data-action="show_levels" id="v-pills-speech-tab" data-toggle="pill" href="#'+ href_id +'" role="tab" aria-controls="v-pills-speech" aria-selected="true">'+
                '<i class="fa fa-user-circle-o mr-2"></i>'+
                '<span class="font-weight-bold small text-uppercase">'+ tmp_arr[x].subject +'</span>'+
                '</a>');

                 var levels_arr  = tmp_arr[x].levels;




                var levels_content_id = "levels_" + tmp_arr[x].id;
                        $('#levels_tab').append('<div class="tab-pane fade shadow rounded bg-white p-5 levels_tab_arr action_user" id="'+ href_id +'" role="tabpanel" aria-labelledby="v-pills-arts-tab">'+
                        '<div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">'+
                        '<h5 class="font-italic mb-4">'+ tmp_arr[x].subject +'</h5>'+
                        '<div id="'+ levels_content_id +'"></div>'+
                        '</div>'+
                        '</div>');

                    for(var z=0; z < levels_arr.length; z++)
                    {

                        var level_txt = "Level " +  levels_arr[z].number + " - " + levels_arr[z].name;
                        var make_id = "lvl_id"+x +""+z;


                        if(z == 0 && x == 0)
                        {
                            global_level_id = levels_arr[z].id;
                            get_lvlid = make_id;
                        }

                         $('#'+levels_content_id).append('<a class="nav-link mb-3 p-3 shadow levels_click_arr action_user" id="'+ make_id +'" data-number="'+ levels_arr[z].number  +'" data-subject="'+ tmp_arr[x].subject  +'" data-id="'+ levels_arr[z].id +'" data-action="levels_click" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">'+
                            '<i class="fa fa-star mr-2"></i>'+
                            '<span class="font-weight-bold small text-uppercase">'+ level_txt +'</span></a>');

                    }


                    if(x == 0)
                    {
                    $('.levels_tab_arr').removeClass('active');
                    $('#'+ href_id).addClass('show active');
                    $('#'+ tab_id).addClass("show active");


                    $('.levels_click_arr').removeClass('active');
                    $('#' + get_lvlid).addClass('active');
                    $('#upload_content').show();
                    KTDatatableRemoteAjaxDemo.init();

                    }


                    // if(x == 0)
                    // {

                    // $('#'+tab_id).addClass("active");
                    // $('.levels_tab_arr').removeClass('show active');
                    // $('#'+href_id).addClass("show active");


                    // }

              }




        }
    });

}

function initDropzones() {
    $('.dropzone').each(function () {

        let dropzoneControl = $(this)[0].dropzone;
        if (dropzoneControl) {
            dropzoneControl.destroy();
        }
    });
}

$(document).ready(function() {
    load_subjects();
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

                                formData.append("level_id", global_level_id);
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
