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
class Google_Service_RemoteBuildExecution extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://remotebuildexecution.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'remotebuildexecution';

    $this->actionResults = new Google_Service_RemoteBuildExecution_Resource_ActionResults(
        $this,
        $this->serviceName,
        'actionResults',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v2/{+instanceName}/actionResults/{hash}/{sizeBytes}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hash' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sizeBytes' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'inlineStdout' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'inlineStderr' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'inlineOutputFiles' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v2/{+instanceName}/actionResults/{hash}/{sizeBytes}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hash' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sizeBytes' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resultsCachePolicy.priority' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->actions = new Google_Service_RemoteBuildExecution_Resource_Actions(
        $this,
        $this->serviceName,
        'actions',
        array(
          'methods' => array(
            'execute' => array(
              'path' => 'v2/{+instanceName}/actions:execute',
              'httpMethod' => 'POST',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->blobs = new Google_Service_RemoteBuildExecution_Resource_Blobs(
        $this,
        $this->serviceName,
        'blobs',
        array(
          'methods' => array(
            'batchRead' => array(
              'path' => 'v2/{+instanceName}/blobs:batchRead',
              'httpMethod' => 'POST',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchUpdate' => array(
              'path' => 'v2/{+instanceName}/blobs:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'findMissing' => array(
              'path' => 'v2/{+instanceName}/blobs:findMissing',
              'httpMethod' => 'POST',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getTree' => array(
              'path' => 'v2/{+instanceName}/blobs/{hash}/{sizeBytes}:getTree',
              'httpMethod' => 'GET',
              'parameters' => array(
                'instanceName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'hash' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sizeBytes' => array(
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
            ),
          )
        )
    );
    $this->operations = new Google_Service_RemoteBuildExecution_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'waitExecution' => array(
              'path' => 'v2/{+name}:waitExecution',
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
    $this->v2 = new Google_Service_RemoteBuildExecution_Resource_V2(
        $this,
        $this->serviceName,
        'v2',
        array(
          'methods' => array(
            'getCapabilities' => array(
              'path' => 'v2/{+instanceName}/capabilities',
              'httpMethod' => 'GET',
              'parameters' => array(
                'instanceName' => array(
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
