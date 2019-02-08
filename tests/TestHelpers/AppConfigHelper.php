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

use GuzzleHttp\Message\ResponseInterface;
use PHPUnit_Framework_Assert;

/**
 * Helper to set various configurations through the testing app
 *
 * @author Artur Neumann <artur@jankaritech.com>
 */
class AppConfigHelper {
	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesParameter the parameter name in the
	 *                                      capabilities response
	 * @param string $testingApp the "app" name as understood by "testing"
	 * @param string $testingParameter the parameter name as understood by
	 *                                 "testing"
	 * @param boolean $testingState the on|off state the parameter must be set to for the test
	 * @param string $savedCapabilitiesXml the original capabilities in XML format
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return array of the original state of the capability set
	 */
	public static function setCapability(
		$baseUrl,
		$user,
		$password,
		$capabilitiesApp,
		$capabilitiesParameter,
		$testingApp,
		$testingParameter,
		$testingState,
		$savedCapabilitiesXml,
		$ocsApiVersion = 1
	) {
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
			$ocsApiVersion
		);
		
		return [
			'appid' => $testingApp,
			'configkey' => $testingParameter,
			'value' => $originalState ? 'yes' : 'no'
		];
	}
	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param array $capabilitiesArray with each array entry containing keys for:
	 *                                 ['capabilitiesApp'] the "app" name in the capabilities response
	 *                                 ['capabilitiesParameter'] the parameter name in the capabilities response
	 *                                 ['testingApp'] the "app" name as understood by "testing"
	 *                                 ['testingParameter'] the parameter name as understood by "testing"
	 *                                 ['testingState'] boolean|string that the parameter must be set to for the test
	 * @param string $savedCapabilitiesXml the original capabilities in XML format
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return array of the original state of each capability set
	 */
	public static function setCapabilities(
		$baseUrl,
		$user,
		$password,
		$capabilitiesArray,
		$savedCapabilitiesXml,
		$ocsApiVersion = 1
	) {
		$appParameterValues = [];
		$originalCapabilities = [];

		if (\is_array($capabilitiesArray)) {
			foreach ($capabilitiesArray as $capabilityToSet) {
				$originalState = self::wasCapabilitySet(
					$capabilityToSet['capabilitiesApp'],
					$capabilityToSet['capabilitiesParameter'],
					$savedCapabilitiesXml
				);

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

				// Remember the original state of all capabilities touched
				// because tests might change the state, even if the state
				// was already as desired in this setup phase.
				// So we will need to reset all to their original state at the
				// end of the scenario, just to be sure.
				$originalCapabilities[] = [
					'appid' => $capabilityToSet['testingApp'],
					'configkey' => $capabilityToSet['testingParameter'],
					'value' => $originalState ? 'yes' : 'no'
				];
			}
		}

		self::modifyAppConfigs(
			$baseUrl,
			$user,
			$password,
			$appParameterValues,
			$ocsApiVersion
		);

		return $originalCapabilities;
	}

	/**
	 * @param string $xml of the capabilities
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesPath the path to the element
	 *
	 * @return string
	 */
	public static function getParameterValueFromXml(
		$xml, $capabilitiesApp, $capabilitiesPath
	) {
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
	 * @param string $capabilitiesApp the "app" name in the capabilities response
	 * @param string $capabilitiesParameter the parameter name in the
	 *                                      capabilities response
	 * @param string $savedCapabilitiesXml the original capabilities in XML format
	 *
	 * @return boolean
	 */
	public static function wasCapabilitySet(
		$capabilitiesApp, $capabilitiesParameter, $savedCapabilitiesXml
	) {
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
	 * @param ResponseInterface $response
	 *
	 * @return string
	 */
	public static function getOCSResponse($response) {
		return HttpRequestHelper::getResponseXml($response)->meta[0]->statuscode;
	}

	/**
	 * retrieve the capabilities
	 *
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 *
	 * @return ResponseInterface
	 */
	public static function getCapabilities($baseUrl, $user, $password) {
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'GET',
			'/cloud/capabilities',
			null
		);
		PHPUnit_Framework_Assert::assertEquals(200, $response->getStatusCode());
		return $response;
	}

	/**
	 * @param ResponseInterface $response
	 *
	 * @return string retrieved capabilities in XML format
	 */
	public static function getCapabilitiesXml($response) {
		return HttpRequestHelper::getResponseXml($response)->data->capabilities;
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $app
	 * @param string $parameter
	 * @param string $value
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return void
	 */
	public static function modifyAppConfig(
		$baseUrl,
		$user,
		$password, $app, $parameter, $value, $ocsApiVersion = 2
	) {
		$body = ['value' => $value];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'post',
			"/apps/testing/api/v1/app/{$app}/{$parameter}",
			$body,
			$ocsApiVersion
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
		if ($ocsApiVersion === 1) {
			PHPUnit_Framework_Assert::assertEquals(
				"100", self::getOCSResponse($response)
			);
		}
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param array $appParameterValues 'appid' 'configkey' and 'value'
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return void
	 */
	public static function modifyAppConfigs(
		$baseUrl,
		$user,
		$password, $appParameterValues, $ocsApiVersion = 2
	) {
		$body = ['values' => $appParameterValues];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'post',
			"/apps/testing/api/v1/apps",
			$body,
			$ocsApiVersion
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
		if ($ocsApiVersion === 1) {
			PHPUnit_Framework_Assert::assertEquals(
				"100", self::getOCSResponse($response)
			);
		}
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $app
	 * @param string $parameter
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return void
	 */
	public static function deleteAppConfig(
		$baseUrl, $user, $password, $app, $parameter, $ocsApiVersion = 2
	) {
		$body = [];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'delete',
			"/apps/testing/api/v1/app/{$app}/{$parameter}",
			$body,
			$ocsApiVersion
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
		if ($ocsApiVersion === 1) {
			PHPUnit_Framework_Assert::assertEquals(
				"100", self::getOCSResponse($response)
			);
		}
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param array $appParameterValues 'appid' and 'configkey' to delete
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return void
	 */
	public static function deleteAppConfigs(
		$baseUrl, $user, $password, $appParameterValues, $ocsApiVersion = 2
	) {
		$body = ['values' => $appParameterValues];
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'delete',
			"/apps/testing/api/v1/apps",
			$body,
			$ocsApiVersion
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
		if ($ocsApiVersion === 1) {
			PHPUnit_Framework_Assert::assertEquals(
				"100", self::getOCSResponse($response)
			);
		}
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $app
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return array with 'configkey', 'value' and 'appid'
	 */
	public static function getAppConfigs(
		$baseUrl, $user, $password, $app, $ocsApiVersion = 2
	) {
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'get',
			"/apps/testing/api/v1/app/{$app}",
			null,
			$ocsApiVersion
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
		if ($ocsApiVersion === 1) {
			PHPUnit_Framework_Assert::assertEquals(
				"100", self::getOCSResponse($response)
			);
		}
			
		$responseXml = HttpRequestHelper::getResponseXml($response)->data[0];
		$response = \json_decode(\json_encode($responseXml), true)['element'];
		return $response;
	}

	/**
	 * @param string $baseUrl
	 * @param string $user
	 * @param string $password
	 * @param string $app
	 * @param string $parameter
	 * @param int $ocsApiVersion (1|2)
	 *
	 * @return array with 'configkey', 'value' and 'appid'
	 */
	public static function getAppConfig(
		$baseUrl, $user, $password, $app, $parameter, $ocsApiVersion = 2
	) {
		$response = OcsApiHelper::sendRequest(
			$baseUrl,
			$user,
			$password,
			'get',
			"/apps/testing/api/v1/app/{$app}/{$parameter}",
			null,
			$ocsApiVersion
		);
		PHPUnit_Framework_Assert::assertEquals("200", $response->getStatusCode());
		if ($ocsApiVersion === 1) {
			PHPUnit_Framework_Assert::assertEquals(
				"100", self::getOCSResponse($response)
			);
		}

		$responseXml = HttpRequestHelper::getResponseXml($response)->data[0];
		$response = \json_decode(\json_encode($responseXml), true)['element'];
		return $response;
	}
}
