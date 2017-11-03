	$('.listSettings').on('click',changeList);
	$('#sendButton').on('click',createMassage);
	$('#typeMassage').on('keypress', sendMassage);

		var sendMassage = function (e) {
		var key = e.which;

		if (e.keyCode == 10 || e.keyCode == 13) {
			if (e.ctrlKey) {
				console.log('ctrl');
				$('#typeMassage').val($('#typeMassage').val()+'\r\n');
			}
    	else {
    		e.preventDefault();
    		createMassage();
        }
	}
}
		var changeList = function(e) {
		if(e.delegateTarget.className.search('online')>0) {
			changeUsersView('')
		}
		else {
			
		}
			if($('.user').hasClass('listView')) {
				$('.user').removeClass('listView');
			}
			else {
				$('.user').addClass('listView');
			}
		}

	var createMassage = function () {
		var username = 'user';
		var msg = username + ': ' + $('#typeMassage').val().replace(/\r\n|\r|\n/g,'<br>')+'<br>';
		$(".massages").append(msg);
		$('#typeMassage').val('');
	}