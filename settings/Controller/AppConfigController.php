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
		if ($this->isProtectedCoreServiceKey($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		return new JSONResponse($this->appConfig->getValue($app, $key, $default));
	}

	/**
	 * Whether the given app/key pair targets a protected "core" remote_/public_
	 * service handler. These handlers are require_once'd by remote.php/public.php
	 * and may only be registered programmatically (from an app's info.xml), never
	 * through this admin-facing controller, otherwise an admin can point them at
	 * an arbitrary file and achieve code execution.
	 *
	 * The app name is normalized before the comparison so that mangled spellings
	 * which the database folds back to the "core" row (e.g. "core " with a
	 * trailing space, "CORE", "core/") cannot slip past the guard. The key prefix
	 * is matched case-insensitively for the same reason: under a case-insensitive
	 * collation "PUBLIC_webdav" folds onto the stored "public_webdav" row, so a
	 * case-sensitive prefix test would let an admin overwrite it. Note this is
	 * best-effort defense-in-depth: the authoritative protection against traversal
	 * is the containment check at the include sites in public.php/remote.php.
	 *
	 * @param string $app
	 * @param string $key
	 * @return bool
	 */
	private function isProtectedCoreServiceKey($app, $key) {
		return $this->isCoreApp($app)
			&& \is_string($key) && \preg_match('/^(?:remote|public)_/i', $key) === 1;
	}

	/**
	 * Whether the given (possibly mangled) app id resolves to the "core" app.
	 * The name is stripped and normalized so that spellings which the database
	 * folds back to the "core" row (e.g. "core " with a trailing space, "CORE",
	 * "core/") are all recognised.
	 *
	 * @param string $app
	 * @return bool
	 */
	private function isCoreApp($app) {
		return \strtolower(\trim(\OC_App::cleanAppId((string)$app))) === 'core';
	}

	/**
	 * Whether the app id is a canonical ownCloud app id, i.e. one an app could
	 * actually be installed under.
	 *
	 * Recognising individual mangled spellings of "core" can never be complete,
	 * because the only requirement for a bypass is that the written app id compares
	 * equal to "core" under the database collation - an open set which depends on
	 * the deployment (blank padding, accent-insensitive collations, silent
	 * truncation into the varchar(32) appid column, invalid byte sequences). Every
	 * such spelling needs a character outside this charset, so refusing
	 * non-canonical app ids outright closes the whole class instead of enumerating
	 * it. Case is deliberately still accepted here - this endpoint has always taken
	 * mixed-case ids, and a case-insensitive collation is already covered because
	 * isCoreApp() lowercases before comparing.
	 *
	 * @param string $app
	 * @return bool
	 */
	private function isCanonicalAppId($app) {
		// \z, not $: PCRE's $ also matches before a single trailing newline, which
		// would let "<32 chars>\n" through to be truncated onto an existing row
		return \is_string($app) && \preg_match('/^[a-zA-Z0-9_.-]{1,32}\z/', $app) === 1;
	}

	/**
	 * Whether the config key is a canonical one, i.e. one the database cannot fold
	 * onto a different key. This mirrors isCanonicalAppId() for the key column
	 * (varchar(64)) and is only enforced for the "core" app, where a fold onto a
	 * stored `public_*`/`remote_*` row would overwrite a service handler: an
	 * accent-insensitive collation folds "públic_webdav" onto "public_webdav",
	 * which no prefix test can catch.
	 *
	 * @param string $key
	 * @return bool
	 */
	private function isCanonicalConfigKey($key) {
		return \is_string($key) && \preg_match('/^[a-zA-Z0-9_.-]{1,64}\z/', $key) === 1;
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
		if (!$this->isCanonicalAppId($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		// An admin should not be able to add remote and public services
		// on its own. This should only be possible programmatically.
		// This change is due the fact that an admin may not be expected
		// to execute arbitrary code in every environment.
		if ($this->isProtectedCoreServiceKey($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		if ($this->isCoreApp($app) && !$this->isCanonicalConfigKey($key)) {
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
		if (!$this->isCanonicalAppId($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		if ($this->isProtectedCoreServiceKey($app, $key)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}
		if ($this->isCoreApp($app) && !$this->isCanonicalConfigKey($key)) {
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
		if (!$this->isCanonicalAppId($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		// Deleting the whole "core" appconfig would drop the programmatically
		// managed remote_/public_ service handlers (and all other core config),
		// so it must never be possible through this admin-facing controller.
		if ($this->isCoreApp($app)) {
			return new JSONResponse([], Http::STATUS_BAD_REQUEST);
		}

		return new JSONResponse($this->appConfig->deleteApp($app));
	}
}
