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

use OCP\Settings\IPanel;
use OCP\Template;

class FileSharing implements IPanel {

    public function getPriority() {
        return 0;
    }

    public function getPanel() {
		// TODO: inject
		$config = \OC::$server->getConfig();
		$template = new Template('settings', 'panels/admin/filesharing');
		$template->assign('shareAPIEnabled', $config->getAppValue('core', 'shareapi_enabled', 'yes'));
		$template->assign('shareDefaultExpireDateSet', $config->getAppValue('core', 'shareapi_default_expire_date', 'no'));
		$template->assign('shareExpireAfterNDays', $config->getAppValue('core', 'shareapi_expire_after_n_days', '7'));
		$template->assign('shareEnforceExpireDate', $config->getAppValue('core', 'shareapi_enforce_expire_date', 'no'));
		return $template;
    }

    public function getSectionID() {
        return 'sharing';
    }

}
