<?php
/**
 * @author André Gaul <gaul@web-yard.de>
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christian Berendt <berendt@b1-systems.de>
 * @author Christopher T. Johnson <ctjctj@gmail.com>
 * @author Johan Björk <johanimon@gmail.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Martin Mattel <martin.mattel@diemattels.at>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Philipp Kapfer <philipp.kapfer@gmx.at>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files_External\Lib\Storage;

//require_once __DIR__ . '/../../../vendor/autoload.php';

use Aws\Handler\GuzzleV5\GuzzleHandler;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Ring\Client\StreamHandler;
use Icewind\Streams\IteratorDirectory;

class AmazonS3 extends \OCP\Files\Storage\StorageAdapter {

	/**
	 * @var \Aws\S3\S3Client
	 */
	private $connection;
	/**
	 * @var string
	 */
	private $bucket;
	/**
	 * @var array
	 */
	private static $tmpFiles = [];
	/**
	 * @var array
	 */
	private $params;
	/**
	 * @var bool
	 */
	private $test = false;
	/**
	 * @var int
	 */
	private $timeout = 15;
	/**
	 * @var int in seconds
	 */
	private $rescanDelay = 10;

	/**
	 * @param string $path
	 * @return string correctly encoded path
	 */
	private function normalizePath($path) {
		$path = trim($path, '/');

		if (!$path) {
			$path = '.';
		}

		return $path;
	}

	/**
	 * when running the tests wait to let the buckets catch up
	 */
	private function testTimeout() {
		if ($this->test) {
			sleep($this->timeout);
		}
	}

	private function isRoot($path) {
		return $path === '.';
	}

	private function cleanKey($path) {
		if ($this->isRoot($path)) {
			return '/';
		}
		return $path;
	}

	/**
	 * AmazonS3 constructor.
	 *
	 * @param $params
	 * @throws \Exception
	 */
	public function __construct($params) {
		if (empty($params['key']) || empty($params['secret']) || empty($params['bucket'])) {
			throw new \Exception("Access Key, Secret and Bucket have to be configured.");
		}

		$this->id = 'amazon::' . $params['bucket'];
		$this->updateLegacyId($params);

		$this->bucket = $params['bucket'];
		$this->test = isset($params['test']);
		$this->timeout = (!isset($params['timeout'])) ? 15 : $params['timeout'];
		$this->rescanDelay = (!isset($params['rescanDelay'])) ? 10 : $params['rescanDelay'];
		$params['region'] = empty($params['region']) ? 'eu-west-1' : $params['region'];
		$params['hostname'] = empty($params['hostname']) ? 's3.amazonaws.com' : $params['hostname'];
		if (!isset($params['port']) || $params['port'] === '') {
			$params['port'] = ($params['use_ssl'] === false) ? 80 : 443;
		}
		$this->params = $params;
	}

	/**
	 * Updates old storage ids (v0.2.1 and older) that are based on key and secret to new ones based on the bucket name.
	 * TODO Do this in an update.php. requires iterating over all users and loading the mount.json from their home
	 *
	 * @param array $params
	 */
	public function updateLegacyId (array $params) {
		$oldId = 'amazon::' . $params['key'] . md5($params['secret']);

		// find by old id or bucket
		$stmt = \OC::$server->getDatabaseConnection()->prepare(
			'SELECT `numeric_id`, `id` FROM `*PREFIX*storages` WHERE `id` IN (?, ?)'
		);
		$stmt->execute([$oldId, $this->id]);
		while ($row = $stmt->fetch()) {
			$storages[$row['id']] = $row['numeric_id'];
		}

		if (isset($storages[$this->id]) && isset($storages[$oldId])) {
			// if both ids exist, delete the old storage and corresponding filecache entries
			\OC\Files\Cache\Storage::remove($oldId);
		} else if (isset($storages[$oldId])) {
			// if only the old id exists do an update
			$stmt = \OC::$server->getDatabaseConnection()->prepare(
				'UPDATE `*PREFIX*storages` SET `id` = ? WHERE `id` = ?'
			);
			$stmt->execute([$this->id, $oldId]);
		}
		// only the bucket based id may exist, do nothing
	}

	/**
	 * Remove a file or folder
	 *
	 * @param string $path
	 * @return bool
	 */
	protected function remove($path) {
		// remember fileType to reduce http calls
		$fileType = $this->filetype($path);
		if ($fileType === 'dir') {
			return $this->rmdir($path);
		} else if ($fileType === 'file') {
			return $this->unlink($path);
		} else {
			return false;
		}
	}

	public function mkdir($path) {
		$path = $this->normalizePath($path);

		if ($this->is_dir($path)) {
			return false;
		}

		try {
			$this->getConnection()->putObject([
				'Bucket' => $this->bucket,
				'Key' => $path . '/',
				'Body' => '',
				'ContentType' => 'httpd/unix-directory'
			]);
			$this->testTimeout();
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}

		return true;
	}

	public function file_exists($path) {
		return $this->filetype($path) !== false;
	}


	public function rmdir($path) {
		$path = $this->normalizePath($path);

		if ($this->isRoot($path)) {
			return $this->clearBucket();
		}

		if (!$this->file_exists($path)) {
			return false;
		}

		return $this->batchDelete($path);
	}

	protected function clearBucket() {
		try {
			$this->getConnection()->deleteMatchingObjects($this->bucket);
			return true;
			// clearBucket() is not working with Ceph, so if it fails we try the slower approach
		} catch (\Exception $e) {
			return $this->batchDelete();
		}
		return false;
	}

	private function batchDelete ($path = null) {
		$params = [
			'Bucket' => $this->bucket
		];
		if ($path !== null) {
			$params['Prefix'] = $path . '/';
		}
		try {
			// Since there are no real directories on S3, we need
			// to delete all objects prefixed with the path.
			do {
				// instead of the iterator, manually loop over the list ...
				$objects = $this->getConnection()->listObjects($params);
				// ... so we can delete the files in batches
				$this->getConnection()->deleteObjects([
					'Bucket' => $this->bucket,
					'Objects' => $objects['Contents']
				]);
				$this->testTimeout();
				// we reached the end when the list is no longer truncated
			} while ($objects['IsTruncated']);
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}
		return true;
	}

	public function opendir($path) {
		$path = $this->normalizePath($path);

		if ($this->isRoot($path)) {
			$path = '';
		} else {
			$path .= '/';
		}

		try {
			$files = [];
			$result = $this->getConnection()->getIterator('ListObjects', [
				'Bucket' => $this->bucket,
				'Delimiter' => '/',
				'Prefix' => $path
			], ['return_prefixes' => true]);

			foreach ($result as $object) {
				if (isset($object['Key']) && $object['Key'] === $path) {
					// it's the directory itself, skip
					continue;
				}
				$file = basename(
					isset($object['Key']) ? $object['Key'] : $object['Prefix']
				);
				$files[] = $file;
			}

			return IteratorDirectory::wrap($files);
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}
	}

	public function stat($path) {
		$path = $this->normalizePath($path);

		try {
			$stat = [];
			if ($this->is_dir($path)) {
				//folders don't really exist
				$stat['size'] = -1; //unknown
				$stat['mtime'] = time() - $this->rescanDelay * 1000;
			} else {
				$result = $this->getConnection()->headObject([
					'Bucket' => $this->bucket,
					'Key' => $path
				]);

				$stat['size'] = $result['ContentLength'] ? $result['ContentLength'] : 0;
				if (isset($result['Metadata']['lastmodified'])) {
					$stat['mtime'] = strtotime($result['Metadata']['lastmodified']);
				} else {
					$stat['mtime'] = strtotime($result['LastModified']);
				}
			}
			$stat['atime'] = time();

			return $stat;
		} catch(S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}
	}

	public function filetype($path) {
		$path = $this->normalizePath($path);

		if ($this->isRoot($path)) {
			return 'dir';
		}

		try {
			if ($this->getConnection()->doesObjectExist($this->bucket, $path)) {
				return 'file';
			}
			if ($this->getConnection()->doesObjectExist($this->bucket, $path.'/')) {
				return 'dir';
			}
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}

		return false;
	}

	public function unlink($path) {
		$path = $this->normalizePath($path);

		if ($this->is_dir($path)) {
			return $this->rmdir($path);
		}

		try {
			$this->getConnection()->deleteObject([
				'Bucket' => $this->bucket,
				'Key' => $path
			]);
			$this->testTimeout();
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}

		return true;
	}

	public function fopen($path, $mode) {
		$path = $this->normalizePath($path);

		switch ($mode) {
			case 'r':
			case 'rb':
				$tmpFile = \OCP\Files::tmpFile();
				self::$tmpFiles[$tmpFile] = $path;

				try {
					$this->getConnection()->getObject([
						'Bucket' => $this->bucket,
						'Key' => $path,
						'SaveAs' => $tmpFile
					]);
				} catch (S3Exception $e) {
					\OCP\Util::logException('files_external', $e);
					return false;
				}

				return fopen($tmpFile, 'r');
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
				$tmpFile = \OCP\Files::tmpFile($ext);
				\OC\Files\Stream\Close::registerCallback($tmpFile, [$this, 'writeBack']);
				if ($this->file_exists($path)) {
					$source = $this->fopen($path, 'r');
					file_put_contents($tmpFile, $source);
				}
				self::$tmpFiles[$tmpFile] = $path;

				return fopen('close://' . $tmpFile, $mode);
		}
		return false;
	}

	public function touch($path, $mtime = null) {
		$path = $this->normalizePath($path);

		$metadata = [];
		if (is_null($mtime)) {
			$mtime = time();
		}
		$metadata = [
			'lastmodified' => gmdate(\Aws\Common\Enum\DateFormat::RFC1123, $mtime)
		];

		$fileType = $this->filetype($path);
		try {
			if ($fileType !== false) {
				if ($fileType === 'dir' && ! $this->isRoot($path)) {
					$path .= '/';
				}
				$this->getConnection()->copyObject([
					'Bucket' => $this->bucket,
					'Key' => $this->cleanKey($path),
					'Metadata' => $metadata,
					'CopySource' => $this->bucket . '/' . $path,
					'MetadataDirective' => 'REPLACE',
				]);
				$this->testTimeout();
			} else {
				$mimeType = \OC::$server->getMimeTypeDetector()->detectPath($path);
				$this->getConnection()->putObject([
					'Bucket' => $this->bucket,
					'Key' => $this->cleanKey($path),
					'Metadata' => $metadata,
					'Body' => '',
					'ContentType' => $mimeType,
					'MetadataDirective' => 'REPLACE',
				]);
				$this->testTimeout();
			}
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}

		return true;
	}

	public function copy($path1, $path2) {
		$path1 = $this->normalizePath($path1);
		$path2 = $this->normalizePath($path2);

		if ($this->is_file($path1)) {
			try {
				$this->getConnection()->copyObject([
					'Bucket' => $this->bucket,
					'Key' => $this->cleanKey($path2),
					'CopySource' => S3Client::encodeKey($this->bucket . '/' . $path1)
				]);
				$this->testTimeout();
			} catch (S3Exception $e) {
				\OCP\Util::logException('files_external', $e);
				return false;
			}
		} else {
			$this->remove($path2);

			try {
				$this->getConnection()->copyObject([
					'Bucket' => $this->bucket,
					'Key' => $path2 . '/',
					'CopySource' => S3Client::encodeKey($this->bucket . '/' . $path1 . '/')
				]);
				$this->testTimeout();
			} catch (S3Exception $e) {
				\OCP\Util::logException('files_external', $e);
				return false;
			}

			$dh = $this->opendir($path1);
			if (is_resource($dh)) {
				while (($file = readdir($dh)) !== false) {
					if (\OC\Files\Filesystem::isIgnoredDir($file)) {
						continue;
					}

					$source = $path1 . '/' . $file;
					$target = $path2 . '/' . $file;
					$this->copy($source, $target);
				}
			}
		}

		return true;
	}

	public function rename($path1, $path2) {
		$path1 = $this->normalizePath($path1);
		$path2 = $this->normalizePath($path2);

		if ($this->is_file($path1)) {

			if ($this->copy($path1, $path2) === false) {
				return false;
			}

			if ($this->unlink($path1) === false) {
				$this->unlink($path2);
				return false;
			}
		} else {

			if ($this->copy($path1, $path2) === false) {
				return false;
			}

			if ($this->rmdir($path1) === false) {
				$this->rmdir($path2);
				return false;
			}
		}

		return true;
	}

	public function test() {
		if ($this->getConnection()->getApi()->hasOperation('getBucketAcl')) {

			$test = $this->getConnection()->getBucketAcl([
				'Bucket' => $this->bucket,
			]);
			if (isset($test) && $test->getPath('Owner/ID') !== null) {
				return true;
			}
			return false;
		}

		$buckets = $this->getConnection()->listBuckets();
		if ($buckets->getPath('Owner/ID') === null ) {
			return false;
		}
		$bucketExists = !empty(array_filter($buckets->getPath('Buckets'), function ($k) {
			return $k['Name'] === $this->bucket;
		} ));
		return $bucketExists;
	}

	public function getId() {
		return $this->id;
	}

	/**
	 * Returns the connection
	 *
	 * @return S3Client connected client
	 * @throws \Exception if connection could not be made
	 */
	public function getConnection() {
		if (!is_null($this->connection)) {
			return $this->connection;
		}

		$scheme = ($this->params['use_ssl'] === false) ? 'http' : 'https';
		$base_url = $scheme . '://' . $this->params['hostname'] . ':' . $this->params['port'] . '/';


		$config = [
			'version' => '2006-03-01',
			'region' => $this->params['region'],
//			'signature_version' => 'v4',
			'credentials' => [
				'key' => $this->params['key'],
				'secret' => $this->params['secret'],
			],
			'endpoint' => $base_url,
			'use_path_style_endpoint' => $this->params['use_path_style'],
		];
		$client = new \GuzzleHttp\Client(['handler' => new StreamHandler()]);
		$emitter = $client->getEmitter();
		$emitter->on('before', function (BeforeEvent $event) {
			$request = $event->getRequest();
			if ($request->getMethod() !== 'PUT') {
				return;
			}
			$body = $request->getBody();
			if ($body !== null && $body->getSize() !== 0) {
				return;
			}
			if ($request->hasHeader('Content-Length')) {
				return;
			}
			// force content length header on empty body
			$request->setHeader('Content-Length', 0);
		});
		$h = new GuzzleHandler($client);
		$config['http_handler'] = $h;
		$this->connection = S3Client::factory($config);

		if (!$this->connection->doesBucketExist($this->bucket)) {
			try {
				$this->connection->createBucket([
					'Bucket' => $this->bucket
				]);
				$this->connection->waitUntil('BucketExists',[
					'Bucket' => $this->bucket,
					'waiter.interval' => 1,
					'waiter.max_attempts' => 15
				]);
				$this->testTimeout();
			} catch (S3Exception $e) {
				\OCP\Util::logException('files_external', $e);
				throw new \Exception('Creation of bucket failed. '.$e->getMessage());
			}
		}

		return $this->connection;
	}

	public function writeBack($tmpFile) {
		if (!isset(self::$tmpFiles[$tmpFile])) {
			return false;
		}

		try {
			$this->getConnection()->putObject([
				'Bucket' => $this->bucket,
				'Key' => $this->cleanKey(self::$tmpFiles[$tmpFile]),
				'SourceFile' => $tmpFile,
				'ContentType' => \OC::$server->getMimeTypeDetector()->detect($tmpFile),
				'ContentLength' => filesize($tmpFile)
			]);
			$this->testTimeout();

			unlink($tmpFile);
		} catch (S3Exception $e) {
			\OCP\Util::logException('files_external', $e);
			return false;
		}
	}

	/**
	 * check if curl is installed
	 */
	public static function checkDependencies() {
		return true;
	}

}
