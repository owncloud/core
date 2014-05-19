<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Icewind\SMB;

class Server {
	const CLIENT = 'smbclient';
	const LOCALE = 'en_US.UTF-8';

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
	 * @param string $host
	 * @param string $user
	 * @param string $password
	 */
	public function __construct($host, $user, $password) {
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
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
	 * @throws \Icewind\SMB\AuthenticationException
	 * @throws \Icewind\SMB\InvalidHostException
	 */
	public function listShares() {
		$user = escapeshellarg($this->getUser());
		$command = self::CLIENT . ' -U ' . $user . ' ' . '-gL ' . escapeshellarg($this->getHost());
		$connection = new RawConnection($command);
		$connection->write($this->getPassword() . PHP_EOL);
		$output = $connection->readAll();

		$line = $output[0];

		// disregard password prompt
		if (substr($line, 0, 6) == 'Enter ' and count($output) > 1) {
			$line = $output[1];
		}

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
		return new Share($this, $name);
	}

	/**
	 * @return string
	 */
	public function getTimeZone() {
		$command = 'net time zone -S ' . escapeshellarg($this->getHost());
		return exec($command);
	}
}
