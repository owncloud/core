<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace SMB;

class Share {
	/**
	 * @var Server $server
	 */
	private $server;

	/**
	 * @var string $name
	 */
	private $name;

	/**
	 * @var Connection $connection
	 */
	private $connection;

	private $serverTimezone;

	/**
	 * @param Server $server
	 * @param string $name
	 * @throws ConnectionError
	 */
	public function __construct($server, $name) {
		$this->server = $server;
		$this->name = $name;
	}

	public function connect() {
		if ($this->connection and $this->connection->isValid()) {
			return;
		}
		$command = Server::CLIENT . ' -U ' . escapeshellarg($this->server->getUser()) .
			' //' . $this->server->getHost() . '/' . $this->name;
		$this->connection = new Connection($command);
		$this->connection->write($this->server->getPassword());
		if (!$this->connection->isValid()) {
			throw new ConnectionError();
		}
	}

	public function getName() {
		return $this->name;
	}

	protected function simpleCommand($command, $path) {
		$path = $this->escapePath($path);
		$cmd = $command . ' ' . $path;
		$output = $this->execute($cmd);
		return $this->parseOutput($output);
	}

	private function getServerTimeZone() {
		if (!$this->serverTimezone) {
			$this->serverTimezone = $this->server->getTimeZone();
		}
		return $this->serverTimezone;
	}

	/**
	 * List the content of a remote folder
	 *
	 * @param $path
	 * @return array
	 */
	public function dir($path) {
		$path = $this->escapePath($path);
		$output = $this->execute('cd ' . $path);
		//check output for errors
		$this->parseOutput($output);
		$output = $this->execute('dir');
		$this->execute('cd /');

		//last line is used space
		array_pop($output);
		$regex = '/^\s*(.*?)\s\s\s\s+(?:([DHARS]*)\s+)?([0-9]+)\s+(.*)$/';
		//2 spaces, filename, optional type, size, date
		$content = array();
		foreach ($output as $line) {
			if (preg_match($regex, $line, $matches)) {
				list(, $name, $type, $size, $time) = $matches;
				if ($name !== '.' and $name !== '..') {
					$content[$name] = array(
						'size' => intval(trim($size)),
						'type' => (strpos($type, 'D') !== false) ? 'dir' : 'file',
						'time' => strtotime($time . ' ' . $this->getServerTimeZone())
					);
				}
			}
		}
		return $content;
	}

	/**
	 * Create a folder on the share
	 *
	 * @param string $path
	 * @return bool
	 */
	public function mkdir($path) {
		return $this->simpleCommand('mkdir', $path);
	}

	/**
	 * Remove a folder on the share
	 *
	 * @param string $path
	 * @return bool
	 */
	public function rmdir($path) {
		return $this->simpleCommand('rmdir', $path);
	}

	/**
	 * Delete a file on the share
	 *
	 * @param string $path
	 * @return bool
	 */
	public function del($path) {
		return $this->simpleCommand('del', $path);
	}

	/**
	 * Rename a remote file
	 *
	 * @param string $from
	 * @param string $to
	 * @return bool
	 */
	public function rename($from, $to) {
		$path1 = $this->escapePath($from);
		$path2 = $this->escapePath($to);
		$cmd = 'rename ' . $path1 . ' ' . $path2;
		$output = $this->execute($cmd);
		return $this->parseOutput($output);
	}

	/**
	 * Upload a local file
	 *
	 * @param string $source local file
	 * @param string $target remove file
	 * @return bool
	 */
	public function put($source, $target) {
		$path1 = $this->escapeLocalPath($source); //first path is local, needs different escaping
		$path2 = $this->escapePath($target);
		$output = $this->execute('put ' . $path1 . ' ' . $path2);
		return $this->parseOutput($output);
	}

	/**
	 * Download a remote file
	 *
	 * @param string $source remove file
	 * @param string $target local file
	 * @return bool
	 */
	public function get($source, $target) {
		$path1 = $this->escapePath($source);
		$path2 = $this->escapeLocalPath($target); //second path is local, needs different escaping
		$output = $this->execute('get ' . $path1 . ' ' . $path2);
		return $this->parseOutput($output);
	}

	/**
	 * @return Server
	 */
	public function getServer() {
		return $this->server;
	}

	/**
	 * @param string $command
	 * @return array
	 */
	protected function execute($command) {
		$this->connect();
		$this->connection->write($command . PHP_EOL);
		$output = $this->connection->read();
		return $output;
	}

	/**
	 * check output for errors
	 *
	 * @param $lines
	 *
	 * @throws NotFoundException
	 * @throws AlreadyExistsException
	 * @throws AccessDeniedException
	 * @throws NotEmptyException
	 * @throws InvalidTypeException
	 * @throws \Exception
	 * @return bool
	 */
	protected function parseOutput($lines) {
		if (count($lines) === 0) {
			return true;
		} else {
			if (strpos($lines[0], 'does not exist')) {
				throw new NotFoundException();
			}
			$parts = explode(' ', $lines[0]);
			$error = false;
			foreach ($parts as $part) {
				if (substr($part, 0, 9) === 'NT_STATUS') {
					$error = $part;
				}
			}
			switch ($error) {
				case ErrorCodes::PathNotFound:
				case ErrorCodes::ObjectNotFound:
				case ErrorCodes::NoSuchFile:
					throw new NotFoundException();
				case ErrorCodes::NameCollision:
					throw new AlreadyExistsException();
				case ErrorCodes::AccessDenied:
					throw new AccessDeniedException();
				case ErrorCodes::DirectoryNotEmpty:
					throw new NotEmptyException();
				case ErrorCodes::FileIsADirectory:
				case ErrorCodes::NotADirectory:
					throw new InvalidTypeException();
				default:
					throw new \Exception();
			}
		}
	}

	/**
	 * @param string $string
	 * @return string
	 */
	protected function escape($string) {
		return escapeshellarg($string);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function escapePath($path) {
		$path = str_replace('/', '\\', $path);
		$path = str_replace('"', '^"', $path);
		return '"' . $path . '"';
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function escapeLocalPath($path) {
		$path = str_replace('"', '\"', $path);
		return '"' . $path . '"';
	}

	public function __destruct() {
		unset($this->connection);
	}
}
