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
 * Service definition for CloudSecurityToken (v1).
 *
 * <p>
 * The Security Token Service exchanges Google or third-party credentials for a
 * short-lived access token to Google Cloud resources.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://cloud.google.com/iam/docs/workload-identity-federation" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudSecurityToken extends \Google\Service
{


  public $v1;

  /**
   * Constructs the internal representation of the CloudSecurityToken service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://sts.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'sts';

    $this->v1 = new CloudSecurityToken\Resource\V1(
        $this,
        $this->serviceName,
        'v1',
        [
          'methods' => [
            'introspect' => [
              'path' => 'v1/introspect',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'token' => [
              'path' => 'v1/token',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudSecurityToken::class, 'Google_Service_CloudSecurityToken');
