<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace Test\Route;

/**
 * The front controller rewrite in .htaccess only forwards a request to
 * index.php when the requested path does NOT exist on disk:
 *
 *   RewriteCond %{REQUEST_FILENAME} !-f
 *   RewriteRule . index.php [PT,E=PATH_INFO:$1]
 *
 * A route whose url maps onto a real .php file is therefore unreachable
 * through the router - the web server executes that script directly, without
 * the bootstrap that base.php/index.php would have done, and the request dies
 * with 'Class "OC" not found'. See the personal language endpoint, which used
 * to be posted to as /settings/ajax/setlanguage.php.
 *
 * This guards the endpoints the web ui posts to against regressing into that
 * shape again.
 */
class RouteShadowingTest extends \Test\TestCase {
	/**
	 * Urls the js of the web ui posts to, which therefore have to survive the
	 * front controller rewrite.
	 */
	public function providesUiEndpoints() {
		return [
			'personal language' => ['/settings/personal/changelanguage'],
			'personal password' => ['/settings/personal/changepassword'],
		];
	}

	/**
	 * @dataProvider providesUiEndpoints
	 * @param string $url
	 */
	public function testUiEndpointIsNotShadowedByAFileOnDisk($url) {
		$path = \OC::$SERVERROOT . '/' . \ltrim($url, '/');

		$this->assertFileDoesNotExist(
			$path,
			"The route $url is shadowed by a real file on disk. The front " .
			'controller rewrite skips existing files, so this endpoint would ' .
			'be executed without a bootstrap and fail with "Class OC not found".'
		);
	}

	public function testPersonalLanguageRouteIsRegistered() {
		$routes = \file_get_contents(\OC::$SERVERROOT . '/settings/routes.php');

		$this->assertStringContainsString(
			'/settings/personal/changelanguage',
			$routes,
			'The personal language endpoint must be routed through the front controller.'
		);
	}

	public function testPersonalProfileJsDoesNotPostToARelativeScriptPath() {
		$js = \file_get_contents(\OC::$SERVERROOT . '/settings/js/panels/profile.js');

		$this->assertStringNotContainsString(
			"'ajax/setlanguage.php'",
			$js,
			'The language selector must build its url with OC.generateUrl() so ' .
			'the request is routed instead of hitting the script on disk.'
		);
		$this->assertStringContainsString(
			"OC.generateUrl('/settings/personal/changelanguage')",
			$js,
			'The language selector must post to the routed endpoint.'
		);
	}
}
