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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\MobileDevice;
use Google\Service\Directory\MobileDeviceAction;
use Google\Service\Directory\MobileDevices as MobileDevicesModel;

/**
 * The "mobiledevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $mobiledevices = $adminService->mobiledevices;
 *  </code>
 */
class Mobiledevices extends \Google\Service\Resource
{
  /**
   * Takes an action that affects a mobile device. For example, remotely wiping a
   * device. (mobiledevices.action)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID the API service uses to identify the
   * mobile device.
   * @param MobileDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, MobileDeviceAction $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('action', [$params]);
  }
  /**
   * Removes a mobile device. (mobiledevices.delete)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID the API service uses to identify the
   * mobile device.
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $resourceId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'resourceId' => $resourceId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a mobile device's properties. (mobiledevices.get)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID the API service uses to identify the
   * mobile device.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return MobileDevice
   */
  public function get($customerId, $resourceId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'resourceId' => $resourceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MobileDevice::class);
  }
  /**
   * Retrieves a paginated list of all user-owned mobile devices for an account.
   * To retrieve a list that includes company-owned devices, use the Cloud
   * Identity [Devices API](https://cloud.google.com/identity/docs/concepts
   * /overview-devices) instead. (mobiledevices.listMobiledevices)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return. Max allowed
   * value is 100.
   * @opt_param string orderBy Device property to use for sorting results.
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string query Search string in the format given at
   * https://developers.google.com/admin-sdk/directory/v1/search-operators
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Must be used with the `orderBy` parameter.
   * @return MobileDevicesModel
   */
  public function listMobiledevices($customerId, $optParams = [])
  {
    $params = ['customerId' => $customerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], MobileDevicesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Mobiledevices::class, 'Google_Service_Directory_Resource_Mobiledevices');
