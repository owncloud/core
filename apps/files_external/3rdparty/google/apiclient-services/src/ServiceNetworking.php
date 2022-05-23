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
 * Service definition for ServiceNetworking (v1).
 *
 * <p>
 * Provides automatic management of network configurations necessary for certain
 * services.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/service-infrastructure/docs/service-networking/getting-started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ServiceNetworking extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Manage your Google API service configuration. */
  const SERVICE_MANAGEMENT =
      "https://www.googleapis.com/auth/service.management";

  public $operations;
  public $services;
  public $services_connections;
  public $services_dnsRecordSets;
  public $services_dnsZones;
  public $services_projects_global_networks;
  public $services_projects_global_networks_peeredDnsDomains;
  public $services_roles;

  /**
   * Constructs the internal representation of the ServiceNetworking service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://servicenetworking.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'servicenetworking';

    $this->operations = new ServiceNetworking\Resource\Operations(
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
              'path' => 'v1/{+name}',
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
    $this->services = new ServiceNetworking\Resource\Services(
        $this,
        $this->serviceName,
        'services',
        [
          'methods' => [
            'addSubnetwork' => [
              'path' => 'v1/{+parent}:addSubnetwork',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'disableVpcServiceControls' => [
              'path' => 'v1/{+parent}:disableVpcServiceControls',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'enableVpcServiceControls' => [
              'path' => 'v1/{+parent}:enableVpcServiceControls',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'searchRange' => [
              'path' => 'v1/{+parent}:searchRange',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'validate' => [
              'path' => 'v1/{+parent}:validate',
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
    $this->services_connections = new ServiceNetworking\Resource\ServicesConnections(
        $this,
        $this->serviceName,
        'connections',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/connections',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'deleteConnection' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/connections',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'network' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'force' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->services_dnsRecordSets = new ServiceNetworking\Resource\ServicesDnsRecordSets(
        $this,
        $this->serviceName,
        'dnsRecordSets',
        [
          'methods' => [
            'add' => [
              'path' => 'v1/{+parent}/dnsRecordSets:add',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'remove' => [
              'path' => 'v1/{+parent}/dnsRecordSets:remove',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+parent}/dnsRecordSets:update',
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
    $this->services_dnsZones = new ServiceNetworking\Resource\ServicesDnsZones(
        $this,
        $this->serviceName,
        'dnsZones',
        [
          'methods' => [
            'add' => [
              'path' => 'v1/{+parent}/dnsZones:add',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'remove' => [
              'path' => 'v1/{+parent}/dnsZones:remove',
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
    $this->services_projects_global_networks = new ServiceNetworking\Resource\ServicesProjectsServicenetworkingGlobalNetworks(
        $this,
        $this->serviceName,
        'networks',
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
                'includeUsedIpRanges' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'updateConsumerConfig' => [
              'path' => 'v1/{+parent}:updateConsumerConfig',
              'httpMethod' => 'PATCH',
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
    $this->services_projects_global_networks_peeredDnsDomains = new ServiceNetworking\Resource\ServicesProjectsServicenetworkingGlobalNetworksPeeredDnsDomains(
        $this,
        $this->serviceName,
        'peeredDnsDomains',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/peeredDnsDomains',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/peeredDnsDomains',
              'httpMethod' => 'GET',
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
    $this->services_roles = new ServiceNetworking\Resource\ServicesRoles(
        $this,
        $this->serviceName,
        'roles',
        [
          'methods' => [
            'add' => [
              'path' => 'v1/{+parent}/roles:add',
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceNetworking::class, 'Google_Service_ServiceNetworking');
