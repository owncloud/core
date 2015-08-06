<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OCA\Files_Sharing\API;

use \OCP\IGroupManager;
use \OCP\IURLGenerator;

class Group {

	/** @var IGroupManager */
	var $groupManager;

	/** @var IURLGenerator */
	var $urlGenerator;

	public function __construct(\OCP\IGroupManager $groupManager,
	                            \OCP\IURLGenerator $urlGenerator) {
		$this->groupManager = $groupManager;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * Return all the groups
	 * @var array $params Can contain $limit, $offset and $search
	 * @return \OC_OCS_Result containing a list of matching groups
	 */
	public function getGroups($params) {
		$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 30;
		$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
		$search = isset($_GET['search']) ? $_GET['search'] : '';

		$groups = $this->groupManager->search($search, $limit+1, $offset);

		$next_url = count($groups) > $limit;
		array_splice($groups, $limit);

		//Get the GID for all the groups
		$groups = array_map(function($group) {
			return $group->getGID();
		}, $groups);

		$url = '';
		// Set the link (next) header if there is more
		if ($next_url) {
			$url = 'ocs/v1.php/apps/files_sharing/api/v1/groups?' .
			       'limit=' . $limit . '&offset=' . ($offset + $limit) .
				   '&search=' . $search;
			$url = $this->urlGenerator->getAbsoluteURL($url);
			/* Makes unit testing impossible
			header('Link: <' . $url . '>; rel="next"');
			*/
		}

		return new \OC_OCS_Result(['groups' => $groups, 'next' => $url]);
	}
}
