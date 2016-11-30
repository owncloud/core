<?php
/**
 * @author Lukas Biermann
 * @author Nina Herrmann
 * @author Wladislaw Iwanzow
 * @author Dennis Meis
 * @author Jonathan Neugebauer
 *
 * @copyright Copyright (c) 2016, Project Seminar "PSSL16" at the University of Muenster.
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
 */

namespace OCA\DAV\Connector\Sabre;

use Sabre\DAV\Auth\Backend\BackendInterface;
use Sabre\HTTP;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

/**
 * HTTP Bearer authentication backend class.
 *
 * This class can be used by authentication objects wishing to use HTTP Bearer
 * Most of the logic is handled, implementors just need to worry about
 * the determineUsername method.
 */
abstract class AbstractBearer implements BackendInterface {

	/**
	 * Authentication Realm.
	 *
	 * The realm is often displayed by browser clients when showing the
	 * authentication dialog.
	 *
	 * @var string
	 */
	protected $realm = 'sabre/dav';

	/**
	 * This is the prefix that will be used to generate principal urls.
	 *
	 * @var string
	 */
	protected $principalPrefix = 'principals/';

	/**
	 * Determines the username behind a token
	 *
	 * This method should return null or the username depending on if login
	 * succeeded.
	 *
	 * @param string $token
	 * @return null|string
	 */
	abstract protected function determineUsername($token);

	/**
	 * Sets the authentication realm for this backend.
	 *
	 * @param string $realm
	 * @return void
	 */
	function setRealm($realm) {
		$this->realm = $realm;
	}

	/**
	 * When this method is called, the backend must check if authentication was
	 * successful.
	 *
	 * The returned value must be one of the following
	 *
	 * [true, "principals/username"]
	 * [false, "reason for failure"]
	 *
	 * If authentication was successful, it's expected that the authentication
	 * backend returns a so-called principal url.
	 *
	 * Examples of a principal url:
	 *
	 * principals/admin
	 * principals/user1
	 * principals/users/joe
	 * principals/uid/123457
	 *
	 * If you don't use WebDAV ACL (RFC3744) we recommend that you simply
	 * return a string such as:
	 *
	 * principals/users/[username]
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return array
	 */
	function check(RequestInterface $request, ResponseInterface $response) {
		$auth = new HTTP\Auth\Bearer(
			$this->realm,
			$request,
			$response
		);

		$token = $auth->getToken();

		if (!$token) {
			return [false, "No 'Authorization: Bearer' header found. Either the client didn't send one, or the server is mis-configured"];
		}

		$username = $this->determineUsername($token);

		if (!$username) {
			return [false, "Token not valid"];
		}

		return [true, $this->principalPrefix . $username];
	}

	/**
	 * This method is called when a user could not be authenticated, and
	 * authentication was required for the current request.
	 *
	 * This gives you the opportunity to set authentication headers. The 401
	 * status code will already be set.
	 *
	 * In this case of Basic Auth, this would for example mean that the
	 * following header needs to be set:
	 *
	 * $response->addHeader('WWW-Authenticate', 'Basic realm=SabreDAV');
	 *
	 * Keep in mind that in the case of multiple authentication backends, other
	 * WWW-Authenticate headers may already have been set, and you'll want to
	 * append your own WWW-Authenticate header instead of overwriting the
	 * existing one.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return void
	 */
	function challenge(RequestInterface $request, ResponseInterface $response) {
		$auth = new HTTP\Auth\Bearer(
			$this->realm,
			$request,
			$response
		);

		$auth->requireLogin();
	}

}
