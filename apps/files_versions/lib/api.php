<?php
/**
 * ownCloud
 *
 * @author Vincent Petry
 * @copyright 2014 Vincent Petry pvince81@owncloud.com
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

namespace OCA\Files_Versions;

class Api {

	/**
	 * Returns the versions of a given file
	 *
	 * @param array $params
	 * @return \OC_OCS_Result share information
	 */
	public static function getVersions($params) {
		$l = \OC::$server->getL10N('files_versions');
		if (!isset($_GET['path'])) {
			return new \OC_OCS_Result(null, 400, $l->t('Missing "%s" parameter', array('path')));
		}
		$source = $_GET['path'];
		$start = isset($_GET['start']) ? $_GET['start'] : 0;
		list ($uid, $filename) = Storage::getUidAndFilename($source);
		$count = isset($_GET['count']) ? $_GET['count'] : 5;
		$versions = Storage::getVersions($uid, $filename, $source);
		if( $versions ) {
			$endReached = false;
			if (count($versions) <= $start+$count) {
				$endReached = true;
			}

			$versions = array_slice($versions, $start, $count);
		} else {
			$endReached = true;
		}

		return new \OC_OCS_Result(
			array(
				'versions' => empty($versions) ? false : $versions,
				'endReached' => $endReached
			)
		);
	}

	/**
	 * Returns the versions of a given file
	 *
	 * @param array $params
	 * @return \OC_OCS_Result share information
	 */
	public static function processVersion($params) {
		$l = \OC::$server->getL10N('files_versions');
		if (!isset($_POST['path'])) {
			return new \OC_OCS_Result(null, 400, $l->t('Missing "%s" parameter', array('path')));
		}
		if (!isset($_POST['action'])) {
			return new \OC_OCS_Result(null, 400, $l->t('Missing "%s" parameter', array('action')));
		}
		if (!isset($_POST['revision'])) {
			return new \OC_OCS_Result(null, 400, $l->t('Missing "%s" parameter', array('revision')));
		}

		$action = $_POST['action'];
		if ($action !== 'revert') {
			return new \OC_OCS_Result(null, 400, $l->t('Invalid "%s" parameter', array('action')));
		}
		$file = $_POST['path'];
		$revision = (int)$_POST['revision'];

		if(Storage::rollback( $file, $revision )) {
			return new \OC_OCS_Result(
				array(
					'revision' => $revision,
				   	'file' => $file,
			   	)
			);
		} else {
			return new \OC_OCS_Result(
				null,
				400,
				array(
					'message' => $l->t('Could not revert: %s', array($file))
				)
			);
		}
	}
}
