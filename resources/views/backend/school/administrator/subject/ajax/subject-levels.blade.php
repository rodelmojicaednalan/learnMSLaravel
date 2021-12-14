<div class="card card-custom">
   <div class="card-header card-header-tabs-line">
      <div class="card-title">
         <h3 class="card-label"><span class="text-muted">Subject:</span> {{ $subject->subject }}</h3>
      </div>
      <div class="card-toolbar">
         <ul class="nav nav-tabs nav-bold nav-tabs-line"">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#subject_levels_list">
                        <span class="nav-icon">
                                <i class="flaticon-list-2"></i>
                        </span>
                        <span class="nav-text">Levels</span>
                </a>
               {{-- <a class="nav-link active" data-toggle="tab" href="#subject_levels_list">Levels</a> --}}
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#subject_add_level">
                    <span class="nav-icon">
                            <i class="flaticon-add-circular-button"></i>
                    </span>
                    <span class="nav-text action_level" data-action="add_new_level">Add New Level</span>
                </a>
               {{-- <a class="nav-link" data-toggle="tab" href="#subject_add_level">Add New Level</a> --}}
            </li>
         </ul>
      </div>
   </div>
   <div class="card-body">
      <div class="tab-content">
         <div class="tab-pane fade  show active" id="subject_levels_list" role="tabpanel" aria-labelledby="subject_levels_list">
                @php

                        if(isset($subject->level))
                        {
                                $levels = $subject->level
                @endphp

                <table class="table table-hover table-striped mb-6">
                        <thead class="thead-light">
                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Level Name</th>
                                        <th scope="col">Training Hours</th>
                                       <th scope="col">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                @php
                                $cnt =0;
                                @endphp
                                @foreach($levels as $level)
                                <tr class="level-item" data-id="{{ $level->id }}">
                                        <th  width="15%" scope="row">{{ $level->number }}</th>
                                        <td>{{ $level->name }}</td>
                                        <td width="20%">{{ $level->hrs }}</td>
                                        <td width="30%">

                                             <span class="svg-icon svg-icon-primary svg-icon-2x action_level" data-name="{{ $level->name }}"  data-hrs="{{ $level->hrs }}" data-number="{{ $level->number }}" data-number="{{ $level->number }}" data-id="{{ $level->id }}" data-action="edit_level"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24"/>
                                             <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                             <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                             </g>
                                             </svg><!--end::Svg Icon--></span>

                                             <span class="svg-icon svg-icon-primary svg-icon-2x action_level" data-action="delete_level" data-id="{{ $level->id }}"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24"/>
                                             <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                             <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                             </g>
                                             </svg><!--end::Svg Icon--></span>
                                        </td>

                                </tr>
                                @php
                                $cnt++;
                                @endphp
                                @endforeach
                        </tbody>
                </table>


                @php
                        }
                @endphp
         </div>

         <div class="tab-pane  fade" id="subject_add_level" role="tabpanel" aria-labelledby="subject_add_level">
            <form class="form" id="add-subject-level-form">
                @csrf
                   <div class="card-body">

                      <div class="mb-15">
                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Level #:</label>
                            <div class="col-lg-6">
                               <input type="text" class="form-control" name="level_number" id="level_number" value="{{ $cnt+1 }}"" inputmode="numeric" style="width: 50px;">
                            </div>
                         </div>
                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Level Name:</label>
                            <div class="col-lg-6">
                               <input type="text" class="form-control" name="level_name" id="level_name">
                            </div>
                         </div>
                         <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Training Hours:</label>
                            <div class="col-lg-6">
                               <input type="text" class="form-control" name="level_hrs" id="level_hrs" inputmode="numeric" style="width: 50px;">
                            </div>
                         </div>
                      </div>

                   </div>
                   <div class="card-footer">
                      <div class="row">
                         <div class="col-lg-3"></div>
                         <div class="col-lg-6">
                            <input type="hidden" id="subject_id" name="subject_id" value="{{ $subject->id }}">
                            <button type="submit" class="btn btn-success mr-2">Add New Level</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                         </div>
                      </div>
                   </div>
                </form>
         </div>

         <!-- --------------- -->




         <!-- ----------- -->

      </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#level_number, #level_hrs").inputmask("decimal");

    $('#add-subject-level-form').on('submit',function(e){
        e.preventDefault();

            $.ajax({
                type:'POST',
                url: 'subjects/ajax/add_new_level',
                dataType:"json",
                data: $(this).serialize(),
                success:function(data)
                {

                    loadSubjectLevels($('#subject_id').val());

                }
            });
    });

    $(document).on('click','.action_level',function(e) {
        e.preventDefault();

        var action = $(this).attr('data-action');

        if(action == "add_new_level")
        {
            $('#update_level_btn').hide();
            $('#update_cancel_btn').hide();
        }

        if(action == "edit_level")
        {
            var id = $(this).attr('data-id');
            var number = $(this).attr('data-number');
            var name = $(this).attr('data-name');
            var hrs = $(this).attr('data-hrs');

            // $('#update_level_number').val(number);
            $('#update_level_name').val(name);
            $('#update_level_hrs').val(hrs);
            $('#update_level_id').val(id);

            $('#update_txt').text("Update Level #" +  number)

            $('#update_level_btn').show();
            $('#update_cancel_btn').show();

            $('#update_form').show();
            $('#subjects-level-container').hide();

        }
        if (action == "delete_level") {
            var id = $(this).attr('data-id');
            deleteLevel(id)


        }

    });

    function deleteLevel(id) {
        Swal.fire({
            title: 'Are you sure?',
            html: "<span>You won't be able to revert this!</span>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#263238',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'subjects/ajax/delete_level',
                    dataType: "JSON",
                    method: "POST",
                    data:{
                        id: id,
                        _token: CSRF_TOKEN,
                    },
                    success: function( response, status, xhr, $form ) {
                        if (!response.success) {

                            swal.fire({
                                "title": response.message,
                                "type": "warning",
                                "confirmButtonClass": "btn btn-secondary"
                            });

                        }else{
                            Swal.fire(
                                'Success!',
                                'School deleted.',
                                'success'
                            )
                            $('.level-item').each(function(k,v) {
                                if ($(this).data('id') == id) {
                                    $(this).hide();
                                }
                            })
                            datatable.reload();
                        }
                    },
                    error: function( response ) {

                        if ( response.status === 422 ) {
                            var errors = $.parseJSON(response.responseText);
                            var error_msg = "<ul>";
                            $.each(errors, function (key, value) {
                                if($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        error_msg += "<li>" + value + "</li>";
                                    });
                                }
                            });
                            error_msg += "</ul>";

                            swal.fire({
                                "title": errors.message,
                                "html": error_msg,
                                "type": "warning",
                                "confirmButtonClass": "btn btn-secondary"
                            });
                        }else{
                            swal.fire({
                                "title": "Error on request",
                                "text": "",
                                "type": "warning",
                                "confirmButtonClass": "btn btn-secondary"
                            });
                        }
                    }
                });
            }
        })
    }

})
</script>
