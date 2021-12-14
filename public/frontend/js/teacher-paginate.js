$(document).ready(function(){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.pagination a',function(event){
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        
        teacherPaginate(page);
 
    });

    function teacherPaginate(page = 1){
        let school_id = $('#school_name').data('unique'); 

        $.ajax({
            type: 'POST',
            url: '/school/ajax/'+school_id+ '?page=' +page,
            success: function(result){
                $('#generateTeacher').empty().html(result);
            }
        });
    }


})