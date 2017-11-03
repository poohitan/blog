// ############### GLOBAL VARIABLES ###############

var backEndURL = "http://chaty.st.lviv.ua:5000";
var socket;
var thisUser;
var windowFocused;
    
$(window).on("focus", function() {
    windowFocused = true;
});
$(window).on("blur", function() {
    windowFocused = false;
});

$(window).on("unload", logOut);

// ############### LOGIN FORM ###############

    $("#login").on("click", function(event) { event.preventDefault(); logIn(); });
    
    function validateForm() {
        var nameIsOk = validateName() ? true : false;
        var sexIsOk = validateSex() ? true : false;
        var photoIsOk = validatePhoto() ? true : false;
        
        if (nameIsOk && sexIsOk && photoIsOk) {
            return true;
        }
    }
    
    var userStartedTyping = false;
    var userTyped = false;
    
    //Name input validation
    $("#input-name").on("input", function() {
        errorTipUserAlreadyLoggedIn.hide();
        $("#input-name").removeClass("bad-input");
        
        userStartedTyping = true;
        if ($(this).val().length > 3) {
            userTyped = true;
        }
        if (userTyped) {
            validateName.call($("#input-name"));
        }
    });
    $("#input-name").on("blur", function() {
        errorTipUserAlreadyLoggedIn.hide();
        $("#input-name").removeClass("bad-input");
        if (userStartedTyping) {
            validateName.call($("#input-name"));
        }
    });
    
    //Sex radiobuttons validation
    $("#input-male").on("click", validateSex);
    $("#input-female").on("click", validateSex);
    
    //File input validation   
    $("#input-photo").on("change", function() {
        $(".photo .filename").remove();
        validatePhoto();
    });
    
    
    //Validation functions
    function validateName() {
        var inputName = $("#input-name");
        
		var name = inputName.val();
        var nameLength = inputName.val().length;
        
        if (nameLength === 0) {
            inputName.addClass("bad-input");
            errorTipNameTooShort.hide();
            errorTipBadSymbols.hide();
            errorTipEmptyName.show();
            return false;
        }
        else {
            errorTipEmptyName.hide();
            inputName.removeClass("bad-input");
        }
        
        if (nameLength > 0 && nameLength < 4) {
            inputName.addClass("bad-input");      
            errorTipBadSymbols.hide();
            errorTipNameTooShort.show();
            return false;
        }
        else {
            inputName.removeClass("bad-input");
            errorTipNameTooShort.hide();
        }
        
        if (nameLength > 20) {
            inputName.addClass("bad-input");       
            errorTipNameTooLong.show();
            return false;
        }
        else {
            inputName.removeClass("bad-input");
            errorTipNameTooLong.hide();
        }
        
        var allowedSymbols = /^[\w-\s\u0400-\u0520]+$/;
        
		if (!allowedSymbols.test(name)) {
			inputName.addClass("bad-input");       
            errorTipBadSymbols.show();	
            return false;
		}
		else {
			inputName.removeClass("bad-input");
            errorTipBadSymbols.hide();
		}
        
        return true;
    }
    
    function validateSex() {
        if ($("#input-male").is(":checked") || $("#input-female").is(":checked")) {
            $("#input-sex").removeClass("bad-input");
            errorTipNoSexChosen.hide();
            return true;
        }
        else {
            $("#input-sex").addClass("bad-input");
            errorTipNoSexChosen.show();
            return false;
        }
    }
    
    function validatePhoto() {
        var that = $("#input-photo")[0];
        var extensions = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)/i;
        
        if (that.files.length <= 0) {
            $(".file-upload").addClass("bad-input");
            errorTipNotSelectedImage.show();
            return false;
        }
        else {
            var filesize = Math.floor(that.files[0].size / 1024);
            var filename = that.files[0].name;
            $(".file-upload").removeClass("bad-input");
            errorTipNotSelectedImage.hide();
        }
        
        if(!extensions.test(filename)) {
            $(".file-upload").addClass("bad-input");
            errorTipBadFileType.show();
            return false;
        }
        else {
            $(".file-upload").removeClass("bad-input");
            errorTipBadFileType.hide();
        }
        
        if (filesize > 500) {
            $(".file-upload").addClass("bad-input");
            errorTipTooBigImage.show();
            return false;
        }
        else {
            $(".file-upload").removeClass("bad-input");
            errorTipTooBigImage.hide();
        }
        
        $.event.trigger({
            type: "fileChoosed",
            fileName: filename
        });
        
        return true;
    }
    
    //Error tips
    
    var errorTipEmptyName = new ErrorTip(".name", "Enter some name.");
    var errorTipNameTooShort = new ErrorTip(".name", "Name can't be shorter than 4 symbols. Choose a longer one.");
    var errorTipNameTooLong = new ErrorTip(".name", "Name can't be longer than 20 symbols. Choose a shorter one.");
	var errorTipBadSymbols = new ErrorTip(".name", "Username contains forbidden symbols. Use letters, numbers and underscores only.");
    var errorTipUserAlreadyLoggedIn = new ErrorTip(".name", "User with such name is already logged in. Choose another name.");
    var errorTipNoSexChosen = new ErrorTip(".sex", "Choose your sex.");
    var errorTipNotSelectedImage = new ErrorTip(".photo", "Select an image.");
    var errorTipBadFileType = new ErrorTip(".photo", "File type must be .jpg, .png, .gif or .bmp. Select another one.");
    var errorTipTooBigImage = new ErrorTip(".photo", "Image size can't be bigger than 500 KB. Select smaller one.");

    function hideAllErrorTips() {
        $(".tip").hide();
    }
    
    $(document).on("fileChoosed", function(event) {
        $(".photo .filename").remove();
        $(".photo").append($('<span class="filename">' + event.fileName + '</span>'));
    });
    
//Whole form validation on submit 
       
    function clearLoginForm() {
        $("#input-name").val("");
        $("#input-photo")[0].value = "";
        $(".photo .filename").remove();
        $("#input-male").prop("checked", false);
        $("#input-female").prop("checked", false);
    }
//############### END LOGIN FORM ###############

    function clearMessageBox() {
        $("#messagebox-text").val("");
    }

    function clearChat() {
        $("#chat .container").html("");
    }

    function clearUsersOnline() {
        $("#users-online .users-container").html("");
    }

    function clearBlackList() {
        $("#black-list .users-container").html("");
    }


// ##########################################################################
    
    function logIn() {
        if (validateForm()) {
            var _name = $("#input-name").val();
            var _sex = $("#input-male").is(":checked") ? "male" : "female";
            
            hideLoginForm();
            hideAllErrorTips();
            showPreloader();
            document.title = "Signing in...";
            
            $.ajax({
                url: backEndURL + "/api/users/login",
                type: "POST",
                dataType: "json",
                data: { name: _name, sex: _sex },
                success: function(secureUserObject) {
                    console.log("login request success");
                    thisUser = secureUserObject;          
                    openSocket();
                },
                error: function(data) {
                    hidePreloader();      
                    showLoginForm();
                    document.title = "Sign in to chat";
                    
                    console.log("failed to login: AJAX readystate = " + data.readyState);   
                    
                    var errorTipLoginError;
                    
                    if (data.responseJSON !== undefined) {
                        errorTipLoginError = new ErrorTip(".login-button", data.responseJSON.message);
                    }
                    else if (data.readyState == 0) {
                        errorTipLoginError = new ErrorTip(".login-button", "Server is down. Try to sign in later.");
                    }  
                    else {
                         errorTipLoginError = new ErrorTip(".login-button", "Unknown error happened.");
                    }
                    errorTipLoginError.show();
                }
            });  
        }
    }
    
    function logOut() {
        $.ajax({
            url: backEndURL + "/api/users/logout",
            type: "POST",
            dataType: "json",
            data: thisUser,
            success: function(data) {
             /*   if (data.success.toString() == "true") {
                    closeSocket();
                    hideChatWindow();
                    clearLoginForm();
                    clearChat();
                    clearUsersOnline();
                    clearBlackList();
                    document.title = "Sign in to chat";
                    showLoginForm();*/
                    location.reload(true);
            }
        }); 
    }
    
    $("#logout").on("click", logOut);
    
    function openSocket() {
        console.log("socket opened");
        socket = io.connect(backEndURL);
     //   socket.socket.reconnect();
        
        socket.on("connect", function() {
            console.log("socket connected");
            
            showUsersOnline();
            hidePreloader();
            showChatWindow();
            document.title = "Chat"; 
            
            socket.emit("enterChat", thisUser);
            
            socket.on("chatEntered", function() { console.log("I'm online"); });

            socket.on("userOnline", function(userObject) {  
                notifyUserJoinedChat(userObject.name);
                showUser(userObject);
            });
            
            socket.on("userOffline", function(userObject) {
                notifyUserLeftChat(userObject.name);
                hideUser(userObject);
            });   
            
            socket.on("message", function(messageObject) {
                showMessage(messageObject);
                console.log("message received from " + messageObject.user.name);
            });
            
            socket.on("error", function(errorObject) {
                console.log("error happened");
                console.log(errorObject);
            });
        });
    }
    
    function closeSocket() {
        socket.disconnect();
        console.log("socket closed");
    }

    function notifyUserJoinedChat(username) {
        console.log("user online: " + username);
        $notification = $('<div class="notification"></div>');
        $notification.html('<span>' + username + ' joined chat</span><span class="datetime">' + formatDatetime(new Date) + '</span>');
        $("#chat .container").append($notification);
        $("#chat .container").scrollTop($("#chat .container")[0].scrollHeight);
    }

    function notifyUserLeftChat(username) {
        console.log("user offline: " + username);
        $notification = $('<div class="notification"></div>');
        $notification.html('<span>' + username + ' left chat</span><span class="datetime">' + formatDatetime(new Date) + '</span>');
        $("#chat .container").append($notification);
        $("#chat .container").scrollTop($("#chat .container")[0].scrollHeight);
    }
    
    function showChatWindow() {
        $("#wrapper").fadeIn(300);
        $("#userinfo .username").html(thisUser.name);
        updateSizes();
    }
    
    function hideChatWindow() {
        $("#wrapper").fadeOut(300);  
    }
    
    function showPreloader() {
        $("#progress-wrapper").fadeIn(300);   
    }
    
    function hidePreloader() {
        $("#progress-wrapper").fadeOut(300);  
    }
    
    function showLoginForm() {
        $(".outer-wrapper").fadeIn(300);  
    }
    
    function hideLoginForm() {
        $(".outer-wrapper").fadeOut(300);  
    }
    
    function ErrorTip(parent, message) {
        this.parent = parent;
        this.message = message;
        this.visible = false;
        var that = this;   
        var errorTip = $("<div class='tip'><span>" + this.message + "</span></div>");
        
        this.show = function() {
            if (!this.visible) {
                $(that.parent).append(errorTip);
                $(errorTip).hide();
                $(errorTip).fadeIn(200);
                this.visible = true;
            }
        }
        this.hide = function() {
            $(errorTip).fadeOut(200, function() {
                $(errorTip).remove();
            });
            this.visible = false;
        }
    }


// ############### CHAT VIEW ############### 

    $(window).on("resize", updateSizes);
    
    function updateSizes() {
        $messageBoxHeight = $("#userinfo").height() - 2; //2px for borders
        $("#messagebox").css("height", $messageBoxHeight + "px");
        $messageBoxWidth = $("#messagebox-userinfo .container").innerWidth() - $("#userinfo").outerWidth() - $("#send-button").outerWidth() - 2; //2px because of some Chrome bug (or maybe not bug) 
        $("#messagebox").css("width", $messageBoxWidth + "px");
        
        $("#send-button").css("height", $messageBoxHeight - $("#smiles-button").outerHeight() - 8);
       // $("#smiles-button").css("height", $messageBoxHeight * 0.5);
        
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
        var userView = $('<div class="user ' + prepareUsername(user.name.toString()) + '"></div>');
        var avatarView = $('<div class="avatar"><img border="0" alt="' + user.name + '" src="' + user.avatarPath + '"/></div>');
        var usernameView = $('<span class="username">' + user.name + '</span>');
        
        $(userView).append(avatarView).append(usernameView);
        $("#users-online .users-container").append(userView);
        
        $.event.trigger({
            type: "DOMUpdated"
        });
    }

    function hideUser(user) {
        $(".user." + user.name.replace(/\s+/g, '-')).remove();   
    }

    function showUsersOnline() {
        $.ajax({
            url: backEndURL + "/api/users",
            type: "GET",
            dataType: "json",
            success: function(users) {
                for (var i = 0; i < users.length; ++i) {
                    if (users[i].name != thisUser.name) {
                        showUser(users[i]);
                    }
                }
            }
        }); 
    }

    function showMessage(messageObject) {
        var messageView = $('<div class="message"></div>');
        var messageDetailsView = $('<div class="message-details"></div>');
        var self = messageObject.isYourMessage ? "self" : "";
        
        var preparedMessageBody = prepareMessageBody(messageObject.message.toString());
        var senderView = $('<span class="sender ' + self + " " + prepareUsername(messageObject.user.name.toString()) + '">' + messageObject.user.name + '</span>');
        var datetimeView = $('<span class="datetime">' + formatDatetime(new Date) + '</span>');
        var messageBodyView = $('<div class="message-body">' + preparedMessageBody + '</div>');
        
        $(messageDetailsView).append(senderView);
        $(messageDetailsView).append(datetimeView);
        $(messageView).append(messageDetailsView);
        $(messageView).append(messageBodyView);
        
        $("#chat .container").append(messageView);
        $("#chat .container").scrollTop($("#chat .container")[0].scrollHeight);
    }

function prepareMessageBody(message) {
    var preparedMessageBody = message.replace(/[\r\n]/g, "<br/>");
    
    var regExpURL = /^(([^:]+):\/\/([-\w._]+)(\/[-\w._]\?(.+)?)?)$/ig;
    var regExpURL2 = /((https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-?#"]*)*\/?$)/gi;
    var myRegExp = /^(https?:\/\/[^ ])$/gi;
    console.log(regExpURL2.test(preparedMessageBody));
  //  while (regExpURL2.test(preparedMessageBody)) {
        
        preparedMessageBody = preparedMessageBody.replace(regExpURL2, '<a href="$1">$1</a>');
  //  }
    
    return preparedMessageBody;
}

function prepareUsername(username) {
    return username.replace(/\s+/g, '-');
}

//Window title blink
function windowTitleBlinking() {
    var thisTitle = document.tile;
    if (!windowFocused) {
        document.title = "+ " + document.title;
    }
}

//Drag'n'drop
$(document).on("DOMUpdated", function() {
    $(".user").draggable({
        appendTo: "body",
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
//    console.log(message.body);
    clearMessageBox();
    sendMessage(message);
});

$("#messagebox-text").on("keydown", function(e) {
    if (e.which == 13 && !e.shiftKey) {
        e.preventDefault();
		var message = composeMessage();
        clearMessageBox();
        sendMessage(message);
	}
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
    if (e.which == 13 && e.shiftKey) {
        e.preventDefault();
        var cursorPosition = $(this).prop("selectionStart");
        var textBeforeCursor = $(this).val().substr(0, cursorPosition);
        var textAfterCursor = $(this).val().substr(cursorPosition);
        $(this).val(textBeforeCursor + "\r\n" + textAfterCursor);
        $(this).prop("selectionStart", cursorPosition + 1);
        $(this).prop("selectionEnd", cursorPosition + 1);
	}
});

// ############### CHAT MODEL ############### 

function composeMessage() {
    var messageBody = $("#messagebox-text").val();
    if (messageBody.length == 0) return;
    
    var message = {
        user: thisUser,
        message: messageBody,
        isYourMessage: true
    }
    
 //   console.log("composed message");
  //  console.log(message);
    
    return message;
}

function sendMessage(messageObject) {
    socket.emit("postMessage", messageObject);
    console.log("message " + messageObject.message + " sent");
}

function formatDatetime(datetime) {
    var hours = datetime.getHours().toString().length === 2 ? datetime.getHours() : "0" + datetime.getHours();
    var minutes = datetime.getMinutes().toString().length === 2 ? datetime.getMinutes() : "0" + datetime.getMinutes();    
    
    return hours + ":" + minutes;
}

///////////////////////// TESTING /////////////////////////
    /*
var JohnSmith = new User("John Smith", "male", "https://pbs.twimg.com/profile_images/3067041794/14a9835f966ea4c9ea8716dde0480c41.png");
var MariaLassnig = new User("Maria Lassnig", "female", "http://s3.evcdn.com/images/block/I0-001/001/527/846-4.jpeg_/maria-lassnig-46.jpeg");
var Muhammad = new User("Muhammad III as-Sadiq", "male", "http://cdn.slidesharecdn.com/profile-photo-AbubakarSadiqMuhammad-96x96.jpg");
var SigiSchmid = new User("Sigi Schmid", "male", "https://pbs.twimg.com/profile_images/378800000228573751/95e2f5a919c78c57c55fdff0981c446a.jpeg");
var MarkSelby = new User("Mark Selby", "male", "http://www.peoples.ru/sport/billiards/mark_selby/selby_4.jpg");
var WilhelmSteinitz = new User("Wilhelm Steinitz", "male", "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Wilhelm_Steinitz2.jpg/220px-Wilhelm_Steinitz2.jpg");
var MustafaDzhemilev = new User("Mustafa Dzhemilev", "male", "http://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Mustafa_Abd%C3%BClcemil_K%C4%B1r%C4%B1mo%C4%9Flu.jpg/220px-Mustafa_Abd%C3%BClcemil_K%C4%B1r%C4%B1mo%C4%9Flu.jpg");

usersOnline.add(JohnSmith);
usersOnline.add(MariaLassnig);
usersOnline.add(Muhammad);
usersOnline.add(SigiSchmid);
usersOnline.add(MarkSelby);
usersOnline.add(WilhelmSteinitz);
usersOnline.add(MustafaDzhemilev);

var message1 = new Message(JohnSmith, "Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп'ютерного ", new Date());
var message2 = new Message(WilhelmSteinitz, "Fuck you", new Date());
var message3 = new Message(JohnSmith, "Fuck you too", new Date());

sendMessage(message1);
sendMessage(message2);
sendMessage(message3);
*/