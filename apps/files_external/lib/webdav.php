<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files\Storage;

class DAV extends \OC\Files\Storage\Common{
	private $password;
	private $user;
	private $host;
	private $secure;
	private $root;
	private $ready;
	/**
	 * @var \Sabre_DAV_Client
	 */
	private $client;

	private static $tempFiles=array();

	public function __construct($params) {
		if (isset($params['host']) && isset($params['user']) && isset($params['password'])) {
			$host = $params['host'];
			//remove leading http[s], will be generated in createBaseUri()
			if (substr($host, 0, 8) == "https://") $host = substr($host, 8);
			else if (substr($host, 0, 7) == "http://") $host = substr($host, 7);
			$this->host=$host;
			$this->user=$params['user'];
			$this->password=$params['password'];
			if (isset($params['secure'])) {
				if (is_string($params['secure'])) {
					$this->secure = ($params['secure'] === 'true');
				} else {
					$this->secure = (bool)$params['secure'];
				}
			} else {
				$this->secure = false;
			}
			$this->root=isset($params['root'])?$params['root']:'/';
			if ( ! $this->root || $this->root[0]!='/') {
				$this->root='/'.$this->root;
			}
			if (substr($this->root, -1, 1)!='/') {
				$this->root.='/';
			}
		} else {
			throw new \Exception();
		}
	}

	private function init(){
		if($this->ready) {
			return;
		}
		$this->ready = true;

			$settings = array(
				'baseUri' => $this->createBaseUri(),
				'userName' => $this->user,
				'password' => $this->password,
				'authType' => \Sabre_DAV_Client::AUTH_BASIC,
			);

		$this->client = new \Sabre_DAV_Client($settings);

		$caview = \OCP\Files::getStorage('files_external');
		if ($caview) {
			$certPath=\OCP\Config::getSystemValue('datadirectory').$caview->getAbsolutePath("").'rootcerts.crt';
			if (file_exists($certPath)) {
				$this->client->addTrustedCertificates($certPath);
			}
		}
	}

	public function getId(){
		return 'webdav::' . $this->user . '@' . $this->host . '/' . $this->root;
	}

	private function createBaseUri() {
		$baseUri='http';
		if ($this->secure) {
			$baseUri.='s';
		}
		$baseUri.='://'.$this->host.$this->root;
		return $baseUri;
	}

	public function mkdir($path) {
		$this->init();
		$path=$this->cleanPath($path);
		return $this->simpleResponse('MKCOL', $path, null, 201);
	}

	public function rmdir($path) {
		$this->init();
		$path=$this->cleanPath($path);
		return $this->simpleResponse('DELETE', $path, null, 204);
	}

	public function opendir($path) {
		$this->init();
		$path=$this->cleanPath($path);
		try {
			$url = \Sabre_DAV_URLUtil::encodePath($path);
			$response=$this->client->propfind($url, array(), 1);
			$id=md5('webdav'.$this->root.$path);
			$content = array();
			$files=array_keys($response);
			array_shift($files);//the first entry is the current directory
			foreach ($files as $file) {
				$file = urldecode(basename($file));
				$content[]=$file;
			}
			\OC\Files\Stream\Dir::register($id, $content);
			return opendir('fakedir://'.$id);
		} catch(\Exception $e) {
			\OCP\Util::writeLog("webdav client", 'opendir for '.$path.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return false;
		}
	}

	public function filetype($path) {
		$this->init();
		$path=$this->cleanPath($path);
		try {
			$response = $this->cachedPropfind($path);
			$responseType=$response["{DAV:}resourcetype"]->resourceType;
			return (count($responseType)>0 and $responseType[0]=="{DAV:}collection")?'dir':'file';
		} catch(\Exception $e) {
			error_log($e->getMessage());
			\OCP\Util::writeLog("webdav client", 'filetype for '.$path.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return false;
		}
	}

	public function isReadable($path) {
		return true;//not properly supported
	}

	public function isUpdatable($path) {
		return true;//not properly supported
	}

	public function file_exists($path) {
		$this->init();
		$path=$this->cleanPath($path);
		try {
			$this->cachedPropfind($path);
			return true;//no 404 exception
		} catch(\Exception $e) {
			return false;
		}
	}

	public function unlink($path) {
		$this->init();
		return $this->simpleResponse('DELETE', $path, null, 204);
	}

	public function fopen($path, $mode) {
		$this->init();
		$path=$this->cleanPath($path);
		$this->cleanCache($path);
		switch($mode) {
			case 'r':
			case 'rb':
				if ( ! $this->file_exists($path)) {
					return false;
				}
				//straight up curl instead of sabredav here, sabredav put's the entire get result in memory
				$curl = curl_init();
				$fp = fopen('php://temp', 'r+');
				curl_setopt($curl, CURLOPT_USERPWD, $this->user.':'.$this->password);
				$url = \Sabre_DAV_URLUtil::encodePath($path);
				curl_setopt($curl, CURLOPT_URL, $this->createBaseUri().$url);
				curl_setopt($curl, CURLOPT_FILE, $fp);

				curl_exec ($curl);
				curl_close ($curl);
				rewind($fp);
				return $fp;
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
				//emulate these
				if (strrpos($path, '.')!==false) {
					$ext=substr($path, strrpos($path, '.'));
				} else {
					$ext='';
				}
				$tmpFile = \OCP\Files::tmpFile($ext);
				\OC\Files\Stream\Close::registerCallback($tmpFile, array($this, 'writeBack'));
				if($this->file_exists($path)) {
					$this->getFile($path, $tmpFile);
				}
				self::$tempFiles[$tmpFile]=$path;
				return fopen('close://'.$tmpFile, $mode);
		}
	}

	public function writeBack($tmpFile) {
		if (isset(self::$tempFiles[$tmpFile])) {
			$this->uploadFile($tmpFile, self::$tempFiles[$tmpFile]);
			unlink($tmpFile);
		}
	}

	public function free_space($path) {
		$this->init();
		$path = $this->cleanPath($path);
		try {
			$response = $this->cachedPropfind($path);
			if (isset($response['{DAV:}quota-available-bytes'])) {
				return (int)$response['{DAV:}quota-available-bytes'];
			} else {
				return 0;
			}
		} catch (\Exception $e) {
			\OCP\Util::writeLog("webdav client", 'free_space for '.$path.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return \OC\Files\FREE_SPACE_UNKNOWN;
		}
	}

	public function touch($path, $mtime = null) {
		$this->init();
		if (is_null($mtime)) {
			$mtime = time();
		}
		$path = $this->cleanPath($path);
		$this->cleanCache($path);
		try {
			$url = \Sabre_DAV_URLUtil::encodePath($path);
			$this->client->proppatch($url, array('{DAV:}lastmodified' => $mtime));
		} catch (\Sabre_DAV_Exception_NotFound $e) {
			$this->file_put_contents($path, '');
		}
	}

	public function getFile($path, $target) {
		$this->init();
		$source = $this->fopen($path, 'r');
		file_put_contents($target, $source);
	}

	public function uploadFile($path, $target) {
		$targeturl = \Sabre_DAV_URLUtil::encodePath($target);
		
		$this->cleanCache($path);
		
		$this->init();
		$source = fopen($path, 'r');

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERPWD, $this->user . ':' . $this->password);
		curl_setopt($curl, CURLOPT_URL, $this->createBaseUri() . $targeturl);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curl, CURLOPT_INFILE, $source); // file pointer
		curl_setopt($curl, CURLOPT_INFILESIZE, filesize($path));
		curl_setopt($curl, CURLOPT_PUT, true);
		curl_exec($curl);
		curl_close($curl);
	}

	public function rename($path1, $path2) {
		$this->init();
		$path1 = $this->cleanPath($path1);
		$path2 = $this->createBaseUri() . $this->cleanPath($path2);
		$this->cleanCache($path1);
		$this->cleanCache($path2);
		$url1 = \Sabre_DAV_URLUtil::encodePath($path1);
		try {
			$this->client->request('MOVE', $url1, null, array('Destination' => $path2));
			return true;
		} catch (\Exception $e) {
			\OCP\Util::writeLog("webdav client", 'rename for '.$path1.' to '.$path2.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return false;
		}
	}

	public function copy($path1, $path2) {
		$this->init();
		$path1 = $this->cleanPath($path1);
		$path2 = $this->root . $this->cleanPath($path2);
		$this->cleanCache($path1);
		$this->cleanCache($path2);
		$url1 = \Sabre_DAV_URLUtil::encodePath($path1);
		try {
			$this->client->request('COPY', $url1, null, array('Destination' => $path2));
			return true;
		} catch (\Exception $e) {
			\OCP\Util::writeLog("webdav client", 'copy for '.$path1.' to '.$path2.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return false;
		}
	}

	public function stat($path) {
		$this->init();
		$path = $this->cleanPath($path);
		try {
			$response = $this->cachedPropfind($path);
			return array(
				'mtime' => strtotime($response['{DAV:}getlastmodified']),
				'size' => (int)isset($response['{DAV:}getcontentlength']) ? $response['{DAV:}getcontentlength'] : 0,
			);
		} catch (\Exception $e) {
			\OCP\Util::writeLog("webdav client", 'stat for '.$path.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return array();
		}
	}

	public function getMimeType($path) {
		$this->init();
		$path = $this->cleanPath($path);
		try {
			$response = $this->cachedPropfind($path);
			$responseType = $response["{DAV:}resourcetype"]->resourceType;
			$type = (count($responseType) > 0 and $responseType[0] == "{DAV:}collection") ? 'dir' : 'file';
			if ($type == 'dir') {
				return 'httpd/unix-directory';
			} elseif (isset($response['{DAV:}getcontenttype'])) {
				return $response['{DAV:}getcontenttype'];
			} else {
				return false;
			}
		} catch (\Exception $e) {
			\OCP\Util::writeLog("webdav client", 'getMimeType for '.$path.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return false;
		}
	}

	public function cleanPath($path) {
		return trim($path, '/');
	}

	private function simpleResponse($method, $path, $body, $expected) {
		$path = $this->cleanPath($path);
		$url = \Sabre_DAV_URLUtil::encodePath($path);
		$this->cleanCache($path);
		try {
			$response = $this->client->request($method, $url, $body);
			return $response['statusCode'] == $expected;
		} catch (\Exception $e) {
			\OCP\Util::writeLog("webdav client", $method.' for '.$url.' failed: '.\OCP\Util::sanitizeHTML($e->getMessage()), \OCP\Util::ERROR);
			return false;
		}
	}
	private function cachedPropfind ($path, $depth = 0) {
		$key = md5($this->createBaseUri() . $path);
		$cache = \OC_Cache::getUserCache();
		$cachedResponse= $cache->get($key);
		if ($cachedResponse) {
			return unserialize($cachedResponse);
		} else {
			$url = \Sabre_DAV_URLUtil::encodePath($path);
			$response = $this->client->propfind($url, array(
					'{DAV:}getcontenttype',
					'{DAV:}resourcetype',
					'{DAV:}getlastmodified',
					'{DAV:}getcontentlength',
					'{DAV:}quota-available-bytes'
				), $depth
			);
			\OCP\Util::writeLog('files_external', json_encode($response), \OCP\Util::INFO);
			$cache->set($key, serialize($response), 10); //cache only for ten seconds
			return $response;
		}
	}
	
	private function cleanCache($path) {
		$key = md5($this->createBaseUri() . $path);
		$cache = \OC_Cache::getUserCache();
		$cache->remove($key);
	}
}
