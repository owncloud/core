<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Michael Gapczynski <gapczynskim@gmail.com>
 * @author Philipp Kapfer <philipp.kapfer@gmx.at>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <rmccorkell@karoshi.org.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OC\Files\Storage;

use OCA\Files_External\Flysystem;
use OCA\Files_External\FtpAdapter;
use OCA\Files_External\PolyFill\CopyDirectory;

class FTP extends Flysystem {
	use CopyDirectory;

	private $password;
	private $user;
	private $host;
	private $secure;

	/**
	 * @var \League\Flysystem\Adapter\Ftp
	 */
	private $adapter;

	public function __construct($params) {
		if (isset($params['host']) && isset($params['user']) && isset($params['password'])) {
			$this->host = $params['host'];
			$this->user = $params['user'];
			$this->password = $params['password'];
			if (isset($params['secure'])) {
				if (is_string($params['secure'])) {
					$this->secure = ($params['secure'] === 'true');
				} else {
					$this->secure = (bool)$params['secure'];
				}
			} else {
				$this->secure = false;
			}
			$this->root = isset($params['root']) ? $params['root'] : '/';
			if (!$this->root || $this->root[0] != '/') {
				$this->root = '/' . $this->root;
			}
			if (substr($this->root, -1) !== '/') {
				$this->root .= '/';
			}
			$this->adapter = new FtpAdapter([
				'host' => $this->host,
				'username' => $this->user,
				'password' => $this->password,
				'ssl' => $this->secure
			]);
			$this->buildFlySystem($this->adapter);
		} else {
			throw new \Exception('Creating \OC\Files\Storage\FTP storage failed');
		}

	}

	public function getId() {
		return 'ftp::' . $this->user . '@' . $this->host . '/' . $this->root;
	}

	/**
	 * check if php-ftp is installed
	 */
	public static function checkDependencies() {
		if (function_exists('ftp_login')) {
			return (true);
		} else {
			return array('ftp');
		}
	}

	public function disconnect() {
		$this->adapter->disconnect();
	}

	public function __destruct() {
		$this->disconnect();
	}
}
