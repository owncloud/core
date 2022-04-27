<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Phil Davis <phil.davis@inf.org>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OC\Session;

use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IRequest;
use OCP\ISession;
use OCP\Security\ICrypto;
use OCP\Security\ISecureRandom;

/**
 * Class CryptoWrapper provides some rough basic level of additional security by
 * storing the session data in an encrypted form.
 *
 * The content of the session is encrypted using another cookie sent by the browser.
 * One should note that an adversary with access to the source code or the system
 * memory is still able to read the original session ID from the users' request.
 * This thus can not be considered a strong security measure one should consider
 * it as an additional small security obfuscation layer to comply with compliance
 * guidelines.
 *
 * TODO: Remove this in a future release with an approach such as
 * https://github.com/owncloud/core/pull/17866
 *
 * @package OC\Session
 */
class CryptoWrapper {
	public const COOKIE_NAME = 'oc_sessionPassphrase';

	/** @var ISession */
	protected $session;

	/** @var ICrypto */
	protected $crypto;

	/** @var ISecureRandom */
	protected $random;

	/** @var string  */
	private $passphrase;

	/** @var IRequest  */
	private $request;

	/** @var ITimeFactory */
	private $timeFactory;

	/**
	 * @param IConfig $config
	 * @param ICrypto $crypto
	 * @param ISecureRandom $random
	 * @param IRequest $request
	 * @param ITimeFactory $timeFactory
	 */
	public function __construct(
		ICrypto $crypto,
		ISecureRandom $random,
		IRequest $request,
		ITimeFactory $timeFactory
	) {
		$this->crypto = $crypto;
		$this->random = $random;
		$this->request = $request;
		$this->timeFactory = $timeFactory;
	}

	/**
	 * This `sendCookie` method is mandatory before wrapping the session (`wrapSession` method).
	 * A passphrase will be prepared in order to wrap the session.
	 * If the target cookie hasn't been received from the request, a cookie containing the passphrase
	 * will also be sent to the browser for the future.
	 */
	public function sendCookie(IConfig $config) {
		if ($this->request->getCookie(self::COOKIE_NAME) !== null) {
			// just set the passphrase, don't send it to the browser.
			$this->passphrase = $this->request->getCookie(self::COOKIE_NAME);
			if ($this->request->getHeader('X-Requested-With') !== 'XMLHttpRequest') {
				// refresh cookie expiration
				if (!\defined('PHPUNIT_RUN')) {
					$options = $this->prepareOptions($config);
					$this->sendCookieToBrowser($this->passphrase, $options);
				}
			}
			return;
		}

		$this->passphrase = $this->random->generate(128);
		// FIXME: Required for CI
		if (!\defined('PHPUNIT_RUN')) {
			$options = $this->prepareOptions($config);
			$this->sendCookieToBrowser($this->passphrase, $options);
		}
	}

	/**
	 * Refresh the cookie expiration time
	 */
	public function refreshCookie(IConfig $config, $expire = null) {
		if ($this->request->getCookie(self::COOKIE_NAME) === null) {
			return;
		}

		$this->passphrase = $this->request->getCookie(self::COOKIE_NAME);
		// FIXME: Required for CI
		if (!\defined('PHPUNIT_RUN')) {
			$options = $this->prepareOptions($config);
			if ($expire !== null) {
				$options['expires'] = $this->timeFactory->getTime() + $expire;
			}
			$this->sendCookieToBrowser($this->passphrase, $options);
		}
	}

	/**
	 * Try to delete the cookie
	 */
	public function deleteCookie() {
		// FIXME: Required for CI
		if (!\defined('PHPUNIT_RUN')) {
			$options = [
				'expires' => \time() - 3600,
				'path' => '',
				'domain' => '',
				'secure' => false,
				'httponly' => false,
				'samesite' => 'None',
			];
			$this->sendCookieToBrowser('', $options);
		}
	}

	private function prepareOptions(IConfig $config) {
		$secureCookie = $this->request->getServerProtocol() === 'https';
		$webRoot = \OC::$WEBROOT;
		if ($webRoot === '') {
			$webRoot = '/';
		}

		$sessionLifetime = $config->getSystemValue('session_lifetime', 60 * 20);
		if ($sessionLifetime > 0) {
			$sessionLifetime += $this->timeFactory->getTime();
		} else {
			$sessionLifetime = 0;
		}

		$samesite = $config->getSystemValue('http.cookie.samesite', 'Strict');
		return [
			'expires' => $sessionLifetime,
			'path' => $webRoot,
			'domain' => '',
			'secure' => $secureCookie,
			'httponly' => true,
			'samesite' => $samesite,
		];
	}

	private function sendCookieToBrowser($value, $options) {
		if (\version_compare(PHP_VERSION, '7.3.0') === -1) {
			\setcookie(self::COOKIE_NAME, $value, $options['expires'], $options['path'], $options['domain'], $options['secure'], $options['httpOnly']);
		} else {
			\setcookie(self::COOKIE_NAME, $value, $options);
		}
	}

	/**
	 * @param ISession $session
	 * @return ISession
	 */
	public function wrapSession(ISession $session) {
		if (!($session instanceof CryptoSessionData)) {
			return new CryptoSessionData($session, $this->crypto, $this->passphrase);
		}

		return $session;
	}
}
