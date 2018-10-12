<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\Files_Sharing\Controller;

use OCA\Files_Sharing\API\Share20OCS;
use OCP\AppFramework\OCSController;
use OCP\IRequest;

/**
 * Class Share20OcsController
 *
 * @package OCA\Files_Sharing\Controller
 */
class Share20OcsController extends OCSController {
	/** @var Share20OCS */
	private $share20Ocs;

	public function __construct($appName, IRequest $request, Share20OCS $share20Ocs) {
		parent::__construct($appName, $request);
		$this->share20Ocs = $share20Ocs;
	}

	public function getShares() {
		return $this->share20Ocs->getShares();
	}

	public function createShare() {
		return $this->share20Ocs->createShare();
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function getShare($id) {
		return $this->share20Ocs->getShare($id);
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function updateShare($id) {
		return $this->share20Ocs->updateShare($id);
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function deleteShare($id) {
		return $this->share20Ocs->deleteShare($id);
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function acceptShare($id) {
		return $this->share20Ocs->acceptShare($id);
	}

	/**
	 * @param int $id
	 * @return \OC\OCS\Result
	 */
	public function declineShare($id) {
		return $this->share20Ocs->declineShare($id);
	}
}
