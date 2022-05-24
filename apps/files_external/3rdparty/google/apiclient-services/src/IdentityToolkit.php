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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for IdentityToolkit (v3).
 *
 * <p>
 * Help the third party sites to implement federated login.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/identity-toolkit/v3/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class IdentityToolkit extends \Google\Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and administer all your Firebase data and settings. */
  const FIREBASE =
      "https://www.googleapis.com/auth/firebase";

  public $relyingparty;

  /**
   * Constructs the internal representation of the IdentityToolkit service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'identitytoolkit/v3/relyingparty/';
    $this->batchPath = 'batch/identitytoolkit/v3';
    $this->version = 'v3';
    $this->serviceName = 'identitytoolkit';

    $this->relyingparty = new IdentityToolkit\Resource\Relyingparty(
        $this,
        $this->serviceName,
        'relyingparty',
        [
          'methods' => [
            'createAuthUri' => [
              'path' => 'createAuthUri',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'deleteAccount' => [
              'path' => 'deleteAccount',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'downloadAccount' => [
              'path' => 'downloadAccount',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'emailLinkSignin' => [
              'path' => 'emailLinkSignin',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'getAccountInfo' => [
              'path' => 'getAccountInfo',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'getOobConfirmationCode' => [
              'path' => 'getOobConfirmationCode',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'getProjectConfig' => [
              'path' => 'getProjectConfig',
              'httpMethod' => 'GET',
              'parameters' => [
                'delegatedProjectNumber' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectNumber' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getPublicKeys' => [
              'path' => 'publicKeys',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'getRecaptchaParam' => [
              'path' => 'getRecaptchaParam',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'resetPassword' => [
              'path' => 'resetPassword',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'sendVerificationCode' => [
              'path' => 'sendVerificationCode',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'setAccountInfo' => [
              'path' => 'setAccountInfo',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'setProjectConfig' => [
              'path' => 'setProjectConfig',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'signOutUser' => [
              'path' => 'signOutUser',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'signupNewUser' => [
              'path' => 'signupNewUser',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'uploadAccount' => [
              'path' => 'uploadAccount',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'verifyAssertion' => [
              'path' => 'verifyAssertion',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'verifyCustomToken' => [
              'path' => 'verifyCustomToken',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'verifyPassword' => [
              'path' => 'verifyPassword',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'verifyPhoneNumber' => [
              'path' => 'verifyPhoneNumber',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentityToolkit::class, 'Google_Service_IdentityToolkit');
