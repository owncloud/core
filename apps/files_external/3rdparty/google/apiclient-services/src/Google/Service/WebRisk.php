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
 * Service definition for WebRisk (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/web-risk/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_WebRisk extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $hashes;
  public $projects_operations;
  public $projects_submissions;
  public $projects_uris;
  public $threatLists;
  public $uris;

  /**
   * Constructs the internal representation of the WebRisk service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://webrisk.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'webrisk';

    $this->hashes = new Google_Service_WebRisk_Resource_Hashes(
        $this,
        $this->serviceName,
        'hashes',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/hashes:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'hashPrefix' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'threatTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_operations = new Google_Service_WebRisk_Resource_ProjectsOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/{+name}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
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
            ),
          )
        )
    );
    $this->projects_submissions = new Google_Service_WebRisk_Resource_ProjectsSubmissions(
        $this,
        $this->serviceName,
        'submissions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/submissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_uris = new Google_Service_WebRisk_Resource_ProjectsUris(
        $this,
        $this->serviceName,
        'uris',
        array(
          'methods' => array(
            'submit' => array(
              'path' => 'v1/{+parent}/uris:submit',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->threatLists = new Google_Service_WebRisk_Resource_ThreatLists(
        $this,
        $this->serviceName,
        'threatLists',
        array(
          'methods' => array(
            'computeDiff' => array(
              'path' => 'v1/threatLists:computeDiff',
              'httpMethod' => 'GET',
              'parameters' => array(
                'constraints.maxDatabaseEntries' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'constraints.maxDiffEntries' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'constraints.supportedCompressions' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'threatType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'versionToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->uris = new Google_Service_WebRisk_Resource_Uris(
        $this,
        $this->serviceName,
        'uris',
        array(
          'methods' => array(
            'search' => array(
              'path' => 'v1/uris:search',
              'httpMethod' => 'GET',
              'parameters' => array(
                'threatTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'uri' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
