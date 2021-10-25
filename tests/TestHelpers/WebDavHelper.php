<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace TestHelpers;

use Exception;
use GuzzleHttp\Client;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use DateTime;

/**
 * Helper to make WebDav Requests
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class WebDavHelper {
	/**
	 * returns the id of a file
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $path
	 * @param string|null $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getFileIdForPath(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $path,
		?string $xRequestId = ''
	): string {
		$body
			= '<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:fileid />
  </d:prop>
</d:propfind>';
		$response = self::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"PROPFIND",
			$path,
			null,
			$xRequestId,
			$body
		);
		\preg_match(
			'/\<oc:fileid\>([^\<]*)\<\/oc:fileid\>/',
			$response->getBody()->getContents(),
			$matches
		);

		if (!isset($matches[1])) {
			throw new Exception("could not find fileId of $path");
		}

		return $matches[1];
	}

	/**
	 * sends a PROPFIND request
	 * with these registered namespaces:
	 *  | prefix | namespace                                 |
	 *  | d      | DAV:                                      |
	 *  | oc     | http://owncloud.org/ns                    |
	 *  | ocs    | http://open-collaboration-services.org/ns |
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $path
	 * @param string[] $properties
	 *        string can contain namespace prefix,
	 *        if no prefix is given 'd:' is used as prefix
	 *        if associated array is used then the key will be used as namespace
	 * @param string|null $xRequestId
	 * @param string|null $folderDepth
	 * @param string|null $type
	 * @param int|null $davPathVersionToUse
	 *
	 * @return ResponseInterface
	 */
	public static function propfind(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $path,
		?array $properties,
		?string $xRequestId = '',
		?string $folderDepth = '0',
		?string $type = "files",
		?int $davPathVersionToUse = 2
	):ResponseInterface {
		$propertyBody = "";
		$extraNamespaces = "";
		foreach ($properties as $namespaceString => $property) {
			if (\is_int($namespaceString)) {
				//default namespace prefix if the property has no array key
				//also used if no prefix is given in the property value
				$namespacePrefix = "d";
			} else {
				//calculate the namespace prefix and namespace from the array key
				$matches = [];
				\preg_match("/^(.*)='(.*)'$/", $namespaceString, $matches);
				$nameSpace = $matches[2];
				$namespacePrefix = $matches[1];
				$extraNamespaces .= " xmlns:$namespacePrefix=\"$nameSpace\" ";
			}
			//if a namespace prefix is given in the property value use that
			if (\strpos($property, ":") !== false) {
				$propertyParts = \explode(":", $property);
				$namespacePrefix = $propertyParts[0];
				$property = $propertyParts[1];
			}
			$propertyBody .= "<$namespacePrefix:$property/>";
		}
		$folderDepth = (string) $folderDepth;
		if ($folderDepth !== '0' && $folderDepth !== '1' && $folderDepth !== 'infinity') {
			throw new InvalidArgumentException('Invalid depth value ' . $folderDepth);
		}
		$headers = ['Depth' => $folderDepth];
		$body = "<?xml version=\"1.0\"?>
				<d:propfind
				   xmlns:d=\"DAV:\"
				   xmlns:oc=\"http://owncloud.org/ns\"
				   xmlns:ocs=\"http://open-collaboration-services.org/ns\"
				   $extraNamespaces>
				    <d:prop>$propertyBody</d:prop>
				</d:propfind>";
		return self::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"PROPFIND",
			$path,
			$headers,
			$xRequestId,
			$body,
			$davPathVersionToUse,
			$type
		);
	}

	/**
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $path
	 * @param string|null $propertyName
	 * @param string|null $propertyValue
	 * @param string|null $xRequestId
	 * @param string|null $namespaceString string containing prefix and namespace
	 *                                     e.g "x1='http://whatever.org/ns'"
	 * @param int|null $davPathVersionToUse
	 * @param string|null $type
	 *
	 * @return ResponseInterface
	 */
	public static function proppatch(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $path,
		?string $propertyName,
		?string $propertyValue,
		?string $xRequestId = '',
		?string $namespaceString = "oc='http://owncloud.org/ns'",
		?int $davPathVersionToUse = 2,
		?string $type="files"
	):ResponseInterface {
		$matches = [];
		\preg_match("/^(.*)='(.*)'$/", $namespaceString, $matches);
		$namespace = $matches[2];
		$namespacePrefix = $matches[1];
		$propertyBody = "<$namespacePrefix:$propertyName" .
						  " xmlns:$namespacePrefix=\"$namespace\">" .
							"$propertyValue" .
						 "</$namespacePrefix:$propertyName>";
		$body = "<?xml version=\"1.0\"?>
				<d:propertyupdate xmlns:d=\"DAV:\"
				   xmlns:oc=\"http://owncloud.org/ns\">
				 <d:set>
				  <d:prop>$propertyBody</d:prop>
				 </d:set>
				</d:propertyupdate>";
		return self::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"PROPPATCH",
			$path,
			[],
			$xRequestId,
			$body,
			$davPathVersionToUse,
			$type
		);
	}

	/**
	 * gets namespace-prefix, namespace url and propName from provided namespaceString or property
	 * or otherwise use default
	 *
	 * @param string|null $namespaceString
	 * @param string|null $property
	 *
	 * @return array
	 */
	public static function getPropertyWithNamespaceInfo(?string $namespaceString = "", ?string $property = ""):array {
		$namespace = "";
		$namespacePrefix = "";
		if (\is_int($namespaceString)) {
			//default namespace prefix if the property has no array key
			//also used if no prefix is given in the property value
			$namespacePrefix = "d";
			$namespace = "DAV:";
		} elseif ($namespaceString) {
			//calculate the namespace prefix and namespace from the array key
			$matches = [];
			\preg_match("/^(.*)='(.*)'$/", $namespaceString, $matches);
			$namespacePrefix = $matches[1];
			$namespace = $matches[2];
		}
		//if a namespace prefix is given in the property value use that
		if ($property && \strpos($property, ":")) {
			$propertyParts = \explode(":", $property);
			$namespacePrefix = $propertyParts[0];
			$property = $propertyParts[1];
		}
		return [$namespacePrefix, $namespace, $property];
	}

	/**
	 * sends HTTP request PROPPATCH method with multiple properties
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string $path
	 * @param array|null $propertiesArray
	 * @param string|null $xRequestId
	 * @param string|null $namespaceString
	 * @param int|null $davPathVersionToUse
	 * @param string|null $type
	 *
	 * @return ResponseInterface
	 */
	public static function proppatchWithMultipleProps(
		?string  $baseUrl,
		?string  $user,
		?string $password,
		string  $path,
		?array $propertiesArray,
		?string $xRequestId = '',
		?string  $namespaceString = "oc='http://owncloud.org/ns'",
		?int     $davPathVersionToUse = 2,
		?string  $type="files"
	):ResponseInterface {
		$propertyBody = "";
		foreach ($propertiesArray as $propertyArray) {
			$property = $propertyArray["propertyName"];
			$value = $propertyArray["propertyValue"];
			[$namespacePrefix, $namespace, $property] = self::getPropertyWithNamespaceInfo(
				$namespaceString,
				$property
			);
			$propertyBody .= "\n\t<$namespacePrefix:$property>" .
				"$value" .
				"</$namespacePrefix:$property>";
		}
		$body = "<?xml version=\"1.0\"?>
				<d:propertyupdate xmlns:d=\"DAV:\"
				   xmlns:oc=\"http://owncloud.org/ns\">
				 <d:set>
				  <d:prop>$propertyBody
				  </d:prop>
				 </d:set>
				</d:propertyupdate>";
		return self::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"PROPPATCH",
			$path,
			[],
			$xRequestId,
			$body,
			$davPathVersionToUse,
			$type
		);
	}

	/**
	 * returns the response to listing a folder (collection)
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $path
	 * @param string|null $folderDepth
	 * @param string|null $xRequestId
	 * @param string[] $properties
	 * @param string|null $type
	 * @param int|null $davPathVersionToUse
	 *
	 * @return ResponseInterface
	 */
	public static function listFolder(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $path,
		?string $folderDepth,
		?string $xRequestId = '',
		?array $properties = null,
		?string $type = "files",
		?int $davPathVersionToUse = 2
	):ResponseInterface {
		if (!$properties) {
			$properties = [
				'getetag', 'resourcetype'
			];
		}
		return self::propfind(
			$baseUrl,
			$user,
			$password,
			$path,
			$properties,
			$xRequestId,
			$folderDepth,
			$type,
			$davPathVersionToUse
		);
	}

	/**
	 *
	 * @param string|null $baseUrl
	 * URL of owncloud e.g. http://localhost:8080
	 * should include the subfolder if owncloud runs in a subfolder
	 * e.g. http://localhost:8080/owncloud-core
	 * @param string|null $user
	 * @param string|null $password or token when bearer auth is used
	 * @param string|null $method PUT, GET, DELETE, etc.
	 * @param string|null $path
	 * @param array|null $headers
	 * @param string|null $xRequestId
	 * @param string|null|resource|StreamInterface $body
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $type of request
	 * @param string|null $sourceIpAddress to initiate the request from
	 * @param string|null $authType basic|bearer
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param int|null $timeout
	 * @param Client|null $client
	 * @param array|null $urlParameter to concatenate with path
	 * @param string|null $doDavRequestAsUser run the DAV as this user, if null its same as $user
	 *
	 * @return ResponseInterface
	 */
	public static function makeDavRequest(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $method,
		?string $path,
		?array $headers,
		?string $xRequestId = '',
		$body = null,
		?int $davPathVersionToUse = 1,
		?string $type = "files",
		?string $sourceIpAddress = null,
		?string $authType = "basic",
		?bool $stream = false,
		?int $timeout = 0,
		?Client $client = null,
		?array $urlParameter = [],
		?string $doDavRequestAsUser = null
	):ResponseInterface {
		$baseUrl = self::sanitizeUrl($baseUrl, true);
		if ($doDavRequestAsUser === null) {
			$davPath = self::getDavPath($user, $davPathVersionToUse, $type);
		} else {
			$davPath = self::getDavPath($doDavRequestAsUser, $davPathVersionToUse, $type);
		}
		//replace %, # and ? and in the path, Guzzle will not encode them
		$urlSpecialChar = [['%', '#', '?'], ['%25', '%23', '%3F']];
		$path = \str_replace($urlSpecialChar[0], $urlSpecialChar[1], $path);

		if (!empty($urlParameter)) {
			$urlParameter = \http_build_query($urlParameter, '', '&');
			$path .= '?' . $urlParameter;
		}
		$fullUrl = self::sanitizeUrl($baseUrl . $davPath . $path);

		if ($authType === 'bearer') {
			$headers['Authorization'] = 'Bearer ' . $password;
			$user = null;
			$password = null;
		}
		if ($type === "public-files-new") {
			if ($password === null || $password === "") {
				$user = null;
			} else {
				$user = "public";
			}
		}
		$config = null;
		if ($sourceIpAddress !== null) {
			$config = [ 'curl' => [ CURLOPT_INTERFACE => $sourceIpAddress ]];
		}

		if ($headers !== null) {
			foreach ($headers as $key => $value) {
				//? and # need to be encoded in the Destination URL
				if ($key === "Destination") {
					$headers[$key] = \str_replace(
						$urlSpecialChar[0],
						$urlSpecialChar[1],
						$value
					);
					break;
				}
			}
		}
		return HttpRequestHelper::sendRequest(
			$fullUrl,
			$xRequestId,
			$method,
			$user,
			$password,
			$headers,
			$body,
			$config,
			null,
			$stream,
			$timeout,
			$client
		);
	}

	/**
	 * get the dav path
	 *
	 * @param string|null $user
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $type
	 *
	 * @return string
	 */
	public static function getDavPath(
		?string $user,
		?int $davPathVersionToUse = 1,
		?string $type = "files"
	):string {
		if ($type === "public-files" || $type === "public-files-old") {
			return "public.php/webdav/";
		}
		if ($type === "public-files-new") {
			return "remote.php/dav/public-files/$user/";
		}
		if ($type === "archive") {
			return "remote.php/dav/archive/$user/files";
		}
		if ($type === "customgroups") {
			return "remote.php/dav/";
		}
		if ($davPathVersionToUse === 1) {
			$path = "remote.php/webdav/";
			return $path;
		} elseif ($davPathVersionToUse === 2) {
			if ($type === "files") {
				$path = 'remote.php/dav/files/';
				return $path . $user . '/';
			} else {
				return "remote.php/dav";
			}
		} else {
			throw new InvalidArgumentException(
				"DAV path version $davPathVersionToUse is unknown"
			);
		}
	}

	/**
	 * make sure there are no double slash in the URL
	 *
	 * @param string|null $url
	 * @param bool|null $trailingSlash forces a trailing slash
	 *
	 * @return string
	 */
	public static function sanitizeUrl(?string $url, ?bool $trailingSlash = false):string {
		if ($trailingSlash === true) {
			$url = $url . "/";
		} else {
			$url = \rtrim($url, "/");
		}
		$url = \preg_replace("/([^:]\/)\/+/", '$1', $url);
		return $url;
	}

	/**
	 * decides if the proposed dav version and chunking version are
	 * a valid combination.
	 * If no chunkingVersion is specified, then any dav version is valid.
	 * If a chunkingVersion is specified, then it has to match the dav version.
	 * Note: in future the dav and chunking versions might or might not
	 * move together and/or be supported together. So a more complex
	 * matrix could be needed here.
	 *
	 * @param string|int $davPathVersion
	 * @param string|int|null $chunkingVersion
	 *
	 * @return boolean is this a valid combination
	 */
	public static function isValidDavChunkingCombination(
		$davPathVersion,
		$chunkingVersion
	): bool {
		return (
			($chunkingVersion === 'no' || $chunkingVersion === null) ||
			($davPathVersion === $chunkingVersion)
		);
	}

	/**
	 * get Mtime of File in a public link share
	 *
	 * @param string|null $baseUrl
	 * @param string|null $fileName
	 * @param string|null $token
	 * @param string|null $xRequestId
	 * @param int|null $davVersionToUse
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getMtimeOfFileinPublicLinkShare(
		?string $baseUrl,
		?string $fileName,
		?string $token,
		?string $xRequestId = '',
		?int $davVersionToUse = 2
	):string {
		$response = self::propfind(
			$baseUrl,
			null,
			null,
			"/public-files/{$token}/{$fileName}",
			['d:getlastmodified'],
			$xRequestId,
			1,
			null,
			$davVersionToUse
		);
		$responseXmlObject = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
		$xmlPart = $responseXmlObject->xpath("//d:getlastmodified");

		return $xmlPart[0]->__toString();
	}

	/**
	 * get Mtime of a resource
	 *
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $baseUrl
	 * @param string|null $resource
	 * @param string|null $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getMtimeOfResource(
		?string $user,
		?string $password,
		?string $baseUrl,
		?string $resource,
		?string $xRequestId = ''
	):string {
		$response = self::propfind(
			$baseUrl,
			$user,
			$password,
			$resource,
			["getlastmodified"],
			$xRequestId
		);
		$responseXmlObject = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
		$xmlpart = $responseXmlObject->xpath("//d:getlastmodified");
		$mtime = new DateTime($xmlpart[0]->__toString());
		return $mtime->format('U');
	}
}
