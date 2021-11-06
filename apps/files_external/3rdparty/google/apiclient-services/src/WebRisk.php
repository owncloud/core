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
class WebRisk extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
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
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://webrisk.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'webrisk';

    $this->hashes = new WebRisk\Resource\Hashes(
        $this,
        $this->serviceName,
        'hashes',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/hashes:search',
              'httpMethod' => 'GET',
              'parameters' => [
                'hashPrefix' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threatTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_operations = new WebRisk\Resource\ProjectsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+name}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
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
            ],
          ]
        ]
    );
    $this->projects_submissions = new WebRisk\Resource\ProjectsSubmissions(
        $this,
        $this->serviceName,
        'submissions',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/submissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_uris = new WebRisk\Resource\ProjectsUris(
        $this,
        $this->serviceName,
        'uris',
        [
          'methods' => [
            'submit' => [
              'path' => 'v1/{+parent}/uris:submit',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->threatLists = new WebRisk\Resource\ThreatLists(
        $this,
        $this->serviceName,
        'threatLists',
        [
          'methods' => [
            'computeDiff' => [
              'path' => 'v1/threatLists:computeDiff',
              'httpMethod' => 'GET',
              'parameters' => [
                'constraints.maxDatabaseEntries' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'constraints.maxDiffEntries' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'constraints.supportedCompressions' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'threatType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'versionToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->uris = new WebRisk\Resource\Uris(
        $this,
        $this->serviceName,
        'uris',
        [
          'methods' => [
            'search' => [
              'path' => 'v1/uris:search',
              'httpMethod' => 'GET',
              'parameters' => [
                'threatTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'uri' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WebRisk::class, 'Google_Service_WebRisk');
