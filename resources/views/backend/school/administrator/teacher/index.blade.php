{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage Teachers
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">

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
                </span>Add New Teacher</a>
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

                        </div>
                    </div>
                </div>
            </div>
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
                    <h5 class="modal-title" id="form_text"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="POST" enctype="multipart/form-data" id="teacher_form">

                    @csrf
                    @method('post')
                    <input type="hidden" name="action">

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last Name">
                    </div>

                
                    <hr>
                    <div class="form-group" id="div_password">
                        <label class="">Password</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="password" id="password">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="generate_password">Generate</button>
                            </div>
                        </div>
                        <!-- An element to toggle between password visibility -->
                        <label class="kt-checkbox" style="margin-top: 20px;">
                            <input type="checkbox" id="show_password" checked="checked">Show Password
                            <span></span>
                        </label>
                    </div>

                    <hr>

                    <h3>Teacher Details</h3>

                    <!-- <div class="form-group append-languages">
                                <label for="spoken-languages-4">Spoken Language/s</label>

                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-4" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value=""
                                    readonly="" id="txt_lang" name="txt_lang">
                                <div id="lang-content-4" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-4" value="English">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-4" value="Spanish">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-4"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-4" value="Mandarin Chinese">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-4"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-4" value="Russian">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-4"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-4" value="French">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-fr-4"
                                                            name="language">French</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group">
                            <label for="">Spoken Languages</label>
                            <input type="text" id="txt_lang" name="txt_lang" class="form-control" value="English,French" placeholder="Spoken Languages">
                            </div>

                            <div class="form-group">
                                <label for="name-of-institution">Name of Institution</label>
                                <input type="text" class="form-control" id="txt_institution" name="txt_institution"
                                    placeholder="Type your name of institution">
                            </div>

                            <div class="form-group">
                                <label for="highest-education-qualification">Highest Education Qualification</label>
                                <select id="txt_diploma" name="txt_diploma" class="form-control">
                                    <option value="Diploma">Diploma</option>
                                    <option value="Postgraduate Diploma">Postgraduate Diploma</option>
                                    <option value="Bachelor Degree">Bachelor Degree</option>
                                    <option value="Master Degree or Above">Master Degree or Above</option>
                                </select>
                            </div>

                         
                            <div class="form-group">
                                <label for="country-of-Residence-3">Country of Residence</label>
                                <select class="form-control" id="txt_residence" name="txt_residence"> 

                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-submit" data-action="add" id="btnAdd">Save</button>
                    <button type="button" class="btn btn-primary btn-submit"  style="display:none;" id="btnUpdate">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection


{{-- Scripts Section --}}
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>


<script>
    var ignoreFields = ':hidden';
    var type = 'post';
    $(document).ready(function() {
        $(document).on('click', '.action_user', function(e) {
            console.log(this);
            var action = $(this).data('action');
            var id = ($(this).data('id')) ? $(this).data('id') : '';

            if (action === 'add') {
                $('#div_password').show();
                $('#btnAdd').show();
                $('#btnUpdate').hide();
                $('#teacher_form').trigger('reset');

                $('#form_text').html('Add Teacher');
                $('#teacher_form input[name="action"]').attr('value', action);
                $('#teacher_form').attr('action', "{{ url('school-admin/teacher') }}");
                ignoreFields = ':hidden';
                $('#teacher_form input[name="_method"]').val('post');
            }else if (action === 'update'){
                $('#div_password').hide();
                $('#btnAdd').hide();
                $('#btnUpdate').show();
                getSchoolDetails(id);
                $('#form_text').html('Update Teacher');
                $('#teacher_form input[name="action"]').attr('value', action);
                $('#teacher_form').attr('action', "{{ url('school-admin/teacher') }}/" + id);
                ignoreFields = ':hidden, #password, #password_confirmation'
                $('#teacher_form input[name="_method"]').val('patch');
            }else{
                deleteSchool(id);
            }
        })
    });

    function deleteSchool(id) {
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
                    url: "/school-admin/teacher/" + id,
                    dataType: "JSON",
                    method: "DELETE",
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

    function getSchoolDetails(id) {
        $.ajax({
            type:'GET',
            url: '/school-admin/teacher/' + id,
            dataType:"json",
            success:function(data)
            {
                console.log(data.teacher_details);
                $('#txt_institution').val(data.teacher_details.name_of_institution);
                $('#txt_lang').val(data.teacher_details.spoken_language);
                $('#txt_diploma').val(data.teacher_details.highest_education_qualification);
                $('#txt_residence').val(data.teacher_details.country_of_incorporation);
                $('#teacher_form input[name="email"]').val(data.email);
                $('#teacher_form input[name="first_name"]').val(data.first_name);
                $('#teacher_form input[name="last_name"]').val(data.last_name);

            }
        });
    }

    $(document).on('click', '#generate_password', function() {
		generatePassword(10)
	})

	$(document).on('click', '#show_password', function() {
		showPassword()
	})

	function showPassword() {
		var x = document.getElementById("password");
		if (x.type === "password") {
		x.type = "text";
		} else {
		x.type = "password";
		}
	}

	function generatePassword(length) {
	    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
	    var pass = "";
	    var pass_input = document.getElementById("password");
	    for (var x = 0; x < length; x++) {
	        var i = Math.floor(Math.random() * chars.length);
	        pass += chars.charAt(i);
	    }
	    pass_input.value = pass;
	    // x.value = pass;
	}

var KTAgencyAdd = function () {
	// Base elements
	var validator
	var formEl;

	var initValidation = function() {
		validator = formEl.validate({
			// Validate only visible fields
			// ignore: ":hidden",
			ignore: ignoreFields,

			errorClass: 'error invalid-feedback',
			highlight: function(element, errorClass, formClass) {
				$(element).find("[id$='-error']").addClass(errorClass);
				$(element).addClass('is-invalid');
			},

			// Validation rules
			rules: {
				// Step 1
				first_name: {
					required: true
				},
				last_name: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
                password: {
					minlength: 10
				},
			},

			// Display error
			invalidHandler: function(event, validator) {


                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'There are some errors in your submission. Please correct them.',
                })
			},

			// Submit valid form
			submitHandler: function (form) {

			}
		});
	}

	var initSubmit = function() {
		// var btn = formEl.find('[data-ktwizard-type="action-submit"]');
		var btn = $('.btn-submit');
		btn.on('click', function(e) {
			e.preventDefault();

			if (validator.form()) {

				// See: http://malsup.com/jquery/form/#ajaxSubmit
				formEl.ajaxSubmit({
                    type : 'POST',
					success: function( data ) {

						if (!data.success) {
							var error_msg = "";
							if ( data.messages ) {
								error_msg += '<ul class="form-error">';
								$.each( data.errors, function( key, value ) {
								   	error_msg += "<li>" + value + "</li>";
								});
								error_msg += "</ul>";
							}

							swal.fire({
								"title": data.messages.message,
								"html": error_msg,
								"type": "warning",
								"confirmButtonClass": "btn btn-secondary"
							});

						}else{
                            if (!data.updated) {
                                formEl.trigger('reset');
                            }

                            Swal.fire(
                                'Success!',
                                'The application has been successfully submitted.',
                                'success'
                            )
                            datatable.reload()
						}

					},
					error: function( data ) {

						if ( data.status === 422 ) {
							var errors = $.parseJSON(data.responseText);
							var error_msg = '<ul class="form-error">';
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
								"title": "The application is not submitted!",
								"text": "",
								"type": "warning",
								"confirmButtonClass": "btn btn-secondary"
							});
						}

					}
				});
			}
		});
	}

	return {
		// public functions
		init: function() {
			formEl = $('#teacher_form');

			initValidation();
			initSubmit();
		}
	};
}();



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
                            url: '{{ route("school-admin.ajax", "teachers") }}',
                            headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
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
                    field: 'fullname',
                    title: 'Teacher Name',
                    template: function(row) {
                        return row.fullname
                    },
                },{
                    field: 'email',
                    title: 'Email',
                    template: function(row) {
                        return row.email
                    },
                },{
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 125,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(row) {
                        return `
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="update" data-id="${row.id}" data-toggle="modal" data-target="#exampleModal" title="Edit details">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                        </a>
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon action_user" data-action="delete" data-id="${row.id}" title="Delete">
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
        KTAgencyAdd.init();
    });


</script>
@endsection
