@php

if(isset($subjects))
{
        $subjects = $subjects

@endphp

@php
$cnt =0;
@endphp
@foreach($subjects as $subject)
<div class="row">
<div class="col-md-4"><h4>Subject</h4></div><div class="col-md-8"><h4 id="parent_name">{{ $subject->subject_name }}</h4></div>
</div>

<div class="row">
<div class="col-md-4"><label class="">Trainer</label></div>
<div class="col-md-8"> <select class="form-control trainer_arr" id="txt_trainer">
@foreach($role_users as $user)
<option value="{{ $user->id }}">{{ $user->first_name }}</option>
@endforeach
</select></div>
</div>


<input type="hidden" class="id_arr" value={{ $subject->id }}>

<div class="form-group">
<label class="">Date</label>
<input type="text" class="form-control date_arr"  readonly="readonly" value="{{ date('Y/m/d')}}" placeholder="Select date" />
</div>

<div class="row">
<div class="form-group col-md-6">
<label>Start Time</label>
<input class="form-control start_arr"  readonly="readonly" placeholder="Start time" type="text" />
</div>
<div class="form-group col-md-6">
<label>End Time</label>
<input class="form-control end_arr"  readonly="readonly" placeholder="End time" type="text" />
</div>
</div>



<hr>
@php
$cnt++;
@endphp
@endforeach  

@php
}
@endphp


<script type="text/javascript">

var date_arr = [];
var start_arr = [];
var end_arr = [];
var id_arr = [];
var trainer_arr = [];


var CSRF_TOKEN2= $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){

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


                $('.start_arr').timepicker();
                $('.end_arr').timepicker();

                $('.start_arr_modal').timepicker();
                $('.end_arr_modal').timepicker();


                $('.date_arr').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

                });


                $('.date_arr_validate').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                format: 'yyyy/mm/dd',
                templates: arrows

                });

                // minimum setup for modal demo
                $('.date_arr_modal').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                dateFormat: 'yy-mm-dd',
                templates: arrows
                });


                $(document).on('click','#btnRequest',function(e)
                {

                     date_arr = [];
                     start_arr = [];
                     end_arr = [];
                     id_arr = [];
                     trainer_arr = [];

                    $(".date_arr").each(function(){
                        date_arr.push($(this).val());
                    });

                    $(".start_arr").each(function(){
                        start_arr.push($(this).val());
                    });

                    $(".end_arr").each(function(){
                        end_arr.push($(this).val());
                    });

                    $(".id_arr").each(function(){
                        id_arr.push($(this).val());
                    });

                    $(".trainer_arr").each(function(){
                        trainer_arr.push($(this).val());
                    });


                    $.ajax({
                    type:'POST',
                    url: 'grading-request/ajax/schedule_request_grading',        
                    data:{
                        date_arr: JSON.stringify(date_arr),
                        start_arr: JSON.stringify(start_arr),
                        end_arr: JSON.stringify(end_arr),
                        id_arr: JSON.stringify(id_arr),
                        trainer_arr: JSON.stringify(trainer_arr),
                        _token: CSRF_TOKEN2,
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
          
                 

                        }
                    
                        
                    }
                    });
                    
                

                });
     


              
        })
</script>