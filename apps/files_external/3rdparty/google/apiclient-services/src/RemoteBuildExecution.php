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
 * Service definition for RemoteBuildExecution (v2).
 *
 * <p>
 * Supplies a Remote Execution API service for tools such as bazel.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/remote-build-execution/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class RemoteBuildExecution extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $actionResults;
  public $actions;
  public $blobs;
  public $operations;
  public $v2;

  /**
   * Constructs the internal representation of the RemoteBuildExecution service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://remotebuildexecution.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'remotebuildexecution';

    $this->actionResults = new RemoteBuildExecution\Resource\ActionResults(
        $this,
        $this->serviceName,
        'actionResults',
        [
          'methods' => [
            'get' => [
              'path' => 'v2/{+instanceName}/actionResults/{hash}/{sizeBytes}',
              'httpMethod' => 'GET',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'hash' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sizeBytes' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'inlineOutputFiles' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'inlineStderr' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'inlineStdout' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'v2/{+instanceName}/actionResults/{hash}/{sizeBytes}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'hash' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sizeBytes' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resultsCachePolicy.priority' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->actions = new RemoteBuildExecution\Resource\Actions(
        $this,
        $this->serviceName,
        'actions',
        [
          'methods' => [
            'execute' => [
              'path' => 'v2/{+instanceName}/actions:execute',
              'httpMethod' => 'POST',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->blobs = new RemoteBuildExecution\Resource\Blobs(
        $this,
        $this->serviceName,
        'blobs',
        [
          'methods' => [
            'batchRead' => [
              'path' => 'v2/{+instanceName}/blobs:batchRead',
              'httpMethod' => 'POST',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchUpdate' => [
              'path' => 'v2/{+instanceName}/blobs:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'findMissing' => [
              'path' => 'v2/{+instanceName}/blobs:findMissing',
              'httpMethod' => 'POST',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getTree' => [
              'path' => 'v2/{+instanceName}/blobs/{hash}/{sizeBytes}:getTree',
              'httpMethod' => 'GET',
              'parameters' => [
                'instanceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'hash' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sizeBytes' => [
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
            ],
          ]
        ]
    );
    $this->operations = new RemoteBuildExecution\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'waitExecution' => [
              'path' => 'v2/{+name}:waitExecution',
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
    $this->v2 = new RemoteBuildExecution\Resource\V2(
        $this,
        $this->serviceName,
        'v2',
        [
          'methods' => [
            'getCapabilities' => [
              'path' => 'v2/{+instanceName}/capabilities',
              'httpMethod' => 'GET',
              'parameters' => [
                'instanceName' => [
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
class_alias(RemoteBuildExecution::class, 'Google_Service_RemoteBuildExecution');
