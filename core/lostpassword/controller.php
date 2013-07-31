<?php
/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class OC_Core_LostPassword_Controller {
	protected static function displayLostPasswordPage() {
		OC_Util::displayLoginPage(array('invalidpassword'));
	}
	
	protected static function displayResetPasswordPage($success, $args) {
		$route_args = array();
		$route_args['token'] = $args['token'];
		$route_args['user'] = $args['user'];
		OC_Template::printGuestPage('core/lostpassword', 'reset',
			array('success' => $success, 'args' => $route_args));
	}

	protected static function checkToken($user, $token) {
		return OC_Preferences::getValue($user, 'owncloud', 'lostpassword') === hash('sha256', $token);
	}
	
	public static function sendEmail($user, $proceed) {
		$l = OCP\Util::getL10N('core');
		
		$isEncrypted = OC_App::isEnabled('files_encryption');
		if ($isEncrypted && $proceed !== 'Yes'){
			throw new EncryptedDataException();
		}

		if ($user && OC_User::userExists($user)){
			$token = hash('sha256', OC_Util::generate_random_bytes(30).OC_Config::getValue('passwordsalt', ''));
			OC_Preferences::setValue($user, 'owncloud', 'lostpassword',
				hash('sha256', $token)); // Hash the token again to prevent timing attacks
		
			$email = OC_Preferences::getValue($user, 'settings', 'email', '');
			if (empty($email)) {
				throw new Exception($l->t('Couldn’t send reset email because there is no email address for this username. Please contact your administrator.'));
			}
		
			$link = OC_Helper::linkToRoute('core_lostpassword_reset',
				array('user' => $user, 'token' => $token));
			$link = OC_Helper::makeURLAbsolute($link);

			$tmpl = new OC_Template('core/lostpassword', 'email');
			$tmpl->assign('link', $link, false);
			$msg = $tmpl->fetchPage();
			$from = OCP\Util::getDefaultEmailAddress('lostpassword-noreply');
			try {
				$defaults = new OC_Defaults();
				OC_Mail::send($email, $_POST['user'], $l->t('%s password reset', array($defaults->getName())), $msg, $from, $defaults->getName());
			} catch (Exception $e) {
				throw new Exception( $l->t('Couldn’t send reset email. Please contact your administrator.'));
			}
		} else {
			throw new Exception($l->t('Couldn’t send reset email. Please make sure your username is correct.'));
		}
	}

	public static function reset($args) {
		// Someone wants to reset their password:
		if(self::checkToken($args['user'], $args['token'])) {
			self::displayResetPasswordPage(false, $args);
		} else {
			// Someone lost their password
			self::displayLostPasswordPage();
		}
	}

	public static function resetPassword($args) {
		$l = OCP\Util::getL10N('core');
		if (!self::checkToken($args['user'], $args['token'])) {
			throw new Exception($l->t('This link is invalid or expired.'));
		}
		
		$password = @$_POST['password'];
		if (!$_POST['password']) {
			throw new Exception($l->t('Password can not be empty.'));
		}
				
		if (OC_User::setPassword($args['user'], $password)) {
			OC_Preferences::deleteKey($args['user'], 'owncloud', 'lostpassword');
			OC_User::unsetMagicInCookie();
		} else {
			throw new Exception($l->t('Password can not be changed. Please contact your administrator.'));
		}
	}
}

class EncryptedDataException extends Exception{
}
