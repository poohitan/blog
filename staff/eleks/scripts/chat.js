//TODO: 
//1. Bold and italic on Ctrl+B, Ctrl+I //done
//2. Smiles //done
//3. Search by username in users-online and black list //done
//4. Images upload //done
//5. Remove hardcode, bydlocode and code dublication //impossible
//6. Split code with required.js
//6. Fix bugs with localstorage //almost done

// ############### GLOBAL VARIABLES AND EVENTS ###############

var chatName = "Chat";
var backEndURL = "http://obscure-gorge-3432.herokuapp.com";
var socket;
var thisUser = {};
var windowFocused = true;
var isTitleBlinking = false;
var titleBlinkingInterval = 0;
var clickedLogOutButton = false;
var itIsEaster = false;
var copiedMessage = {
    sender: "",
    text: "",
    datetime: ""
};
    
$(window).on("focus", function() {
    windowFocused = true;
    console.log("window focused");
    if (isTitleBlinking) {
        clearInterval(titleBlinkingInterval);
        console.log("blinking interval " + titleBlinkingInterval);
    }
    isTitleBlinking = false;
    document.title = chatName;
});

$(window).on("blur", function() {
    console.log("window blured");
    windowFocused = false;
});

$(window).on("load", function() {
  //  localStorage.clear();
    thisUser.id = localStorage["thisUserID"] || "";
    thisUser.name = localStorage["thisUserName"] || "";
    thisUser.sex = localStorage["thisUserSex"] || "";
    thisUser.imageUrl = localStorage["image"] || "";
    
    if (thisUser.id != "") {
        console.log("logging in user from localstorage");
        hideLoginForm();
        openSocket(thisUser);
    }
  /*  $.ajax({
        url: backEndURL + "/api/users/authorize",
        type: "POST",
      //  data: null, 
        dataType: "json",
        success: function(secureUserObject) {
            thisUser = secureUserObject;
            hideLoginForm();
            openSocket(thisUser);
        },
        error: function(data) {  
            console.log(data.responseJSON.message);
        }
    });*/
});

$(window).on("unload", function() {
    if (!clickedLogOutButton) {
        localStorage["thisUserID"] = thisUser.id;
        localStorage["thisUserName"] = thisUser.name;
        localStorage["thisUserSex"] = thisUser.sex;
        localStorage["image"] = thisUser.imageUrl;
        
        console.log("saved user to localstorage");
    }
  //  closeSocket();
});

$("body").on("click", function() {
    $("#smiles").hide();
});

// ############### /GLOBAL VARIABLES AND EVENTS ###############

// ############### LOGIN FORM ###############

    //MODEL

    function logIn() {
        if (validateForm()) {
            var _name = $("#input-name").val();
            var _sex = $("#input-male").is(":checked") ? "male" : "female";
            var _image; // = $("#input-photo")[0].files[0];
            
            hideLoginForm();
            hideAllErrorTips();
            showPreloader();
            
            console.log("logging in");
            
            var fr = new FileReader();
            fr.readAsDataURL($("#input-photo")[0].files[0]);
            fr.onload = function(event) {
                _image = event.target.result;
                
                 $.ajax({
                    url: backEndURL + "/api/users/login",
                    type: "POST",
                    dataType: "json",
                  //  contentType: "application/json",
                    data: { name: _name, sex: _sex, image: _image },
                    success: function(secureUserObject) {
                        console.log("login request success");

                        thisUser = secureUserObject; 
                        console.log("logging in new user");
                        openSocket(thisUser);
                    },
                    error: function(data) {
                        hidePreloader();      
                        showLoginForm();

                        console.log("failed to login: AJAX readystate = " + data.readyState);   
                        console.log(data);

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
            };
        }   
    }
    
    function validateForm() {
        var nameIsOk = validateName() ? true : false;
        var sexIsOk = validateSex() ? true : false;
        var photoIsOk = validatePhoto() ? true : false;
     //   var photoIsOk = true; ////////////////////////////////////////////////////////////
        
        if (nameIsOk && sexIsOk && photoIsOk) {
            return true;
        }
    }
    
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
        
        console.log(that.files[0]);
        
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
        
        console.log("photo validated");
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

    function ErrorTip(owner, message) {
        this.owner = owner;
        this.message = message;
        this.visible = false;
        var that = this;   
        var errorTip = $("<div class='tip'><span>" + this.message + "</span></div>");
        
        this.show = function() {
            if (!this.visible) {
                $(that.owner).append(errorTip);
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

    //END MODEL

    //VIEW

    $("#login").on("click", function(event) { event.preventDefault(); logIn(); });

    function showLoginForm() {
        $("#outer-wrapper").fadeIn(300);  
        document.title = "Sign in to chat";
    }
    
    function hideLoginForm() {
        $("#outer-wrapper").fadeOut(300);  
    }

    var userStartedTyping = false;
    var userTyped = false;
    
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

    function hideAllErrorTips() {
        $(".tip").hide();
    }

    function clearLoginForm() {
        $("#input-name").val("");
        $("#input-photo")[0].value = "";
        $(".photo .filename").remove();
        $("#input-male").prop("checked", false);
        $("#input-female").prop("checked", false);
        $(".photo .avatar .obj").attr("src", "images/mr-x.png");
       // $("#input-file")[0].files.clear();
    }

    $(document).on("fileChoosed", function(event) {
        $(".photo .filename").remove();
        $(".photo").append($('<span class="filename">' + event.fileName + '</span>'));
        
        var file = $("#input-photo")[0].files[0];
        var imageType = /image.*/;
        
        var img = $("#login-form .avatar").children("img")[0];
        img.classList.add("obj");
        img.file = file;

        var reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    });

    $(".line.photo").on("dragenter", function(event) {
        event.originalEvent.stopPropagation();
        event.originalEvent.preventDefault();
        event.stopPropagation();
        event.preventDefault();
        
        $(this).addClass("drop-hover");
    });

    $(".line.photo").on("dragend", function(event) {
        $(this).removeClass("drop-hover"); 
    });

    $(".line.photo").on("drop", function(event) {
        event.originalEvent.stopPropagation();
        event.originalEvent.preventDefault();
        event.stopPropagation();
        event.preventDefault();
        console.log(event.originalEvent.dataTransfer);
        
        $.event.trigger({
            type: "fileChoosed",
            fileName: event.originalEvent.dataTransfer.files[0].fileName
        });
    });

/*document.querySelector(".line.photo").addEventListener("drop", function(event) {
    event.stopPropagation();
    event.preventDefault();
    
    $.event.trigger({
        type: "fileChoosed",
        fileName: event.dataTransfer.files[0].fileName
    });
});*/

    //END VIEW

//############### END LOGIN FORM ###############


//############### PRELOADER ###############

    function showPreloader() {
        $("#progress-wrapper").fadeIn(300);   
        document.title = "Signing in...";
    }
    
    function hidePreloader() {
        $("#progress-wrapper").fadeOut(300);  
    }

//############### END PRELOADER ###############


//############### CHAT WINDOW ###############

    //MODEL

    function openSocket(secureUserObject) {
        console.log("socket opened");
        socket = io.connect(backEndURL);
        
        socket.on("connect", function() {
            console.log("socket connected");
            
            showUsersOnline();
            hidePreloader();
            showChatWindow();
            
          //  if (localStorage.thisUserID == "") {  
                socket.emit("enterChat", secureUserObject);
        //    }
            
            socket.on("chatEntered", function() { console.log("I'm online"); });
            
            socket.on("userOnline", function(userObject) {  
                notifyUserJoinedChat(userObject.name);
                showUser(userObject);
            });
            
            socket.on("userOffline", function(userObject) {
                notifyUserLeftChat(userObject.name);
                hideUser(userObject);
                
                if ($("body .user-drag-helper").hasClass(userObject.name.toString())) {
                    removeDragHelper(); // if some user logs out while dragging him, the .user-drag-helper must be removed from DOM
                }
            });   
            
            socket.on("message", function(messageObject) {                
                if (!isUserBlocked(messageObject.user)) {
                    showMessage(messageObject);

                    if (!messageObject.isYourMessage) {
                        //if window is unfocused - play sound and start title blinking
                        //if user scrolled chat history to top and doesn't see new messages right now - play sound
                        var userScrolledFromBottomOfContainer = $("#chat .container")[0].scrollHeight - $("#chat .container").scrollTop() - $("#chat .container").outerHeight();

                        if (userScrolledFromBottomOfContainer > $("#chat .container").outerHeight() || !windowFocused) {
                            playSound();

                            if (!windowFocused) {
                                windowTitleBlink();
                            }
                        }
                    }   
                }
                console.log("message received from " + messageObject.user.name);
            });
            
            socket.on("error", function(errorObject) {
                console.log("error happened");
                console.log(errorObject.message);
                clickedLogOutButton = true;
                logOut();
            });
        });
    }
    
    function closeSocket() {
        socket.disconnect();
        io.j = [];
        io.sockets = [];
        console.log("socket closed");
    }

    //Sending messages

    $("#send-message").on("click", function() {
        var messageObject = composeMessage();
        clearMessageBox();
        if (messageObject) {
            sendMessage(messageObject);
        }
    });

    $("#messagebox-text").on("keydown", function(e) {
        if (e.which == 13 && !e.shiftKey) {
            e.preventDefault();
            var messageObject = composeMessage();
            clearMessageBox();
            if (messageObject) {
                sendMessage(messageObject);
            }
        }
    });

    function sendMessage(messageObject) {
        socket.emit("postMessage", messageObject);
    }

    function composeMessage() {
        var messageBody = $("#messagebox-text").val();
        var whitespace = /^\s+$/;
        if (messageBody.length == 0 || whitespace.test(messageBody)) {
            return false;
        };

        var messageObject = {
            user: thisUser,
            message: messageBody,
            isYourMessage: true
        }

        return messageObject;
    }

    function prepareUsername(username) {
        return username.replace(/\s+/g, '-');
    }

    //Preparing message before showing

    function prepareMessageBody(message) {
        //TODO

        var newMessageBody;
        newMessageBody = makeMessageSafe(message);
        newMessageBody = wrapLinksWithAnchors(newMessageBody); 
        newMessageBody = makeQuotingsLookGood(newMessageBody);
        newMessageBody = makeSmilesLookGood(newMessageBody);
        newMessageBody = replaceCarrigeReturnByBr(newMessageBody); 
        

        return newMessageBody;
    }

    function makeQuotingsLookGood(input) {
        var regexp = />> (.+) (.+):[\s]+([\s\S]+) <</g; 
        return input.replace(regexp, '<div class="quote"><div class="sender">$1 $2:</div>$3</div>');
    }

    function makeSmilesLookGood(input) {
        var result = input;
        
        for (var i = 0; i < smiles.length; ++i) {
            result = result.replace(smiles[i].regexp, '<div class="smile" title="' + smiles[i].shortCode + 
                                    '"><img src="' + smiles[i].imagePath + '" border="0" alt="' + 
                                    smiles[i].shortCode + '"/></div>');
         //   console.log(smiles[i].template[0]);
        }
        
        return result;
    }

    function replaceCarrigeReturnByBr(input) {
        return input.replace(/[\r\n]/g, "<br/>");
    }

    function wrapLinksWithAnchors(input) {
        var regExpURL = /^(([^:]+):\/\/([-\w._]+)(\/[-\w._]\?(.+)?)?)$/ig;
        var regExpURL2 = /((https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-?#"]*)*\/?$)/gi;
        var myRegExp = /(?:(https?\:\/\/[^\s\t\r]+))/gi;
        
        return input.replace(myRegExp, '<a href="$1" target="_blank">$1</a>');
    }

    function makeMessageSafe(message) {
        var result;
        result = message.replace(/<script/g, "&lt;script").replace(/<\/script>/g, "&lt;/script&gt;");
       // result = message.replace(/</g, "&lt;");
     //   result = message.replace(/<[^bi]/g, "&lt;");
     //   result = result.replace(/\&lt;/g, "&lt;");
        console.log(result);
        return result;
    }

    function isUserBlocked(userObject) {
        return $.contains($("#black-list")[0], $(".user." + prepareUsername(userObject.name.toString()))[0]);
    }

    //Carriage returning

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
    
    function logOut() {
        console.log("logging out");
        clearMessageBox();
        
        $.ajax({
            url: backEndURL + "/api/users/logout",
            type: "POST",
            dataType: "json",
            data: thisUser,
            success: function(data) {
                console.log("logged out");

                clearLoginForm();
                clearMessageBox();
                clearUsersOnline();
                clearBlackList();
                clearChat();      
                clearSearchInputs();
                hideChatWindow();
                closeSocket();
                showLoginForm();
                localStorage["thisUserID"] = ""; 
                localStorage["thisUserName"] = "";
                localStorage["thisUserSex"] = ""; 
                localStorage["image"] = "";
               // location.reload();
            },
            error: function(data) {
                console.log("error while logging out");
                console.log(data);
                localStorage["thisUserID"] = ""; 
                localStorage["thisUserName"] = "";
                localStorage["thisUserSex"] = ""; 
                localStorage["image"] = "";
                location.reload();
            }
        });
    }

    function turnOnEaster() {
        $("body").addClass("easter");
        itIsEaster = true;
    }

    function turnOffEaster() {
        $("body").removeClass("easter");
        itIsEaster = false;
    }

    function playSound() {
        var sound = itIsEaster ? $(".sound.new-message.easter audio")[0] : $(".sound.new-message audio")[0];
        sound.play();
    }

    //Smiles
    function Smile(name, shortCode, regexp) {
        this.name = name;
        this.shortCode = shortCode;
        this.imagePath = "images/smiles/" + name + ".gif";
        this.template = $('<div class="smile" title="' + this.shortCode + '"><img src="' + this.imagePath + 
                '" border="0" alt="' + this.shortCode + '"/></div>');
        this.regexp = regexp;
        var that = this;
        
        this.show = function() {
            (this.template).on("click", function() {
                var oldText = $("#messagebox-text").val();
                var cursorPosition = $("#messagebox-text").prop("selectionStart");
                var newText = oldText + that.shortCode;
                $("#messagebox-text").val(newText);
                $("#messagebox-text").prop("selectionStart", cursorPosition + that.shortCode.toString().length);
                $("#messagebox-text").prop("selectionEnd", cursorPosition + that.shortCode.toString().length);
                $("#messagebox-text").focus();
            });
            $("#smiles").append(this.template);
        }
        
        $("#smiles .smile").on("click", function(event) {
            event.stopPropagation();
            
            var oldText = $("#messagebox-text").val();
            var cursorPosition = $("#messagebox-text").prop("selectionStart");
            var smileCode = $(this).children("img").attr("alt");
            var newText = oldText + smileCode;
            $("#messagebox-text").val(newText);
            $("#messagebox-text").prop("selectionStart", cursorPosition + smileCode.toString().length);
            $("#messagebox-text").prop("selectionEnd", cursorPosition + smileCode.toString().length);
            $("#messagebox-text").focus();
        });
    }

    var smileHappy = new Smile("happy", ":)", /:\)/gi);
    var smileWink = new Smile("wink", ";)", /;\)/gi);
    var smileTongue = new Smile("tongue", ":P", /:P/gi);
    var smileSad = new Smile("sad", ":(", /:\(/gi);
    var smileCry = new Smile("cry", ":'(", /;\(/gi);
    var smileSchoked = new Smile("schoked", ":O", /:O/gi);
    var smileCool = new Smile("cool", "B)", /B\)/gi);
    var smileMusic = new Smile("music", "(music)", /\(music\)/gi);
    var smileHi = new Smile("hi", "(hi)", /\(hi\)/gi);
    var smileShutMouth = new Smile("shutmouth", ":x", /:x/gi);
    var smileDead = new Smile("dead", "x|", /x\|/gi);    
    var smileShy = new Smile("shy", ":$", /:\$/gi); 
    var smileShout = new Smile("shout", "(shout)", /\(shout\)/gi); 
    var smileBiggrin = new Smile("biggrin", ":D", /:D/gi); 

    var smiles = [smileHappy, smileWink, smileBiggrin, smileTongue, smileSad, smileCry, smileSchoked, smileDead, smileShy, smileCool, smileHi, smileMusic, smileShutMouth, smileShout];

    function fillSmilesBlock() {
        for (var i = 0; i < smiles.length; ++i) {
            smiles[i].show();
        }
    }

    //Users search
    $("#users-online .search").on("input", function() {
        var searchQuery = $(this).val();
        $('#users-online .users-container').children(".user").each(function(i) { 
            if ($(this).find(".username").text().toLowerCase().indexOf(searchQuery.toLowerCase()) < 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        });
    });

    $("#black-list .search").on("input", function() {
        var searchQuery = $(this).val();
        $('#black-list .users-container').children(".user").each(function(i) { 
            if ($(this).find(".username").text().toLowerCase().indexOf(searchQuery.toLowerCase()) < 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        });
    });

    //END MODEL

    //VIEW

    //Event listeners

    $(window).on("resize", function() {
        updateSizes();
        scrollChatDown();
    });
    
    $(".button-view-mode").on("click", function() {
        var that = this;    
        var _parent = that.className.split(' ')[1];
        var _currentMode = that.className.split(' ')[2];
        
        $("#" + _parent).trigger({
            type: "viewModeChanged",
            currentMode: _currentMode
        });
    });

    $("#users-online").on("viewModeChanged", function(event) {
        changeButtonViewModeState("users-online");
        changeViewMode("users-online");
    });

    $("#black-list").on("viewModeChanged", function(event) {
        changeButtonViewModeState("black-list");
        changeViewMode("black-list");
    });

    //Smiles

    $("#smiles-button").on("click", function(event) {
        event.stopPropagation();
        
        if ($("#smiles").css("display") == "none") {
            $("#smiles").fadeIn(120);
        }
        else {
            $("#smiles").fadeOut(120);
        }        
    });

    $("#messagebox-text").on("focus", function() { $("#smiles").fadeOut(120); });

    //Mentioning and quoting

    $("#chat").on("messageListUpdated", function() {       
        $("#chat .sender").off("click").on("click", function(event) {
            var sender = $(this).text();
            if ($("#messagebox-text").val().indexOf(sender + ",") < 0) {
                var oldText = $("#messagebox-text").val();
                var newText = sender + ", " + oldText;
                var cursorPosition = $("#messagebox-text").prop("selectionStart");
                $("#messagebox-text").val(newText);
                $("#messagebox-text").prop("selectionStart", cursorPosition + sender.length + 2);
                $("#messagebox-text").prop("selectionEnd", cursorPosition + sender.length + 2);
                $("#messagebox-text").focus();
            }
        });
        
        $("#chat .sender.self").off("click");
        
        $("#chat .message-body").off("copy").on("copy", function(event) {
            var senderName = $(this).parent().find(".sender").html();
            var datetime = $(this).parent().find(".datetime").html();
            copiedMessage.sender = senderName;
            copiedMessage.datetime = datetime;
            copiedMessage.text = window.getSelection().toString();      
        });
    });

    $(document).on("userListUpdated", function() {
        $(".users-container .user").on("mouseup", function() {
            if (!$(this).hasClass("dragging")) {
               $(this).off("click").on("click", function() {
                    var sender = $(this)[0].className.split(' ')[2];
                    if ($("#messagebox-text").val().indexOf(sender + ",") < 0) {
                        var oldText = $("#messagebox-text").val();
                        var newText = sender + ", " + oldText;
                        var cursorPosition = $("#messagebox-text").prop("selectionStart");
                        $("#messagebox-text").val(newText);
                        $("#messagebox-text").prop("selectionStart", cursorPosition + sender.length + 2);
                        $("#messagebox-text").prop("selectionEnd", cursorPosition + sender.length + 2);
                        $("#messagebox-text").focus();  
                   }
                });
            }
        });
    });

   // function quoteMessage(sender, text) {
        $("#messagebox-text").on("paste", function(event) {
            if (copiedMessage.text != "") {
                event.preventDefault();
                var oldText = $(this).val();
                var newText = oldText + ">> " + copiedMessage.datetime + " " + copiedMessage.sender + ":\r\n" + copiedMessage.text + " <<\r\n";
               // console.log(newText);
                $(this).val(newText);
                $(this).focus();
                copiedMessage.text = "";
            }
        });
  //  }

    $("#messagebox-text").on("keydown", function(event) {
        if (event.which == 66 && event.ctrlKey) {
            event.preventDefault();
            var selectionStart = $(this).prop("selectionStart");
            var selectionEnd = $(this).prop("selectionEnd");
            var oldText = $(this).val();
            var newText = oldText.slice(0, selectionStart) + "<b>" + 
                oldText.slice(selectionStart, selectionEnd) + "</b>" + 
                oldText.slice(selectionEnd, oldText.length);
            $(this).val(newText);
            $(this).prop("selectionStart", selectionEnd + 7);
            $(this).prop("selectionEnd", selectionEnd + 7);
        }
    });

    $("#messagebox-text").on("keydown", function(event) {
        if (event.which == 73 && event.ctrlKey) {
            event.preventDefault();
            var selectionStart = $(this).prop("selectionStart");
            var selectionEnd = $(this).prop("selectionEnd");
            var oldText = $(this).val();
            var newText = oldText.slice(0, selectionStart) + "<i>" + 
                oldText.slice(selectionStart, selectionEnd) + "</i>" + 
                oldText.slice(selectionEnd, oldText.length);
            $(this).val(newText);
            $(this).prop("selectionStart", selectionEnd + 7);
            $(this).prop("selectionEnd", selectionEnd + 7);
        }
    });

    $("#logo").on("click", function() {
        itIsEaster ? turnOffEaster() : turnOnEaster();
    });

    $("#logout").on("click", function(event) { event.preventDefault(); clickedLogOutButton = true; logOut(); });

    //Functionality

    function showChatWindow() {
        document.title = chatName;
        $("#wrapper").fadeIn(300);
        $("#userinfo .username").html(thisUser.name);
        $("#userinfo .avatar").children("img").attr("src", backEndURL + thisUser.imageUrl);
        updateSizes();
        scrollChatDown();
        fillSmilesBlock();     
    }
    
    function hideChatWindow() {
        $("#wrapper").fadeOut(300);  
    }

    function updateSizes() {
        var $messageBoxHeight = $("#userinfo").height() - 2; //2px for borders
        $("#messagebox").css("height", $messageBoxHeight + "px");
        var $messageBoxWidth = $("#messagebox-userinfo .container").innerWidth() - $("#userinfo").outerWidth() - $("#send-button").outerWidth() - 2; //2px because of some Chrome bug (or maybe not bug) 
        $("#messagebox").css("width", $messageBoxWidth + "px");

        $("#send-button").css("height", $messageBoxHeight - $("#smiles-button").outerHeight() - 8);
        
        var $usersOnlineWidth = $("#users-online").outerWidth();
        $("#users-online .search").css("width", $usersOnlineWidth - 140);
        
        var $blackListWidth = $("#black-list").outerWidth();
        $("#black-list .search").css("width", $blackListWidth - 140 + 25);
        
        console.log($(window).outerWidth());
        if ($(window).outerWidth() > 625) { // why the hell 625 not 640?     
           // $("#smiles-button").css("height", $messageBoxHeight * 0.5);

            var $chatHeight = $("#wrapper").height() - $("#messagebox").height() - 30 - 50; //don't forget to remove hardcode later
            $("#chat .container").css("height", $chatHeight + "px");

            var $usersOnlineHeight = ($("#wrapper").height() - 30 - 50) * 0.6; //don't forget to remove hardcode later
            $("#users-online .container").css("height", $usersOnlineHeight + "px");
            $("#users-online .users-container").css("height", ($usersOnlineHeight - 50) + "px"); //don't forget to remove hardcode later

            var $blackListHeight = ($("#wrapper").height() - 30 - 50) * 0.4; //don't forget to remove hardcode later
            $("#black-list .container").css("height", $blackListHeight + "px");
            $("#black-list .users-container").css("height", ($blackListHeight - 50) + "px"); //don't forget to remove hardcode later
        }
        else {
         //   $("#messagebox").removeAttr("style");
        //    $("#send-button").removeAttr("style");
            $("#chat .container").removeAttr("style");
            $("#users-online .container").removeAttr("style");
            $("#users-online .users-container").removeAttr("style");
            $("#black-list .container").removeAttr("style");
            $("#black-list .users-container").removeAttr("style");
        }
    }

    function showUser(user) {        
        var userView = $('<div class="user '  + user.sex + ' ' + prepareUsername(user.name.toString()) + '"></div>');
        var imagePath = user.imageUrl ? backEndURL + user.imageUrl : "images/mr-x.png";
        var imageView = $('<div class="avatar"><img border="0" alt="' + user.name + '" src="' + imagePath + '"/></div>');
        var usernameView = $('<span class="username">' + user.name + '</span>');
        
        $(userView).append(imageView).append(usernameView);
        $("#users-online .users-container").append(userView);
        
        $.event.trigger({
            type: "userListUpdated"
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
                console.log("number of users online: " + users.length);
            }
        }); 
    }

    function showMessage(messageObject) {
        var messageView = $('<div class="message"></div>');
        var messageDetailsView = $('<div class="message-details"></div>');
        var self = messageObject.isYourMessage ? "self" : "";
        var sex = messageObject.user.sex;
        
        var preparedMessageBody = prepareMessageBody(messageObject.message.toString());
        var senderView = $('<span class="sender ' + self + ' ' + sex + ' ' + prepareUsername(messageObject.user.name.toString()) + '">' + messageObject.user.name + '</span>');
        var datetimeView = $('<span class="datetime">' + formatDatetime(new Date) + '</span>');
        var messageBodyView = $('<div class="message-body">' + preparedMessageBody + '</div>');
        
        $(messageDetailsView).append(senderView);
        $(messageDetailsView).append(datetimeView);
        $(messageView).append(messageDetailsView);
        $(messageView).append(messageBodyView);
        
        $("#chat .container").append(messageView);
        scrollChatDown();
        
        $("#chat").trigger({
            type: "messageListUpdated"
        });
    }
    
    function notifyUserJoinedChat(username) {
        console.log("user online: " + username);
        var $notification = $('<div class="notification"></div>');
        $notification.html('<span>' + username + ' joined chat</span><span class="datetime">' + formatDatetime(new Date) + '</span>');
        $("#chat .container").append($notification);
        scrollChatDown();
    }

    function notifyUserLeftChat(username) {
        console.log("user offline: " + username);
        var $notification = $('<div class="notification"></div>');
        $notification.html('<span>' + username + ' left chat</span><span class="datetime">' + formatDatetime(new Date) + '</span>');
        $("#chat .container").append($notification);
        scrollChatDown();
    }
                    
    function changeButtonViewModeState(ownerClass) {   
        var $that = $("#" + ownerClass + " .button-view-mode")
        
        $that.fadeOut(120, function() {
            if ($that.hasClass("tile")) {  
                $that.removeClass("tile").addClass("list").fadeIn(120);
            }
            else {
                $that.removeClass("list").addClass("tile").fadeIn(120);
            }
        });
    }
    
    function changeViewMode(ownerClass) {
        var $that = $("#" + ownerClass + " .users-container")
        
        $that.fadeOut(120, function() {
            if ($that.hasClass("tile")) {  
                $that.removeClass("tile").addClass("list").fadeIn(120);
            }
            else {
                $that.removeClass("list").addClass("tile").fadeIn(120);
            }
        });
    }

    function scrollChatDown() {
        var userScrolledFromBottomOfContainer = $("#chat .container")[0].scrollHeight - $("#chat .container").scrollTop() - $("#chat .container").outerHeight();
        if (userScrolledFromBottomOfContainer < $("#chat .container").outerHeight()) {
            $("#chat .container").scrollTop(($("#chat .container")[0].scrollHeight));
        }
    }

    //Cleaning shit

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

    function clearSearchInputs() {
        $(".search").val("");
    }

    function removeDragHelper() {
        $(".user-drag-helper").remove();
        $("#users-online").removeClass("drop-hover");
        $("#black-list").removeClass("drop-hover");
    }

    //Window title blinking

    function windowTitleBlink() {
        if (!isTitleBlinking) {
            titleBlinkingInterval = setInterval(function() {
                document.title = document.title == chatName ? "+ " + chatName : chatName;
            }, 500);
            isTitleBlinking = true;
        }
    }

    function formatDatetime(datetime) {
        var hours = datetime.getHours().toString().length === 2 ? datetime.getHours() : "0" + datetime.getHours();
        var minutes = datetime.getMinutes().toString().length === 2 ? datetime.getMinutes() : "0" + datetime.getMinutes();    

        return hours + ":" + minutes;
    }

    //Drag'n'drop

    $(document).on("userListUpdated", function() {
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
            $.event.trigger({
                type: "userUnblocked",
                username: ui.draggable[0].className.split(' ')[1]
            });
        }
    });
    $("#black-list").droppable({
        accept: "#users-online .user",
        hoverClass: "drop-hover",
        tolerance: "intersect",
        drop: function(event, ui) {
            $("#black-list .users-container").append(ui.draggable);
            $.event.trigger({
                type: "userBlocked",
                username: ui.draggable[0].className.split(' ')[1]
            });
        }
    });

    //END VIEW

// ############### END CHAT ############### 

$("#drop-server").on("click", function() {
    var empty;
    socket.emit("postMessage", empty); 
});
