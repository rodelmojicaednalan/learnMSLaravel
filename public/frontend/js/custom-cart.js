// js ffor cart

var id = $(this).data('id');
$(document).on('click', '#remove-cart-item', function (e) {
    removedcart($(this).data('id'));
})

function showSuccessMessage(title, message) {
    $('#upload-success-overlay .modal-title').html(title)
    $('#upload-success-overlay .modal-body .text-wrapper p').html(message)
    $('#upload-success-overlay').modal('toggle');
}

function removedcart(id){
    // var class_wrapper = $('.class-item');
    $.ajax({
        type: 'POST',
        data:{
            id:id
        },
        url: '/cart/ajax/remove',
        dataType: 'json',
        success: (response)=> {
            if(response.success){
                // console.log(response.success)
                // class_wrapper.html(getContentCart());
                // $(".class-item").load( 'getContentCart(id)' );
                getContentCart(id);
                // getContentCart();
                // $('#remove-cart-item').modal('toggle');
                // showSuccessMessage(response.title , response.message)
            }
        },
        error: function(err){
            console.log(err);
        }        
    });
}

function getContentCart(id) {
    var class_wrapper = $('#user_cart_content');
    console.log(id);

    $.ajax({
        type: 'POST',
        data: { id:id},
        url: '/cart/ajax/get_content_cart',
        success: (response) => {
            class_wrapper.empty().html(response);
            // location.hash = page;
        },
        error: function(err){
            console.log(err);
        }
    });
}




