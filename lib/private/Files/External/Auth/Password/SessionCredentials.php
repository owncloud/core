<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Files\External\Auth\Password;

use OCP\IUser;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\IStorageConfig;
use OCP\ISession;
use OCP\Security\ICrypto;
use OCP\Files\Storage;
use OC\Files\External\SessionStorageWrapper;
use OCP\Files\External\InsufficientDataForMeaningfulAnswerException;

/**
 * Username and password from login credentials, saved in session
 */
class SessionCredentials extends AuthMechanism {

	/** @var ISession */
	protected $session;

	/** @var ICrypto */
	protected $crypto;

	public function __construct(ISession $session, ICrypto $crypto) {
		$l = \OC::$server->getL10N('lib');
		$this->session = $session;
		$this->crypto = $crypto;

		$this
			->setIdentifier('password::sessioncredentials')
			->setScheme(self::SCHEME_PASSWORD)
			->setText($l->t('Log-in credentials, save in session'))
			->addParameters([
			])
		;

		// FIXME: use password from DB
		\OCP\Util::connectHook('OC_User', 'post_login', $this, 'authenticate');
	}

	/**
	 * Hook listener on post login
	 *
	 * @param array $params
	 */
	public function authenticate(array $params) {
		$this->session->set('password::sessioncredentials/credentials', $this->crypto->encrypt(\json_encode($params)));
	}

	public function manipulateStorageConfig(IStorageConfig &$storage, IUser $user = null) {
		$encrypted = $this->session->get('password::sessioncredentials/credentials');
		if (!isset($encrypted)) {
			throw new InsufficientDataForMeaningfulAnswerException('No session credentials saved');
		}

		$credentials = \json_decode($this->crypto->decrypt($encrypted), true);
		$storage->setBackendOption('user', $this->session->get('loginname'));
		$storage->setBackendOption('password', $credentials['password']);
	}

	public function wrapStorage(Storage\IStorage $storage) {
		return new SessionStorageWrapper(['storage' => $storage]);
	}
}
