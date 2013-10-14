<?php

/**
 * ownCloud
 *
 * @author Jakob Sack, Thomas Müller
 * @copyright 2011 Jakob Sack kde@jakobsack.de
 * @copyright 2013 Thomas Müller thomas.mueller@tmit.eu
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

class OC_Connector_Sabre_Locks extends \Sabre\DAV\Locks\Backend\AbstractBackend {

	/**
	 * Returns a list of \Sabre\DAV\Locks_LockInfo objects
	 *
	 * This method should return all the locks for a particular uri, including
	 * locks that might be set on a parent uri.
	 *
	 * If returnChildLocks is set to true, this method should also look for
	 * any locks in the subtree of the uri for locks.
	 *
	 * @param string $uri
	 * @param bool $returnChildLocks
	 * @return array
	 */
	public function getLocks($uri, $returnChildLocks) {

		list($user, $path) = $this->resolveUserAndPath($uri);

		// NOTE: the following 10 lines or so could be easily replaced by
		// pure sql. MySQL's non-standard string concatination prevents us
		// from doing this though.
		// NOTE: SQLite requires time() to be inserted directly. That's ugly
		// but otherwise reading locks from SQLite Databases will return
		// nothing
		$query = 'SELECT * FROM `*PREFIX*locks`'
			. ' WHERE `userid` = ? AND (`created` + `timeout`) > ' . time() . ' AND (( `uri` = ?)';
		if (OC_Config::getValue("dbtype") === 'oci') {
			//FIXME oracle hack: need to explicitly cast CLOB to CHAR for comparison
			$query = 'SELECT * FROM `*PREFIX*locks`'
				. ' WHERE `userid` = ? AND (`created` + `timeout`) > ' . time() . ' AND (( to_char(`uri`) = ?)';
		}
		$params = array($user, $path);

		// We need to check locks for every part in the uri.
		$uriParts = explode('/', $path);

		// We already covered the last part of the uri
		array_pop($uriParts);

		$currentPath = '';

		foreach ($uriParts as $part) {

			if ($currentPath) {
				$currentPath .= '/';
			}
			$currentPath .= $part;
			//FIXME oracle hack: need to explicitly cast CLOB to CHAR for comparison
			if (OC_Config::getValue("dbtype") === 'oci') {
				$query .= ' OR (`depth` != 0 AND to_char(`uri`) = ?)';
			} else {
				$query .= ' OR (`depth` != 0 AND `uri` = ?)';
			}
			$params[] = $currentPath;

		}

		if ($returnChildLocks) {

			//FIXME oracle hack: need to explicitly cast CLOB to CHAR for comparison
			if (OC_Config::getValue("dbtype") === 'oci') {
				$query .= ' OR (to_char(`uri`) LIKE ?)';
			} else {
				$query .= ' OR (`uri` LIKE ?)';
			}
			$params[] = $uri . '/%';

		}
		$query .= ')';

		$result = OC_DB::executeAudited($query, $params);

		$lockList = array();
		while ($row = $result->fetchRow()) {

			$lockInfo = new \Sabre\DAV\Locks\LockInfo();
			$lockInfo->owner = $row['owner'];
			$lockInfo->token = $row['token'];
			$lockInfo->timeout = $row['timeout'];
			$lockInfo->created = $row['created'];
			$lockInfo->scope = $row['scope'];
			$lockInfo->depth = $row['depth'];
			$lockInfo->uri = $row['uri'];
			$lockList[] = $lockInfo;

		}

		return $lockList;

	}

	/**
	 * Locks a uri
	 *
	 * @param string $uri
	 * @param \Sabre\DAV\Locks\LockInfo $lockInfo
	 * @return bool
	 */
	public function lock($uri, \Sabre\DAV\Locks\LockInfo $lockInfo) {

		list($user, $path) = $this->resolveUserAndPath($uri);

		// We're making the lock timeout 5 minutes
		$lockInfo->timeout = 300;
		$lockInfo->created = time();
		$lockInfo->uri = $path;

		// NOTE: leave $uri here in order to get the user resolved inside properly
		$locks = $this->getLocks($uri, false);
		$exists = false;
		foreach ($locks as $lock) {
			if ($lock->token == $lockInfo->token) {
				$exists = true;
				break;
			}
		}

		if ($exists) {
			$sql = 'UPDATE `*PREFIX*locks`'
				. ' SET `owner` = ?, `timeout` = ?, `scope` = ?, `depth` = ?, `uri` = ?, `created` = ?'
				. ' WHERE `userid` = ? AND `token` = ?';
			$result = OC_DB::executeAudited($sql, array(
					$lockInfo->owner,
					$lockInfo->timeout,
					$lockInfo->scope,
					$lockInfo->depth,
					$path,
					$lockInfo->created,
					$user,
					$lockInfo->token)
			);
		} else {
			$sql = 'INSERT INTO `*PREFIX*locks`'
				. ' (`userid`,`owner`,`timeout`,`scope`,`depth`,`uri`,`created`,`token`)'
				. ' VALUES (?,?,?,?,?,?,?,?)';
			$result = OC_DB::executeAudited($sql, array(
					$user,
					$lockInfo->owner,
					$lockInfo->timeout,
					$lockInfo->scope,
					$lockInfo->depth,
					$path,
					$lockInfo->created,
					$lockInfo->token)
			);
		}

		return true;

	}

	/**
	 * Removes a lock from a uri
	 *
	 * @param string $uri
	 * @param \Sabre\DAV\Locks\LockInfo $lockInfo
	 * @return bool
	 */
	public function unlock($uri, \Sabre\DAV\Locks\LockInfo $lockInfo) {

		list($user, $path) = $this->resolveUserAndPath($uri);

		$sql = 'DELETE FROM `*PREFIX*locks` WHERE `userid` = ? AND `uri` = ? AND `token` = ?';
		if (OC_Config::getValue("dbtype") === 'oci') {
			//FIXME oracle hack: need to explicitly cast CLOB to CHAR for comparison
			$sql = 'DELETE FROM `*PREFIX*locks` WHERE `userid` = ? AND to_char(`uri`) = ? AND `token` = ?';
		}
		$result = OC_DB::executeAudited($sql, array($user, $path, $lockInfo->token));

		return $result === 1;

	}

	private function resolveUserAndPath($uri) {

		$uriParts = explode('/', $uri);
		$shared = array_shift($uriParts);
		if ($shared === 'Shared') {
			$itemTarget = array_shift($uriParts);

			// resolve the path down to it's physical existence
			$item = \OCP\Share::getItemSharedWith('folder', $itemTarget);
			$resolved = \OCP\Share::resolveReShare($item);

			// recreate fill path
			$targetPath = $resolved['path'];
			if (!empty($uriParts)) {
				$targetPath .= '/' . implode('/', $uriParts);
			}
			// remove 'files/' from path as it's relative to '/Shared'
			if (substr($targetPath, 0, 6) === 'files/') {
				$targetPath = substr($targetPath, 6);
			}

			return array($resolved['uid_owner'], $targetPath);
		}

		// file/folder from users own dataspace
		return array(OC_User::getUser(), $uri);
	}

}
