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
class Google_Service_AndroidProvisioningPartner extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://androiddeviceprovisioning.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'androiddeviceprovisioning';

    $this->customers = new Google_Service_AndroidProvisioningPartner_Resource_Customers(
        $this,
        $this->serviceName,
        'customers',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/customers',
              'httpMethod' => 'GET',
              'parameters' => array(
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
    $this->customers_configurations = new Google_Service_AndroidProvisioningPartner_Resource_CustomersConfigurations(
        $this,
        $this->serviceName,
        'configurations',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/configurations',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
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
              'path' => 'v1/{+parent}/configurations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->customers_devices = new Google_Service_AndroidProvisioningPartner_Resource_CustomersDevices(
        $this,
        $this->serviceName,
        'devices',
        array(
          'methods' => array(
            'applyConfiguration' => array(
              'path' => 'v1/{+parent}/devices:applyConfiguration',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
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
              'path' => 'v1/{+parent}/devices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'removeConfiguration' => array(
              'path' => 'v1/{+parent}/devices:removeConfiguration',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unclaim' => array(
              'path' => 'v1/{+parent}/devices:unclaim',
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
    $this->customers_dpcs = new Google_Service_AndroidProvisioningPartner_Resource_CustomersDpcs(
        $this,
        $this->serviceName,
        'dpcs',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/dpcs',
              'httpMethod' => 'GET',
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
    $this->operations = new Google_Service_AndroidProvisioningPartner_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
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
    $this->partners_customers = new Google_Service_AndroidProvisioningPartner_Resource_PartnersCustomers(
        $this,
        $this->serviceName,
        'customers',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/customers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/partners/{+partnerId}/customers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'partnerId' => array(
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
    $this->partners_devices = new Google_Service_AndroidProvisioningPartner_Resource_PartnersDevices(
        $this,
        $this->serviceName,
        'devices',
        array(
          'methods' => array(
            'claim' => array(
              'path' => 'v1/partners/{+partnerId}/devices:claim',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'claimAsync' => array(
              'path' => 'v1/partners/{+partnerId}/devices:claimAsync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'findByIdentifier' => array(
              'path' => 'v1/partners/{+partnerId}/devices:findByIdentifier',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'findByOwner' => array(
              'path' => 'v1/partners/{+partnerId}/devices:findByOwner',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
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
            ),'metadata' => array(
              'path' => 'v1/partners/{+metadataOwnerId}/devices/{+deviceId}/metadata',
              'httpMethod' => 'POST',
              'parameters' => array(
                'metadataOwnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unclaim' => array(
              'path' => 'v1/partners/{+partnerId}/devices:unclaim',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unclaimAsync' => array(
              'path' => 'v1/partners/{+partnerId}/devices:unclaimAsync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updateMetadataAsync' => array(
              'path' => 'v1/partners/{+partnerId}/devices:updateMetadataAsync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'partnerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->partners_vendors = new Google_Service_AndroidProvisioningPartner_Resource_PartnersVendors(
        $this,
        $this->serviceName,
        'vendors',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/vendors',
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
            ),
          )
        )
    );
    $this->partners_vendors_customers = new Google_Service_AndroidProvisioningPartner_Resource_PartnersVendorsCustomers(
        $this,
        $this->serviceName,
        'customers',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/customers',
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
            ),
          )
        )
    );
  }
}
