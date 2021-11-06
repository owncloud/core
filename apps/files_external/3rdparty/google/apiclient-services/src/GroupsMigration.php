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
 * Service definition for GroupsMigration (v1).
 *
 * <p>
 * The Groups Migration API allows domain administrators to archive emails into
 * Google groups.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/groups-migration/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class GroupsMigration extends \Google\Service
{
  /** Upload messages to any Google group in your domain. */
  const APPS_GROUPS_MIGRATION =
      "https://www.googleapis.com/auth/apps.groups.migration";

  public $archive;

  /**
   * Constructs the internal representation of the GroupsMigration service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://groupsmigration.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'groupsmigration';

    $this->archive = new GroupsMigration\Resource\Archive(
        $this,
        $this->serviceName,
        'archive',
        [
          'methods' => [
            'insert' => [
              'path' => 'groups/v1/groups/{groupId}/archive',
              'httpMethod' => 'POST',
              'parameters' => [
                'groupId' => [
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
class_alias(GroupsMigration::class, 'Google_Service_GroupsMigration');
