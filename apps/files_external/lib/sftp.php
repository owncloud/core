<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author hkjolhede <hkjolhede@gmail.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lennart Rosam <lennart.rosam@medien-systempartner.de>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <rmccorkell@karoshi.org.uk>
 * @author Ross Nicoll <jrn@jrn.me.uk>
 * @author SA <stephen@mthosting.net>
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

use \OCA\Files_External\AuthenticationFailureException;

/**
* Uses phpseclib's Net_SFTP class and the Net_SFTP_Stream stream wrapper to
* provide access to SFTP servers.
*/
class SFTP extends \OC\Files\Storage\Common {
	private $host;
	private $user;
	private $password;
	private $root;
	private $port = 22;

	/**
	* @var \Net_SFTP
	*/
	protected $client;

	/**
	 * {@inheritdoc}
	 */
	public function __construct($params) {
		// Register sftp://
		\Net_SFTP_Stream::register();

		$this->host = $params['host'];
		
		//deals with sftp://server example
		$proto = strpos($this->host, '://');
		if ($proto != false) {
			$this->host = substr($this->host, $proto+3);
		}

		//deals with server:port
		$hasPort = strpos($this->host,':');
		if($hasPort != false) {
			$pieces = explode(":", $this->host);
			$this->host = $pieces[0];
			$this->port = $pieces[1];
		}

		$this->user = $params['user'];
		$this->password
			= isset($params['password']) ? $params['password'] : '';
		$this->root
			= isset($params['root']) ? $this->cleanPath($params['root']) : '/';

		if ($this->root[0] != '/') {
			 $this->root = '/' . $this->root;
		}

		if (substr($this->root, -1, 1) != '/') {
			$this->root .= '/';
		}
	}

	/**
	 * Returns the connection.
	 *
	 * @return \Net_SFTP connected client instance
	 * @throws \Exception when the connection failed
	 */
	public function getConnection() {
		if (!is_null($this->client)) {
			return $this->client;
		}

		try {
			try {
				$hostKeys = $this->readHostKeys();
			} catch (\Exception $e) {
				$hostKeys = array();
			}
			$this->client = new \Net_SFTP($this->host, $this->port);

			// The SSH Host Key MUST be verified before login().
			$currentHostKey = $this->client->getServerPublicHostKey();
			if (array_key_exists($this->host, $hostKeys)) {
				if ($hostKeys[$this->host] != $currentHostKey) {
					throw new AuthenticationFailureException('Host public key does not match known key');
				}
			} else {
				$hostKeys[$this->host] = $currentHostKey;
				try {
					$this->writeHostKeys($hostKeys);
				} catch (\Exception $e) {
				}
			}

			if (!$this->client->login($this->user, $this->password)) {
				throw new AuthenticationFailureException('Login failed');
			}
		} catch (\Exception $e) {
			throw new \OCP\Files\StorageNotAvailableException('Not available', 0, $e);
		}
		return $this->client;
	}

	/**
	 * {@inheritdoc}
	 */
	public function test() {
		if (
			!isset($this->host)
			|| !isset($this->user)
			|| !isset($this->password)
		) {
			return false;
		}
		return $this->getConnection()->nlist() !== false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getId(){
		return 'sftp::' . $this->user . '@' . $this->host . ':' . $this->port . '/' . $this->root;
	}

	/**
	 * @return string
	 */
	public function getHost() {
		return $this->host;
	}

	/**
	 * @return string
	 */
	public function getRoot() {
		return $this->root;
	}

	/**
	 * @return mixed
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param string $path
	 * @return string
	 */
	private function absPath($path) {
		return $this->root . $this->cleanPath($path);
	}

	/**
	 * @return bool|string
	 */
	private function hostKeysPath() {
		$storage_view = \OCP\Files::getStorage('files_external');
		if ($storage_view) {
			return \OC::$server->getConfig()->getSystemValue('datadirectory') .
				$storage_view->getAbsolutePath('') .
				'ssh_hostKeys';
		}
		throw new \Exception('Unable to get path for host keys');
	}

	/**
	 * @param $keys
	 * @return bool
	 */
	protected function writeHostKeys($keys) {
		$keyPath = $this->hostKeysPath();
		if ($keyPath && file_exists($keyPath)) {
			$fp = fopen($keyPath, 'w');
			foreach ($keys as $host => $key) {
				fwrite($fp, $host . '::' . $key . "\n");
			}
			fclose($fp);
			return true;
		}
		throw new \Exception('Unable to write host keys');
	}

	/**
	 * @return array
	 */
	protected function readHostKeys() {
		$keyPath = $this->hostKeysPath();
		if (file_exists($keyPath)) {
			$hosts = array();
			$keys = array();
			$lines = file($keyPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			if ($lines) {
				foreach ($lines as $line) {
					$hostKeyArray = explode("::", $line, 2);
					if (count($hostKeyArray) == 2) {
						$hosts[] = $hostKeyArray[0];
						$keys[] = $hostKeyArray[1];
					}
				}
				return array_combine($hosts, $keys);
			}
		}
		throw new \Exception('Unable to read host keys');
	}

	/**
	 * {@inheritdoc}
	 */
	public function mkdir($path) {
		return $this->getConnection()->mkdir($this->absPath($path));
	}

	/**
	 * {@inheritdoc}
	 */
	public function rmdir($path) {
		return $this->getConnection()->delete($this->absPath($path), true);
	}

	/**
	 * {@inheritdoc}
	 */
	public function opendir($path) {
		$list = $this->getConnection()->nlist($this->absPath($path));
		if ($list === false) {
			throw new \Exception('Unable to list files');
		}

		$id = md5('sftp:' . $path);
		$dirStream = array();
		foreach($list as $file) {
			if ($file != '.' && $file != '..') {
				$dirStream[] = $file;
			}
		}
		\OC\Files\Stream\Dir::register($id, $dirStream);
		return opendir('fakedir://' . $id);
	}

	/**
	 * {@inheritdoc}
	 */
	public function filetype($path) {
		$stat = $this->getConnection()->stat($this->absPath($path));
		switch ($stat['type']) {
			case NET_SFTP_TYPE_REGULAR:
				return 'file';
				break;
			case NET_SFTP_TYPE_DIRECTORY:
				return 'dir';
				break;
			default:
				return false;
				break;
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function file_exists($path) {
		return $this->getConnection()->stat($this->absPath($path)) !== false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function unlink($path) {
		return $this->getConnection()->delete($this->absPath($path), true);
	}

	/**
	 * {@inheritdoc}
	 */
	public function fopen($path, $mode) {
		$absPath = $this->absPath($path);
		switch($mode) {
			case 'r':
			case 'rb':
				if ( !$this->file_exists($path)) {
					break;
				}
			case 'w':
			case 'wb':
			case 'a':
			case 'ab':
			case 'r+':
			case 'w+':
			case 'wb+':
			case 'a+':
			case 'x':
			case 'x+':
			case 'c':
			case 'c+':
				$context = stream_context_create(array('sftp' => array('session' => $this->getConnection())));
				return fopen($this->constructUrl($path), $mode, false, $context);
		}
		throw new \Exception('Unable to open file');
	}

	/**
	 * {@inheritdoc}
	 */
	public function touch($path, $mtime=null) {
		if (!is_null($mtime)) {
			return false;
		}
		if (!$this->file_exists($path)) {
			$this->getConnection()->put($this->absPath($path), '');
		} else {
			return false;
		}
		return true;
	}

	/**
	 * @param string $path
	 * @param string $target
	 * @throws \Exception
	 */
	public function getFile($path, $target) {
		$this->getConnection()->get($path, $target);
	}

	/**
	 * @param string $path
	 * @param string $target
	 * @throws \Exception
	 */
	public function uploadFile($path, $target) {
		$this->getConnection()->put($target, $path, NET_SFTP_LOCAL_FILE);
	}

	/**
	 * {@inheritdoc}
	 */
	public function rename($source, $target) {
		if (!$this->is_dir($target) && $this->file_exists($target)) {
			$this->unlink($target);
		}
		return $this->getConnection()->rename(
			$this->absPath($source),
			$this->absPath($target)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function stat($path) {
		$stat = $this->getConnection()->stat($this->absPath($path));

		$mtime = $stat ? $stat['mtime'] : -1;
		$size = $stat ? $stat['size'] : 0;

		return array('mtime' => $mtime, 'size' => $size, 'ctime' => -1);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	public function constructUrl($path) {
		// Do not pass the password here. We want to use the Net_SFTP object
		// supplied via stream context or fail. We only supply username and
		// hostname because this might show up in logs (they are not used).
		$url = 'sftp://'.$this->user.'@'.$this->host.':'.$this->port.$this->root.$path;
		return $url;
	}
}
