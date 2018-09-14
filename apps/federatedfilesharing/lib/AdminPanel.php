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
namespace OCA\FederatedFileSharing;

use OCP\Settings\ISettings;
use OCP\Template;

class AdminPanel implements ISettings {

	/** @var FederatedShareProvider */
	protected $shareProvider;

	/**
	 * AdminPanel constructor.
	 *
	 * @param FederatedShareProvider $shareProvider
	 */
	public function __construct(FederatedShareProvider $shareProvider) {
		$this->shareProvider = $shareProvider;
	}

	public function getPriority() {
		return 80;
	}

	public function getSectionID() {
		return 'sharing';
	}

	public function getPanel() {
		$tmpl = new Template('federatedfilesharing', 'settings-admin');
		$tmpl->assign('outgoingServer2serverShareEnabled', $this->shareProvider->isOutgoingServer2serverShareEnabled());
		$tmpl->assign('incomingServer2serverShareEnabled', $this->shareProvider->isIncomingServer2serverShareEnabled());
		return $tmpl;
	}
}
