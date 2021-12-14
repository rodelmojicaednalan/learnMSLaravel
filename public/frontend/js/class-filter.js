

$(document).ready(function () {
    // var update_form_video_count = $('#edit-pre-recorded-class .vd-count');
    var delete_class_confirm = $('#delete-class-overlay #confirm-delete');

    $(document).on('click', '#edit-pre-recorded-class .remove-video', function (e) {
        var id = $(this).data('id');
        var class_id = $(this).data('class-id');
        var r = confirm("Are you sure you want to delete this video?");
        if (r == true) {
            // $(`.video-row[data-video-entry="${id}"]`).remove();
            // var video_row = $('#edit-pre-recorded-class .video-row').length;
            // console.log('video_row', video_row)
            // $('#edit-pre-recorded-class .vd-count').html(video_row)

            // if (video_row < 1) {
            //     $('#edit-pre-recorded-class .file-drag').show();
            //     $('#upload-result-wrapper').hide();
            //     $('#edit-pre-recorded-class .btn-wrapper').hide();
            //     $('#edit-pre-recorded-class .vd-count').text(0)
            // }
            $.ajax({
                type:'POST',
                url: '/teacher/class/ajax/delete_pre_recorded_videos',
                data: {
                    id: id,
                    is_update: true,
                    class_id : class_id
                },
                dataType: 'JSON',
                success: (response) => {

                    if (response) {
                        if (window.loaded_videos.length > 0) {
                            window.loaded_videos.splice(window.loaded_videos.findIndex(e => e.video.id === id),1);
                            // window.loaded_videos.filter(function (videoObj, index) {
                            //     console.log('videoobject', videoObj.video.id);
                            //     console.log('id', id);
                            //     console.log('condition', (videoObj.video.id == id))
                            //     // if (!videoObj.video.id == id) {
                            //     //     return videoObj;
                            //     //     // const video_index = window.loaded_videos.indexOf(index);
                            //     //     // if (video_index > -1) {
                            //     //     //     window.loaded_videos.splice(video_index, 1);
                            //     //     // }
                            //     // }

                            //     if (videoObj.video.id == id) {
                            //             // const video_index = window.loaded_videos.indexOf(index);
                            //             // if (video_index > -1) {
                            //             //     window.loaded_videos.splice(video_index, 1);
                            //             // }
                            //     };
                            // })
                        }

                        $(`.video-row[data-video-entry="${id}"]`).remove();
                        var video_row = $('#edit-pre-recorded-class .video-row').length;
                        $('#edit-pre-recorded-class .vd-count').html(video_row)

                        if (video_row < 1) {
                            $('#edit-pre-recorded-class .file-drag').show();
                            $('#upload-result-wrapper').hide();
                            $('#edit-pre-recorded-class .btn-wrapper').hide();
                            $('#edit-pre-recorded-class .vd-count').text(0)
                        }
                    }
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
    })

    $(document).on('submit', '#edit-pre-recorded-class', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        resetFormSuccessMessages();
        resetErrors('edit-pre-recorded-class');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.success) {
                    $('#edit-pre-recorded-class').parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                    $('.success_message_container .success_message').html(data.message)
                    $('.success_message_container').show();
                    // $('#edit-pre-recorded-class .file-drag').show();
                    // $('#edit-pre-recorded-class #upload-result-wrapper').hide();
                    // $('#edit-pre-recorded-class .btn-wrapper').hide();
                    // video_count.text(0)
                    generateActivePreRecordedClasses();
                    generateDraftPreRecordedClasses();
                    window.loaded_videos = [];
                }
            },
            error: function (err) {
                resetFormSuccessMessages();
                $.each(err.responseJSON.errors, function (key, value) {
                    $(`#edit-pre-recorded-class #${key}`).addClass('is-invalid');

                    $(`#edit-pre-recorded-class #${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#edit-pre-recorded-class #${key}_error`).html(value).show();
                    if (key.includes('orca_categories_id')) {
                        $('small[id^="orca_categories_id"]').html(value).show();
                        $(`#edit-pre-recorded-class small[id^="orca_categories_id"]`).parents('.form-group:first').find('label').addClass('text-danger');
                    }

                });
            }
        });
    })

    $(document).on('click', '.edit-pre-record-save-draft', function(e){

        let save_draft = 0;
        $('input[name=edit_save_draft]').val(save_draft);
        $('#edit-pre-recorded-class').submit();

    });

    $(document).on('click', '.edit-save-draft', function(e){
        let save_draft = 0;
        $('input[name=edit_save_draft]').val(save_draft);
        console.log($('input[name=edit_save_draft]').val());
        $('#edit-live-class-form').submit();
    });

    $(document).on('click', '.edit-btn-publish', function(e){
        let save_draft = 1;
        $('input[name=edit_save_draft]').val(save_draft);
        console.log($('input[name=save_draft]').val());
        e.stopImmediatePropagation();
    });

    $(document).on('submit', '#edit-live-class-form', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        resetFormSuccessMessages();
        resetErrors('edit-live-class-form');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    $('.success_message_container .success_message').html(data.message);
                    $('.success_message_container').show();
                    generateActiveLiveClasses();
                    generateDraftLiveClasses();
                }
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

    $(document).on('click', '.edit-modal-close', function (e) {

        $(this).parents('.modal:first').modal('toggle')
    })

    $(document).on('click', '.pagination a',function(event){
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];

        generateActivePreRecordedClasses(page);
    });

    $(document).on('click', '#active-pre-recorded .class_action', function (event) {
        event.preventDefault();
        var action = $(this).data('action');
        var id = $(this).data('id');
        var type = 'pre_recorded_class';

        var form_wrapper = $('#edit-pre-recorded-overlay-content');
        $('#delete-class-overlay #confirm-delete').data('id', '')

        if (action === 'delete') {
            $('#delete-class-overlay #confirm-delete').data('id', id)
        }

        $.ajax({
            type: 'POST',
            data: {
                id: id,
                action: action,
                type: type
            },
            url: '/teacher/class/ajax/get_single_class',
            success: (response) => {
                form_wrapper.empty().html(response);
                initScroll()
                resetFormSuccessMessages();
                $('.selectmenu').selectmenu().selectmenu('refresh', true);
            },
            error: function(err){
                console.log(err);
            }
        });

    })

    $(document).on('click', '#draft-live-class .class_action', function (event) {
        event.preventDefault();
        var action = $(this).data('action');
        var id = $(this).data('id');
        var type = 'live_class';

        var form_wrapper = $('#edit-live-class-overlay-content');
        $('#delete-class-overlay #confirm-delete').data('id', '')

        if (action === 'delete') {
            $('#delete-class-overlay #confirm-delete').data('id', id)
        }

        $.ajax({
            type: 'POST',
            data: {
                id: id,
                action: action,
                type: type,
            },
            url: '/teacher/class/ajax/get_single_class',
            success: (response) => {
                form_wrapper.empty().html(response);
                initScroll()
                resetFormSuccessMessages();
                $('.selectmenu').selectmenu().selectmenu('refresh', true);
                generateDraftLiveClasses();
            },
            error: function(err){
                console.log(err);
            }
        });

    });

    $(document).on('click', '#draft-pre-recorded .class_action', function(e){

        event.preventDefault();
        var action = $(this).data('action');
        var id = $(this).data('id');
        var type = 'pre_recorded_class';

        var form_wrapper = $('#edit-pre-recorded-overlay-content');
        $('#delete-class-overlay #confirm-delete').data('id', '')

        if (action === 'delete') {
            $('#delete-class-overlay #confirm-delete').data('id', id)
        }

        $.ajax({
            type: 'POST',
            data: {
                id: id,
                action: action,
                type: type
            },
            url: '/teacher/class/ajax/get_single_class',
            success: (response) => {
                form_wrapper.empty().html(response);
                initScroll()
                resetFormSuccessMessages();
                $('.selectmenu').selectmenu().selectmenu('refresh', true);
                generateDraftPreRecordedClasses();
            },
            error: function(err){
                console.log(err);
            }
        });

    });

    $(document).on('click', '#active-live-class .class_action', function (event) {
        event.preventDefault();
        var action = $(this).data('action');
        var id = $(this).data('id');
        var type = 'live_class';

        var form_wrapper = $('#edit-live-class-overlay-content');
        $('#delete-class-overlay #confirm-delete').data('id', '')

        if (action === 'delete') {
            $('#delete-class-overlay #confirm-delete').data('id', id)
        }

        $.ajax({
            type: 'POST',
            data: {
                id: id,
                action: action,
                type: type,
            },
            url: '/teacher/class/ajax/get_single_class',
            success: (response) => {
                form_wrapper.empty().html(response);
                initScroll()
                resetFormSuccessMessages();
                $('.selectmenu').selectmenu().selectmenu('refresh', true);
            },
            error: function(err){
                console.log(err);
            }
        });

    });

    $('#reset-pre-recorded-list').on('click', () => {

        generateActivePreRecordedClasses();

    }); 

    $('#reset-live-class-list').on('click', () => {

        generateActiveLiveClasses();

    });

    $('#reset_draft_pre_recorded').on('click', function(e){

        generateDraftPreRecordedClasses();

    });

    $('#reset_draft_live_classes').on('click', function(e){

        generateDraftLiveClasses();

    });

    generateActivePreRecordedClasses()
    generateActiveLiveClasses()
})

$(document).on('click', '#delete-class-overlay #confirm-delete', function (e) {

    deleteClass($(this).data('id'));

})

function showSuccessMessage(title, message) {
    $('#upload-success-overlay .modal-title').html(title)
    $('#upload-success-overlay .modal-body .text-wrapper p').html(message)
    $('#upload-success-overlay').modal('toggle');
}

function deleteClass(id) {

    $.ajax({
        type: 'POST',
        data: {
            id: id,
        },
        url: '/teacher/class/ajax/delete_class',
        success: (response) => {
            if (response.success) {
                $('#delete-class-overlay').modal('toggle');
                showSuccessMessage(response.title, response.message)
                generateActivePreRecordedClasses();
                generateActiveLiveClasses();
            }
        },
        error: function(err){
            console.log(err);
        }
    });
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

function initScroll() {
    $('.nicescroll').mCustomScrollbar('update')
}

function generateActivePreRecordedClasses(page = 1) {
    var class_wrapper = $('#active-pre-recorded');

    $.ajax({
        type: 'POST',
        data: { type : 'pre_recorded_class'},
        url: '/teacher/class/ajax/get_active_class?page=' + page,
        success: (response) => {
            class_wrapper.empty().html(response);
            // location.hash = page;
        },
        error: function(err){
            console.log(err);
        }
    });
}

function generateDraftPreRecordedClasses(page = 1) {
    var class_wrapper = $('#draft-pre-recorded');

    $.ajax({
        type: 'POST',
        data: { type : 'draft_pre_recorded'},
        url: '/teacher/class/ajax/get_active_class?page=' + page,
        success: (response) => {
            class_wrapper.empty().html(response);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function generateDraftLiveClasses(page = 1) {
    var class_wrapper = $('#draft-live-class');

    $.ajax({
        type: 'POST',
        data: { type : 'draft_live_class'},
        url: '/teacher/class/ajax/get_active_class?page=' + page,
        success: (response) => {
            class_wrapper.empty().html(response);
        },
        error: function(err){
            console.log(err);
        }
    });
}

$(document).on('click', '#live_class_paginate .pagination a', function(e){
    e.preventDefault();
    $('li').removeClass('active');
    $(this).parent('li').addClass('active');

    var myurl = $(this).attr('href');
    var page=$(this).attr('href').split('page=')[1];
    generateActiveLiveClasses(page);
});


function generateActiveLiveClasses(page = 1) {
    var class_wrapper = $('#active-live-class');

    $.ajax({
        type: 'POST',
        data: { type : 'live_class'},
        url: '/teacher/class/ajax/get_active_class?page=' + page,
        success: (response) => {
            class_wrapper.empty().html(response);
        },
        error: function(err){
            console.log(err);
        }
    });
}

// $(window).on('hashchange', function() {
//     if (window.location.hash) {
//         var page = window.location.hash.replace('#', '');
//         if (page == Number.NaN || page <= 0) {
//             return false;
//         }else{
//             generateActivePreRecordedClasses(page);
//         }
//     }
// });

