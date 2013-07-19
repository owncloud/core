<?php

/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @author Gregor Taetzner
 * @copyright 2012 Michael Gapczynski mtgap@owncloud.com
 * @copyright 2013 Gregor Taetzner gregor@freenet.de
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

namespace OC\Files\Storage;

require_once 'aws.phar';

class AmazonS3 extends \OC\Files\Storage\Common {

	private $s3;
	private $bucket;
	private $objects = array();
	private $objectsdelete = array();
	private $id;

	private static $tempFiles = array();

	public function __construct($params) {
		if (isset($params['key']) && isset($params['secret']) && isset($params['bucket'])) {
			$this->id = 'amazon::' . $params['key'] . md5($params['secret']);
			$this->s3 = \Aws\S3\S3Client::factory(array(
				'key' => $params['key'],
				'secret' => $params['secret']
			));
			$this->bucket = $params['bucket'];
		} else {
			throw new \Exception();
		}
	}

	private function getObject($path) {
		if (array_key_exists($path, $this->objects)) {
			return $this->objects[$path];
		} else {
			if (!$this->file_exists($path)) {
				//could be folder
				$path .= '/';
				if (!$this->file_exists($path)) {
					return false;
				}
			}
			try {
				$response = $this->s3->headObject(array(
					'Bucket' => $this->bucket,
					'Key' => $path
				));
				if ($response) {
					return array(
						'Key' => $path,
						'Size' => $response[ContentLength],
						'ContentType' => $response[ContentType]
					);
				}
			} catch (S3Exception $e) {
				return false;
			}
		}
		return false;
	}

	private function deleteFolder($path) {
		if (substr($path, -1) != '/') {
			$path .= '/';
		}
		$opt = array('Delimiter' => '/', 'Prefix' => $path);
		try {
			$response = $this->s3->listObjects(array_merge(
				array('Bucket' => $this->bucket),
				$opt
			));
			// delete files
			foreach ($response[Contents] as $object) {
				if ($object[Key] != $path) {
					$this->objectsdelete[] = array('Key' => $object[Key]);
				}
			}
			// delete folders
			foreach ($response[CommonPrefixes] as $object) {
				$this->deleteFolder($object[Prefix]);
			}
		} catch (S3Exception  $e) {
			return false;
		}
		// also add this folder
		$this->objectsdelete[] = array('Key' => $path);
		return true;
	}

	private function deleteObject($path) {
		try {
			$response = $this->s3->deleteObject(array(
				'Bucket' => $this->bucket,
				'Key' => $path
			));
			return true;
		} catch (S3Exception $e) {
			return false;
		}
	}

	private function deleteObjects($objects) {
		try {
			$response = $this->s3->deleteObjects(array_merge(
				array('Bucket' => $this->bucket),
				array('Objects' => $objects)
			));
			return true;
		} catch (S3Exception $e) {
			return false;
		}
	}

	public function getId() {
		return $this->id;
	}

	public function mkdir($path) {
		// Folders in Amazon S3 are 0 byte objects with a '/' at the end of the name
		if (substr($path, -1) != '/') {
			$path .= '/';
		}
		try {
			$response = $this->s3->putObject(array(
				'Bucket' => $this->bucket,
				'Key' => $path,
				'body' => ''
			));
			return true;
		} catch (S3Exception $e) {
			return false;
		}
	}

	public function rmdir($path) {
		if (substr($path, -1) != '/') {
			$path .= '/';
		}
		return $this->unlink($path);
	}

	public function opendir($path) {
		if ($path == '' || $path == '/') {
			// Use the '/' delimiter to only fetch objects inside the folder
			$opt = array('Delimiter' => '/');
		} else {
			if (substr($path, -1) != '/') {
				$path .= '/';
			}
			$opt = array('Delimiter' => '/', 'Prefix' => $path);
		}
		try {
			$response = $this->s3->listObjects(array_merge(
				array('Bucket' => $this->bucket),
				$opt
			));
			$files = array();
			foreach ($response[Contents] as $object) {
				// The folder being opened also shows up in the list of objects, don't add it to the files
				if ($object[Key] != $path) {
					$files[] = basename($object[Key]);
					// fetch ContentType
					$headresponse = $this->getObject($object[Key]);
					$object[ContentType] = $headresponse[ContentType];
					$this->objects[$object[Key]] = $object;
				}
			}
			// Sub folders show up as CommonPrefixes
			foreach ($response[CommonPrefixes] as $object) {
				$files[] = $object[Prefix];
				$this->objects[$object[Prefix]] = array(
					'Key' => $object[Prefix],
					'Size' => '0'
				);
			}
			\OC\Files\Stream\Dir::register('amazons3' . $path, $files);
			return opendir('fakedir://amazons3' . $path);
		} catch (S3Exception $e) {
			return false;
		}
		return false;
	}

	public function stat($path) {
		if ($path == '' || $path == '/') {
			$stat['size'] = '0';
			$stat['atime'] = time();
			$stat['mtime'] = $stat['atime'];
		} else if ($object = $this->getObject($path)) {
			$stat['size'] = $object['Size'];
			$stat['atime'] = time();
			$stat['mtime'] = strtotime($object['LastModified']);
		}

		if (isset($stat)) {
			return $stat;
		}
		return false;
	}

	public function filetype($path) {
		if ($path == '' || $path == '/') {
			return 'dir';
		} else {
			$object = $this->getObject($path);
			if ($object) {
				// Amazon S3 doesn't have typical folders, this is an alternative method to detect a folder
				if (substr($object[Key], -1) == '/' && $object['Size'] == 0) {
					return 'dir';
				} else {
					return 'file';
				}
			}
		}
		return false;
	}

	public function isReadable($path) {
		// TODO Check acl and determine who grantee is
		return true;
	}

	public function isUpdatable($path) {
		// TODO Check acl and determine who grantee is
		return true;
	}

	public function file_exists($path) {
		return $this->s3->doesObjectExist($this->bucket, $path);
	}

	public function unlink($path) {
		if (!$this->file_exists($path)) {
			//could be folder
			$path .= '/';
			if (!$this->file_exists($path)) {
				return false;
			}
			$this->objectsdelete = array();
			$this->deleteFolder($path);
			return $this->deleteObjects($this->objectsdelete);
		}
		return $this->deleteObject($path);
	}

	public function fopen($path, $mode) {
		switch ($mode) {
			case 'r':
			case 'rb':
				$tmpFile = \OC_Helper::tmpFile();
				$handle = fopen($tmpFile, 'w');
				try {
					$response = $this->s3->getObject(array(
						'Bucket' => $this->bucket,
						'Key'=> $path,
						'SaveAs' => $handle
					));
					return fopen($tmpFile, 'r');
				} catch( S3Exception $e ) {
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
				if (strrpos($path, '.') !== false) {
					$ext = substr($path, strrpos($path, '.'));
				} else {
					$ext = '';
				}
				$tmpFile = \OC_Helper::tmpFile($ext);
				\OC\Files\Stream\Close::registerCallback($tmpFile, array($this, 'writeBack'));
				if ($this->file_exists($path)) {
					$source = $this->fopen($path, 'r');
					file_put_contents($tmpFile, $source);
				}
				self::$tempFiles[$tmpFile] = $path;
				return fopen('close://' . $tmpFile, $mode);
		}
		return false;
	}

	public function writeBack($tmpFile) {
		if (isset(self::$tempFiles[$tmpFile])) {
			$handle = fopen($tmpFile, 'r');
			try {
				$response = $this->s3->putObject(array(
					'Bucket' => $this->bucket,
					'Key' => self::$tempFiles[$tmpFile],
					'Body' => $handle
				));
				unlink($tmpFile);
			} catch( S3Exception $e ) {
				//TODO throw error?
			}
		}
	}

	public function getMimeType($path) {
		if ($this->filetype($path) == 'dir') {
			return 'httpd/unix-directory';
		} else {
			$object = $this->getObject($path);
			if ($object) {
				return $object['ContentType'];
			}
		}
		return false;
	}

	public function touch($path, $mtime = null) {
		//TODO what is that for?
	}

	public function test() {
		try {
			$test = $this->s3->listBuckets();
			if (isset($test['Owner']) && $test['Owner']['ID'] != '') {
				return true;
			}
		} catch (S3Exception $e) {
			return false;
		}
		return false;
	}
}
