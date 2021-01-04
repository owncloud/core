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
class Google_Service_FirebaseRealtimeDatabase extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud Platform services. */
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://firebasedatabase.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta';
    $this->serviceName = 'firebasedatabase';

    $this->projects_locations_instances = new Google_Service_FirebaseRealtimeDatabase_Resource_ProjectsLocationsInstances(
        $this,
        $this->serviceName,
        'instances',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta/{+parent}/instances',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'databaseId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'validateOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'disable' => array(
              'path' => 'v1beta/{+name}:disable',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta/{+parent}/instances',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reenable' => array(
              'path' => 'v1beta/{+name}:reenable',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
