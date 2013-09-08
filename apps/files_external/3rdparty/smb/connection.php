<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace SMB;

class Connection extends RawConnection {
	const DELIMITER = 'smb:';

	/**
	 * send input to smbclient
	 *
	 * @param string $input
	 */
	public function write($input) {
		parent::write($input . PHP_EOL);
	}

	/**
	 * get all unprocessed output from smbclient untill the next prompt
	 *
	 * @throws ConnectionError
	 * @return array
	 */
	public function read() {
		if (!$this->isValid()) {
			throw new ConnectionError();
		}
		$line = parent::read(); //first line is prompt
		$this->checkConnectionError($line);

		$output = array();
		$line = parent::read();
		$length = strlen(self::DELIMITER);
		while (substr($line, 0, $length) !== self::DELIMITER) { //next prompt functions as delimiter
			$output[] .= $line;
			$line = parent::read();
		}
		return $output;
	}

	/**
	 * check if the first line holds a connection failure
	 *
	 * @param $line
	 * @throws AuthenticationException
	 * @throws InvalidHostException
	 */
	private function checkConnectionError($line) {
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
	}

	public function close() {
		$this->write('close' . PHP_EOL);
	}

	public function __destruct() {
		$this->close();
		parent::__destruct();
	}
}
