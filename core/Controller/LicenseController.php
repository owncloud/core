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

	public function getGracePeriod() {
		$gracePeriod = $this->licenseManager->getGracePeriod();
		return new JSONResponse($gracePeriod);
	}

	/**
	 * @param string|null $licenseString
	 */
	public function setNewLicense($licenseString) {
		$this->licenseManager->setLicenseString($licenseString);
		return new JSONResponse();
	}
}
