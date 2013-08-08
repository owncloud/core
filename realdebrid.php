<?php
define("USER", "tonemgub");
define("PASSWORD", "bugmenot");
global $regexes, $regexes_folder;

function curlExec($curl, $url) {
	curl_setopt($curl, CURLOPT_URL, $url);
	$result = curl_exec($curl);
	if ($result === false) {
		die(json_encode(array('error' => 1, 'message' => 'Konnte Daten von Real-Debrid nicht laden: ' . curl_error($curl) . ' (' . curl_errno($curl) . ')')));
	}
	return $result;
}

function isSupportedHoster($curl, $url) {
	global $regexes, $regexes_folder;

	$result = curlExec($curl, 'https://www.real-debrid.com/api/regex.php?type=all');
	$info = curl_getinfo($curl);
	if ($info['http_code'] !== 200) {
		die(json_encode(array('error' => 1, 'message' => 'Konnte Hosterliste nicht laden.')));
	}

	$result = preg_replace("%(?<!\\\\)/g%", '/', $result);
	$result = explode('|-|', $result, 2);
	$regexes = explode(',', $result[0]);
	$regexes_folder = explode(',', $result[1]);
	foreach ($regexes as $regex) {
		if (preg_match($regex, $url, $matches) === 1) {
			return true;
		}
	}
	return false;
}

function login($curl) {
	$result = curlExec($curl, 'https://www.real-debrid.com/ajax/login.php?user=' . urlencode(USER) . '&pass=' . md5(trim(PASSWORD)));
	$info = curl_getinfo($curl);
	if ($info['http_code'] !== 200) {
		die(json_encode(array('error' => 1, 'message' => 'Konnte Anmelde-Anforderung nicht ausführen.')));
	}

	$result = json_decode($result, true);
	if ($result['error'] !== 0) {
		die(json_encode(array('error' => 1, 'message' => $result['message'])));
	}
	curl_setopt($curl, CURLOPT_COOKIE, $result['cookie']);
}

function getAccountInfo($curl) {
	$result = curlExec($curl, 'https://www.real-debrid.com/api/account.php');
	$info = curl_getinfo($curl);
	if ($info['http_code'] !== 200) {
		die(json_encode(array('error' => 1, 'message' => 'Konnte Accountdaten nicht abrufen.')));
	}

	$xml = xml_parser_create();
	xml_parse_into_struct($xml, $result, $values, $index);
	xml_parser_free($xml);
	var_dump($index);
	var_dump($values);
}

function isFolder($url) {
	global $regexes_folder;

	foreach ($regexes_folder as $regex) {
		if (preg_match($regex, $url, $matches) === 1) {
			return true;
		}
	}
	return false;
}

function getFolderURLs($curl, $url) {
	$result = curlExec($curl, 'https://www.real-debrid.com/ajax/folder.php?l=' . urlencode($url));
	$info = curl_getinfo($curl);
	if ($info['http_code'] !== 200) {
		die(json_encode(array('error' => 1, 'message' => 'Konnte Folder-URL nicht laden.')));
	}

	if (empty($result)) {
		die(json_encode(array('error' => 1, 'message' => 'Fehler beim Decodieren des Folders.')));
	}
	return explode(',', $result);
}

function getDownloadURL($curl, $url) {
	$result = curlExec($curl, 'https://www.real-debrid.com/ajax/unrestrict.php?link=' . urlencode($url) . '&password=&remote=0');
	$info = curl_getinfo($curl);
	if ($info['http_code'] !== 200) {
		die(json_encode(array('error' => 1, 'message' => 'Konnte Download-URL nicht laden.')));
	}

	$result = json_decode($result, true);
	if ($result['error'] !== 0) {
		die(json_encode(array('error' => 1, 'message' => $result['message'])));
	}
	return $result['main_link'];
}

$headers = getallheaders();
if (isset($headers['Origin'])) {
	header("Access-Control-Allow-Origin: " . $headers['Origin']);
}

if (!isset($_GET['url'])) {
	die(json_encode(array('error' => 1, 'message' => 'Es wurde keine URL angegeben.')));
}

$url = urldecode($_GET['url']);
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Firefox-Plugin: 1'));
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0');
if (!isSupportedHoster($curl, $url)) {
	die(json_encode(array('error' => 1, 'message' => 'Die angegebene URL gehört zu keinem unterstützen Hoster.')));
}
login($curl);

if (isFolder($url)) {
	$downloadUrls = getFolderURLs($curl, $url);
	foreach ($downloadUrls as $i => $singleURL) {
		$downloadUrls[$i] = getDownloadURL($curl, $singleURL);
	}
	echo json_encode(array('error' => 0, 'folder' => 1, 'urls' => $downloadUrls));
}
else {
	$downloadUrl = getDownloadURL($curl, $url);
	echo json_encode(array('error' => 0, 'url' => $downloadUrl));
}
curl_close($curl);