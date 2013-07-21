<?php
class OC_Core_Registration_Controller {
	protected static function displayRegisterPage($errormsg, $entered) {
		OC_Template::printGuestPage('core/registration', 'register',
			array('errormsg' => $errormsg,
				'entered' => $entered));
	}

	public static function index($args) {
		self::displayRegisterPage(false, false);
	}

	public static function sendEmail($args) {
		// Check if user with this email already exists
		// This function wll be implemented in the future with searchValue function in OC_Preference

		if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
			$l = OC_L10N::get('core');
			self::displayRegisterPage($l->t('Email address you entered is not valid'), true);
			return;
		}

		// Check domain (not implemented)

	}

	public static function registerForm($args) {
	}

	public static function createAccount($args) {
	}
}

?>
