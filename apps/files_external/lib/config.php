<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Frank Karlitschek <frank@karlitschek.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Kapfer <philipp.kapfer@gmx.at>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

use OCA\Files_External\AppInfo\Application;
use OCP\Files\External\Backend\Backend;

/**
 * Class to configure mount.json globally and for users
 */
class OC_Mount_Config extends \OC\Files\External\LegacyUtil {
	/** @var Application */
	public static $app;

	/**
	 * Get backend dependency message
	 * TODO: move into AppFramework along with templates
	 *
	 * @param Backend[] $backends
	 * @return string
	 */
	public static function dependencyMessage($backends) {
		$l = \OC::$server->getL10N('files_external');
		$message = '';
		$dependencyGroups = [];

		foreach ($backends as $backend) {
			foreach ($backend->checkDependencies() as $dependency) {
				if ($message = $dependency->getMessage()) {
					$message .= '<br />' . $l->t('<b>Note:</b> ') . $message;
				} else {
					$dependencyGroups[$dependency->getDependency()][] = $backend;
				}
			}
		}

		foreach ($dependencyGroups as $module => $dependants) {
			$backends = \implode(', ', \array_map(function ($backend) {
				return '<i>' . $backend->getText() . '</i>';
			}, $dependants));
			$message .= '<br />' . OC_Mount_Config::getSingleDependencyMessage($l, $module, $backends);
		}

		return $message;
	}

	/**
	 * Returns a dependency missing message
	 *
	 * @param \OCP\IL10N $l
	 * @param string $module
	 * @param string $backend
	 * @return string
	 */
	private static function getSingleDependencyMessage(\OCP\IL10N $l, $module, $backend) {
		switch (\strtolower($module)) {
			case 'curl':
				return (string)$l->t('<b>Note:</b> The cURL support in PHP is not enabled or installed. Mounting of %s is not possible. Please ask your system administrator to install it.', $backend);
			default:
				return (string)$l->t('<b>Note:</b> "%s" is not installed. Mounting of %s is not possible. Please ask your system administrator to install it.', [$module, $backend]);
		}
	}
}
