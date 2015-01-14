<?php

/**
 * ownCloud - Encryption stream wrapper
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Files\Stream;

use Icewind\Streams\Wrapper;

class Encryption extends Wrapper {

	/** @var \OC\Encryption\Util */
	protected $util;

	/** @var \OCP\Encryption\IEncryptionModule */
	protected $encryptionModule;

	/** @var \OC\Files\Storage\Storage */
	protected $storage;

	/** @var string */
	protected $internalPath;

	/** @var integer */
	protected $size;

	/** @var integer */
	protected $unencryptedSize;

	/** @var array */
	protected $header;

	/** @var string */
	protected $fullPath;

	/**
	 * header data returned by the encryption module, will be written to the file
	 * in case of a write operation
	 *
	 * @var array
	 */
	protected $newHeader;

	/**
	 * user who perform the read/write operation null for public access
	 *
	 *  @var string
	 */
	protected $uid;

	/** @var bool */
	protected $readOnly;

	/** @var array */
	protected $expectedContextProperties;

	public function __construct() {
		$this->expectedContextProperties = array(
			'source',
			'storage',
			'internalPath',
			'fullPath',
			'encryptionModule',
			'header',
			'uid',
			'util'
		);
	}


	/**
	 * Wraps a stream with the provided callbacks
	 *
	 * @param resource $source
	 * @param string $internalPath relative to mount point
	 * @param string $fullPath relative to data/
	 * @param array $header
	 * @param sting $uid
	 * @param \OCP\Encryption\IEncryptionModule $encryptionModule
	 * @param \OC\Files\Storage\Storage $storage
	 * @param \OC\Encryption\Util $util
	 * @param string $mode
	 * @return resource
	 *
	 * @throws \BadMethodCallException
	 */
	public static function wrap($source, $internalPath, $fullPath, array $header,
		$uid, \OCP\Encryption\IEncryptionModule $encryptionModule,
		\OC\Files\Storage\Storage $storage, \OC\Encryption\Util $util, $mode) {

		$context = stream_context_create(array(
			'ocencryption' => array(
				'source' => $source,
				'storage' => $storage,
				'internalPath' => $internalPath,
				'fullPath' => $fullPath,
				'encryptionModule' => $encryptionModule,
				'header' => $header,
				'uid' => $uid,
				'util' => $util,
			)
		));

		return self::wrapSource($source, $mode, $context, 'ocencryption', 'OC\Files\Stream\Encryption');
	}

	/**
	 * add stream wrapper
	 *
	 * @param resource $source
	 * @param string $mode
	 * @param array $context
	 * @param string $protocol
	 * @param string $class
	 * @return resource
	 * @throws \BadMethodCallException
	 */
	protected static function wrapSource($source, $mode, $context, $protocol, $class) {
		try {
			stream_wrapper_register($protocol, $class);
			if (@rewinddir($source) === false) {
				$wrapped = fopen($protocol . '://', $mode, false, $context);
			} else {
				$wrapped = opendir($protocol . '://', $context);
			}
		} catch (\BadMethodCallException $e) {
			stream_wrapper_unregister($protocol);
			throw $e;
		}
		stream_wrapper_unregister($protocol);
		return $wrapped;
	}

	/**
	 * Load the source from the stream context and return the context options
	 *
	 * @param string $name
	 * @return array
	 * @throws \BadMethodCallException
	 */
	protected function loadContext($name) {
		$context = parent::loadContext($name);

		foreach ($this->expectedContextProperties as $property) {
			if (isset($context[$property])) {
				$this->{$property} = $context[$property];
			} else {
				throw new \BadMethodCallException('Invalid context, "' . $property . '" options not set');
			}
		}
		return $context;

	}

	public function stream_open($path, $mode, $options, &$opened_path) {
		$this->loadContext('ocencryption');

		$this->size = 0;

		if (
			$mode === 'w'
			|| $mode === 'w+'
			|| $mode === 'wb'
			|| $mode === 'wb+'
		) {
			// We're writing a new file so start write counter with 0 bytes
			$this->unencryptedSize = 0;
			$this->readOnly = false;
		} else {
			$this->readOnly = true;
			$size = $this->storage->filesize($this->internalPath);
			if (is_int($size)) {
				$this->size = $size;
			}
		}

		$sharePath = $path;
		if (!$this->storage->file_exists($this->internalPath)) {
			$sharePath = dirname($path);
		}

		$accessList = $this->util->getSharingUsersArray($sharePath);
		$this->newHeader = $this->encryptionModule->begin($path, $this->header, $accessList);

		return true;

	}

	public function stream_read($count) {
		$data = parent::stream_read($count);
		$decrypted = $this->encryptionModule->decrypt($data, $this->uid);
		return $decrypted;
	}

	public function stream_write($data) {
		$encrypted = $this->encryptionModule->encrypt($data);
		return parent::stream_write($encrypted);
	}

	public function stream_close() {

		$remainingData = $this->encryptionModule->end($this->fullPath);
		if ($this->readOnly === false && $remainingData) {
			parent::stream_write($remainingData);
			// TODO what to do with unencrypted size?
		}

		return parent::stream_close();
	}

}
