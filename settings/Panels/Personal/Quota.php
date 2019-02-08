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

namespace OC\Settings\Panels\Personal;

use OC\Settings\Panels\Helper;
use OCP\Settings\ISettings;
use OCP\Template;

class Quota implements ISettings {

	/** @var Helper  */
	protected $helper;

	public function __construct(Helper $helper) {
		$this->helper = $helper;
	}

	public function getPriority() {
		return 105;
	}

	public function getPanel() {
		$tmpl = new Template('settings', 'panels/personal/quota');
		$storageInfo = $this->helper->getStorageInfo('/');
		;
		$tmpl->assign('usage', \OC_Helper::humanFileSize($storageInfo['used']));
		$tmpl->assign('usage_relative', $storageInfo['relative']);
		$tmpl->assign('quota', $storageInfo['quota']);
		$tmpl->assign('total_human', \OC_Helper::humanFileSize($storageInfo['total']));
		return $tmpl;
	}

	public function getSectionID() {
		return 'general';
	}
}
