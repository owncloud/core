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

namespace OCA\Files_Versions\Controller;

use OCA\Files_Versions\Storage;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\IConfig;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\AppFramework\Http\JSONResponse;

/**
 * Class VersionController
 *
 * @package OCA\Files\Controller
 */
class VersionController extends Controller {
	/**
	 * @param string $appName
	 * @param IRequest $request
	 */
	public function __construct($appName, IRequest $request) {
		parent::__construct($appName, $request);
	}

	/**
	 * Publish
	 *
	 * @NoAdminRequired
	 *
	 * @param string $path
	 * @return JSONResponse
	 */
	public function publishVersion($path) {
		try {
			Storage::publish($path);
		} catch (\Exception $e) {
			return new JSONResponse([], Http::STATUS_INTERNAL_SERVER_ERROR);
		}

		return new JSONResponse();
	}
}
