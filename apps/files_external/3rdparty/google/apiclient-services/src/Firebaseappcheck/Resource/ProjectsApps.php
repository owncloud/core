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

namespace Google\Service\Firebaseappcheck\Resource;

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1AppCheckToken;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeAppAttestAssertionRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeCustomTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeDebugTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeDeviceCheckTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangePlayIntegrityTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeRecaptchaEnterpriseTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeRecaptchaV3TokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ExchangeSafetyNetTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1GenerateAppAttestChallengeRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1GenerateAppAttestChallengeResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1GeneratePlayIntegrityChallengeRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1GeneratePlayIntegrityChallengeResponse;

/**
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $apps = $firebaseappcheckService->apps;
 *  </code>
 */
class ProjectsApps extends \Google\Service\Resource
{
  /**
   * Accepts an App Attest assertion and an artifact previously obtained from
   * ExchangeAppAttestAttestation and verifies those with Apple. If valid, returns
   * an AppCheckToken. (apps.exchangeAppAttestAssertion)
   *
   * @param string $app Required. The relative resource name of the iOS app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeAppAttestAssertionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeAppAttestAssertion($app, GoogleFirebaseAppcheckV1ExchangeAppAttestAssertionRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeAppAttestAssertion', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Accepts an App Attest CBOR attestation and verifies it with Apple using your
   * preconfigured team and bundle IDs. If valid, returns an attestation artifact
   * that can later be exchanged for an AppCheckToken using
   * ExchangeAppAttestAssertion. For convenience and performance, this method's
   * response object will also contain an AppCheckToken (if the verification is
   * successful). (apps.exchangeAppAttestAttestation)
   *
   * @param string $app Required. The relative resource name of the iOS app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationResponse
   */
  public function exchangeAppAttestAttestation($app, GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeAppAttestAttestation', [$params], GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationResponse::class);
  }
  /**
   * Validates a custom token signed using your project's Admin SDK service
   * account credentials. If valid, returns an AppCheckToken.
   * (apps.exchangeCustomToken)
   *
   * @param string $app Required. The relative resource name of the app, in the
   * format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeCustomTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeCustomToken($app, GoogleFirebaseAppcheckV1ExchangeCustomTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeCustomToken', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Validates a debug token secret that you have previously created using
   * CreateDebugToken. If valid, returns an AppCheckToken. Note that a restrictive
   * quota is enforced on this method to prevent accidental exposure of the app to
   * abuse. (apps.exchangeDebugToken)
   *
   * @param string $app Required. The relative resource name of the app, in the
   * format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeDebugTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeDebugToken($app, GoogleFirebaseAppcheckV1ExchangeDebugTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeDebugToken', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Accepts a [`device_token`](https://developer.apple.com/documentation/devicech
   * eck/dcdevice) issued by DeviceCheck, and attempts to validate it with Apple.
   * If valid, returns an AppCheckToken. (apps.exchangeDeviceCheckToken)
   *
   * @param string $app Required. The relative resource name of the iOS app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeDeviceCheckTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeDeviceCheckToken($app, GoogleFirebaseAppcheckV1ExchangeDeviceCheckTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeDeviceCheckToken', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Validates an [integrity verdict response token from Play
   * Integrity](https://developer.android.com/google/play/integrity/verdict
   * #decrypt-verify). If valid, returns an AppCheckToken.
   * (apps.exchangePlayIntegrityToken)
   *
   * @param string $app Required. The relative resource name of the Android app,
   * in the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary,
   * the `project_number` element can be replaced with the project ID of the
   * Firebase project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangePlayIntegrityTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangePlayIntegrityToken($app, GoogleFirebaseAppcheckV1ExchangePlayIntegrityTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangePlayIntegrityToken', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Validates a [reCAPTCHA Enterprise response token](https://cloud.google.com
   * /recaptcha-enterprise/docs/create-assessment#retrieve_token). If valid,
   * returns an AppCheckToken. (apps.exchangeRecaptchaEnterpriseToken)
   *
   * @param string $app Required. The relative resource name of the web app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeRecaptchaEnterpriseTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeRecaptchaEnterpriseToken($app, GoogleFirebaseAppcheckV1ExchangeRecaptchaEnterpriseTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeRecaptchaEnterpriseToken', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Validates a [reCAPTCHA v3 response
   * token](https://developers.google.com/recaptcha/docs/v3). If valid, returns an
   * AppCheckToken. (apps.exchangeRecaptchaV3Token)
   *
   * @param string $app Required. The relative resource name of the web app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeRecaptchaV3TokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeRecaptchaV3Token($app, GoogleFirebaseAppcheckV1ExchangeRecaptchaV3TokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeRecaptchaV3Token', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Validates a [SafetyNet
   * token](https://developer.android.com/training/safetynet/attestation#request-
   * attestation-step). If valid, returns an AppCheckToken.
   * (apps.exchangeSafetyNetToken)
   *
   * @param string $app Required. The relative resource name of the Android app,
   * in the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary,
   * the `project_number` element can be replaced with the project ID of the
   * Firebase project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1ExchangeSafetyNetTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function exchangeSafetyNetToken($app, GoogleFirebaseAppcheckV1ExchangeSafetyNetTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeSafetyNetToken', [$params], GoogleFirebaseAppcheckV1AppCheckToken::class);
  }
  /**
   * Generates a challenge that protects the integrity of an immediately following
   * call to ExchangeAppAttestAttestation or ExchangeAppAttestAssertion. A
   * challenge should not be reused for multiple calls.
   * (apps.generateAppAttestChallenge)
   *
   * @param string $app Required. The relative resource name of the iOS app, in
   * the format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1GenerateAppAttestChallengeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1GenerateAppAttestChallengeResponse
   */
  public function generateAppAttestChallenge($app, GoogleFirebaseAppcheckV1GenerateAppAttestChallengeRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateAppAttestChallenge', [$params], GoogleFirebaseAppcheckV1GenerateAppAttestChallengeResponse::class);
  }
  /**
   * Generates a challenge that protects the integrity of an immediately following
   * integrity verdict request to the Play Integrity API. The next call to
   * ExchangePlayIntegrityToken using the resulting integrity token will verify
   * the presence and validity of the challenge. A challenge should not be reused
   * for multiple calls. (apps.generatePlayIntegrityChallenge)
   *
   * @param string $app Required. The relative resource name of the app, in the
   * format: ``` projects/{project_number}/apps/{app_id} ``` If necessary, the
   * `project_number` element can be replaced with the project ID of the Firebase
   * project. Learn more about using project identifiers in Google's [AIP
   * 2510](https://google.aip.dev/cloud/2510) standard.
   * @param GoogleFirebaseAppcheckV1GeneratePlayIntegrityChallengeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1GeneratePlayIntegrityChallengeResponse
   */
  public function generatePlayIntegrityChallenge($app, GoogleFirebaseAppcheckV1GeneratePlayIntegrityChallengeRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generatePlayIntegrityChallenge', [$params], GoogleFirebaseAppcheckV1GeneratePlayIntegrityChallengeResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsApps::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsApps');
