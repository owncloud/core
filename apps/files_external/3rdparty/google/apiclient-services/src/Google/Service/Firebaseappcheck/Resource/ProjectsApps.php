<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google_Service_Firebaseappcheck(...);
 *   $apps = $firebaseappcheckService->apps;
 *  </code>
 */
class Google_Service_Firebaseappcheck_Resource_ProjectsApps extends Google_Service_Resource
{
  /**
   * Validates a custom token signed using your project's Admin SDK service
   * account credentials. If valid, returns an App Check token encapsulated in an
   * AttestationTokenResponse. (apps.exchangeCustomToken)
   *
   * @param string $app Required. The relative resource name of the app, in the
   * format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeCustomTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeCustomToken($app, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeCustomTokenRequest $postBody, $optParams = array())
  {
    $params = array('app' => $app, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exchangeCustomToken', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse");
  }
  /**
   * Validates a debug token secret that you have previously created using
   * CreateDebugToken. If valid, returns an App Check token encapsulated in an
   * AttestationTokenResponse. Note that a restrictive quota is enforced on this
   * method to prevent accidental exposure of the app to abuse.
   * (apps.exchangeDebugToken)
   *
   * @param string $app Required. The relative resource name of the app, in the
   * format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeDebugTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeDebugToken($app, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeDebugTokenRequest $postBody, $optParams = array())
  {
    $params = array('app' => $app, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exchangeDebugToken', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse");
  }
  /**
   * Accepts a [`device_token`](https://developer.apple.com/documentation/devicech
   * eck/dcdevice) issued by DeviceCheck, and attempts to validate it with Apple.
   * If valid, returns an App Check token encapsulated in an
   * AttestationTokenResponse. (apps.exchangeDeviceCheckToken)
   *
   * @param string $app Required. The relative resource name of the iOS app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeDeviceCheckTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeDeviceCheckToken($app, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeDeviceCheckTokenRequest $postBody, $optParams = array())
  {
    $params = array('app' => $app, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exchangeDeviceCheckToken', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse");
  }
  /**
   * Validates a [reCAPTCHA v3 response
   * token](https://developers.google.com/recaptcha/docs/v3). If valid, returns an
   * App Check token encapsulated in an AttestationTokenResponse.
   * (apps.exchangeRecaptchaToken)
   *
   * @param string $app Required. The relative resource name of the web app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeRecaptchaTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeRecaptchaToken($app, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeRecaptchaTokenRequest $postBody, $optParams = array())
  {
    $params = array('app' => $app, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exchangeRecaptchaToken', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse");
  }
  /**
   * Validates a [SafetyNet
   * token](https://developer.android.com/training/safetynet/attestation#request-
   * attestation-step). If valid, returns an App Check token encapsulated in an
   * AttestationTokenResponse. (apps.exchangeSafetyNetToken)
   *
   * @param string $app Required. The relative resource name of the Android app,
   * in the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary,
   * the `project_number` element can be replaced with the project ID of the
   * Firebase project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeSafetyNetTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeSafetyNetToken($app, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeSafetyNetTokenRequest $postBody, $optParams = array())
  {
    $params = array('app' => $app, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('exchangeSafetyNetToken', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaAttestationTokenResponse");
  }
}
