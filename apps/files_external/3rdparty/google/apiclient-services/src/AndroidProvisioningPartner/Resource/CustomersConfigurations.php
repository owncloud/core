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

namespace Google\Service\AndroidProvisioningPartner\Resource;

use Google\Service\AndroidProvisioningPartner\AndroiddeviceprovisioningEmpty;
use Google\Service\AndroidProvisioningPartner\Configuration;
use Google\Service\AndroidProvisioningPartner\CustomerListConfigurationsResponse;

/**
 * The "configurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $configurations = $androiddeviceprovisioningService->configurations;
 *  </code>
 */
class CustomersConfigurations extends \Google\Service\Resource
{
  /**
   * Creates a new configuration. Once created, a customer can apply the
   * configuration to devices. (configurations.create)
   *
   * @param string $parent Required. The customer that manages the configuration.
   * An API resource name in the format `customers/[CUSTOMER_ID]`. This field has
   * custom validation in CreateConfigurationRequestValidator
   * @param Configuration $postBody
   * @param array $optParams Optional parameters.
   * @return Configuration
   */
  public function create($parent, Configuration $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Configuration::class);
  }
  /**
   * Deletes an unused configuration. The API call fails if the customer has
   * devices with the configuration applied. (configurations.delete)
   *
   * @param string $name Required. The configuration to delete. An API resource
   * name in the format
   * `customers/[CUSTOMER_ID]/configurations/[CONFIGURATION_ID]`. If the
   * configuration is applied to any devices, the API call fails.
   * @param array $optParams Optional parameters.
   * @return AndroiddeviceprovisioningEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AndroiddeviceprovisioningEmpty::class);
  }
  /**
   * Gets the details of a configuration. (configurations.get)
   *
   * @param string $name Required. The configuration to get. An API resource name
   * in the format `customers/[CUSTOMER_ID]/configurations/[CONFIGURATION_ID]`.
   * @param array $optParams Optional parameters.
   * @return Configuration
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Configuration::class);
  }
  /**
   * Lists a customer's configurations.
   * (configurations.listCustomersConfigurations)
   *
   * @param string $parent Required. The customer that manages the listed
   * configurations. An API resource name in the format `customers/[CUSTOMER_ID]`.
   * @param array $optParams Optional parameters.
   * @return CustomerListConfigurationsResponse
   */
  public function listCustomersConfigurations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CustomerListConfigurationsResponse::class);
  }
  /**
   * Updates a configuration's field values. (configurations.patch)
   *
   * @param string $name Output only. The API resource name in the format
   * `customers/[CUSTOMER_ID]/configurations/[CONFIGURATION_ID]`. Assigned by the
   * server.
   * @param Configuration $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The field mask applied to the target
   * `Configuration` before updating the fields. To learn more about using field
   * masks, read [FieldMask](/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask) in the Protocol Buffers
   * documentation.
   * @return Configuration
   */
  public function patch($name, Configuration $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Configuration::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersConfigurations::class, 'Google_Service_AndroidProvisioningPartner_Resource_CustomersConfigurations');
