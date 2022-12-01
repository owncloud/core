<?php declare(strict_types=1);
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
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use DateTime;
use TestHelpers\SpaceNotFoundException;

/**
 * Helper to make WebDav Requests
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class WebDavHelper {
	public const DAV_VERSION_OLD = 1;
	public const DAV_VERSION_NEW = 2;
	public const DAV_VERSION_SPACES = 3;
	public static $SPACE_ID_FROM_OCIS = '';

	/**
	 * @var array of users with their different spaces ids
	 */
	public static $spacesIdRef = [];

	/**
	 * clear space id reference for user
	 *
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function removeSpaceIdReferenceForUser(
		?string $user
	):void {
		if (\array_key_exists($user, self::$spacesIdRef)) {
			unset(self::$spacesIdRef[$user]);
		}
	}

	/**
	 * returns the id of a file
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $path
	 * @param string|null $xRequestId
	 * @param int|null $davPathVersionToUse
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getFileIdForPath(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $path,
		?string $xRequestId = '',
		?int $davPathVersionToUse = self::DAV_VERSION_NEW
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
			$body,
			$davPathVersionToUse
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
	 * returns body for propfind
	 *
	 * @param array|null $properties
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getBodyForPropfind(?array $properties): string {
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
		$body = "<?xml version=\"1.0\"?>
				<d:propfind
				   xmlns:d=\"DAV:\"
				   xmlns:oc=\"http://owncloud.org/ns\"
				   xmlns:ocs=\"http://open-collaboration-services.org/ns\"
				   $extraNamespaces>
				    <d:prop>$propertyBody</d:prop>
				</d:propfind>";
		return $body;
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
	 * @param string|null $doDavRequestAsUser
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
		?int $davPathVersionToUse = self::DAV_VERSION_NEW,
		?string $doDavRequestAsUser = null
	):ResponseInterface {
		$body = self::getBodyForPropfind($properties);
		$folderDepth = (string) $folderDepth;
		if ($folderDepth !== '0' && $folderDepth !== '1' && $folderDepth !== 'infinity') {
			throw new InvalidArgumentException('Invalid depth value ' . $folderDepth);
		}
		$headers = ['Depth' => $folderDepth];
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
			$type,
			null,
			null,
			false,
			null,
			null,
			[],
			$doDavRequestAsUser
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
		?int $davPathVersionToUse = self::DAV_VERSION_NEW,
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
	 * @param int|null $davPathVersion
	 * @param string|null $namespaceString
	 * @param string|null $type
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	public static function proppatchWithMultipleProps(
		?string  $baseUrl,
		?string  $user,
		?string $password,
		string  $path,
		?array $propertiesArray,
		?string $xRequestId = '',
		?int  $davPathVersion = null,
		?string  $namespaceString = "oc='http://owncloud.org/ns'",
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
			$davPathVersion,
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
		?int $davPathVersionToUse = self::DAV_VERSION_NEW
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
	 * Generates UUIDv4
	 * Example: 123e4567-e89b-12d3-a456-426614174000
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function generateUUIDv4():string {
		// generate 16 bytes (128 bits) of random data or use the data passed into the function.
		$data = random_bytes(16);
		\assert(\strlen($data) == 16);

		$data[6] = \chr(\ord($data[6]) & 0x0f | 0x40); // set version to 0100
		$data[8] = \chr(\ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

		return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}

	/**
	 * fetches personal space id for provided user
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $xRequestId
	 *
	 * @return string
	 * @throws GuzzleException
	 * @throws Exception
	 */
	public static function getPersonalSpaceIdForUser(string $baseUrl, string $user, string $password, string $xRequestId):string {
		if (\array_key_exists($user, self::$spacesIdRef) && \array_key_exists("personal", self::$spacesIdRef[$user])) {
			return self::$spacesIdRef[$user]["personal"];
		}
		$trimmedBaseUrl = \trim($baseUrl, "/");
		$drivesPath = '/graph/v1.0/me/drives';
		$fullUrl = $trimmedBaseUrl . $drivesPath;
		$response = HttpRequestHelper::get(
			$fullUrl,
			$xRequestId,
			$user,
			$password
		);
		$bodyContents = $response->getBody()->getContents();
		$json = \json_decode($bodyContents);
		$personalSpaceId = '';
		if ($json === null) {
			// the graph endpoint did not give a useful answer
			// try getting the information from the webdav endpoint
			$fullUrl = $trimmedBaseUrl . '/remote.php/webdav';
			$response = HttpRequestHelper::sendRequest(
				$fullUrl,
				$xRequestId,
				'PROPFIND',
				$user,
				$password
			);
			// we expect to get a multipart XML response with status 207
			$status = $response->getStatusCode();
			if ($status === 401) {
				throw new SpaceNotFoundException(__METHOD__ . " Personal space not found for user " . $user);
			} elseif ($status !== 207) {
				throw new Exception(
					__METHOD__ . " webdav propfind for user $user failed with status $status - so the personal space id cannot be discovered"
				);
			}
			$responseXmlObject = HttpRequestHelper::getResponseXml(
				$response,
				__METHOD__
			);
			$xmlPart = $responseXmlObject->xpath("/d:multistatus/d:response[1]/d:propstat/d:prop/oc:id");
			if ($xmlPart === false) {
				throw new Exception(
					__METHOD__ . " oc:id not found in webdav propfind for user $user - so the personal space id cannot be discovered"
				);
			}
			$ocIdRawString = $xmlPart[0]->__toString();
			$separator = "!";
			if (\strpos($ocIdRawString, $separator) !== false) {
				// The string is not base64-encoded, because the exclamation mark is not in the base64 alphabet.
				// We expect to have a string with 2 parts separated by the exclamation mark.
				// This is the format introduced in 2022-02
				// oc:id should be something like:
				// "7464caf6-1799-103c-9046-c7b74deb5f63!7464caf6-1799-103c-9046-c7b74deb5f63"
				// There is no encoding to decode.
				$decodedId = $ocIdRawString;
			} else {
				// fall-back to assuming that the oc:id is base64-encoded
				// That is the format used before and up to 2022-02
				// This can be removed after both the edge and master branches of cs3org/reva are using the new format.
				// oc:id should be some base64 encoded string like:
				// "NzQ2NGNhZjYtMTc5OS0xMDNjLTkwNDYtYzdiNzRkZWI1ZjYzOjc0NjRjYWY2LTE3OTktMTAzYy05MDQ2LWM3Yjc0ZGViNWY2Mw=="
				// That should decode to something like:
				// "7464caf6-1799-103c-9046-c7b74deb5f63:7464caf6-1799-103c-9046-c7b74deb5f63"
				$decodedId = base64_decode($ocIdRawString);
				$separator = ":";
			}
			$ocIdParts = \explode($separator, $decodedId);
			if (\count($ocIdParts) !== 2) {
				throw new Exception(
					__METHOD__ . " the oc:id $decodedId for user $user does not have 2 parts separated by '$separator', so the personal space id cannot be discovered"
				);
			}
			$personalSpaceId = $ocIdParts[0];
		} else {
			foreach ($json->value as $spaces) {
				if ($spaces->driveType === "personal") {
					$personalSpaceId = $spaces->id;
					break;
				}
			}
		}
		if ($personalSpaceId) {
			// If env var LOG_PERSONAL_SPACE_ID is defined, then output the details of the personal space id.
			// This is a useful debugging tool to have confidence that the personal space id is found correctly.
			if (\getenv('LOG_PERSONAL_SPACE_ID') !== false) {
				echo __METHOD__ . " personal space id of user $user is $personalSpaceId\n";
			}
			self::$spacesIdRef[$user] = [];
			self::$spacesIdRef[$user]["personal"] = $personalSpaceId;
			return $personalSpaceId;
		} else {
			throw new SpaceNotFoundException(__METHOD__ . " Personal space not found for user " . $user);
		}
	}

	/**
	 * First checks if a user exist to return its space ID
	 * In case of any exception, it returns a fake space ID
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getPersonalSpaceIdForUserOrFakeIfNotFound(string $baseUrl, string $user, string $password, string $xRequestId):string {
		try {
			$spaceId = self::getPersonalSpaceIdForUser(
				$baseUrl,
				$user,
				$password,
				$xRequestId,
			);
		} catch (SpaceNotFoundException $e) {
			// if the fetch fails, and the user is not found, then a fake space id is prepared
			// this is useful for testing when the personal space is of a non-existing user
			$fakeSpaceId = self::generateUUIDv4();
			self::$spacesIdRef[$user]["personal"] = $fakeSpaceId;
			$spaceId = $fakeSpaceId;
		}
		return $spaceId;
	}

	/**
	 * sends a DAV request
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
	 * @param int|null $davPathVersionToUse (1|2|3)
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
	 * @throws GuzzleException
	 * @throws Exception
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
		?int $davPathVersionToUse = self::DAV_VERSION_OLD,
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

		// We need to manipulate and use path as a string.
		// So ensure that it is a string to avoid any type-conversion errors.
		if ($path === null) {
			$path = "";
		}

		// get space id if testing with spaces dav
		if (self::$SPACE_ID_FROM_OCIS === '' && $davPathVersionToUse === self::DAV_VERSION_SPACES) {
			$spaceId = self::getPersonalSpaceIdForUserOrFakeIfNotFound(
				$baseUrl,
				$doDavRequestAsUser ?? $user,
				$password,
				$xRequestId
			);
		} else {
			$spaceId = self::$SPACE_ID_FROM_OCIS;
		}

		$davPath = self::getDavPath($doDavRequestAsUser ?? $user, $davPathVersionToUse, $type, $spaceId);

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

		//Clear the space ID from ocis after each request
		self::$SPACE_ID_FROM_OCIS = '';
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
	 * @param string|null $spaceId
	 *
	 * @return string
	 */
	public static function getDavPath(
		?string $user,
		?int $davPathVersionToUse = null,
		?string $type = "files",
		?string $spaceId = null
	):string {
		$newTrashbinDavPath = "remote.php/dav/trash-bin/$user/";
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
		if ($davPathVersionToUse === self::DAV_VERSION_SPACES) {
			if (($spaceId === null) || (\strlen($spaceId) === 0)) {
				throw new InvalidArgumentException(
					__METHOD__ . " A spaceId must be passed when using DAV path version 3 (spaces)"
				);
			}
			if ($type === "trash-bin") {
				return "/remote.php/dav/spaces/trash-bin/" . $spaceId . '/';
			}
			return "dav/spaces/" . $spaceId . '/';
		} else {
			if ($davPathVersionToUse === self::DAV_VERSION_OLD) {
				if ($type === "trash-bin") {
					// Since there is no trash bin endpoint for old dav version, new dav version's endpoint is used here.
					return $newTrashbinDavPath;
				}
				return "remote.php/webdav/";
			} elseif ($davPathVersionToUse === self::DAV_VERSION_NEW) {
				if ($type === "files") {
					$path = 'remote.php/dav/files/';
					return $path . $user . '/';
				} elseif ($type === "trash-bin") {
					return $newTrashbinDavPath;
				} else {
					return "remote.php/dav";
				}
			} else {
				throw new InvalidArgumentException(
					"DAV path version $davPathVersionToUse is unknown"
				);
			}
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
		if ($davPathVersion === self::DAV_VERSION_SPACES) {
			// allow only old chunking version when using the spaces dav
			return $chunkingVersion === 1;
		}
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
		?int $davVersionToUse = self::DAV_VERSION_NEW
	):string {
		$response = self::propfind(
			$baseUrl,
			null,
			null,
			"/public-files/{$token}/{$fileName}",
			['d:getlastmodified'],
			$xRequestId,
			'1',
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
	 * @param int|null $davPathVersionToUse
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getMtimeOfResource(
		?string $user,
		?string $password,
		?string $baseUrl,
		?string $resource,
		?string $xRequestId = '',
		?int $davPathVersionToUse = self::DAV_VERSION_NEW
	):string {
		$response = self::propfind(
			$baseUrl,
			$user,
			$password,
			$resource,
			["getlastmodified"],
			$xRequestId,
			"0",
			"files",
			$davPathVersionToUse
		);
		$responseXmlObject = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
		$xmlpart = $responseXmlObject->xpath("//d:getlastmodified");
		Assert::assertArrayHasKey(
			0,
			$xmlpart,
			__METHOD__ . " XML part does not have key 0. Expected a value at index 0 of 'xmlPart' but, found: " . (string) json_encode($xmlpart)
		);
		$mtime = new DateTime($xmlpart[0]->__toString());
		return $mtime->format('U');
	}
}
