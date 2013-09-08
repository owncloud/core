<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace SMB;

class Server {
	const CLIENT = 'smbclient';
	const LOCALE = 'en_US.UTF-8';

	const CACHING_ENABLED = true;
	const CACHING_DISABLED = false;

	/**
	 * @var string $host
	 */
	private $host;

	/**
	 * @var string $user
	 */
	private $user;

	/**
	 * @var string $password
	 */
	private $password;

	/**
	 * @var bool $caching
	 */
	private $caching;

	/**
	 * @param string $host
	 * @param string $user
	 * @param string $password
	 * @param bool $caching
	 */
	public function __construct($host, $user, $password, $caching = self::CACHING_DISABLED) {
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->caching = $caching;
	}

	/**
	 * @return string
	 */
	public function getAuthString() {
		return $this->user . '%' . $this->password;
	}

	/**
	 * @return string
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * return string
	 */
	public function getHost() {
		return $this->host;
	}

	/**
	 * @return Share[]
	 */
	public function listShares() {
		$user = escapeshellarg($this->getUser());
		$command = self::CLIENT . ' -U ' . $user . ' ' . '-gL ' . escapeshellarg($this->getHost());
		$connection = new RawConnection($command);
		$connection->write($this->getPassword() . PHP_EOL);
		$output = $connection->readAll();

		$line = $output[0];

		$line = rtrim($line, ')');
		if (substr($line, -23) === ErrorCodes::LogonFailure) {
			throw new AuthenticationException();
		}
		if (substr($line, -26) === ErrorCodes::BadHostName) {
			throw new InvalidHostException();
		}
		if (substr($line, -22) === ErrorCodes::Unsuccessful) {
			throw new InvalidHostException();
		}
		if (substr($line, -28) === ErrorCodes::ConnectionRefused) {
			throw new InvalidHostException();
		}

		$shareNames = array();
		foreach ($output as $line) {
			if (strpos($line, '|')) {
				list($type, $name, $description) = explode('|', $line);
				if (strtolower($type) === 'disk') {
					$shareNames[$name] = $description;
				}
			}
		}

		$shares = array();
		foreach ($shareNames as $name => $description) {
			$shares[] = $this->getShare($name);
		}
		return $shares;
	}

	/**
	 * @param string $name
	 * @return Share
	 */
	public function getShare($name) {
		if ($this->caching === self::CACHING_ENABLED) {
			return new CachingShare($this, $name);
		} else {
			return new Share($this, $name);
		}
	}

	/**
	 * @return string
	 */
	public function getTimeZone() {
		$command = 'net time zone -S ' . escapeshellarg($this->getHost());
		return exec($command);
	}
}
