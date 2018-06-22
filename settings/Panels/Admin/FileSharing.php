<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Settings\Panels\Admin;

use OC\Helper\LocaleHelper;
use OC\Settings\Panels\Helper;
use OCP\IConfig;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IL10N;

class FileSharing implements ISettings {

	/** @var IConfig */
	protected $config;
	/** @var Helper */
	protected $helper;
	/** @var IL10N */
	protected $l;

	public function __construct(IConfig $config, Helper $helper, IL10N $l) {
		$this->config = $config;
		$this->helper = $helper;
		$this->l = $l;
	}

	public function getPriority() {
		return 99;
	}

	public function getPanel() {
		$this->lfactory = \OC::$server->getL10NFactory();
		$activeLangCode = $this->config->getAppValue(
			'core',
			'shareapi_public_notification_lang',
			'owner'
		);
		$this->localeHelper = new LocaleHelper();
		list($userLang, $commonLanguages, $languages) = $this->localeHelper->getNormalizedLanguages(
			$this->lfactory,
			$activeLangCode
		);

		// Allow reset to the defaults when mail notification is sent in the lang of owner
		if ($userLang['code']  === "owner") {
			$userLang['name'] = $this->l->t("Owner language");
		} else {
			\array_push(
				$commonLanguages,
				[
					'code' => 'owner',
					'name' => $this->l->t("Owner language")
				]
			);
		}

		$selector = new Template('settings', 'language');
		$selector->assign('selectName', 'shareapi_public_notification_lang');
		$selector->assign('selectId', 'shareapiPublicNotificationLang');
		$selector->assign('activelanguage', $userLang);
		$selector->assign('commonlanguages', $commonLanguages);
		$selector->assign('languages', $languages);

		$template = new Template('settings', 'panels/admin/filesharing');
		$template->assign('allowResharing', $this->config->getAppValue('core', 'shareapi_allow_resharing', 'yes'));
		$template->assign('shareAPIEnabled', $this->config->getAppValue('core', 'shareapi_enabled', 'yes'));
		$template->assign('allowLinks', $this->config->getAppValue('core', 'shareapi_allow_links', 'yes'));
		$template->assign('allowPublicUpload', $this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes'));
		$template->assign('enforceLinkPasswordReadOnly', $this->config->getAppValue('core', 'shareapi_enforce_links_password_read_only', 'no'));
		$template->assign('enforceLinkPasswordReadWrite', $this->config->getAppValue('core', 'shareapi_enforce_links_password_read_write', 'no'));
		$template->assign('enforceLinkPasswordWriteOnly', $this->config->getAppValue('core', 'shareapi_enforce_links_password_write_only', 'no'));
		$template->assign('shareDefaultExpireDateSet', $this->config->getAppValue('core', 'shareapi_default_expire_date', 'no'));
		$template->assign('allowPublicMailNotification', $this->config->getAppValue('core', 'shareapi_allow_public_notification', 'no'));
		$template->assign('publicMailNotificationLang', $selector->fetchPage());
		$template->assign('allowSocialShare', $this->config->getAppValue('core', 'shareapi_allow_social_share', 'yes'));
		$template->assign('allowGroupSharing', $this->config->getAppValue('core', 'shareapi_allow_group_sharing', 'yes'));
		$template->assign('onlyShareWithGroupMembers', $this->helper->shareWithGroupMembersOnly());
		$template->assign('onlyShareWithMembershipGroups', $this->config->getAppValue('core', 'shareapi_only_share_with_membership_groups', 'no') === 'yes');
		$template->assign('allowMailNotification', $this->config->getAppValue('core', 'shareapi_allow_mail_notification', 'no'));
		$template->assign('allowShareDialogUserEnumeration', $this->config->getAppValue('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes'));
		$template->assign('shareDialogUserEnumerationGroupMembers', $this->config->getAppValue('core', 'shareapi_share_dialog_user_enumeration_group_members', 'no'));
		$excludeGroups = $this->config->getAppValue('core', 'shareapi_exclude_groups', 'no') === 'yes' ? true : false;
		$template->assign('shareExcludeGroups', $excludeGroups);
		$excludedGroupsList = $this->config->getAppValue('core', 'shareapi_exclude_groups_list', '');
		$excludedGroupsList = \json_decode($excludedGroupsList);
		$template->assign('shareExcludedGroupsList', $excludedGroupsList !== null ? \implode('|', $excludedGroupsList) : '');
		$template->assign('shareExpireAfterNDays', $this->config->getAppValue('core', 'shareapi_expire_after_n_days', '7'));
		$template->assign('shareEnforceExpireDate', $this->config->getAppValue('core', 'shareapi_enforce_expire_date', 'no'));
		$template->assign('autoAcceptShare', $this->config->getAppValue('core', 'shareapi_auto_accept_share', 'yes'));

		$permList = [
			[
				'id' => 'cancreate',
				'label' => $this->l->t('Create'),
				'value' => \OCP\Constants::PERMISSION_CREATE
			],
			[
				'id' => 'canupdate',
				'label' => $this->l->t('Change'),
				'value' => \OCP\Constants::PERMISSION_UPDATE
			],
			[
				'id' => 'candelete',
				'label' => $this->l->t('Delete'),
				'value' => \OCP\Constants::PERMISSION_DELETE
			],
			[
				'id' => 'canshare',
				'label' => $this->l->t('Share'),
				'value' => \OCP\Constants::PERMISSION_SHARE
			],
		];
		$template->assign('shareApiDefaultPermissions', $this->config->getAppValue('core', 'shareapi_default_permissions', \OCP\Constants::PERMISSION_ALL));
		$template->assign('shareApiDefaultPermissionsCheckboxes', $permList);
		$template->assign('coreUserAdditionalInfo', $this->config->getAppValue('core', 'user_additional_info_field', ''));
		return $template;
	}

	public function getSectionID() {
		return 'sharing';
	}
}
