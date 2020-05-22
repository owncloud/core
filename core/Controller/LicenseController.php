<?php
/**
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

namespace OC\Core\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;
use OCP\License\ILicenseManager;

class LicenseController extends Controller {
	/** @var ILicenseManager */
	private $licenseManager;

	/**
	 * @param ILicenseManager $licenseManager
	 */
	public function __construct($appName, IRequest $request, ILicenseManager $licenseManager) {
		parent::__construct($appName, $request);
		$this->licenseManager = $licenseManager;
	}

	/**
	 * Get the grace period start and end, with the number of apps actively using
	 * the grace period
	 * @return JSONResponse
	 */
	public function getGracePeriod() {
		$gracePeriod = $this->licenseManager->getGracePeriod(true);
		// change the list of the apps by the counter to avoid exposing info
		if (isset($gracePeriod['apps'])) {
			$gracePeriod['apps'] = \count($gracePeriod['apps']);
		}
		return new JSONResponse($gracePeriod);
	}

	/**
	 * Set a new license string to be used by ownCloud
	 * @param string $licenseString
	 * @return JSONResponse
	 */
	public function setNewLicense($licenseString) {
		$this->licenseManager->setLicenseString($licenseString);
		return new JSONResponse();
	}

	/**
	 * Get the information about the state of the license for the target app.
	 * @param string $app
	 * @return JSONResponse
	 */
	public function getLicenseMessage(string $app) {
		return new JSONResponse($this->licenseManager->getLicenseMessageFor($app));
	}
}
