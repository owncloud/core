<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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
namespace OCA\Files_Sharing\Panels\Admin;
use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IL10N;
use OCA\Files_Sharing\SharingBlacklist;

class SettingsPanel implements ISettings {
	/** @var SharingBlacklist */
	private $sharingBlacklist;
	/** @var IL10N */
	private $l10n;
	public function __construct(SharingBlacklist $sharingBlacklist, IL10N $l10n) {
		$this->sharingBlacklist = $sharingBlacklist;
		$this->l10n = $l10n;
	}
	public function getPanel() {
		$tmpl = new Template('files_sharing', 'settings');
		$tmpl->assign('blacklistedDisplaynames', $this->sharingBlacklist->getBlacklistedGroupDisplaynames());
		return $tmpl;
	}
	public function getPriority() {
		return 0;
	}
	public function getSectionID() {
		return 'sharing';
	}
}