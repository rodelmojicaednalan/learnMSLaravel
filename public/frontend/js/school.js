$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var edit_profile_form = $('#update-school-profile-form');

$(document).on('click', '.update-profile-form-back-btn', function (e) {
    e.preventDefault();
    if ($(this).hasClass('submit-success')) {
        window.location.reload();
    }

})

function resetFormSuccessMessages() {
    $('.success_message_container .success_message').html('')
    $('.success_message_container').hide();
}

function resetErrors(form) {
    $(`#${form} .with-validation`).each(function (k, v) {
        console.log(this);
        var input_id = $(this).attr('id');
        $(this).removeClass('is-invalid');
        $(this).parents('.form-group:first').find('label').removeClass('text-danger');
        $(`#${input_id}_error`).html('').hide();
    })
}

function showErrors(key, value) {
    $(`#${key}`).addClass('is-invalid');
    $(`#${key}`).parents('.form-group:first').find('label').addClass('text-danger');
    $(`#${key}_error`).html(value).show();
}


/*  ==========================================
    Add Child Profile
*   ========================================== */
edit_profile_form.on('submit', function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    var form_id = $(this).attr('id')
    if ($("#related_skills").length) {
        var selected_related_skills = $("#related_skills").chosen().val();
        selected_related_skills = selected_related_skills.join(', ');
        data += `&formatted_related_skills=${selected_related_skills}`;
    }
    console.log(form_id)
    resetFormSuccessMessages();
    resetErrors(form_id);
    $.ajax({
        type:'POST',
        url: $(this).data('action'),
        dataType: "json",
        data: data,
        success: function (data) {

            if (data.success) {
                edit_profile_form.parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                $('.success_message_container .success_message').html(data.message)
                $('.success_message_container').show();
            }
        },
        error: function (err) {
            resetFormSuccessMessages();
            $.each(err.responseJSON.errors, function (key, value) {
                showErrors(key, value)
            });
        }
    });
})
