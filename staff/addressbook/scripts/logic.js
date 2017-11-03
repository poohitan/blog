var letters = [];
var receivers = [];

$(function() {
    $('.letter').draggable();
    
    $.ajax({
      dataType: "json",
      url: "receivers.json",
      success: function(_receivers) {
          receivers = _receivers;
          for (var i = 0; i < receivers.length; ++i) {
                letters.push(new Letter(receivers[i]));
                  
                positionLetters();  
                showLetters();
            }
      },
      error: function() {
          console.log("failed");
      }
    });
});

$(document).on("letterAdded", function() {
    $('.letter').draggable();
});

$(document).on("keydown", function(event) {    
    if (event.key == "s") {
        event.preventDefault();
        sortLetters();
    }
});

$(window).on("resize", positionLetters);

function positionLetters(horizontalPosition, verticalPosition) {
    if (horizontalPosition == null || verticalPosition == null) {
        var horizontalPosition = $(window).width() / 2;
        var verticalPosition = $(window).height() / 2;
    }
    
    for (var i = 0; i < letters.length; ++i) {
        if (letters[i] != null) {
            var letterWidth = $(letters[i].view).width();
            var letterHeight = $(letters[i].view).height();
            $(letters[i].view).css("left", horizontalPosition - letterWidth / 2);
            $(letters[i].view).css("top", verticalPosition - letterHeight / 2);
        }
    }
}

function Letter(receiver) {
    this.maxRotationDeegree = 6;
    this.rotationDegree = Math.random() * (this.maxRotationDeegree - (-this.maxRotationDeegree)) + (-this.maxRotationDeegree);
    
    this.view = $('<div class="letter"></div>');
    this.view.css("transform", "rotate(" + this.rotationDegree + "deg)");
    var receiverView = generateReceiverView(); 
    this.view.append(receiverView);
    
    this.show = function() {
        $('body').append(this.view);
        $.event.trigger({
            type: "letterAdded"
        });
    }
    
    this.rotate = function(maxDegree) {
        var degree = Math.random() * (maxDegree - (-maxDegree)) + (-maxDegree);
        this.view.css("transform", "rotate(" + degree + "deg)");
    }
    
    this.view.on("mousedown", function() {
        $('.letter').each(function() {
            var currentZIndex = $(this).css('z-index');
            var newZIndex = currentZIndex - 1;
            $(this).css('z-index', newZIndex);
        });
        
        $(this).css("z-index", 9999);
    });
    
    function generateReceiverView() {
        var receiverView = $('<div class="receiver"></div>');
        var list = $('<ul></ul>');
        var rows = [];
        
        rows[0] = generateNameAndSurnameView();
        rows[1] = generateStreetView();
        rows[2] = generateCityRegionAndCountryView();
        rows[3] = generateZipCodeView();
        
        for (var i = 0; i < rows.length; ++i) {
            if (i == 0 && rows.length < 5) {
                list.append('<li>&nbsp;</li>');
            }
            list.append(rows[i]);
        }
        
        function generateNameAndSurnameView() {
            return $('<li>' + receiver.name + ' ' + receiver.surname + '</li>');
        }
        
        function generateStreetView() {
            var row = $('<li>' + receiver.street + ', ' + receiver.house + '/' + receiver.appartment + '</li>');
            return row;
        }
        
        function generateCityRegionAndCountryView() {
            var row = $('<li></li>');
            row.append(receiver.city + ', ');
            if (receiver.region != "" && receiver.region != null) {
                row.append(receiver.region + ', ');
            }
            row.append(receiver.country);
            return row;
        }
        
        function generateZipCodeView() {
            return $('<li>' + receiver.zipcode + '</li>');
        }
        
        receiverView.append(list);
        return receiverView;
    }
}

function sortLetters() {
    positionLetters();
    for (var i = 0; i < letters.length; ++i) {
        if (letters[i] != null) {
            letters[i].rotate(1);
        }
    }
}

function showLetters() {
    for (var i = 0; i < letters.length; ++i) {
        if (letters[i] != null) {
            letters[i].show();
        }
    }
}