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
 * Service definition for IAMCredentials (v1).
 *
 * <p>
 * Creates short-lived credentials for impersonating IAM service accounts. To
 * enable this API, you must enable the IAM API (iam.googleapis.com).</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/iam/docs/creating-short-lived-service-account-credentials" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class IAMCredentials extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_serviceAccounts;

  /**
   * Constructs the internal representation of the IAMCredentials service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://iamcredentials.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'iamcredentials';

    $this->projects_serviceAccounts = new IAMCredentials\Resource\ProjectsServiceAccounts(
        $this,
        $this->serviceName,
        'serviceAccounts',
        [
          'methods' => [
            'generateAccessToken' => [
              'path' => 'v1/{+name}:generateAccessToken',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateIdToken' => [
              'path' => 'v1/{+name}:generateIdToken',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'signBlob' => [
              'path' => 'v1/{+name}:signBlob',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'signJwt' => [
              'path' => 'v1/{+name}:signJwt',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IAMCredentials::class, 'Google_Service_IAMCredentials');
