$(function() { 
    var userStartedTyping = false;
    var userTyped = false;
    
    //Name input validation
    $("#input-name").on("input", 
                  function() {
                      userStartedTyping = true;
                      if ($(this).val().length > 3) {
                          userTyped = true;
                      }
                      if (userTyped && $(this).val().length > 0) {
                          validateName.call($("#input-name"));
                      }
                  });
    $("#input-name").on("blur", 
                        function() {
                            if (userStartedTyping) {
                                validateName.call($("#input-name"));
                            }
                        });
    
    var errorTipEmptyName = new ErrorTip(".name", "Enter some name.");
    var errorTipNameTooShort = new ErrorTip(".name", "Name can't be shorter than 4 symbols. Choose a longer one.");
    var errorTipNameTooLong = new ErrorTip(".name", "Name can't be longer than 20 symbols. Choose a shorter one.");
	var errorTipBadSymbols = new ErrorTip(".name", "Username contains forbidden symbols. Use letters and numbers only.");
    var errorTipNoSexChosen = new ErrorTip(".sex", "Choose your sex.");
    var errorTipNotSelectedImage = new ErrorTip(".photo", "Select an image.");
    var errorTipBadFileType = new ErrorTip(".photo", "File type must be .jpg, .png, .gif or .bmp. Select another one.");
    var errorTipTooBigImage = new ErrorTip(".photo", "Image size can't be bigger than 500 KB. Select smaller one.");
    
    function validateName() {
        var that = $("#input-name")[0];
        
		var name = $(that).val();
        var nameLength = $(that).val().length;
        
        if (nameLength == 0) {
            $("#input-name").addClass("bad-input");
            errorTipNameTooShort.hide();
            errorTipEmptyName.show();
            return false;
        }
        else {
            errorTipEmptyName.hide();
            $("#input-name").removeClass("bad-input");
        }
        
        if (nameLength > 0 && nameLength < 4) {
            $("#input-name").addClass("bad-input");       
            errorTipNameTooShort.show();
            return false;
        }
        else {
            $("#input-name").removeClass("bad-input");
            errorTipNameTooShort.hide();
        }
        
        if (nameLength > 20) {
            $("#input-name").addClass("bad-input");       
            errorTipNameTooLong.show();
            return false;
        }
        else {
            $("#input-name").removeClass("bad-input");
            errorTipNameTooLong.hide();
        }
        
        var badSymbols = /[@#$%^&*(){}\[\]\\\|\/\,\.\:\;\'\"]/;
        var allowedSymbols = /\w+/;
        
		if (badSymbols.test(name)) {
			$("#input-name").addClass("bad-input");       
            errorTipBadSymbols.show();	
            return false;
		}
		else {
			$("#input-name").removeClass("bad-input");
            errorTipBadSymbols.hide();
		}
        
        return true;
    }
    
    $("#input-male").on("click", validateSex);
    $("#input-male").on("click", validateSex);
    
    //Sex radiobutton validation
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
    
    //File input validation   
    $("#input-photo").on("change", validatePhoto);
    
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
            console.log(errorTipTooBigImage);
            return false;
        }
        else {
            $(".file-upload").removeClass("bad-input");
            errorTipTooBigImage.hide();
        }
        
        return true;
    }
    
    //Whole form validation on submit 
    $("#login").click(function(e) {e.preventDefault(); validateForm();});
    
    function validateForm() {
        var nameIsOk = validateName() ? true : false;
        var sexIsOk = validateSex() ? true : false;
        var photoIsOk = validatePhoto() ? true : false;
        
        if (nameIsOk && sexIsOk && photoIsOk) {
            $.ajax({
                url: "progress.html",
                context: document.body,
                dataType: "html",
                success: function(data) {      
                $(".outer-wrapper").fadeOut(300, function() {
                    document.title = "Chat";
                    $("body").html(data);
                    $("#progress-wrapper").fadeIn(300);   
                }); 
            }
            });
        }     
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
});