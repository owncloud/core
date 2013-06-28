<?php

/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @author Christian Berendt
 * @copyright 2012 Michael Gapczynski mtgap@owncloud.com
 * @copyright 2013 Christian Berendt berendt@b1-systems.de
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

require_once 'aws-sdk/sdk.class.php';

class AmazonS3 extends \OC\Files\Storage\Common {

	private $s3;
	private $bucket;
	private $objects = array();
	private $id;

	private static $tempFiles = array();

	// TODO Update to new AWS SDK

	public function __construct($params) {
		if (isset($params['key']) && isset($params['secret']) && isset($params['bucket'])) {
			$this->id = 'amazon::' . $params['key'] . md5($params['secret']);
			$this->s3 = new \AmazonS3(array(
				'key' => $params['key'],
				'secret' => $params['secret'],
				'certificate_authority' => true
			));
			$this->bucket = $params['bucket'];
			if(isset($params['hostname']) && isset($params['port'])) {
				if($params['use_ssl'] === 'false') {
					$params['use_ssl'] = false;
				} else {
					$params['use_ssl'] = true;
				}
				if($params['use_path_style'] === 'false') {
					$params['use_path_style'] = false;
				} else {
					$params['use_path_style'] = true;
				}
				$this->s3->set_hostname($params['hostname'], $params['port']);
				if($params['use_path_style']) {
					$this->region = \AmazonS3::REGION_EU_W1;
					$this->s3->enable_path_style();
				} else {
					$this->region = '';
				}
				$this->s3->allow_hostname_override(false);
				$this->s3->use_ssl = $params['use_ssl'];

				if($this->s3->if_bucket_exists($this->bucket) == false) {
					$this->s3->createBucket($this->bucket, $this->region);
					$this->mkdir('/');
				}

			}
		} else {
			throw new \Exception();
		}
	}

	public function getConnection() {
		return $this->s3;
	}

	private function getObject($path) {
		if (array_key_exists($path, $this->objects)) {
			return $this->objects[$path];
		} else {
			$response = $this->s3->get_object_metadata($this->bucket, $path);
			if ($response) {
				$this->objects[$path] = $response;
				return $response;
				// This object could be a folder, a '/' must be at the end of the path
			} else if (substr($path, -1) != '/') {
				$response = $this->s3->get_object_metadata($this->bucket, $path . '/');
				if ($response) {
					$this->objects[$path] = $response;
					return $response;
				}
			}
		}
		return false;
	}

	public function getId() {
		return $this->id;
	}

	public function mkdir($path) {
		if($this->file_exists($path)) {
			return false;
		}
		$path = $this->convertDirectoryString($path);
		$response = $this->s3->create_object($this->bucket, $path, array('body' => ''));
		return $response->isOK();
	}

	public function rmdir($path) {
		foreach($this->get_contents_of_directory($this->convertDirectoryString($path)) as $subpath) {
			if($this->is_dir(stripcslashes($subpath))) {
				$this->rmdir(stripcslashes($subpath));
			} else {
				$this->unlink(stripcslashes($subpath));
			}
		}

		$response = $this->s3->delete_object($this->bucket, $this->convertDirectoryString($path));
		return $response->isOK();
	}

	public function opendir($path) {
		if ($path == '' || $path == '/') {
			// Use the '/' delimiter to only fetch objects inside the folder
			$opt = array('delimiter' => '/');
		} else {
			$path = $this->convertDirectoryString($path);
			$opt = array('delimiter' => '/', 'prefix' => $path);
		}
		$response = $this->s3->list_objects($this->bucket, $opt);
		if ($response->isOK()) {
			$files = array();
			foreach ($response->body->Contents as $object) {
				// The folder being opened also shows up in the list of objects, don't add it to the files
				if ($object->Key != $path) {
					$files[] = basename($object->Key);
				}
			}
			// Sub folders show up as CommonPrefixes
			foreach ($response->body->CommonPrefixes as $object) {
				$files[] = basename($object->Prefix);
			}
			\OC\Files\Stream\Dir::register('amazons3' . $path, $files);
			return opendir('fakedir://amazons3' . $path);
		}
		return false;
	}

	public function stat($path) {
		if ($path == '' || $path == '/') {
			$stat['size'] = $this->s3->get_bucket_filesize($this->bucket);
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
				if (substr($object['Key'], -1) == '/' && $object['Size'] == 0) {
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
		if ($this->is_dir($path)) {
			$path = $this->convertDirectoryString($path);
		}
		return $this->s3->if_object_exists($this->bucket, $path);
	}

	private function get_contents_of_directory($path) {
		if ($path == '' || $path == '/') {
			$opt = array('delimiter' => '/');
		} else {
			$opt = array('delimiter' => '/', 'prefix' => $path);
		}

		$response = $this->s3->list_objects($this->bucket, $opt);

                $files = array();
                foreach ($response->body->Contents as $object) {
                        if ($object->Key != $path) {
                                $files[] = $object->Key;
                        }
                }

                foreach ($response->body->CommonPrefixes as $object) {
                        $files[] = $object->Prefix;
                }

		return $files;

	}

	public function unlink($path) {
		$response = $this->s3->delete_object($this->bucket, $path);
		return $response->isOK();
	}

	public function fopen($path, $mode) {
		switch ($mode) {
			case 'r':
			case 'rb':
				$tmpFile = \OC_Helper::tmpFile();
				$handle = fopen($tmpFile, 'w');
				$response = $this->s3->get_object($this->bucket, $path, array('fileDownload' => $handle));
				if ($response->isOK()) {
					return fopen($tmpFile, 'r');
				}
				break;
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
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$response = $this->s3->create_object($this->bucket,
				self::$tempFiles[$tmpFile],
				array(
					'length' => filesize($tmpFile),
					'fileUpload' => $handle,
					'contentType' => finfo_file($finfo, $tmpFile)
				)
			);
			finfo_close($finfo);
			if ($response->isOK()) {
				unlink($tmpFile);
			}
		}
	}

	public function getMimeType($path) {
		if ($this->is_dir($path)) {
			return 'httpd/unix-directory';
		} else if ($this->file_exists($path)) {
			$headers = $this->getHeaders($path);
			return $headers['content-type'];
		} else {
			return false;
		}
	}

	public function touch($path, $mtime = null) {
		if (is_null($mtime)) {
			$mtime = time();
		}
		$content_type = 'text/plain';
		if ($this->is_dir($path)) {
			$path = $this->convertDirectoryString($path);
			$content_type = 'httpd/unix-directory';
		}

		$response = $this->s3->update_object(
			$this->bucket,
			$path,
			array('meta' => array('LastModified' => $mtime))
		);
		if($response->isOK() == false) {
			$response = $this->s3->create_object(
				$this->bucket,
				$path,
				array(
					'contentType' => $content_type,
					'length' => 0,
					'meta' => array('LastModified' => $mtime)
				)
			);
		}
		return $response->isOK();
	}

	public function test() {
		$test = $this->s3->get_canonical_user_id();
		if (isset($test['id']) && $test['id'] != '') {
			return true;
		}
		return false;
	}

	private function convertDirectoryString($path) {
		// Folders in Amazon S3 are 0 byte objects with a '/' at the end of the name
		if (substr($path, -1) != '/') {
			$path .= '/';
		}
		return $path;
	}

	private function getMetadata($path) {
		if($this->is_dir($path)) {
			$response = $this->s3->get_object_metadata(
				$this->bucket,
				$this->convertDirectoryString($path)
			);
		} else {
			$response = $this->s3->get_object_metadata(
				$this->bucket,
				$path
			);
		}
		return $response;
	}

	private function getHeaders($path) {
		if($this->is_dir($path)) {
			$response = $this->s3->get_object_headers(
				$this->bucket,
				$this->convertDirectoryString($path)
			);
		} else {
			$response = $this->s3->get_object_headers(
				$this->bucket,
				$path
			);
		}
		return $response->header;
	}

	public function copy($path1, $path2) {
		if($this->is_file($path1)) {
			if($this->file_exists($path2)) {
				return false;
			}

			$response = $this->s3->copy_object(
				array(
					'bucket' => $this->bucket,
					'filename' => $path1
				),
				array(
					'bucket' => $this->bucket,
					'filename' => $path2,
					'meta' => $this->getMetadata($path1)
				)
			);
			return $response->isOK();
		} else {
			if($this->file_exists($this->convertDirectoryString($path2))) {
				return false;
			}

                	foreach($this->get_contents_of_directory($this->convertDirectoryString($path1)) as $subpath) {
				if($this->convertDirectoryString($path1) == $subpath) {
					continue;
				}
				$source = stripcslashes($subpath);
				$target = $path2 . substr(stripcslashes($subpath), strlen($path1));
				$this->copy($source, $target);
                	}

			$response = $this->s3->copy_object(
				array(
					'bucket' => $this->bucket,
					'filename' => $this->convertDirectoryString($path1)
				),
				array(
					'bucket' => $this->bucket,
					'filename' => $this->convertDirectoryString($path2)
				)
			);
			return $response->isOK();
		}
	}

	public function rename($path1, $path2) {
		if($this->is_file($path1)) {
			if($this->file_exists($path2)) {
				return false;
			}

			if($this->copy($path1, $path2) == false) {
				return false;
			}

			if($this->unlink($path1) == false) {
				$this->unlink($path2);
				return false;
			}
		} else {
			if($this->file_exists($this->convertDirectoryString($path2))) {
				return false;
			}

			if($this->copy($path1, $path2) == false) {
				return false;
			}

			if($this->rmdir($path1) == false) {
				$this->rmdir($path2);
				return false;
			}
		}

		return true;
	}

}
