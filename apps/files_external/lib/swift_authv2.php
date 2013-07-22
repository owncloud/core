<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * Copyright (c) 2013 eNovance <licensing@enovance.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files\Storage;

require_once 'php-opencloud/lib/php-opencloud.php';

class SWIFT_AUTHV2 extends \OC\Files\Storage\Common{
	private $id;
	private $auth_url;
	private $root;
	private $user;
	private $password;
	private $secure;
	private $tenant_name;
	private $ready = false;
	/**
	 * @var \CF_Authentication auth
	 */
	private $auth;
	/**
	 * @var \CF_Connection conn
	 */
	private $conn;
	/**
	 * @var \CF_Container rootContainer
	 */
	private $rootContainer;

	private static $tempFiles=array();
	private $objects=array();
	private $containers=array();

	const SUBCONTAINER_FILE='.subcontainers';

	/**
	 * translate directory path to container name
	 * @param string $path
	 * @return string
	 */
	private function getContainerName($path) {
		$path=trim(trim($this->root, '/') . "/".$path, '/.');
		return str_replace('/', '\\', $path);
	}

	/**
	 * get container by path
	 * @param string $path
	 * @return \CF_Container
	 */
	private function getContainer($path) {
		if ($path==='' or $path==='/') {
			return $this->rootContainer;
		}
		if (isset($this->containers[$path])) {
			return $this->containers[$path];
		}
		try {
			$container=$this->conn->Container($this->getContainerName($path));
			$this->containers[$path]=$container;
			return $container;
		} catch(\OpenCloud\Common\Exceptions\ContainerNotFoundError $e) {
			return null;
		}
	}

	/**
	 * create container
	 * @param string $path
	 * @return \CF_Container
	 */
	private function createContainer($path) {
		if ($path==='' or $path==='/' or $path==='.') {
			$_container_cnx = $this->conn->Container(Null);
			$_created = $_container_cnx->Create(array('name'=>$this->getContainerName($path)));
			return $this->conn->Container($this->getContainerName($path));
		}
		$parent=dirname($path);
		if ($parent==='' or $parent==='/' or $parent==='.') {
			$parentContainer=$this->rootContainer;
		} else {
			if ( ! $this->containerExists($parent)) {
				$parentContainer=$this->createContainer($parent);
			} else {
				$parentContainer=$this->getContainer($parent);
			}
		}
		$this->addSubContainer($parentContainer, basename($path));
		$_container_cnx = $this->conn->Container(Null);
		$_created = $_container_cnx->Create(array('name'=>$this->getContainerName($path)));
		return $this->conn->Container($this->getContainerName($path));
	}

	/**
	 * get object by path
	 * @param string $path
	 * @return \CF_Object
	 */
	private function getObject($path) {
		if (isset($this->objects[$path])) {
			return $this->objects[$path];
		}
		$container=$this->getContainer(dirname($path));
		if (is_null($container)) {
			return null;
		} else {
			if ($path==="/" or $path==='') {
				return null;
			}
			try {
				$obj=$container->DataObject(basename($path));
				$this->objects[$path]=$obj;
				return $obj;
			} catch(\OpenCloud\Common\Exceptions\ObjFetchError $e) {
				return null;
			}
		}
	}

	/**
	 * get the names of all objects in a container
	 * @param CF_Container
	 * @return array
	 */
	private function getObjects($container) {
		if (is_null($container)) {
			return array();
		} else {
			$files = array();
			$object_list = $container->ObjectList();
			while ($object = $object_list->Next()) {
				array_push($files, $object->name);
			}
			return $files;
		}
	}

	/**
	 * check if an object exists
	 * @param string
	 * @return bool
	 */
	private function objectExists($path) {
		return !is_null($this->getObject($path));
	}

	/**
	 * check if container for path exists
	 * @param string $path
	 * @return bool
	 */
	private function containerExists($path) {
		return !is_null($this->getContainer($path));
	}

	/**
	 * get the list of emulated sub containers
	 * @param \CF_Container $container
	 * @return array
	 */
	private function getSubContainers($container) {
		$tmpFile=\OCP\Files::tmpFile();
		$obj=$this->getSubContainerFile($container);
		try {
			$obj->SaveToFilename($tmpFile);
		} catch(\Exception $e) {
			return array();
		}
		$obj->SaveToFilename($tmpFile);
		$containers=file($tmpFile);
		unlink($tmpFile);
		foreach ($containers as &$sub) {
			$sub=trim($sub);
		}
		return $containers;
	}

	/**
	 * add an emulated sub container
	 * @param \CF_Container $container
	 * @param string $name
	 * @return bool
	 */
	private function addSubContainer($container, $name) {
		if ( ! $name) {
			return false;
		}
		$tmpFile=\OCP\Files::tmpFile();
		$obj=$this->getSubContainerFile($container);
		try {
			$obj->SaveToFilename($tmpFile);
			$containers=file($tmpFile);
			foreach ($containers as &$sub) {
				$sub=trim($sub);
			}
			if(array_search($name, $containers) !== false) {
				unlink($tmpFile);
				return false;
			} else {
				$fh=fopen($tmpFile, 'a');
				fwrite($fh, $name . "\n");
			}
		} catch(\Exception $e) {
			file_put_contents($tmpFile, $name . "\n");
		}

		$obj = $container->DataObject();
		$obj->Create(array('name'=>self::SUBCONTAINER_FILE), $tmpFile);
		unlink($tmpFile);
		return true;
	}

	/**
	 * remove an emulated sub container
	 * @param \CF_Container $container
	 * @param string $name
	 * @return bool
	 */
	private function removeSubContainer($container, $name) {
		if ( ! $name) {
			return false;
		}
		$tmpFile=\OCP\Files::tmpFile();
		$obj=$this->getSubContainerFile($container);
		try {
			$obj->SaveToFilename($tmpFile);
			$containers=file($tmpFile);
		} catch (\Exception $e) {
			return false;
		}
		foreach ($containers as &$sub) {
			$sub=trim($sub);
		}
		$i=array_search($name, $containers);
		if ($i===false) {
			unlink($tmpFile);
			return false;
		} else {
			unset($containers[$i]);
			file_put_contents($tmpFile, implode("\n", $containers)."\n");
		}

		$obj = $container->DataObject();
		$obj->Create(array('name'=>self::SUBCONTAINER_FILE), $tmpFile);
		unlink($tmpFile);
		return true;
	}

	/**
	 * ensure a subcontainer file exists and return it's object
	 * @param \CF_Container $container
	 * @return \CF_Object
	 */
	private function getSubContainerFile($container) {
		try {
			$obj = $container->DataObject(self::SUBCONTAINER_FILE);
		} catch(\OpenCloud\Common\Exceptions\ObjFetchError $e) {
			$_obj = $container->DataObject();
			$obj = $_obj->Create(array('name' => self::SUBCONTAINER_FILE));
			$obj = $container->DataObject(self::SUBCONTAINER_FILE);
		}
		return $obj;
	}

	public function __construct($params) {
		if (isset($params['tenant_name']) &&
				isset($params['password']) &&
				isset($params['auth_url']) &&
				isset($params['user'])) {
			$this->auth_url=$params['auth_url'];
			$this->user=$params['user'];
			$this->password=$params['password'];
			$this->tenant_name=$params['tenant_name'];
			$this->service_name=isset($params['service_name'])?$params['service_name']:'swift';
			$this->region_name=isset($params['region_name'])?$params['region_name']:'RegionOne';
			$this->root=isset($params['root'])?$params['root']:'/';
			if (isset($params['secure'])) {
				if (is_string($params['secure'])) {
					$this->secure = ($params['secure'] === 'true');
				} else {
					$this->secure = (bool)$params['secure'];
				}
			} else {
				$this->secure = false;
			}
			if ( ! $this->root || $this->root[0]!=='/') {
				$this->root='/'.$this->root;
			}
			$this->id = 'swift:' . $this->auth_url . ':'.$this->root . ':' . $this->tenant_name . ':' . $this->user;
		} else {
			throw new \Exception();
		}
	}

	private function init(){
		if($this->ready) {
			return;
		}
		$this->ready = true;

		$credentials = array(
			'username' => $this->user,
			'tenantName' => $this->tenant_name,
			'password' => $this->password,
		);

		$connection = new \OpenCloud\OpenStack($this->auth_url, $credentials);
		$this->conn = $connection->ObjectStore($this->service_name,
											   $this->region_name);
		if ( ! $this->containerExists('/')) {
			$this->rootContainer=$this->createContainer('/');
		} else {
			$this->rootContainer=$this->getContainer('/');
		}
	}

	public function getId(){
		return $this->id;
	}


	public function mkdir($path) {
		$this->init();
		if ($this->containerExists($path)) {
			return false;
		} else {
			$this->createContainer($path);
			return true;
		}
	}

	public function rmdir($path) {
		$this->init();
		if (!$this->containerExists($path)) {
			return false;
		} else {
			$this->emptyContainer($path);
			if ($path!=='' and $path!=='/') {
				$parentContainer=$this->getContainer(dirname($path));
				$this->removeSubContainer($parentContainer, basename($path));
			}
			$_container_cnx = $this->conn->Container(
				$this->getContainerName($path.'/'.$sub));
			$_container_cnx->Delete();
			unset($this->containers[$path]);
			return true;
		}
	}

	private function emptyContainer($path) {
		$container=$this->getContainer($path);
		if (is_null($container)) {
			return;
		}
		$subContainers=$this->getSubContainers($container);
		foreach ($subContainers as $sub) {
			if ($sub) {
				$this->rmdir($path.'/'.$sub);
				unset($this->containers[$path.'/'.$sub]);
			}
		}

		$objects=$this->getObjects($container);
		foreach ($objects as $object) {
			$_obj = $container->DataObject();
			$_obj->Delete(array("name"=>$object));
			unset($this->objects[$path.'/'.$object]);
		}
	}

	public function opendir($path) {
		$this->init();
		$container=$this->getContainer($path);
		$files=$this->getObjects($container);
		$i=array_search(self::SUBCONTAINER_FILE, $files);
		if ($i!==false) {
			unset($files[$i]);
		}
		$subContainers=$this->getSubContainers($container);
		$files=array_merge($files, $subContainers);
		$id=$this->getContainerName($path);
		\OC\Files\Stream\Dir::register($id, $files);
		return opendir('fakedir://'.$id);
	}

	public function filetype($path) {
		$this->init();
		if ($this->containerExists($path)) {
			return 'dir';
		} else {
			return 'file';
		}
	}

	public function isReadable($path) {
		return true;
	}

	public function isUpdatable($path) {
		return true;
	}

	public function file_exists($path) {
		$this->init();
		if ($this->is_dir($path)) {
			return true;
		} else {
			return $this->objectExists($path);
		}
	}

	public function file_get_contents($path) {
		$this->init();
		$obj=$this->getObject($path);
		if (is_null($obj)) {
			return false;
		}
		return $obj->SaveToString();
	}

	public function file_put_contents($path, $content) {
		$this->init();
		$obj=$this->getObject($path);
		$this->resetMTime($obj);
		$obj->extra_headers = array();
		$obj->setData($content);
		return $obj->Create();
	}

	public function unlink($path) {
		$this->init();
		if ($this->containerExists($path)) {
			return $this->rmdir($path);
		}
		if ($this->objectExists($path)) {
			$container=$this->getContainer(dirname($path));
			$obj = $container->DataObject();
			$ex = NULL;
			try {
				$result = $obj->Delete(array('name'=>basename($path)));
			} catch (\OpenCloud\Common\Exceptions\DeleteError $e) {
				$ex = $e;
			}
			unset($this->objects[$path]);
			return is_null($ex);
		} else {
			return false;
		}
	}

	public function fopen($path, $mode) {
		$this->init();
		switch($mode) {
			case 'r':
			case 'rb':
				$obj=$this->getObject($path);
				if (is_null($obj)) {
					return false;
				}
				$fp = fopen('php://temp', 'r+');
				$obj->SaveToStream($fp);

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
				$tmpFile=$this->getTmpFile($path);
				\OC\Files\Stream\Close::registerCallback($tmpFile, array($this, 'writeBack'));
				self::$tempFiles[$tmpFile]=$path;
				return fopen('close://'.$tmpFile, $mode);
		}
	}

	public function writeBack($tmpFile) {
		if (isset(self::$tempFiles[$tmpFile])) {
			$this->fromTmpFile($tmpFile, self::$tempFiles[$tmpFile]);
			unlink($tmpFile);
		}
	}

	public function touch($path, $mtime=null) {
		$this->init();
		$obj=$this->getObject($path);
		if (is_null($obj)) {
			return false;
		}
		if (is_null($mtime)) {
			$mtime=time();
		}

		//emulate setting mtime with metadata
		$obj->metadata['Mtime']=$mtime;
		$obj->sync_metadata();
	}

	public function rename($path1, $path2) {
		$this->init();

		$sourceObject=$this->getObject($path1);
		$targetContainer=$this->getContainer(dirname($path2));
		$targetObject=$targetContainer->DataObject();
		$targetObject->name = basename($path2);
		$result = $sourceObject->Copy($targetObject);

		if ($result) {
			$targetObj=$this->getObject($path2);
			$this->resetMTime($targetObj);
			$this->unlink($path1);
		}
		return $result;
	}

	public function copy($path1, $path2) {
		$this->init();

		$sourceObject=$this->getObject($path1);
		$targetContainer=$this->getContainer(dirname($path2));
		$targetObject=$targetContainer->DataObject();
		$targetObject->name = basename($path2);
		$result = $sourceObject->Copy($targetObject);

		if ($result) {
			$targetObj=$this->getObject($path2);
			$this->resetMTime($targetObj);
			$this->unlink($path1);
		}
		return $result;
	}

	public function stat($path) {
		$this->init();
		$container=$this->getContainer($path);
		if ( ! is_null($container)) {
			return array(
				'mtime'=>-1,
				'size'=>$container->bytes,
				'ctime'=>-1
			);
		}

		$obj=$this->getObject($path);

		if (is_null($obj)) {
			return false;
		}

		if (isset($obj->metadata->Mtime) and $obj->metadata->Mtime > -1) {
			$mtime=$obj->metadata->Mtime;
		} else {
			$mtime=strtotime($obj->last_modified);
		}
		return array(
			'mtime'=>$mtime,
			'size'=>$obj->content_length,
			'ctime'=>-1,
		);
	}

	private function getTmpFile($path) {
		$this->init();
		$obj=$this->getObject($path);
		if ( ! is_null($obj)) {
			$tmpFile=\OCP\Files::tmpFile();
			$obj->SaveToFilename($tmpFile);
			return $tmpFile;
		} else {
			return \OCP\Files::tmpFile();
		}
	}

	private function fromTmpFile($tmpFile, $path) {
		$this->init();

		$container=$this->getContainer(dirname($path));
		try {
			$obj=$container->DataObject(basename($path));
		} catch(\OpenCloud\Common\Exceptions\ObjFetchError $e) {
			$obj=$container->DataObject();
		}
		$obj->Create(array('name'=>basename($path)), $tmpFile);
		$this->resetMTime($obj);
	}

	/**
	 * remove custom mtime metadata
	 * @param \CF_Object $obj
	 */
	private function resetMTime($obj) {
		$metadata = $obj->metadata->KeyList();

		if (in_array("Mtime", $metadata)) {
			$obj->metadata->Mtime = -1;
			$obj->extra_headers = array(); //BUG in owncloud?
			$obj->Update();
		}
	}
}
