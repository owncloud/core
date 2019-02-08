<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Settings\Panels;

use OCP\Settings\ISettings;
use OCP\Template;

class Legacy implements ISettings {
	protected $type;

	public function __construct($type) {
		$this->type = $type;
	}

	public function getPriority() {
		return 0;
	}

	public function getPanel() {
		$tmpl = new Template('settings', 'panels/legacy');
		$forms = \OC_App::getForms($this->type);
		$tmpl->assign('forms', $forms);
		return $tmpl;
	}

	public function getSectionID() {
		return 'additional';
	}
}
