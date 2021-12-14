$(document).ready(function(){

    $(document).on('click', '.pagination a',function(event){
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];

        generateClasslist(page);
    });

    function generateClasslist(page){

        $.ajax({

            type: 'POST',
            url: '/classes/ajax/class_list?page=' + page,
            success: (result) => {
                $('#generateClass_list').empty().html(result);
            }
         
        });

    }
    
});