$(document).ready(function () {
    // Initialize Class Array Configuration
    var class_details_array = [];
    var class_obj = {};
    var video_count = $('.vd-count');

    var modal_back_btn = $('.modal-back-btn');
    var remove_video_btn = $('.remove-video')
    var add_schedule_btn = $('.add-schedule-row');
    generateScheduleForm();
    initializePicker();
    
    add_schedule_btn.on('click', function (e) {
        e.preventDefault();
        generateScheduleForm();
        $('.empty-slot').hide();
    })

    $(document).on('click', '.action-remove a', function (e) {
        var schedule_row_length = $('.schedule-wrapper .add-schedule').length;
        if (schedule_row_length > 0) {
            $(this).parents('.schedule-row:first').remove();
            if(schedule_row_length == 1) {
                $('.empty-slot').show();
            }
            else {
                $('.empty-slot').hide();
            }
        }

    })
    $(document).on('click', '.checkbox_publish', function (e) {
        var target_id = $(this).attr('id');
        if($("#"+target_id).prop('checked')) {
            var openID = $(this).closest('.modal').attr('id');
            $('#'+openID +' .btn-publish').prop('disabled', false);
            $('#'+openID +' .btn-publish').removeClass('disabled');
        }
    });

    $('.btn-save-classes').on('click', function(e){
        let save_as = 0;
        $('input[name=save_as]').val(save_as);
        $('#live-class-form').submit();
        
    });

    $('.save-draft').on('click', function(e){
        let save_as = 1;
        $('input[name=save_as]').val(save_as);
        $('#live-class-form').submit();
    });
    
    $('.btn-publish').on('click', function(e){
        let save_as = 2;
        $('input[name=save_as]').val(save_as);
        $('#live-class-form').submit();
    });
    
    $('#live-class-form').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let action = $('.btn-save-classes').data('update') ? $('.btn-save-classes').data('update') : $(this).data('action');
        formData.append('class_type', class_details_array['class_type'])
        resetFormSuccessMessages();
        resetErrors('live-class-form');
        $.ajax({
            type:'POST',
            url: action,
            // dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                
                $('.btn-save-classes').attr('data-update', '/teacher/class/ajax/update_added_classes');
                $('.empty-result').hide();
                $('.has_data').empty().html(response);
                $('.append').empty();
                $('.btn-publish').removeClass('disabled').removeAttr('disabled');
                $('.save-draft').removeClass('disabled').removeAttr('disabled');
                generateScheduleForm();

                // if (data.success) {
                //     $('#live-class-form').parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                //     $('.success_message_container .success_message').html(data.message)
                //     $('.success_message_container').show();
                //     $('#imageResult4').attr('src', '');
                //     $('#live-class-form').trigger('reset');
                //     $('.schedule-wrapper .add-schedule').remove();
                //     $('#upload-live-class-overlay').modal('toggle');
                //     $('#upload-success-overlay').modal('show');

                //     generateScheduleForm();
                //     generateActiveLiveClasses();
                // }

            },
            error: function (err) {
                resetFormSuccessMessages();
                $.each(err.responseJSON.errors, function (key, value) {
                    console.log(key)
                    $(`#live-class-form #${key}`).addClass('is-invalid');

                    $(`#live-class-form #live-class-${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#live-class-form #${key}_error`).html(value).show();
                    console.log(key.includes('orca_categories_id'))
                    if (key.includes('orca_categories_id')) {
                        $('small[id^="orca_categories_id"]').html(value).show();
                        $(`#live-class-form small[id^="orca_categories_id"]`).parents('.form-group:first').find('label').addClass('text-danger');
                    }

                });
            }
        });
    })

    function generateScheduleForm() {
        var form = '';
        var schedule_wrapper = $('.schedule-wrapper .append');
        var schedule_row_length = $('.schedule-wrapper .add-schedule').length;
        $.ajax({
            type: 'POST',
            data: { index : schedule_row_length},
            url: '/teacher/class/ajax/get_schedule_form',
            success: (response) => {
                schedule_wrapper.append(response);
                initializePicker();

               
            },
            error: function(err){
                console.log(err);
            }
        });

    }

    $(document).on('click', '#pre-recorded-class-form .remove-video', function (e) {

        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this video?");
        if (r == true) {
            $.ajax({
                type:'POST',
                url: '/teacher/class/ajax/delete_pre_recorded_videos',
                data: { id : id },
                dataType: 'JSON',
                success: (response) => {

                    $(`.video-row[data-video-entry="${id}"]`).remove();
                    var video_row = $('#pre-recorded-class-form .video-row').length;
                    console.log('video_row', video_row)
                    $('#pre-recorded-class-form .vd-count').html(video_row)

                    if (video_row < 1) {
                        $('#pre-recorded-class-form .file-drag').show();
                        $('#upload-result-wrapper').hide();
                        $('#pre-recorded-class-form .btn-wrapper').hide();
                        $('#pre-recorded-class-form .vd-count').text(0)
                    }

                    // if (response) {
                    //     $(`.video-row[data-video-entry="${id}"]`).remove();
                    //     if (response.temp_videos.length > 0) {
                    //         video_count.text(response.temp_videos.length)
                    //     } else {
                    //         $('.file-drag').show();
                    //         $('#upload-result-wrapper').hide();
                    //         $('.btn-wrapper').hide();
                    //         video_count.text(0)
                    //         window.loaded_videos = []
                    //     }
                    // }
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
    })

    modal_back_btn.on('click', function (e) {
        resetFormSuccessMessages();
    })

    function initializePicker() {
        $('input.datepicker').datepicker();
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '8:00am',
            maxTime: '6:00pm',
            // defaultTime: '08:00',
            startTime: '8:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    }


	// Drag and drop files
	$('body').on('change', '.inputDnD input[type="file"]', function () {
        var input = document.getElementById($(this).attr('id'));
        var form_parent = $(input).parents('form');
        console.log('form_parent', $(input).parents('form'))
        var class_id = $(this).data('class-id')
        readvideoURL(input, form_parent, class_id);
        $(this).closest('.file-drag').hide();
        $(this).closest('.file-drag').siblings('.video-row').fadeIn();
        $(this).closest('.file-drag').siblings('.btn-wrapper').fadeIn();
        // update video count.
        // $(this).closest('.video-wrapper').find('.vd-count').text(input.files.length);
        video_count.text(input.files.length)


  	});

  	var uploadedVideos = [];
	$(document).on('change', '.add-video-wrapper input[type="file"]', function () {

        var input = document.getElementById($(this).attr('id'));
        var form_parent = $(this).parents('form');

      	readvideoURL(input, form_parent);

    });

    $(document).on('change', '.edit-video-wrapper input[type="file"]', function () {

        var input = document.getElementById($(this).attr('id'));
        var form_parent = $(this).parents('form');
        var class_id = $(this).data('class-id')
        console.log(input);
      	readvideoURL(input, form_parent, class_id);

    });

    window.window.loaded_videos = [];

    function readvideoURL(input, form_parent, class_id = '') {
        var totalfiles = input.files.length;
        var uploaded_videos = [];
        var is_update = false;
        var form_container = '';
        console.log('readvideoURL form_parent', form_parent)

        if ($(form_parent).hasClass('add-pre-recorded-class')) {
            form_container = $(form_parent).attr('id');
        }

        if ($(form_parent).hasClass('edit-pre-recorded-class')) {
            form_container = $(form_parent).attr('id');
        }
        console.log('readvideoURL form_container', form_container);
	   // var duration = 0;
	   window.URL = window.URL || window.webkitURL;
		if(totalfiles > 0 ){
		    var formData = new FormData();
		    // Read selected files
            for (var index = 0; index <= totalfiles; index++) {
                if (typeof input.files[index] !== 'undefined') {
                    uploaded_videos.push(input.files[index]);
                }
            }

            $.each(uploaded_videos, function (k, v) {
                window.loaded_videos.push(uploadVideos(v, class_id));
            })

            console.log('window.loaded_videos', window.loaded_videos);
            if (form_container === 'edit-pre-recorded-class') {
                console.log()
                is_update = true;
            } else {
                is_update = false
            }
            console.log('readvideoURL is_update', is_update);
            generate_video_editor(window.loaded_videos, form_container, is_update, class_id);
            // $('.vd-count').text(window.loaded_videos.length)
            var video_row = $(`#${form_container} .video-row`).length;
            console.log('video_row', video_row)
            $(`#${form_container} .vd-count`).html(video_row)
            $(`#${form_container} #upload-result-wrapper`).show();
		}
    }

    function resetFormSuccessMessages() {
        $('.success_message_container .success_message').html('')
        $('.success_message_container').hide();
    }

    function resetErrors(form) {
        $(`#${form} .with-validation`).each(function (k, v) {
            var input_id = $(this).attr('id');
            $(this).removeClass('is-invalid');
            $(this).parents('.form-group:first').find('label').removeClass('text-danger');
            $(`#${input_id}_error`).html('').hide();
        })
    }

    $(document).on('click', '.action-edit', function(e){

        let class_id = $(this).data('id');
        let action = '/teacher/class/ajax/edit_live_schedules';

        $.ajax({
            type: 'POST',
            url: action,
            data: {
                id: class_id,
            },
            success: function(response){

                $('#nav-addnewclass-tab').click();
                $('.append').empty().html(response);

            },  

        });
        
        
    });

    $(document).on('click', '#pre-recorded-class-form .pre-record-save-draft', function(e){

        e.preventDefault();
        let save_draft = 0;
        console.log(save_draft);
        $('input[name=save_draft]').val(save_draft);
        $('#pre-recorded-class-form').submit();
        
    });

    $('#pre-recorded-class-form').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('class_type', class_details_array['class_type'])
        resetFormSuccessMessages();
        resetErrors('pre-recorded-class-form');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.success) {
                    $('#pre-recorded-class-form').parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                    $('.success_message_container .success_message').html(data.message)
                    $('.success_message_container').show();
                    $('#imageResult3').attr('src', '');
                    $('#pre-recorded-class-form').trigger('reset');
                    $('.file-drag').show();
                    $('#upload-result-wrapper').hide();
                    $('.btn-wrapper').hide();
                    video_count.text(0)
                    window.loaded_videos = []
                    generateActivePreRecordedClasses()
                }
            },
            error: function (err) {
                resetFormSuccessMessages();
                $.each(err.responseJSON.errors, function (key, value) {
                    console.log(key)
                    $(`#pre-recorded-class-form #${key}`).addClass('is-invalid');

                    // $(`#pre-recorded-class-form #${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#pre-recorded-class-form #${key}_error`).html(value).show();
                    if (key.includes('orca_categories_id')) {
                        $('small[id^="orca_categories_id"]').html(value).show();
                    }

                });
            }
        });
    })

    function generate_video_editor(videos, form, is_update = false, class_id = '') {
        console.log('is_update', is_update)
        var wrapper = '';
        // if (!is_update) {
        //     $(`#${form} #upload-result-wrapper`).html('');
        // }
        console.log(form);
        $.each(videos, function (k, v) {
            console.log(v);
            var video_row = $(`#${form} .video-row[data-video-entry="${v.video.id}"]`);
            console.log('video_row.length', video_row.length)
            console.log('video_id', v.video.id)
            if (video_row.length > 0) {
                wrapper += ''
            } else {
                wrapper += `
                    <div class="row video-row" data-video-entry="${v.video.id}">
                        <div class="col-md-3">
                            <!-- image dimention 200*126 -->
                            <img src="${v.placeholder_image}" alt="${v.video.class_name}" class="">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="class-name">Class Name</label>
                                <input class="form-control" name="pre_recorded_video[${v.video.id}][class_name]" type="text" placeholder="Type the class name" value="${v.video.class_name}">
                            </div>
                            <div class="item">
                                <label>
                                    Duration:
                                </label>
                                <span>15 minutes</span>
                            </div><!-- End item -->

                        </div>
                        <div class="col-md-6">
                            <div class="action-remove text-right">
                                <a href="#" class="remove-video" data-class-id="${class_id}" data-id=${v.video.id}><img src="/frontend/images/ic-actions-close-simple.png" class=""><span>Remove</span></a>
                            </div>
                        </div>
                    </div>
                `;
            }

        })

        if ($(`#${form} #upload-result-wrapper`).length > 0) {
            $(`#${form} #upload-result-wrapper`).append(wrapper);
        }
    }

    function uploadVideos(video, class_id) {
        let formData = new FormData();
        var video_upload_response = [];
        // var input = document.getElementById('upload');
        formData.append('file', video)
        formData.append('class_id', class_id)
        console.log(formData);
        if (typeof video !== 'undefined') {
            $.ajax({
                type:'POST',
                url: '/teacher/class/ajax/upload_pre_recorded_videos',
                data: formData,
                contentType: false,
                processData: false,
                async: false,
                success: (response) => {
                    video_upload_response = response;
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
        return video_upload_response;
    }

    // Select Class Type Overlay!
    $('#select-class-type-overlay .select-item').on('click', function (e) {

        class_details_array['class_type'] = $(this).data('type');
        console.log('class_type', class_details_array);

        e.preventDefault();
        $(this).addClass('selected');
        $(this).siblings('.select-item').removeClass('selected');
        $('#selected-class-type').prop('disabled', false);
        $('#selected-class-type').removeClass('disabled');
    });
    $('#select-class-type-overlay #selected-class-type').on('click', function(e) {
      e.preventDefault();
      var target_id = $('.select-item.selected').attr('data-overlay');
      target_id= '#'+target_id;
      $(this).attr('data-target', target_id);
    });

	if($('.category-wrapper').length > 0) {
		$('.category-wrapper').each(function(i, obj) {
			var category_select_id = '#'+$(this).attr('id');
    		$(category_select_id+' .subitem').each(function(i, obj) {
    			var	current_id = $('#' + $(this).attr('id'));
    			var hidden_selectmenu = $('#'+ $(this).attr('id')+ '-menu'); // dropdownmenu
    			hidden_selectmenu.addClass('subitem-selectmenu');

    		    // Scrollbar!
    		    hidden_selectmenu.wrap( "<div class='nicescroll_selectmenu'></div>" );
    		    $('.nicescroll_selectmenu').mCustomScrollbar({
    		    	mouseWheel:{ preventDefault: true },
    		    	scrollbarPosition: 'inside',
    		    	autoExpandScrollbar:false,
    		    	theme: '3d-thick',
    		    	axis:"y",
    		    });
    		var select_button = $('#'+ $(this).attr('id')+ '-button');// dropdown button
    		select_button.addClass('subitem-button');
    		if(current_id.val() == 'Select Sub Category') {
	    			var hidden_select_button = $('#'+ $(this).attr('id')+ '-button');// dropdown button
	    			hidden_select_button.hide();
	    		}
	    	});
    		$(category_select_id +' .category').on('selectmenuchange', function() {
    			if($(this).val() == 'Academic') {
	        		$(category_select_id +' .subitem-button').hide(); // hide buttons
	        		// Reset selected values
	        		$(category_select_id +' .selectmenu.subitem').val('Select Sub Category');
	        		$(category_select_id +' .selectmenu.subitem').selectmenu("refresh");
	        		// Retrive id;
	        		var academic_subitem = '#'+ $(category_select_id).find('.academic_subitem').attr('id');
	        		$(academic_subitem+'-button').fadeIn();
	        	}
	        	if($(this).val() == 'Enrichment') {
	        		$(category_select_id +' .subitem-button').hide(); // hide buttons
	        		// Reset selected values
	        		$(category_select_id +' .selectmenu.subitem').val('Select Sub Category');
	        		$(category_select_id +' .selectmenu.subitem').selectmenu("refresh");
	        		// Retrive id;
	        		var enrichment_subitem = '#'+ $(category_select_id).find('.enrichment_subitem').attr('id');
	        		$(enrichment_subitem+'-button').fadeIn();
	        	}
	        	if($(this).val() == 'Select category') {
	        		$(category_select_id +' .subitem-button').hide(); // hide buttons
	        	}
        });

    		$(category_select_id +' .enrichment_subitem').on('selectmenuchange', function() {
    		//retrive id;
    		var vitual_arts_subitem = '#'+ $(category_select_id).find('.vitual_arts_subitem').attr('id');
    		var performing_arts_subitem = '#'+ $(category_select_id).find('.performing_arts_subitem').attr('id');

    		if($(this).val() == 'Performing Arts') {
				$(vitual_arts_subitem+'-button').hide();// hide button
				$(performing_arts_subitem+'-button').fadeIn();
			}
			if($(this).val() == 'Visual Arts') {
				$(performing_arts_subitem+'-button').hide();// hide button
				$(vitual_arts_subitem+'-button').fadeIn();
			}
		});

    	});

	}

	$(".page-dashboard #nav-classes ul li a.parent-item").on('click', function(e) {
		e.preventDefault();
			if($(this).attr('href') == '#live-class') {
				$('#filter-by').closest('.dropdown').fadeOut();
			}
			if($(this).attr('href') == '#pre-recorded') {
				$('#filter-by').closest('.dropdown').fadeIn();
			}
            if($(this).parent('li').hasClass('active')) {
                $(this).parent('li').removeClass('active');
                 $(this).siblings('ul').slideUp( "3000", function() {
                });
            }
            else {
                $('.page-dashboard #nav-classes ul li').removeClass('active');
                $(this).parent('li').addClass('active');
                $(this).siblings('ul').slideDown( "3000", function() {
                });
            }

	  		// Radial Progress
	  		if($('svg.radial-progress').length > 0) {
				// Remove svg.radial-progress .complete inline styling
				$('svg.radial-progress').each(function( index, value ) {
					$(this).find($('circle.complete')).removeAttr( 'style' );
				});

				$('svg.radial-progress').each(function( index, value ) {
				// If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom

				// Get percentage of progress
				percent = $(value).data('percentage');
				// Get radius of the svg's circle.complete
				radius = $(this).find($('circle.complete')).attr('r');
				// Get circumference (2πr)
				circumference = 2 * Math.PI * radius;
				// Get stroke-dashoffset value based on the percentage of the circumference
				strokeDashOffset = circumference - ((percent * circumference) / 100);
				// Transition progress for 1.25 seconds
				$(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);

				});
			}
			if ($(this).siblings('ul').length > 0) {
				if(!$(this).siblings('ul').find('a').hasClass('active')) {
                    $(this).siblings('ul').find('a').first().trigger('click');
					// $(this).siblings('ul').find('a').first().addClass('active');
					var shown_result = $(this).siblings('ul').find('a').first().attr('href');
					$('#nav-classes .filter-content').hide();
					$(shown_result).fadeIn();
				}

			}

			else {
				var shown_result = $(this).attr('href');
				$('#nav-classes .filter-content').hide();
				$(shown_result).fadeIn();
			}

	});

	$(".page-dashboard #nav-classes ul li .sub-items a").on('click', function(e) {
		e.preventDefault();
		$('.page-dashboard #nav-classes ul li .sub-items a').removeClass('active');
		$(this).addClass('active');
		var shown_result = $(this).attr('href');
		$('#nav-classes .filter-content').hide();
		$(shown_result).fadeIn();

	});






	// to fix for header
	$('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
	 	// console.log('here?');
		height_scrollcontainer();
        $($.fn.dataTable.tables( true ) ).css('width', '100%');

        $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();



    } );

	 function height_scrollcontainer(argument) {
	 	// console.log($('#datafilter__payment').height());

	 	if($('#datafilter__payment').height() >= 540) {
			$("#datafilter__payment_wrapper .dataTables_scrollBody").height(540);

			$("#datafilter__payment_wrapper .dataTables_scrollBody").mCustomScrollbar({
				theme:"3d-thick",
				// "bAutoWidth": true,

				// mouseWheel:{ preventDefault: true },

				axis:"yx",
				// setWidth: "100%",
				setHeight: 540,
				alwaysShowScrollbar: 1,

			});
		}
		else {
			// $(".dataTables_scrollBody").height($('#datafilter__payment').height());
			 $('#datafilter__payment_wrapper .dataTables_scrollBody').mCustomScrollbar("destroy");
		}
	 }
		 // Sort immediately with columns 0 and 1

		$('#search-input').on('keyup', function () {
		 	otable.search(this.value).columns.adjust().draw();
		 	height_scrollcontainer();
		});




		$(".page-dashboard #nav-payment ul li a.parent-item").on('click', function(e) {
		e.preventDefault();



			$('.page-dashboard #nav-payment ul li').removeClass('active');
			$(this).parent('li').addClass('active');
			$(this).siblings('ul').slideDown( "3000", function() {
	  		});
			if ($(this).siblings('ul').length > 0) {
				if(!$(this).siblings('ul').find('a').hasClass('active')) {
					$(this).siblings('ul').find('a').first().addClass('active');
					var shown_result = $(this).siblings('ul').find('a').first().attr('href');
					$('#nav-payment .filter-content').hide();
					$(shown_result).fadeIn();
				}

			}
			else {
				var shown_result = $(this).attr('href');
				$('#nav-payment .filter-content').hide();
				$(shown_result).fadeIn();
			}
			if ($(this).attr('href') == '#transaction-history') {
				height_scrollcontainer();
				$($.fn.dataTable.tables( true ) ).css('width', '100%');

				$($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
			}
	});


	$('.amount-wrapper .btn-wrapper .btn').on('click', function(e) {
		$('.amount-wrapper #amount').val($(this).attr('data-value'));
	});

    $(document).on('click', '#remove_schedule', function(e){

        let remove_sched = $(this).data('remove');

        $.ajax({

            url: '/teacher/class/ajax/remove_schedule',
            type: 'POST',
            data: {
                'id': remove_sched,
            },
            dataType: 'json',
            success: function(response){

                if(response.success){
                    $('.success_message_container .success_message').html(data.message);
                    $('.success_message_container').show();
                    generateActivePreRecordedClasses();
                    generateActiveLiveClasses();
                }

            },
        });

    });

    $(document).on('change', '#upload2', function () {
        var input = document.getElementById('upload2');
        editReadURL(input , "imageResult2");
     });

    var check_ui_menu = setInterval(function(){
        if($('#live-class-orca_curricula_id-menu .ui-menu-item').length){

            $(document).on('click', '#live-class-orca_curricula_id-menu .ui-menu-item', function(e){

                $('#live-class-orca_curricula_id')
                 .trigger('change');

            });

            clearInterval(check_ui_menu);
        }
    }, 100);

    $('#live-class-orca_curricula_id').change(function(e){

        let curr_id = $(this).val();

        $.ajax({
            url: '/teacher/class/ajax/generate_dropdown_class',
            data: {
                'curr_id': curr_id,
            },
            type: 'POST',
            success: function(response){

                $('#live-base-school-class').empty().html(response);
                
            }

        })

    });

    var check_class_dropdown = setInterval(function(){
        if($('#live-base-school-class-menu .ui-menu-item').length){

            $('#live-base-school-class-menu .ui-menu-item').on('click', function(e){

                console.log('changed');

            });
            
            clearInterval(check_class_dropdown);
        }
    }, 100);

});
// Payement.
	var otable = $('#datafilter__payment').DataTable({
		dom: 'lrt',
		sDom: 't',
    	language: {
	      emptyTable: "No payment found!"
	    },
    	paging: false,
		"scrollY": "540px",
		"scrollX": true,
		"scrollCollapse": true,

    } );

function editReadURL(input, input_id, form = '') {
    console.log('input', input)
    console.log('input_id', input_id)

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {

            $(`${form} #${input_id}`).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function sort(index,x) {
	// console.log(index);
	// Sort by column 0 and then re-draw
	// otable.column(index).search('').draw();
	switch (x) {

        case 'A-Z': // Sort by A to Z
        otable.column(index).search('^[A-Z]', true, false).draw();
        otable.order( [ index, 'asc' ] ).draw();
        break;
        case 'Z-A': // Sort by Z to A
        otable.column(index).search('^[A-Z]', true, false).draw();
        otable.order( [ index, 'desc' ] ).draw();
        break;
        case '0-9': // Sort by Number Asending
        otable.column(index).search('^[0-9]', true, false).draw();
        otable.order( [ index, 'asc' ] ).draw();
        break;
        case '9-0': // Sort by Number Desending
        otable.column(index).search('^[0-9]', true, false).draw();
        otable.order( [ index, 'desc' ] ).draw();
        case 'asc': // Sort by Asending
        otable.order( [ index, 'asc' ] ).draw();
        break;
        case 'desc': // Sort by Desending
        otable.order( [ index, 'desc' ] ).draw();
        break;
        default:
        break;
    }
}
