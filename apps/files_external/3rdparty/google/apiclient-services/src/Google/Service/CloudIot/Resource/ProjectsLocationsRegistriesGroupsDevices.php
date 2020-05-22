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
 *   $cloudiotService = new Google_Service_CloudIot(...);
 *   $devices = $cloudiotService->devices;
 *  </code>
 */
class Google_Service_CloudIot_Resource_ProjectsLocationsRegistriesGroupsDevices extends Google_Service_Resource
{
  /**
   * List devices in a device registry.
   * (devices.listProjectsLocationsRegistriesGroupsDevices)
   *
   * @param string $parent Required. The device registry path. Required. For
   * example, `projects/my-project/locations/us-central1/registries/my-registry`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string deviceIds A list of device string IDs. For example,
   * `['device0', 'device12']`. If empty, this field is ignored. Maximum IDs:
   * 10,000
   * @opt_param string deviceNumIds A list of device numeric IDs. If empty, this
   * field is ignored. Maximum IDs: 10,000.
   * @opt_param string gatewayListOptions.associationsDeviceId If set, returns
   * only the gateways with which the specified device is associated. The device
   * ID can be numeric (`num_id`) or the user-defined string (`id`). For example,
   * if `456` is specified, returns only the gateways to which the device with
   * `num_id` 456 is bound.
   * @opt_param string gatewayListOptions.gatewayType If `GATEWAY` is specified,
   * only gateways are returned. If `NON_GATEWAY` is specified, only non-gateway
   * devices are returned. If `GATEWAY_TYPE_UNSPECIFIED` is specified, all devices
   * are returned.
   * @opt_param string gatewayListOptions.associationsGatewayId If set, only
   * devices associated with the specified gateway are returned. The gateway ID
   * can be numeric (`num_id`) or the user-defined string (`id`). For example, if
   * `123` is specified, only devices bound to the gateway with `num_id` 123 are
   * returned.
   * @opt_param string pageToken The value returned by the last
   * `ListDevicesResponse`; indicates that this is a continuation of a prior
   * `ListDevices` call and the system should return the next page of data.
   * @opt_param string fieldMask The fields of the `Device` resource to be
   * returned in the response. The fields `id` and `num_id` are always returned,
   * along with any other fields specified.
   * @opt_param int pageSize The maximum number of devices to return in the
   * response. If this value is zero, the service will select a default size. A
   * call may return fewer objects than requested. A non-empty `next_page_token`
   * in the response indicates that more data is available.
   * @return Google_Service_CloudIot_ListDevicesResponse
   */
  public function listProjectsLocationsRegistriesGroupsDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIot_ListDevicesResponse");
  }
}
