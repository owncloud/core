<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files_Sharing\Controller;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\OCSController;
use OCP\Contacts\IManager;
use OCP\IConfig;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Share;
use OCA\Files_Sharing\SharingBlacklist;

class ShareesController extends OCSController {

	/** @var IGroupManager */
	protected $groupManager;

	/** @var IUserManager */
	protected $userManager;

	/** @var IManager */
	protected $contactsManager;

	/** @var IConfig */
	protected $config;

	/** @var IUserSession */
	protected $userSession;

	/** @var IRequest */
	protected $request;

	/** @var IURLGenerator */
	protected $urlGenerator;

	/** @var ILogger */
	protected $logger;

	/** @var \OCP\Share\IManager */
	protected $shareManager;

	/** @var bool */
	protected $shareWithGroupOnly = false;

	/** @var bool */
	protected $shareWithMembershipGroupOnly = false;

	/** @var bool */
	protected $shareeEnumeration = true;

	/** @var bool */
	protected $shareeEnumerationGroupMembers = false;

	/** @var int */
	protected $offset = 0;

	/** @var int */
	protected $limit = 10;

	/** @var array */
	protected $result = [
		'exact' => [
			'users' => [],
			'groups' => [],
			'remotes' => [],
		],
		'users' => [],
		'groups' => [],
		'remotes' => [],
	];

	protected $reachedEndFor = [];

	/**
	 * @var string
	 */
	protected $additionalInfoField;

	/** @var SharingBlacklist */
	protected $sharingBlacklist;

	/**
	 * @param IGroupManager $groupManager
	 * @param IUserManager $userManager
	 * @param IManager $contactsManager
	 * @param IConfig $config
	 * @param IUserSession $userSession
	 * @param IURLGenerator $urlGenerator
	 * @param IRequest $request
	 * @param ILogger $logger
	 * @param \OCP\Share\IManager $shareManager
	 */
	public function __construct($appName,
			IRequest $request,
			IGroupManager $groupManager,
			IUserManager $userManager,
			IManager $contactsManager,
			IConfig $config,
			IUserSession $userSession,
			IURLGenerator $urlGenerator,
			ILogger $logger,
			\OCP\Share\IManager $shareManager,
			SharingBlacklist $sharingBlacklist) {
		parent::__construct($appName, $request);

		$this->groupManager = $groupManager;
		$this->userManager = $userManager;
		$this->contactsManager = $contactsManager;
		$this->config = $config;
		$this->userSession = $userSession;
		$this->urlGenerator = $urlGenerator;
		$this->request = $request;
		$this->logger = $logger;
		$this->shareManager = $shareManager;
		$this->sharingBlacklist = $sharingBlacklist;
		$this->additionalInfoField = $this->config->getAppValue('core', 'user_additional_info_field', '');
	}

	/**
	 * @param string $search
	 */
	protected function getUsers($search) {
		$this->result['users'] = $this->result['exact']['users'] = $users = [];

		$userGroups = [];
		if ($this->shareWithGroupOnly || $this->shareeEnumerationGroupMembers) {
			// Search in all the groups this user is part of
			$userGroups = $this->groupManager->getUserGroupIds($this->userSession->getUser());
			foreach ($userGroups as $userGroup) {
				$usersTmp = $this->groupManager->findUsersInGroup($userGroup, $search, $this->limit, $this->offset);
				foreach ($usersTmp as $uid => $user) {
					$users[$uid] = $user;
				}
			}
		} else {
			// Search in all users
			$usersTmp = $this->userManager->find($search, $this->limit, $this->offset);

			foreach ($usersTmp as $user) {
				$users[$user->getUID()] = $user;
			}
		}

		if (!$this->shareeEnumeration || \sizeof($users) < $this->limit) {
			$this->reachedEndFor[] = 'users';
		}

		$foundUserById = false;
		$lowerSearch = \strtolower($search);
		foreach ($users as $uid => $user) {
			/* @var $user IUser */
			$entry = [
				'label' => $user->getDisplayName(),
				'value' => [
					'shareType' => Share::SHARE_TYPE_USER,
					'shareWith' => $uid,
				],
			];
			$additionalInfo = $this->getAdditionalUserInfo($user);
			if ($additionalInfo !== null) {
				$entry['value']['shareWithAdditionalInfo'] = $additionalInfo;
			}

			if (
				// Check if the uid is the same
				\strtolower($uid) === $lowerSearch
				// Check if exact display name
				|| \strtolower($user->getDisplayName()) === $lowerSearch
				// Check if exact first email
				|| \strtolower($user->getEMailAddress()) === $lowerSearch
				// Check for exact search term matches (when mail attributes configured as search terms + no enumeration)
				|| \in_array($lowerSearch, \array_map('strtolower', $user->getSearchTerms()))) {
				if (\strtolower($uid) === $lowerSearch) {
					$foundUserById = true;
				}
				$this->result['exact']['users'][] = $entry;
			} else {
				$this->result['users'][] = $entry;
			}
		}

		if ($this->offset === 0 && !$foundUserById) {
			// On page one we try if the search result has a direct hit on the
			// user id and if so, we add that to the exact match list
			$user = $this->userManager->get($search);
			if ($user instanceof IUser) {
				$addUser = true;

				if ($this->shareWithGroupOnly) {
					// Only add, if we have a common group
					$commonGroups = \array_intersect($userGroups, $this->groupManager->getUserGroupIds($user));
					$addUser = !empty($commonGroups);
				}

				if ($addUser) {
					$entry = [
						'label' => $user->getDisplayName(),
						'value' => [
							'shareType' => Share::SHARE_TYPE_USER,
							'shareWith' => $user->getUID(),
						],
					];
					$additionalInfo = $this->getAdditionalUserInfo($user);
					if ($additionalInfo !== null) {
						$entry['value']['shareWithAdditionalInfo'] = $additionalInfo;
					}
					\array_push($this->result['exact']['users'], $entry);
				}
			}
		}

		if (!$this->shareeEnumeration) {
			$this->result['users'] = [];
		}
	}

	/**
	 * Returns the additional info to display behind the display name as configured.
	 *
	 * @param IUser $user user for which to retrieve the additional info
	 * @return string|null additional info or null if none to be displayed
	 */
	protected function getAdditionalUserInfo(IUser $user) {
		if ($this->additionalInfoField === 'email') {
			return $user->getEMailAddress();
		} elseif ($this->additionalInfoField === 'id') {
			return $user->getUID();
		}
		return null;
	}

	/**
	 * @param string $search
	 */
	protected function getGroups($search) {
		$this->result['groups'] = $this->result['exact']['groups'] = [];

		$groups = $this->groupManager->search($search, $this->limit, $this->offset, 'sharing');
		$groupIds = \array_map(function (IGroup $group) {
			return $group->getGID();
		}, $groups);

		if (!$this->shareeEnumeration || \sizeof($groups) < $this->limit) {
			$this->reachedEndFor[] = 'groups';
		}

		$userGroups =  [];
		if (!empty($groups) && ($this->shareWithMembershipGroupOnly || $this->shareeEnumerationGroupMembers)) {
			// Intersect all the groups that match with the groups this user is a member of
			$userGroups = $this->groupManager->getUserGroups($this->userSession->getUser(), 'sharing');
			$userGroups = \array_map(function (IGroup $group) {
				return $group->getGID();
			}, $userGroups);
			$groupIds = \array_intersect($groupIds, $userGroups);
		}

		$lowerSearch = \strtolower($search);
		foreach ($groups as $group) {
			// FIXME: use a more efficient approach
			$gid = $group->getGID();
			if (!\in_array($gid, $groupIds) || $this->sharingBlacklist->isGroupBlacklisted($group)) {
				continue;
			}
			if (\strtolower($gid) === $lowerSearch || \strtolower($group->getDisplayName()) === $lowerSearch) {
				$this->result['exact']['groups'][] = [
					'label' => $group->getDisplayName(),
					'value' => [
						'shareType' => Share::SHARE_TYPE_GROUP,
						'shareWith' => $gid,
					],
				];
			} else {
				$this->result['groups'][] = [
					'label' => $group->getDisplayName(),
					'value' => [
						'shareType' => Share::SHARE_TYPE_GROUP,
						'shareWith' => $gid,
					],
				];
			}
		}

		if ($this->offset === 0 && empty($this->result['exact']['groups'])) {
			// On page one we try if the search result has a direct hit on the
			// user id and if so, we add that to the exact match list
			$group = $this->groupManager->get($search);
			if ($group instanceof IGroup && !$this->sharingBlacklist->isGroupBlacklisted($group) &&
					(!$this->shareWithMembershipGroupOnly || \in_array($group->getGID(), $userGroups))) {
				\array_push($this->result['exact']['groups'], [
					'label' => $group->getDisplayName(),
					'value' => [
						'shareType' => Share::SHARE_TYPE_GROUP,
						'shareWith' => $group->getGID(),
					],
				]);
			}
		}

		if (!$this->shareeEnumeration) {
			$this->result['groups'] = [];
		}
	}

	/**
	 * @param string $search
	 * @return array possible sharees
	 */
	protected function getRemote($search) {
		$this->result['remotes'] = [];
		// Fetch remote search properties from app config
		$searchProperties = \explode(',', $this->config->getAppValue('dav', 'remote_search_properties', 'CLOUD,FN'));
		// Search in contacts
		$addressBookContacts = $this->contactsManager->search($search, $searchProperties, [], $this->limit, $this->offset);
		$foundRemoteById = false;
		foreach ($addressBookContacts as $contact) {
			if (isset($contact['isLocalSystemBook'])) {
				// We only want remote users
				continue;
			}
			if (!isset($contact['CLOUD'])) {
				// we need a cloud id to setup a remote share
				continue;
			}

			// we can have multiple cloud domains, always convert to an array
			$cloudIds = $contact['CLOUD'];
			if (!\is_array($cloudIds)) {
				$cloudIds = [$cloudIds];
			}

			$lowerSearch = \strtolower($search);
			foreach ($cloudIds as $cloudId) {
				list(, $serverUrl) = $this->splitUserRemote($cloudId);

				if (\strtolower($cloudId) === $lowerSearch) {
					$foundRemoteById = true;
					// Save this as an exact match and continue with next CLOUD
					$this->result['exact']['remotes'][] = [
						'label' => $contact['FN'],
						'value' => [
							'shareType' => Share::SHARE_TYPE_REMOTE,
							'shareWith' => $cloudId,
							'server' => $serverUrl,
						],
					];
					continue;
				}

				// CLOUD matching is done above
				unset($searchProperties['CLOUD']);
				foreach ($searchProperties as $property) {
					// do we even have this property for this contact/
					if (!isset($contact[$property])) {
						// Skip this property since our contact doesnt have it
						continue;
					}
					// check if we have a match
					$values = $contact[$property];
					if (!\is_array($values)) {
						$values = [$values];
					}
					foreach ($values as $value) {
						// check if we have an exact match
						if (\strtolower($value) === $lowerSearch) {
							$this->result['exact']['remotes'][] = [
								'label' => $contact['FN'],
								'value' => [
									'shareType' => Share::SHARE_TYPE_REMOTE,
									'shareWith' => $cloudId,
									'server' => $serverUrl,
								],
							];

							// Now skip to next CLOUD
							continue 3;
						}
					}
				}

				// If we get here, we didnt find an exact match, so add to other matches
				$this->result['remotes'][] = [
					'label' => $contact['FN'],
					'value' => [
						'shareType' => Share::SHARE_TYPE_REMOTE,
						'shareWith' => $cloudId,
						'server' => $serverUrl,
					],
				];
			}
		}

		// remove the exact user results if we dont allow autocomplete
		if (!$this->shareeEnumeration) {
			$this->result['remotes'] = [];
		}

		if (!$foundRemoteById && \substr_count($search, '@') >= 1 && $this->offset === 0
			// if an exact local user is found, only keep the remote entry if
			// its domain does not matches the trusted domains
			// (if it does, it is a user whose local login domain matches the ownCloud
			// instance domain)
			&& (empty($this->result['exact']['users'])
				|| !$this->isInstanceDomain($search))
		) {
			$this->result['exact']['remotes'][] = [
				'label' => $search,
				'value' => [
					'shareType' => Share::SHARE_TYPE_REMOTE,
					'shareWith' => $search,
				],
			];
		}

		$this->reachedEndFor[] = 'remotes';
	}

	/**
	 * split user and remote from federated cloud id
	 *
	 * @param string $address federated share address
	 * @return array [user, remoteURL]
	 * @throws \Exception
	 */
	public function splitUserRemote($address) {
		if (\strpos($address, '@') === false) {
			throw new \Exception('Invalid Federated Cloud ID');
		}

		// Find the first character that is not allowed in user names
		$id = \str_replace('\\', '/', $address);
		$posSlash = \strpos($id, '/');
		$posColon = \strpos($id, ':');

		if ($posSlash === false && $posColon === false) {
			$invalidPos = \strlen($id);
		} elseif ($posSlash === false) {
			$invalidPos = $posColon;
		} elseif ($posColon === false) {
			$invalidPos = $posSlash;
		} else {
			$invalidPos = \min($posSlash, $posColon);
		}

		// Find the last @ before $invalidPos
		$pos = $lastAtPos = 0;
		while ($lastAtPos !== false && $lastAtPos <= $invalidPos) {
			$pos = $lastAtPos;
			$lastAtPos = \strpos($id, '@', $pos + 1);
		}

		if ($pos !== false) {
			$user = \substr($id, 0, $pos);
			$remote = \substr($id, $pos + 1);
			$remote = $this->fixRemoteURL($remote);
			if (!empty($user) && !empty($remote)) {
				return [$user, $remote];
			}
		}

		throw new \Exception('Invalid Federated Cloud ID');
	}

	/**
	 * Strips away a potential file names and trailing slashes:
	 * - http://localhost
	 * - http://localhost/
	 * - http://localhost/index.php
	 * - http://localhost/index.php/s/{shareToken}
	 *
	 * all return: http://localhost
	 *
	 * @param string $remote
	 * @return string
	 */
	protected function fixRemoteURL($remote) {
		$remote = \str_replace('\\', '/', $remote);
		if ($fileNamePosition = \strpos($remote, '/index.php')) {
			$remote = \substr($remote, 0, $fileNamePosition);
		}
		$remote = \rtrim($remote, '/');

		return $remote;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @param string $search
	 * @param string $itemType
	 * @param int $page
	 * @param int $perPage
	 * @return array|DataResponse
	 */
	public function search($search = '', $itemType = null, $page = 1, $perPage = 200) {
		if ($perPage <= 0) {
			return [ 'statuscode' => Http::STATUS_BAD_REQUEST,
				'message' => 'Invalid perPage argument'];
		}
		if ($page <= 0) {
			return [ 'statuscode' => Http::STATUS_BAD_REQUEST,
				'message' => 'Invalid page'];
		}

		$shareTypes = [
			Share::SHARE_TYPE_USER,
		];

		if ($this->shareManager->allowGroupSharing()) {
			$shareTypes[] = Share::SHARE_TYPE_GROUP;
		}

		$shareTypes[] = Share::SHARE_TYPE_REMOTE;

		if (isset($_GET['shareType']) && \is_array($_GET['shareType'])) {
			$shareTypes = \array_intersect($shareTypes, $_GET['shareType']);
			\sort($shareTypes);
		} elseif (isset($_GET['shareType']) && \is_numeric($_GET['shareType'])) {
			$shareTypes = \array_intersect($shareTypes, [(int) $_GET['shareType']]);
			\sort($shareTypes);
		}

		if (\in_array(Share::SHARE_TYPE_REMOTE, $shareTypes) && !$this->isRemoteSharingAllowed($itemType)) {
			// Remove remote shares from type array, because it is not allowed.
			$shareTypes = \array_diff($shareTypes, [Share::SHARE_TYPE_REMOTE]);
		}

		$this->shareWithGroupOnly = $this->config->getAppValue('core', 'shareapi_only_share_with_group_members', 'no') === 'yes';
		$this->shareWithMembershipGroupOnly = $this->config->getAppValue('core', 'shareapi_only_share_with_membership_groups', 'no') === 'yes';
		$this->shareeEnumeration = $this->config->getAppValue('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes') === 'yes';
		if ($this->shareeEnumeration) {
			$this->shareeEnumerationGroupMembers = $this->config->getAppValue('core', 'shareapi_share_dialog_user_enumeration_group_members', 'no') === 'yes';
		} else {
			$this->shareeEnumerationGroupMembers = false;
		}
		$this->limit = (int) $perPage;
		$this->offset = $perPage * ($page - 1);

		return $this->searchSharees($search, $itemType, $shareTypes, $page, $perPage);
	}

	/**
	 * Method to get out the static call for better testing
	 *
	 * @param string $itemType
	 * @return bool
	 */
	protected function isRemoteSharingAllowed($itemType) {
		try {
			$backend = Share::getBackend($itemType);
			return $backend->isShareTypeAllowed(Share::SHARE_TYPE_REMOTE);
		} catch (\Exception $e) {
			return false;
		}
	}

	/**
	 * Testable search function that does not need globals
	 *
	 * @param string $search
	 * @param string $itemType
	 * @param array $shareTypes
	 * @param int $page
	 * @param int $perPage
	 * @return DataResponse|array
	 */
	protected function searchSharees($search, $itemType, array $shareTypes, $page, $perPage) {
		// Verify arguments
		if ($itemType === null) {
			return [ 'statuscode' => Http::STATUS_BAD_REQUEST,
				'message' => 'Missing itemType'];
		}

		// Get users
		if (\in_array(Share::SHARE_TYPE_USER, $shareTypes)) {
			$this->getUsers($search);
		}

		// Get groups
		if (\in_array(Share::SHARE_TYPE_GROUP, $shareTypes)) {
			$this->getGroups($search);
		}

		// Get remote
		if (\in_array(Share::SHARE_TYPE_REMOTE, $shareTypes)) {
			$this->getRemote($search);
		}

		$response = new DataResponse(['data' => $this->result]);

		if (\sizeof($this->reachedEndFor) < 3) {
			$response->addHeader('Link', $this->getPaginationLink($page, [
				'search' => $search,
				'itemType' => $itemType,
				'shareType' => $shareTypes,
				'perPage' => $perPage,
			]));
		}

		return $response;
	}

	/**
	 * Generates a bunch of pagination links for the current page
	 *
	 * @param int $page Current page
	 * @param array $params Parameters for the URL
	 * @return string
	 */
	protected function getPaginationLink($page, array $params) {
		if ($this->isV2()) {
			$url = $this->urlGenerator->getAbsoluteURL('/ocs/v2.php/apps/files_sharing/api/v1/sharees') . '?';
		} else {
			$url = $this->urlGenerator->getAbsoluteURL('/ocs/v1.php/apps/files_sharing/api/v1/sharees') . '?';
		}
		$params['page'] = $page + 1;
		$link = '<' . $url . \http_build_query($params) . '>; rel="next"';

		return $link;
	}

	/**
	 * @return bool
	 */
	protected function isV2() {
		return $this->request->getScriptName() === '/ocs/v2.php';
	}

	/**
	 * Checks whether the given target's domain part matches one of the server's
	 * trusted domain entries
	 *
	 * @param string $target target
	 * @return true if one match was found, false otherwise
	 */
	protected function isInstanceDomain($target) {
		if (\strpos($target, '/') !== false) {
			// not a proper email-like format with domain name
			return false;
		}
		$parts = \explode('@', $target);
		if (\count($parts) === 1) {
			// no "@" sign
			return false;
		}
		$domainName = $parts[\count($parts) - 1];
		$trustedDomains = $this->config->getSystemValue('trusted_domains', []);

		return \in_array($domainName, $trustedDomains, true);
	}
}
