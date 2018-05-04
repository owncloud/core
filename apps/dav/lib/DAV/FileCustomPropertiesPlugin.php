<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\DAV\DAV;

use Sabre\DAV\PropertyStorage\Plugin;
use Sabre\DAV\Server;

/**
 * Class FileCustomPropertiesPlugin
 *
 * Provides ability to store/retrieve fileId and path before deleting
 * the node from tree otherwise it will not be possible to resolve the path by
 * fileId in the backend and delete properties for this fileId
 *
 * @package OCA\DAV\DAV
 */
class FileCustomPropertiesPlugin extends Plugin {
	/**
	 * @param Server $server
	 *
	 * @return void
	 */
	public function initialize(Server $server) {
		$server->on('beforeUnbind', [$this, 'beforeUnbind'], 90);
		parent::initialize($server);
	}

	/**
	 * Store fileId before deletion
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function beforeUnbind($path) {
		$pathFilter = $this->pathFilter;
		if ($pathFilter && !$pathFilter($path)) {
			return;
		}
		$this->backend->beforeDelete($path);
	}
}
