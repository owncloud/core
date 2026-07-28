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
 * A route whose url maps onto a real file is therefore unreachable through the
 * router - the web server executes that script directly, without the bootstrap
 * base.php/index.php would have done, and the request dies with
 * 'Class "OC" not found'. That is why route urls must not carry a .php suffix
 * that matches the script they include, e.g. /settings/ajax/setlanguage for
 * settings/ajax/setlanguage.php.
 */
class RouteShadowingTest extends \Test\TestCase {
	/**
	 * core/ajax/update.php bootstraps itself, is excluded from the rewrite in
	 * \OC\Setup::updateHtaccess() and is requested by its real path in
	 * core/js/update.js - so it is allowed to be served from disk.
	 */
	private const ALLOWED_TO_BE_SERVED_FROM_DISK = [
		'/core/ajax/update.php',
	];

	/**
	 * Every routes file shipped with core, as
	 * [<description> => [<path to routes file>, <app id or null for core>]].
	 *
	 * @return array
	 */
	public function providesRoutingFiles(): array {
		$files = [
			'core' => ['core/routes.php', null],
			'settings' => ['settings/routes.php', null],
		];
		foreach (\glob(\OC::$SERVERROOT . '/apps/*/appinfo/routes.php') as $file) {
			$app = \basename(\dirname(\dirname($file)));
			$files[$app] = ['apps/' . $app . '/appinfo/routes.php', $app];
		}
		return $files;
	}

	/**
	 * @dataProvider providesRoutingFiles
	 * @param string $routesFile
	 * @param string|null $app
	 */
	public function testNoRouteUrlIsShadowedByAFileOnDisk($routesFile, $app): void {
		$shadowed = [];
		foreach ($this->getRouteUrls($routesFile, $app) as $url) {
			if (\in_array($url, self::ALLOWED_TO_BE_SERVED_FROM_DISK, true)) {
				continue;
			}
			if (\is_file(\OC::$SERVERROOT . $url)) {
				$shadowed[] = $url;
			}
		}

		$this->assertSame(
			[],
			$shadowed,
			"$routesFile declares route urls which are real files on disk. The " .
			'front controller rewrite skips existing files, so these endpoints ' .
			'would be executed without a bootstrap and fail with "Class OC not ' .
			'found". Drop the file extension from the url - the include target ' .
			'stays as it is.'
		);
	}

	/**
	 * A route which includes a script that no longer exists is dead weight and
	 * responds with a fatal error rather than a 404.
	 *
	 * @dataProvider providesRoutingFiles
	 * @param string $routesFile
	 * @param string|null $app
	 */
	public function testEveryActionIncludeTargetExists($routesFile, $app): void {
		$missing = [];
		foreach ($this->getIncludeTargets($routesFile) as $target) {
			if ($this->resolveOnIncludePath($target) === null) {
				$missing[] = $target;
			}
		}

		$this->assertSame(
			[],
			$missing,
			"$routesFile includes scripts which do not exist any more. Remove " .
			'the route together with the callers of it.'
		);
	}

	/**
	 * Urls the js of the web ui posts to, which therefore have to survive the
	 * front controller rewrite.
	 */
	public function providesUiEndpoints(): array {
		return [
			'personal language' => ['/settings/ajax/setlanguage'],
			'personal password' => ['/settings/personal/changepassword'],
			'share' => ['/core/ajax/share'],
			'trashbin preview' => ['/apps/files_trashbin/ajax/preview'],
			'public preview' => ['/apps/files_sharing/ajax/publicpreview'],
		];
	}

	/**
	 * @dataProvider providesUiEndpoints
	 * @param string $url
	 */
	public function testUiEndpointIsNotShadowedByAFileOnDisk($url): void {
		$this->assertFileDoesNotExist(
			\OC::$SERVERROOT . $url,
			"The route $url is shadowed by a real file on disk. The front " .
			'controller rewrite skips existing files, so this endpoint would ' .
			'be executed without a bootstrap and fail with "Class OC not found".'
		);
	}

	public function testPersonalProfileJsDoesNotPostToARelativeScriptPath(): void {
		$js = \file_get_contents(\OC::$SERVERROOT . '/settings/js/panels/profile.js');

		$this->assertStringNotContainsString(
			"'ajax/setlanguage.php'",
			$js,
			'The language selector must build its url with OC.generateUrl() so ' .
			'the request is routed instead of hitting the script on disk.'
		);
		$this->assertStringContainsString(
			"OC.generateUrl('/settings/ajax/setlanguage')",
			$js,
			'The language selector must post to the routed endpoint.'
		);
	}

	/**
	 * All urls declared in a routes file, normalized the way the router does:
	 * a relative url of an app route is prefixed with /apps/<appid>, see
	 * \OC\Route\Router::loadRoutes().
	 *
	 * @param string $routesFile
	 * @param string|null $app
	 * @return string[]
	 */
	private function getRouteUrls($routesFile, $app): array {
		$content = \file_get_contents(\OC::$SERVERROOT . '/' . $routesFile);

		$urls = [];
		// $this->create('name', 'url')
		\preg_match_all(
			"/create\\(\\s*'[^']+'\\s*,\\s*'([^']*)'/",
			$content,
			$matches
		);
		$urls = $matches[1];
		// 'url' => '...' of the registerRoutes()/AppFramework style declarations
		\preg_match_all("/'url'\\s*=>\\s*'([^']*)'/", $content, $matches);
		$urls = \array_merge($urls, $matches[1]);

		return \array_map(function ($url) use ($app) {
			$url = '/' . \ltrim($url, '/');
			if ($app !== null) {
				$url = '/apps/' . $app . $url;
			}
			return $url;
		}, $urls);
	}

	/**
	 * @param string $routesFile
	 * @return string[]
	 */
	private function getIncludeTargets($routesFile): array {
		$content = \file_get_contents(\OC::$SERVERROOT . '/' . $routesFile);
		\preg_match_all("/actionInclude\\(\\s*'([^']+)'/", $content, $matches);
		return $matches[1];
	}

	/**
	 * actionInclude() targets are required relative to the include path, which
	 * holds the server root and every configured apps directory, see
	 * OC::initPaths().
	 *
	 * @param string $target
	 * @return string|null
	 */
	private function resolveOnIncludePath($target): ?string {
		$roots = [\OC::$SERVERROOT];
		foreach (\OC::$APPSROOTS as $appsRoot) {
			$roots[] = $appsRoot['path'];
		}
		foreach ($roots as $root) {
			if (\is_file($root . '/' . $target)) {
				return $root . '/' . $target;
			}
		}
		return null;
	}
}
