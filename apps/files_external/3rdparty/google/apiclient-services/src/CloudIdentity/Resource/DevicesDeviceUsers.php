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

namespace Google\Service\CloudIdentity\Resource;

use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1ApproveDeviceUserRequest;
use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1BlockDeviceUserRequest;
use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1CancelWipeDeviceUserRequest;
use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1DeviceUser;
use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1ListDeviceUsersResponse;
use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1LookupSelfDeviceUsersResponse;
use Google\Service\CloudIdentity\GoogleAppsCloudidentityDevicesV1WipeDeviceUserRequest;
use Google\Service\CloudIdentity\Operation;

/**
 * The "deviceUsers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudidentityService = new Google\Service\CloudIdentity(...);
 *   $deviceUsers = $cloudidentityService->deviceUsers;
 *  </code>
 */
class DevicesDeviceUsers extends \Google\Service\Resource
{
  /**
   * Approves device to access user data. (deviceUsers.approve)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device}/deviceUsers/{device_user}`, where device is the
   * unique ID assigned to the Device, and device_user is the unique ID assigned
   * to the User.
   * @param GoogleAppsCloudidentityDevicesV1ApproveDeviceUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function approve($name, GoogleAppsCloudidentityDevicesV1ApproveDeviceUserRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('approve', [$params], Operation::class);
  }
  /**
   * Blocks device from accessing user data (deviceUsers.block)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device}/deviceUsers/{device_user}`, where device is the
   * unique ID assigned to the Device, and device_user is the unique ID assigned
   * to the User.
   * @param GoogleAppsCloudidentityDevicesV1BlockDeviceUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function block($name, GoogleAppsCloudidentityDevicesV1BlockDeviceUserRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('block', [$params], Operation::class);
  }
  /**
   * Cancels an unfinished user account wipe. This operation can be used to cancel
   * device wipe in the gap between the wipe operation returning success and the
   * device being wiped. (deviceUsers.cancelWipe)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device}/deviceUsers/{device_user}`, where device is the
   * unique ID assigned to the Device, and device_user is the unique ID assigned
   * to the User.
   * @param GoogleAppsCloudidentityDevicesV1CancelWipeDeviceUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cancelWipe($name, GoogleAppsCloudidentityDevicesV1CancelWipeDeviceUserRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancelWipe', [$params], Operation::class);
  }
  /**
   * Deletes the specified DeviceUser. This also revokes the user's access to
   * device data. (deviceUsers.delete)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device}/deviceUsers/{device_user}`, where device is the
   * unique ID assigned to the Device, and device_user is the unique ID assigned
   * to the User.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Optional. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the customer.
   * If you're using this API for your own organization, use
   * `customers/my_customer` If you're using this API to manage another
   * organization, use `customers/{customer}`, where customer is the customer to
   * whom the device belongs.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves the specified DeviceUser (deviceUsers.get)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device}/deviceUsers/{device_user}`, where device is the
   * unique ID assigned to the Device, and device_user is the unique ID assigned
   * to the User.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Optional. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the customer.
   * If you're using this API for your own organization, use
   * `customers/my_customer` If you're using this API to manage another
   * organization, use `customers/{customer}`, where customer is the customer to
   * whom the device belongs.
   * @return GoogleAppsCloudidentityDevicesV1DeviceUser
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAppsCloudidentityDevicesV1DeviceUser::class);
  }
  /**
   * Lists/Searches DeviceUsers. (deviceUsers.listDevicesDeviceUsers)
   *
   * @param string $parent Required. To list all DeviceUsers, set this to
   * "devices/-". To list all DeviceUsers owned by a device, set this to the
   * resource name of the device. Format: devices/{device}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Optional. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the customer.
   * If you're using this API for your own organization, use
   * `customers/my_customer` If you're using this API to manage another
   * organization, use `customers/{customer}`, where customer is the customer to
   * whom the device belongs.
   * @opt_param string filter Optional. Additional restrictions when fetching list
   * of devices. For a list of search fields, refer to [Mobile device search
   * fields](https://developers.google.com/admin-sdk/directory/v1/search-
   * operators). Multiple search fields are separated by the space character.
   * @opt_param string orderBy Optional. Order specification for devices in the
   * response.
   * @opt_param int pageSize Optional. The maximum number of DeviceUsers to
   * return. If unspecified, at most 5 DeviceUsers will be returned. The maximum
   * value is 20; values above 20 will be coerced to 20.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListDeviceUsers` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListBooks` must match the call
   * that provided the page token.
   * @return GoogleAppsCloudidentityDevicesV1ListDeviceUsersResponse
   */
  public function listDevicesDeviceUsers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAppsCloudidentityDevicesV1ListDeviceUsersResponse::class);
  }
  /**
   * Looks up resource names of the DeviceUsers associated with the caller's
   * credentials, as well as the properties provided in the request. This method
   * must be called with end-user credentials with the scope:
   * https://www.googleapis.com/auth/cloud-identity.devices.lookup If multiple
   * properties are provided, only DeviceUsers having all of these properties are
   * considered as matches - i.e. the query behaves like an AND. Different
   * platforms require different amounts of information from the caller to ensure
   * that the DeviceUser is uniquely identified. - iOS: No properties need to be
   * passed, the caller's credentials are sufficient to identify the corresponding
   * DeviceUser. - Android: Specifying the 'android_id' field is required. -
   * Desktop: Specifying the 'raw_resource_id' field is required.
   * (deviceUsers.lookup)
   *
   * @param string $parent Must be set to "devices/-/deviceUsers" to search across
   * all DeviceUser belonging to the user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string androidId Android Id returned by [Settings.Secure#ANDROID_I
   * D](https://developer.android.com/reference/android/provider/Settings.Secure.h
   * tml#ANDROID_ID).
   * @opt_param int pageSize The maximum number of DeviceUsers to return. If
   * unspecified, at most 20 DeviceUsers will be returned. The maximum value is
   * 20; values above 20 will be coerced to 20.
   * @opt_param string pageToken A page token, received from a previous
   * `LookupDeviceUsers` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `LookupDeviceUsers` must match
   * the call that provided the page token.
   * @opt_param string rawResourceId Raw Resource Id used by Google Endpoint
   * Verification. If the user is enrolled into Google Endpoint Verification, this
   * id will be saved as the 'device_resource_id' field in the following platform
   * dependent files. Mac: ~/.secureConnect/context_aware_config.json Windows:
   * C:\Users\%USERPROFILE%\.secureConnect\context_aware_config.json Linux:
   * ~/.secureConnect/context_aware_config.json
   * @opt_param string userId The user whose DeviceUser's resource name will be
   * fetched. Must be set to 'me' to fetch the DeviceUser's resource name for the
   * calling user.
   * @return GoogleAppsCloudidentityDevicesV1LookupSelfDeviceUsersResponse
   */
  public function lookup($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('lookup', [$params], GoogleAppsCloudidentityDevicesV1LookupSelfDeviceUsersResponse::class);
  }
  /**
   * Wipes the user's account on a device. Other data on the device that is not
   * associated with the user's work account is not affected. For example, if a
   * Gmail app is installed on a device that is used for personal and work
   * purposes, and the user is logged in to the Gmail app with their personal
   * account as well as their work account, wiping the "deviceUser" by their work
   * administrator will not affect their personal account within Gmail or other
   * apps such as Photos. (deviceUsers.wipe)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Device in
   * format: `devices/{device}/deviceUsers/{device_user}`, where device is the
   * unique ID assigned to the Device, and device_user is the unique ID assigned
   * to the User.
   * @param GoogleAppsCloudidentityDevicesV1WipeDeviceUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function wipe($name, GoogleAppsCloudidentityDevicesV1WipeDeviceUserRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('wipe', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DevicesDeviceUsers::class, 'Google_Service_CloudIdentity_Resource_DevicesDeviceUsers');
