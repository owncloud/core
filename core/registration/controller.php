<?php
class OC_Core_Registration_Controller {
	protected static function displayRegisterPage($errormsg, $entered) {
		OC_Template::printGuestPage('core/registration', 'register',
			array('errormsg' => $errormsg,
				'entered' => $entered));
	}

	/**
	 * @brief Renders the registration form
	 * @param $errormsgs numeric array containing error messages to displey
	 * @param $entered_data associative array containing previously entered data by user
	 * @param $email User email
	 */
	protected static function displayRegisterForm($errormsgs, $entered_data, $email) {
		OC_Template::printGuestPage('core/registration', 'form',
			array('errormsgs' => $errormsgs,
			'entered_data' => $entered_data,
			'email' => $email ));
	}

	public static function index($args) {
		self::displayRegisterPage(false, false);
	}

	public static function sendEmail($args) {
		// Check if user with this email already exists
		// This function wll be implemented in the future with searchValue function in OC_Preference

		$l = OC_L10N::get('core');

		if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
			self::displayRegisterPage($l->t('Email address you entered is not valid'), true);
			return;
		}

		// Check domain (not implemented)

		$token = self::savePendingRegistration($_POST['email']);
		if ( $token === false ) {
			self::displayRegisterPage($l->t('There is already a pending registration with this email'), true);
			return;
		} elseif ( strlen($token) === 64 ) {
			$link = OC_Helper::linkToRoute('core_registration_register_form',
				array('token' => $token));
			$link = OC_Helper::makeURLAbsolute($link);
			$from = OCP\Util::getDefaultEmailAddress('register');
			$tmpl = new OC_Template('core/registration', 'email');
			$tmpl->assign('link', $link, false);
			$msg = $tmpl->fetchPage();
			try {
				OC_Mail::send($_POST['email'], 'ownCloud User', $l->t('Verify your ownCloud registration request'), $msg, $from, 'ownCloud');
			} catch (Exception $e) {
				OC_Template::printErrorPage( 'A problem occurs during sending the e-mail please contact your administrator.');
			}
			self::displayRegisterPage('', true);
		}
	}

	public static function registerForm($args) {
		$l = OC_L10N::get('core');
		$email = self::verifyToken($args['token']);

		if ( $email !== false ) {
			self::displayRegisterForm(array(), array(), $email);
		} else {
			OC_Template::printGuestPage('core', 'error',
				array('errors' =>
				array('error' => $l->t('Invalid verification URL. No registration request with this verification URL is found.'))
			));
		}
	}

	public static function createAccount($args) {
		$l = OC_L10N::get('core');
		$email = self::verifyToken($args['token']);

		if ( $email !== false ) {
			$query = OC_DB::prepare('SELECT `requested` FROM `*PREFIX*pending_regist` WHERE `email` = ? ');
			$requested = $query->execute(array($email))->fetchOne();
			if ( time() - $requested > 86400 ) {
				// expired
				$query = OC_DB::prepare('DELETE FROM `*PREFIX*pending_regist` WHERE `email` = ? ');
				$deleted = $query->execute(array($email));
				self::displayRegisterPage($l-t('Your registration request has expired, please make a new request below.'), false);
			} else {
				try {
					OC_User::createUser($_POST['user'], $_POST['password']);
				} catch (\Exception $e) {
					self::displayRegisterForm(array($e->getMessage()), $_POST, $email);
				}
				// delete request after account created
				$query = OC_DB::prepare('DELETE FROM `*PREFIX*pending_regist` WHERE `email` = ? ');
				$deleted = $query->execute(array($email));
			}
		} else {
			OC_Template::printGuestPage('core', 'error',
				array('errors' =>
				array(array('error' => $l->t('Invalid verification URL. No registration request with this verification URL is found.')))
			));
		}
	}

	/**
	 * @brief Save a registration request to database
	 * @param string $email Request from this email
	 * @return false if a request with the email already exists, returns the generated token when success
	 */
	public static function savePendingRegistration($email) {
		// Check if the email does exist
		$query = OC_DB::prepare('SELECT `email` FROM `*PREFIX*pending_regist` WHERE `email` = ? ');
		$values=$query->execute(array($email))->fetchAll();
		$exists=(count($values)>0);

		if ( $exists ) {
			return false;
		} else {
			$query = OC_DB::prepare( 'INSERT INTO `*PREFIX*pending_regist`'
				.' ( `email`, `token`, `requested` ) VALUES( ?, ?, ? )' );
			$token = hash('sha256', OC_Util::generate_random_bytes(30).OC_Config::getValue('passwordsalt', ''));
			$query->execute(array( $email, $token, time() ));
			return $token;
		}
	}

	public static function verifyToken($token) {
		$query = OC_DB::prepare('SELECT `email` FROM `*PREFIX*pending_regist` WHERE `token` = ? ');
		$email = $query->execute(array($token))->fetchOne();
		return OC_DB::isError($email) ? false : $email;
	}
}

?>
