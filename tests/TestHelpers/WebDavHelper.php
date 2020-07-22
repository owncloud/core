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
use SimpleXMLElement;
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
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $path
	 *
	 * @throws Exception
	 * @return int
	 */
	public static function getFileIdForPath(
		$baseUrl,
		$user,
		$password,
		$path
	) {
		$body
			= '<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:fileid />
  </d:prop>
</d:propfind>';
		$response = self::makeDavRequest(
			$baseUrl, $user, $password, "PROPFIND", $path, null, $body
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
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $path
	 * @param string[] $properties
	 *        string can contain namespace prefix,
	 *        if no prefix is given 'd:' is used as prefix
	 *        if associated array is used then the key will be used as namespace
	 * @param int $folderDepth
	 * @param string $type
	 * @param int $davPathVersionToUse
	 *
	 * @throws Exception
	 *
	 * @return ResponseInterface
	 */
	public static function propfind(
		$baseUrl,
		$user,
		$password,
		$path,
		$properties,
		$folderDepth = 0,
		$type = "files",
		$davPathVersionToUse = 2
	) {
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
			$baseUrl, $user, $password, "PROPFIND", $path, $headers, $body,
			$davPathVersionToUse, $type
		);
	}
	/**
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $path
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @param string $namespaceString string containing prefix and namespace
	 *                                e.g "x1='http://whatever.org/ns'"
	 * @param number $davPathVersionToUse
	 * @param string $type
	 *
	 * @return ResponseInterface
	 */
	public static function proppatch(
		$baseUrl,
		$user,
		$password,
		$path,
		$propertyName,
		$propertyValue,
		$namespaceString = "oc='http://owncloud.org/ns'",
		$davPathVersionToUse = 2,
		$type="files"
	) {
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
			$baseUrl, $user, $password, "PROPPATCH", $path, [], $body,
			$davPathVersionToUse, $type
		);
	}

	/**
	 * gets namespace-prefix, namespace url and propName from provided namespaceString or property
	 * or otherwise use default
	 *
	 * @param string $namespaceString
	 * @param string $property
	 *
	 * @return array
	 */
	public static function getPropertyWithNamespaceInfo($namespaceString = "", $property = "") {
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
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $path
	 * @param array $propertiesArray
	 * @param string $namespaceString
	 * @param int $davPathVersionToUse
	 * @param string $type
	 *
	 * @return ResponseInterface
	 */
	public static function proppatchWithMultipleProps(
		$baseUrl,
		$user,
		$password,
		$path,
		$propertiesArray,
		$namespaceString = "oc='http://owncloud.org/ns'",
		$davPathVersionToUse = 2,
		$type="files"
	) {
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
			$baseUrl, $user, $password, "PROPPATCH", $path, [], $body,
			$davPathVersionToUse, $type
		);
	}

	/**
	 * returns the result parsed into a SimpleXMLElement
	 * with these registered namespaces:
	 *  | prefix | namespace                                 |
	 *  | d      | DAV:                                      |
	 *  | oc     | http://owncloud.org/ns                    |
	 *  | ocs    | http://open-collaboration-services.org/ns |
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $path
	 * @param int $folderDepth
	 * @param string[] $properties
	 * @param string $type
	 * @param int $davPathVersionToUse
	 *
	 * @return SimpleXMLElement|ResponseInterface
	 * @throws Exception
	 */
	public static function listFolder(
		$baseUrl,
		$user,
		$password,
		$path,
		$folderDepth,
		$properties = null,
		$type = "files",
		$davPathVersionToUse = 2
	) {
		if (!$properties) {
			$properties = [
				'getetag', 'resourcetype'
			];
		}
		$response = self::propfind(
			$baseUrl, $user, $password, $path, $properties,
			$folderDepth, $type, $davPathVersionToUse
		);
		try {
			$responseXmlObject = HttpRequestHelper::getResponseXml($response);
			$responseXmlObject->registerXPathNamespace(
				'ocs', 'http://open-collaboration-services.org/ns'
			);
		} catch (\Exception $e) {
			if (OcisHelper::isTestingOnOcis()) {
				return $response;
			} else {
				throw new \Exception($e);
			}
		}
		return $responseXmlObject;
	}

	/**
	 *
	 * @param string $baseUrl
	 * URL of owncloud e.g. http://localhost:8080
	 * should include the subfolder if owncloud runs in a subfolder
	 * e.g. http://localhost:8080/owncloud-core
	 * @param string $user
	 * @param string $password or token when bearer auth is used
	 * @param string $method PUT, GET, DELETE, etc.
	 * @param string $path
	 * @param array $headers
	 * @param string|null|resource|StreamInterface $body
	 * @param int $davPathVersionToUse (1|2)
	 * @param string $type of request
	 * @param string $sourceIpAddress to initiate the request from
	 * @param string $authType basic|bearer
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param int $timeout
	 * @param Client|null $client
	 * @param array $urlParameter to concatenate with path
	 * @param string $doDavRequestAsUser run the DAV as this user, if null its same as $user
	 *
	 * @return ResponseInterface
	 */
	public static function makeDavRequest(
		$baseUrl,
		$user,
		$password,
		$method,
		$path,
		$headers,
		$body = null,
		$davPathVersionToUse = 1,
		$type = "files",
		$sourceIpAddress = null,
		$authType = "basic",
		$stream = false,
		$timeout = 0,
		$client = null,
		$urlParameter = [],
		$doDavRequestAsUser = null
	) {
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
		$config = null;
		if ($sourceIpAddress !== null) {
			$config = [ 'curl' => [ CURLOPT_INTERFACE => $sourceIpAddress ]];
		}

		if ($headers !== null) {
			foreach ($headers as $key => $value) {
				//? and # need to be encoded in the Destination URL
				if ($key === "Destination") {
					$headers[$key] = \str_replace(
						$urlSpecialChar[0], $urlSpecialChar[1], $value
					);
					break;
				}
			}
		}
		return HttpRequestHelper::sendRequest(
			$fullUrl, $method, $user, $password, $headers, $body, $config, null,
			$stream, $timeout, $client
		);
	}

	/**
	 * get the dav path
	 *
	 * @param string $user
	 * @param int $davPathVersionToUse (1|2)
	 * @param string $type
	 *
	 * @throws InvalidArgumentException
	 * @return string
	 */
	public static function getDavPath(
		$user, $davPathVersionToUse = 1, $type = "files"
	) {
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
	 * @param string $url
	 * @param bool $trailingSlash forces a trailing slash
	 *
	 * @return string
	 */
	public static function sanitizeUrl($url, $trailingSlash = false) {
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
		$davPathVersion, $chunkingVersion
	) {
		return (
			($chunkingVersion === 'no' || $chunkingVersion === null) ||
			($davPathVersion === $chunkingVersion)
		);
	}

	/**
	 * get Mtime of File in a public link share
	 *
	 * @param string $baseUrl
	 * @param string $fileName
	 * @param string $token
	 * @param int $davVersionToUse
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getMtimeOfFileinPublicLinkShare(
		$baseUrl,
		$fileName,
		$token,
		$davVersionToUse=2
	) {
		$response = self::propfind(
			$baseUrl,
			null,
			null,
			"/public-files/{$token}/{$fileName}",
			['d:getlastmodified'],
			1,
			null,
			$davVersionToUse
		);
		$responseXmlObject = HttpRequestHelper::getResponseXml($response);
		$xmlPart = $responseXmlObject->xpath("//d:getlastmodified");

		return $xmlPart[0]->__toString();
	}

	/**
	 * get Mtime of a resource
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $baseUrl
	 * @param string $resource
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getMtimeOfResource($user,
		$password,
		$baseUrl,
		$resource
	) {
		$response = self::propfind(
			$baseUrl, $user, $password, $resource, ["getlastmodified"]
		);
		$responseXmlObject = HttpRequestHelper::getResponseXml($response);
		$xmlpart = $responseXmlObject->xpath("//d:getlastmodified");
		$mtime = new DateTime($xmlpart[0]->__toString());
		return $mtime->format('U');
	}
}
