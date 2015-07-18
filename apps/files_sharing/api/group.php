<?php

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

		// Set the link (next) header if there is more
		if ($next_url) {
			$url = 'ocs/v1.php/apps/files_sharing/api/v1/groups?' .
			       'limit=' . $limit . '&offset=' . ($offset + $limit);
			$url = $this->urlGenerator->getAbsoluteURL($url);
			header('Link: <' . $url . '>; rel="next"');
		}

		return new \OC_OCS_Result(['groups' => $groups], 100, 'foo');
	}
}
