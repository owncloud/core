<?php
/**
 * @author Michiel de Jong <michiel@pondersource.com>
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

namespace OCP\Share;

class ShareeValue {
  public int $shareType;
	public string $shareWith;
}

class Sharee {
	public string $label;
	public ShareeValue $value;
}

/**
 * Interface IRemoteShareesSearch
 *
 * @package OCP\Share
 * @since 10.11.0
 */
interface IRemoteShareesSearch {
	/**
	 * Return the identifier of this provider.
	 * @param string search string for autocomplete
	 * @return Shareee[] one ISharee object per match
	 * @since 10.0.0
	 */
	public function search($search);
}
