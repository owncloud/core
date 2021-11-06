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
 * Service definition for Testing (v1).
 *
 * <p>
 * Allows developers to run automated tests for their mobile applications on
 * Google infrastructure.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-test-lab/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Testing extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud services and see the email address of your Google Account. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";

  public $applicationDetailService;
  public $projects_testMatrices;
  public $testEnvironmentCatalog;

  /**
   * Constructs the internal representation of the Testing service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://testing.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'testing';

    $this->applicationDetailService = new Testing\Resource\ApplicationDetailService(
        $this,
        $this->serviceName,
        'applicationDetailService',
        [
          'methods' => [
            'getApkDetails' => [
              'path' => 'v1/applicationDetailService/getApkDetails',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->projects_testMatrices = new Testing\Resource\ProjectsTestMatrices(
        $this,
        $this->serviceName,
        'testMatrices',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/projects/{projectId}/testMatrices/{testMatrixId}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'testMatrixId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/projects/{projectId}/testMatrices',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{projectId}/testMatrices/{testMatrixId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'testMatrixId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->testEnvironmentCatalog = new Testing\Resource\TestEnvironmentCatalog(
        $this,
        $this->serviceName,
        'testEnvironmentCatalog',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/testEnvironmentCatalog/{environmentType}',
              'httpMethod' => 'GET',
              'parameters' => [
                'environmentType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
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
class_alias(Testing::class, 'Google_Service_Testing');
