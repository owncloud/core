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
use Google\Service\AndroidProvisioningPartner\CustomerApplyConfigurationRequest;
use Google\Service\AndroidProvisioningPartner\CustomerListDevicesResponse;
use Google\Service\AndroidProvisioningPartner\CustomerRemoveConfigurationRequest;
use Google\Service\AndroidProvisioningPartner\CustomerUnclaimDeviceRequest;
use Google\Service\AndroidProvisioningPartner\Device;

/**
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $devices = $androiddeviceprovisioningService->devices;
 *  </code>
 */
class CustomersDevices extends \Google\Service\Resource
{
  /**
   * Applies a Configuration to the device to register the device for zero-touch
   * enrollment. After applying a configuration to a device, the device
   * automatically provisions itself on first boot, or next factory reset.
   * (devices.applyConfiguration)
   *
   * @param string $parent Required. The customer managing the device. An API
   * resource name in the format `customers/[CUSTOMER_ID]`.
   * @param CustomerApplyConfigurationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AndroiddeviceprovisioningEmpty
   */
  public function applyConfiguration($parent, CustomerApplyConfigurationRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('applyConfiguration', [$params], AndroiddeviceprovisioningEmpty::class);
  }
  /**
   * Gets the details of a device. (devices.get)
   *
   * @param string $name Required. The device to get. An API resource name in the
   * format `customers/[CUSTOMER_ID]/devices/[DEVICE_ID]`.
   * @param array $optParams Optional parameters.
   * @return Device
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Device::class);
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
   * @return CustomerListDevicesResponse
   */
  public function listCustomersDevices($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CustomerListDevicesResponse::class);
  }
  /**
   * Removes a configuration from device. (devices.removeConfiguration)
   *
   * @param string $parent Required. The customer managing the device in the
   * format `customers/[CUSTOMER_ID]`.
   * @param CustomerRemoveConfigurationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AndroiddeviceprovisioningEmpty
   */
  public function removeConfiguration($parent, CustomerRemoveConfigurationRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeConfiguration', [$params], AndroiddeviceprovisioningEmpty::class);
  }
  /**
   * Unclaims a device from a customer and removes it from zero-touch enrollment.
   * After removing a device, a customer must contact their reseller to register
   * the device into zero-touch enrollment again. (devices.unclaim)
   *
   * @param string $parent Required. The customer managing the device. An API
   * resource name in the format `customers/[CUSTOMER_ID]`.
   * @param CustomerUnclaimDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AndroiddeviceprovisioningEmpty
   */
  public function unclaim($parent, CustomerUnclaimDeviceRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unclaim', [$params], AndroiddeviceprovisioningEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersDevices::class, 'Google_Service_AndroidProvisioningPartner_Resource_CustomersDevices');
