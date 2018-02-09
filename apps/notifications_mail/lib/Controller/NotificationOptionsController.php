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

namespace OCA\notifications_mail\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IUserSession;
use OCP\IConfig;
use OCP\IL10N;

class NotificationOptionsController extends Controller {
	/** @var IUserSession */
	private $userSession;
	/** @var IConfig */
	private $config;
	/** @var IL10N */
	private $l10n;

	public function __construct(IUserSession $userSession, IConfig $config, IL10N $l10n) {
		$this->userSession = $userSession;
		$this->config = $config;
		$this->l10n = $l10n;
	}

	/**
	 * @param string $value any of ["never", "action", "always"]
	 * @return JSONResponse
	 */
	public function setEmailNotificationOption($value) {
		$validOptions = ['never' => true, 'action' => true, 'always' => true];
		if (isset($validOptions[$value])) {
			$this->config->setUserValue($this->userSession->getUser()->getUID(), 'notifications_mail', 'email_sending_option', $value);
			return new JSONResponse([
				'status' => 'success',
				'data' => [
					'optionSet' => $value,
					'message' => $this->l10n->t('Saved')
				]
			]);
		} else {
			return new JSONResponse([
				'status' => 'failure',
				'data' => [
					'message' => $this->l10n->t('Invalid value')
				]
			], Http::STATUS_BAD_REQUEST);
		}
	}
}
