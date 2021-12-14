document.addEventListener('DOMContentLoaded', function() {
  var calendarEl_main = document.getElementById('calendar-main');
  var calendar_main = new FullCalendar.Calendar(calendarEl_main, {
    initialView: 'timeGridWeek',
    headerToolbar: {
      start: 'prev',
      center: 'title',
      end: 'timeGridWeek,timeGridDay,next',
    },
    views: {
        timeGridWeek: { // name of view
          titleFormat: { year: 'numeric', month: 'long', day: '2-digit' },
        },
      },
    dayHeaders: true,
    scrollTime:  '08:00:00',
    slotMinTime: '07:00:00',
    slotMaxTime: '19:00:00',
    allDaySlot: false,
    slotDuration: '00:60:00', // 1 hr
    height: 'auto',
    navLinks: false, // can click day/week names to navigate views
    editable: true,
    selectable: false,
    events: {
      url: '/frontend/js/sample-data/events.json',
      failure: function() {
      }
    },
    loading: function(bool) {
      document.getElementById('loading').style.display =
      bool ? 'block' : 'none';
    },
  });
  calendar_main.render();





// Get the auto-calendar (we have to wait the window load event)
var calendar_mini = jsCalendar.new('#mini-calendar');
  // Make changes on the month element
  calendar_mini.onMonthRender(function(index, element, info) {
    // Show month filter active
    $('.month-filter li').removeClass('active');
    $('.month-filter li').eq( index ).addClass('active');
    if($('.jsCalendar-current').length > 0 ) {
      // console.log('have length');
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

  
    // Colorful Select
      jsCalendar.prototype.colorfulSelect = function(dates, color){
        // If no arguments
        if (typeof dates === 'undefined') {
          // Return
          return this;
        }

        // If dates not array
        if (!(dates instanceof Array)) {
          // Lets make it an array
          dates = [dates];
        }

        // Save colors
        this._colorful_saveDates(dates, color);
        // Select dates
        this._selectDates(dates);

        if (!this._colorful_patched) {
          this._colorful_patched = this.refresh;
          this.refresh = function(date) {
            // Call original refresh
            this._colorful_patched(date);
            // Refresh select Colors
            this._colorful_update();
            // Return
            return this;
          };
        }
        // Refresh
        this.refresh();

        // Return
        return this;
      };

      // Save dates colors
      jsCalendar.prototype._colorful_saveDates = function(dates, color) {
        // Copy array instance
        dates = dates.slice();

        // Parse dates
        for (var i = 0; i < dates.length; i++) {
          dates[i] = jsCalendar.tools.parseDate(dates[i]);
          dates[i].setHours(0, 0, 0, 0);
          dates[i] = dates[i].getTime();
        }

        if (typeof this._colorful_colors == "undefined") {
          this._colorful_colors = {};
        }

        // Save each date color
        for (i = dates.length - 1; i >= 0; i--) {
          this._colorful_colors[dates[i]] = color;
        }
      };

      // Refresh colors
      jsCalendar.prototype._colorful_update = function() {
        // Get month info
        var month = this._getVisibleMonth(this._date);

        // Check days
        var timestamp;
        for (var i = month.days.length - 1; i >= 0; i--) {
          // If date is selected
          timestamp = month.days[i].getTime();
          if (this._selected.indexOf(timestamp) >= 0 && this._colorful_colors.hasOwnProperty(timestamp)) {
            
            // this._elements.bodyCols[i].className = 'jsCalendar-selected' + ' ' + this._colorful_colors[timestamp];
            this._elements.bodyCols[i].className = this._elements.bodyCols[i].className + ' ' + this._colorful_colors[timestamp];
          
          }
        }
      };


      
      calendar_mini.colorfulSelect('24/08/2021', 'jsCalendar-colorful-blue');
      calendar_mini.colorfulSelect('25/08/2021', 'jsCalendar-colorful-yellow');
      calendar_mini.colorfulSelect('25/08/2021', 'jsCalendar-colorful-pink');
      calendar_mini.colorfulSelect('26/08/2021', 'jsCalendar-colorful-red');
      calendar_mini.colorfulSelect('27/08/2021', 'jsCalendar-colorful-green');
      calendar_mini.colorfulSelect(['28/08/2021', '10/09/2018'], 'jsCalendar-colorful-blue');

      
        // When the user clicks on a date
      calendar_mini.onDateClick(function(event, date){
        // print_date.value = jsCalendar.tools.dateToString(date, 'YYYY-MM-DD', 'en');
        var gotoDate = jsCalendar.tools.dateToString(date, 'YYYY-MM-DD', 'en');
        calendar_main.gotoDate( gotoDate ); //2018-06-01' 
      });

      // When a user change the month
      calendar_mini.onMonthChange(function(event, date){
        var gotoDate = jsCalendar.tools.dateToString(date, 'YYYY-MM-DD', 'en');
        calendar_main.gotoDate( gotoDate ); //2018-06-01' 
      });
      
      

  // Button Today
  var button_today = document.getElementById("set-today");
  // Add a button event
  button_today.addEventListener("click", function(){
    // Set date
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output_mini = ((''+day).length<2 ? '0' : '') + day + '/' +
    ((''+month).length<2 ? '0' : '') + month + '/' +
    d.getFullYear();
    var output_main = d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
        
        calendar_mini.set(output_mini); // 01/06/2018
        calendar_main.gotoDate( output_main ); //2018-06-01' 
      }, false);
  
  // Refresh layout
  calendar_mini.refresh();

});