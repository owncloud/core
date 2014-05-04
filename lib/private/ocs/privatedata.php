<?php
/**
* ownCloud
*
* @author Frank Karlitschek
* @author Tom Needham
* @copyright 2012 Frank Karlitschek frank@owncloud.org
* @copyright 2012 Tom Needham tom@owncloud.com
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


class OC_OCS_Privatedata {

	/**
	 * read keys
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/getattribute/testy/123
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/getattribute/testy
	 * @param array $parameters The OCS parameter
	 * @return \OC_OCS_Result
	 */
	public static function get($parameters) {
		$user = OC_User::getUser();
		$app = addslashes(strip_tags($parameters['app']));
		$key = isset($parameters['key']) ? addslashes(strip_tags($parameters['key'])) : null;
		
		if(empty($key)) {
			$query = \OCP\DB::prepare('SELECT `key`, `app`, `value`  FROM `*PREFIX*privatedata` WHERE `user` = ? AND `app` = ? ');
			$result = $query->execute(array($user, $app));
		} else {
			$query = \OCP\DB::prepare('SELECT `key`, `app`, `value`  FROM `*PREFIX*privatedata` WHERE `user` = ? AND `app` = ? AND `key` = ? ');
			$result = $query->execute(array($user, $app, $key));
		}
		
		$xml = array();
		while ($row = $result->fetchRow()) {
			$data=array();
			$data['key']=$row['key'];
			$data['app']=$row['app'];
			$data['value']=$row['value'];
		 	$xml[] = $data;
		}

		return new OC_OCS_Result($xml);
	}

	/**
	 * set a key
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/setattribute/testy/123  --data "value=foobar"
	 * @param array $parameters The OCS parameter
	 * @return \OC_OCS_Result
	 */
	public static function set($parameters) {
		$user = OC_User::getUser();
		$app = addslashes(strip_tags($parameters['app']));
		$key = addslashes(strip_tags($parameters['key']));
		$value = OC_OCS::readData('post', 'value', 'text');

		/*
		* Check if there already is a row for this key.
		*
		* This SELECT query is required in order to mitigate insertion of
		* duplicate rows on MySQL which otherwise may happen because
		*
		*  a) There is no UNIQUE INDEX preventing the insertion of such rows.
		*     This is possibly due to relevant columns all being VARCHAR(255)
		*     resulting in an index too large for MyISAM.
		*
		* and
		*
		*  b) MySQL returns zero affected rows for UPDATE queries that update
		*     rows to the data they already contain.
		*
		* It should be noted that this only mitigates but not prevents the
		* creation of duplicate rows as these may still be produced due to race
		* conditions, e.g.
		*
		*  1. SELECT (Process 1)
		*  2. SELECT (Process 2)
		*  3. INSERT (Process 1)
		*  4. INSERT (Process 2)
		*
		* As such a UNIQUE INDEX on user, app, key would be the more robust and
		* thus desirable solution.
		*/
		$query = \OCP\DB::prepare('SELECT COUNT(`keyid`) FROM `*PREFIX*privatedata` WHERE `user` = ? AND `app` = ? AND `key` = ?');
		$numRows = (int) $query->execute(array($user, $app, $key))->fetchOne();

		if ($numRows > 1) {
			// This can happen as per the above. Delete all rows, perform one insert.
			$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*privatedata` WHERE `user` = ? AND `app` = ? AND `key` = ?');
			$query->execute(array($user, $app, $key));
			$numRows = 0;
		}

		if ($numRows == 0) {
			// store in DB
			$query = \OCP\DB::prepare('INSERT INTO `*PREFIX*privatedata` (`user`, `app`, `key`, `value`) VALUES(?, ?, ?, ?)');
			$query->execute(array($user, $app, $key, $value));
		} else {
			// update in DB
			$query = \OCP\DB::prepare('UPDATE `*PREFIX*privatedata` SET `value` = ?  WHERE `user` = ? AND `app` = ? AND `key` = ?');
			$query->execute(array($value, $user, $app, $key ));
		}

		return new OC_OCS_Result(null, 100);
	}

	/**
	 * delete a key
	 * test: curl http://login:passwd@oc/core/ocs/v1.php/privatedata/deleteattribute/testy/123 --data "post=1"
	 * @param array $parameters The OCS parameter
	 * @return \OC_OCS_Result
	 */
	public static function delete($parameters) {
		$user = OC_User::getUser();
		if (!isset($parameters['app']) or !isset($parameters['key'])) {
			//key and app are NOT optional here
			return new OC_OCS_Result(null, 101);
		}

		$app = addslashes(strip_tags($parameters['app']));
		$key = addslashes(strip_tags($parameters['key']));

		// delete in DB
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*privatedata`  WHERE `user` = ? AND `app` = ? AND `key` = ? ');
		$query->execute(array($user, $app, $key ));

		return new OC_OCS_Result(null, 100);
	}
}

