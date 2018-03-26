<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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

namespace OCA\Testing;

use OCP\IRequest;

/**
 * managing apps through testing app
 *
 */
class AppManager {
	/**
	 *
	 * @var IRequest
	 */
	private $request;
	
	/**
	 * List of apps that can be installed
	 * @var array
	 */
	private $apps = ['notifications'];
	/**
	 *
	 * @param IRequest $request
	 */
	public function __construct(IRequest $request) {
		$this->request = $request;
	}
	
	public function enableApp($parameters) {
		$app = $parameters['appid'];
		if (!in_array($app, $this->apps)) {
			throw new \InvalidArgumentException("this app cannot be installed");
		}
		$download = $this->request->getParam("download", "");
		$branch = $this->request->getParam("branch", "");
		$branch = filter_var(
			$branch, FILTER_SANITIZE_STRING,
			FILTER_FLAG_STRIP_LOW |
			FILTER_FLAG_STRIP_HIGH |
			FILTER_FLAG_STRIP_BACKTICK
		);
		if ($branch === false) {
			throw new \InvalidArgumentException("invalid branch name");
		}
		if ($branch === "") {
			$branch = "master";
		}
		if ($download === "true") {
			$downloadedFile = tempnam(sys_get_temp_dir(), "download-");
			if ($downloadedFile === false) {
				throw new \Exception("could not create temporary file name");
			}
			$downloadedFile .= ".zip";
		
			$downloadUrl="https://github.com/owncloud/$app/archive/$branch.zip";
			$remoteRessource = fopen($downloadUrl, 'r');
			if ($remoteRessource === false) {
				throw new \Exception("could not download from $downloadUrl");
			}
			
			if (file_put_contents($downloadedFile, $remoteRessource) === false) {
				throw new \Exception("could not download from $downloadUrl");
			}
			$zip = new \ZipArchive;
			$res = $zip->open($downloadedFile);
			if ($res !== true) {
				throw new \Exception("could not app ZIP archive: $res");
			}
			$appPath = \OC_App::getInstallPath();
			if (!is_string($appPath)) {
				throw new \Exception("no valid installation path found");
			}
			if (!$zip->extractTo("$appPath/$app")) {
				throw new \Exception("could not extract app ZIP archive");
			}
			$zip->close();
		}
		\OC_App::enable($app);
	}
}
