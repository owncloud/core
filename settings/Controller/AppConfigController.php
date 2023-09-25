<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

use OCP\IAppConfig;
use OCP\IRequest;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;

/**
 * The code is mostly copied from core/ajax/appconfig.php
 * Read methods (getApps, getKeys and getValue) are available to subadmins,
 * which wasn't possible with the core/ajax/appconfig.php file. The rest of
 * the methods require admin privileges.
 * Note that the "hasKey" method is missing. You can do the same in a lot of
 * cases by trying to get the value of the key.
 *
 * @package OC\Settings\Controller
 */
class AppConfigController extends Controller {
	/** @var IAppConfig */
	private $appConfig;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IAppConfig $appConfig
	 */
	public function __construct(
		$appName,
		IRequest $request,
		IAppConfig $appConfig
	) {
		parent::__construct($appName, $request);
		$this->appConfig = $appConfig;
	}

	/**
	 * @NoAdminRequired
	 *
	 * Get the list of apps
	 */
	public function getApps() {
		return new JSONResponse($this->appConfig->getApps());
	}

	/**
	 * @NoAdminRequired
	 *
	 * Get the list of keys for that particular app
	 * @param string $app
	 */
	public function getKeys($app) {
		return new JSONResponse($this->appConfig->getKeys($app));
	}

	/**
	 * @NoAdminRequired
	 *
	 * Get the value of the key for that app, or the default value provided
	 * if it's missing.
	 * @param string $app
	 * @param string $key
	 * @param string $default
	 */
	public function getValue($app, $key, $default = null) {
		return new JSONResponse($this->appConfig->getValue($app, $key, $default));
	}

	/**
	 * Set the value for the target key in the app. If no value is provided,
	 * the request will fail.
	 * @param string $app
	 * @param string $key
	 * @param string $value
	 */
	public function setValue($app, $key, $value) {
		if (!isset($app, $key, $value)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		} else {
			return new JSONResponse($this->appConfig->setValue($app, $key, $value));
		}
	}

	/**
	 * Delete the key from the app
	 * @param string $app
	 * @param string $key
	 */
	public function deleteKey($app, $key) {
		if (!isset($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		} else {
			return new JSONResponse($this->appConfig->deleteKey($app, $key));
		}
	}

	/**
	 * Delete the app from the appconfig. Note that this just deletes the stored
	 * keys in the appconfig. It won't touch the app in any other way
	 * @param string $app
	 */
	public function deleteApp($app) {
		if (!isset($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		} else {
			return new JSONResponse($this->appConfig->deleteApp($app));
		}
	}
}
