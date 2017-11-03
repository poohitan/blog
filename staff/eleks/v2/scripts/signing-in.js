$(function() {
      var progressBarWidth = $(".progress-bar").width();
    var step = progressBarWidth / 100;
    
    var pos = 0;
  var interval = setInterval(
        function() {
            $(".progress").css("width", pos + "px");
            pos += step;
            
            if (pos >= progressBarWidth + 1) {
                $.event.trigger({
                    type: "loadingFinished"
                });
                clearInterval(interval);
            }
        }, 1);   
    
    
    var socket = io.connect("http://chaty.st.lviv.ua");

    socket.on("connect", function() {
        console.log("socket connected");
        
        $.event.trigger({
            type: "loadingFinished"
        });
        
        socket.emit("enterChat", "testUser");
        socket.on("chatEntered", function() { });
    });
    
    $(document).on("loadingFinished", function() {
        $.ajax({
            url: "chat.html",
            context: document.body,
            dataType: "html",
            success: function(data) {      
                $("#progress-wrapper").fadeOut(300, function() {
                    $("#progress-wrapper").remove();
                    document.title = "Chat";
                    $("body").append(data);
                    $("#wrapper").fadeIn(300);   
                }); 
            }
        });
    });
});