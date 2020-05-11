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
class Google_Service_CloudIot_Resource_ProjectsLocationsRegistriesDevices extends Google_Service_Resource
{
  /**
   * Creates a device in a device registry. (devices.create)
   *
   * @param string $parent Required. The name of the device registry where this
   * device should be created. For example, `projects/example-project/locations
   * /us-central1/registries/my-registry`.
   * @param Google_Service_CloudIot_Device $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIot_Device
   */
  public function create($parent, Google_Service_CloudIot_Device $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudIot_Device");
  }
  /**
   * Deletes a device. (devices.delete)
   *
   * @param string $name Required. The name of the device. For example,
   * `projects/p0/locations/us-central1/registries/registry0/devices/device0` or
   * `projects/p0/locations/us-central1/registries/registry0/devices/{num_id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIot_CloudiotEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudIot_CloudiotEmpty");
  }
  /**
   * Gets details about a device. (devices.get)
   *
   * @param string $name Required. The name of the device. For example,
   * `projects/p0/locations/us-central1/registries/registry0/devices/device0` or
   * `projects/p0/locations/us-central1/registries/registry0/devices/{num_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fieldMask The fields of the `Device` resource to be
   * returned in the response. If the field mask is unset or empty, all fields are
   * returned.
   * @return Google_Service_CloudIot_Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudIot_Device");
  }
  /**
   * List devices in a device registry.
   * (devices.listProjectsLocationsRegistriesDevices)
   *
   * @param string $parent Required. The device registry path. Required. For
   * example, `projects/my-project/locations/us-central1/registries/my-registry`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gatewayListOptions.associationsGatewayId If set, only
   * devices associated with the specified gateway are returned. The gateway ID
   * can be numeric (`num_id`) or the user-defined string (`id`). For example, if
   * `123` is specified, only devices bound to the gateway with `num_id` 123 are
   * returned.
   * @opt_param string fieldMask The fields of the `Device` resource to be
   * returned in the response. The fields `id` and `num_id` are always returned,
   * along with any other fields specified.
   * @opt_param string pageToken The value returned by the last
   * `ListDevicesResponse`; indicates that this is a continuation of a prior
   * `ListDevices` call and the system should return the next page of data.
   * @opt_param int pageSize The maximum number of devices to return in the
   * response. If this value is zero, the service will select a default size. A
   * call may return fewer objects than requested. A non-empty `next_page_token`
   * in the response indicates that more data is available.
   * @opt_param string deviceIds A list of device string IDs. For example,
   * `['device0', 'device12']`. If empty, this field is ignored. Maximum IDs:
   * 10,000
   * @opt_param string gatewayListOptions.associationsDeviceId If set, returns
   * only the gateways with which the specified device is associated. The device
   * ID can be numeric (`num_id`) or the user-defined string (`id`). For example,
   * if `456` is specified, returns only the gateways to which the device with
   * `num_id` 456 is bound.
   * @opt_param string deviceNumIds A list of device numeric IDs. If empty, this
   * field is ignored. Maximum IDs: 10,000.
   * @opt_param string gatewayListOptions.gatewayType If `GATEWAY` is specified,
   * only gateways are returned. If `NON_GATEWAY` is specified, only non-gateway
   * devices are returned. If `GATEWAY_TYPE_UNSPECIFIED` is specified, all devices
   * are returned.
   * @return Google_Service_CloudIot_ListDevicesResponse
   */
  public function listProjectsLocationsRegistriesDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIot_ListDevicesResponse");
  }
  /**
   * Modifies the configuration for the device, which is eventually sent from the
   * Cloud IoT Core servers. Returns the modified configuration version and its
   * metadata. (devices.modifyCloudToDeviceConfig)
   *
   * @param string $name Required. The name of the device. For example,
   * `projects/p0/locations/us-central1/registries/registry0/devices/device0` or
   * `projects/p0/locations/us-central1/registries/registry0/devices/{num_id}`.
   * @param Google_Service_CloudIot_ModifyCloudToDeviceConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIot_DeviceConfig
   */
  public function modifyCloudToDeviceConfig($name, Google_Service_CloudIot_ModifyCloudToDeviceConfigRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyCloudToDeviceConfig', array($params), "Google_Service_CloudIot_DeviceConfig");
  }
  /**
   * Updates a device. (devices.patch)
   *
   * @param string $name The resource path name. For example,
   * `projects/p1/locations/us-central1/registries/registry0/devices/dev0` or
   * `projects/p1/locations/us-central1/registries/registry0/devices/{num_id}`.
   * When `name` is populated as a response from the service, it always ends in
   * the device numeric ID.
   * @param Google_Service_CloudIot_Device $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Only updates the `device` fields
   * indicated by this mask. The field mask must not be empty, and it must not
   * contain fields that are immutable or only set by the server. Mutable top-
   * level fields: `credentials`, `blocked`, and `metadata`
   * @return Google_Service_CloudIot_Device
   */
  public function patch($name, Google_Service_CloudIot_Device $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudIot_Device");
  }
  /**
   * Sends a command to the specified device. In order for a device to be able to
   * receive commands, it must: 1) be connected to Cloud IoT Core using the MQTT
   * protocol, and 2) be subscribed to the group of MQTT topics specified by
   * /devices/{device-id}/commands/#. This subscription will receive commands
   * at the top-level topic /devices/{device-id}/commands as well as commands
   * for subfolders, like /devices/{device-id}/commands/subfolder.    Note that
   * subscribing to specific subfolders is not supported. If the command could not
   * be delivered to the device, this method will return an error; in particular,
   * if the device is not subscribed, this method will return FAILED_PRECONDITION.
   * Otherwise, this method will return OK. If the subscription is QoS 1, at least
   * once delivery will be guaranteed; for QoS 0, no acknowledgment will be
   * expected from the device. (devices.sendCommandToDevice)
   *
   * @param string $name Required. The name of the device. For example,
   * `projects/p0/locations/us-central1/registries/registry0/devices/device0` or
   * `projects/p0/locations/us-central1/registries/registry0/devices/{num_id}`.
   * @param Google_Service_CloudIot_SendCommandToDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIot_SendCommandToDeviceResponse
   */
  public function sendCommandToDevice($name, Google_Service_CloudIot_SendCommandToDeviceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('sendCommandToDevice', array($params), "Google_Service_CloudIot_SendCommandToDeviceResponse");
  }
}
