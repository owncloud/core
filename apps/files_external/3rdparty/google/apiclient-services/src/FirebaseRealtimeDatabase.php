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
 * Service definition for FirebaseRealtimeDatabase (v1beta).
 *
 * <p>
 * The Firebase Realtime Database Management API enables programmatic
 * provisioning and management of Realtime Database instances.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://firebase.google.com/docs/reference/rest/database/database-management/rest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class FirebaseRealtimeDatabase extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud services and see the email address of your Google Account. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** View and administer all your Firebase data and settings. */
  const FIREBASE =
      "https://www.googleapis.com/auth/firebase";
  /** View all your Firebase data and settings. */
  const FIREBASE_READONLY =
      "https://www.googleapis.com/auth/firebase.readonly";

  public $projects_locations_instances;

  /**
   * Constructs the internal representation of the FirebaseRealtimeDatabase
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://firebasedatabase.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta';
    $this->serviceName = 'firebasedatabase';

    $this->projects_locations_instances = new FirebaseRealtimeDatabase\Resource\ProjectsLocationsInstances(
        $this,
        $this->serviceName,
        'instances',
        [
          'methods' => [
            'create' => [
              'path' => 'v1beta/{+parent}/instances',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'databaseId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'disable' => [
              'path' => 'v1beta/{+name}:disable',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1beta/{+parent}/instances',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'reenable' => [
              'path' => 'v1beta/{+name}:reenable',
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
class_alias(FirebaseRealtimeDatabase::class, 'Google_Service_FirebaseRealtimeDatabase');
