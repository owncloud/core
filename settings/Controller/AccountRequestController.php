<?php
/**
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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

namespace OC\Settings\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\Mail\IMailer;

/**
 * Class LogSettingsController
 *
 * @package OC\Settings\Controller
 */
class AccountRequestController extends Controller {
	/**
	 * @var IUserSession
	 */
	private $userSession;

	/**
	 * @var IGroupManager
	 */
	private $groupManager;

	/**
	 * @var \OCP\IL10N
	 */
	private $l10n;

	/**
	 * @var IMailer
	 */
	private $mailer;

	/** @var string */
	private $defaultMailAddress;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 * @param IMailer $mailer
	 * @param string $defaultMailAddress
	 */
	public function __construct(
		$appName,
		IRequest $request,
		IUserSession $userSession,
		IGroupManager $groupManager,
		IL10N $l10n,
		IMailer $mailer,
		$defaultMailAddress
	) {
		parent::__construct($appName, $request);
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->l10n = $l10n;
		$this->mailer = $mailer;
		$this->defaultMailAddress = $defaultMailAddress;
	}

	/**
	 * Request data export
	 *
	 * @NoCSRFRequired
	 *
	 * @return JSONResponse
	 */
	public function requestDataExport() {
		$user = $this->userSession->getUser();

		try {
			$message = $this->mailer->createMessage();
			$message->setTo($this->getRecipients());
			$message->setFrom([$this->defaultMailAddress]);
			$message->setSubject($this->l10n->t('Data export requested'));
			$message->setPlainBody($this->l10n->t('The user %s (%s) has requested a data export for their user account.', [$user->getUID(), $user->getEMailAddress()]));
			$this->mailer->send($message);
		} catch (\Exception $e) {
			return new JSONResponse([
				'data' => [
					'message' => (string) $this->l10n->t('A problem occurred while sending the email.', [$e->getMessage()]),
				],
				'status' => 'error',
			], Http::STATUS_INTERNAL_SERVER_ERROR);
		}

		return new JSONResponse([], Http::STATUS_ACCEPTED);
	}

	/**
	 * Request account deletion
	 *
	 * @NoCSRFRequired
	 *
	 * @return JSONResponse
	 */
	public function requestAccountDeletion() {
		$user = $this->userSession->getUser();

		try {
			$message = $this->mailer->createMessage();
			$message->setTo($this->getRecipients());
			$message->setFrom([$this->defaultMailAddress]);
			$message->setSubject($this->l10n->t('Account deletion requested'));
			$message->setPlainBody($this->l10n->t('The user %s (%s) has requested their account deletion.', [$user->getUID(), $user->getEMailAddress()]));
			$this->mailer->send($message);
		} catch (\Exception $e) {
			return new JSONResponse([
				'data' => [
					'message' => (string) $this->l10n->t('A problem occurred while sending the email.', [$e->getMessage()]),
				],
				'status' => 'error',
			], Http::STATUS_INTERNAL_SERVER_ERROR);
		}

		return new JSONResponse([], Http::STATUS_ACCEPTED);
	}

	/**
	 * Request role change
	 *
	 * @NoCSRFRequired
	 *
	 * @param string $msg
	 * @return JSONResponse
	 */
	public function requestRoleChange($msg) {
		$user = $this->userSession->getUser();

		try {
			$message = $this->mailer->createMessage();
			$message->setTo($this->getRecipients());
			$message->setFrom([$this->defaultMailAddress]);
			$message->setSubject($this->l10n->t('Role change requested'));
			$message->setPlainBody($this->l10n->t('The user %s (%s) has requested a role change. Their message: %s', [$user->getUID(), $user->getEMailAddress(), $msg]));
			$this->mailer->send($message);
		} catch (\Exception $e) {
			return new JSONResponse([
				'data' => [
					'message' => (string) $this->l10n->t('A problem occurred while sending the email.', [$e->getMessage()]),
				],
				'status' => 'error',
			], Http::STATUS_INTERNAL_SERVER_ERROR);
		}

		return new JSONResponse([], Http::STATUS_ACCEPTED);
	}

	/**
	 * Get the recipients for receiving the emails (= all admins).
	 *
	 * @return array
	 */
	private function getRecipients() {
		$adminGrp = $this->groupManager->get('admin');
		$admins = $this->groupManager->findUsersInGroup($adminGrp->getGID());
		$recipients = [];
		foreach ($admins as $admin) {
			$email = $admin->getEMailAddress();
			if ($email) {
				$recipients[$email] = $admin->getUID();
			}
		}

		return $recipients;
	}
}
