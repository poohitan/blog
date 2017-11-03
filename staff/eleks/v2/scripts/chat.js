//////////////////////////////////////////////////// VIEW //////////////////////////////////////////////////// 

updateSizes();
    $(window).on("resize", updateSizes);
    
    function updateSizes() {
        $messageBoxHeight = $("#userinfo").height() - 2; //2px for borders
        $("#messagebox").css("height", $messageBoxHeight + "px");
        $messageBoxWidth = $("#messagebox-userinfo .container").innerWidth() - $("#userinfo").outerWidth() - $("#send-button").outerWidth() - 2; //2px because of some Chrome bug (or maybe not bug) 
        $("#messagebox").css("width", $messageBoxWidth + "px");
        
        $("#send-button").css("height", $messageBoxHeight * 0.55);
        $("#smiles-button").css("height", $messageBoxHeight * 0.45);
        
        $chatHeight = $("#wrapper").height() - $("#messagebox").height() - 30 - 50; //don't forget to remove hardcode later
        $("#chat .container").css("height", $chatHeight + "px");
        
        $usersOnlineHeight = ($("#wrapper").height() - 30 - 50) * 0.6; //don't forget to remove hardcode later
        $("#users-online .container").css("height", $usersOnlineHeight + "px");
        $("#users-online .users-container").css("height", ($usersOnlineHeight - 50) + "px"); //don't forget to remove hardcode later
        
        $blackListHeight = ($("#wrapper").height() - 30 - 50) * 0.4; //don't forget to remove hardcode later
        $("#black-list .container").css("height", $blackListHeight + "px");
        $("#black-list .users-container").css("height", ($blackListHeight - 50) + "px"); //don't forget to remove hardcode later
    }
    
    // Everything about list & tile views
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

    //Smiles
    $("#smiles-button").on("click", function() {
        if ($("#smiles").css("display") == "none") {
            $("#smiles").fadeIn(100);
        }
        else {
            $("#smiles").fadeOut(100);
        }        
    });

    $("#messagebox-text").on("focus", function() { $("#smiles").fadeOut(150); });
    
    ///////////////////////////////////////////////
    
    function showUser(user) {
        var userView = $('<div class="user ' + user.name.replace(/\s+/g, '-') + '"></div>');
        var avatarView = $('<div class="avatar"><img border="0" alt="' + user.name + '" src="' + user.avatarPath + '"/></div>');
        var usernameView = $('<span class="username">' + user.name + '</span>');
        
        $(userView).append(avatarView).append(usernameView);
        $("#users-online .users-container").append(userView);
        
        $.event.trigger({
            type: "userAdded"
        });
    }

    function showMessage(message) {
        var messageView = $('<div class="message"></div>');
        var messageDetailsView = $('<div class="message-details"></div>');
        var senderView = $('<span class="sender ' + message.sender.name.replace(/\s+/g, '-') + '">' + message.sender.name + '</span>');
        var datetimeView = $('<span class="datetime">' + formatDatetime(new Date) + '</span>');
        var messageBodyView = $('<div class="message-body">' + message.body.replace(/[\r\n]/g, "<br/>") + '</div>');
        
        $(messageDetailsView).append(senderView);
        $(messageDetailsView).append(datetimeView);
        $(messageView).append(messageDetailsView);
        $(messageView).append(messageBodyView);
        
        $("#chat .container").append(messageView);
    }

    function clearMessageBox() {
        var messageBody = $("#messagebox-text").val("");
    }

//Drag'n'drop
$(document).on("userAdded", function() {
    $(".user").draggable({
        appendTo: "#wrapper",
        containment: 'window',
        delay: 120,
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
        $("#black-list .users-container").append(ui.draggable);
    }
});

//Sending message
$("#send-message").on("click", function() {
    var message = composeMessage();
    console.log(message.body);
    sendMessage(message);
});

$("#messagebox-text").on("keydown", function(e) {
    if (e.which == 13 && !e.ctrlKey) {
        e.preventDefault();
		var message = composeMessage();
        sendMessage(message);
	}
});

$(document).on("messageSent", function(event) {
    showMessage(event.msg);
    clearMessageBox();
    
    $("#chat .container").scrollTop($("#chat .container")[0].scrollHeight);
});

//Mentioning and quoting
$(document).on("messageSent", function(e) {
    $(".sender").on("click", function(e) {
        var oldText = $("#messagebox-text").val();
        var newText = $(this).text() + ", " + oldText;
        $("#messagebox-text").val(newText);
        $("#messagebox-text").focus();
    });
});

//Other
$("#messagebox-text").on("keydown", function(e) {
    if (e.which == 13 && e.ctrlKey) {
        e.preventDefault();
        var cursorPosition = $(this).prop("selectionStart");
        var textBeforeCursor = $(this).val().substr(0, cursorPosition);
        var textAfterCursor = $(this).val().substr(cursorPosition);
        $(this).val(textBeforeCursor + "\r\n" + textAfterCursor);
        $(this).prop("selectionStart", cursorPosition + 1);
        $(this).prop("selectionEnd", cursorPosition + 1);
	}
});

//////////////////////////////////////////////////// MODEL ////////////////////////////////////////////////////

function User(name, avatarPath) {
    this.name = name;
    this.avatarPath = avatarPath;
    this.blocked = false;
    
    this.block = function() {
        this.blocked = true;
    }
    this.unblock = function() {
        this.blocked = false;
    }
}
    
var usersOnline = {
    usersList : [],
    add : function(user) {
        this.usersList.push(user);
    }
}

var blackList = {
    usersList : [],
    add : function(user) {
        this.usersList.push(user);
    }
}

var messageLoop = {
    messages : [],
    addMessage : function(message) {
        this.messages.push(message);
    }
}

function Message(sender, body, datetime) {
    this.sender = sender;
    this.body = body;
    this.datetime = datetime;
}

function composeMessage() {
    var messageBody = $("#messagebox-text").val();
    if (messageBody.length == 0) return;
    var sender = new User("Fucking-long-username", "http://poohitan.com/staff/eleks/images/mr-x.png"); // ---------------------------- hardcode
    var datetime = new Date();
    
    var message = new Message(sender, messageBody, datetime);
    return message;
}

function sendMessage(message) {
    //todo
    
    messageLoop.addMessage(message);
    
    $.event.trigger({
        type: "messageSent",
        msg: message
    });
}

function formatDatetime(datetime) {
    var hours = datetime.getHours().toString().length === 2 ? datetime.getHours() : "0" + datetime.getHours();
    var minutes = datetime.getMinutes().toString().length === 2 ? datetime.getMinutes() : "0" + datetime.getMinutes();    
    
    return hours + ":" + minutes;
}

///////////////////////// TESTING /////////////////////////
    
var JohnSmith = new User("John Smith", "https://pbs.twimg.com/profile_images/3067041794/14a9835f966ea4c9ea8716dde0480c41.png");
var MariaLassnig = new User("Maria Lassnig", "http://s3.evcdn.com/images/block/I0-001/001/527/846-4.jpeg_/maria-lassnig-46.jpeg");
var Muhammad = new User("Muhammad III as-Sadiq", "http://cdn.slidesharecdn.com/profile-photo-AbubakarSadiqMuhammad-96x96.jpg");
var SigiSchmid = new User("Sigi Schmid", "https://pbs.twimg.com/profile_images/378800000228573751/95e2f5a919c78c57c55fdff0981c446a.jpeg");
var MarkSelby = new User("Mark Selby", "http://www.peoples.ru/sport/billiards/mark_selby/selby_4.jpg");
var WilhelmSteinitz = new User("Wilhelm Steinitz", "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Wilhelm_Steinitz2.jpg/220px-Wilhelm_Steinitz2.jpg");
var MustafaDzhemilev = new User("Mustafa Dzhemilev", "http://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Mustafa_Abd%C3%BClcemil_K%C4%B1r%C4%B1mo%C4%9Flu.jpg/220px-Mustafa_Abd%C3%BClcemil_K%C4%B1r%C4%B1mo%C4%9Flu.jpg");

usersOnline.add(JohnSmith);
usersOnline.add(MariaLassnig);
usersOnline.add(Muhammad);
usersOnline.add(SigiSchmid);
usersOnline.add(MarkSelby);
usersOnline.add(WilhelmSteinitz);
usersOnline.add(MustafaDzhemilev);

for (var i = 0; i < usersOnline.usersList.length; ++i) {
    showUser(usersOnline.usersList[i]);
}

var message1 = new Message(JohnSmith, "Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп'ютерного ", new Date());
var message2 = new Message(WilhelmSteinitz, "Fuck you", new Date());
var message3 = new Message(JohnSmith, "Fuck you too", new Date());

sendMessage(message1);
sendMessage(message2);
sendMessage(message3);
