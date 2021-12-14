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
            url: '/curriculum/ajax/curriculum_list?page=' + page,
            success: (result) => {
                $('#generateCurriculum_list').empty().html(result);
            }
         
        });

    }
    
});