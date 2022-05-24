<?php
/**
 * @author Thomas Citharel <tcit@tcit.fr>
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
namespace OCA\DAV\CalDAV;

use Sabre\DAV\Collection;
use Sabre\DAV\Exception\MethodNotAllowed;

class PublicCalendarRoot extends Collection {

	/** @var CalDavBackend */
	protected $caldavBackend;

	/** @var \OCP\IL10N */
	protected $l10n;

	/**
	 * If this value is set to true, it effectively disables listing of users
	 * it still allows user to find other users if they have an exact url.
	 *
	 * @var bool
	 */
	public $disableListing = false;

	public function __construct(CalDavBackend $caldavBackend) {
		$this->caldavBackend = $caldavBackend;
		$this->l10n = \OC::$server->getL10N('dav');
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return 'public-calendars';
	}

	/**
	 * @inheritdoc
	 */
	public function getChild($name) {
		$calendar = $this->caldavBackend->getPublicCalendar($name);
		return new Calendar($this->caldavBackend, $calendar, $this->l10n);
	}

	/**
	 * @inheritdoc
	 */
	public function getChildren() {
		if ($this->disableListing) {
			throw new MethodNotAllowed('Listing members of this collection is disabled');
		}

		$calendars = $this->caldavBackend->getPublicCalendars();
		$children = [];
		foreach ($calendars as $calendar) {
			// TODO: maybe implement a new class PublicCalendar ???
			$children[] = new Calendar($this->caldavBackend, $calendar, $this->l10n);
		}

		return $children;
	}
}
