<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Provisioning_API\Controller;

use OC_App;
use OC\OCS\Result;
use OCP\App\IAppManager;
use OCP\AppFramework\OCSController;
use OCP\IRequest;

class AppsController extends OCSController {
	/** @var IAppManager */
	private $appManager;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IAppManager $appManager
	 */
	public function __construct($appName, IRequest $request, IAppManager $appManager) {
		parent::__construct($appName, $request);
		$this->appManager = $appManager;
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param string $filter
	 * @return Result
	 */
	public function getApps($filter = '') {
		$apps = OC_App::listAllApps();
		$list = [];
		foreach ($apps as $app) {
			$list[] = $app['id'];
		}

		if ($filter !== '') {
			switch ($filter) {
				case 'enabled':
					return new Result(['apps' => \OC_App::getEnabledApps()]);
					break;
				case 'disabled':
					$enabled = OC_App::getEnabledApps();
					return new Result(['apps' => \array_diff($list, $enabled)]);
					break;
				default:
					// Invalid filter variable
					return new Result(null, 101);
					break;
			}
		} else {
			return new Result(['apps' => $list]);
		}
	}

	/**
	 * @NoCSRFRequired
	 *
	 * @param string $appId
	 * @return Result
	 */
	public function getAppInfo($appId) {
		$info = \OCP\App::getAppInfo($appId);
		if ($info !== null) {
			return new Result(OC_App::getAppInfo($appId));
		} else {
			return new Result(null, \OCP\API::RESPOND_NOT_FOUND, 'The request app was not found');
		}
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param string $appId
	 * @return Result
	 */
	public function enable($appId) {
		$this->appManager->enableApp($appId);
		return new Result(null, 100);
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param string $appId
	 * @return Result
	 */
	public function disable($appId) {
		$this->appManager->disableApp($appId);
		return new Result(null, 100);
	}
}
