document.addEventListener('DOMContentLoaded', function() {
    var calendarEl_main = document.getElementById('calendar-main');

    var calendar_main = new FullCalendar.Calendar(calendarEl_main, {
      // initialDate: '2021-08-18',
      initialView: 'timeGridWeek',
      headerToolbar: {
        left: '',
        center: 'title',
        right: ''
      },
      views: {
        timeGridWeek: { // name of view
          titleFormat: { year: 'numeric', month: 'long', day: '2-digit' },
      // titleFormat: 'MMMM D, YYYY' // you can now use moment format strings!
      // other view-specific options here

      },


},
  dayHeaderFormat:{ weekday: 'long', day: 'numeric', omitCommas: true },
  // eventContent: { html: '<i>Art Class - Grade 3</i><br>09:00 - 10:00' },
  scrollTime:  '08:00:00',
  

  // slotMaxTime: '15:00:00',
  
  allDaySlot: false,
  slotDuration: '00:60:00', // 1 hr
    height: 'auto',
      navLinks: false, // can click day/week names to navigate views

      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      events: [
        {
          title: 'Art Class - Grade 3',
          start: '2021-08-19T13:00:00',
          end: '2021-08-19T14:00:00',
          constraint: 'businessHours'
        },
        {
          title: 'Art Class - Grade 2',
          start: '2021-08-19T11:00:00',
          end: '2021-08-19T12:00:00',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
        {
          title: 'Conference',
          start: '2021-08-18',
          end: '2021-09-20'
        },
        {
          title: 'Party',
          start: '2021-09-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
          groupId: 'availableForMeeting',
          start: '2021-09-11T10:00:00',
          end: '2021-09-11T16:00:00',
          display: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2021-09-13T10:00:00',
          end: '2021-09-13T16:00:00',
          display: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2021-09-24',
          end: '2021-09-28',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        },
        {
          start: '2021-09-06',
          end: '2021-09-08',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        }
      ]
      // height: 'auto',
      // navLinks: false, // can click day/week names to navigate views
      // editable: true,
      // selectable: true,
      // selectMirror: true,
      // nowIndicator: true,
      // events: [
      //   {
      //     title: 'All Day Event',
      //     start: '2020-09-01',
      //      allDay: false
      //   },
      //   {
      //     title: 'Long Event',
      //     start: '2020-09-07',
      //     end: '2020-09-10'
      //   },
      //   {
      //     groupId: 999,
      //     title: 'Repeating Event',
      //     start: '2020-09-09T16:00:00'
      //   },
      //   {
      //     groupId: 999,
      //     title: 'Repeating Event',
      //     start: '2020-09-16T16:00:00'
      //   },
      //   {
      //     title: 'Conference',
      //     start: '2020-09-11',
      //     end: '2020-09-13'
      //   },
      //   {
      //     title: 'Meeting',
      //     start: '2020-09-12T10:30:00',
      //     end: '2020-09-12T12:30:00'
      //   },
      //   {
      //     title: 'Lunch',
      //     start: '2020-09-12T12:00:00'
      //   },
      //   {
      //     title: 'Meeting',
      //     start: '2020-09-12T14:30:00'
      //   },
      //   {
      //     title: 'Happy Hour',
      //     start: '2020-09-12T17:30:00'
      //   },
      //   {
      //     title: 'Dinner',
      //     start: '2020-09-12T20:00:00'
      //   },
      //   {
      //     title: 'Birthday Party',
      //     start: '2020-09-13T07:00:00'
      //   },
      //   {
      //     title: 'Click for Google',
      //     url: 'http://google.com/',
      //     start: '2020-09-28'
      //   }
      // ]
    });

    calendar_main.render();
});



// Get the auto-calendar (we have to wait the window load event)
	var calendar_mini = jsCalendar.new('#mini-calendar');
	// Make changes on the month element
	calendar_mini.onMonthRender(function(index, element, info) {
		// Show month filter active
    $('.month-filter li').removeClass('active');
    $('.month-filter li').eq( index ).addClass('active');
     if($('.jsCalendar-current').length > 0 ) {
      console.log('have length');
      $('.jsCalendar-current').parent('tr').addClass('jsCalendar-current-row');
    }
    else {
      $('.jsCalendar-current-row').removeClass('jsCalendar-current-row');
    }
     
   
	});
	// Make changes on the day name elements
	calendar_mini.onDayRender(function(index, element, info) {
    if($('.jsCalendar-current').length > 0 ) {
      $('.jsCalendar-current').parent('tr').addClass('jsCalendar-current-row');
    }
		
	});

 
  // Select days on load

  // Colors for my event marks
      var colors = [
        '#52c9ff', // Blue
        '#ffe31b', // Yellow
        '#ffb400', // Orange
        '#f6511d', // Red
        '#7fb800', // Green
        '#9c27b0'  // Purple
      ];
      events = [
        "25/08/2021",
        "26/08/2021",
        "29/08/2021",
        "31/08/2021"
      ];
  


      // On click on a date, add random color event mark
      calendar_mini.onDateClick(function(event, date) {
        // Select random color
        var color = colors[Math.floor(Math.random() * colors.length)];
        calendar_mini.addEventMarks(date, color);
        //calendar.removeEventMark(date, clear_colors.value);
      });
      

  // Button Today
  var button_today = document.getElementById("set-today");
  // Add a button event
  button_today.addEventListener("click", function(){
    // Set date
      var d = new Date();
      var month = d.getMonth()+1;
      var day = d.getDate();
      var output = ((''+day).length<2 ? '0' : '') + day + '/' +
       ((''+month).length<2 ? '0' : '') + month + '/' +
        d.getFullYear();
        calendar_mini.set(output);
      }, false);
	
	// Refresh layout
	calendar_mini.refresh();