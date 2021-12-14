{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


<div class="card card-custom" id="main_table">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage Programme
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
                </span>Add Programme</a>
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
          

             <div class="datatable datatable-bordered datatable-head-custom" id="programme_table"></div>

     
            
        </div>
    </div>







<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Programme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label>Title</label>
                                <input type="text" id="txt_title" class="form-control">
                            </div>

                            <div class="form-group"> 
                                    <label>Description</label>
                                <textarea id="txt_description" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="dropdown">
                                <label>Category</label>
                                <br>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="select_data" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Category
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
                                    <a class="dropdown-item action_user" data-action="select_category" data-name="<?php echo $subjects[$x]['subject']; ?>" data-id="<?php echo $subjects[$x]['id']; ?>" href="#"><?php echo $subjects[$x]['subject']; ?></a>
                                    <?php
                                    }
                                    ?>

                                    </div>
                                    <br>
                                    <br>

                             </div>

                            


                                <div class="dropdown mt-2">
                                    <label>Level</label>
                                    <br>
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="select_datalevel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Level
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">    

                                        <?php
                                        for($z=0; $z < sizeof($levels); $z++)
                                        { 
                                               $get_child = $levels[$z]['child'];
                                               if(sizeof($get_child) > 0)
                                               {
                                                ?>
                                                <h5 class="dropdown-item"><?php echo $levels[$z]['level']; ?></h5> 
                                                <?php
                                                      for($g=0; $g < sizeof($get_child); $g++)
                                                      {
                                                        ?>
                                                        <a class="dropdown-item action_user" data-action="select_level" data-name="<?php echo $levels[$g]['level']; ?>" data-id="<?php echo $levels[$g]['id']; ?>" href="#"><?php echo $levels[$g]['level']; ?></a>
                                                        <?php
                                                      }

                                               }
                                               else {
                                                ?>
                                                 <a class="dropdown-item action_user" data-action="select_level" data-name="<?php echo $levels[$z]['level']; ?>" data-id="<?php echo $levels[$z]['id']; ?>" href="#"><?php echo $levels[$z]['level']; ?></a>
                                                <?php

                                               }
                                            
                                       

                                        }
                                        ?>

                                    </div>
                                    <br>
                                    <br>

                                </div>

                         
                        </div>

                        <div class="col-md-4">

                           <div class="form-group"> 
                                <label>Price</label>
                                <input type="number" id="txt_price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Thumbnail</label>
                                <input type="file"  id="txt_thumbnail" name="txt_thumbnail" />
                            </div>

                        </div>

                    </div> 
                    

              
                                  
                                   
                </div>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-primary"  id="btnAdd">Add</button>
                        <button type="button" class="btn btn-primary"  style="display:none;"  id="btnUpdate">Update</button>
                  </div> 
            </div>
        </div>
 </div>


 
<div class="modal fade" id="classModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Classes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    
               
                        <button class="btn btn-danger action_user" data-action="show_classtable">Classes</button>
                        <button class="btn btn-danger action_user" data-action="show_addclass">Add New Class</button>

                        <hr>

                        <div  id="div_tableclass">
                                 <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="class_body">

                                            
                                    
                                        </tbody>
                                    </table> 
                        </div>   

                        <div  id="div_addclass" style="display:none;">

                        <div class="form-group col-md-3"> 
                                <label>Teacher</label>

                                 <select class="form-control " id="txt_teacher">
                                     <?php
                                       for($x=0; $x < sizeof($teachers); $x++)
                                       {
                                           ?>
                                            <option value="<?php echo $teachers[$x]['id']; ?>"><?php echo $teachers[$x]['full_name']; ?></option>
                                           <?php
                                       } 
                                     ?>
                                    
                                 </select>


                        </div>

                   

                        <div class="row" id="div_dates"> 
                    


                        </div>


                          
                        </div> 
              
                                  
                                   
                </div>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-primary" style="display:none;" id="btnAddClass">Add</button>
                    <button type="button" class="btn btn-primary" style="display:none;"  id="btnAddSlot">Add Time Slot</button>
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
var program_datatable;
var classCtr=0;
var arr_date = []; 
var global_programme_id = 0;
var global_category_id = 0;
var global_level_id = 0;




$(document).on('click','#btnAddSlot',function(e)
{

    if (KTUtil.isRTL()) {
        arrows = {
        leftArrow: '<i class="la la-angle-right"></i>',
        rightArrow: '<i class="la la-angle-left"></i>'
        }
        } else {
        arrows = {
        leftArrow: '<i class="la la-angle-left"></i>',
        rightArrow: '<i class="la la-angle-right"></i>'
        }
        }


    classCtr++;
    var start_date_id = "str_date" + classCtr;
    var start_time_id = "start_time" + classCtr;
    var end_time_id = "end_time" + classCtr;


            if(classCtr == 1)
            {
            $('#div_dates').append('<div class="col-md-4 mt-2">'+
                    '<h3>Date</h3>'+
                    '</div>'+   
                    '<div class="col-md-4 mt-2">'+
                    '<h3>Start Time</h3>'+
                    '</div>'+  
                    '<div class="col-md-4 mt-2">'+
                    '<h3>End Time</h3>'+
                    '</div>'                          
                );

            }

             var div_group_id = "divappend_" + classCtr;
            $('#div_dates').append('<div class="col-md-4 mt-2 '+ div_group_id +'">'+
                    '<input type="text" class="form-control date_arr" id="'+ start_date_id +'" name="'+ start_date_id +'" readonly="readonly" value="{{ date("Y/m/d")}}" placeholder="Select date" />'+
                    '</div>'+   
                    '<div class="col-md-4 mt-2 '+ div_group_id +'">'+
                    '<input class="form-control start_arr" id="'+ start_time_id +'" name="'+ start_time_id +'" readonly="readonly" placeholder="Start time" type="text" />'+
                    '</div>'+  
                    '<div class="col-md-4 mt-2 input-group '+ div_group_id +'">'+
                    '<input class="form-control end_arr" id="'+ end_time_id +'" name="'+ end_time_id +'" readonly="readonly" placeholder="Start time" type="text" /> <button class="btn btn-danger input-group-addon action_user" data-div="'+ div_group_id +'" data-action="delete_row">x</button>'+
                    '</div>'                          
                );



                $('#'+ start_time_id).timepicker();
                $('#'+ end_time_id).timepicker();

                $('#'+ start_time_id +'_modal').timepicker();
                $('#'+ end_time_id +'_modal').timepicker();

                             
                $('#'+start_date_id).datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

                });


                $('#start_date'+ start_date_id +'_validate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

                });

                // minimum setup for modal demo
                $('#start_date'+ start_date_id +'_modal').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                dateFormat: 'yy-mm-dd',
                templates: arrows
                });

                          
});


function tConvert (time) {
  // Check correct time format and split into components
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    // console.log(time);
    time = time.slice (1);  // Remove full string match value
    time.splice(3, 1); // aken
    // console.log(time); 
    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }

  return time.join ('');
   // return adjusted time or original string
}

function tConvert2 (time) {
  // Check correct time format and split into components
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join (''); // return adjusted time or original string
}


$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');

    if(action == "show_manage_class")
    {
        $('#class_body').html("");
        var id = $(this).attr('data-id');
        global_programme_id = id;

        $('#materialModal').modal('toggle');
        $.ajax({
        type:'POST',
        url: 'programme/ajax/load_classes',
        dataType:"json",
        data:{
        id: id,
        _token: CSRF_TOKEN,
        },
        success:function(res)
        {
             for(var x=0; x < res.length; x++)
             {
                 var append_row = "";
                 var get_classes = res[x].live_class;
                 var date_append = "";
                 var start_append = "";
                 var end_append = "";

                 var img_path =  document.location.origin +'/upload_img/test_teacher.jpeg'
                 append_row+="<tr>";
                 append_row+="<td><img src="+ img_path +"  class='rounded-circle' style='height:70px;'></td>";

                    for(var z=0; z < get_classes.length; z++)
                    {
                        date_append+="<p>"+  moment(get_classes[z].start_date).format('DD MMMM YYYY')  +"</p>";    
                        start_append+="<p>"+ tConvert(get_classes[z].start_time) +"</p>";     
                        end_append+="<p>"+ tConvert(get_classes[z].end_time) +"</p>";        
                    }
                    append_row+='<td>'+ date_append +'</td>';
                    append_row+='<td>'+ start_append +'</td>';
                    append_row+='<td>'+ end_append +'</td>';
                    append_row+='<td>Action</td>';
                    append_row+="</tr>";
                 
                 $('#class_body').append(append_row);
             }
        }
        });

        $('#classModal').modal('toggle');

    }
    if(action == "show_classtable")
    {
        $('#div_tableclass').show();
        $('#div_addclass').hide();
        $('#btnAddClass').hide();
        $('#btnAddSlot').hide();
    }
    if(action == "add")
    {
        $('#btnAdd').show();
        $('#btnUpdate').hide();
    }

    if(action == "delete_row")
    {   
        
        var delete_name = $(this).attr('data-div');
        
        $('.' + delete_name).remove();
    }

    if(action == "update_programme")
    {
        $('#btnAdd').hide();
        $('#btnUpdate').show();

        var id = $(this).attr('data-id');
       
        global_programme_id = id;
                
        $('#exampleModal').modal('toggle');

        $.ajax({
        type:'POST',
        url: 'programme/ajax/get_single_programme',
        dataType:"json",
        data:{
        id: $(this).data('id'),
        _token: CSRF_TOKEN,
        },
        success:function(res)
        {
          
             global_category_id = res.categories_id;
             global_level_id = res.level_id;

             $('#txt_price').val(res.price);
             $('#txt_title').val(res.title);
             $('#txt_title').attr("old_title", res.title);
             $('#txt_description').val(res.description);
             $('#select_data').html(res.categories.subject);
             $('#select_datalevel').html(res.level.level);

        }
        });


    }

    if(action == "show_addclass")
    {
        $('#btnAddClass').show();
        $('#btnAddSlot').show();
        $('#div_addclass').show();
        $('#div_tableclass').hide();
    }

    if(action == "select_category")
    {
        var id = $(this).attr('data-id');
        var get_name  = $(this).attr('data-name');

        global_category_id = id;

        $('#select_data').html(get_name);



    }

    if(action == "select_level")
    {
        var id = $(this).attr('data-id');
        var get_name  = $(this).attr('data-name');

        global_level_id = id;

        $('#select_datalevel').html(get_name);


    }


    
    
});


$(document).on('click','#btnAddClass',function(e)
{
  
    var formData =  new FormData();
    var teacher = $('#txt_teacher').val();

    arr_date = [];
    arr_start = [];
    arr_end = [];

    $(".date_arr").each(function() {
        arr_date.push($(this).val());
    });

    $(".start_arr").each(function() {
        arr_start.push($(this).val());
    });

    
    $(".end_arr").each(function() {
        arr_end.push($(this).val());
    });

    formData.append('arr_date', JSON.stringify(arr_date));
    formData.append('arr_start', JSON.stringify(arr_start));
    formData.append('arr_end', JSON.stringify(arr_end));
    formData.append('programme_id', global_programme_id);
    formData.append('teacher', teacher);
    formData.append('_token', CSRF_TOKEN);

    $.ajax({
                type:'POST',
                url: 'programme/ajax/add_class',
                dataType:"json",
                processData: false,
                contentType: false,
                data:formData,
                success:function(data)
                {
                
         

                        if(data.error == false)
                        {
                            Swal.fire({
                            icon: "success",
                            title: "Add",
                            html: data.message,
                            });

                                $("#classModal").modal('toggle');
                                $('#div_dates').html("");
                
                            

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



$(document).on('click','#btnAdd',function(e)
{
    var formData =  new FormData();

    var title  = $('#txt_title').val();
    var description  = $('#txt_description').val();
    var category  = global_category_id;
    var level  = global_level_id;
    var price = $('#txt_price').val();
    

    formData.append('_token', CSRF_TOKEN);
    formData.append('get_file', $('#txt_thumbnail')[0].files[0]);
    formData.append('title', title);
    formData.append('description', description);
    formData.append('category', category);
    formData.append('level', level);
    formData.append('id', "0");
    formData.append('price', price);


    $.ajax({
                type:'POST',
                url: 'programme/ajax/add_programme',
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
                            program_datatable.reload();
            
                        

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





$(document).on('click','#btnUpdate',function(e)
{
    var formData =  new FormData();

    var title  = $('#txt_title').val();
    var old_title = $('#txt_title').attr('old_title');
    var description  = $('#txt_description').val();
    var category  = global_category_id;
    var level  = global_level_id;
    var price = $('#txt_price').val();
    
    

    formData.append('_token', CSRF_TOKEN);
    formData.append('get_file', $('#txt_thumbnail')[0].files[0]);
    formData.append('title', title);
    formData.append('old_title', old_title);
    formData.append('description', description);
    formData.append('category', category);
    formData.append('level', level);
    formData.append('id', global_programme_id);
    formData.append('price', price);


    $.ajax({
                type:'POST',
                url: 'programme/ajax/add_programme',
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
                        title: "Update",
                        html: data.message,
                        });

                            $("#exampleModal").modal('toggle');
                            program_datatable.reload();
            
                        

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


var programme_table = function() {
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



        program_datatable = $('#programme_table').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'programme/ajax/get_programme',
                        data:{
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
                field: 'cover_photo',
                title: 'Cover',
                template: function(row) {  
                    var img_path  = "{{Storage::url('public/uploads/school/programme/image/')}}" + row.cover_photo;
                    console.log(img_path);
                    return `<img src="${img_path}" >`;
                }
            }, {
                field: 'title',
                title: 'Class',
            }, {
                field: 'price',
                title: 'Price',
            }, {
                field: 'categories.subject',
                title: 'Category',
            },{
                field: 'level.level',
                title: 'Level',
            },
            // {
            //     field: 'teacher',
            //     title: 'Teacher',
            // },
             {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                     <a href="javascript:;" data-id="${row.id}" class="btn btn-sm btn-clean btn-icon action_user" data-action="update_programme" title="Update">
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
                          <a href="javascript:;" data-id="${row.id}" class="btn action_user" data-action="show_manage_class" title="Manage Classes">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Home/Commode2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3"/>\
                                    <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000"/>\
                                    </g>\
                            </svg><!--end::Svg Icon--></span>\
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



$(document).ready(function() {
    programme_table.init();


});



    </script>


@endsection
