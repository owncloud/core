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
 * Service definition for Groupssettings (v1).
 *
 * <p>
 * Manages permission levels and related settings of a group.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/groups-settings/get_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Groupssettings extends \Google\Service
{
  /** View and manage the settings of a G Suite group. */
  const APPS_GROUPS_SETTINGS =
      "https://www.googleapis.com/auth/apps.groups.settings";

  public $groups;

  /**
   * Constructs the internal representation of the Groupssettings service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'groups/v1/groups/';
    $this->batchPath = 'batch/groupssettings/v1';
    $this->version = 'v1';
    $this->serviceName = 'groupssettings';

    $this->groups = new Groupssettings\Resource\Groups(
        $this,
        $this->serviceName,
        'groups',
        [
          'methods' => [
            'get' => [
              'path' => '{groupUniqueId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupUniqueId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => '{groupUniqueId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'groupUniqueId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => '{groupUniqueId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'groupUniqueId' => [
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
class_alias(Groupssettings::class, 'Google_Service_Groupssettings');
