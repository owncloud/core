<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author cmeh <cmeh@users.noreply.github.com>
 * @author Florin Peter <github@florin-peter.de>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Sam Tuke <mail@samtuke.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Ujjwal Bhardwaj <ujjwalb1996@gmail.com>
 * @author Yarno Boelens <yarnoboelens@gmail.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OC\Settings\ChangePassword;

class Controller {
	public static function changePersonalPassword($args) {
		// Check if we are an user
		\OC_JSON::callCheck();
		\OC_JSON::checkLoggedIn();

		$username = \OC_User::getUser();
		$password = isset($_POST['personal-password']) ? $_POST['personal-password'] : null;
		$oldPassword = isset($_POST['oldpassword']) ? $_POST['oldpassword'] : '';

		if (!\OC_User::checkPassword($username, $oldPassword)) {
			$l = \OC::$server->getL10NFactory()->get('settings');
			\OC_JSON::error(["data" => ["message" => $l->t("Wrong current password")]]);
			exit();
		}
		if ($oldPassword === $password) {
			$l = \OC::$server->getL10NFactory()->get('settings');
			\OC_JSON::error(["data" => ["message" => $l->t("The new password cannot be the same as the previous one")]]);
			exit();
		}
		try {
			if ($password !== null && \OC_User::setPassword($username, $password)) {
				\OC::$server->getUserSession()->updateSessionTokenPassword($password);

				self::sendNotificationMail($username);

				\OC_JSON::success();
			} else {
				\OC_JSON::error();
			}
		} catch (\Exception $e) {
			\OC_JSON::error(['data' => ['message' => $e->getMessage()]]);
		}
	}

	public static function changeUserPassword($args) {
		// Check if we are an user
		\OC_JSON::callCheck();
		\OC_JSON::checkLoggedIn();

		$l = \OC::$server->getL10NFactory()->get('settings');
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
		} else {
			\OC_JSON::error(['data' => ['message' => $l->t('No user supplied')]]);
			exit();
		}

		$password = isset($_POST['password']) ? $_POST['password'] : null;
		$recoveryPassword = isset($_POST['recoveryPassword']) ? $_POST['recoveryPassword'] : null;

		$isUserAccessible = false;
		$currentUserObject = \OC::$server->getUserSession()->getUser();
		$targetUserObject = \OC::$server->getUserManager()->get($username);
		if ($currentUserObject !== null && $targetUserObject !== null) {
			$isUserAccessible = \OC::$server->getGroupManager()->getSubAdmin()->isUserAccessible($currentUserObject, $targetUserObject);
		}

		if (\OC_User::isAdminUser(\OC_User::getUser())) {
			$userstatus = 'admin';
		} elseif ($isUserAccessible) {
			$userstatus = 'subadmin';
		} else {
			\OC_JSON::error(['data' => ['message' => $l->t('Authentication error')]]);
			exit();
		}

		if (\OC_App::isEnabled('encryption')) {
			//handle the recovery case
			$crypt = new \OCA\Encryption\Crypto\Crypt(
				\OC::$server->getLogger(),
				\OC::$server->getUserSession(),
				\OC::$server->getConfig(),
				\OC::$server->getL10N('encryption'));
			$keyStorage = \OC::$server->getEncryptionKeyStorage();
			$util = new \OCA\Encryption\Util(
				new \OC\Files\View(),
				$crypt,
				\OC::$server->getLogger(),
				\OC::$server->getUserSession(),
				\OC::$server->getConfig(),
				\OC::$server->getUserManager());
			$keyManager = new \OCA\Encryption\KeyManager(
				$keyStorage,
				$crypt,
				\OC::$server->getConfig(),
				\OC::$server->getUserSession(),
				new \OCA\Encryption\Session(\OC::$server->getSession()),
				\OC::$server->getLogger(),
				$util);
			$recovery = new \OCA\Encryption\Recovery(
				\OC::$server->getUserSession(),
				$crypt,
				\OC::$server->getSecureRandom(),
				$keyManager,
				\OC::$server->getConfig(),
				$keyStorage,
				\OC::$server->getEncryptionFilesHelper(),
				new \OC\Files\View());
			$recoveryAdminEnabled = $recovery->isRecoveryKeyEnabled();

			$validRecoveryPassword = false;
			$recoveryEnabledForUser = false;
			if ($recoveryAdminEnabled) {
				$validRecoveryPassword = $keyManager->checkRecoveryPassword($recoveryPassword);
				$recoveryEnabledForUser = $recovery->isRecoveryEnabledForUser($username);
			}

			if ($recoveryEnabledForUser && $recoveryPassword === '') {
				\OC_JSON::error(['data' => [
					'message' => $l->t('Please provide an admin recovery password; otherwise, all user data will be lost.')
				]]);
			} elseif ($recoveryEnabledForUser && ! $validRecoveryPassword) {
				\OC_JSON::error(['data' => [
					'message' => $l->t('Wrong admin recovery password. Please check the password and try again.')
				]]);
			} else { // now we know that everything is fine regarding the recovery password, let's try to change the password
				$result = \OC_User::setPassword($username, $password, $recoveryPassword);
				if (!$result && $recoveryEnabledForUser) {
					\OC_JSON::error([
						"data" => [
							"message" => $l->t("Backend doesn't support password change, but the user's encryption key was successfully updated.")
						]
					]);
				} elseif (!$result && !$recoveryEnabledForUser) {
					\OC_JSON::error(["data" => ["message" => $l->t("Unable to change password")]]);
				} else {
					self::sendNotificationMail($username);
					\OC_JSON::success(["data" => ["username" => $username]]);
				}
			}
		} else { // if encryption is disabled, proceed
			try {
				if ($password !== null && \OC_User::setPassword($username, $password)) {
					self::sendNotificationMail($username);
					\OC_JSON::success(['data' => ['username' => $username]]);
				} else {
					\OC_JSON::error(['data' => ['message' => $l->t('Unable to change password')]]);
				}
			} catch (\Exception $e) {
				\OC_JSON::error(['data' => ['message' => $e->getMessage()]]);
			}
		}
	}

	private static function sendNotificationMail($username) {
		$userObject = \OC::$server->getUserManager()->get($username);
		$email = $userObject->getEMailAddress();
		$defaults = new \OC_Defaults();
		$from = \OCP\Util::getDefaultEmailAddress('lostpassword-noreply');
		$mailer = \OC::$server->getMailer();
		$l10n = \OC::$server->getL10N('settings');

		if ($email !== null && $email !== '') {
			$tmpl = new \OC_Template('core', 'lostpassword/notify');
			$msg = $tmpl->fetchPage();

			try {
				$message = $mailer->createMessage();
				$message->setTo([$email => $username]);
				$message->setSubject($l10n->t('%s password changed successfully', [$defaults->getName()]));
				$message->setPlainBody($msg);
				$message->setFrom([$from => $defaults->getName()]);
				$mailer->send($message);
			} catch (\Exception $e) {
				throw new \Exception($l10n->t(
					'Couldn\'t send reset email. Please contact your administrator.'
				));
			}
		}
	}
}
