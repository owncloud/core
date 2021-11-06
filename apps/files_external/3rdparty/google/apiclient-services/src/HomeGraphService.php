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
 * Service definition for HomeGraphService (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/actions/smarthome/create-app#request-sync" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class HomeGraphService extends \Google\Service
{
  /** Private Service: https://www.googleapis.com/auth/homegraph. */
  const HOMEGRAPH =
      "https://www.googleapis.com/auth/homegraph";

  public $agentUsers;
  public $devices;

  /**
   * Constructs the internal representation of the HomeGraphService service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://homegraph.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'homegraph';

    $this->agentUsers = new HomeGraphService\Resource\AgentUsers(
        $this,
        $this->serviceName,
        'agentUsers',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+agentUserId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'agentUserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->devices = new HomeGraphService\Resource\Devices(
        $this,
        $this->serviceName,
        'devices',
        [
          'methods' => [
            'query' => [
              'path' => 'v1/devices:query',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'reportStateAndNotification' => [
              'path' => 'v1/devices:reportStateAndNotification',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'requestSync' => [
              'path' => 'v1/devices:requestSync',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'sync' => [
              'path' => 'v1/devices:sync',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HomeGraphService::class, 'Google_Service_HomeGraphService');
