<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\OCS;

use OCP\Capabilities\ICapability;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\Util;

/**
 * Class Capabilities
 *
 * @package OC\OCS
 */
class CoreCapabilities implements ICapability {
	private IConfig $config;
	private IURLGenerator $generator;

	public function __construct(IConfig $config, IURLGenerator $generator) {
		$this->config = $config;
		$this->generator = $generator;
	}

	/**
	 * Return this classes capabilities
	 */
	public function getCapabilities(): array {
		return [
			'core' => [
				// pollinterval is an integer number of milliseconds
				'pollinterval' => $this->config->getSystemValue('pollinterval', 30000),
				'webdav-root' => $this->config->getSystemValue('webdav-root', 'remote.php/webdav'),
				'status' => Util::getStatusInfo(true),
				'support-url-signing' => true,
			],
			'files' => [
				"app_providers" => [[
					"enabled" => true,
					"version" => "1.1.0",
					"apps_url" => $this->generator->linkToRoute("core.AppRegistry.list"),
					# "open_url" => $this->generator->linkToRoute("core.AppRegistry.open"),
					"open_web_url" => $this->generator->linkToRoute("core.AppRegistry.openWithWeb"),
					"new_url" => $this->generator->linkToRoute("core.AppRegistry.new")
				]]
			]
		];
	}
}
