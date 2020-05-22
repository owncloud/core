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
 * The "configurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google_Service_AndroidProvisioningPartner(...);
 *   $configurations = $androiddeviceprovisioningService->configurations;
 *  </code>
 */
class Google_Service_AndroidProvisioningPartner_Resource_CustomersConfigurations extends Google_Service_Resource
{
  /**
   * Creates a new configuration. Once created, a customer can apply the
   * configuration to devices. (configurations.create)
   *
   * @param string $parent Required. The customer that manages the configuration.
   * An API resource name in the format `customers/[CUSTOMER_ID]`.
   * @param Google_Service_AndroidProvisioningPartner_Configuration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Configuration
   */
  public function create($parent, Google_Service_AndroidProvisioningPartner_Configuration $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AndroidProvisioningPartner_Configuration");
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
   * @return Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty");
  }
  /**
   * Gets the details of a configuration. (configurations.get)
   *
   * @param string $name Required. The configuration to get. An API resource name
   * in the format `customers/[CUSTOMER_ID]/configurations/[CONFIGURATION_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Configuration
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidProvisioningPartner_Configuration");
  }
  /**
   * Lists a customer's configurations.
   * (configurations.listCustomersConfigurations)
   *
   * @param string $parent Required. The customer that manages the listed
   * configurations. An API resource name in the format `customers/[CUSTOMER_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_CustomerListConfigurationsResponse
   */
  public function listCustomersConfigurations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidProvisioningPartner_CustomerListConfigurationsResponse");
  }
  /**
   * Updates a configuration's field values. (configurations.patch)
   *
   * @param string $name Output only. The API resource name in the format
   * `customers/[CUSTOMER_ID]/configurations/[CONFIGURATION_ID]`. Assigned by the
   * server.
   * @param Google_Service_AndroidProvisioningPartner_Configuration $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The field mask applied to the target
   * `Configuration` before updating the fields. To learn more about using field
   * masks, read [FieldMask](/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask) in the Protocol Buffers
   * documentation.
   * @return Google_Service_AndroidProvisioningPartner_Configuration
   */
  public function patch($name, Google_Service_AndroidProvisioningPartner_Configuration $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidProvisioningPartner_Configuration");
  }
}
