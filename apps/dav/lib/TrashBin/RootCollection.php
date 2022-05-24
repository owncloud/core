<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\TrashBin;

use OCP\IUserSession;
use Sabre\DAV\Exception\NotAuthenticated;
use Sabre\DAVACL\AbstractPrincipalCollection;
use Sabre\DAVACL\PrincipalBackend\BackendInterface;

class RootCollection extends AbstractPrincipalCollection {
	/**
	 * @var IUserSession
	 */
	protected $userSession;

	/**
	 * Creates the object.
	 *
	 * This object must be passed the principal backend. This object will
	 * filter all principals from a specified prefix ($principalPrefix). The
	 * default is 'principals', if your principals are stored in a different
	 * collection, override $principalPrefix
	 *
	 *
	 * @param BackendInterface $principalBackend
	 * @param IUserSession $userSession
	 * @param string $principalPrefix
	 */
	public function __construct(BackendInterface $principalBackend, IUserSession $userSession, $principalPrefix = 'principals') {
		parent::__construct($principalBackend, $principalPrefix);
		$this->userSession = $userSession;
	}

	/**
	 * This method returns a node for a principal.
	 *
	 * The passed array contains principal information, and is guaranteed to
	 * at least contain a uri item. Other properties may or may not be
	 * supplied by the authentication backend.
	 *
	 * @param array $principalInfo
	 * @return TrashBinHome
	 * @throws NotAuthenticated
	 */
	public function getChildForPrincipal(array $principalInfo) {
		list(, $name) = \Sabre\Uri\split($principalInfo['uri']);
		$sessionUser = $this->userSession->getUser();
		if ($sessionUser === null || $name !== $sessionUser->getUID()) {
			throw new NotAuthenticated();
		}
		return new TrashBinHome(new TrashBinManager(), $name);
	}

	public function getName() {
		return 'trash-bin';
	}
}
