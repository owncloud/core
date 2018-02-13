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

namespace OCA\NotificationsMail\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IUserSession;
use OCP\IConfig;

class NotificationOptionsController extends Controller {
	/** @var IUserSession */
	private $userSession;
	/** @var IConfig */
	private $config;

	public function __construct(IUserSession $userSession, IConfig $config) {
		$this->userSession = $userSession;
		$this->config = $config;
	}

	/**
	 * @NoAdminRequired
	 * @param string $value any of ["never", "action", "always"]
	 * @return JSONResponse
	 */
	public function setEmailNotificationOption($value) {
		$userObject = $this->userSession->getUser();
		if ($userObject === null) {
			return new JSONResponse([
				'data' => [
					'message' => 'Unknown user session. It is not possible to set the option'
				]
			], Http::STATUS_UNAUTHORIZED);
		}

		$validOptions = ['never' => true, 'action' => true, 'always' => true];
		if (isset($validOptions[$value])) {
			$this->config->setUserValue($userObject->getUID(), 'notificationsmail', 'email_sending_option', $value);
			return new JSONResponse([
				'data' => [
					'optionSet' => $value,
					'message' => 'Saved'
				]
			]);
		} else {
			return new JSONResponse([
				'data' => [
					'message' => 'Option not supported'
				]
			], Http::STATUS_BAD_REQUEST);
		}
	}
}
