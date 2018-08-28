<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Craig Morrissey <craig@owncloud.com>
 * @author dampfklon <me@dampfklon.de>
 * @author Felix Böhm <felixboehm@gmx.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Leonardo Diez <leio10@users.noreply.github.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author neumann <node512@gmail.com>
 * @author Ramiro Aparicio <rapariciog@gmail.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Thomas Tanghus <thomas@tanghus.net>
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

use OC\Share\Filters\MailNotificationFilter;

OC_JSON::checkLoggedIn();
OCP\JSON::callCheck();

$defaults = new \OCP\Defaults();

/**
 * @return mixed
 */
function getGroups($search = '', $limit = null, $offset = null) {
	$groups = \OC::$server->getGroupManager()->search($search, $limit, $offset);
	$groupIds = [];
	foreach ($groups as $group) {
		$groupIds[] = $group->getGID();
	}
	return $groupIds;
}

/**
 * @param $gids
 * @param $limit
 * @param $offset
 * @return mixed
 */
function displayNamesInGroups($gids, $search = '', $limit = -1, $offset = 0) {
	$displayNames = [];
	foreach ($gids as $gid) {
		// TODO Need to apply limits to groups as total
		$diff = \array_diff(
			\OC::$server->getGroupManager()->displayNamesInGroup($gid, $search, $limit, $offset),
			$displayNames
		);
		if ($diff) {
			// A fix for LDAP users. array_merge loses keys...
			$displayNames = $diff + $displayNames;
		}
	}
	return $displayNames;
}

if (isset($_POST['action'], $_POST['itemType'], $_POST['itemSource'])) {
	switch ($_POST['action']) {
		case 'email':
			$emailBody = null;

			if (isset($_POST['emailBody'])) {
				$emailBody = \trim((string)$_POST['emailBody']);
			}

			// read and filter post variables
			$filter = new MailNotificationFilter([
				'link' => $_POST['link'],
				'file' => $_POST['file'],
				'toAddress' => $_POST['toAddress'],
				'expirationDate' => $_POST['expiration'],
				'personalNote' => $emailBody
			]);

			$options = [];
			$results = [];
			$toEmails = \explode(',', $filter->getToAddress());

			//Lets get the senders email address and add to the 'to'
			if (isset($_POST['toSelf']) && $_POST['toSelf'] === 'true') {
				$toEmails [] = \OC::$server->getUserSession()->getUser()->getEMailAddress();
			}
			//Send separate email
			foreach ($toEmails as $toEmail) {
				$options['to'] = $toEmail;

				$l10n = \OC::$server->getL10N('lib');

				$sendingUser = \OC::$server->getUserSession()->getUser();
				$mailNotification = new \OC\Share\MailNotifications(
					\OC::$server->getShareManager(),
					$sendingUser,
					$l10n,
					\OC::$server->getMailer(),
					\OC::$server->getConfig(),
					\OC::$server->getLogger(),
					$defaults,
					\OC::$server->getURLGenerator(),
					\OC::$server->getEventDispatcher()
				);

				$expiration = null;
				if ($filter->getExpirationDate() !== '') {
					try {
						$date = new DateTime($filter->getExpirationDate());
						$expiration = $date->getTimestamp();
					} catch (Exception $e) {
						\OCP\Util::writeLog('sharing', "Couldn't read date: " . $e->getMessage(), \OCP\Util::ERROR);
					}
				}

				if ($emailBody !== null || $emailBody !== '') {
					$emailBody = \strip_tags($emailBody);
				}
				$result = $mailNotification->sendLinkShareMail(
					null,
					$filter->getFile(),
					$filter->getLink(),
					$expiration,
					$filter->getPersonalNote(),
					$options
				);

				$results = \array_merge($results, $result);
			}

			if (empty($results)) {
				// Get the token from the link
				$linkParts = \explode('/', $filter->getLink());
				$token = \array_pop($linkParts);

				// Get the share for the token
				$share = \OCP\Share::getShareByToken($token, false);
				if ($share !== false) {
					$currentUser = \OC::$server->getUserSession()->getUser()->getUID();
					$file = '/' . \ltrim($file, '/');

					// Check whether share belongs to the user and whether the file is the same
					if ($share['file_target'] === $file && $share['uid_owner'] === $currentUser) {

						// Get the path for the user
						$view = new \OC\Files\View('/' . $currentUser . '/files');
						$fileId = (int) $share['item_source'];
						$path = $view->getPath((int) $share['item_source']);

						if ($path !== null) {
							$event = \OC::$server->getActivityManager()->generateEvent();
							$event->setApp(\OCA\Files_Sharing\Activity::FILES_SHARING_APP)
								->setType(\OCA\Files_Sharing\Activity::TYPE_SHARED)
								->setAuthor($currentUser)
								->setAffectedUser($currentUser)
								->setObject('files', $fileId, $path)
								->setSubject(\OCA\Files_Sharing\Activity::SUBJECT_SHARED_EMAIL, [$path, $toAddress]);
							\OC::$server->getActivityManager()->publish($event);
						}
					}
				}

				\OCP\JSON::success();
			} else {
				$l = \OC::$server->getL10N('core');
				OCP\JSON::error([
					'data' => [
						'message' => $l->t("Couldn't send mail to following recipient(s): %s ",
								\implode(', ', $results)
							)
					]
				]);
			}

			break;
	}
} elseif (isset($_GET['fetch'])) {
	switch ($_GET['fetch']) {
		// still used by email recipient autocomplete in link share dialog
		case 'getShareWithEmail':
			$result = [];
			if (isset($_GET['search'])) {
				$cm = OC::$server->getContactsManager();

				$config = OC::$server->getConfig();
				$userEnumerationAllowed = $config
					->getAppValue('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes') === 'yes';
				$pattern = (string)$_GET['search'];
				$searchConfig =  new \OCP\Util\UserSearch($config);
				if (!$searchConfig->isSearchable($pattern)) {
					OC_JSON::error();
					return;
				}

				if ($cm !== null && $cm->isEnabled() && $userEnumerationAllowed) {
					$contacts = $cm->search($pattern, ['FN', 'EMAIL']);
					foreach ($contacts as $contact) {
						// We don't want contacts from system address books
						if (isset($contact['isSystemBook'])) {
							continue;
						}
						if (!isset($contact['EMAIL'])) {
							continue;
						}

						$emails = $contact['EMAIL'];
						if (!\is_array($emails)) {
							$emails = [$emails];
						}

						foreach ($emails as $email) {
							$result[] = [
								'email' => $email,
								'displayname' => $contact['FN'],
							];
						}
					}
				}
			}
			OC_JSON::success(['data' => $result]);
			break;
	}
}
