<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

use OCP\Settings\ISettings;
use OCP\Template;

class FileSharing implements ISettings {

	public function getPriority() {
		return 99;
	}

	public function getPanel() {
		$config = \OC::$server->getConfig();
		$template = new Template('settings', 'panels/admin/filesharing');
		$template->assign('allowResharing', $config->getAppValue('core', 'shareapi_allow_resharing', 'yes'));
		$template->assign('shareAPIEnabled', $config->getAppValue('core', 'shareapi_enabled', 'yes'));
		$template->assign('allowLinks', $config->getAppValue('core', 'shareapi_allow_links', 'yes'));
		$template->assign('allowPublicUpload', $config->getAppValue('core', 'shareapi_allow_public_upload', 'yes'));
		$template->assign('enableLinkPasswordByDefault', $config->getAppValue('core', 'shareapi_enable_link_password_by_default', 'no'));
		$template->assign('enforceLinkPassword', \OCP\Util::isPublicLinkPasswordRequired());
		$template->assign('shareDefaultExpireDateSet', $config->getAppValue('core', 'shareapi_default_expire_date', 'no'));
		$template->assign('allowPublicMailNotification', $config->getAppValue('core', 'shareapi_allow_public_notification', 'no'));
		$template->assign('allowSocialShare', $config->getAppValue('core', 'shareapi_allow_social_share', 'yes'));
		$template->assign('allowGroupSharing', $config->getAppValue('core', 'shareapi_allow_group_sharing', 'yes'));
		$template->assign('onlyShareWithGroupMembers', \OC\Share\Share::shareWithGroupMembersOnly());
		$template->assign('allowMailNotification', $config->getAppValue('core', 'shareapi_allow_mail_notification', 'no'));
		$template->assign('allowShareDialogUserEnumeration', $config->getAppValue('core', 'shareapi_allow_share_dialog_user_enumeration', 'yes'));
		$template->assign('shareExcludeGroups', $excludeGroups);
		$template->assign('shareExpireAfterNDays', $config->getAppValue('core', 'shareapi_expire_after_n_days', '7'));
		$template->assign('shareEnforceExpireDate', $config->getAppValue('core', 'shareapi_enforce_expire_date', 'no'));
		return $template;
	}

	public function getSectionID() {
		return 'sharing';
	}

}
