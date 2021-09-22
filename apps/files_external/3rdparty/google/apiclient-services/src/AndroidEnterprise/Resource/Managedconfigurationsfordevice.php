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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\ManagedConfiguration;
use Google\Service\AndroidEnterprise\ManagedConfigurationsForDeviceListResponse;

/**
 * The "managedconfigurationsfordevice" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $managedconfigurationsfordevice = $androidenterpriseService->managedconfigurationsfordevice;
 *  </code>
 */
class Managedconfigurationsfordevice extends \Google\Service\Resource
{
  /**
   * Removes a per-device managed configuration for an app for the specified
   * device. (managedconfigurationsfordevice.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param string $managedConfigurationForDeviceId The ID of the managed
   * configuration (a product ID), e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $userId, $deviceId, $managedConfigurationForDeviceId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId, 'managedConfigurationForDeviceId' => $managedConfigurationForDeviceId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves details of a per-device managed configuration.
   * (managedconfigurationsfordevice.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param string $managedConfigurationForDeviceId The ID of the managed
   * configuration (a product ID), e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   * @return ManagedConfiguration
   */
  public function get($enterpriseId, $userId, $deviceId, $managedConfigurationForDeviceId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId, 'managedConfigurationForDeviceId' => $managedConfigurationForDeviceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ManagedConfiguration::class);
  }
  /**
   * Lists all the per-device managed configurations for the specified device.
   * Only the ID is set.
   * (managedconfigurationsfordevice.listManagedconfigurationsfordevice)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param array $optParams Optional parameters.
   * @return ManagedConfigurationsForDeviceListResponse
   */
  public function listManagedconfigurationsfordevice($enterpriseId, $userId, $deviceId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ManagedConfigurationsForDeviceListResponse::class);
  }
  /**
   * Adds or updates a per-device managed configuration for an app for the
   * specified device. (managedconfigurationsfordevice.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param string $managedConfigurationForDeviceId The ID of the managed
   * configuration (a product ID), e.g. "app:com.google.android.gm".
   * @param ManagedConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return ManagedConfiguration
   */
  public function update($enterpriseId, $userId, $deviceId, $managedConfigurationForDeviceId, ManagedConfiguration $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId, 'managedConfigurationForDeviceId' => $managedConfigurationForDeviceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ManagedConfiguration::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Managedconfigurationsfordevice::class, 'Google_Service_AndroidEnterprise_Resource_Managedconfigurationsfordevice');
