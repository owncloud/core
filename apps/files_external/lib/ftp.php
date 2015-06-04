<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OC\Files\Storage;

use Exception;
use OC\Files\Filesystem;
use OC\Files\Stream\Close;
use OC\Files\Stream\Dir;
use OC\MemCache\ArrayCache;
use OCP\Constants;
use OCP\Files;
use OCP\Files\FileInfo;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use OCP\Util;

/**
 * Class FTP
 *
 * @package OC\Files\Storage
 */
class FTP extends Common {
	/** @var string */
	protected $password;
	/** @var string */
	protected $user;
	/** @var string */
	protected $host;
	/** @var bool */
	protected $secure;
	/** @var string */
	protected $baseUrl;
	/** @var string */
	protected $remotedir;
	/** @var string */
	protected $certPath;
	/** @var Resource cURL handle */
	protected $curl = null;
	/** @var array */
	protected $curlFeat = [];
	/** @var array */
	protected $curlInbandData = [];
	/** @var ArrayCache */
	private $statCache;
	/** @var int */
	private $statCacheTTL = 60;
	/** @var array */
	private static $tempFiles = [];
	/** @var bool */
	protected $debug = true;
	/** @var bool */
	protected $debugCurl = true;
	/** @var bool */
	protected $debugRaw = true;

	/**
	 * @param array $params
	 * @throws \Exception
	 */
	public function __construct($params) {
		$this->statCache = new ArrayCache();
		if (isset($params['host']) && isset($params['user']) && isset($params['password'])) {
			$host = $params['host'];
			//remove leading ftp[s], will be generated in createBaseUri()
			if (substr($host, 0, 7) == "ftps://") $host = substr($host, 7);
			else if (substr($host, 0, 6) == "ftp://") $host = substr($host, 6);
			$this->host = $host;
			$this->user = $params['user'];
			$this->password = $params['password'];
			if (isset($params['secure'])) {
				if (is_string($params['secure'])) {
					$this->secure = ($params['secure'] === 'true');
				} else {
					$this->secure = (bool)$params['secure'];
				}
			} else {
				$this->secure = false;
			}
			if ($this->secure === true) {
				$certPath = \OC_User::getHome(\OC_User::getUser()) . '/files_external/rootcerts.crt';
				if (file_exists($certPath)) {
					$this->certPath = $certPath;
				}
			}
			$this->baseUrl = $this->createBaseUri();
			
			$this->remotedir = isset($params['root']) ? $params['root'] : '/';
			if (!$this->remotedir || $this->remotedir[0] != '/') {
				$this->remotedir = '/' . $this->remotedir;
			}
			if (substr($this->remotedir, -1, 1) != '/') {
				$this->remotedir .= '/';
			}
		} else {
			throw new \Exception('Invalid ftp(s) storage configuration');
		}
	}
	
	//set the specific curl options, and reset the others to default
	public function curl_setopt($a) {
		$defaults = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_BINARYTRANSFER => true,
			CURLOPT_QUOTE => array(),
			CURLOPT_NOBODY => false,
			CURLOPT_CUSTOMREQUEST => "",
			CURLOPT_HEADERFUNCTION => array($this, 'curl_inband_cb_noop'),
			CURLOPT_RESUME_FROM => 0,
			CURLOPT_INFILE => NULL,
			CURLOPT_INFILESIZE => 0,
			CURLOPT_PUT => false,
			CURLOPT_RANGE => "",
			CURLOPT_VERBOSE => $this->debugCurl,
		);
		foreach ($a as $opt => $val)
			$defaults[$opt] = $val;
		return curl_setopt_array($this->curl, $defaults);
	}

	//callback for in-band communication
	//callback not anonymous because we need to transfer data out of this function using $this
	public function curl_inband_cb($res, $str) {
		if ($this->debugRaw) {
			Util::writeLog("files_external", "curl_inband_cb: state ".$this->curlInbandData['state'].", got '$str'", Util::DEBUG);
		} elseif ($this->debug) {
			Util::writeLog("files_external", "curl_inband_cb: state ".$this->curlInbandData['state'], Util::DEBUG);
		}

		$rc = substr($str, 0, 3);
		$st = substr($str, 3, 1);
		$d =& $this->curlInbandData; //save typing :D
		$cc = $d["cmds"][$d["current_cmd"]];
		if ($this->debug) {
			Util::writeLog("files_external", "will accept $cc[2], rc $rc st $st", Util::DEBUG);
		}
		//States:
		//0 - waiting for 215 SYST reply (SYST is automatically inserted by curl_inband_cb)
		//    if rc is not 215, continue
		//    if rc is 215, set data[state] to 1, data[current_cmd]=1
		//1 - waiting for expect-ec or expect-oc of the command in data[cmds][data[current_cmd]]
		//    if rc is not oc, set data[state]=FALSE, data[error] to line and halt processing
		//    if rc is oc and st is ' ', increment data[current_cmd] and add the line to data[data]
		//    if rc is oc and st is '-', set state=2
		//2 - waiting for "oc-"
		//    if not (rc is oc and st=' '), add line to data[data]
		//    if rc is oc and st is ' ', increment data[current_cmd] and set state=1
		switch ($this->curlInbandData["state"]) {
			case 0:
				if ($rc !== "215")
					break;
				if ($st != " ") //'215-' should normally not happen, but just in case... wait for the '215 '
					break;
				$d["state"]       = 1;
				$d["current_cmd"] = 1;
				break;
			case 1:
				if ($rc != $cc[2]) {
					$d["error"] = $str;
					$d["state"] = FALSE;
					break;
				} elseif ($st == " ") {
					$d["data"][] = $str;
					$d["current_cmd"]++;
				} elseif ($st == "-") {
					$d["state"] = 2;
				}
				break;
			case 2:
				if ($rc == $cc[2] && $st == " ") {
					$d["current_cmd"]++;
					$d["state"] = 1;
				} elseif ($rc == $cc[2] && $st == "-") {
					$d["data"][] = substr($str, 4);
				} else {
					$d["data"][] = $str;
				}
				break;
		}
		if ($d["current_cmd"] >= sizeof($d["cmds"]) || $d["state"] === FALSE) {
			curl_setopt($res, CURLOPT_HEADERFUNCTION, array($this, 'curl_inband_cb_noop') );
		}

		if ($this->debug) {
			Util::writeLog("files_external", "curl_inband_cb: leave, state now " . $this->curlInbandData['state'] . ", cc " . $this->curlInbandData['current_cmd'], Util::DEBUG);
		}
		return strlen($str);
	}
	public function curl_inband_cb_noop($res, $str) {
		//$this->curlInbandData["data"][] = substr($str, 3);;
		return strlen($str);
	}
	//run a in-band CURL command. On success, return 0; on failure, return -FUSE_EIO and the error in
	//$this->curlInbandData["error"]
	//If the FTP error code does not match $expect_errorcode, then it will be printed out
	//Else -FUSE_EINVAL is returned
	//TODO: If the connection gets reset, the callback has no information about the state of the connection
	//      and so will see the "220 Ok login now" message as start message for the parsing. So, we hope
	//      that cURL doesn't run SYST on connects in the future and use its unique 215 to establish a clean
	//      state.
	public function curl_inband_cmd($cmd, $expect_errorcode = "", $expect_okcode = "250") {
		if ($this->debug) {
			Util::writeLog("files_external", "curl_inband_cmd(cmd='".$this->compact_pa($cmd)."', expect_ec=$expect_errorcode, expect_ok=$expect_okcode) called", Util::DEBUG);
		}

		if (!is_array($cmd))
			$cmd = array(
				array(
					"SYST",
					"",
					"215"
				),
				array(
					$cmd,
					$expect_errorcode,
					$expect_okcode
				)
			);
		else
			array_unshift($cmd, array(
				"SYST",
				"",
				"215"
			));

		$ops = array();
		foreach ($cmd as $idx => $op) {
			if (!is_array($op)) {
				throw new BadParameterException("curl_inband_cmd: cmd $idx is not an array");
			} elseif (sizeof($op) != 3) {
				throw new BadParameterException("curl_inband_cmd: size of op $idx is not 3");
			}
			$ops[] = $op[0];
		}

		$this->curlInbandData = array(
			"state" => 0,
			"data" => array(),
			"cmds" => $cmd,
			"current_cmd" => 0,
			"error" => ""
		);

		$ret = $this->curl_setopt(array(
			CURLOPT_URL => $this->baseUrl,
			CURLOPT_QUOTE => $ops,
			CURLOPT_HEADERFUNCTION => array(
				$this,
				"curl_inband_cb"
			),
			CURLOPT_NOBODY => true
		));
		if ($ret === FALSE) {
			throw new CurlException("curl_inband_cmd('".$this->compact_pa($ops)."'): curl_setopt failed with '".curl_error($this->curl)."'");
		}

		$ret = curl_exec($this->curl);
		if ($ret === FALSE && $this->curlInbandData["state"] !== FALSE) {
			throw new IOError("curl_inband_cmd('".$this->compact_pa($ops)."'): unexpected error '".curl_error($this->curl)."'");
		} elseif ($this->curlInbandData["state"] === FALSE) {
			$ec = substr($this->curlInbandData["error"], 0, 3);
			$msg = substr($this->curlInbandData["error"], 4);
			$this->throwFTPException($ec, $msg);
		}

		return 0;
	}

	//run a out-of-band CURL command.
	public function curl_outband_cmd($url, $cmd) {
		if ($this->debug)
			Util::writeLog("files_external", "curl_outband_cmd(url='$url', cmd=$cmd) called", Util::DEBUG);

		$ret = $this->curl_setopt(array(
			CURLOPT_URL => $url,
			CURLOPT_CUSTOMREQUEST => $cmd,
		));
		if ($ret === FALSE) {
			throw new CurlException("curl_outband_cmd('$cmd'): curl_setopt failed with '".curl_error($this->curl)."'");
		}

		$ret = curl_exec($this->curl);
		if ($ret === FALSE) {
			throw new CurlException("curl_outband_cmd('$cmd'): curl_exec failed with '".curl_error($this->curl)."'");
		}

		return $ret;

	}
	public function curl_rename($from, $to) {
		if ($this->debug)
			Util::writeLog("files_external", "curl_rename(from='$from', to='$to') called", Util::DEBUG);

		if (substr($from, 0, 1) == "/")
			$from = substr($from, 1);
		$absfrom = $this->remotedir . $from;
		if (substr($to, 0, 1) == "/")
			$to = substr($to, 1);
		$absto = $this->remotedir . $to;

		$ret = $this->curl_inband_cmd(array(
			array(
				"RNFR $absfrom",
				"",
				"350"
			),
			array(
				"RNTO $absto",
				"",
				"250"
			)
		));

		return $ret;
	}

	//return an array with the features reported by the server
	public function curl_feat() {
		if ($this->debug)
			Util::writeLog("files_external", "curl_feat() called", Util::DEBUG);

		$this->curl_inband_cmd("FEAT", "", "211"); //FEAT returns 211 instead of 250

		$data = $this->curlInbandData["data"];
		$ret  = array();
		foreach ($data as $f) {
			$f    = explode(" ", strtolower(trim($f)), 2);
			$feat = trim($f[0]);
			if (isset($f[1])) {
				$opt_a = explode(";", trim($f[1]));
				$opt   = array();
				foreach ($opt_a as $k => $v) {
					if (trim($v) == "")
						continue;
					if (substr($v, -1, 1) == "*") //currently activated
						$opt[substr($v, 0, -1)] = true;
					else
						$opt[$v] = false;
				}
			} else
				$opt = "";
			$ret[$feat] = $opt;
		}
		return $ret;
	}

	//parse a line returned by MLS(D/T)
	public function curl_mls_parse($line) {
		$d  = explode(";", $line);
		//the last bit is the file name, it is separated from the facts by a space
		$fn = rtrim(substr(array_pop($d), 1), "\r\n");

		$ret = array();
		foreach ($d as $v) {
			list($k, $v) = explode("=", $v);
			$ret[trim(strtolower($k))] = trim(strtolower($v));
		}

		//split up perms, if supplied
		if (isset($ret["perm"]))
			$ret["perm"] = array_flip(str_split($ret["perm"]));
		else
			$ret["perm"] = array();

		//convert timestamps to unix timestamps
		if (isset($ret["modify"]))
			//Timestamp is UTC and may contain .sss to give sub-second precision, filter this out
			$ret["modify"] = \DateTime::createFromFormat("YmdHis", substr($ret["modify"], 0, 14), new \DateTimeZone("UTC"))->getTimestamp();
		else
			$ret["modify"] = 0;
		if (isset($ret["create"]))
			$ret["create"] = \DateTime::createFromFormat("YmdHis", substr($ret["create"], 0, 14), new \DateTimeZone("UTC"))->getTimestamp();
		else
			$ret["create"] = $ret["modify"];

		$ret["filename"] = $fn;

		return $ret;
	}


	//MLST: get information about a specific file or directory (stat() equivalent)
	// See also: RFC 3659 @ http://www.ietf.org/rfc/rfc3659.txt
	public function curl_mlst($path, $allow_cache = false) {
		if (substr($path, 0, 1) == "/")
			$path = substr($path, 1);
		$abspath = $this->remotedir . $path;

		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL MLST from base '$this->baseUrl' / path '$path' / abspath '$abspath'", Util::DEBUG);

		//see if we have dirty data in the fscache, which overrides metadata cache and "real" ftp info
		/*
		if ($this->use_fs_cache && isset($this->fs_cache["/$path"]) && $this->fs_cache["/$path"]["dirty"] === true) {
			if ($this->debug)
				Util::writeLog("files_external", "MLST /$path: file marked as dirty in fscache, serving modified results", Util::DEBUG);
			return $this->fs_cache["/$path"]["stat"];
		}
		*/

		//see if we have valid data in the metadata cache
		/*
		if ($allow_cache == true && $this->cache_maxage > 0 && isset($this->cache[$abspath]) && isset($this->cache[$abspath]["mlst"])) {
			if (time() - $this->cache[$abspath]["mlst"]["time"] > $this->cache_maxage) {
				unset($this->cache[$abspath]["mlst"]);
				if ($this->debug)
					Util::writeLog("files_external", "Invalidated MLST cache for '$abspath' due to timeout", Util::DEBUG);
			} else {
				if ($this->debug)
					Util::writeLog("files_external", "Serving MLST for '$abspath' out of cache", Util::DEBUG);
				return $this->cache[$abspath]["mlst"]["data"];
			}
		}
		*/

		//Enable all MLST fields
		$estr = "";
		foreach ($this->curlFeat["mlst"] as $opt => $active)
			$estr .= $opt . ";";
		if ($this->debug)
			Util::writeLog("files_external", "Enabling MLST options '$estr'", Util::DEBUG);
		$this->curl_inband_cmd("OPTS MLST $estr", "", 200);

		$this->curl_inband_cmd("MLST $abspath", "550");

		if ($this->debugRaw)
			Util::writeLog("files_external", "Raw data: ".$this->compact_pa($this->curlInbandData), Util::DEBUG);
		$ret = $this->curl_mls_parse($this->curlInbandData["data"][0]);


		/*
		if (!isset($this->cache[$abspath]))
			$this->cache[$abspath] = array();
		$this->cache[$abspath]["mlst"] = array(
			"time" => time(),
			"data" => $ret
		);
		*/

		if ($this->debug) {
			//Util::writeLog("files_external", "MLST result: '" . $this->compact_pa($ret) . "'", Util::DEBUG);
			Util::writeLog("files_external", "MLST result: '" . json_encode($ret) . "'", Util::DEBUG);
		}
		return $ret;
	}

	//MLSD: get information about the files in a directory
	public function curl_mlsd($path, $allow_cache = false) {
		//MLSD must be a path!
		if (substr($path, -1, 1) != "/") {
			throw new Files\InvalidPathException($path);
		}

		if (substr($path, 0, 1) == "/") {
			$path = substr($path, 1);
		}

		$remotepath = $this->encodePath($this->remotedir . $path);
		$abspath    = $this->baseUrl . $remotepath;

		if ($this->debug) {
			Util::writeLog("files_external", "Requesting cURL MLSD from base '$this->baseUrl' / path '$path' / abspath '$abspath'", Util::DEBUG);
		}

		/*
		if ($allow_cache == true && $this->cache_maxage > 0 && isset($this->cache[$remotepath]) && isset($this->cache[$remotepath]["mlsd"])) {
			if (time() - $this->cache[$remotepath]["mlsd"]["time"] > $this->cache_maxage) {
				unset($this->cache[$remotepath]["mlsd"]);
				if ($this->debug)
					Util::writeLog("files_external", "Invalidated MLSD cache for '$remotepath'", Util::DEBUG);
			} else {
				if ($this->debug)
					Util::writeLog("files_external", "Serving MLSD for '$remotepath' out of cache", Util::DEBUG);
				return $this->cache[$remotepath]["mlsd"]["data"];
			}
		}
		*/

		//Enable all MLST fields
		$estr = "";
		foreach ($this->curlFeat["mlst"] as $opt => $active) {
			$estr .= $opt . ";";
		}
		if ($this->debug) {
			Util::writeLog("files_external", "Enabling MLST options '$estr'", Util::DEBUG);
		}
		$this->curl_inband_cmd("OPTS MLST $estr", "", 200);

		$ret = $this->curl_outband_cmd($abspath, "MLSD");

		//normalize linebreaks
		$ret  = str_replace("\r", "\n", $ret);
		$data = explode("\n", $ret);
		$ret  = array();
		foreach ($data as $v) {
			//$v = trim($v);
			if (trim($v) == "")
				continue;

			if ($this->debugRaw)
				Util::writeLog("files_external", "Raw data: '$v'", Util::DEBUG);

			$entry = $this->curl_mls_parse($v);

			$ret[$entry["filename"]] = $entry;
		}

		/*
		if (!isset($this->cache[$remotepath]))
			$this->cache[$remotepath] = array();
		$this->cache[$remotepath]["mlsd"] = array(
			"time" => time(),
			"data" => $ret
		);
		*/

		if ($this->debug)
			Util::writeLog("files_external", "MLSD result: '".$this->compact_pa($ret)."'", Util::DEBUG);
		return $ret;
	}

	//remove all cached data for a file (except contents!)
	public function cache_invalidate($path) {
		if (substr($path, 0, 1) == "/")
			$path = substr($path, 1);

		$remotepath = $this->remotedir . $path;
		if (isset($this->cache[$remotepath]))
			unset($this->cache[$remotepath]);

		if ($this->debug)
			Util::writeLog("files_external", "Forcibly invalidated all caches for '$remotepath'", Util::DEBUG);
	}

	//get $len bytes of data from a file starting at $offset
	public function curl_get($path, $offset = 0, $len = 0) {
		if (substr($path, 0, 1) == "/")
			$path = substr($path, 1);

		$abspath = $this->baseUrl . $this->encodePath($path);

		$begin = $offset;
		$end   = $begin + $len - 1; //ranges are inclusive

		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL file from base '$this->baseUrl' / path '$path' / abspath '$abspath' / range $begin-$end", Util::DEBUG);

		$ret = $this->curl_setopt(array(
			CURLOPT_URL => $abspath,
			CURLOPT_RANGE => "$begin-$end"
		));
		if ($ret === FALSE) {
			throw new CurlException("curl_get('$path'): curl_setopt failed with '".curl_error($this->curl)."'");
		}

		$ret = curl_exec($this->curl);
		if ($ret === FALSE) {
			throw new CurlException("curl_get('$path'): curl_exec failed with '".curl_error($this->curl)."'");
		}

		if (strlen($ret) != $len) {
			Util::writeLog("files_external", "curl_get warning: for '$abspath': return length ".strlen($ret)." differs from specified length $len", Util::DEBUG);
		}

		return $ret;
	}

	//write $buf at $offset to $path
	public function curl_put($path, $offset = 0, $buf = "") {
		if (substr($path, 0, 1) == "/")
			$path = substr($path, 1);

		$abspath = $this->baseUrl . $this->encodePath($path);

		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL PUT to base '$this->baseUrl' / path '$path' / abspath '$abspath' for ".strlen($buf)." bytes at offset $offset", Util::DEBUG);

		//write buffer to tempfile
		$tmp = tmpfile();
		if ($tmp === false) {
			throw new IOError('tmpfile failed');
		}
		fwrite($tmp, $buf);
		fseek($tmp, 0);

		$ret = $this->curl_setopt(array(
			CURLOPT_URL => $abspath,
			CURLOPT_RESUME_FROM => $offset,
			CURLOPT_INFILE => $tmp,
			CURLOPT_INFILESIZE => $offset + strlen($buf),
			CURLOPT_PUT => true
		));

		if ($ret === FALSE) {
			throw new CurlException("files_external", "curl_get('$path'): curl_setopt failed with '".curl_error($this->curl)."'");
		}

		$ret = curl_exec($this->curl);
		if ($ret === FALSE) {
			throw new CurlException("curl_get('$path'): curl_exec failed with '".curl_error($this->curl)."'");
		}

		//this deletes the tmpfile, too
		fclose($tmp);

		return 0;
	}


	//delete a file
	public function curl_dele($path) {
		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL DELE to base '$this->baseUrl' / path '$path'", Util::DEBUG);

		if (substr($path, 0, 1) == "/") {
			$path = substr($path, 1);
		}
		$abspath = $this->remotedir . $path;

		return $this->curl_inband_cmd("DELE $abspath");
	}

	//create a directory
	public function curl_mkdir($path) {
		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL MKDIR to base '$this->baseUrl' / path '$path'", Util::DEBUG);

		if (substr($path, 0, 1) == "/") {
			$path = substr($path, 1);
		}
		$abspath = $this->remotedir . $path;

		// TODO? always cd to parent dir to prevent 550 permission denied
		return $this->curl_inband_cmd("MKD $abspath", "", "257");
	}

	//delete a directory
	public function curl_rmdir($path) {
		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL RMDIR to base '$this->baseUrl' / path '$path'", Util::DEBUG);

		if (substr($path, 0, 1) == "/") {
			$path = substr($path, 1);
		}
		$abspath = $this->remotedir . $path;

		return $this->curl_inband_cmd("RMD $abspath");
	}
	
	private function init() {
		if ($this->curl != null) {
			if ($this->debug) {
				Util::writeLog("files_external", "curl already initialized", Util::DEBUG);
			}
			return;
		}
		if ($this->debug) {
			Util::writeLog("files_external", "initializing curl", Util::DEBUG);
		}

		$this->curl = curl_init();
		if ($this->curl === FALSE) {
			throw new CurlException("files_external", "initialization failed '".curl_error($this->curl)."'");
		}

		if ($this->secure === true && $this->certPath) {
			curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, true);
			//curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
			//curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($this->curl, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
		}
		$this->curlFeat = $this->curl_feat();
		//Check if all required feats are supported
		if (!isset($this->curlFeat["mlst"])) { //TODO: Actually fall back to LIST :D
			throw new \Exception("Server does not support MLST!");
		} else {
			if ($this->debug)
				Util::writeLog("files_external", "Server supports MLS(D/T)", Util::DEBUG);
		}

		//curl_setopt($this->curl, CURLOPT_URL, $this->createBaseUri());

		/*
		$userpass = $this->user;
		if ($this->password) {
			$userpass .= ':' . $this->password;
		}
		curl_setopt($this->curl, CURLOPT_USERPWD, $userpass);
		*/

	}

	public function freeCurlHandle () {
		if ($this->curl) {
			curl_close($this->curl);
			$this->curl = null;
		}
	}

	/**
	 * Clear the stat cache
	 */
	public function clearStatCache() {
		$this->statCache->clear();
	}

	/** {@inheritdoc} */
	public function getId() {
		$proto = 'ftp';
		if ($this->secure === true) {
			$proto .= 's';
		}
		return $proto.'::' . $this->user . '@' . $this->host . '/' . $this->remotedir;
	}

	/** {@inheritdoc} */
	public function createBaseUri() {
		$baseUri = 'ftp';
		if ($this->secure) {
			$baseUri .= 's';
		}
		$baseUri .= '://' . $this->user.':'.$this->password.'@'.$this->host;
		return $baseUri;
	}

	/**
	 * @param string $path
	 * @return string
	 */
	public function constructUrl($path) {
		$url = $this->createBaseUri() . $this->constructPath($path);
		return $url;
	}
	/**
	 * @param string $path
	 * @return string
	 */
	public function constructPath($path) {
		return $this->remotedir . $this->cleanPath($path);
	}

	/** {@inheritdoc} */
	public function mkdir($path) {
		$this->init();
		try {
			$this->curl_mkdir($path);
			$this->statCache->set($path, true);
		} catch (Files\NotFoundException $e) {
			return false;
		} catch (IOError $e) {
			Util::logException("files_external", $e, Util::ERROR);
			return false;
		}
		//$this->cache_invalidate(dirname($path));

		return true;
	}

	/** {@inheritdoc} */
	public function rmdir($path) {
		return $this->rrmdir($path);
	}
	/** recirsively delete a folder */
	public function rrmdir($path) {
		if (!$this->is_dir($path) || !$this->isDeletable($path)) {
			return false;
		}

		$dh = $this->opendir($path);
		while ($file = readdir($dh)) {
			if ($file === '.' || $file === '..') {
				continue;
			}

			if ($this->is_dir($path . '/' . $file)) {
				$this->rrmdir($path . '/' . $file);
			} else {
				$this->unlink($path . '/' . $file);
			}
		}

		$this->init();
		try {
			$this->curl_rmdir($path);

			$this->statCache->clear($path . '/');
			$this->statCache->remove($path);
			return true;
		} catch (Files\NotFoundException $e) {
			return false;
		} catch (IOError $e) {
			Util::logException("files_external", $e, Util::ERROR);
			return false;
		}
	}

	/** {@inheritdoc} */
	public function opendir($path) {
		$this->init();
		try {
			if (substr($path, -1, 1) != "/") {
				$path .= '/';
			}
			$files = $this->curl_mlsd($path, true);
			$id = md5('ftp' . $this->remotedir . $path);
			$content = [];
			foreach ($files as $file => $mls) {
				if ($mls['type'] === 'pdir' || $mls['type'] === 'cdir') {
					continue;
				}
				$stat = $this->mls2stat($mls);
				if (!$this->statCache->hasKey($path.$file)) {
					$this->statCache->set($path.$file, $stat);
				}
				//$file = basename($file);
				$content[] = trim($file, '/');
			}
			if ($this->debug) {
				Util::writeLog("files_external", "opendir for '".$path."' backed by  ".json_encode($content), Util::DEBUG);
			}
			Dir::register($id, $content);
			return opendir('fakedir://' . $id);
		} catch (Files\NotFoundException $e) {
			return false;
		} catch (IOError $e) {
			Util::logException("files_external", $e, Util::ERROR);
			return false;
		}
		return false;
	}

	/** {@inheritdoc} */
	public function filetype($path) {
		$stat = $this->stat($path);
		if (!is_array($stat)) {
			if ($this->debug) {
				Util::writeLog("files_external", "filetype for '".$path."' returning 'false'", Util::DEBUG);
			}
			return false;
		}
		if (isset($stat['mimetype']) && $stat['mimetype'] === 'httpd/unix-directory') {
			if ($this->debug) {
				Util::writeLog("files_external", "filetype for '".$path."' returning 'dir'", Util::DEBUG);
			}
			return 'dir';
		}
		if ($this->debug) {
			Util::writeLog("files_external", "filetype for '".$path."' returning 'file', stat:".json_encode($stat), Util::DEBUG);
		}
		return 'file';
	}

	/** {@inheritdoc} */
	public function file_exists($path) {
		$path = $this->cleanPath($path);
		$cachedState = $this->statCache->get($path);
		if ($cachedState === false) {
			// we know the file doesn't exist
			return false;
		} else if (!is_null($cachedState)) {
			return true;
		}
		// need to get from server
		return is_array($this->stat($path));
	}

	/** {@inheritdoc} */
	public function unlink($path) {
		if ($this->is_dir($path)) {
			return $this->rrmdir($path);
		}
		try {
			$this->curl_dele($path);
			$this->statCache->clear($path . '/');
			$this->statCache->remove($path);
		} catch (Files\NotFoundException $e) {
			return false;
		} catch (IOError $e) {
			Util::logException("files_external", $e, Util::ERROR);
			return false;
		}

		return true;
	}

	/** {@inheritdoc} */
	public function fopen($path, $mode) {
		$this->init();
		//$path = $this->cleanPath($path);

		$remotepath = $this->encodePath($this->remotedir . $path);
		$abspath    = $this->baseUrl . $remotepath;

		switch ($mode) {
			case 'r':
			case 'rb':
				if (!$this->file_exists($path)) {
					return false;
				}
				//$curl = curl_init();
				$fp = fopen('php://temp', 'r+');
				/*
				curl_setopt($curl, CURLOPT_URL, $abspath);
				curl_setopt($curl, CURLOPT_FILE, $fp);
				if ($this->secure === true) {
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
					if ($this->certPath) {
						curl_setopt($curl, CURLOPT_CAINFO, $this->certPath);
					}
				}
				*/


				$ret = $this->curl_setopt(array(
					CURLOPT_URL => $abspath,
					CURLOPT_FILE => $fp
				));
				if ($ret === FALSE) {
					throw new CurlException("curl_get('$path'): curl_setopt failed with '".curl_error($this->curl)."'");
				}

				$ret = curl_exec($this->curl);
				if ($ret === FALSE) {
					throw new CurlException("curl_get('$path'): curl_exec failed with '".curl_error($this->curl)."'");
				}
				$ret = $this->curl_setopt(array(
					CURLOPT_FILE => fopen('php://stdout','w'),
				));
				//curl_close($curl);
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
				if (strrpos($path, '.') !== false) {
					$ext = substr($path, strrpos($path, '.'));
				} else {
					$ext = '';
				}
				if ($this->file_exists($path)) {
					if (!$this->isUpdatable($path)) {
						return false;
					}
					$tmpFile = $this->getCachedFile($path);
				} else {
					if (!$this->isCreatable(dirname($path))) {
						return false;
					}
					$tmpFile = Files::tmpFile($ext);
				}
				Close::registerCallback($tmpFile, array($this, 'writeBack'));
				self::$tempFiles[$tmpFile] = $path;
				return fopen('close://' . $tmpFile, $mode);
		}
	}

	/**
	 * @param string $tmpFile
	 */
	public function writeBack($tmpFile) {
		if (isset(self::$tempFiles[$tmpFile])) {
			$this->uploadFile($tmpFile, self::$tempFiles[$tmpFile]);
			unlink($tmpFile);
		}
	}

	/** {@inheritdoc} */
	public function free_space($path) {
		return FileInfo::SPACE_UNKNOWN;
	}

	/** {@inheritdoc} */
	public function touch($path, $mtime = null) {
		//FIXME
		$this->init();
		if (is_null($mtime)) {
			$mtime = time();
		}
		$path = $this->cleanPath($path);

		// if file exists, update the mtime, else create a new empty file
		if ($this->file_exists($path)) {
			try {
				$this->statCache->remove($path);
				$this->client->proppatch($this->encodePath($path), array('{DAV:}lastmodified' => $mtime));
			} catch (ClientHttpException $e) {
				if ($e->getHttpStatus() === 501) {
					return false;
				}
				$this->convertException($e);
				return false;
			} catch (\Exception $e) {
				$this->convertException($e);
				return false;
			}
		} else {
			$this->file_put_contents($path, '');
		}
		return true;
	}

	/**
	 * @param string $path
	 * @param string $data
	 * @return int
	 */
	public function file_put_contents($path, $data) {
		$path = $this->cleanPath($path);
		$result = parent::file_put_contents($path, $data);
		$this->statCache->remove($path);
		return $result;
	}

	/**
	 * @param string $path
	 * @param string $target
	 */
	protected function uploadFile($path, $target) {
		$this->init();
		// invalidate
		$target = $this->cleanPath($target);
		$this->statCache->remove($target);
		$source = fopen($path, 'r');

		if (substr($target, 0, 1) == "/")
			$target = substr($target, 1);

		$remotepath = $this->encodePath($this->remotedir . $target);
		$abspath    = $this->baseUrl . $remotepath;

		if ($this->debug)
			Util::writeLog("files_external", "Requesting cURL PUT to base '$this->baseUrl' / target '$target' / abspath '$abspath'", Util::DEBUG);

		$ret = $this->curl_setopt(array(
			CURLOPT_URL => $abspath,
			CURLOPT_INFILE => $source,
			//CURLOPT_INFILESIZE => filesize($source),
			CURLOPT_PUT => true
		));

		if ($ret === FALSE) {
			throw new CurlException("files_external", "curl_put('$path', '$target'): curl_setopt failed with '".curl_error($this->curl)."'");
		}

		$ret = curl_exec($this->curl);
		if ($ret === FALSE) {
			throw new CurlException("curl_put('$path', '$target'): curl_exec failed with '".curl_error($this->curl)."'");
		}

		fclose($source);
		$this->removeCachedFile($target);
	}

	/** {@inheritdoc} */
	public function rename($path1, $path2) {
		$this->init();
		$type = $this->filetype($path2);
		if ($type === 'dir') {
			$this->rrmdir($path2);
		} elseif ($type === 'file') {
			$this->curl_dele($path2);
		}
		try {
			$this->curl_rename($path1, $path2);
			$this->statCache->clear($path1 . '/');
			$this->statCache->clear($path2 . '/');
			$this->statCache->set($path1, false);
			$this->statCache->set($path2, true);
			$this->removeCachedFile($path1);
			$this->removeCachedFile($path2);
			return true;
		} catch (Files\NotFoundException $e) {
			return false;
		} catch (IOError $e) {
			Util::logException("files_external", $e, Util::ERROR);
			return false;
		}
		return false;
	}

	/** {@inheritdoc} */
	//public function copy($path1, $path2) {
	// FIXME implement a curl_copy
	//}

	public function mls2stat(array $mls) {
		$stat = array(
			'mtime' => (int)$mls['modify'],
		);
		if (isset($mls['size'])) {
			$stat['size'] = (int)$mls['size'];
		} else {
			$stat['size'] = 0;
		}
		if (substr($mls['type'], -3) === 'dir') { // match dir, pdir and cdir
			$stat['mimetype'] = 'httpd/unix-directory';
			$stat['size'] = 0;
		}
		if (isset($mls['unix.owner'])) {
			$stat['uid'] = $mls['unix.owner'];
		}
		if (isset($mls['unix.group'])) {
			$stat['gid'] = $mls['unix.group'];
		}
		if (isset($mls['unix.mode'])) {
			$stat['mode'] = $mls['unix.mode'];
		}
		return $stat;
	}
	/** {@inheritdoc} */
	public function stat($path) {
		$this->init();
		$cachedState = $this->statCache->get($path);
		if ($cachedState === false) {
			// we know the file doesn't exist
			return false;
		} else if (!is_null($cachedState)) {
			return $cachedState;
		}
		try {
			$mlst = $this->curl_mlst($path);
			$stat = $this->mls2stat($mlst);
			$this->statCache->set($path, $stat);

			if ($this->debug) {
				Util::writeLog("files_external", "stat for '".$path."' returning ".json_encode($stat), Util::DEBUG);
			}
			return $stat;
		} catch (Files\NotFoundException $e) {
			return false;
		} catch (IOError $e) {
			Util::logException("files_external", $e, Util::ERROR);
			return false;
		}
		return false;
	}

	/**
	 * @param string $path
	 * @return string
	 */
	public function cleanPath($path) {
		if ($path === '') {
			return $path;
		}
		$path = Filesystem::normalizePath($path);
		// remove leading slash
		return ltrim($path, '/');
	}

	/**
	 * URL encodes the given path but keeps the slashes
	 *
	 * @param string $path to encode
	 * @return string encoded path
	 */
	private function encodePath($path) {
		// slashes need to stay
		return str_replace('%2F', '/', rawurlencode($path));
	}

	/**
	 * check if curl is installed
	 */
	public static function checkDependencies() {
		return true;
	}

	/** {@inheritdoc} */
	public function isUpdatable($path) {
		return (bool)($this->getPermissions($path) & Constants::PERMISSION_UPDATE);
	}

	/** {@inheritdoc} */
	public function isCreatable($path) {
		return (bool)($this->getPermissions($path) & Constants::PERMISSION_CREATE);
	}

	/** {@inheritdoc} */
	public function isSharable($path) {
		return (bool)($this->getPermissions($path) & Constants::PERMISSION_SHARE);
	}

	/** {@inheritdoc} */
	public function isDeletable($path) {
		return (bool)($this->getPermissions($path) & Constants::PERMISSION_DELETE);
	}

	/** {@inheritdoc} */
	public function getPermissions($path) {
		$this->init();
		$mlst = $this->stat($path);

		return Constants::PERMISSION_ALL;
	}

	/**
	 * @param string $permissionsString
	 * @return int
	 */
	protected function parsePermissions($permissionsString) {
		$permissions = Constants::PERMISSION_READ;
		if (strpos($permissionsString, 'R') !== false) {
			$permissions |= Constants::PERMISSION_SHARE;
		}
		if (strpos($permissionsString, 'D') !== false) {
			$permissions |= Constants::PERMISSION_DELETE;
		}
		if (strpos($permissionsString, 'W') !== false) {
			$permissions |= Constants::PERMISSION_UPDATE;
		}
		if (strpos($permissionsString, 'CK') !== false) {
			$permissions |= Constants::PERMISSION_CREATE;
			$permissions |= Constants::PERMISSION_UPDATE;
		}
		return $permissions;
	}

	private function convertToException($errno, array $curlInfo) {
		if (function_exists('curl_strerror')) {
			$error_message = curl_strerror($errno);
		} else {
			//fallback for php < 5.5
			$error_codes = array(
				[1] => 'CURLE_UNSUPPORTED_PROTOCOL',
				[2] => 'CURLE_FAILED_INIT',
				[3] => 'CURLE_URL_MALFORMAT',
				[4] => 'CURLE_URL_MALFORMAT_USER',
				[5] => 'CURLE_COULDNT_RESOLVE_PROXY',
				[6] => 'CURLE_COULDNT_RESOLVE_HOST',
				[7] => 'CURLE_COULDNT_CONNECT',
				[8] => 'CURLE_FTP_WEIRD_SERVER_REPLY',
				[9] => 'CURLE_REMOTE_ACCESS_DENIED',
				[11] => 'CURLE_FTP_WEIRD_PASS_REPLY',
				[13] => 'CURLE_FTP_WEIRD_PASV_REPLY',
				[14] => 'CURLE_FTP_WEIRD_227_FORMAT',
				[15] => 'CURLE_FTP_CANT_GET_HOST',
				[17] => 'CURLE_FTP_COULDNT_SET_TYPE',
				[18] => 'CURLE_PARTIAL_FILE',
				[19] => 'CURLE_FTP_COULDNT_RETR_FILE',
				[21] => 'CURLE_QUOTE_ERROR',
				[22] => 'CURLE_HTTP_RETURNED_ERROR',
				[23] => 'CURLE_WRITE_ERROR',
				[25] => 'CURLE_UPLOAD_FAILED',
				[26] => 'CURLE_READ_ERROR',
				[27] => 'CURLE_OUT_OF_MEMORY',
				[28] => 'CURLE_OPERATION_TIMEDOUT',
				[30] => 'CURLE_FTP_PORT_FAILED',
				[31] => 'CURLE_FTP_COULDNT_USE_REST',
				[33] => 'CURLE_RANGE_ERROR',
				[34] => 'CURLE_HTTP_POST_ERROR',
				[35] => 'CURLE_SSL_CONNECT_ERROR',
				[36] => 'CURLE_BAD_DOWNLOAD_RESUME',
				[37] => 'CURLE_FILE_COULDNT_READ_FILE',
				[38] => 'CURLE_LDAP_CANNOT_BIND',
				[39] => 'CURLE_LDAP_SEARCH_FAILED',
				[41] => 'CURLE_FUNCTION_NOT_FOUND',
				[42] => 'CURLE_ABORTED_BY_CALLBACK',
				[43] => 'CURLE_BAD_FUNCTION_ARGUMENT',
				[45] => 'CURLE_INTERFACE_FAILED',
				[47] => 'CURLE_TOO_MANY_REDIRECTS',
				[48] => 'CURLE_UNKNOWN_TELNET_OPTION',
				[49] => 'CURLE_TELNET_OPTION_SYNTAX',
				[51] => 'CURLE_PEER_FAILED_VERIFICATION',
				[52] => 'CURLE_GOT_NOTHING',
				[53] => 'CURLE_SSL_ENGINE_NOTFOUND',
				[54] => 'CURLE_SSL_ENGINE_SETFAILED',
				[55] => 'CURLE_SEND_ERROR',
				[56] => 'CURLE_RECV_ERROR',
				[58] => 'CURLE_SSL_CERTPROBLEM',
				[59] => 'CURLE_SSL_CIPHER',
				[60] => 'CURLE_SSL_CACERT',
				[61] => 'CURLE_BAD_CONTENT_ENCODING',
				[62] => 'CURLE_LDAP_INVALID_URL',
				[63] => 'CURLE_FILESIZE_EXCEEDED',
				[64] => 'CURLE_USE_SSL_FAILED',
				[65] => 'CURLE_SEND_FAIL_REWIND',
				[66] => 'CURLE_SSL_ENGINE_INITFAILED',
				[67] => 'CURLE_LOGIN_DENIED',
				[68] => 'CURLE_TFTP_NOTFOUND',
				[69] => 'CURLE_TFTP_PERM',
				[70] => 'CURLE_REMOTE_DISK_FULL',
				[71] => 'CURLE_TFTP_ILLEGAL',
				[72] => 'CURLE_TFTP_UNKNOWNID',
				[73] => 'CURLE_REMOTE_FILE_EXISTS',
				[74] => 'CURLE_TFTP_NOSUCHUSER',
				[75] => 'CURLE_CONV_FAILED',
				[76] => 'CURLE_CONV_REQD',
				[77] => 'CURLE_SSL_CACERT_BADFILE',
				[78] => 'CURLE_REMOTE_FILE_NOT_FOUND',
				[79] => 'CURLE_SSH',
				[80] => 'CURLE_SSL_SHUTDOWN_FAILED',
				[81] => 'CURLE_AGAIN',
				[82] => 'CURLE_SSL_CRL_BADFILE',
				[83] => 'CURLE_SSL_ISSUER_ERROR',
				[84] => 'CURLE_FTP_PRET_FAILED',
				[84] => 'CURLE_FTP_PRET_FAILED',
				[85] => 'CURLE_RTSP_CSEQ_ERROR',
				[86] => 'CURLE_RTSP_SESSION_ERROR',
				[87] => 'CURLE_FTP_BAD_FILE_LIST',
				[88] => 'CURLE_CHUNK_FAILED',
			);
			$error_message = $error_codes[$errno];
		}
		throw new \Exception($error_message, $errno);
	}
	/**
	 * Interpret the given exception and decide whether it is due to an
	 * unavailable storage, invalid storage or other.
	 * This will either throw StorageInvalidException, StorageNotAvailableException
	 * or do nothing.
	 *
	 * @param Exception $e sabre exception
	 *
	 * @throws StorageInvalidException if the storage is invalid, for example
	 * when the authentication expired or is invalid
	 * @throws StorageNotAvailableException if the storage is not available,
	 * which might be temporary
	 */
	private function convertException(Exception $e) {
		Util::writeLog('files_external', $e->getMessage(), Util::ERROR);
		if ($e instanceof ClientHttpException) {
			if ($e->getHttpStatus() === 401) {
				// either password was changed or was invalid all along
				throw new StorageInvalidException(get_class($e).': '.$e->getMessage());
			} else if ($e->getHttpStatus() === 405) {
				// ignore exception for MethodNotAllowed, false will be returned
				return;
			}
			throw new StorageNotAvailableException(get_class($e).': '.$e->getMessage());
		} else if ($e instanceof ClientException) {
			// connection timeout or refused, server could be temporarily down
			throw new StorageNotAvailableException(get_class($e).': '.$e->getMessage());
		} else if ($e instanceof \InvalidArgumentException) {
			// parse error because the server returned HTML instead of XML,
			// possibly temporarily down
			throw new StorageNotAvailableException(get_class($e).': '.$e->getMessage());
		} else if (($e instanceof StorageNotAvailableException) || ($e instanceof StorageInvalidException)) {
			// rethrow
			throw $e;
		}

		// TODO: only log for now, but in the future need to wrap/rethrow exception
	}
	private function throwFTPException($errorCode, $errorMessage) {
		//see http://en.wikipedia.org/wiki/List_of_FTP_server_return_codes for a full list
		switch ($errorCode) {
			//we currently only need to distinguish 550 from the rest
			case (550): //Requested action not taken. File unavailable (e.g., file not found, no access).
				throw new Files\NotFoundException($errorMessage);
			default:
				throw new IOError($errorCode.' '.$errorMessage);
		}
	}
	//"compact" print_r($a,true)
	private function compact_pa($a) {
		if (!is_array($a))
			return $a;
		$buf = "a(";
		foreach ($a as $k => $v) {
			if (is_array($v))
				$v = $this->compact_pa($v);
			else
				$v = "'$v'";
			$buf .= "'$k'=>$v,";
		}
		return substr($buf, 0, -1) . ")";
	}
}

class CurlException extends \Exception {}
class IOError extends \Exception {}
class BadParameterException extends \Exception {}
