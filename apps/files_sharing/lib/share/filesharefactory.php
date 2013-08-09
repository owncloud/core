<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files\Share;

use OC\Share\AdvancedShareFactory;

/**
 * Share factory for file shares, used by both file and folder backends
 */
class FileShareFactory extends AdvancedShareFactory {

	protected $table;

	public function __construct() {
		$this->table = '`*PREFIX*filecache`';
	}
	
	/**
	 * Map a database row to a file share
	 * @param array $row A key => value array of share properties
	 * @return \OCA\Files\Share\FileShare
	 */
	public function mapToShare($row) {
		return FileShare::fromRow($row);
	}

	/**
	 * Get JOIN(s) to app table(s)
	 * @return string
	 */
	public function getJoins() {
		return 'JOIN '.$this->table.' ON '.
			'`*PREFIX*shares`.`item_source` = '.$this->table.'.`fileid`';
	}

	/**
	 * Get app table column(s)
	 * @return string
	 */
	public function getColumns() {
		$columns = array(
			'storage',
			'path',
			'parent',
			'mimetype',
			'mimepart',
			'size',
			'mtime',
			'storage_mtime',
			'encrypted',
			'unencrypted_size',
			'etag',
		);
		foreach ($columns as &$column) {
			$column = $this->table.'.`'.$column.'`';
		}
		return join(', ', $columns);
	}
	
}