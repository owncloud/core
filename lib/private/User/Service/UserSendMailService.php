<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\User\Service;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use OCP\User\Exceptions\EmailSendFailedException;
use OCP\User\Exceptions\InvalidUserTokenException;
use OCP\User\Exceptions\UserTokenExpiredException;
use OCP\User\Exceptions\UserTokenMismatchException;
use OCP\Util;

class UserSendMailService {
	/** @var ISecureRandom  */
	private $secureRandom;
	/** @var IConfig  */
	private $config;
	/** @var IMailer  */
	private $mailer;
	/** @var IURLGenerator  */
	private $urlGenerator;
	/** @var \OC_Defaults  */
	private $defaults;
	/** @var ITimeFactory  */
	private $timeFactory;
	/** @var IL10N  */
	private $l10n;

	/**
	 * UserSendMail constructor.
	 *
	 * @param ISecureRandom $secureRandom
	 * @param IConfig $config
	 * @param IMailer $mailer
	 * @param IURLGenerator $urlGenerator
	 * @param \OC_Defaults $defaults
	 * @param ITimeFactory $timeFactory
	 * @param IL10N $l10n
	 */
	public function __construct(ISecureRandom $secureRandom, IConfig $config,
								IMailer $mailer, IURLGenerator $urlGenerator,
								\OC_Defaults $defaults, ITimeFactory $timeFactory,
								IL10N $l10n) {
		$this->secureRandom = $secureRandom;
		$this->config = $config;
		$this->mailer = $mailer;
		$this->urlGenerator = $urlGenerator;
		$this->defaults = $defaults;
		$this->timeFactory = $timeFactory;
		$this->l10n = $l10n;
	}

	/**
	 * @param string $userId
	 * @param string $email
	 * @return null
	 */
	public function generateTokenAndSendMail($userId, $email) {
		$fromMailAddress = Util::getDefaultEmailAddress('no-reply');
		$token = $this->secureRandom->generate(21,
			ISecureRandom::CHAR_DIGITS,
			ISecureRandom::CHAR_LOWER, ISecureRandom::CHAR_UPPER);
		$this->config->setUserValue($userId, 'owncloud',
			'lostpassword', $this->timeFactory->getTime() . ':' . $token);

		// data for the mail template
		$mailData = [
			'username' => $userId,
			'url' => $this->urlGenerator->linkToRouteAbsolute('core.user.setPasswordForm', ['userId' => $userId, 'token' => $token])
		];

		$mail = new TemplateResponse('core', 'new_user/email-html', $mailData, 'blank');
		$mailContent = $mail->render();

		$mail = new TemplateResponse('core', 'new_user/email-plain_text', $mailData, 'blank');
		$plainTextMailContent = $mail->render();

		$subject = $this->l10n->t('Your %s account was created', [$this->defaults->getName()]);

		$message = $this->mailer->createMessage();
		$message->setTo([$email => $userId]);
		$message->setSubject($subject);
		$message->setHtmlBody($mailContent);
		$message->setPlainBody($plainTextMailContent);
		$message->setFrom([$fromMailAddress => $this->defaults->getName()]);
		$this->mailer->send($message);
	}

	/**
	 * @param string $token
	 * @param IUser $user
	 * @return null
	 * @throws InvalidUserTokenException
	 * @throws UserTokenExpiredException
	 * @throws UserTokenMismatchException
	 */
	public function checkPasswordSetToken($token, IUser $user) {
		$splittedToken = \explode(':', $this->config->getUserValue($user->getUID(), 'owncloud', 'lostpassword', null));
		if (\count($splittedToken) !== 2) {
			$this->config->deleteUserValue($user->getUID(), 'owncloud', 'lostpassword');
			throw new InvalidUserTokenException('The token provided is invalid.');
		}

		//The value 43200 = 60*60*12 = 1/2 day
		if ($splittedToken[0] < ($this->timeFactory->getTime() - (int)$this->config->getAppValue('core', 'token_expire_time', '43200')) ||
			$user->getLastLogin() > $splittedToken[0]) {
			$this->config->deleteUserValue($user->getUID(), 'owncloud', 'lostpassword');
			throw new UserTokenExpiredException('The token provided had expired.');
		}

		if (!\hash_equals($splittedToken[1], $token)) {
			throw new UserTokenMismatchException('The token provided is invalid.');
		}
	}

	/**
	 * @param $user
	 * @return bool true when email is sent to user successfully, false when no email set to user
	 * @throws EmailSendFailedException while sending email to user fails
	 */
	public function sendNotificationMail($user) {
		$email = $user->getEMailAddress();
		$fromMailAddress = Util::getDefaultEmailAddress('no-reply');

		if ($email !== '') {
			try {
				$tmpl = new \OC_Template('core', 'lostpassword/notify');
				$msg = $tmpl->fetchPage();

				$message = $this->mailer->createMessage();
				$message->setTo([$email => $user->getUID()]);
				$message->setSubject($this->l10n->t('%s password changed successfully', [$this->defaults->getName()]));
				$message->setPlainBody($msg);
				$message->setFrom([$fromMailAddress => $this->defaults->getName()]);
				$this->mailer->send($message);
				return true;
			} catch (\Exception $exception) {
				throw new EmailSendFailedException("Email could not be sent.");
			}
		}
		return false;
	}
}
