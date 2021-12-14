
var url = window.location.pathname;
var id = url.substring(url.lastIndexOf('/') + 1);
var minDate, maxDate;
 
// var max = Date.parse( $('#date-to').val()) || 0;
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex, rowData, counter ) {
    	var formatted_date = moment(rowData.date).format('YYYY-MM-DD')
      var min = Date.parse($('#date-from').val()) || 0;
	    var max = Date.parse($('#date-to').val()) || 0;
	    var date = Date.parse(formatted_date) || 0;
    //  console.log(min)
    //  console.log(max)
    //  console.log(date)
     
     
       
        if (
            ( min === 0 && max === 0 ) ||
            ( min === 0 && date <= max ) ||
            ( min <= date   && max === 0 ) ||
            ( min <= date   && date <= max )
        ) {
         
            return true;
        }
        return false;
    }
);

function getDate(str) {
    return str.split(', ')[1];
}

function formatDate(date) {

}

function updateDateToSelection(date) {
	$.ajax({
       url: '/class/live/ajax/live-list-class/'+id,
       dataType: 'json',
       success: function(data) {
          var items = [];
          $.each(data.data, function(key, val) {
          	// Check if all the past dates of the selected date
          	var selectedDate = moment(date);
            var date_option = moment(val.date);

            var dDiff = date_option.diff(selectedDate);
            if (dDiff <= 0) {
            	items.push('<option value="' + val.start_date + '">' + val.formatted_start_date + '</option>');  
            }
              
          });

          items.join('');
          $('#date-to').empty().append(items)
          $('#date-to').selectmenu("destroy").selectmenu({style: "dropdown"});
       },
      statusCode: {
         404: function() {
           alert('There was a problem with the server.  Try again soon!');
         }
       }
    });
}

// function formatDate(date, format) {
// 	// Date format should be yyyy-mm-dd
// 	// Get day name of a given date
// 	var dayname = moment(date).format('dddd');
// 	// Get formatted date from the given date
// 	var formated_date = moment(date).format(format)
// 	// Combine date components
// 	var combined_date_data = `${dayname}, ${formated_date}`;
	
// 	return combined_date_data;
// }
// url: '/class/live/ajax/live-list-class/'+id,

$(document).ready(function() {
  // var key = "class_details";
  // $.ajax({
  //   url: '/class/live/ajax/live-list-class/'+id,
  //   dataType: 'json',
  //   success: function(data) {
  //     var items = [];
  //     // items.push('<option>Select value</option>')
  //     $.each(data.data, function(key, val) {
  //           console.log(key);

  //           items.push('<option value="' + val.live_schedule.start_date + '">' + val.formatted_start_date + '</option>');    

  //         });
  //         items.join('');
  //         $('#date-from').append(items)
  //      },
  //     statusCode: {
  //        404: function() {
  //          alert('There was a problem with the server.  Try again soon!');
  //        }
  //      }
  //   });

    

    // Create date inputs
    // alert($('#date-from-button .ui-selectmenu-text').text());
    //  maxDate = new DateTime( $('#date-from-button .ui-selectmenu-text').text() , {
    //     format: 'ddd, dd MM YYYY'
    // });
   
    // maxDate = new DateTime($('#date-from-button .ui-selectmenu-text').text(), {
    //     format: 'ddd, dd MM YYYY'
    // });

    // var date = maxDate.getFullYear()+'-'+(maxDate.getMonth()+1)+'-'+maxDate.getDate();
    // console.log(maxDate.date());
    // DataTables initialisation
    // var table = $('#time-table').DataTable();
    // 
    var table = $('#time-table').DataTable( {
    	language: {
	      emptyTable: "No classes selected"
	    },
    	paging: false,
    	scrollCollapse: true,
    	scrollY: '50vh',
    	scrollX: true,
        ajax: {
             url: '/class/live/ajax/live-list-class/'+id,
            dataSrc : 'data'
           
        },
        columns: [
            { data: 'programmes_details.title' },
            { data: 'live_schedule.start_date' },
            { data: 'live_schedule.start_time' },
            // { data: "time" },
        ],
        columnDefs: [
        {
            "targets": 0,
            "render": function (data, type, row) {
                var title_content = `
            		<div class="pretty p-default p-round">
                        <input type="radio" name="radio1">
                        <div class="state">
                          <label>${data}</label>
                        </div>
                  	</div>`;
                return title_content;
            }
        },{
            "targets": 1,
            "render": function (data, type, row) {
                return `<span data-date="${row.live_schedule.start_date}">${row.live_schedule.start_date}</span>`;
                // return `<span data-date="${row.live_schedule.start_date}">${row.formatted_start_date}</span>`;
            }
        },{
            "targets": -1,
            "render": function (data, type, row) {
                
            		return `<span data-date="${row.live_schedule.start_time}">${row.live_schedule.start_time} - ${row.live_schedule.end_time}</span>`;
                // return `<span data-date="${row.start_time}">${row.formatted_start_time} - ${row.formatted_end_time}</span>`;
               
            }
    	}],
      createdRow: function( row, data, dataIndex ) {
        $('td', row).eq(0).css('min-width', '145px');
		    $('td', row).eq(1).css('min-width', '110px');
		    $('td', row).eq(2).css('min-width', '150px');
		    // $('td', row).eq(3).css('min-width', '100px');
	  	}
    } );
    
    

   

 	$("#date-from").selectmenu({
        change: function (event, ui) {
        	table.draw();
        	updateDateToSelection($(this).val())
        }
    });

    $("#date-to").selectmenu({
      change: function (event, ui) {
        table.draw();
        // updateDateToSelection($(this).val())
      }
  });
    
  
});