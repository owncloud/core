<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Settings\Controller;

use OC\AppFramework\Http;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\PreConditionNotMetException;

/**
 * @package OC\Settings\Controller
 */
class TimezoneController extends Controller {

	/** @var IRequest */
	protected $request;
	/** @var IConfig  */
	protected $config;
	/** @var IL10N  */
	protected $l;
	/** @var IUserSession  */
	protected $session;

	public function __construct(
		$appName,
		IRequest $request,
		IConfig $config,
		IL10N $l,
		IUserSession $session
	) {
		parent::__construct($appName, $request);
		$this->request = $request;
		$this->config = $config;
		$this->l = $l;
		$this->session = $session;
	}

	/**
	 * @NoAdminRequired
	 */
	public function set() {

		$available = \DateTimeZone::listIdentifiers();
		if (!in_array($this->request->getParam('timezoneInput'), $available, true)) {
			return new JSONResponse(
				['message' => $this->l->t('Timezone not recognised')],
				Http::STATUS_BAD_REQUEST);
		}
		try {
			$this->config->setUserValue(
				$this->session->getUser()->getUID(),
				'core',
				'timezone',
				$this->request->getParam('timezoneInput'));
			return new JSONResponse(
				['message' => $this->l->t('Done')],
				Http::STATUS_ACCEPTED);
		} catch (PreConditionNotMetException $e) {
			return new JSONResponse(
				['message' => $this->l->t('Could not save configuration')],
				Http::STATUS_INTERNAL_SERVER_ERROR);
		}
	}

}
