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

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaAppAttestChallengeResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaAttestationTokenResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeAppAttestAssertionRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeAppAttestAttestationRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeAppAttestAttestationResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeCustomTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeDebugTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeDeviceCheckTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeRecaptchaTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaExchangeSafetyNetTokenRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaGenerateAppAttestChallengeRequest;

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
   * Accepts a AppAttest Artifact and Assertion, and uses the developer's
   * preconfigured auth token to verify the token with Apple. Returns an
   * AttestationToken with the App ID as specified by the `app` field included as
   * attested claims. (apps.exchangeAppAttestAssertion)
   *
   * @param string $app Required. The full resource name to the iOS App. Format:
   * "projects/{project_id}/apps/{app_id}"
   * @param GoogleFirebaseAppcheckV1betaExchangeAppAttestAssertionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeAppAttestAssertion($app, GoogleFirebaseAppcheckV1betaExchangeAppAttestAssertionRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeAppAttestAssertion', [$params], GoogleFirebaseAppcheckV1betaAttestationTokenResponse::class);
  }
  /**
   * Accepts a AppAttest CBOR Attestation, and uses the developer's preconfigured
   * team and bundle IDs to verify the token with Apple. Returns an Attestation
   * Artifact that can later be exchanged for an AttestationToken in
   * ExchangeAppAttestAssertion. (apps.exchangeAppAttestAttestation)
   *
   * @param string $app Required. The full resource name to the iOS App. Format:
   * "projects/{project_id}/apps/{app_id}"
   * @param GoogleFirebaseAppcheckV1betaExchangeAppAttestAttestationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaExchangeAppAttestAttestationResponse
   */
  public function exchangeAppAttestAttestation($app, GoogleFirebaseAppcheckV1betaExchangeAppAttestAttestationRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeAppAttestAttestation', [$params], GoogleFirebaseAppcheckV1betaExchangeAppAttestAttestationResponse::class);
  }
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
   * @param GoogleFirebaseAppcheckV1betaExchangeCustomTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeCustomToken($app, GoogleFirebaseAppcheckV1betaExchangeCustomTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeCustomToken', [$params], GoogleFirebaseAppcheckV1betaAttestationTokenResponse::class);
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
   * @param GoogleFirebaseAppcheckV1betaExchangeDebugTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeDebugToken($app, GoogleFirebaseAppcheckV1betaExchangeDebugTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeDebugToken', [$params], GoogleFirebaseAppcheckV1betaAttestationTokenResponse::class);
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
   * @param GoogleFirebaseAppcheckV1betaExchangeDeviceCheckTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeDeviceCheckToken($app, GoogleFirebaseAppcheckV1betaExchangeDeviceCheckTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeDeviceCheckToken', [$params], GoogleFirebaseAppcheckV1betaAttestationTokenResponse::class);
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
   * @param GoogleFirebaseAppcheckV1betaExchangeRecaptchaTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeRecaptchaToken($app, GoogleFirebaseAppcheckV1betaExchangeRecaptchaTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeRecaptchaToken', [$params], GoogleFirebaseAppcheckV1betaAttestationTokenResponse::class);
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
   * @param GoogleFirebaseAppcheckV1betaExchangeSafetyNetTokenRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAttestationTokenResponse
   */
  public function exchangeSafetyNetToken($app, GoogleFirebaseAppcheckV1betaExchangeSafetyNetTokenRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('exchangeSafetyNetToken', [$params], GoogleFirebaseAppcheckV1betaAttestationTokenResponse::class);
  }
  /**
   * Initiates the App Attest flow by generating a challenge which will be used as
   * a type of nonce for this attestation. (apps.generateAppAttestChallenge)
   *
   * @param string $app Required. The full resource name to the iOS App. Format:
   * "projects/{project_id}/apps/{app_id}"
   * @param GoogleFirebaseAppcheckV1betaGenerateAppAttestChallengeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaAppAttestChallengeResponse
   */
  public function generateAppAttestChallenge($app, GoogleFirebaseAppcheckV1betaGenerateAppAttestChallengeRequest $postBody, $optParams = [])
  {
    $params = ['app' => $app, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateAppAttestChallenge', [$params], GoogleFirebaseAppcheckV1betaAppAttestChallengeResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsApps::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsApps');
