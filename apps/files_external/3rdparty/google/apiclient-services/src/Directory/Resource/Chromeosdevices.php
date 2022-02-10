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

use Google\Service\Directory\ChromeOsDevice;
use Google\Service\Directory\ChromeOsDeviceAction;
use Google\Service\Directory\ChromeOsDevices as ChromeOsDevicesModel;
use Google\Service\Directory\ChromeOsMoveDevicesToOu;

/**
 * The "chromeosdevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $chromeosdevices = $adminService->chromeosdevices;
 *  </code>
 */
class Chromeosdevices extends \Google\Service\Resource
{
  /**
   * Takes an action that affects a Chrome OS Device. This includes
   * deprovisioning, disabling, and re-enabling devices. *Warning:* *
   * Deprovisioning a device will stop device policy syncing and remove device-
   * level printers. After a device is deprovisioned, it must be wiped before it
   * can be re-enrolled. * Lost or stolen devices should use the disable action. *
   * Re-enabling a disabled device will consume a device license. If you do not
   * have sufficient licenses available when completing the re-enable action, you
   * will receive an error. For more information about deprovisioning and
   * disabling devices, visit the [help
   * center](https://support.google.com/chrome/a/answer/3523633).
   * (chromeosdevices.action)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID of the device. The `resourceId`s are
   * returned in the response from the [chromeosdevices.list](/admin-
   * sdk/directory/v1/reference/chromeosdevices/list) method.
   * @param ChromeOsDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, ChromeOsDeviceAction $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('action', [$params]);
  }
  /**
   * Retrieves a Chrome OS device's properties. (chromeosdevices.get)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $deviceId The unique ID of the device. The `deviceId`s are
   * returned in the response from the [chromeosdevices.list](/admin-
   * sdk/directory/v1/reference/chromeosdevices/list) method.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Determines whether the response contains the
   * full list of properties or only a subset.
   * @return ChromeOsDevice
   */
  public function get($customerId, $deviceId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'deviceId' => $deviceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ChromeOsDevice::class);
  }
  /**
   * Retrieves a paginated list of Chrome OS devices within an account.
   * (chromeosdevices.listChromeosdevices)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeChildOrgunits Return devices from all child orgunits,
   * as well as the specified org unit. If this is set to true 'orgUnitPath' must
   * be provided.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string orderBy Device property to use for sorting results.
   * @opt_param string orgUnitPath The full path of the organizational unit (minus
   * the leading `/`) or its unique ID.
   * @opt_param string pageToken The `pageToken` query parameter is used to
   * request the next page of query results. The follow-on request's `pageToken`
   * query parameter is the `nextPageToken` from your previous response.
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string query Search string in the format given at
   * https://developers.google.com/admin-sdk/directory/v1/list-query-operators
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Must be used with the `orderBy` parameter.
   * @return ChromeOsDevicesModel
   */
  public function listChromeosdevices($customerId, $optParams = [])
  {
    $params = ['customerId' => $customerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ChromeOsDevicesModel::class);
  }
  /**
   * Moves or inserts multiple Chrome OS devices to an organizational unit. You
   * can move up to 50 devices at once. (chromeosdevices.moveDevicesToOu)
   *
   * @param string $customerId Immutable ID of the Google Workspace account
   * @param string $orgUnitPath Full path of the target organizational unit or its
   * ID
   * @param ChromeOsMoveDevicesToOu $postBody
   * @param array $optParams Optional parameters.
   */
  public function moveDevicesToOu($customerId, $orgUnitPath, ChromeOsMoveDevicesToOu $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('moveDevicesToOu', [$params]);
  }
  /**
   * Updates a device's updatable properties, such as `annotatedUser`,
   * `annotatedLocation`, `notes`, `orgUnitPath`, or `annotatedAssetId`. This
   * method supports [patch semantics](/admin-
   * sdk/directory/v1/guides/performance#patch). (chromeosdevices.patch)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $deviceId The unique ID of the device. The `deviceId`s are
   * returned in the response from the [chromeosdevices.list](/admin-
   * sdk/v1/reference/chromeosdevices/list) method.
   * @param ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return ChromeOsDevice
   */
  public function patch($customerId, $deviceId, ChromeOsDevice $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ChromeOsDevice::class);
  }
  /**
   * Updates a device's updatable properties, such as `annotatedUser`,
   * `annotatedLocation`, `notes`, `orgUnitPath`, or `annotatedAssetId`.
   * (chromeosdevices.update)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $deviceId The unique ID of the device. The `deviceId`s are
   * returned in the response from the [chromeosdevices.list](/admin-
   * sdk/v1/reference/chromeosdevices/list) method.
   * @param ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return ChromeOsDevice
   */
  public function update($customerId, $deviceId, ChromeOsDevice $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ChromeOsDevice::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Chromeosdevices::class, 'Google_Service_Directory_Resource_Chromeosdevices');
