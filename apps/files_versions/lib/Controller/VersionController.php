<?php
/**
 * @author Jannik Stehle <jstehle@owncloud.com>
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OCA\Files_Versions\Controller;

use OCA\Files_Versions\Storage;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\ILogger;
use OCP\IRequest;
use OCP\AppFramework\Http\JSONResponse;

/**
 * Class VersionController
 *
 * @package OCA\Files\Controller
 */
class VersionController extends Controller {
	/** @var ILogger */
	private $logger;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param ILogger $logger
	 */
	public function __construct(
		$appName,
		IRequest $request,
		ILogger $logger
	) {
		parent::__construct($appName, $request);
		$this->logger = $logger;
	}

	/**
	 * Publish current version
	 *
	 * @NoAdminRequired
	 *
	 * @param string $path
	 * @return JSONResponse
	 */
	public function publishVersion($path) {
		try {
			Storage::publishCurrentVersion($path);
		} catch (\Exception $e) {
			$this->logger->logException($e, ['app' => 'files_versions']);
			return new JSONResponse([], Http::STATUS_INTERNAL_SERVER_ERROR);
		}

		return new JSONResponse();
	}
}
