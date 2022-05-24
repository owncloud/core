<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OCA\DAV\Files\PublicFiles;

use OC\User\LoginException;
use OCP\Share\IManager;
use OCP\Share\IShare;
use Sabre\DAV\Auth\Backend\AbstractBasic;
use Sabre\DAV\Exception\NotAuthenticated;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\INode;
use Sabre\DAV\Server;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use function explode;

/**
 * Class PublicSharingAuth - sabre dav auth backend to handle password for
 * public shared files and folders
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class PublicSharingAuth extends AbstractBasic {

	/** @var Server */
	private $server;
	/** @var IShare */
	private $share;
	/** @var IManager */
	private $shareManager;

	/**
	 * PublicSharingAuth constructor.
	 *
	 * @param Server $server
	 * @param IManager $manager
	 */
	public function __construct(Server $server, IManager $manager) {
		$this->server = $server;
		$this->shareManager = $manager;
		$this->principalPrefix = 'principals/system/';
		$this->setRealm('owncloud/share');
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
	 * @throws NotFound
	 * @throws NotAuthenticated
	 */
	public function check(RequestInterface $request, ResponseInterface $response) {
		$node = $this->resolveShare($request->getPath());
		if (!$node instanceof PublicSharedRootNode) {
			return [true, 'principals/system/public'];
		}
		$this->share = $node->getShare();
		$password = $this->share->getPassword();
		if ($password === null) {
			return [true, 'principals/system/public'];
		}

		// Clients which don't use cookie based session authentication and want
		// to use anchor tags `<a href...` to download password protected files
		// can't add the basic authentication header.
		// They can use pre-signed urls instead.
		$query = $request->getQueryParameters();
		if (isset($query['signature'], $query['expires'])) {
			$sig = $query['signature'];
			$validUntil = \DateTime::createFromFormat(\DateTime::ATOM, $query['expires']);
			$now = new \DateTime();
			if ($now < $validUntil) {
				$key = \hash_hkdf('sha256', $this->share->getPassword());
				$resource_path = \explode($this->share->getToken(), $request->getPath())[1];
				$s = new PublicShareSigner($this->share->getToken(), $resource_path, $validUntil, $key);
				if (\hash_equals($s->getSignature(), $sig)) {
					return [true, 'principals/system/public'];
				}
			}
		}

		try {
			return parent::check($request, $response);
		} catch (LoginException $e) {
			throw new NotAuthenticated($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * @inheritdoc
	 */
	public function challenge(RequestInterface $request, ResponseInterface $response) {
		// intentionally left empty - no need to challenge the user here
	}

	/**
	 * Validates a username and password
	 *
	 * This method should return true or false depending on if login
	 * succeeded.
	 *
	 * @param string $username
	 * @param string $password
	 * @return bool
	 */
	protected function validateUserPass($username, $password) {
		if ($username !== 'public') {
			return false;
		}
		return $this->shareManager->checkPassword($this->share, $password);
	}

	/**
	 * @param string $path
	 * @return INode|null
	 * @throws NotFound
	 */
	private function resolveShare($path) {
		$elements = \explode('/', $path);
		if ($elements[0] !== 'public-files') {
			return null;
		}

		return $this->server->tree->getNodeForPath($elements[0] .'/' . $elements[1]);
	}
}
