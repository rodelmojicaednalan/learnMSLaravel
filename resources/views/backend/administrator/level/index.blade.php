{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

 


    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage Levels
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
                </span>Add New Parent Level</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
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
            <div id="accordion">

            </div>

             <!-- <div class="datatable datatable-bordered datatable-head-custom" id="subjects_datatable"></div> -->

           
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
                    <label for="exampleInputEmail1">Parent Subject</label>
                        <select id="txt_level" class="form-control">
                            <option value="Under 3 years old">Under 3 years old</option>
                            <option value="Preschool">Preschool(3-6 years old)</option>
                            <option value="Primary">Primary(7-12 years old)</option>
                            <option value="Secondary">Secondary(13-17 years old)</option>
                            <option value="Nitrec">Nitrec</option>
                            <option value="Polytechnic">Polytechnic</option>
                            <option value="Junior College">Junior College</option>
                            <option value="University">University</option>
                            <option value="All">All</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnAdd">Save</button>
            <button type="button" class="btn btn-primary" style="display:none;" id="btnUpdate">Update</button>
        </div>
        </div>
    </div>
    </div>

    
    <div class="modal fade" id="childModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="child_txt"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">

           <input type="hidden" id="txt_parentid">
           <input type="hidden" id="txt_group">

                <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <input type="text" class="form-control" id="child_level">
                </div>

                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnAddChild">Save</button>
            <button type="button" class="btn btn-primary" style="display:none;" id="btnUpdateChild">Update</button>
        </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="levelModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Levels</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
              
                    <div id="subjects-level-container">
                       
                    </div>

                   

                    <div id="update_form" style="display:none;">
                                <h3 id="update_txt"></h3>
                                <form class="form" id="update-subject-level-form">
                                @csrf
                                <div class="card-body">

                                <input type="hidden" id="update_level_id" name="update_level_id">

                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Level Name:</label>
                                <div class="col-lg-6">
                                <input type="text" class="form-control" name="update_level_name" id="update_level_name">                               
                                </div>
                                
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Training Hours:</label>
                                <div class="col-lg-6">
                                <input type="text" class="form-control" name="update_level_hrs" id="update_level_hrs" inputmode="numeric" style="width: 50px;">                               
                                </div>
                                </div>
                                </div>

                                </div>
                                <div class="card-footer">
                                <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                <button type="submit" class="btn btn-success mr-2" id="update_level_btn" style="display:none;">Update Level</button>
                                <button  class="btn btn-danger mr-2 action_user" id="update_cancel_btn" style="display:none;"  data-action="cancel_edit">Cancel</button>
                                </div>
                                </div>
                                </div>
                                </form>
                            
                    </div>


                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" disabled id="btnSaveLevel">Save</button>
                </div> --}}
            </div>
        </div>
    </div>


@endsection


@section('scripts')

<script>

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var datatable;
var id_counter = 0;
var global_subjectid=0;
var number_arr = [];
var name_arr = [];
var hrs_arr = [];
var level_id_arr = [];

var child_counter = 0;


function loadSubjectLevels(id)
{
     $.ajax({
        type:'POST',
        url: 'levels/ajax/load_levels',        
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
            $('#subjects-level-container').html(data);    
        }
    });
}

$('#update-subject-level-form').on('submit',function(e){
                        e.preventDefault();
                        
                        $.ajax({
                                type:'POST',
                                url: '/administrator/settings/levels/ajax/update_level',
                                dataType:"json",
                                data: $(this).serialize(),
                                success:function(data)
                                {

                                        if(data.error == false)
                                        {
                                        Swal.fire({
                                        icon: "success",
                                        title: "Add",
                                        html: data.message,
                                        });

                                        loadSubjectLevels($('#level_id').val());
                                        $('#update_form').hide();
                                        $('#subjects-level-container').show();
                                        $('#update_level_btn').hide();
                                        $('#update_cancel_btn').hide();
                        

                                        }
                                   
                                   
                               
                                }
                            });                       
                });

$(document).on('click','#add_level',function(e)
{
        id_counter++;
      
        $('#level_content').append('<hr><div class="form-group">'+
        '<label>Level Number</label>'+
        '<input type="text" class="form-control number_arr" level_id="0" id="level_number" disabled value="'+ id_counter +'">'+
        '<div class="form-group">'+
        '<label>Level Name</label>'+
        '<input type="text" class="form-control name_arr" id="level_name">'+
        '</div>'+
        '<div class="form-group">'+
        '<label>Training Hours</label>'+
        '<input type="text" class="form-control hrs_arr" id="level_hrs">'+
        '</div>'+
        '</div>');

        


});


$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');



 if(action == "add")
 {

    $('.clear_data').val("");

    $('#form_txt').text("Add Subject");
    $('#btnAdd').show();
    $('#btnUpdate').hide();
 }


 if(action == "cancel_edit")
 {
    $('#subjects-level-container').show();
    $('#update_form').hide();
    $('#update_level_btn').hide();
    $('#update_cancel_btn').hide();
 }

 if(action == "add_child")
 {

    var id = $(this).attr('data-id');
    var get_group = $(this).attr('data-grp');

    $("#txt_parentid").val(id);
    $("#txt_group").val(get_group);

    $("#child_level").val("");
    $('#child_txt').html("Add Child");
    $('#childModal').modal("show");
    $('#btnAddChild').show();
    $('#btnUpdateChild').hide();
 }

 if(action == "edit_child")
 {

    var id = $(this).attr('data-id');
    
    $("#txt_parentid").val(id);
    $('#txt_parentid').attr('level_id', id);
    

    $('#child_txt').html("Edit Level");
    $('#childModal').modal("show");
    $('#btnUpdateChild').show();
    $('#btnAddChild').hide();
  
    $.ajax({
        type:'POST',
        url: 'levels/ajax/load_single_level',
        dataType:"json",
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
            

            $('#child_level').val(data.level);
 
        }
    });


 }

 

 if(action == "configure_levels") 
 {     
    $('#level_content').html("");
    id_counter = 0;
    var id = $(this).attr('data-id');
    global_subjectid = id;

    $('#subjects-level-container').show();
    $('#update_form').hide();

   
    loadSubjectLevels(id);



    $("#levelModal").modal('toggle');

 
 }
 if(action == "update")
 {

    $('#btnAdd').hide();
    $('#btnUpdate').show();

    $('#form_txt').text("Update Subject");
    var id = $(this).attr('data-id');



    $.ajax({
        type:'POST',
        url: 'levels/ajax/load_single_subject',
        dataType:"json",
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
   
            $('#txt_level').val(data.subject);
            $('#txt_level').attr("level_id", data.id);
            $('#txt_fee').val(data.fee);
     

       
        }

    });



    $("#exampleModal").modal('toggle');

 }

 if(action == "open_parent")
 {
    var id = $(this).attr('data-id');
    var get_div = $(this).attr('data-div');
    var parent_checker = $(this).attr('data-checker');

  
    // if(parent_checker == "false")
    // {

     
    // }


    get_child(id,get_div)

 }

 
});

function get_child(parent_id,get_div) 
{
 



       $('#'+ get_div).html("");

        $.ajax({
        type:'POST',
        url: 'levels/ajax/load_child',
        dataType:"json",
        data:{
        parent_id:parent_id,   
        _token: CSRF_TOKEN,
        },
        success:function(data)
        {
     
             //jutsu
            for(var x=0; x < data.length; x++)
            {
                child_counter++;
                var child_div = "child_" + x+"_"+ child_counter;
                $('#'+ get_div).append('<div class="card ml-5">'+
                '<div class="card-header row" id="headingTwo">'+
                '<div class="col-md-4"><h5 class="mb-0">'+
                '<button class="btn btn-link collapsed action_user" data-action="open_parent" data-checker="false" data-id="'+ data[x].id +'" data-div="'+ child_div +'"  data-toggle="collapse" data-target="#'+ child_div +'" aria-expanded="false" aria-controls="collapseTwo">'+
                '<span>'+data[x].level+'</span>'+
                '</button>'+
                '</h5></div>'+
                '<div class="mt-3 col-md-4"><button class="btn btn-success action_user" data-action="edit_child" data-id="'+ data[x].id +'">Edit</button>&nbsp;<button class="btn btn-primary action_user" data-action="add_child" data-grp="'+ data[x].group +'" data-id="'+ data[x].id +'">Add Child</button></div>'+
                '</div>'+
                '<div id="'+ child_div +'" class="collapse" aria-labelledby="headingTwo" data-parent="#'+ get_div +'">'+
                '<div class="card-body">'+
                '</div>'+
                '</div>'+                            
                '</div>');
            }

        }
        });

}

$(document).on('click','#btnAddChild',function(e) {

var level = $('#child_level').val();
var group = $('#txt_group').val();
var parent_id = $('#txt_parentid').val();

$.ajax({
        type:'POST',
        url: 'levels/ajax/add_new_child',
        dataType:"json",
        data:{
            level: level,
            group:group,
            level_id:0,
            parent_id:parent_id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Add",
                html: data.message,
                });

                    $("#childModal").modal('toggle');
                    $('#child_level').val("");
                    parent_accordion();

                    
                  
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

$(document).on('click','#btnUpdateChild',function(e) {

var level = $('#child_level').val();
var parent_id = $('#txt_parentid').val();
var level_id =  $('#txt_parentid').attr("level_id");


$.ajax({
        type:'POST',
        url: 'levels/ajax/add_new_child',
        dataType:"json",
        data:{
            level: level,
            level_id:level_id,
            parent_id:parent_id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Add",
                html: data.message,
                });

                    $("#childModal").modal('toggle');
                    $('#child_level').val("");
                    parent_accordion();

                    
                  
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

$(document).on('click','#btnAdd',function(e){

var group = $('#txt_level').val();
var level = $('#txt_level option:selected').text();

$.ajax({
        type:'POST',
        url: 'levels/ajax/add_new_level',
        dataType:"json",
        data:{
            level: level,
            group:group,
            level_id:0,
           _token: CSRF_TOKEN,
        },
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
                    parent_accordion();
                  
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


$(document).on('click','#btnSaveLevel',function(e){
 
 number_arr = [];
 name_arr = [];
 hrs_arr = [];
 level_id_arr = [];



$(".number_arr").each(function(){

var get_val = $(this).val();
var get_val2 = $(this).attr('level_id');

number_arr.push(get_val);
level_id_arr.push(get_val2);
});

$(".name_arr").each(function(){
var get_val = $(this).val();
name_arr.push(get_val);
});

$(".hrs_arr").each(function(){
var get_val = $(this).val();
hrs_arr.push(get_val);
});

$.ajax({
        type:'POST',
        url: 'levels/ajax/btnSaveLevel',
        dataType:"json",
        data:{
            number_arr:JSON.stringify(number_arr),
            name_arr:JSON.stringify(name_arr),
            hrs_arr:JSON.stringify(hrs_arr),
            level_id_arr:JSON.stringify(level_id_arr),
            level_id:global_subjectid,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Configure Levels",
                html: data.message,
                });

                    $("#levelModal").modal('toggle');
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
            title: "Configure Levels",
            html: err_txt,
            });

            }
   
            
       
        }
    });

});





$(document).on('click','#btnUpdate',function(e){

var subject = $('#txt_level').val();
var fee = $('#txt_fee').val();
var id =$('#txt_level').attr('level_id');



$.ajax({
        type:'POST',
        url: 'levels/ajax/add_new_level',
        dataType:"json",
        data:{
            subject: subject,
            fee:fee,
            level_id:id,
           _token: CSRF_TOKEN,
        },
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

                     datatable = $('#subjects_datatable').KTDatatable({
                    // datasource definition
                    data: {
                    type: 'remote',

                    source: {
                        read: {
                            url: 'levels/ajax/subjects_list',
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
                    field: 'subject',
                    title: 'Subjects',
                    },{
                    field: 'parent',
                    title: 'Parent',
                    },{
                    field: 'category',
                    title: 'Category',
                    },
                    {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 300,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(row) {
                        return '\
                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon ml-5 action_user" data-action="configure_levels" data-id="'+ row.id +'" title="Edit details">\
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-09-093151/theme/html/demo1/dist/../src/media/svg/icons/Code/Settings4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                        <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
                                        </g>\
                                        </svg><!--end::Svg Icon--></span>\
                                </a>\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon ml-5 action_user" data-action="add_child" data-id="'+ row.id +'" title="Edit details">\
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>\
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>\
                                        </g>\
                                        </svg><!--end::Svg Icon--></span>\
                                </a>\
                              <a href="javascript:;"  class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="update" data-id="'+ row.id +'" title="Edit Details"">\
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


        function parent_accordion()
        {
                $('#accordion').html("");
                
                        $.ajax({
                        type:'POST',
                        url: 'levels/ajax/load_parent',
                        dataType:"json",
                        data:{
                        _token: CSRF_TOKEN,
                        },
                        success:function(data)
                        {
                            for(var x=0; x < data.length; x++)
                            {

                                //jutsu
                                var parent_div = "parent_" + x;
                                 $('#accordion').append('<div class="card">'+
                                '<div class="card-header row" id="headingTwo">'+
                                '<div class="col-md-4"><h5 class="mb-0">'+
                                '<button class="btn btn-link collapsed action_user" data-action="open_parent" data-checker="true" data-id="'+ data[x].id +'" data-div="'+ parent_div +'" data-toggle="collapse" data-target="#'+ parent_div +'" aria-expanded="false" aria-controls="collapseTwo">'+
                                '<span>'+data[x].level+'</span>'+
                                '</button>'+
                                '</h5></div>'+
                                '<div class="mt-3 col-md-4"><button class="btn btn-success action_user" data-action="edit_child" data-id="'+ data[x].id +'">Edit</button>&nbsp;<button class="btn btn-primary action_user" data-action="add_child" data-grp="'+ data[x].group +'" data-id="'+ data[x].id +'">Add Child</button></div>'+
                                '</div>'+
                                '<div id="'+ parent_div +'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">'+
                                '<div class="card-body">'+
                                '</div>'+
                                '</div>'+                            
                                '</div>');
                            }

                        }
                        });

        }



        $(document).ready(function() {
            parent_accordion();
            // KTDatatableRemoteAjaxDemo.init();
            // initTable2();
        });
    </script>


@endsection

