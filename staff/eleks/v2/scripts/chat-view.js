    updateSizes();
    $(window).on("resize", updateSizes);
    
    function updateSizes() {
        $messageBoxHeight = $("#userinfo").height();
        $("#messagebox").css("height", $messageBoxHeight + "px");
        $messageBoxWidth = $("#messagebox-userinfo .container").innerWidth() - $("#userinfo").outerWidth() - $("#send-button").outerWidth() - 2; //2px because of some Chrome bug (or maybe not bug) 
        $("#messagebox").css("width", $messageBoxWidth + "px");
        
        $("#send-button").css("height", $messageBoxHeight * 0.55);
        $("#smiles-button").css("height", $messageBoxHeight * 0.45);
        
        $chatHeight = $("#wrapper").height() - $("#messagebox").height() - 30 - 50; //don't forget to remove hardcode later
        $("#chat .container").css("height", $chatHeight + "px");
        
        $usersOnlineHeight = ($("#wrapper").height() - 80) * 0.6;
        $("#users-online .container").css("height", $usersOnlineHeight + "px");
        $("#users-online .users-container").css("height", ($usersOnlineHeight - 50) + "px"); //don't forget to remove hardcode later
        
        $blackListHeight = ($("#wrapper").height() - 80) * 0.4;
        $("#black-list .container").css("height", $blackListHeight + "px");
        $("#black-list .users-container").css("height", ($blackListHeight - 50) + "px"); //don't forget to remove hardcode later
    }
    
    ///// Everything about list & tile views
    $(".button-view-mode").on("click", changeButtonViewModeState);
    
    $(".button-view-mode").on("click", 
                             function() {  
                                 var that = this;
                                 
                                 $.event.trigger({
                                     type : "viewModeChanged",
                                     parent : function() {
                                         var parentClassName = that.className.split(' ')[1];
                                         return parentClassName;
                                     }(),
                                     currentState : function() {
                                         var currentState = that.className.split(' ')[2];
                                         return currentState;
                                     }(),
                                });
                             });
    
    $(document).on("viewModeChanged", function(event) {

    });
                    
    function changeButtonViewModeState() {
        $(this).fadeOut(120, function() {
            if ($(this).hasClass("list")) {
                $(this).removeClass("list").addClass("tile");
            }
            else {
                $(this).removeClass("tile").addClass("list");
            }
        });
        $(this).fadeIn(120);
    }
    
    $(".button-view-mode").on("click", changeViewMode);
    
    function changeViewMode() {
        if ($(this).hasClass("users-online")) {
            $thisContainer = $("#users-online .users-container");
        }
        else {
            $thisContainer = $("#black-list .users-container");
        }
        
        if ($thisContainer.hasClass("list")) {
            $thisContainer.fadeOut(150, function() {
                                                 $thisContainer.removeClass("list").addClass("tile").fadeIn(150);
                                             });
            }
            else {
                $thisContainer.fadeOut(150, function() {
                                                $thisContainer.removeClass("tile").addClass("list").fadeIn(150);
                                             });
            }
    }
    
    ///////////////////////////////////////////////
    
    function showUser(user) {
        var userView = $('<div class="user"></div>');
        var avatarView = $('<div class="avatar"><img border="0" alt="' + user.name + '" src="' + user.avatarPath + '"/></div>');
        var usernameView = $('<span class="username">' + user.name + '</span>');
        
        $(userView).append(avatarView).append(usernameView);
        $("#users-online .users-container").append(userView);
        
        $.event.trigger({
            type: "userAdded"
        });
    }

//Drag'n'drop
$(document).on("userAdded", function() {
    $(".user").draggable({
        appendTo: "#wrapper",
        containment: 'window',
        delay: 100,
        helper: function() {
            $copy = $(this).clone();
            $copy.removeClass("user");
            $copy.addClass("user-drag-helper");
            return $copy;
        },
        revert : "invalid",
        revertDuration : 100,
        scroll : false,
        stack: ".user",
        start: function() {
            $(this).addClass("dragging");
        },
        stop: function() {
            $(this).removeClass("dragging");
        },
        zIndex: 999
    });
});

$("#users-online").droppable({
    accept: "#black-list .user",
    hoverClass: "drop-hover",
  //  scope: "users",
    tolerance: "intersect",
    drop: function(event, ui) {
        $("#users-online .users-container").append(ui.draggable);
    }
});
$("#black-list").droppable({
    accept: "#users-online .user",
    hoverClass: "drop-hover",
    tolerance: "intersect",
    drop: function(event, ui) {
        console.log(ui.draggable);
        $("#black-list .users-container").append(ui.draggable);
    }
});