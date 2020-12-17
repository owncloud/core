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
 *   $cloudidentityService = new Google_Service_CloudIdentity(...);
 *   $devices = $cloudidentityService->devices;
 *  </code>
 */
class Google_Service_CloudIdentity_Resource_Devices extends Google_Service_Resource
{
  /**
   * Cancels an unfinished device wipe. This operation can be used to cancel
   * device wipe in the gap between the wipe operation returning success and the
   * device being wiped. This operation is possible when the device is in a
   * "pending wipe" state. The device enters the "pending wipe" state when a wipe
   * device command is issued, but has not yet been sent to the device. The cancel
   * wipe will fail if the wipe command has already been issued to the device.
   * (devices.cancelWipe)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device_id}`, where device_id is the unique ID assigned to
   * the Device.
   * @param Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1CancelWipeDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function cancelWipe($name, Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1CancelWipeDeviceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancelWipe', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Creates a device. Only company-owned device may be created. (devices.create)
   *
   * @param Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1Device $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the customer.
   * If you're using this API for your own organization, use
   * `customers/my_customer` If you're using this API to manage another
   * organization, use `customers/{customer_id}`, where customer_id is the
   * customer to whom the device belongs.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function create(Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1Device $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Deletes the specified device. (devices.delete)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device_id}`, where device_id is the unique ID assigned to
   * the Device.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the customer.
   * If you're using this API for your own organization, use
   * `customers/my_customer` If you're using this API to manage another
   * organization, use `customers/{customer_id}`, where customer_id is the
   * customer to whom the device belongs.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Retrieves the specified device. (devices.get)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * the format: `devices/{device_id}`, where device_id is the unique ID assigned
   * to the Device.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Customer in
   * the format: `customers/{customer_id}`, where customer_id is the customer to
   * whom the device belongs. If you're using this API for your own organization,
   * use `customers/my_customer`. If you're using this API to manage another
   * organization, use `customers/{customer_id}`, where customer_id is the
   * customer to whom the device belongs.
   * @return Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1Device");
  }
  /**
   * Lists/Searches devices. (devices.listDevices)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the customer in
   * the format: `customers/{customer_id}`, where customer_id is the customer to
   * whom the device belongs. If you're using this API for your own organization,
   * use `customers/my_customer`. If you're using this API to manage another
   * organization, use `customers/{customer_id}`, where customer_id is the
   * customer to whom the device belongs.
   * @opt_param string filter Optional. Additional restrictions when fetching list
   * of devices. For a list of search fields, refer to [Mobile device search
   * fields](https://developers.google.com/admin-sdk/directory/v1/search-
   * operators). Multiple search fields are separated by the space character.
   * @opt_param string orderBy Optional. Order specification for devices in the
   * response. Only one of the following field names may be used to specify the
   * order: `create_time`, `last_sync_time`, `model`, `os_version`, `device_type`
   * and `serial_number`. `desc` may be specified optionally at the end to specify
   * results to be sorted in descending order. Default order is ascending.
   * @opt_param int pageSize Optional. The maximum number of Devices to return. If
   * unspecified, at most 20 Devices will be returned. The maximum value is 100;
   * values above 100 will be coerced to 100.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListDevices` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListDevices` must match the
   * call that provided the page token.
   * @opt_param string view Optional. The view to use for the List request.
   * @return Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1ListDevicesResponse
   */
  public function listDevices($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1ListDevicesResponse");
  }
  /**
   * Wipes all data on the specified device. (devices.wipe)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device_id}/deviceUsers/{device_user_id}`, where device_id
   * is the unique ID assigned to the Device, and device_user_id is the unique ID
   * assigned to the User.
   * @param Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1WipeDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function wipe($name, Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1WipeDeviceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('wipe', array($params), "Google_Service_CloudIdentity_Operation");
  }
}
