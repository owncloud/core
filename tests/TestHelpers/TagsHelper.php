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

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ResponseInterface;
use Exception;
use SimpleXMLElement;

/**
 * Helper to administer Tags
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class TagsHelper extends Assert {
	/**
	 * tags a file
	 *
	 * @param string|null $baseUrl
	 * @param string|null $taggingUser
	 * @param string|null $password
	 * @param string|null $tagName
	 * @param string|null $fileName
	 * @param string|null $xRequestId
	 * @param string|null $fileOwner
	 * @param string|null $fileOwnerPassword
	 * @param int|null $davPathVersionToUse (1|2)
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 *
	 * @return ResponseInterface
	 * @throws Exception|GuzzleException
	 */
	public static function tag(
		?string $baseUrl,
		?string $taggingUser,
		?string $password,
		?string $tagName,
		?string $fileName,
		?string $xRequestId = '',
		?string $fileOwner = null,
		?string $fileOwnerPassword = null,
		?int $davPathVersionToUse = 2,
		?string $adminUsername = null,
		?string $adminPassword = null
	):ResponseInterface {
		if ($fileOwner === null) {
			$fileOwner = $taggingUser;
		}

		if ($fileOwnerPassword === null) {
			$fileOwnerPassword = $password;
		}

		$fileID = WebDavHelper::getFileIdForPath(
			$baseUrl,
			$fileOwner,
			$fileOwnerPassword,
			$fileName,
			$xRequestId
		);

		try {
			$tag = self::requestTagByDisplayName(
				$baseUrl,
				$taggingUser,
				$password,
				$tagName,
				$xRequestId
			);
		} catch (Exception $e) {
			//the tag might be not accessible by the user
			//if we still want to find it, we need to try as admin
			if ($adminUsername !== null && $adminPassword !== null) {
				$tag = self::requestTagByDisplayName(
					$baseUrl,
					$adminUsername,
					$adminPassword,
					$tagName,
					$xRequestId
				);
			} else {
				throw $e;
			}
		}
		$tagID = self::getTagIdFromTagData($tag);
		$path = '/systemtags-relations/files/' . $fileID . '/' . $tagID;
		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$taggingUser,
			$password,
			"PUT",
			$path,
			null,
			$xRequestId,
			null,
			$davPathVersionToUse,
			"systemtags"
		);
		return $response;
	}

	/**
	 * @param SimpleXMLElement $tagData
	 *
	 * @return int
	 */
	public static function getTagIdFromTagData(SimpleXMLElement $tagData):int {
		$tagID = $tagData->xpath(".//oc:id");
		self::assertArrayHasKey(
			0,
			$tagID,
			"cannot find id of tag"
		);

		return (int) $tagID[0]->__toString();
	}

	/**
	 * get all tags of a user
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $xRequestId
	 * @param bool $withGroups
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public static function requestTagsForUser(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $xRequestId = '',
		?bool $withGroups = false
	):SimpleXMLElement {
		$properties = [
			'oc:id',
			'oc:display-name',
			'oc:user-visible',
			'oc:user-assignable',
			'oc:can-assign'
		];
		if ($withGroups) {
			$properties[] = 'oc:groups';
		}
		$response = WebDavHelper::propfind(
			$baseUrl,
			$user,
			$password,
			'/systemtags/',
			$properties,
			$xRequestId,
			'1',
			"systemtags"
		);
		return HttpRequestHelper::getResponseXml($response, __METHOD__);
	}

	/**
	 * find a tag by its name
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $tagDisplayName
	 * @param string|null $xRequestId
	 * @param bool $withGroups
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public static function requestTagByDisplayName(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $tagDisplayName,
		?string $xRequestId = '',
		?bool $withGroups = false
	):SimpleXMLElement {
		$tagList = self::requestTagsForUser(
			$baseUrl,
			$user,
			$password,
			$xRequestId,
			$withGroups
		);
		$tagData = $tagList->xpath(
			"//d:prop//oc:display-name[text() ='$tagDisplayName']/.."
		);
		self::assertArrayHasKey(
			0,
			$tagData,
			"cannot find 'oc:display-name' property with text '$tagDisplayName'"
		);
		return $tagData[0];
	}

	/**
	 *
	 * @param string|null $baseUrl see: self::makeDavRequest()
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $name
	 * @param string|null $xRequestId
	 * @param string|null $userVisible "true", "1" or "false", "0"
	 * @param string|null $userAssignable "true", "1" or "false", "0"
	 * @param string|null $userEditable "true", "1" or "false", "0"
	 * @param string|null $groups separated by "|"
	 * @param int|null $davPathVersionToUse (1|2)
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 * @link self::makeDavRequest()
	 */
	public static function createTag(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $name,
		?string $xRequestId = '',
		?string $userVisible = "true",
		?string $userAssignable = "true",
		?string $userEditable = "false",
		?string $groups = null,
		?int $davPathVersionToUse = 2
	):ResponseInterface {
		$tagsPath = '/systemtags/';
		$body = [
			'name' => $name,
			'userVisible' => $userVisible,
			'userAssignable' => $userAssignable,
			'userEditable' => $userEditable
		];

		if ($groups !== null) {
			$body['groups'] = $groups;
		}

		return WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"POST",
			$tagsPath,
			['Content-Type' => 'application/json',],
			$xRequestId,
			\json_encode($body, JSON_THROW_ON_ERROR),
			$davPathVersionToUse,
			"systemtags"
		);
	}

	/**
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param int|null $tagID
	 * @param string|null $xRequestId
	 * @param int|null $davPathVersionToUse (1|2)
	 *
	 * @return ResponseInterface
	 * @throws GuzzleException
	 */
	public static function deleteTag(
		?string $baseUrl,
		?string $user,
		?string $password,
		?int $tagID,
		?string $xRequestId = '',
		?int $davPathVersionToUse = 1
	):ResponseInterface {
		$tagsPath = '/systemtags/' . $tagID;
		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"DELETE",
			$tagsPath,
			[],
			$xRequestId,
			null,
			$davPathVersionToUse,
			"systemtags"
		);
		return $response;
	}

	/**
	 * Validate the keyword(s) used for the type of tag
	 * Tags can be "normal", "not user-assignable", "not user-visible" or "static"
	 * That determines the tag attributes which are set when creating the tag.
	 *
	 * When creating the tag, the attributes can be enabled/disabled by specifying
	 * either "true"/"false" or "1"/"0" in the request. Choose this "request style"
	 * by passing the $useTrueFalseStrings parameter.
	 *
	 * @param string|null $type
	 * @param boolean $useTrueFalseStrings use the strings "true"/"false" else "1"/"0"
	 *
	 * @return string[]
	 * @throws Exception
	 */
	public static function validateTypeOfTag(?string $type, ?bool $useTrueFalseStrings = true):array {
		if ($useTrueFalseStrings) {
			$trueValue = "true";
			$falseValue = "false";
		} else {
			$trueValue = "1";
			$falseValue = "0";
		}
		$userVisible = $trueValue;
		$userAssignable = $trueValue;
		$userEditable = $trueValue;
		switch ($type) {
			case 'normal':
				break;
			case 'not user-assignable':
				$userAssignable = $falseValue;
				break;
			case 'not user-visible':
				$userVisible = $falseValue;
				break;
			case 'static':
				$userEditable = $falseValue;
				break;
			default:
				throw new Exception('Unsupported type');
		}

		return [$userVisible, $userAssignable, $userEditable];
	}
}
