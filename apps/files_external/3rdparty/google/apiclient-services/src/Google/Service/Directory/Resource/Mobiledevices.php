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
 * The "mobiledevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $mobiledevices = $adminService->mobiledevices;
 *  </code>
 */
class Google_Service_Directory_Resource_Mobiledevices extends Google_Service_Resource
{
  /**
   * Takes an action that affects a mobile device. For example, remotely wiping a
   * device. (mobiledevices.action)
   *
   * @param string $customerId The unique ID for the customer's G Suite account.
   * As an account administrator, you can also use the `my_customer` alias to
   * represent your account's `customerId`. The `customerId` is also returned as
   * part of the [Users resource](/admin-sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID the API service uses to identify the
   * mobile device.
   * @param Google_Service_Directory_MobileDeviceAction $postBody
   * @param array $optParams Optional parameters.
   */
  public function action($customerId, $resourceId, Google_Service_Directory_MobileDeviceAction $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('action', array($params));
  }
  /**
   * Removes a mobile device. (mobiledevices.delete)
   *
   * @param string $customerId The unique ID for the customer's G Suite account.
   * As an account administrator, you can also use the `my_customer` alias to
   * represent your account's `customerId`. The `customerId` is also returned as
   * part of the [Users resource](/admin-sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID the API service uses to identify the
   * mobile device.
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $resourceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a mobile device's properties. (mobiledevices.get)
   *
   * @param string $customerId The unique ID for the customer's G Suite account.
   * As an account administrator, you can also use the `my_customer` alias to
   * represent your account's `customerId`. The `customerId` is also returned as
   * part of the [Users resource](/admin-sdk/directory/v1/reference/users).
   * @param string $resourceId The unique ID the API service uses to identify the
   * mobile device.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @return Google_Service_Directory_MobileDevice
   */
  public function get($customerId, $resourceId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'resourceId' => $resourceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_MobileDevice");
  }
  /**
   * Retrieves a paginated list of all mobile devices for an account.
   * (mobiledevices.listMobiledevices)
   *
   * @param string $customerId The unique ID for the customer's G Suite account.
   * As an account administrator, you can also use the `my_customer` alias to
   * represent your account's `customerId`. The `customerId` is also returned as
   * part of the [Users resource](/admin-sdk/directory/v1/reference/users).
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return. Max allowed
   * value is 100.
   * @opt_param string orderBy Device property to use for sorting results.
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string query Search string in the format given at
   * http://support.google.com/a/bin/answer.py?answer=1408863#search
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Must be used with the `orderBy` parameter.
   * @return Google_Service_Directory_MobileDevices
   */
  public function listMobiledevices($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_MobileDevices");
  }
}
