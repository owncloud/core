<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Share;

use OC\Share\Share;
use OC\Share\ShareBackend;
use OC\Share\TimeMachine;

/**
 * Backend class that apps extend and register with the ShareManager to share content
 * This class should be used if the app has content that can have children that are also shared
 * using a different backend class e.g. folders
 *
 *  Hooks available in class name scope
 *  - preShare(Share $share)
 *  - postShare(Share $share)
 *  - preUnshare(Share $share)
 *  - postUnshare(Share $share)
 *  - preUpdate(Share $share)
 *  - postUpdate(Share $share)
 *
 * @version 2.0.0 BETA
 */
abstract class CollectionShareBackend extends ShareBackend {

	/**
	 * The constructor
	 * @param TimeMachine $timeMachine The time() mock
	 * @param array $shareTypes An array of share type objects that items can be shared through
	 * e.g. User, Group, Link
	 */
	public function __construct(TimeMachine $timeMachine, array $shareTypes) {
		parent::__construct($timeMachine, $shareTypes);
	}

	/**
	 * Get the identifiers for the children item types of this backend
	 * @return array
	 */
	abstract public function getChildrenItemTypes();

	/**
	 * Search for shares of this collection item type that contain the child item source and
	 * shared with $shareWith
	 * @param string $shareWith
	 * @param any $itemSource
	 * @return array
	 */
	abstract public function searchForChildren($shareWith, $itemSource);

}