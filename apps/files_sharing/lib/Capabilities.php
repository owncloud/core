<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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
namespace OCA\Files_Sharing;

use OCP\Capabilities\ICapability;
use OCP\IConfig;
use OCP\Util\UserSearch;

/**
 * Class Capabilities
 *
 * @package OCA\Files_Sharing
 */
class Capabilities implements ICapability {

	/** @var IConfig */
	private $config;

	/**
	 * @var UserSearch
	 */
	private $userSearch;

	/**
	 * Capabilities constructor.
	 *
	 * @param IConfig $config
	 * @param UserSearch $userSearch
	 */
	public function __construct(IConfig $config, UserSearch $userSearch) {
		$this->config = $config;
		$this->userSearch = $userSearch;
	}

	/**
	 * Return this classes capabilities
	 *
	 * @return array
	 */
	public function getCapabilities() {
		$res = [];

		if ($this->config->getAppValue('core', 'shareapi_enabled', 'yes') !== 'yes') {
			$res['api_enabled'] = false;
			$res['public'] = ['enabled' => false];
			$res['user'] = ['send_mail' => false];
			$res['resharing'] = false;
			$res['can_share'] = false;
		} else {
			$res['api_enabled'] = true;

			$public = [];
			$public['enabled'] = $this->config->getAppValue('core', 'shareapi_allow_links', 'yes') === 'yes';
			if ($public['enabled']) {
				$public['password'] = [];
				$public['password']['enforced_for'] = [];
				$roPasswordEnforced = $this->config->getAppValue('core', 'shareapi_enforce_links_password_read_only', 'no') === 'yes';
				$rwPasswordEnforced = $this->config->getAppValue('core', 'shareapi_enforce_links_password_read_write', 'no') === 'yes';
				$woPasswordEnforced = $this->config->getAppValue('core', 'shareapi_enforce_links_password_write_only', 'no') === 'yes';
				$public['password']['enforced_for']['read_only'] = $roPasswordEnforced;
				$public['password']['enforced_for']['read_write'] = $rwPasswordEnforced;
				$public['password']['enforced_for']['upload_only'] = $woPasswordEnforced;
				$public['password']['enforced'] = $roPasswordEnforced || $rwPasswordEnforced || $woPasswordEnforced;

				$public['expire_date'] = [];
				$public['expire_date']['enabled'] = $this->config->getAppValue('core', 'shareapi_default_expire_date', 'no') === 'yes';
				if ($public['expire_date']['enabled']) {
					$public['expire_date']['days'] = $this->config->getAppValue('core', 'shareapi_expire_after_n_days', '7');
					$public['expire_date']['enforced'] = $this->config->getAppValue('core', 'shareapi_enforce_expire_date', 'no') === 'yes';
				}

				$public['send_mail'] = $this->config->getAppValue('core', 'shareapi_allow_public_notification', 'no') === 'yes';
				$public['social_share'] = $this->config->getAppValue('core', 'shareapi_allow_social_share', 'yes') === 'yes';
				$public['upload'] = $this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes') === 'yes';
				$public['multiple'] = true;
				$public['supports_upload_only'] = true;
			}
			$res["public"] = $public;

			$res['user']['send_mail'] = $this->config->getAppValue('core', 'shareapi_allow_mail_notification', 'no') === 'yes';

			$res['resharing'] = $this->config->getAppValue('core', 'shareapi_allow_resharing', 'yes') === 'yes';

			$res['group_sharing'] = $this->config->getAppValue('core', 'shareapi_allow_group_sharing', 'yes') === 'yes';

			$res['auto_accept_share'] = $this->config->getAppValue('core', 'shareapi_auto_accept_share', 'yes') === 'yes';

			$res['share_with_group_members_only'] = $this->config->getAppValue('core', 'shareapi_only_share_with_group_members', 'yes') === 'yes';
			$res['share_with_membership_groups_only'] = $this->config->getAppValue('core', 'shareapi_only_share_with_membership_groups', 'yes') === 'yes';

			if (\OCP\Util::isSharingDisabledForUser()) {
				$res['can_share'] = false;
			} else {
				$res['can_share'] = true;
			}

			$user_enumeration = [];
			$user_enumeration['enabled'] = $this->config->getAppValue('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes') === 'yes';
			if ($user_enumeration['enabled']) {
				$user_enumeration['group_members_only'] = $this->config->getAppValue('core', 'shareapi_share_dialog_user_enumeration_group_members', 'no') === 'yes';
			}
			$res["user_enumeration"] = $user_enumeration;

			$res['default_permissions'] = (int)$this->config->getAppValue('core', 'shareapi_default_permissions', \OCP\Constants::PERMISSION_ALL);
		}

		//Federated sharing
		$res['federation'] = [
			'outgoing'  => $this->config->getAppValue('files_sharing', 'outgoing_server2server_share_enabled', 'yes') === 'yes',
			'incoming' => $this->config->getAppValue('files_sharing', 'incoming_server2server_share_enabled', 'yes') === 'yes'
		];

		$res['search_min_length'] = $this->userSearch->getSearchMinLength();

		return [
			'files_sharing' => $res,
		];
	}
}
