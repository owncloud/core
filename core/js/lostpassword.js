
OC.Lostpassword = {
	errorMsg : t('core', 'Couldn’t send reset email. Please contact your administrator.'),
			
	successMsg : t('core', 'The link to reset your password has been sent to your email. If you do not receive it within a reasonable amount of time, check your spam/junk folders.<br>If it is not there ask your local administrator.'),
	
	encryptedMsg : t('core', "Your files are encrypted. If you haven't enabled the recovery key, there will be no way to get your data back after your password is reset.<br />If you are not sure what to do, please contact your administrator before you continue. <br />Do you really want to continue?")
			+ ('<br /><input type="checkbox" id="encrypted-continue" value="Yes" />')
			+ '<label for="encrypted-continue">'
			+ t('core', 'I know what I\'m doing')
			+ '</label><br />'
			+ '<a id="lost-password-encryption" href>'
			+ t('core', 'Reset password')
			+ '</a>',
			
			
	init : function() {
		if ($('#lost-password-encryption').length){
			$('#lost-password-encryption').click(OC.Lostpassword.send);
		} else {
			$('#lost-password').click(OC.Lostpassword.send);
		}
	},
			
	send : function(event){
		event.preventDefault();
		if (!$('#user').val().length){
			$('#submit').trigger('click');
		} else {
			$.post(
					OC.filePath('core', 'ajax', 'lostpassword.php'), 
					{ 
						user : $('#user').val(),
						proceed: $('#encrypted-continue').attr('checked') ? 'Yes' : 'No'
					}, 
					OC.Lostpassword.done
			);
		}
	},
			
	done : function(result){
		if (result && result.status === 'success'){
			OC.Lostpassword.success();
		} else {
			if (result && result.msg){
				var errorMsg = result.msg;
			} else if (result && result.encryption) {
				var errorMsg = OC.Lostpassword.encryptedMsg;
			} else {
				var errorMsg = OC.Lostpassword.errorMsg;
			}
			OC.Lostpassword.error(errorMsg);
		}
	},
			
	success : function(msg){
		var node = OC.Lostpassword.getNode();
		node.addClass('success').css({width:'auto'});
		node.html(OC.Lostpassword.successMsg);
	},
			
	error : function(msg){
		var node = OC.Lostpassword.getNode();
		node.addClass('warning');
		node.html(msg);
		OC.Lostpassword.init();
	},
	
	getNode : function(){
		if (!$('#lost-password').length){
			$('<p id="lost-password"></p>').insertBefore($('#remember_login'));
		} else {
			$('#lost-password').replaceWith($('<p id="lost-password"></p>'));
		}
		return $('#lost-password');
	}
};

$(document).ready(OC.Lostpassword.init);
