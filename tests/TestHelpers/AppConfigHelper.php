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
use Psr\Http\Message\ResponseInterface;

/**
 * Helper to set various configurations through the testing app
 *
 * @author Artur Neumann <artur@jankaritech.com>
 */
class AppConfigHelper extends \PHPUnit\Framework\Assert {
	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $capabilitiesApp the "app" name in the capabilities response
	 * @param string|null $capabilitiesParameter the parameter name in the
	 *                                           capabilities response
	 * @param string|null $testingApp the "app" name as understood by "testing"
	 * @param string|null $testingParameter the parameter name as understood by
	 *                                      "testing"
	 * @param boolean $testingState the on|off state the parameter must be set to for the test
	 * @param string|null $savedCapabilitiesXml the original capabilities in XML format
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return array of the original state of the capability set
	 * @throws Exception
	 */
	public static function setCapability(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $capabilitiesApp,
		?string $capabilitiesParameter,
		?string $testingApp,
		?string $testingParameter,
		?bool $testingState,
		$savedCapabilitiesXml,
		?string $xRequestId = '',
		?int $ocsApiVersion = 1
	):array {
		$originalState = self::wasCapabilitySet(
			$capabilitiesApp,
			$capabilitiesParameter,
			$savedCapabilitiesXml
		);

		// Always set the config value, because sometimes enabling one config
		// also changes some sub-settings. So the "interim" state as we set
		// the config values could be unexpectedly different from the original
		// saved state.
		self::modifyAppConfig(
			$baseUrl,
			$user,
			$password,
			$testingApp,
			$testingParameter,
			$testingState ? 'yes' : 'no',
			$xRequestId,
			$ocsApiVersion
		);

		return [
			'appid' => $testingApp,
			'configkey' => $testingParameter,
			'value' => $originalState ? 'yes' : 'no'
		];
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $capabilitiesArray with each array entry containing keys for:
	 *                                      ['capabilitiesApp'] the "app" name in the capabilities response
	 *                                 		['capabilitiesParameter'] the parameter name in the capabilities response
	 *                                 		['testingApp'] the "app" name as understood by "testing"
	 *                                 		['testingParameter'] the parameter name as understood by "testing"
	 *                                 		['testingState'] boolean|string that the parameter must be set to for the test
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return void of the original state of each capability set
	 * @throws Exception
	 */
	public static function setCapabilities(
		?string $baseUrl,
		?string $user,
		?string $password,
		?array $capabilitiesArray,
		?string $xRequestId = '',
		?int $ocsApiVersion = 1
	):void {
		$appParameterValues = [];

		if (\is_array($capabilitiesArray)) {
			foreach ($capabilitiesArray as $capabilityToSet) {
				if (\is_bool($capabilityToSet['testingState'])) {
					$testingState = $capabilityToSet['testingState'] ? 'yes' : 'no';
				} else {
					$testingState = $capabilityToSet['testingState'];
				}

				// Always set each config value, because sometimes enabling one
				// config also changes some sub-settings. So the "interim" state
				// as we set the config values could be unexpectedly different
				// from the original saved state.
				$appParameterValues[] = [
					'appid' => $capabilityToSet['testingApp'],
					'configkey' => $capabilityToSet['testingParameter'],
					'value' => $testingState
				];
			}
		}

		self::modifyAppConfigs(
			$baseUrl,
			$user,
			$password,
			$appParameterValues,
			$xRequestId,
			$ocsApiVersion
		);
	}

	/**
	 * @param string|null $xml of the capabilities
	 * @param string|null $capabilitiesApp the "app" name in the capabilities response
	 * @param string|null $capabilitiesPath the path to the element
	 *
	 * @return string
	 */
	public static function getParameterValueFromXml(
		$xml,
		$capabilitiesApp,
		?string $capabilitiesPath
	):string {
		$pathToElement = \explode('@@@', $capabilitiesPath);
		$answeredValue = $xml->{$capabilitiesApp};
		for ($i = 0; $i < \count($pathToElement); $i++) {
			if (\gettype($answeredValue) === "object") {
				$answeredValue = $answeredValue->{$pathToElement[$i]};
			}
		}
		return (string)$answeredValue;
	}

	/**
	 * @param string|null $capabilitiesApp the "app" name in the capabilities response
	 * @param string|null $capabilitiesParameter the parameter name in the
	 *                                           capabilities response
	 * @param string|null $savedCapabilitiesXml the original capabilities in XML format
	 *
	 * @return boolean
	 */
	public static function wasCapabilitySet(
		?string $capabilitiesApp,
		?string $capabilitiesParameter,
		$savedCapabilitiesXml
	):bool {
		return (bool) self::getParameterValueFromXml(
			$savedCapabilitiesXml,
			$capabilitiesApp,
			$capabilitiesParameter
		);
	}

	/**
	 * Parses the xml answer to get ocs response which doesn't match with
	 * http one in v1 of the api.
	 *
	 * @param ResponseInterface|null $response
	 *
	 * @return \SimpleXMLElement
	 * @throws Exception
	 */
	public static function getOCSResponse(?ResponseInterface $response):\SimpleXMLElement {
		return HttpRequestHelper::getResponseXml($response, __METHOD__)->meta[0]->statuscode;
	}

	/**
	 * retrieve the capabilities
	 *
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $xRequestId
	 *
	 * @return ResponseInterface
	 */
	public static function getCapabilities(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $xRequestId = ''
	):ResponseInterface {
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'GET',
			'/cloud/capabilities',
			$xRequestId,
			null
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		return $response;
	}

	/**
	 * @param ResponseInterface|null $response
	 *
	 * @return \SimpleXMLElement retrieved capabilities in XML format
	 * @throws Exception
	 */
	public static function getCapabilitiesXml(?ResponseInterface $response):\SimpleXMLElement {
		return HttpRequestHelper::getResponseXml($response, __METHOD__)->data->capabilities;
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $app
	 * @param string|null $parameter
	 * @param string|null $value
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function modifyAppConfig(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $app,
		?string $parameter,
		?string $value,
		?string $xRequestId = '',
		?int $ocsApiVersion = 2
	):void {
		$body = ['value' => $value];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'post',
			"/apps/testing/api/v1/app/{$app}/{$parameter}",
			$xRequestId,
			$body,
			$ocsApiVersion
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		if ($ocsApiVersion === 1) {
			$expectedOcsStatus = "100";
			$actualOcsStatus = self::getOCSResponse($response);
			self::assertEquals(
				$expectedOcsStatus,
				$actualOcsStatus,
				__METHOD__ . " expected OCS status $expectedOcsStatus but got $actualOcsStatus"
			);
		}
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $appParameterValues 'appid' 'configkey' and 'value'
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function modifyAppConfigs(
		?string $baseUrl,
		?string $user,
		?string $password,
		?array 	$appParameterValues,
		?string $xRequestId = '',
		?int $ocsApiVersion = 2
	):void {
		if (\is_array($appParameterValues)) {
			foreach ($appParameterValues as $key => $value) {
				if (isset($value['value']) && \is_array($value['value'])) {
					$appParameterValues[$key]['value'] = \implode("", $appParameterValues[$key]['value']);
				}
			}
		}
		$body = ['values' => $appParameterValues];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'post',
			"/apps/testing/api/v1/apps",
			$xRequestId,
			$body,
			$ocsApiVersion
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		if ($ocsApiVersion === 1) {
			$expectedOcsStatus = "100";
			$actualOcsStatus = self::getOCSResponse($response);
			self::assertEquals(
				$expectedOcsStatus,
				$actualOcsStatus,
				__METHOD__ . " expected OCS status $expectedOcsStatus but got $actualOcsStatus"
			);
		}
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $app
	 * @param string|null $parameter
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function deleteAppConfig(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $app,
		?string $parameter,
		?string $xRequestId = '',
		?int $ocsApiVersion = 2
	) {
		$body = [];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'delete',
			"/apps/testing/api/v1/app/{$app}/{$parameter}",
			$xRequestId,
			$body,
			$ocsApiVersion
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		if ($ocsApiVersion === 1) {
			$expectedOcsStatus = "100";
			$actualOcsStatus = self::getOCSResponse($response);
			self::assertEquals(
				$expectedOcsStatus,
				$actualOcsStatus,
				__METHOD__ . " expected OCS status $expectedOcsStatus but got $actualOcsStatus"
			);
		}
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param array|null $appParameterValues 'appid' and 'configkey' to delete
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function deleteAppConfigs(
		?string $baseUrl,
		?string $user,
		?string $password,
		?array $appParameterValues,
		?string $xRequestId = '',
		?int $ocsApiVersion = 2
	):void {
		$body = ['values' => $appParameterValues];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'delete',
			"/apps/testing/api/v1/apps",
			$xRequestId,
			$body,
			$ocsApiVersion
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		if ($ocsApiVersion === 1) {
			$expectedOcsStatus = "100";
			$actualOcsStatus = self::getOCSResponse($response);
			self::assertEquals(
				$expectedOcsStatus,
				$actualOcsStatus,
				__METHOD__ . " expected OCS status $expectedOcsStatus but got $actualOcsStatus"
			);
		}
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $app
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return array with 'configkey', 'value' and 'appid'
	 * @throws Exception
	 */
	public static function getAppConfigs(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $app,
		?string $xRequestId = '',
		?int $ocsApiVersion = 2
	):array {
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'get',
			"/apps/testing/api/v1/app/{$app}",
			$xRequestId,
			null,
			$ocsApiVersion
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		if ($ocsApiVersion === 1) {
			$expectedOcsStatus = "100";
			$actualOcsStatus = self::getOCSResponse($response);
			self::assertEquals(
				$expectedOcsStatus,
				$actualOcsStatus,
				__METHOD__ . " expected OCS status $expectedOcsStatus but got $actualOcsStatus"
			);
		}

		$responseXml = HttpRequestHelper::getResponseXml($response, __METHOD__)->data[0];
		$response = \json_decode(\json_encode($responseXml), true)['element'];
		return $response;
	}

	/**
	 * @param string|null $baseUrl
	 * @param string|null $user
	 * @param string|null $password
	 * @param string|null $app
	 * @param string|null $parameter
	 * @param string|null $xRequestId
	 * @param int|null $ocsApiVersion (1|2)
	 *
	 * @return array with 'configkey', 'value' and 'appid'
	 * @throws Exception
	 */
	public static function getAppConfig(
		?string $baseUrl,
		?string $user,
		?string $password,
		?string $app,
		?string $parameter,
		?string $xRequestId = '',
		?int $ocsApiVersion = 2
	):array {
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'get',
			"/apps/testing/api/v1/app/{$app}/{$parameter}",
			$xRequestId,
			null,
			$ocsApiVersion
		);

		$expectedHttpStatus = 200;
		$actualHttpStatus = $response->getStatusCode();

		self::assertEquals(
			$expectedHttpStatus,
			$actualHttpStatus,
			__METHOD__ . " expected HTTP status $expectedHttpStatus but got $actualHttpStatus"
		);
		if ($ocsApiVersion === 1) {
			$expectedOcsStatus = "100";
			$actualOcsStatus = self::getOCSResponse($response);
			self::assertEquals(
				$expectedOcsStatus,
				$actualOcsStatus,
				__METHOD__ . " expected OCS status $expectedOcsStatus but got $actualOcsStatus"
			);
		}

		$responseXml = HttpRequestHelper::getResponseXml($response, __METHOD__)->data[0];
		$response = \json_decode(\json_encode($responseXml), true)['element'];
		return $response;
	}
}
