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

namespace OC\Settings;

use OCP\Settings\ISection;

/**
 * @since 10.0
 */
class Section implements ISection {
	protected $id;
	protected $name;
	/** @var int */
	protected $priority;
	protected $icon;

	public function __construct($id, $name, $priority, $icon='settings') {
		$this->id = $id;
		$this->name = $name;
		$this->priority = $priority;
		$this->icon = $icon;
	}

	public function getID() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getPriority() {
		return $this->priority;
	}

	public function getIconName() {
		return $this->icon;
	}
}
