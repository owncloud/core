<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class OC_Archive_ZIP extends OC_Archive{
	/**
	 * @var ZipArchive zip
	 */
	private $zip=null;
	private $path;
	private $modified=false;

	function __construct($source) {
		$this->path=$source;
		$this->zip=new ZipArchive();
		if(!$this->zip->open($source, ZipArchive::CREATE)) {
			OCP\Util::writeLog('files_archive', 'Error while opening archive '.$source, OCP\Util::WARN);
		}
	}
	/**
	 * add an empty folder to the archive
	 * @param string path
	 * @return bool
	 */
	function addFolder($path) {
		$this->modified=true;
		return $this->zip->addEmptyDir($path);
	}
	/**
	 * add a file to the archive
	 * @param string path
	 * @param string source either a local file or string data
	 * @return bool
	 */
	function addFile($path, $source='') {
		if($source and $source[0]=='/' and file_exists($source)) {
			$result=$this->zip->addFile($source, $path);
		}else{
			$result=$this->zip->addFromString($path, $source);
		}
		if($result) {
			$this->modified=true;
			$this->close();//close and reopen to save the zip
			$this->zip->open($this->path);
		}
		return $result;
	}
	/**
	 * rename a file or folder in the archive
	 * @param string source
	 * @param string dest
	 * @return bool
	 */
	function rename($source, $dest) {
		$source=$this->stripPath($source);
		$dest=$this->stripPath($dest);
		$this->zip->renameName($source, $dest);
		$this->modified=true;
	}
	/**
	 * get the uncompressed size of a file in the archive
	 * @param string path
	 * @return int
	 */
	function filesize($path) {
		$stat=$this->zip->statName($path);
		return $stat['size'];
	}
	/**
	 * get the last modified time of a file in the archive
	 * @param string path
	 * @return int
	 */
	function mtime($path) {
		return filemtime($this->path);
	}
	/**
	 * get the files in a folder
	 * @param path
	 * @return array
	 */
	function getFolder($path) {
		$files=$this->getFiles();
		$folderContent=array();
		$pathLength=strlen($path);
		foreach($files as $file) {
			if(substr($file, 0, $pathLength)==$path and $file!=$path) {
				if(strrpos(substr($file, 0, -1), '/')<=$pathLength) {
					$folderContent[]=substr($file, $pathLength);
				}
			}
		}
		return $folderContent;
	}
	/**
	 * get all files in the archive
	 * @return array
	 */
	function getFiles() {
		$fileCount=$this->zip->numFiles;
		$files=array();
		for($i=0;$i<$fileCount;$i++) {
			$files[]=$this->zip->getNameIndex($i);
		}
		return $files;
	}
	/**
	 * get the content of a file
	 * @param string path
	 * @return string
	 */
	function getFile($path) {
		return $this->zip->getFromName($path);
	}
	/**
	 * extract a single file from the archive
	 * @param string path
	 * @param string dest
	 * @return bool
	 */
	function extractFile($path, $dest) {
		$fp = $this->zip->getStream($path);
		file_put_contents($dest, $fp);
	}
	/**
	 * extract the archive
	 * @param string path
	 * @param string dest
	 * @return bool
	 */
	function extract($dest) {
		return $this->zip->extractTo($dest);
	}
	/**
	 * check if a file or folder exists in the archive
	 * @param string path
	 * @return bool
	 */
	function fileExists($path) {
		return ($this->zip->locateName($path)!==false) or ($this->zip->locateName($path.'/')!==false);
	}
	/**
	 * remove a file or folder from the archive
	 * @param string path
	 * @return bool
	 */
	function remove($path) {
		$this->modified=true;
		if($this->fileExists($path.'/')) {
			return $this->zip->deleteName($path.'/');
		}else{
			return $this->zip->deleteName($path);
		}
	}
	/**
	 * get a file handler
	 * @param string path
	 * @param string mode
	 * @return resource
	 */
	function getStream($path, $mode) {
		if($mode=='r' or $mode=='rb') {
			return $this->zip->getStream($path);
		} else {
			//since we cant directly get a writable stream,
			//make a temp copy of the file and put it back
			//in the archive when the stream is closed
			if(strrpos($path, '.')!==false) {
				$ext=substr($path, strrpos($path, '.'));
			}else{
				$ext='';
			}
			$tmpFile=OCP\Files::tmpFile($ext);
			\OC\Files\Stream\Close::registerCallback($tmpFile, array($this, 'writeBack'));
			if($this->fileExists($path)) {
				$this->extractFile($path, $tmpFile);
			}
			self::$tempFiles[$tmpFile]=$path;
			return fopen('close://'.$tmpFile, $mode);
		}
	}

	private static $tempFiles=array();
	/**
	 * write back temporary files
	 */
	function writeBack($tmpFile) {
		if(isset(self::$tempFiles[$tmpFile])) {
			$this->addFile(self::$tempFiles[$tmpFile], $tmpFile);
			unlink($tmpFile);
		}
	}

	private function stripPath($path) {
		if(!$path || $path[0]=='/') {
			return substr($path, 1);
		}else{
			return $path;
		}
	}

	public function close() {
		$this->zip->close();
		if ($this->modified) {
			$this->fix_utf8_flags();
			$this->modified = false;
		}
	}


	/**
	 * Add unicode flag to all files in archive.
	 *
	 * NOTE: single disk archives only, no ZIP64 support.
	 * Taken from https://github.com/skodak/moodle/blob/master/lib/filestorage/zip_archive.php
	 * Original license: GPL3
	 * Re-licensed by Petr Škoda, https://github.com/skodak
	 *
	 * @return bool success, modifies the file contents
	 */
	protected function fix_utf8_flags() {
		if (!file_exists($this->path)) {
			return true;
		}

		// Note: the ZIP structure is described at http://www.pkware.com/documents/casestudies/APPNOTE.TXT
		if (!$fp = fopen($this->path, 'rb+')) {
			return false;
		}
		if (!$filesize = filesize($this->path)) {
			return false;
		}

		$centralend = self::zip_get_central_end($fp, $filesize);

		if ($centralend === false or $centralend['disk'] !== 0 or $centralend['disk_start'] !== 0 or $centralend['offset'] === 0xFFFFFFFF) {
			// Single disk archives only and o support for ZIP64, sorry.
			fclose($fp);
			return false;
		}

		fseek($fp, $centralend['offset']);
		$data = fread($fp, $centralend['size']);
		$pos = 0;
		$files = array();
		for ($i = 0; $i < $centralend['entries']; $i++) {
			$file = self::zip_parse_file_header($data, $centralend, $pos);
			if ($file === false) {
				// Wrong header, sorry.
				fclose($fp);
				return false;
			}

			$newgeneral = $file['general'] | pow(2, 11);
			if ($newgeneral === $file['general']) {
				// Nothing to do with this file.
				continue;
			}

			if (preg_match('/^[a-zA-Z0-9_\-\.]*$/', $file['name'])) {
				// ASCII file names are always ok.
				continue;
			}
			if ($file['extra']) {
				// Most probably not created by php zip ext, better to skip it.
				continue;
			}
			if (self::fix_utf8($file['name']) !== $file['name']) {
				// Does not look like a valid utf-8 encoded file name, skip it.
				continue;
			}

			// Read local file header.
			fseek($fp, $file['local_offset']);
			$localfile = unpack('Vsig/vversion_req/vgeneral/vmethod/vmtime/vmdate/Vcrc/Vsize_compressed/Vsize/vname_length/vextra_length', fread($fp, 30));
			if ($localfile['sig'] !== 0x04034b50) {
				// Borked file!
				fclose($fp);
				return false;
			}

			$file['local'] = $localfile;
			$files[] = $file;
		}

		foreach ($files as $file) {
			$localfile = $file['local'];
			// Add the unicode flag in central file header.
			fseek($fp, $file['central_offset'] + 8);
			if (ftell($fp) === $file['central_offset'] + 8) {
				$newgeneral = $file['general'] | pow(2, 11);
				fwrite($fp, pack('v', $newgeneral));
			}
			// Modify local file header too.
			fseek($fp, $file['local_offset'] + 6);
			if (ftell($fp) === $file['local_offset'] + 6) {
				$newgeneral = $localfile['general'] | pow(2, 11);
				fwrite($fp, pack('v', $newgeneral));
			}
		}

		fclose($fp);
		return true;
	}

	/**
	 * Read end of central signature of ZIP file.
	 * @internal
	 * @static
	 * @param resource $fp
	 * @param int $filesize
	 * @return array|bool
	 */
	public static function zip_get_central_end($fp, $filesize) {
		// Find end of central directory record.
		fseek($fp, $filesize - 22);
		$info = unpack('Vsig', fread($fp, 4));
		if ($info['sig'] === 0x06054b50) {
			// There is no comment.
			fseek($fp, $filesize - 22);
			$data = fread($fp, 22);
		} else {
			// There is some comment with 0xFF max size - that is 65557.
			fseek($fp, $filesize - 65557);
			$data = fread($fp, 65557);
		}

		$pos = strpos($data, pack('V', 0x06054b50));
		if ($pos === false) {
			// Borked ZIP structure!
			return false;
		}
		$centralend = unpack('Vsig/vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_length', substr($data, $pos, 22));
		if ($centralend['comment_length']) {
			$centralend['comment'] = substr($data, 22, $centralend['comment_length']);
		} else {
			$centralend['comment'] = '';
		}

		return $centralend;
	}


	/**
	 * Parse file header
	 * @internal
	 * @param string $data
	 * @param array $centralend
	 * @param int $pos (modified)
	 * @return array|bool file info
	 */
	public static function zip_parse_file_header($data, $centralend, &$pos) {
		$file = unpack('Vsig/vversion/vversion_req/vgeneral/vmethod/Vmodified/Vcrc/Vsize_compressed/Vsize/vname_length/vextra_length/vcomment_length/vdisk/vattr/Vattrext/Vlocal_offset', substr($data, $pos, 46));
		$file['central_offset'] = $centralend['offset'] + $pos;
		$pos = $pos + 46;
		if ($file['sig'] !== 0x02014b50) {
			// Borked ZIP structure!
			return false;
		}
		$file['name'] = substr($data, $pos, $file['name_length']);
		$pos = $pos + $file['name_length'];
		$file['extra'] = array();
		$file['extra_data'] = '';
		if ($file['extra_length']) {
			$extradata = substr($data, $pos, $file['extra_length']);
			$file['extra_data'] = $extradata;
			while (strlen($extradata) > 4) {
				$extra = unpack('vid/vsize', substr($extradata, 0, 4));
				$extra['data'] = substr($extradata, 4, $extra['size']);
				$extradata = substr($extradata, 4 + $extra['size']);
				$file['extra'][] = $extra;
			}
			$pos = $pos + $file['extra_length'];
		}
		if ($file['comment_length']) {
			$pos = $pos + $file['comment_length'];
			$file['comment'] = substr($data, $pos, $file['comment_length']);
		} else {
			$file['comment'] = '';
		}
		return $file;
	}

	private static function fix_utf8($value) {
		return iconv('UTF-8', 'UTF-8//IGNORE', $value);
	}
}
