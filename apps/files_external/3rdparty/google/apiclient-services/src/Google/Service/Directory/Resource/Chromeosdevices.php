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
 * The "chromeosdevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $chromeosdevices = $adminService->chromeosdevices;
 *  </code>
 */
class Google_Service_Directory_Resource_Chromeosdevices extends Google_Service_Resource
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
   * @param Google_Service_Directory_ChromeOsDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, Google_Service_Directory_ChromeOsDeviceAction $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('action', array($params));
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
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function get($customerId, $deviceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_ChromeOsDevice");
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
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string orderBy Device property to use for sorting results.
   * @opt_param string orgUnitPath The full path of the organizational unit or its
   * unique ID.
   * @opt_param string pageToken The `pageToken` query parameter is used to
   * request the next page of query results. The follow-on request's `pageToken`
   * query parameter is the `nextPageToken` from your previous response.
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string query Search string in the format given at
   * http://support.google.com/chromeos/a/bin/answer.py?answer=1698333
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Must be used with the `orderBy` parameter.
   * @return Google_Service_Directory_ChromeOsDevices
   */
  public function listChromeosdevices($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_ChromeOsDevices");
  }
  /**
   * Move or insert multiple Chrome OS devices to an organizational unit. You can
   * move up to 50 devices at once. (chromeosdevices.moveDevicesToOu)
   *
   * @param string $customerId Immutable ID of the Google Workspace account
   * @param string $orgUnitPath Full path of the target organizational unit or its
   * ID
   * @param Google_Service_Directory_ChromeOsMoveDevicesToOu $postBody
   * @param array $optParams Optional parameters.
   */
  public function moveDevicesToOu($customerId, $orgUnitPath, Google_Service_Directory_ChromeOsMoveDevicesToOu $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('moveDevicesToOu', array($params));
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
   * @param Google_Service_Directory_ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function patch($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_ChromeOsDevice");
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
   * @param Google_Service_Directory_ChromeOsDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_ChromeOsDevice
   */
  public function update($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_ChromeOsDevice");
  }
}
