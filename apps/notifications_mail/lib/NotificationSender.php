<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\notifications_mail;

use OCP\Notification\IManager;
use OCP\Notification\INotification;
use OCP\Mail\IMailer;
use OCP\IConfig;
use OCP\L10N\IFactory;

class NotificationSender {
	/** @var IMailer */
	private $mailer;

	/** @var IManager */
	private $manager;

	/** @var IConfig */
	private $config;

	/** @var IFactory */
	private $l10nFactory;

	public function __construct(IManager $manager, IMailer $mailer, IConfig $config, IFactory $l10nFactory) {
		$this->manager = $manager;
		$this->mailer = $mailer;
		$this->config = $config;
		$this->l10nFactory = $l10nFactory;
	}

	/**
	 * Send a notification via email to the list of email addresses passed as parameter
	 */
	public function sendNotification(INotification $notification, $serverUrl, array $emailAddresses) {
		$targetUser = $notification->getUser();
		$language = $this->config->getUserValue($targetUser, 'core', 'lang', null);

		$notification = $this->manager->prepare($notification, $language);

		$emailMessage = $this->mailer->createMessage();
		$emailMessage->setTo($emailAddresses);

		$l10n = $this->l10nFactory->get('notifications_mail', $language);

		$notificationObjectType = $notification->getObjectType();
		$notificationObjectId = $notification->getObjectId();
		$generatedId = "$notificationObjectType#$notificationObjectId";

		$subject = 'You\'ve received a new notification in %s : "%s"';
		$translatedSubject = (string)$l10n->t($subject, [$serverUrl, $generatedId]);
		$emailMessage->setSubject($translatedSubject);

		$body = '%s</br>%s</br>Go to <a href="%s">%s</a> to check the notification';
		$translatedBody = (string)$l10n->t($body, [
			$notification->getParsedSubject(),
			$notification->getParsedMessage(),
			$serverUrl,
			$serverUrl
		]);
		$emailMessage->setHtmlBody($translatedBody);

		$this->mailer->send($emailMessage);
	}

	/**
	 * Validate the list of emails and split the list into valid and invalid emails.
	 * @param array $emails the list of emails that needs to be verified
	 * @return array an array with 2 keys: "valid" for the list of valid email and "invalid" for
	 * the invalid ones as follows:
	 * ['valid' => ['a@example.com', 'b@example.com'], 'invalid' => ['foo', 'bar@bar@bar']]
	 */
	public function validateEmails(array $emails) {
		$result = ['valid' => [], 'invalid' => []];
		foreach ($emails as $email) {
			if ($this->mailer->validateMailAddress($email)) {
				$result['valid'][] = $email;
			} else {
				$result['invalid'][] = $email;
			}
		}
		return $result;
	}
}
