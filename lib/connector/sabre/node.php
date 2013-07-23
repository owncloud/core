<?php
/**
 * ownCloud
 *
 * @author Jakob Sack
 * @author Michael Gapczynski
 * @copyright 2011 Jakob Sack kde@jakobsack.de
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
 *
 */

abstract class OC_Connector_Sabre_Node implements Sabre_DAV_IProperties {

	const GETETAG_PROPERTYNAME = '{DAV:}getetag';
	const LASTMODIFIED_PROPERTYNAME = '{DAV:}lastmodified';

	/**
	 * The path to the current node
	 * @var string
	 */
	protected $path;

	/**
	 * node fileinfo cache
	 * @var array
	 */
	protected $fileInfoCache;

	/**
	 * node properties cache
	 * @var array
	 */
	protected $propertyCache;

	/**
	 * Sets up the node, expects a full path name
	 * @param string $path
	 */
	public function __construct($path) {
		$this->path = $path;
	}

	/**
	 * Returns the name of the node
	 * @return string
	 */
	public function getName() {
		list(, $name) = Sabre_DAV_URLUtil::splitPath($this->path);
		return $name;
	}

	/**
	 * Renames the node
	 * @param string $name The new name
	 * @return void
	 * @throws Sabre_DAV_Exception_Forbidden
	 */
	public function setName($name) {
		if (!\OC\Files\Filesystem::isUpdatable($this->path)) {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
		list($parentPath, ) = Sabre_DAV_URLUtil::splitPath($this->path);
		list(, $newName) = Sabre_DAV_URLUtil::splitPath($name);
		$newPath = $parentPath . '/' . $newName;
		$result = \OC\Files\Filesystem::rename($this->path, $newPath);
		if ($result) {
			$this->path = $newPath;
		} else {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
	}

	/**
	 * Returns the last modification time, as a unix timestamp
	 * @return int
	 */
	public function getLastModified() {
		$fileInfo = $this->getFileInfo();
		if (isset($fileInfo['mtime'])) {
			return $fileInfo['mtime'];
		}
	}

	/**
	 * Updates properties on this node
	 * @param array $mutations
	 * @see Sabre_DAV_IProperties->updateProperties
	 * @return bool
	 */
	public function updateProperties($mutations) {
		$fileInfo = $this->getFileInfo();
		if (!isset($fileInfo['fileid'])
			|| isset($mutations['{xmlns:oc="http://owncloud.org/ns"}id'])
		) {
			return false;
		}
		$fileId = $fileInfo['fileid'];
		$existing = $this->getProperties(array_keys($mutations));
		foreach ($mutations as $name => $value) {
			if ($name === self::GETETAG_PROPERTYNAME) {
				\OC\Files\Filesystem::putFileInfo($this->path, array('etag' => $value));
				$this->fileInfoCache['etag'] = $value;
				$this->propertyCache[$name] = $value;
			} else if ($name === self::LASTMODIFIED_PROPERTYNAME) {
				$this->touch($value);
				$this->propertyCache[$name] = $value;
			} else if (is_null($value)) {
				// In the case a property should be deleted, the property value will be null
				if (isset($existing[$name])) {
					$sql = 'DELETE FROM `*PREFIX*properties` '.
						'WHERE `fileid` = ? AND `propertyname` = ?';
					OC_DB::executeAudited($sql, array($fileId, $name));
					unset($this->propertyCache[$name]);
				}
			} else {
				if (!isset($existing[$name])) {
					$sql = 'INSERT INTO `*PREFIX*properties` '.
						'(`fileid`, `propertyname`, `propertyvalue`) VALUES(?,?,?)';
					OC_DB::executeAudited($sql, array($fileId, $name, $value));
				} else {
					$sql = 'UPDATE `*PREFIX*properties` SET `propertyvalue` = ? '.
						'WHERE `fileid` = ? AND `propertyname` = ?';
					OC_DB::executeAudited($sql, array($value, $fileId, $name));
				}
				$this->propertyCache[$name] = $value;
			}
		}
		return true;
	}

	/**
     * Returns a list of properties for this node
     * @param array $properties
     * @see Sabre_DAV_IProperties->getProperties
     * @return array
     */
	public function getProperties($properties) {
		if (!isset($this->propertyCache)) {
			$this->propertyCache = array();
			$fileInfo = $this->getFileInfo();
			if (isset($fileInfo['fileid'])) {
				$fileId = $fileInfo['fileid'];
				$this->propertyCache['{xmlns:oc="http://owncloud.org/ns"}id'] = $fileId;
				$sql = 'SELECT `propertyname`, `propertyvalue` FROM `*PREFIX*properties` '.
					'WHERE `fileid` = ?';
				$result = OC_DB::executeAudited($sql, array($fileId));
				while ($row = $result->fetchRow()) {
					$this->propertyCache[$row['propertyname']] = $row['propertyvalue'];
				}
				if (isset($fileInfo['etag'])) {
					$this->propertyCache[self::GETETAG_PROPERTYNAME] = '"'.$fileInfo['etag'].'"';
				}
				$this->propertyCache['{DAV:}current-user-privilege-set'] = $this->getPrivileges();
			}
		}
		// If the array is empty, it means 'all properties' were requested
		if (empty($properties)) {
			return $this->propertyCache;
		} else {
			// Return requested properties
			return array_intersect_key($this->propertyCache, array_flip($properties));
		}
	}

	/**
	 * Get the CRUDS permissions transformed as privileges for the node
	 * @return Sabre_DAVACL_Property_CurrentUserPrivilegeSet
	 */
	protected function getPrivileges() {
		$privileges = array();
		$fileInfo = $this->getFileInfo();
		if (isset($fileInfo['permissions'])) {
			$permissions = $fileInfo['permissions'];
			if ($permissions & OCP\PERMISSION_CREATE) {
	            $privileges[] = '{DAV:}bind';
	        }
	        if ($permissions & OCP\PERMISSION_READ) {
	            $privileges[] = '{DAV:}read';
			}
			if ($permissions & OCP\PERMISSION_UPDATE) {
				$privileges[] = '{DAV:}write-content';
			}
			if ($permissions & OCP\PERMISSION_DELETE) {
				$privileges[] = '{DAV:}unbind';
			}
			if ($permissions & OCP\PERMISSION_SHARE) {
				$privileges[] = '{xmlns:oc="http://owncloud.org/ns"}share';
			}
		}
		return new Sabre_DAVACL_Property_CurrentUserPrivilegeSet($privileges);
	}

	/**
	 * Set the metadata for the node
	 * @param array $fileInfo
	 */
	public function setFileInfo($fileInfo) {
		$this->fileInfoCache = $fileInfo;
	}

	/**
	 * Get the metadata for the node
	 * @return array
	 */
	protected function getFileInfo() {
		if (!isset($this->fileInfoCache)) {
			$this->fileInfoCache = \OC\Files\Filesystem::getFileInfo($this->path);
		}
		return $this->fileInfoCache;
	}

	/**
	 * Set the last modification time of the file (mtime) to the value given
	 * Even if the modification time is set to a custom value the access time is set to now.
	 * @param int $mtime
	 * @return bool
	 */
	protected function touch($mtime) {
		$result = \OC\Files\Filesystem::touch($this->path, $mtime);
		if ($result) {
			$this->fileInfoCache['mtime'] = $mtime;
		}
		return $result;
	}

}
