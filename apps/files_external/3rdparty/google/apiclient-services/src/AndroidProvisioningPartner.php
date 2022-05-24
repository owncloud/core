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
 * Service definition for AndroidProvisioningPartner (v1).
 *
 * <p>
 * Automates Android zero-touch enrollment for device resellers, customers, and
 * EMMs.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/zero-touch/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AndroidProvisioningPartner extends \Google\Service
{


  public $customers;
  public $customers_configurations;
  public $customers_devices;
  public $customers_dpcs;
  public $operations;
  public $partners_customers;
  public $partners_devices;
  public $partners_vendors;
  public $partners_vendors_customers;

  /**
   * Constructs the internal representation of the AndroidProvisioningPartner
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://androiddeviceprovisioning.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'androiddeviceprovisioning';

    $this->customers = new AndroidProvisioningPartner\Resource\Customers(
        $this,
        $this->serviceName,
        'customers',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/customers',
              'httpMethod' => 'GET',
              'parameters' => [
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
    $this->customers_configurations = new AndroidProvisioningPartner\Resource\CustomersConfigurations(
        $this,
        $this->serviceName,
        'configurations',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/configurations',
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
              'path' => 'v1/{+parent}/configurations',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_devices = new AndroidProvisioningPartner\Resource\CustomersDevices(
        $this,
        $this->serviceName,
        'devices',
        [
          'methods' => [
            'applyConfiguration' => [
              'path' => 'v1/{+parent}/devices:applyConfiguration',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
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
              'path' => 'v1/{+parent}/devices',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeConfiguration' => [
              'path' => 'v1/{+parent}/devices:removeConfiguration',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unclaim' => [
              'path' => 'v1/{+parent}/devices:unclaim',
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
    $this->customers_dpcs = new AndroidProvisioningPartner\Resource\CustomersDpcs(
        $this,
        $this->serviceName,
        'dpcs',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/dpcs',
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
    $this->operations = new AndroidProvisioningPartner\Resource\Operations(
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
            ],
          ]
        ]
    );
    $this->partners_customers = new AndroidProvisioningPartner\Resource\PartnersCustomers(
        $this,
        $this->serviceName,
        'customers',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/customers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/partners/{+partnerId}/customers',
              'httpMethod' => 'GET',
              'parameters' => [
                'partnerId' => [
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
    $this->partners_devices = new AndroidProvisioningPartner\Resource\PartnersDevices(
        $this,
        $this->serviceName,
        'devices',
        [
          'methods' => [
            'claim' => [
              'path' => 'v1/partners/{+partnerId}/devices:claim',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'claimAsync' => [
              'path' => 'v1/partners/{+partnerId}/devices:claimAsync',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'findByIdentifier' => [
              'path' => 'v1/partners/{+partnerId}/devices:findByIdentifier',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'findByOwner' => [
              'path' => 'v1/partners/{+partnerId}/devices:findByOwner',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
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
            ],'metadata' => [
              'path' => 'v1/partners/{+metadataOwnerId}/devices/{+deviceId}/metadata',
              'httpMethod' => 'POST',
              'parameters' => [
                'metadataOwnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unclaim' => [
              'path' => 'v1/partners/{+partnerId}/devices:unclaim',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unclaimAsync' => [
              'path' => 'v1/partners/{+partnerId}/devices:unclaimAsync',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateMetadataAsync' => [
              'path' => 'v1/partners/{+partnerId}/devices:updateMetadataAsync',
              'httpMethod' => 'POST',
              'parameters' => [
                'partnerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->partners_vendors = new AndroidProvisioningPartner\Resource\PartnersVendors(
        $this,
        $this->serviceName,
        'vendors',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/vendors',
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
            ],
          ]
        ]
    );
    $this->partners_vendors_customers = new AndroidProvisioningPartner\Resource\PartnersVendorsCustomers(
        $this,
        $this->serviceName,
        'customers',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/customers',
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
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidProvisioningPartner::class, 'Google_Service_AndroidProvisioningPartner');
