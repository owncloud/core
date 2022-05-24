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

use Google\Service\AndroidEnterprise\Install;
use Google\Service\AndroidEnterprise\InstallsListResponse;

/**
 * The "installs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $installs = $androidenterpriseService->installs;
 *  </code>
 */
class Installs extends \Google\Service\Resource
{
  /**
   * Requests to remove an app from a device. A call to get or list will still
   * show the app as installed on the device until it is actually removed.
   * (installs.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param string $installId The ID of the product represented by the install,
   * e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $userId, $deviceId, $installId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId, 'installId' => $installId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves details of an installation of an app on a device. (installs.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param string $installId The ID of the product represented by the install,
   * e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   * @return Install
   */
  public function get($enterpriseId, $userId, $deviceId, $installId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId, 'installId' => $installId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Install::class);
  }
  /**
   * Retrieves the details of all apps installed on the specified device.
   * (installs.listInstalls)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param array $optParams Optional parameters.
   * @return InstallsListResponse
   */
  public function listInstalls($enterpriseId, $userId, $deviceId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], InstallsListResponse::class);
  }
  /**
   * Requests to install the latest version of an app to a device. If the app is
   * already installed, then it is updated to the latest version if necessary.
   * (installs.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $deviceId The Android ID of the device.
   * @param string $installId The ID of the product represented by the install,
   * e.g. "app:com.google.android.gm".
   * @param Install $postBody
   * @param array $optParams Optional parameters.
   * @return Install
   */
  public function update($enterpriseId, $userId, $deviceId, $installId, Install $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'deviceId' => $deviceId, 'installId' => $installId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Install::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Installs::class, 'Google_Service_AndroidEnterprise_Resource_Installs');
