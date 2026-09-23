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
 * All methods require full admin privileges.
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
	 * Get the list of apps
	 */
	public function getApps() {
		return new JSONResponse($this->appConfig->getApps());
	}

	/**
	 * Get the list of keys for that particular app
	 * @param string $app
	 */
	public function getKeys($app) {
		return new JSONResponse($this->appConfig->getKeys($app));
	}

	/**
	 * Get the value of the key for that app, or the default value provided
	 * if it's missing.
	 * @param string $app
	 * @param string $key
	 * @param string $default
	 */
	public function getValue($app, $key, $default = null) {
		if (!\is_string($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		// a stored handler path must not be readable back either, so the read path
		// carries the same pair of guards as setValue()/deleteKey() - not because a
		// read can fold (it cannot: OC\AppConfig::getValue() is an exact lookup in
		// the preloaded cache, so the database collation never sees the key), but so
		// that the three entry points stay one predicate and cannot drift apart
		if (\OC_App::isProtectedCoreServiceKey($app, $key)
			|| (\OC_App::isCoreApp($app) && !\OC_App::isCanonicalConfigKey($key))
		) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
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
		}
		// a non-canonical app id must never be written, because the database may
		// fold it onto an existing row - "core" above all
		if (!\OC_App::isCanonicalAppId($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		// the key is only charset-checked on core below, but a non-string one has to
		// go for every app: it reaches OC\AppConfig as an array subscript, which is
		// an "Illegal offset type" warning on PHP 7 and a TypeError on PHP 8, and
		// then binds as "Array"
		if (!\is_string($key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		// An admin should not be able to add remote and public services
		// on its own. This should only be possible programmatically.
		// This change is due the fact that an admin may not be expected
		// to execute arbitrary code in every environment.
		if (\OC_App::isProtectedCoreServiceKey($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		if (\OC_App::isCoreApp($app) && !\OC_App::isCanonicalConfigKey($key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		return new JSONResponse($this->appConfig->setValue($app, $key, $value));
	}

	/**
	 * Delete the key from the app
	 * @param string $app
	 * @param string $key
	 */
	public function deleteKey($app, $key) {
		if (!isset($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		// as in setValue(), a non-string of either kind must not reach OC\AppConfig,
		// where it would be used as an array subscript
		if (!\is_string($app) || !\is_string($key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		// Deliberately no blanket isCanonicalAppId() here, unlike setValue()/
		// deleteApp(): a row written under a non-canonical app id before that guard
		// existed - or by occ, or by an app calling setAppValue() - must stay
		// removable. It may only be removed key by key and only for a plainly
		// harmless key, though. isCoreApp() compares a normalized string, so it
		// cannot see a spelling that only the collation folds onto "core": on an
		// accent-insensitive collation - utf8mb4_general_ci or utf8mb4_0900_ai_ci,
		// which is the MySQL default whenever the database is pre-created rather
		// than created by ownCloud - deleting "córe"/"public_webdav" would remove
		// core's registered handler, and it is only re-registered on an app version
		// bump. Canonical app ids are untouched, so files_sharing keeps its
		// legitimate public_share_* keys.
		if (!\OC_App::isCanonicalAppId($app)
			&& (!\OC_App::isCanonicalConfigKey($key) || \OC_App::isServiceHandlerKey($key))
		) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		if (\OC_App::isProtectedCoreServiceKey($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		if (\OC_App::isCoreApp($app) && !\OC_App::isCanonicalConfigKey($key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		return new JSONResponse($this->appConfig->deleteKey($app, $key));
	}

	/**
	 * Delete the app from the appconfig. Note that this just deletes the stored
	 * keys in the appconfig. It won't touch the app in any other way
	 * @param string $app
	 */
	public function deleteApp($app) {
		if (!isset($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		// isCoreApp() below compares a normalized string, so it cannot recognise a
		// spelling only the database folds onto "core" (an accent-insensitive
		// collation turns a delete of "córe" into a delete of every core row). The
		// canonical charset is what makes that guard complete, so unlike
		// deleteKey() this path keeps it.
		if (!\OC_App::isCanonicalAppId($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		// Deleting the whole "core" appconfig would drop the programmatically
		// managed remote_/public_ service handlers (and all other core config),
		// so it must never be possible through this admin-facing controller.
		if (\OC_App::isCoreApp($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		return new JSONResponse($this->appConfig->deleteApp($app));
	}
}
