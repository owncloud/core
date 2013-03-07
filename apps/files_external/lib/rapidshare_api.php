<?php

/**
 * ownCloud
 *
 * @author Philipp Kapfer
 * @copyright 2013 Philipp Kapfer philipp.kapfer@gmx.at
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

class RapidShareAPI {

	const Cache_Folders = 1;
	const Cache_Files = 2;

	private $user;
	private $password;

	private $curl;
	private $folderCache;
	private $fileCache = array();

	public function __construct($user, $password) {
		$this->user = $user;
		$this->password = $password;

		if (array_search('rapidshare', stream_get_wrappers()) === false) {
			stream_wrapper_register('rapidshare', 'RapidShareAPI_StreamWrapper', STREAM_IS_URL);
		}
	}

	public function __destruct() {
		curl_close($this->curl);
		$this->curl = null;
	}

	public function nextUploadServer() {
		return $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=nextuploadserver');
	}

	public function listRealFolders() {
		if ($this->folderCache === null) {
			$this->folderCache = array();

			$folderString = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=listrealfolders');
			if ($folderString === 'NONE') {
				return array();
			}

			$folderList = array_filter(explode("\n", $folderString));
			foreach ($folderList as $item) {
				$folder = str_getcsv($item);
				$this->folderCache[] = array('name' => $folder[2], 'id' => $folder[0], 'parent' => $folder[1]);
			}
		}

		return $this->folderCache;
	}

	public function addRealFolder($name, $parentId) {
		return $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=addrealfolder&name=' . rawurlencode($name) . '&parent=' . $parentId);
	}

	public function delRealFolder($folderId) {
		$result = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=delrealfolder&realfolder=' . $folderId);
		return $result === 'OK';
	}

	public function moveRealFolder($folderId, $newParentId) {
		$result = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=moverealfolder&realfolder=' . $folderId . '&newparent=' . $newParentId);
		return $result === 'OK';
	}

	public function listFiles($folderId, $filename='', $fileIds=array()) {
		$fileIdString = is_array($fileIds) ? implode(',', $fileIds) : $fileIds;
		$cacheKey = $folderId . $filename . $fileIdString;

		if (!array_key_exists($cacheKey, $this->fileCache)) {
			$this->fileCache[$cacheKey] = array();

			$fileString = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=listfiles&realfolder=' . $folderId .
				'&filename=' . rawurlencode($filename) . '&fileids=' . $fileIdString . '&fields=filename,size,uploadtime,lastdownload,serverid,md5hex');
			if ($fileString === 'NONE') {
				return array();
			}

			$fileList = array_filter(explode("\n", $fileString));
			foreach ($fileList as $item) {
				$file = str_getcsv($item);
				$this->fileCache[$cacheKey][] = array('name' => $file[1], 'id' => $file[0], 'bytes' => $file[2], 'created' => intval($file[3]),
					'modified' => intval($file[3]), 'accessed' => intval($file[4]), 'server' => $file[5], 'md5' => $file[6]);
			}
		}

		return $this->fileCache[$cacheKey];
	}

	public function deleteFiles($fileIds) {
		$fileIdString = is_array($fileIds) ? implode(',', $fileIds) : $fileIds;
		$result = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=deletefiles&files=' . $fileIdString);
		return $result === 'OK';
	}

	public function moveFilesToRealFolder($fileIds, $newFolderId) {
		$fileIdString = is_array($fileIds) ? implode(',', $fileIds) : $fileIds;
		$result = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=movefilestorealfolder&files=' . $fileIdString . '&realfolder=' . $newFolderId);
		return $result === 'OK';
	}

	public function renameFile($fileId, $newName) {
		$result = $this->curlRequest('https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=renamefile&fileid=' . $fileId . '&newname=' . rawurlencode($newName));
		return $result;
	}

	public function llapiOpen($server, $path, $mode) {
		if ($path[0] !== '/') {
			$path = '/' . $path;
		}
		return fopen('rapidshare://' . rawurlencode($this->user) . ':' . rawurlencode($this->password) . '@rs' . $server . 'p1' . $path, $mode);
	}

	public function clearCache($cache=null, $folderId=null) {
		if ($cache === null) {
			$this->folderCache = null;
			$this->fileCache = array();
		} elseif ($cache === RapidShareAPI::Cache_Files) {
			if ($folderId === null) {
				$this->fileCache = array();
			} else {
				$folderId = '' . $folderId;
				unset($this->fileCache[$folderId]);
			}
		} elseif ($cache === RapidShareAPI::Cache_Folders) {
			$this->folderCache = null;
		}
	}

	private function curlRequest($url) {
		if ($this->curl === null) {
			$this->curl = curl_init();
		}

		curl_setopt($this->curl, CURLOPT_URL, $url . '&login=' . rawurlencode($this->user) .'&password=' . rawurlencode($this->password));
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'ownCloud/' . OC_Util::getVersionString());
		$response = curl_exec($this->curl);

		if (curl_errno($this->curl) > 0 || strpos($response, 'ERROR: ') === 0) {
			if (strpos($response, 'ERROR: ') === 0) {
				$error = substr($response, strlen('ERROR: '));
			} else {
				$error = curl_error($this->curl) . '(' . curl_errno($this->curl) . ')';
			}
			throw new Exception('Request to RapidShare API failed: ' . $error);
		}

		return $response;
	}

}

/**
 * This class handles streams for URLs in the format
 * "rapidshare://$user:$password@$server/$fileid?$filesize#$filename" for existing files or
 * "rapidshare://$user:$password@$server/$path?$parentid" for new files
 */
class RapidShareAPI_StreamWrapper {
	private $size;
	private $server;
	private $user;
	private $password;
	private $fileId;
	private $filename;
	private $llapiDownloadDisabled = false;

	private $readAccess;
	private $writeAccess;

	private $socket;
	private $readPosition;
	private $writePosition;

	private $curl;

	private $inBuffer = '';
	private $inPos = 0;
	private $outBuffer = '';
	private $outPos = 0;

	const API_ReadData = 1;
	const API_WriteData = 2;
	const API_OpenFileHandle = 3;
	const API_CreateNewFile = 5;
	const API_Error = 250;
	const API_Error_Length = 3;

	const TcpBufferSize = 524288;	// 512KB
	const MaxReadLength = 600000;
	const BufferSize = 524288;	// 512KB

	function stream_open($path, $mode, $options, &$opened_path) {
		$url = parse_url($path);
		$url['path'] = basename($url['path']);
		$this->user = $url['user'];
		$this->password = $url['pass'];
		$this->server = $url['host'];
		$this->readPosition = $this->writePosition = 0;
		$this->readAccess = $this->writeAccess = false;

		if (!$this->connect(false)) {
			return false;
		}

		if (!is_numeric($url['path'])) {
			if ($mode[0] === 'x') {
				trigger_error('File ' . $url['path'] . ' already exists', E_USER_WARNING);
				return false;
			}

			$this->filename = basename($url['path']);
			$this->fileId = $this->createNewFile($url['query'], $this->filename);
			if ($this->fileId === false) {
				return false;
			}
			$this->size = 0;
		}
		else {
			$this->fileId = $url['path'];
			$this->filename = $url['fragment'];
			$this->size = $url['query'];
		}

		if (!$this->openFileHandle()) {
			return false;
		}

		if ($mode[0] === 'r') {
			$this->readAccess = true;
		} elseif ($mode[0] === 'w' || $mode[0] === 'a' || $mode[0] === 'x' || $mode[0] === 'c') {
			$this->writeAccess = true;
		}
		if (strlen($mode) === 2 && $mode[1] === '+') {
			$this->readAccess = true;
			$this->writeAccess = true;
		}

		if ($mode[0] === 'a') {
			$this->readPosition = $this->writePosition = $this->size;
		}
		else if ($mode[0] === 'w') {
			$this->writeData('', 0); // truncate file to 0 bytes
		}
		return true;
	}

	function stream_read($count) {
		if ($this->size == 0) {
			return '';
		}

		$bufferSize = strlen($this->inBuffer);
		if ($this->inPos + $count > $bufferSize) {
			$data = '';
			if ($this->inPos < $bufferSize) {
				$data = substr($this->inBuffer, $this->inPos);

				$count -= $bufferSize - $this->inPos;
			}

			if ($this->readPosition + RapidShareAPI_StreamWrapper::BufferSize > $this->size) {
				if ($this->size - $this->readPosition > 0) {
					$this->inBuffer = $this->readData($this->size - $this->readPosition, $this->readPosition);
					$count = min($count, strlen($this->inBuffer));
				} else {
					$this->inPos = $bufferSize;
					return $data;
				}
			} else {
				$this->inBuffer = $this->readData(RapidShareAPI_StreamWrapper::BufferSize, $this->readPosition);
			}

			if ($this->inBuffer !== false) {
				$this->readPosition += strlen($this->inBuffer);
				$this->inPos = 0;
				$this->synchronizeWritePosition();

				$read = $this->stream_read($count);
				if ($read !== false) {
					$data .= $read;
					return $data;
				}
			}
		}
		else {
			$data = substr($this->inBuffer, $this->inPos, $count);
			$this->inPos += $count;
			$this->synchronizeWritePosition();
			return $data;
		}

		return false;
	}

	function stream_write($data) {
		$bufferSize = RapidShareAPI_StreamWrapper::BufferSize;
		$count = strlen($data);
		if ($this->outPos + $count > $bufferSize) {
			if ($this->outPos < $bufferSize) {
				$this->outBuffer .= substr($data, 0, $bufferSize - $this->outPos);
				$data = substr($data, $bufferSize - $this->outPos);
			}

			if ($this->writeData($this->outBuffer, $this->writePosition)) {
				$this->writePosition += strlen($this->outBuffer);
				$this->outBuffer = '';
				$this->outPos = 0;
				$this->synchronizeReadPosition($count);

				$write = $this->stream_write($data);
				if ($write > 0) {
					return $count;
				}
			}
		}
		else {
			$this->outBuffer .= $data;
			$this->outPos += $count;

			if ($this->size < $this->writePosition + $this->outPos) {
				$this->size = $this->writePosition + $this->outPos;
			}

			$this->synchronizeReadPosition($count);
			return $count;
		}
		return 0;
	}

	function stream_tell() {
		return max($this->readPosition - strlen($this->inBuffer) + $this->inPos, $this->writePosition + $this->outPos);
	}

	function stream_eof() {
		return $this->stream_tell() >= $this->size;
	}

	function stream_seek($offset, $whence) {
		switch ($whence) {
			case SEEK_SET:
				if ($offset < $this->size && $offset >= 0) {
					$this->stream_flush();
					$this->readPosition = $this->writePosition = $offset;
					return true;
				} else {
					return false;
				}
				break;
			case SEEK_CUR:
				if ($offset >= 0) {
					$this->stream_flush();
					$this->readPosition += $offset;
					$this->writePosition += $offset;
					return true;
				} else {
					return false;
				}
				break;
			case SEEK_END:
				if ($this->size + $offset >= 0) {
					$this->stream_flush();
					$this->readPosition = $this->writePosition = $this->size + $offset;
					return true;
				} else {
					return false;
				}
				break;
			default:
				return false;
		}
	}

	function stream_stat() {
		return false;   // Implementation just to allow stream_get_contents() to succeed
	}

	function stream_flush() {
		if ($this->outPos > 0) {
			return $this->writeData($this->outBuffer, $this->writePosition);
		}
		return true;
	}

	function stream_close() {
		$this->stream_flush();
		socket_close($this->socket);
		$this->socket = null;

		curl_close($this->curl);
		$this->curl = null;
	}

	private function socketWrite($string) {
		do {
			$sent = socket_write($this->socket, $string);
			if ($sent === false or $sent === 0 && socket_last_error($this->socket) > 0) {
				OCP\Util::writeLog('files_external', 'Could not write to Low Level API: ' . socket_strerror(socket_last_error($this->socket)), OCP\Util::ERROR);
				return false;
			}
		} while ($sent < strlen($string));
		return true;
	}

	private function socketRead($length) {
		if ($length < RapidShareAPI_StreamWrapper::API_Error_Length) {
			$read = socket_recv($this->socket, $buf, $length, MSG_WAITALL);
			$string = $buf;
			if ($read !== false && $string[0] === RapidShareAPI_StreamWrapper::API_Error) {
				$read = socket_recv($this->socket, $buf, RapidShareAPI_StreamWrapper::API_Error_Length - $read, MSG_WAITALL);
				$string .= $buf;
			}
		} else {
			$read = socket_recv($this->socket, $buf, RapidShareAPI_StreamWrapper::API_Error_Length, MSG_WAITALL);
			$string = $buf;
			if (   $read !== false && $string[0] !== RapidShareAPI_StreamWrapper::API_Error
				&& $length - RapidShareAPI_StreamWrapper::API_Error_Length > 0) {
				do {
					$read = socket_recv($this->socket, $buf, $length - strlen($string), MSG_WAITALL);
					$string .= $buf;
				} while ($read !== false && strlen($string) < $length);
			}
		}

		if ($read === false || socket_last_error($this->socket) > 0) {
			OCP\Util::writeLog('files_external', 'Could not read from Low Level API: ' . socket_strerror(socket_last_error($this->socket)), OCP\Util::ERROR);
			return false;
		}
		return $string;
	}

	private function initCurl() {
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'ownCloud/' . OC_Util::getVersionString());
	}

	private function getAuthString() {
		if ($this->curl === null) {
			$this->initCurl();
		}

		curl_setopt($this->curl, CURLOPT_URL, 'https://api.rapidshare.com/cgi-bin/rsapi.cgi?sub=requestlowlevelaccessauthstring&login=' .
			rawurlencode($this->user) . '&password=' . rawurlencode($this->password) . '&version=2.57785');
		$response = curl_exec($this->curl);

		if (curl_errno($this->curl) > 0 || strpos($response, 'ERROR: ') === 0) {
			if (strpos($response, 'ERROR: ') === 0) {
				$error = substr($response, strlen('ERROR: '));
			} else {
				$error = curl_error($this->curl) . '(' . curl_errno($this->curl) . ')';
			}
			OCP\Util::writeLog('files_external', 'Could not get Low Level Access token: ' . $error, OCP\Util::ERROR);
			return false;
		}

		return $response;
	}

	private function connect($openFileHandle=true) {
		if ($this->socket === null || socket_last_error($this->socket) > 0) {
			$authString = $this->getAuthString();
			if ($authString === false) {
				return false;
			}

			$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

			if ($this->socket === false) {
				OCP\Util::writeLog('files_external', 'Could not create network socket: ' . socket_strerror(socket_last_error($this->socket)), OCP\Util::ERROR);
				return false;
			}

			socket_set_option($this->socket, SOL_SOCKET, SO_SNDBUF, RapidShareAPI_StreamWrapper::TcpBufferSize);
			socket_set_option($this->socket, SOL_SOCKET, SO_RCVBUF, RapidShareAPI_StreamWrapper::TcpBufferSize);
			if (!socket_connect($this->socket, $this->server . '.rapidshare.com', 80)) {
				OCP\Util::writeLog('files_external', 'Could not connect to Low Level API: ' . socket_strerror(socket_last_error($this->socket)), OCP\Util::ERROR);
				return false;
			}

			$request = 'GET /cgi-bin/rsapi.cgi?sub=requestlowlevelaccess&auth=' . $authString . '&version=2.57785 HTTP/1.1' . "\r\n" .
				'Host: ' . $this->server . '.rapidshare.com' . "\r\n" .
				'Connection: keep-alive' . "\r\n" .
				'User-Agent: ownCloud/' . OC_Util::getVersionString() . "\r\n\r\n";
			if (!$this->socketWrite($request)) {
				return false;
			}

			if ($this->socketRead(4) !== "BIN\n") {
				return false;
			}

			if ($openFileHandle) {
				return $this->openFileHandle();
			}
		}

		return true;
	}

	private function createNewFile($folderId, $name) {
		$this->connect(false);

		$request = new RapidShareAPI_ByteString();
		$request->putByte(RapidShareAPI_StreamWrapper::API_CreateNewFile);
		$request->putShort($folderId);
		$request->putInt(0);
		$request->repeatByte(0, 16);
		$request->putByte(strlen($name));
		$request->putString($name);

		if ($this->socketWrite($request->toString())) {
			if (($responseString = $this->socketRead(1 + 4)) !== false) {
				$response = new RapidShareAPI_ByteString($responseString);
				if ($response->readByte() === RapidShareAPI_StreamWrapper::API_Error) {
					$response->skip();
					switch ($errorCode = $response->readByte()) {
						case 1:
							OCP\Util::writeLog('files_external', 'Upload on RapidShare server ' . $this->server . ' disallowed for file ' . $name, OCP\Util::ERROR);
							break;
						case 2:
							OCP\Util::writeLog('files_external', 'RapidShare API Parameter error (Contact MD5)', OCP\Util::ERROR);
							break;
						case 6:
							OCP\Util::writeLog('files_external', 'Maximum number of files in RapidShare account reached', OCP\Util::ERROR);
							break;
						case 7:
							OCP\Util::writeLog('files_external', 'Filesystem error on RapidShare server when creating file ' . $name, OCP\Util::ERROR);
							break;
						case 8:
							OCP\Util::writeLog('files_external', 'RapidShare server rejected invalid characters in filename ' . $name, OCP\Util::ERROR);
							break;
						default:
							OCP\Util::writeLog('files_external', 'Unknown RapidShare API error when creating file ' . $name . ': ' . $errorCode, OCP\Util::ERROR);
					}
				}
				else {
					return $response->readInt();
				}
			}
		}
		return false;
	}

	private function openFileHandle() {
		$this->connect(false);

		$fileId = $this->fileId;
		$request = new RapidShareAPI_ByteString();
		$request->putByte(RapidShareAPI_StreamWrapper::API_OpenFileHandle);
		$request->putInt($fileId);

		if ($this->socketWrite($request->toString())) {
			if (($responseString = $this->socketRead(3)) !== false) {
				$response = new RapidShareAPI_ByteString($responseString);
				if ($response->readByte() === RapidShareAPI_StreamWrapper::API_Error) {
					$response->skip();
					switch ($errorCode = $response->readByte()) {
						case 1:
							OCP\Util::writeLog('files_external', 'File #' . $fileId . ' not found on RapidShare server', OCP\Util::ERROR);
							break;
						case 2:
							OCP\Util::writeLog('files_external', 'File #' . $fileId . ' is marked as illegal', OCP\Util::ERROR);
							break;
						case 4:
							OCP\Util::writeLog('files_external', 'File #' . $fileId . ' requires a license to open', OCP\Util::ERROR);
							break;
						case 5:
							OCP\Util::writeLog('files_external', 'Physical file access failed on RapidShare server for file #' . $fileId, OCP\Util::ERROR);
							break;
						default:
							OCP\Util::writeLog('files_external', 'Unknown RapidShare API error when opening file #' . $fileId . ': ' . $errorCode, OCP\Util::ERROR);
					}
				}
				else {
					return true;
				}
			}
		}
		return false;
	}

	private function readData($length, $seek=false, $seekH=0) {
		if ($this->llapiDownloadDisabled) {
			return $this->readDataViaHTTP($length, $seek);
		}

		$fileId = $this->fileId;
		if ($seek === false) {
			$seek = 0;
			$seekH = 255;
		}

		if ($length > RapidShareAPI_StreamWrapper::MaxReadLength) {
			$data = '';
			while ($length > RapidShareAPI_StreamWrapper::MaxReadLength) {
				$part = $this->readData(RapidShareAPI_StreamWrapper::MaxReadLength, $this->readPosition);
				if ($part === false) {
					return false;
				}
				$data .= $part;
				$length -= RapidShareAPI_StreamWrapper::MaxReadLength;
			}

			$part = $this->readData($length, $this->readPosition);
			if ($part === false) {
				return false;
			}
			$data .= $part;
			return $data;
		}
		else {
			$this->connect();
			$request = new RapidShareAPI_ByteString();
			$request->putByte(RapidShareAPI_StreamWrapper::API_ReadData);
			$request->putByte($seekH);
			$request->putInt($seek);
			$request->putInt($length);

			if ($this->socketWrite($request->toString())) {
				if (($responseString = $this->socketRead(1 + 1 + 4 + 1 + 4)) !== false) {
					$response = new RapidShareAPI_ByteString($responseString);
					if ($response->readByte() === RapidShareAPI_StreamWrapper::API_Error) {
						$response->skip();
						switch ($errorCode = $response->readByte()) {
							case 1:
								$this->llapiDownloadDisabled = true;	// Read via LLAPI only allowed for RapidPro users
								return $this->readDataViaHTTP($length, $seek);
							case 2:
								OCP\Util::writeLog('files_external', $length . ' is an invalid length for RapidShare data', OCP\Util::ERROR);
								break;
							case 3:
								OCP\Util::writeLog('files_external', 'Invalid internal state: File handle for file #' . $fileId . ' is not open', OCP\Util::ERROR);
								break;
							case 4:
								OCP\Util::writeLog('files_external', '(' . $seekH . ',' . $seek . ') is an invalid position in file #' . $fileId, OCP\Util::ERROR);
								break;
							case 5:
								OCP\Util::writeLog('files_external', 'RapidShare server encountered an internal filesystem error on file #' . $fileId, OCP\Util::ERROR);
								break;
							case 6:
								OCP\Util::writeLog('files_external', $length . ' is greater than the remaining file #' . $fileId, OCP\Util::ERROR);
								break;
							default:
								OCP\Util::writeLog('files_external', 'Unknown RapidShare API error when opening file #' . $fileId . ': ' . $errorCode, OCP\Util::ERROR);
						}
					}
					else {
						$response->skip();
						$this->readPosition = $response->readInt();
						$isCompressed = $response->readByte();
						$readLength = $response->readInt();
						$data = $this->socketRead($readLength);
						if ($data !== false) {
							if ($isCompressed) {
								$data = gzdecode($data);
								if ($data === false) {
									OCP\Util::writeLog('files_external', 'Could not decompress gzip-transferred data in file #' . $fileId, OCP\Util::ERROR);
									return false;
								}
							}
							$this->readPosition += $length;
							return $data;
						}
					}
				}
			}
			return false;
		}
	}

	private function readDataViaHTTP($length, $seek=false) {
		if ($seek === false) {
			$seek = 0;
		}

		if ($this->curl === null) {
			$this->initCurl();
		}

		$end = min($seek + $length - 1, $this->size - 1);
		curl_setopt($this->curl, CURLOPT_URL, 'https://' . $this->server . '.rapidshare.com/cgi-bin/rsapi.cgi?sub=download&fileid=' .
			$this->fileId . '&filename=' . rawurlencode($this->filename) . '&position=' . $seek . '-' . $end .
			'&login=' . rawurlencode($this->user) . '&password=' . rawurlencode($this->password));
		$response = curl_exec($this->curl);

		if (curl_errno($this->curl) > 0 || strpos($response, 'ERROR: ') === 0 || strpos($response, 'DL:') === 0) {
			if (strpos($response, 'ERROR: ') === 0) {
				$error = substr($response, strlen('ERROR: '));
			} elseif (strpos($response, 'DL:') === 0) {
				$dlServer = preg_match('/^DL:([\w\d]+)\.rapidshare\.com/', $response);
				$error = 'connected to server ' . $this->server . ', should have been ' . $dlServer[1] . ' - this is a bug!';
			} else {
				$error = curl_error($this->curl) . ' (' . curl_errno($this->curl) . ')';
			}
			OCP\Util::writeLog('files_external', 'Could not download file #' . $this->fileId . ': ' . $error, OCP\Util::ERROR);
			return false;
		}

		return $response;
	}

	private function writeData($string, $seek=false, $seekH=0) {
		if ($seek === false) {
			$seek = 0;
			$seekH = 255;
		}

		$fileId = $this->fileId;
		$this->connect();
		$request = new RapidShareAPI_ByteString();
		$request->putByte(RapidShareAPI_StreamWrapper::API_WriteData);
		$request->putByte($seekH);
		$request->putInt($seek);
		$request->putInt(strlen($string));
		$request->putString($string);

		if ($this->socketWrite($request->toString())) {
			if (($responseString = $this->socketRead(1 + 4)) !== false) {
				$response = new RapidShareAPI_ByteString($responseString);
				if ($response->readByte() === RapidShareAPI_StreamWrapper::API_Error) {
					$response->skip();
					switch ($errorCode = $response->readByte()) {
						case 1:
							OCP\Util::writeLog('files_external', 'Invalid internal state: File handle for file #' . $fileId . ' is not open', OCP\Util::ERROR);
							break;
						case 2:
							OCP\Util::writeLog('files_external', 'File #' . $fileId . ' does not exist', OCP\Util::ERROR);
							break;
						case 3:
							OCP\Util::writeLog('files_external', 'File #' . $fileId . ' is a symlink', OCP\Util::ERROR);
							break;
						case 4:
							OCP\Util::writeLog('files_external', strlen($string) . ' is an invalid length for RapidShare data', OCP\Util::ERROR);
							break;
						case 5:
							OCP\Util::writeLog('files_external', '(' . $seekH . ',' . $seek . ') is an invalid position in file #' . $fileId, OCP\Util::ERROR);
							break;
						case 6:
							OCP\Util::writeLog('files_external', 'File #' . $fileId . ' must not be larger than 100.000.000.000 bytes', OCP\Util::ERROR);
							break;
						case 7:
							OCP\Util::writeLog('files_external', 'RapidShare server encountered an internal filesystem error on file #' . $fileId, OCP\Util::ERROR);
							break;
						default:
							OCP\Util::writeLog('files_external', 'Unknown RapidShare API error when opening file #' . $fileId . ': ' . $errorCode, OCP\Util::ERROR);
					}
				}
				else {
					if (strlen($string) === 0) {
						$this->size = $seek;	// truncate
					}

					return $response->readInt() == strlen($string);
				}
			}
		}
		return false;
	}

	private function synchronizeWritePosition() {
		if ($this->writeAccess) {
			$this->stream_flush();
			$this->writePosition = $this->readPosition;
		}
	}

	private function synchronizeReadPosition($writeCount) {
		if ($this->readAccess) {
			if ($this->inPos + $writeCount > strlen($this->inBuffer)) {
				$this->inBuffer = '';
				$this->inPos = 0;
				$this->readPosition = $this->writePosition;
			} else {
				$this->inPos += $writeCount;
			}
		}
	}

}

class RapidShareAPI_ByteString {

	private $string = '';
	private $position = 0;
	private $strlen = 0;

	public function __construct($string='') {
		$this->putString($string);
		$this->seek(0);
	}

	public function seek($position) {
		if ($position >= count($this->string)) {
			return false;
		}
		$this->position = $position;
		return true;
	}

	public function skip() {
		$this->position++;
	}

	public function eof() {
		//return $this->position >= count($this->string);
		return $this->position >= $this->strlen;
	}

	public function repeatByte($number, $times) {
		/*for ($i = 0; $i < $times; $i++) {
			$this->putByte($number);
		}*/
		$byte = chr(intval($number));
		$this->putString(str_pad($byte, $times, $byte));
	}

	public function putByte($number) {
		$this->putString(chr(intval($number)));
	}

	public function putShort($number) {
		$this->putByte(0xFF & intval($number));
		$this->putByte(0xFF & (intval($number) >> 8));
	}

	public function putInt($number) {
		$this->putShort(0xFFFF & floatval($number));
		$this->putShort(0xFFFF & (floatval($number) >> 16));
	}

	public function putString($string) {
		/*for ($i = 0; $i < strlen($string); $i++) {
			$this->putByte(ord($string[$i]));
		}*/
		$putlen = strlen($string);
		if ($this->position + $putlen <= $this->strlen) {
			$this->string = substr_replace($this->string, $string, $this->position, $putlen);
		} elseif ($this->position < $this->strlen) {
			$splitpos = $this->strlen - $this->position;
			$this->string = substr_replace($this->string, substr($string, 0, $splitpos), $this->position);
			$this->string .= substr($string, $splitpos);
			$this->strlen += $putlen - $splitpos;
		}
		else {
			$this->string .= $string;
			$this->strlen += $putlen;
		}
		$this->position += $putlen;
	}

	public function readByte() {
		if (!$this->eof()) {
			/*$byte = $this->string[$this->position];
			$this->position++;*/
			$byte = $this->readString(1);
			return ord($byte);
		}
		return false;
	}

	public function readShort() {
		$byte2 = $this->readByte();
		$byte1 = $this->readByte();

		if ($byte1 !== false && $byte2 !== false) {
			return ($byte1 << 8) + $byte2;
		}
		return false;
	}

	public function readInt() {
		$short2 = $this->readShort();
		$short1 = $this->readShort();

		if ($short1 !== false && $short2 !== false) {
			return sprintf('%u', $short1 << 16) + $short2;	// %u converts to unsigned int to avoid integer overflow
		}
		return false;
	}

	public function readString($length=null) {
		/*$substr = '';
		$endPos = $length === null ? count($this->string) : $this->position + $length;
		for (; $this->position < $endPos; $this->position++) {
			$substr .= $this->string[$this->position];
		}
		return $substr;*/

		if ($length !== null) {
			$string = substr($this->string, $this->position, $length);
			$this->position += $length;
		} else {
			$string = substr($this->string, $this->position);
			$this->position = $this->strlen;
		}

		return $string;
	}

	public function toString() {
		$curPos = $this->position;
		$this->position = 0;
		$string = $this->readString();
		$this->position = $curPos;

		return $string;
	}

}