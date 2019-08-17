<?php

namespace OCA\Files_Sharing\Controller;

use OC\OCS\Result;
use OC\Share\MailNotifications;
use OCP\AppFramework\OCSController;
use OCP\Defaults;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserSession;
use OCP\Mail\IMailer;
use OCP\Share\IManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

class NotificationController extends OCSController {
	/** @var IManager */
	private $shareManager;
	/** @var IUserSession */
	private $userSession;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var IL10N */
	private $l;
	/** @var IMailer */
	private $mailer;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var EventDispatcherInterface */
	private $eventDispatcher;
	/** @var Defaults */
	private $defaults;

	public function __construct(
		string $appName,
		IRequest $request,
		IManager $shareManager,
		IConfig $config,
		ILogger $logger,
		IL10N $l,
		IMailer $mailer,
		IUserSession $userSession,
		IURLGenerator $urlGenerator,
		EventDispatcherInterface $eventDispatcher,
		Defaults $defaults
	) {
		parent::__construct($appName, $request);
		$this->shareManager = $shareManager;
		$this->config = $config;
		$this->l = $l;
		$this->logger = $logger;
		$this->mailer = $mailer;
		$this->userSession = $userSession;
		$this->urlGenerator = $urlGenerator;
		$this->eventDispatcher = $eventDispatcher;
		$this->defaults = $defaults;
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param string $link
	 * @param string $recipients
	 * @param string $personalNote
	 * @return Result
	 */
	public function notifyPublicLinkRecipientsWithEmail($link, $recipients, $personalNote) {
		$message = null;
		$code = 100;
		$mailNotification = new MailNotifications(
			$this->shareManager,
			$this->userSession->getUser(),
			$this->l,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);
		$result = $mailNotification->sendLinkShareMail(
			$recipients,
			$link,
			$personalNote
		);
		if (!empty($result)) {
			$message = $this->l->t("Couldn't send mail to following recipient(s): %s ",
				\implode(', ', $result)
			);
			$code = 400;
		}
		return new Result(null, $code, $message);
	}
}
