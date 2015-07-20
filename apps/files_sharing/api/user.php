<?php

namespace OCA\Files_Sharing\API;

use \OCP\IUserManager;
use \OCP\IURLGenerator;

class User {

	/** @var IGroupManager */
	var $userManager;

	/** @var IURLGenerator */
	var $urlGenerator;

	public function __construct(\OCP\IUserManager $userManager,
	                            \OCP\IURLGenerator $urlGenerator) {
		$this->userManager = $userManager;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * Return all the users
	 * @var array $params Can contain $limit, $offset and $search
	 * @return \OC_OCS_Result containing a list of matching users
	 */
	public function getUsers($params) {
		$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 30;
		$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
		$search = isset($_GET['search']) ? $_GET['search'] : '';

		$users = $this->userManager->searchDisplayName($search, $limit+1, $offset);

		$next_url = count($users) > $limit;
		array_splice($users, $limit);

		$users = array_values($users);

		//Get the UID for all the users
		$users = array_map(function($user) {
			return [
				'uid' => $user->getUID(),
				'displayName' => $user->getDisplayName()
			];
		}, $users);

		// Set the link (next) header if there is more
		if ($next_url) {
			$url = 'ocs/v1.php/apps/files_sharing/api/v1/users?' .
			       'limit=' . $limit . '&offset=' . ($offset + $limit);
			$url = $this->urlGenerator->getAbsoluteURL($url);
			header('Link: <' . $url . '>; rel="next"');
		}

		return new \OC_OCS_Result(['users' => $users]);
	}
}
