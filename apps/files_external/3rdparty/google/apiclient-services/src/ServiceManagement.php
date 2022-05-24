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
 * Service definition for ServiceManagement (v1).
 *
 * <p>
 * Google Service Management allows service producers to publish their services
 * on Google Cloud Platform so that they can be discovered and used by service
 * consumers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/service-management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ServiceManagement extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View your data across Google Cloud services and see the email address of your Google Account. */
  const CLOUD_PLATFORM_READ_ONLY =
      "https://www.googleapis.com/auth/cloud-platform.read-only";
  /** Manage your Google API service configuration. */
  const SERVICE_MANAGEMENT =
      "https://www.googleapis.com/auth/service.management";
  /** View your Google API service configuration. */
  const SERVICE_MANAGEMENT_READONLY =
      "https://www.googleapis.com/auth/service.management.readonly";

  public $operations;
  public $services;
  public $services_configs;
  public $services_consumers;
  public $services_rollouts;

  /**
   * Constructs the internal representation of the ServiceManagement service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://servicemanagement.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'servicemanagement';

    $this->operations = new ServiceManagement\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
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
              'path' => 'v1/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
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
    $this->services = new ServiceManagement\Resource\Services(
        $this,
        $this->serviceName,
        'services',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/services',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1/services/{serviceName}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateConfigReport' => [
              'path' => 'v1/services:generateConfigReport',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v1/services/{serviceName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getConfig' => [
              'path' => 'v1/services/{serviceName}/config',
              'httpMethod' => 'GET',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/services',
              'httpMethod' => 'GET',
              'parameters' => [
                'consumerId' => [
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
                'producerProjectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'undelete' => [
              'path' => 'v1/services/{serviceName}:undelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->services_configs = new ServiceManagement\Resource\ServicesConfigs(
        $this,
        $this->serviceName,
        'configs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/services/{serviceName}/configs',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/services/{serviceName}/configs/{configId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/services/{serviceName}/configs',
              'httpMethod' => 'GET',
              'parameters' => [
                'serviceName' => [
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
            ],'submit' => [
              'path' => 'v1/services/{serviceName}/configs:submit',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->services_consumers = new ServiceManagement\Resource\ServicesConsumers(
        $this,
        $this->serviceName,
        'consumers',
        [
          'methods' => [
            'getIamPolicy' => [
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->services_rollouts = new ServiceManagement\Resource\ServicesRollouts(
        $this,
        $this->serviceName,
        'rollouts',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/services/{serviceName}/rollouts',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/services/{serviceName}/rollouts/{rolloutId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'serviceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'rolloutId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/services/{serviceName}/rollouts',
              'httpMethod' => 'GET',
              'parameters' => [
                'serviceName' => [
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceManagement::class, 'Google_Service_ServiceManagement');
