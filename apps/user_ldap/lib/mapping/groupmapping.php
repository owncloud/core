<?php
/**
* Copyright (c) 2014 Arthur Schiwon <blizzz@owncloud.com>
* This file is licensed under the Affero General Public License version 3 or
* later.
* See the COPYING-README file.
*/

namespace OCA\UserLDAP\Mapping;

/**
* Class UserMapping
* @package OCA\UserLDAP\Mapping
*/
class GroupMapping extends AbstractMapping {

	/**
	* returns the DB table name which holds the mappings
	* @return string
	*/
	protected function getTableName() {
		return '*PREFIX*ldap_group_mapping';
	}

}
