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
class Google_Service_HomeGraphService extends Google_Service
{
  /** New Service: https://www.googleapis.com/auth/homegraph. */
  const HOMEGRAPH =
      "https://www.googleapis.com/auth/homegraph";

  public $agentUsers;
  public $devices;

  /**
   * Constructs the internal representation of the HomeGraphService service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://homegraph.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'homegraph';

    $this->agentUsers = new Google_Service_HomeGraphService_Resource_AgentUsers(
        $this,
        $this->serviceName,
        'agentUsers',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v1/{+agentUserId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'agentUserId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'requestId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->devices = new Google_Service_HomeGraphService_Resource_Devices(
        $this,
        $this->serviceName,
        'devices',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'v1/devices:query',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'reportStateAndNotification' => array(
              'path' => 'v1/devices:reportStateAndNotification',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'requestSync' => array(
              'path' => 'v1/devices:requestSync',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'sync' => array(
              'path' => 'v1/devices:sync',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
