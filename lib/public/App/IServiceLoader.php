<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCP\App;

use OCP\IUser;

/**
 * Interface IServiceLoader - will load services based on a given xml tag from
 * the info.xml file of any enabled app.
 * In this context a service is a php class which is defined in info.xml and
 * the server container is used to create an instance of this class.
 *
 * @package OCP\App
 * @since 10.0.4
 */
interface IServiceLoader {

	/**
	 * Looks in info.xml of all enabled apps for the given xml path and returns
	 * a generator which can be used to enumerate all occurrences.
	 *
	 * The xml path is defined as an array like ['sabre', 'plugins'].
	 * The optional argument user can be used to look into apps which are only
	 * enabled for a given user.
	 *
	 * @param array $xmlPath
	 * @param IUser|null $user
	 * @return \Generator
	 * @since 10.0.4
	 */
	public function load(array $xmlPath, IUser $user = null);
}
