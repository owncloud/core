<?php

OCP\JSON::callCheck();

$user = @$_POST['user'];

$l = OCP\Util::getL10N('core');

$isEncrypted = OC_App::isEnabled('files_encryption');
try {  
	if ($isEncrypted && @$_POST['proceed'] !== 'Yes'){
		throw new EncryptedDataException();
	}

	if ($user && OC_User::userExists($user)){
		$token = hash('sha256', OC_Util::generate_random_bytes(30).OC_Config::getValue('passwordsalt', ''));
		OC_Preferences::setValue($user, 'owncloud', 'lostpassword',
			hash('sha256', $token)); // Hash the token again to prevent timing attacks
		
		$email = OC_Preferences::getValue($user, 'settings', 'email', '');
		if (empty($email)) {
			throw new Exception($l->t('Request failed!<br />Did you make sure your email/username was right?'));
		}
		
		$link = OC_Helper::linkToRoute('core_lostpassword_reset',
				array('user' => $user, 'token' => $token));
		$link = OC_Helper::makeURLAbsolute($link);

		$tmpl = new OC_Template('core/lostpassword', 'email');
		$tmpl->assign('link', $link, false);
		$msg = $tmpl->fetchPage();

		$from = OCP\Util::getDefaultEmailAddress('lostpassword-noreply');
		try {
			OC_Mail::send($email, $user, $l->t('ownCloud password reset'), $msg, $from, 'ownCloud');
		} catch (Exception $e) {
			throw new Exception( $l->t('Couldn’t send reset email. Please contact your administrator.'));
		}
		
		OCP\JSON::success();
		exit();
	} else {
		throw new Exception($l->t('Couldn’t send reset email. Please make sure your username is correct.'));
	}
} catch (EncryptedDataException $e){
	OCP\JSON::error(
			array('encryption' => '1')
	);
} catch (Exception $e){
	OCP\JSON::error(
			array('msg'=> $e->getMessage())
	);
}

class EncryptedDataException extends Exception{
}
