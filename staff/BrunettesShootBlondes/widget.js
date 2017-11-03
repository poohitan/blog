$(function() {
    var hash = window.location.hash.slice(1);
    var visibleEvents = hash || "upcoming-events";
    
    $.ajax({
          url: "http://api.bandsintown.com/artists/Brunettes%20Shoot%20Blondes/events.json?api_version=2.0&date=all&app_id=poohitan",
          success: function(data) {
              var upcomingEvents = [];
              var pastEvents = [];
              
              for (var i = 0; i < data.length; ++i) {
                  var event = data[i];
                  
                  if (isPastEvent(event)) {
                      pastEvents.unshift(event);
                  }
                  else {
                      upcomingEvents.push(event);
                  }
              }
              
              renderWidget(upcomingEvents, pastEvents);
          },
          dataType: "jsonp"
        });
    
    function renderWidget(upcomingEvents, pastEvents) {
        var tumbler = $('<div id="tumbler"></div>');
        var upcomingEventsButton = $('<a href="#upcoming-events" class="tumbler" id="upcoming-events">Upcoming Events</a>');
        var pastEventsButton = $('<a href="#past-events" class="tumbler" id="past-events">Past Events</a>');
        if (visibleEvents === "upcoming-events") {
            upcomingEventsButton.addClass('active');
        }
        else {
            pastEventsButton.addClass('active');
        }
        tumbler.append(upcomingEventsButton);
        tumbler.append(pastEventsButton);
       
        var widgetView = $('#bands-in-town-widget');
        
        widgetView.append(tumbler);
        
        var upcomingEventsTable = renderEvents("upcoming-events", upcomingEvents);
        var pastEventsTable = renderEvents("past-events", pastEvents);
        
        widgetView.append(upcomingEventsTable);
        widgetView.append(pastEventsTable);
        setCSS();
        
        addEventListeners();
    } 
    
    function renderEvents(tablename, eventsList) {
        var tableHeader = $('<tr class="header"></tr>');
        tableHeader.append('<th class="date">Date</th>');
        tableHeader.append('<th class="venue">Venue</th>');
        tableHeader.append('<th class="location">Location</th>');
        if (tablename === "upcoming-events") {
            tableHeader.append('<th class="tickets">Tickets</th>');
        }
        
        var table = $('<table id="' + tablename + '"></table>');
        if (tablename !== visibleEvents) {
            table.css('display', 'none');
        }
        table.append(tableHeader);
        
        for (var i = 0; i < eventsList.length; ++i) {
            var event = renderEvent(eventsList[i]);
            table.append(event);
        }
        
        return table;
    }
    
    function renderEvent(event) {
        var eventRow = $('<tr class="event"></tr>');
        var dateItem = $('<td class="date"></td>');
        var venueItem = $('<td class="venue"></td>');
        var locationItem = $('<td class="location"></td>');
        var ticketsItem = $('<td class="location"></td>');
        
        dateItem.html(renderDate(new Date(event.datetime))); 
        eventRow.append(dateItem);
        
        venueItem.html(event.venue.name);  
        eventRow.append(venueItem);
        
        locationItem.html(event.venue.city + ", " + event.venue.country);
        eventRow.append(locationItem);
        
        if (!isPastEvent(event)) {
            ticketsItem.html('<a href=' + event.ticket_url + 
                         ' title="Tickets for ' + event.title + '">' + event.ticket_type + '</a>');
            eventRow.append(ticketsItem);
        }
        
        return eventRow;
    }
    
    function renderDate(date) {
        var dateView = $("<span></span>");
        
        var monthText;
        switch (date.getMonth()) {
            case 0: monthText = "Jan"; break;
            case 1: monthText = "Feb"; break;
            case 2: monthText = "Mar"; break;
            case 3: monthText = "Apr"; break;
            case 4: monthText = "May"; break;
            case 5: monthText = "Jun"; break;
            case 6: monthText = "Jul"; break;
            case 7: monthText = "Aug"; break;
            case 8: monthText = "Sep"; break;
            case 9: monthText = "Oct"; break;
            case 10: monthText = "Nov"; break;
            case 11: monthText = "Dec"; break;
            default: break;
        }
        
        dateView.html(date.getDate() + ' ' + monthText + ' ' + date.getFullYear());
        
        return dateView;
    }
    
    function addEventListeners() {
        $("#bands-in-town-widget a#upcoming-events").on('click', function() {
            visibleEvents = "upcoming-events";
            showUpcomingEvents();
            $('#bands-in-town-widget #tumbler a#upcoming-events').css('background-color', '#0CC9F1');
            $('#bands-in-town-widget #tumbler a#upcoming-events').css('color', '#fff');
            $('#bands-in-town-widget #tumbler a#past-events').css('background-color', '#fff');
            $('#bands-in-town-widget #tumbler a#past-events').css('color', '#000');
        });
        
        $("#bands-in-town-widget a#past-events").on('click', function() {
            visibleEvents = "past-events";
            showPastEvents();
            $('#bands-in-town-widget #tumbler a#past-events').css('background-color', '#0CC9F1');
            $('#bands-in-town-widget #tumbler a#past-events').css('color', '#fff');
            $('#bands-in-town-widget #tumbler a#upcoming-events').css('background-color', '#fff');
            $('#bands-in-town-widget #tumbler a#upcoming-events').css('color', '#000');
        });
    }
    
    function showUpcomingEvents() {
        $("#bands-in-town-widget table#past-events").fadeOut(100, function() {
             $("#bands-in-town-widget table#upcoming-events").fadeIn(100);
        });       
    }
    
    function showPastEvents() {
        $("#bands-in-town-widget table#upcoming-events").fadeOut(100, function() {
             $("#bands-in-town-widget table#past-events").fadeIn(100);
        }); 
    }
    
    function isPastEvent(event) {
        var today = new Date();
        var eventDay = new Date(event.datetime);

        if (eventDay < today) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function setCSS() {
        $('#bands-in-town-widget table').css('border-spacing', '0');
        $('#bands-in-town-widget table tr:nth-child(even)').css('background-color', '#F8F8F8');
        $('#bands-in-town-widget table td, th').css('padding', '10px 15px');
        $('#bands-in-town-widget #tumbler').css('margin-bottom', '20px');
        $('#bands-in-town-widget #tumbler a').css('text-decoration', 'none');
        $('#bands-in-town-widget #tumbler a').css('padding', '7px 12px');
        $('#bands-in-town-widget #tumbler a.active').css('background-color', '#0CC9F1');
        $('#bands-in-town-widget #tumbler a.active').css('color', '#fff');
    }
});