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
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google_Service_AndroidProvisioningPartner(...);
 *   $devices = $androiddeviceprovisioningService->devices;
 *  </code>
 */
class Google_Service_AndroidProvisioningPartner_Resource_CustomersDevices extends Google_Service_Resource
{
  /**
   * Applies a Configuration to the device to register the device for zero-touch
   * enrollment. After applying a configuration to a device, the device
   * automatically provisions itself on first boot, or next factory reset.
   * (devices.applyConfiguration)
   *
   * @param string $parent Required. The customer managing the device. An API
   * resource name in the format `customers/[CUSTOMER_ID]`.
   * @param Google_Service_AndroidProvisioningPartner_CustomerApplyConfigurationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty
   */
  public function applyConfiguration($parent, Google_Service_AndroidProvisioningPartner_CustomerApplyConfigurationRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('applyConfiguration', array($params), "Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty");
  }
  /**
   * Gets the details of a device. (devices.get)
   *
   * @param string $name Required. The device to get. An API resource name in the
   * format `customers/[CUSTOMER_ID]/devices/[DEVICE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidProvisioningPartner_Device");
  }
  /**
   * Lists a customer's devices. (devices.listCustomersDevices)
   *
   * @param string $parent Required. The customer managing the devices. An API
   * resource name in the format `customers/[CUSTOMER_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageSize The maximum number of devices to show in a page of
   * results. Must be between 1 and 100 inclusive.
   * @opt_param string pageToken A token specifying which result page to return.
   * @return Google_Service_AndroidProvisioningPartner_CustomerListDevicesResponse
   */
  public function listCustomersDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidProvisioningPartner_CustomerListDevicesResponse");
  }
  /**
   * Removes a configuration from device. (devices.removeConfiguration)
   *
   * @param string $parent Required. The customer managing the device in the
   * format `customers/[CUSTOMER_ID]`.
   * @param Google_Service_AndroidProvisioningPartner_CustomerRemoveConfigurationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty
   */
  public function removeConfiguration($parent, Google_Service_AndroidProvisioningPartner_CustomerRemoveConfigurationRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeConfiguration', array($params), "Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty");
  }
  /**
   * Unclaims a device from a customer and removes it from zero-touch enrollment.
   * After removing a device, a customer must contact their reseller to register
   * the device into zero-touch enrollment again. (devices.unclaim)
   *
   * @param string $parent Required. The customer managing the device. An API
   * resource name in the format `customers/[CUSTOMER_ID]`.
   * @param Google_Service_AndroidProvisioningPartner_CustomerUnclaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty
   */
  public function unclaim($parent, Google_Service_AndroidProvisioningPartner_CustomerUnclaimDeviceRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unclaim', array($params), "Google_Service_AndroidProvisioningPartner_AndroiddeviceprovisioningEmpty");
  }
}
