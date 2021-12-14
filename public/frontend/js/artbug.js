var global_selected = "";
var global_enter_val = "";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ajaxStart(function(){
  // Show image container
  $("#loader").show();
});
$(document).ajaxComplete(function(){
  // Hide image container
  $("#loader").hide();
});
// Cookie Bar!
(function($){ 
  // If the 'hide cookie is not set we show the message
  if (!readCookie('hide')) {
    $('#cookie-notice').show();
    $(window).resize(function() {
      $('footer').css("padding-bottom", $("#cookie-notice").height());
  }).resize();
  }

  // Add the event that closes the popup and sets the cookie that tells us to
  // not show it again until one day has passed.
  $('#cn-accept-cookie').click(function() {
    $('#cookie-notice').hide();
    $(window).resize(function() {
      $('footer').css("padding-bottom", "0");
  }).resize();
    createCookie('hide', true, 30)
    return false;
  });

})(jQuery);

// ---
// And some generic cookie logic
// ---
function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
} 
// Created at 22 July 2021
function sticky_menu(argument) {
    var header = document.getElementById("header");
    var sticky_menu = header.offsetTop;

    if (window.pageYOffset > sticky_menu) {
      $('body').addClass('sticky');

    }
    else {
      $('body').removeClass('sticky');
    }
}
function append_menu() {
  if ($(window).width() <= 991) {
    // change mobile layout!;
    $('#mobile-menu').html('');
    $('body').removeClass('mobile-menu-show');
    // $('body').append('<div class="overlay"></div>');
    $('#mobile-menu').append($('.nav-wrapper').html());
    $('header .nav-wrapper').hide();
    $('#mobile-menu').hide();
  }
  else {
    // change mobile layout!;
    $('#mobile-menu').hide();
    // $('#mobile-menu').append($('.nav-wrapper').html());
    $('header .nav-wrapper').show();
  }
}
function mobile_slider () {
  if ($(window).width() <= 767) {
    $('.m-tab-slider').not('.slick-initialized').slick({
      slidesToShow: 1.5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      dots: true,
    });
    // mobile home tab nav
    $('.page-home .nav-link').on( "click", function(e) {
      var target_id = $(this).attr("href");
      $(target_id + ' .m-tab-slider').slick('refresh');
      $(target_id + ' .m-tab-slider').slick('setPosition', '0');
    });
  }
else {
  if ($('.m-tab-slider').hasClass('slick-slider'))  {
    $('.m-tab-slider').slick("unslick");
  }
}
}
$( window ).resize(function() {
  append_menu();
  mobile_slider();
  if($('body').hasClass('show-sticky-progress-bar')) {
    $('#header').css('top', $('#sticky-top-progress-bar').height());
  }
});

$("header .navbar-toggler").on( "click", function(e) {
  e.preventDefault();
    $("#main-menu-list").toggleClass('show');
    $('body').toggleClass('mobile-menu-show');
    $('#mobile-menu').slideToggle('slow');
});
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
    if($('#sticky-top-progress-bar').length > 0 ) {
      $('body').addClass('show-sticky-progress-bar');
      if($('body').hasClass('show-sticky-progress-bar')) {
        $('#header').css('top', $('#sticky-top-progress-bar').height());
      }
    }

    var $_GET = {};

    document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
        function decode(s) {
            return decodeURIComponent(s.split("+").join(" "));
        }

        $_GET[decode(arguments[1])] = decode(arguments[2]);
    });

    if($_GET['page']){

        $('#nav-teachers-tab').addClass('active');
        $('#nav-teachers-tab').attr('aria-selected', true);
        $('#profile-tab').removeClass('active');
        $('#profile-tab').attr('aria-selected', false);
        $('#nav-profile').removeClass('active show');
        $('#nav-teachers').addClass('active show');

    }

  if($('#fpass').val() == "true")
  {
    $("#forgot-password").modal('toggle');
    $("#forgot_email").val($('#femail').val());
  }

  if($('#reset_checker').val() == "true")
  {
    $("#reset-password").modal('toggle');
  }



  // Scrollbar IU
  // $('table.fixed-headers').on('scroll', function () {
  //   $("table.fixed-headers > *").width($("table.fixed-headers").width() + $("table.fixed-headers").scrollLeft());
  // });

  // $(".dataTables_scrollBody").mCustomScrollbar({
  //   theme:"3d-thick",
  //   scrollButtons:{
  //     enable:false
  //   },
  //   mouseWheel:{ preventDefault: true },
  //   scrollbarPosition: 'inside',
  //   autoExpandScrollbar:false,
  //   theme: '3d-thick',
  //   axis:"yx",
  //   setWidth: "auto",
  //   alwaysShowScrollbar: 1,
  // });

  $('.nicescroll').mCustomScrollbar({
    // mouseWheel:{ preventDefault: true },
    scrollbarPosition: 'inside',
    autoExpandScrollbar:false,
    theme: '3d-thick',
    axis:"y",
    callbacks:{
        whileScrolling:function(){
            dropdowns_close(this);
        }
    }
  });
  function dropdowns_close(el) {
    if($(el).find('.selectmenu').length > 0 ) {

      $(el).find('.selectmenu').selectmenu('close');
    }
    if($(el).find('.append-languages').length > 0) {

     $(el).find('.navbar-collapse').removeClass('show');
    }

  }


  append_menu();
  mobile_slider();
  var maxHeight = 0;
  $(".equal-height").each(function(){
    if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
  });

  $(".equal-height").height(maxHeight);
  window.onscroll = function () { sticky_menu() };
  // youtube video
  var video_height = $(".youtube-video .image img").height();
  if (video_height != 0) {

    $(".youtube-video").height(video_height);
  }

  $('.youtube-video').fitVids();
  
   
    $(".youtube-video .play-button").on('click', function(e) {
      if (!$(this).hasClass('play-button-disable')) {
         alert('here?');
        $(".iframe-video")[0].src += "?autoplay=1";
        $(this).siblings('.image').fadeOut(300); //hide the .image div
        $(this).fadeOut(300); //hide the .image div
        e.preventDefault();
        }
    });
  
    // Banner slider
    if ($('#banner-slider-wrap .banner-slide').length > 1) {
      $('#banner-slider-wrap .banner-slider').not('.slick-initialized').slick({
          dots: true,
          infinite: true,
          autoplay:true,
          fade:true,
          speed:500,
          autoplaySpeed:5000,
          slidesToShow: 1,
          arrows: false,
      });
    }

    $('#banner-slider-cc .banner-slider').not('.slick-initialized').slick({
        dots: true,
        infinite: true,
        autoplay:true,
        fade:true,
        speed:500,
        autoplaySpeed:5000,
        slidesToShow: 1,
        arrows: true,
    });


    $('.testimonial-slider').not('.slick-initialized').slick({
      slidesToShow: 2.5,
      slidesToScroll: 2,
      adaptiveHeight: true,
      infinite: true,
      arrows: true,
      dots: false,
      centerMode: true,
    });

    $('#banner-slider-detail .banner-slider').not('.slick-initialized').slick({
        slidesToShow: 2.3,
        slidesToScroll: 2,
        adaptiveHeight: true,
        dots: true,
        arrows: true,
        centerMode: true,
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 1008,
              settings: {
                slidesToShow: 1.9,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }

        ]
    });

     if ($(window).width() > 991) {
        // Main menu dropdown for desktop!
        $('body').on('mouseenter mouseleave','.dropdown',function(e){
          var _d=$(e.target).closest('.dropdown');
          if (e.type === 'mouseenter') {
            _d.addClass('show');
          }
          setTimeout(function(){
            _d.toggleClass('show', _d.is(':hover'));

            $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
        },300);
      });
    }
    else {
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {

        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');
        $(this).parents('.dropdown-submenu').toggleClass('show');
         console.log($(this).next('.dropdown-menu').length);
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass('show');
        });


        return false;
      });
    }





    // Classes Page.
    // Range Slider.
    var $range = $(".js-range-slider"),
    $inputFrom = $(".js-input-from"),
    $inputTo = $(".js-input-to"),
    instance,
    min = 0,
    max = 1000,
    from = 0,
    to = 0;

    $range.ionRangeSlider({
      skin: "round",
      type: "double",
      min: min,
      max: max,
      from: 0,
      to: 1000,
      onStart: updateInputs,
      onChange: updateInputs
    });
    instance = $range.data("ionRangeSlider");

    function updateInputs (data) {
      from = data.from;
      to = data.to;

      $inputFrom.prop("value", from);
      $inputTo.prop("value", to);
    }

    $inputFrom.on("input", function () {
      var val = $(this).prop("value");

    // validate
    if (val < min) {
      val = min;
    } else if (val > to) {
      val = to;
    }

    instance.update({
      from: val
    });
  });

    $inputTo.on("input", function () {
      var val = $(this).prop("value");

    // validate
    if (val < from) {
      val = from;
    } else if (val > max) {
      val = max;
    }

    instance.update({
      to: val
    });
  });
	$('.range-slider-wrap .reset-btn') .on( "click", function(e) {

    $inputFrom.prop("value", 0);
    $inputTo.prop("value", 1000);
    $range.data('ionRangeSlider').reset();
  });

  // Overlays!

    // forgot password and register
    $(".show_hide_password .show-password").on('click', function(e) {
        e.preventDefault();
        var target_id = $(this).closest('.show_hide_password').attr('id');
        target_id= '#'+target_id;
        if ($(target_id + ' input').attr("type") == "text"){
            $(target_id + ' input').attr('type', 'password');
            $(this).children('i').addClass( "fa-eye-slash" );
            $(this).children('i').removeClass( "fa-eye" );
        }
        else if($(target_id + ' input').attr("type") == "password"){
          $(target_id + ' input').attr('type', 'text');
          $(this).children('i').removeClass( "fa-eye-slash" );
          $(this).children('i').addClass( "fa-eye" );
        }
    });
    // Select Role Overlay!
    $('#select-role .select-item').on('click', function(e) {
      e.preventDefault();
      $(this).addClass('selected');
      $(this).siblings('.select-item').removeClass('selected');
      $('#selected-role').prop('disabled', false);
      $('#selected-role').removeClass('disabled');
    });
    $('#select-role #selected-role').on('click', function(e) {
      e.preventDefault();
      var target_id = $('.select-item.selected').attr('data-overlay');
      target_id= '#'+target_id;
      global_enter_val = "input_profile";
      
      $(this).attr('data-target', target_id);
    });

    $('.selectmenu').each(function(){
      var target_id = $(this).attr('id');
       target_id= '#'+target_id;
       

       if($( target_id ).hasClass('level-select')) {
        $( target_id ).selectmenu({
          change: function( event, ui ) {
        
            if($(this).val() == 'Others') {
            
             $(target_id).parent('.form-group').siblings('.orca_level_other_formgroup').show();
            }
            else {
              $(target_id).parent('.form-group').siblings('.orca_level_other_formgroup').hide();
            }
          }
        });
      }
      else {
        $( target_id ).selectmenu();
      }
    });

    if ( $(".chosen-select").length > 0) {

       $('.chosen-select').each(function () {
      var $this = $(this);

      var delta = 15;
      var width = $this.parent().width() - $this.parent().find('label').width() - delta;
      $this.chosen({
        width: width + 'px',
        // max_selected_options: 4,
        no_results_text: "Oops, nothing found!"
      });
    });

    $('.chosen-select').on('chosen:showing_dropdown', function(evt, params) {
      $(".chosen-results").mCustomScrollbar({
        axis: "y",
        theme: "3d-thick"
      });
    });

    $('.chosen-select').on('chosen:hiding_dropdown', function(evt, params) {
      if($(".chosen-results").length > 0) {
        $(".chosen-results").mCustomScrollbar('update');
      }
    });


        getSelectedSkills()
    }

    function getSelectedSkills() {
        $.ajax({
            type:'POST',
            url: $('.chosen-select').data('action'),
            dataType:"json",
            success:function(data){
                console.log(data);
                $('.chosen-select').val(data).trigger('chosen:updated');
                console.log(data);

            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    // $( "#date-from-menu, #date-to-menu" ).wrap( "<div class='nicescroll_selectmenu'></div>" );
    $('.ui-menu.ui-widget-content').wrap( "<div class='nicescroll_selectmenu'></div>" );

     $('.nicescroll_selectmenu').mCustomScrollbar({

          mouseWheel:{ preventDefault: true },
          scrollbarPosition: 'inside',
          autoExpandScrollbar:false,
          theme: '3d-thick',
          axis:"y",

          // alwaysShowScrollbar: 1,
      });
    $(document).on('hidden.bs.modal', '.modal', function () {
      $('.modal:visible').length && $(document.body).addClass('modal-open');
      
    });
    $(document).on('show.bs.modal', '.modal', function () {
  
      var modal_openID = $(this).attr('id');
      
       global_selected = getWithExpiry("global_selected");
 
      // condition for profile picture.
      if(modal_openID == 'school-profile-picture' || modal_openID == 'profile-picture') {
        modal_openID = global_selected+'-profile-picture';
      }
      //  location.hash = modal_openID;
      
    });
   var hash = window.location.hash;
    if(hash == '#teacher-profile-picture' || hash == '#learner-profile-picture') {
      hash = '#profile-picture';
    }
   
    if ($(hash).length > 0) {
       $(hash).modal('show');
    }
   
    $('.hash-null').on("click", function() {
      if (window.history) {
        window.history.pushState('', document.title, window.location.href.replace(window.location.hash, ''));
      } else {
        window.location.hash = '';
      }
    });
    
   $( ".selectmenu" ).on( "selectmenuopen", function( event, ui ) {
    var target_button = $(this).attr('id')+'-button';//Find selemenu button
    target_button = '#'+target_button;
    $('.nicescroll_selectmenu').width($(target_button).outerWidth()); // for scrollbar!
   });
   

    // Append Spoken Languages

    $('.append-languages input[type="checkbox"]').on("click", function() {
      var target_id = $(this).closest('.append-languages').attr('id');
      target_id = '#' +target_id;
      var values = [];
      $(target_id + " input[type='checkbox']").each(function(){
        if ($(this).prop('checked')) {
          values.push($(this).val());
        }
      });
      $(target_id+ ' input[type="text"]').val(values.join(', '));
    });



  // t&c overlay checkbox
  $("#accept-check-1").on("click", function(){
    if($('#accept-check-1').prop('checked') && $('#accept-check-2').prop('checked')) {
      $('#tnc .btn-red').prop('disabled', false);
      $('#tnc .btn-red').removeClass('disabled');
    }
    else {
       $('#tnc .btn-red').prop('disabled', true);
      $('#tnc .btn-red').addClass('disabled');
    }
  });
  $("#accept-check-2").on("click", function(){
    if($('#accept-check-2').prop('checked') && $('#accept-check-1').prop('checked')) {
      $('#tnc .btn-red').prop('disabled', false);
      $('#tnc .btn-red').removeClass('disabled');
    }
    else {
      $('#tnc .btn-red').prop('disabled', true);
      $('#tnc .btn-red').addClass('disabled');
    }
  });




  $('.btn-filter-overlay').on("click", function(){
   var target_id = $(this).attr('data-target');
   $('body').addClass('filter-active');
   $(target_id).fadeIn();
  });

  $('body .overlay').on("click", function(){
    if ($('body').hasClass('filter-active')) {
      $('body').removeClass('filter-active');
      $('#filter-wrapper').fadeOut();

    }

  });
  $('#filter-wrapper .nicescroll-mb').mCustomScrollbar({

          mouseWheel:{ preventDefault: true },
          scrollbarPosition: 'inside',
          autoExpandScrollbar:false,
          theme: '3d-thick',
          axis:"y",

          // alwaysShowScrollbar: 1,
      });
    var login_form = $('#login-form');

    $(document).on('click', '#kt_login_signin_submit', function (e) {
        e.preventDefault();

        $.ajax({
            type:'POST',
            url: login_form.attr('action'),
            dataType:"json",
            data: login_form.serialize(),
            success:function(data){
                console.log(data);
                window.location.replace(data.redirection_url);
            },
            error: function (err) {
                console.log(err);
                console.log(err.responseJSON);

                $.each(err.responseJSON.errors, function (key, value) {

                    $(`#login-${key}`).addClass('is-invalid');
                    $(`#login-${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#${key}_error`).html(value).show();
                });
            }
        });

    })

});

// Profile Upload
$(function () {

    /*  ==========================================
        UPDATE SOCIAL LINK
    * ========================================== */

    var social_media_link_form = $('#update-social-media-form');

    social_media_link_form.on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();

        resetFormSuccessMessages();
        resetErrors('add-child-form');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: data,
            success: function (data) {

                if (data.success) {
                    social_media_link_form.parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                    $('.success_message_container .success_message').html(data.message)
                    $('.success_message_container').show();
                    social_media_link_form.trigger('reset');
                }
            },
            error: function (err) {
                resetFormSuccessMessages();
                console.log(err);
            }
        });
    })

    $('#upload').on('change', function(e){

      console.log('test');
      var input = document.getElementById('upload');
      readURL(input , "imageResult2");

    });

    $('#upload-image-form #upload').on('change', function(e){

      console.log('test');
      var input = document.getElementById('upload');
      readURL(input , "imageResult");  

  });

    $(document).on('change', '#edit-pre-recorded-class #upload', function () {
            console.log(this);
            var input = document.getElementById($(this).attr('id'));
            console.log(input);
            readURL(input , "imageResult2", '#edit-pre-recorded-class');

    });

    $('#pre-recorded-class-form #upload').on('change', function () {

      var input = document.getElementById($(this).attr('id'));
      console.log(input);
      readURL(input , "imageResult2");

    });

  $('#upload-logo').on('change', function () {

    var input = document.getElementById('upload-logo');
      readURL(input , "imageResult");
  });
  // <!-- Modal Upload Pre-Recorded -->
  $('#upload3').on('change', function () {
     var input = document.getElementById('upload3');
      readURL(input , "imageResult3");
  });

// <!-- Modal Upload Live Class -->
  $('#upload4').on('change', function () {
     var input = document.getElementById('upload4');
      readURL(input , "imageResult4");
  });




    /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */

var profile_image_upload_form = $('#upload-image-form');

    function readURL(input, input_id, form = '') {
    console.log('input', input)
    console.log('input_id', input_id)

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {

          $(`${form} #${input_id}`).attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
      profile_image_upload_form.trigger('submit');
  }
}

    profile_image_upload_form.on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        var input = document.getElementById('upload');
        formData.append('file', input.files[0], input.files[0].name)
        if (input.files && input.files[0]) {
            $.ajax({
                type:'POST',
                url: $(this).data('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response)
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
    })

    // Refresh page if clicked outside the modal
    $('#edit-profile-overlay').on('shown', function () {
        $('body').on('click', function(e) {
            // your function...
            e.stopPropagation();
            alert('clicked outside the modal')
        });
    })

    /*  ==========================================
        Add Child Profile
    *   ========================================== */
    $('#add-child-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();

        resetFormSuccessMessages();
        resetErrors('add-child-form');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: data,
            success: function (data) {

                if (data.success) {
                    $('#add-child-form').parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                    $('.success_message_container .success_message').html(data.message)
                    $('.success_message_container').show();
                    $('#add-child-form').trigger('reset');
                }
            },
            error: function (err) {
                resetFormSuccessMessages();
                $.each(err.responseJSON.errors, function (key, value) {
                    $(`#add-child-form #child-${key}`).addClass('is-invalid');
                    $(`#add-child-form #child-${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#add-child-form #${key}_error`).html(value).show();
                });
            }
        });
    })

    /*  ==========================================
        Delete Child Profile
    *   ========================================== */
    $('.delete-profile-btn').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('child-id');

        if(confirm("Are you sure you want to delete this?")){
            $.ajax({
                type:'POST',
                url: $(this).data('action'),
                dataType: "json",
                data: { id : id },
                success: function (data) {

                    if (data.success) {
                        alert(data.message)
                        window.location.reload();
                    }
                },
                error: function (err) {
                    alert('Error on deleting user.')
                }
            });
        }
        else{
            return false;
        }
    })

    /*  ==========================================
        Update ChildProfile
    *   ========================================== */

    $(document).on('click', '.edit-child', function (e) {
        e.preventDefault();
        var child_id = $(this).data('child-id');
        $.ajax({
            type: 'POST',
            url: $(this).data('action'),
            dataType: 'JSON',
            data: {
                id : child_id
            },
            success: function (data) {
                populateChildFormField(data);
                console.log(data);
            },
            error: function (err) {
                alert('Error on fetching child details')
            }
        });
    })

    $('#update-child-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        if ($("#related_skills").length) {
            var selected_related_skills = $("#related_skills").chosen().val();
            selected_related_skills = selected_related_skills.join(', ');
            data += `&formatted_related_skills=${selected_related_skills}`;
        }

        resetFormSuccessMessages();
        resetErrors('update-child-form');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: data,
            success: function (data) {

                if (data.success) {
                    $('#update-child-form').parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                    $('.success_message_container .success_message').html(data.message)
                    $('.success_message_container').show();
                }
            },
            error: function (err) {
                resetFormSuccessMessages();
                $.each(err.responseJSON.errors, function (key, value) {
                    $(`#update-child-form #child-${key}`).addClass('is-invalid');
                    $(`#update-child-form #child-${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#update-child-form #${key}_error`).html(value).show();
                });
            }
        });
    })

    function populateChildFormField(data) {
        console.log(data)
        console.log(moment(data.birthdate).format('yyyy-MM-DD'));
        $('.delete-profile-btn').attr('data-child-id', data.id);
        $('#update-child-id').val(data.id);
        $('#update-child-full_name').val(data.full_name);
        $('#update-child-school').val(data.school);
        $('#update-child-relationship').val(data.relationship);
        $("#update-child-relationship").selectmenu("refresh");
        $('#update-child-gender').val(data.gender);
        $("#update-child-gender").selectmenu("refresh");

        $('#update-child-birthdate').val(data.birthdate);
        $('#update-child-spoken_language').val(data.spoken_language);
        $('#update-child-country_of_residency').val(data.country_of_residency);
        $('#update-child-country_of_residency').selectmenu("refresh");
        if (data.spoken_language) {
            var language_arr = data.spoken_language.split(", ")
            $.each(language_arr, function (i) {
                $('.spoken_language_selection').each(function (k, v) {
                    if ($(this).val() === language_arr[i]) {
                        $(this).prop('checked', true);
                    }
                    console.log(this);
                })
                console.log(language_arr[i]);
            });
        }

        console.log($('#child-birthdate').val())

    }

    /*  ==========================================
        Update Profile
    *   ========================================== */
    $('#update-profile-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        if ($("#related_skills").length) {
            var selected_related_skills = $("#related_skills").chosen().val();
            selected_related_skills = selected_related_skills.join(', ');
            data += `&formatted_related_skills=${selected_related_skills}`;
        }

        resetFormSuccessMessages();
        resetErrors('update-profile-form');
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            dataType: "json",
            data: data,
            success: function (data) {

                if (data.success) {
                    $('#update-profile-form').parents('.modal-content').find('.update-profile-form-back-btn').addClass('submit-success')
                    $('.success_message_container .success_message').html(data.message)
                    $('.success_message_container').show();
                }
            },
            error: function (err) {
                resetFormSuccessMessages();
                $.each(err.responseJSON.errors, function (key, value) {
                    $(`#${key}`).addClass('is-invalid');
                    $(`#${key}`).parents('.form-group:first').find('label').addClass('text-danger');
                    $(`#${key}_error`).html(value).show();
                });
            }
        });
    })

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




/*  ==========================================
SHOW UPLOADED IMAGE NAME
* ========================================== */

// var infoArea = document.getElementById( 'upload-label' );

// input.addEventListener( 'change', showFileName );
// function showFileName( event ) {
  // var input = event.srcElement;
  // var fileName = input.files[0].name;
  // infoArea.textContent = 'File name: ' + fileName;
// }
});


//justin

$(document).on('keypress',function(e) {
      if (e.key === 'Enter' || e.keyCode === 13) {
             if(global_enter_val == "select_school")
             {
                $('#selected-role').click();

             }
      }
});


$('#teacher-additional-info').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
         $('#cont_teacher_profile_btn').click();
  }
});


$('#school-additional-info').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
         $('#cont_school_btn').click();
  }
});


$('#school-profile-picture').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
         $('#cont_school_btn').click();
  }
});



$('#student-additional-info').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
    $('#cont_learner_profile_btn').click();
  }
});

$('#student-additional-info').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
    $('#cont_student_profile_btn').click();
  }
});




$('#tnc').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
    $('#btnAccept').click();
  }
});

$('#profile-picture').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
         $('#tnc-btn').click();
  }
});

$('#school-profile-picture').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
         $('#tnc-btn').click();
  }
});



$('#register').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
      $('#btnRegister').click();
  }
});

$('#select-role').on('keypress', function (e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
      $('#selected-role').click();
  }
});



$('#forgot_email').on('keyup', function (e) {
      if (e.key === 'Enter' || e.keyCode === 13) {
        $('#btnRequest').click();
    }

 });

function ValidateEmail(email) {
  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  return expr.test(email);
};

$(document).on('click','#btnReset',function(e)
{
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var formData =  new FormData();
  var password = $('#reset_password').val();
  var password_confirmation = $('#reset_confirm').val();
  var get_token = $('#rtoken').val();
  var err_check = false;

  if(password == "")
  {
    $('#reset_password').addClass("is-invalid");
    $('#reset_password_text').addClass("text-danger");
    $('#reset_passowrd_error').show();
    $('#reset_password_error').html("This field is required");
    err_check = true;

  }
   if(password_confirmation == "")
  {
    $('#reset_confirm').addClass("is-invalid");
    $('#reset_confirm_text').addClass("text-danger");
    $('#reset_confirm_error').show();
    $('#reset_confirm_error').html("This field is required");
    err_check = true;
  }
   if(password != password_confirmation)
  {
    $('#reset_confirm').addClass("is-invalid");
    $('#reset_confirm_text').addClass("text-danger");
    $('#reset_confirm_error').show();
    $('#reset_confirm_error').html("Password doesnt match");
    err_check = true;
  }
  if(err_check == false)
  {
      formData.append('password', password);
      formData.append('password_confirmation', password_confirmation);
      formData.append('get_token', get_token);
      formData.append('_token', CSRF_TOKEN);


      $.ajax({
        type:'POST',
        url: 'register_user/ajax/reset_password',
        dataType:"json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data:formData,
        success:function(data)
        {

          if(data.error == false)
          {
            $('#reset-password').modal('toggle');
              $(".reset_f").val("");
                Swal.fire({
                icon: "success",
                title: "Reset Password",
                html: data.message,
                });

          }
          else {

                Swal.fire({
                icon: "error",
                title: "Reset Password",
                html: data.message,
                });

          }


        }

        });

  }




});

$(document).on('click','#btnRequest',function(e)
{

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var formData =  new FormData();
  var email = $('#forgot_email').val();

  formData.append('email', email);
  formData.append('_token', CSRF_TOKEN);

  $.ajax({
    type:'POST',
    url: 'register_user/ajax/forgot_request',
    dataType:"json",
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    data:formData,
    success:function(data)
    {

        if(data.error == false)
        {

          $('#password-sent').modal('toggle');
          $('#forgot-password').modal('toggle');

        }

        else {

          $('#forgot_email').addClass("is-invalid");
          $('#forgot_email_text').addClass("text-danger");
          $('#forgot_email_error').show();
          $('#forgot_email_error').html(data.message);

            // Swal.fire({
            // icon: "error",
            // title: "Forgot Password",
            // html: data.message,
            // });

      }


    }
});

});


$(document).ready(function()
{
  // localStorage.clear();
 


      var value = getWithExpiry("global_selected");
      global_selected = value
      if (global_selected != '') {
        $('.action_user[data-action=select_'+global_selected+']').trigger('click');
       
      }

      value = getWithExpiry("register_email");
      $('#register_email').val(value);
    

    
       value = getWithExpiry("register_password");
      $('#register_password').val(value);
    

 
       value = getWithExpiry("register_confirm");
      $('#register_confirm').val(value);
    

 
       value = getWithExpiry("first-name1");
      $('#first-name1').val(value);
    

  
       value = getWithExpiry("last-name1");
      $('#last-name1').val(value);
    

 
       value = getWithExpiry("contact-number2");
      $('#contact-number2').val(value);
    

  
       value = getWithExpiry("name-of-institution");
      $('#name-of-institution').val(value);
    
    
      value = getWithExpiry("cpp-about");
      $('#cpp-about').val(value);

      value = getWithExpiry("gender1");
      $('#gender1').val(value);
      $("#gender1").selectmenu("refresh");

      value = getWithExpiry("highest-education-qualification");
      $('#highest-education-qualification').val(value);
      $("#highest-education-qualification").selectmenu("refresh");

      //school
      value = getWithExpiry("NameofInstitution");
      $('#NameofInstitution').val(value);

      value = getWithExpiry("contact-number3");
      $('#contact-number3').val(value);

      value = getWithExpiry("crn");
      $('#crn').val(value);

      value = getWithExpiry("address");
      $('#address').val(value);

      value = getWithExpiry("website");
      $('#website').val(value);

      
      value = getWithExpiry("about");
      $('#about').val(value);


      value = getWithExpiry("country");
      $('#country').val(value);
      $("#country").selectmenu("refresh");

      value = getWithExpiry("no-of-teacher");
      $('#no-of-teacher').val(value);
      $("#no-of-teacher").selectmenu("refresh");

      //school

      //parent-learner

      value = getWithExpiry("first-name2");
      $('#first-name2').val(value);

      value = getWithExpiry("last-name2");
      $('#last-name2').val(value);

      
      value = getWithExpiry("contact-number1");
      $('#contact-number1').val(value);

      value = getWithExpiry("gender2");
      $('#gender2').val(value);
      $("#gender2").selectmenu("refresh");

      value = getWithExpiry("country-of-residence-1");
      $('#country-of-residence-1').val(value);
      $("#country-of-residence-1").selectmenu("refresh");
      //parent-learner

      //child

      value = getWithExpiry("child-fname");
      $('#child-fname').val(value);

      value = getWithExpiry("child_bday");
      $('#child_bday').val(value);


      value = getWithExpiry("child_school");
      $('#child_school').val(value);


      value = getWithExpiry("country-of-residence-2");
      $('#country-of-residence-2').val(value);
      $("#country-of-residence-2").selectmenu("refresh");

      value = getWithExpiry("gender3");
      $('#gender3').val(value);
      $("#gender3").selectmenu("refresh");

      value = getWithExpiry("grade");
      $('#grade').val(value);
      $("#grade").selectmenu("refresh");

      //child

});


//child

$('#child-fname').on('keyup', function (e) {
  setWithExpiry("child-fname", $(this).val(), 3600000);
});


$('#child_bday').on('change', function (e) {
  setWithExpiry("child_bday", $(this).val(), 3600000);
});

$('#child_school').on('keyup', function (e) {
  setWithExpiry("child_school", $(this).val(), 3600000);
});


$("#country-of-residence-2").selectmenu({
  change: function (event, data) {
    setWithExpiry("country-of-residence-2", $(this).val(), 3600000);
  }
});


$("#gender3").selectmenu({
  change: function (event, data) {
    setWithExpiry("gender3", $(this).val(), 3600000);
  }
});

$("#grade").selectmenu({
  change: function (event, data) {
    setWithExpiry("grade", $(this).val(), 3600000);
  }
});





//child

//parent-learner
$('#first-name2').on('keyup', function (e) {
  setWithExpiry("first-name2", $(this).val(), 3600000);
});
$('#last-name2').on('keyup', function (e) {
  setWithExpiry("last-name2", $(this).val(), 3600000);
});

$('#contact-number1').on('keyup', function (e) {
  setWithExpiry("contact-number1", $(this).val(), 3600000);
});


$("#country-of-residence-1").selectmenu({
  change: function (event, data) {
    setWithExpiry("country-of-residence-1", $(this).val(), 3600000);
  }
});

$("#gender2").selectmenu({
  change: function (event, data) {
    setWithExpiry("gender2", $(this).val(), 3600000);
  }
});
//parent-learner

//school

$('#NameofInstitution').on('keyup', function (e) {
  setWithExpiry("NameofInstitution", $(this).val(), 3600000);
});

$('#contact-number3').on('keyup', function (e) {
  setWithExpiry("contact-number3", $(this).val(), 3600000);
});

$('#about').on('keyup', function (e) {
  setWithExpiry("about", $(this).val(), 3600000);
});

$('#crn').on('keyup', function (e) {
  setWithExpiry("crn", $(this).val(), 3600000);
});

$('#address').on('keyup', function (e) {
  setWithExpiry("address", $(this).val(), 3600000);
});

$('#website').on('keyup', function (e) {
  setWithExpiry("website", $(this).val(), 3600000);
});


$("#no-of-teacher").selectmenu({
  change: function (event, data) {
    setWithExpiry("no-of-teacher", $(this).val(), 3600000);
  }
});

$("#country").selectmenu({
  change: function (event, data) {
    setWithExpiry("country", $(this).val(), 3600000);
  }
});

//school


$('#register_email').on('keyup', function (e) {
    setWithExpiry("register_email", $(this).val(), 3600000);
    // localStorage.setItem("register_email", $(this).val());
});

$('#register_password').on('keyup', function (e) {
  setWithExpiry("register_password", $(this).val(), 3600000);

});

$('#register_confirm').on('keyup', function (e) {
  setWithExpiry("register_confirm", $(this).val(), 3600000);

});

$('#contact-number2').on('keyup', function (e) {
  setWithExpiry("contact-number2", $(this).val(), 3600000);
});



$('#first-name1').on('keyup', function (e) {
  setWithExpiry("first-name1", $(this).val(), 3600000);

});

$('#last-name1').on('keyup', function (e) {
  setWithExpiry("last-name1", $(this).val(), 3600000);

});

$('#name-of-institution').on('keyup', function (e) {
  setWithExpiry("name-of-institution", $(this).val(), 3600000);
   
});

$('#cpp-about').on('keyup', function (e) {
  setWithExpiry("cpp-about", $(this).val(), 3600000);
});


$("#gender1").selectmenu({
  change: function (event, data) {
    setWithExpiry("gender1", $(this).val(), 3600000);
     
  }
});


$("#highest-education-qualification").selectmenu({
  change: function (event, data) {
    setWithExpiry("highest-education-qualification", $(this).val(), 3600000);
  }
});




function setWithExpiry(key, value, ttl) {
  const now = new Date()

  // `item` is an object which contains the original value
  // as well as the time when it's supposed to expire
  const item = {
    value: value,
    expiry: now.getTime() + ttl,
  }
  localStorage.setItem(key, JSON.stringify(item))
}

function getWithExpiry(key) {
  const itemStr = localStorage.getItem(key)

  // if the item doesn't exist, return null
  if (!itemStr) {
    return null
  }

  const item = JSON.parse(itemStr)
  const now = new Date()

  // compare the expiry time of the item with the current time
  if (now.getTime() > item.expiry) {
    // If the item is expired, delete the item from storage
    // and return null
    localStorage.removeItem(key)
    return null
  }
  return item.value
}












$(document).on('click','#home_register',function(e)
{
  
  $("#btnAccept").prop("disabled",false);
  $('.is-invalid').removeClass("is-invalid");
  $('.label_error').removeClass("text-danger");
  $('.error').hide();
});

$(document).on('click','.action_user',function(e){

  e.preventDefault();

     var action = $(this).attr('data-action');

      if(action == "open_register")
      {
        localStorage.setItem("show_modal", "register");
      }
     if(action === "select_school")
     {
  
       setWithExpiry("global_selected", "school", 3600000); 
       global_selected = "school";
      $('#tnc .back').attr('data-target', '#school-profile-picture');
     }
     if(action === "select_learner")
     {
      setWithExpiry("global_selected", "learner", 3600000); 
      global_selected = "learner";
      $('#tnc .back').attr('data-target', '#profile-picture');
     }
     if(action === "select_teacher")
     {
      setWithExpiry("global_selected", "teacher", 3600000); 
      global_selected = "teacher";
      $('#tnc .back').attr('data-target', '#profile-picture');
     }

     if(action === "cont_school_profile")
     {
      var err = false;

       var school_name = $('#NameofInstitution').val();
       var crn = $('#crn').val();
          if(school_name == "")
          {
            $('#NameofInstitution').addClass("is-invalid");
            $('#register_school_text').addClass("text-danger");
            $('#school_error').show();
            err = true;
          }

          if(crn == "")
          {
            $('#crn').addClass("is-invalid");
            $('#register_crn_text').addClass("text-danger");
            $('#crn_error').show();
            err = true;
          }

          if(err != true)
          {
           
           
           $('#school-additional-info').modal('hide');
           $('#school-profile-picture').modal('show');
           $('#school-profile-picture .back').attr('data-target', '#school-additional-info');// back action status.

          }



     }

     if(action === "cont_teacher_profile")
     {



       var first_name = $('#first-name1').val();
       var last_name = $('#last-name1').val();
       var gender  = $('#gender1').val();


       var err = false;


       if(first_name == "")
       {
          $('#first-name1').addClass("is-invalid");
          $('#register_fname1_text').addClass("text-danger");
          $('#fname1_error').show();
          err = true;
       }
       else {

          $('#first-name1').removeClass("is-invalid");
          $('#register_fname1_text').removeClass("text-danger");
          $('#fname1_error').hide();

       }

       if(last_name == "")
       {
        $('#last-name1').addClass("is-invalid");
        $('#register_lname1_text').addClass("text-danger");
        $('#lname1_error').show();
        err = true;
       }
       else
       {
        $('#last-name1').removeClass("is-invalid");
        $('#register_lname1_text').removeClass("text-danger");
        $('#lname1_error').hide();

       }

         if(gender == "0")
       {
        $('#gender1').addClass("is-invalid");
        $('#register_gender1_text').addClass("text-danger");
        $('#gender1_error').show();
        err = true;
       }
       else {
        $('#gender1').removeClass("is-invalid");
        $('#register_gender1_text').removeClass("text-danger");
        $('#gender1_error').hide();
       }

       if(err != true)
       {

        $('#profile-picture').modal('toggle');
        $('#profile-picture .back').attr('data-target', '#teacher-additional-info');
        $('#teacher-additional-info').modal('toggle');
       }





     }


     if(action === "cont_learner_profile")
     {


        var first_name = $('#first-name2').val();
        var last_name = $('#last-name2').val();
        var gender  = $('#gender2').val();

        var err = false;


        if(first_name == "")
        {
            $('#first-name2').addClass("is-invalid");
            $('#learner_fname_text').addClass("text-danger");
            $('#learner_fname_error').show();
            err = true;
        }
        else {

            $('#first-name2').removeClass("is-invalid");
            $('#learner_fname_text').removeClass("text-danger");
            $('#learner_fname_error').hide();

        }

        if(last_name == "")
        {
          $('#last-name2').addClass("is-invalid");
          $('#learner_lname_text').addClass("text-danger");
          $('#learner_lname_error').show();
          err = true;
        }
        else
        {
          $('#last-name2').removeClass("is-invalid");
          $('#learner_lname_text').removeClass("text-danger");
          $('#learner_lname_error').hide();

        }

          if(gender == "0")
        {
          $('#gender2').addClass("is-invalid");
          $('#learner_gender_text').addClass("text-danger");
          $('#learner_gender_error').show();
          err = true;
        }
        else {
          $('#gender2').removeClass("is-invalid");
          $('#learner_gender_text').removeClass("text-danger");
          $('#learner_gender_error').hide();
        }

        if(err != true)
        {

          $("#parent-additional-info").modal('toggle');
          $("#student-additional-info").modal('toggle');

        }



     }


     if(action === "cont_student_profile")
     {


        // var child_fname = $('#child-fname').val();
        // var child_lname = $('#child-lname').val();
        // var child_bday = $('#child_bday').val();
        // var gender  = $('#gender3').val();

        // var err = false;


        // if(child_fname == "")
        // {
        //     $('#child-fname').addClass("is-invalid");
        //     $('#childfname_text').addClass("text-danger");
        //     $('#childfname_error').show();
        //     err = true;
        // }
        // else {

        //     $('#child-fname').removeClass("is-invalid");
        //     $('#childfname_text').removeClass("text-danger");
        //     $('#childfname_error').hide();

        // }

        // if(child_lname == "")
        // {
        //     $('#child-lname').addClass("is-invalid");
        //     $('#childlname_text').addClass("text-danger");
        //     $('#childlname_error').show();
        //     err = true;
        // }
        // else {

        //     $('#child-lname').removeClass("is-invalid");
        //     $('#childlname_text').removeClass("text-danger");
        //     $('#childlname_error').hide();

        // }

        // if(child_bday == "")
        // {
        //   $('#child_bday').addClass("is-invalid");
        //   $('#childbday_text').addClass("text-danger");
        //   $('#childbday_error').show();
        //   err = true;
        // }
        // else
        // {
        //   $('#child_bday').removeClass("is-invalid");
        //   $('#childbday_text').removeClass("text-danger");
        //   $('#childbday_error').hide();

        // }

        //   if(gender == "0")
        // {
        //   $('#gender3').addClass("is-invalid");
        //   $('#childgender_text').addClass("text-danger");
        //   $('#childgender_error').show();
        //   err = true;
        // }
        // else {
        //   $('#gender3').removeClass("is-invalid");
        //   $('#childgender_text').removeClass("text-danger");
        //   $('#childgender_error').hide();
        // }

        // if(err != true)
        // {

          $("#profile-picture").modal('show');
          $("#profile-picture .back").attr('data-target', '#student-additional-info'); // back to child profile.
          $("#student-additional-info").modal('hide');
         
        // }



     }



     if(action === "btn_register")
         {

             global_enter_val="select_school";

             var register_email = $('#register_email').val();
             var register_password = $('#register_password').val();
             var register_confirm = $('#register_confirm').val();

             var err=false;
             
             if(register_email == "")
             {
               $('#register_email').addClass("is-invalid");
               $('#register_email_text').addClass("text-danger");
               $('#register_email_error').show();
               $('#register_email_error').html('This field is required');
               err = true;
             }
             else
             {

              $('#register_email').removeClass("is-invalid");
              $('#register_email_text').removeClass("text-danger");
              $('#register_email_error').hide();

             }

              if (!ValidateEmail($("#register_email").val())) {
               $('#register_email').addClass("is-invalid");
               $('#register_email_text').addClass("text-danger");
               $('#register_email_error').show();
               $('#register_email_error').html('Invalid email address.');
               err = true;
              }
              else {
                  $('#register_email').removeClass("is-invalid");
                  $('#register_email_text').removeClass("text-danger");
                  $('#register_email_error').hide();
              }

             if(register_password == "")
             {

              $('#register_password').addClass("is-invalid");
              $('#register_password_text').addClass("text-danger");
              $('#register_password_error').show();
              err = true;
             }
             else
             {

              $('#register_password').removeClass("is-invalid");
              $('#register_password_text').removeClass("text-danger");
              $('#register_password_error').hide();

             }

             if(register_confirm == "")
             {
              err = true;
              $('#register_confirm').addClass("is-invalid");
              $('#register_confirm_text').addClass("text-danger");
              $('#confirm_error').html("This field is required.");
              $('#confirm_error').show();

             }

             else
             {
              $('#register_confirm').removeClass("is-invalid");
              $('#register_confirm_text').removeClass("text-danger");
              $('#confirm_error').hide();

             }



             if(register_password != register_confirm)
             {
              err = true;
              $('#register_confirm').addClass("registration_error");
              $('#register_confirm_text').addClass("text-danger");
              $('#confirm_error').html("Password does not match.");
              $('#confirm_error').show();
             }


             if(err != true)
             {
              $("#select-role").modal('toggle');
              $("#register").modal('toggle');

             }

         }
  });



 $("#btnAccept").click(function() {


  // $("#btnAccept").prop( "disabled",true); // due to comment as per client feedback!

      if(global_selected == "teacher")
        {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var formData =  new FormData();

                var email = $('#register_email').val();
                var password = $('#register_password').val();
                var password_confirmation = $('#register_confirm').val();
                var first_name = $('#first-name1').val();
                var last_name = $('#last-name1').val();
                var gender  = $('#gender1').val();
                var contact_number = $('#contact-number2').val();
                var education = $('#highest-education-qualification').val();
                var institution_name = $('#name-of-institution').val();
                var country_incorporation = $('#country-of-Residence-3').val();
                var language = $('#select_lang').val();
                let description = $('#cpp-about').val();

                formData.append('select_file', $('#upload-logo')[0].files[0]);
                formData.append('_token', CSRF_TOKEN);
                formData.append('first_name', first_name);
                formData.append('last_name', last_name);
                formData.append('email', email);
                formData.append('password', password);
                formData.append('password_confirmation', password_confirmation);
                formData.append('gender', gender);
                formData.append('institution_name', institution_name);
                formData.append('contact_number', contact_number);
                formData.append('country_incorporation', country_incorporation);
                formData.append('education', education);
                formData.append('language', language);
                formData.append('description', description);

                $.ajax({
                    type:'POST',
                    url: 'register_user/ajax/register_teacher',
                    dataType:"json",
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    data:formData,
                    success:function(data)
                    {

                        if(data.error == false)
                        {
                            // Swal.fire({
                            // icon: "success",
                            // title: "Registration",
                            // html: data.message,
                            // });
                                $("#complete").modal('toggle');
                                $("#tnc").modal('toggle');
                                $(".reset_f").val("");
                                $(".reset_f").val("");
                                $('#gender1').val("0");
                                  localStorage.clear();

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
                            title: "Registration",
                            html: err_txt,
                            });
                            $("#btnAccept").prop("disabled",false);
                        }



                    }
                });

        }

        if(global_selected == "learner")
        {

        
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var formData =  new FormData();

                var email = $('#register_email').val();
                var password = $('#register_password').val();
                var password_confirmation = $('#register_confirm').val();

                var child_fname = $('#child-fname').val();
                var child_gender = $('#gender3').val();
                var child_grade = $('#grade').val();
                var child_bday = $('#child_bday').val();
                var child_country = $('#country-of-residence-2').val();
                var child_language = $('#child_language').val();
                var child_school = $('#child_school').val();

                var parent_firstname = $('#first-name2').val();
                var parent_lastname = $('#last-name2').val();
                var parent_gender = $('#gender2').val();
                var parent_contact = $('#contact-number1').val();
                var parent_country = $('#country-of-residence-1').val();
                var parent_language = $('#lang3').val();

                formData.append('select_file', $('#upload-logo')[0].files[0]);
                formData.append('email', email);
                formData.append('password', password);
                formData.append('password_confirmation', password_confirmation);

                formData.append('child_fname', child_fname);
                formData.append('child_gender', child_gender);
                formData.append('child_grade', child_grade);
                formData.append('child_bday', child_bday);
                formData.append('child_country', child_country);
                formData.append('child_language', child_language);
                formData.append('child_school', child_school);

                formData.append('parent_firstname', parent_firstname);
                formData.append('parent_lastname', parent_lastname);
                formData.append('parent_gender', parent_gender);
                formData.append('parent_contact', parent_contact);
                formData.append('parent_country', parent_country);
                formData.append('parent_language', parent_language);

                $.ajax({
                    type:'POST',
                    url: 'register_user/ajax/register_learner',
                    dataType:"json",
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    data:formData,
                    success:function(data)
                    {

                        if(data.error == false)
                        {
                            // Swal.fire({
                            // icon: "success",
                            // title: "Registration",
                            // html: data.message,
                            // });
                                $("#complete").modal('toggle');
                                $("#tnc").modal('toggle');
                                $(".reset_f").val("");
                                $(".reset_f").val("");
                                $('#gender1').val("0");
                                localStorage.clear();
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
                            title: "Registration",
                            html: err_txt,
                            });
                            $("#btnAccept").prop("disabled",false);
                        }



                    }
                });

        }


        if(global_selected == "school")
        {

          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          var email = $('#register_email').val();
          var password = $('#register_password').val();
          var password_confirmation = $('#register_confirm').val();
          var school_name = $('#NameofInstitution').val();
          var crn = $('#crn').val();
          var address = $('#address').val();
          var website = $('#website').val();
          var contact_number = $('#contact-number3').val();
          var country = $('#country').val();
          var language = $('#select_lang2').val();
          var no_of_teacher = $('#no-of-teacher').val();
          var description  = $('#about').val();


          var formData =  new FormData();


          formData.append('select_file', $('#upload')[0].files[0]);
          formData.append('email', email);
          formData.append('password', password);
          formData.append('password_confirmation', password_confirmation);
          formData.append('school_name', school_name);
          formData.append('company_registration_number', crn);
          formData.append('address', address);
          formData.append('website', website);
          formData.append('contact_number', contact_number);
          formData.append('country', country);
          formData.append('language', language);
          formData.append('no_of_teacher', no_of_teacher);
          formData.append('description', description);

          formData.append('_token', CSRF_TOKEN);


          $.ajax({
              type:'POST',
              url: 'register_user/ajax/register_school',
              dataType:"json",
              enctype: 'multipart/form-data',
              processData: false,
              contentType: false,
              data:formData,
              success:function(data)
              {

                if(data.error == false)
                {
                    // Swal.fire({
                    // icon: "success",
                    // title: "Registration",
                    // html: data.message,
                    // });
                        $("#complete").modal('toggle');
                        $("#tnc").modal('toggle');
                        $(".reset_f").val("");
                        $(".reset_f").val("");
                        $('#gender1').val("0");
                        localStorage.clear();
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
                    title: "Registration",
                    html: err_txt,
                    });
                    $("#btnAccept").prop("disabled",false);
                }


              }
          });

        }




 });


