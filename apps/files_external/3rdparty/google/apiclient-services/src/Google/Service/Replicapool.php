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
 * Service definition for Replicapool (v1beta1).
 *
 * <p>
 * The Replica Pool API allows users to declaratively provision and manage
 * groups of Google Compute Engine instances based on a common template.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/compute/docs/replica-pool/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Replicapool extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** View and manage your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN =
      "https://www.googleapis.com/auth/ndev.cloudman";
  /** View your Google Cloud Platform management resources and deployment status information. */
  const NDEV_CLOUDMAN_READONLY =
      "https://www.googleapis.com/auth/ndev.cloudman.readonly";
  /** View and manage replica pools. */
  const REPLICAPOOL =
      "https://www.googleapis.com/auth/replicapool";
  /** View replica pools. */
  const REPLICAPOOL_READONLY =
      "https://www.googleapis.com/auth/replicapool.readonly";

  public $pools;
  public $replicas;
  
  /**
   * Constructs the internal representation of the Replicapool service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'replicapool/v1beta1/projects/';
    $this->batchPath = 'batch/replicapool/v1beta1';
    $this->version = 'v1beta1';
    $this->serviceName = 'replicapool';

    $this->pools = new Google_Service_Replicapool_Resource_Pools(
        $this,
        $this->serviceName,
        'pools',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{projectName}/zones/{zone}/pools',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectName}/zones/{zone}/pools',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'resize' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/resize',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'numReplicas' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'updatetemplate' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/updateTemplate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->replicas = new Google_Service_Replicapool_Resource_Replicas(
        $this,
        $this->serviceName,
        'replicas',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas/{replicaName}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replicaName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas/{replicaName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replicaName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas',
              'httpMethod' => 'GET',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'restart' => array(
              'path' => '{projectName}/zones/{zone}/pools/{poolName}/replicas/{replicaName}/restart',
              'httpMethod' => 'POST',
              'parameters' => array(
                'projectName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'poolName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'replicaName' => array(
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
