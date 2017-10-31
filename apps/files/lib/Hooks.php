<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

/**
 * This class contains all hooks.
 */

namespace OCA\Files;

use OC\Files\View;
use OCP\User;

class Hooks {

	public static function connectHooks() {
		\OCP\Util::connectHook('\OCP\Config', 'js', '\OCA\Files\App', 'extendJsConfig');
		\OCP\Util::connectHook('OC_Filesystem', 'post_rename', 'OCA\Files\Hooks', 'zsync_rename_hook');
		\OCP\Util::connectHook('OC_Filesystem', 'post_copy', 'OCA\Files\Hooks', 'zsync_copy_hook');
		\OCP\Util::connectHook('OC_Filesystem', 'write', 'OCA\Files\Hooks', 'zsync_delete_hook');
		\OCP\Util::connectHook('OC_Filesystem', 'delete', 'OCA\Files\Hooks', 'zsync_delete_hook');
		\OCP\Util::connectHook('\OCP\Versions', 'rollback', 'OCA\Files\Hooks', 'zsync_delete_hook');
	}

	public static function zsync_delete_hook( $params ) {
		$path = $params[\OC\Files\Filesystem::signal_param_path];
		$view = new View('/'.User::getUser());

		$path = 'files_zsync/' . ltrim($path, '/');
		if ($view->is_file($path.'.zsync')) {
			$path = $path.'.zsync';
			$view->unlink($path);

			// delete directory if empty
			$zsync_dir = dirname($path);
			$content = $view->getDirectoryContent($zsync_dir);
			if (!count($content))
				$view->rmdir($zsync_dir);
		} else if ($view->is_dir($path))
			$view->rmdir($path);
	}

	private static function zsync_copy_rename_get_paths( $params ) {
		$from = $params[\OC\Files\Filesystem::signal_param_oldpath];
		$to = $params[\OC\Files\Filesystem::signal_param_newpath];
		$view = new View('/'.User::getUser());

		$from_path = 'files_zsync/' . ltrim($from, '/');
		$to_path = 'files_zsync/' . ltrim($to, '/');

		if ($view->is_dir($from_path))
			return [$from_path, $to_path];

		if ($view->is_file($from_path.'.zsync')) {
			$from_path = $from_path.'.zsync';
			$to_path = $to_path.'.zsync';
			return [$from_path, $to_path];
		}

		return [null, null];
	}

	public static function zsync_copy_hook( $params ) {
		$view = new View('/'.User::getUser());
		list($from_path, $to_path) = self::zsync_copy_rename_get_paths($params);
		if (!empty($from_path) && !empty($to_path))
			$view->copy($from_path, $to_path);
	}

	public static function zsync_rename_hook( $params ) {
		$view = new View('/'.User::getUser());
		list($from_path, $to_path) = self::zsync_copy_rename_get_paths($params);
		if (!empty($from_path) && !empty($to_path))
			$view->rename($from_path, $to_path);
	}
}
