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
 *   $smartdevicemanagementService = new Google_Service_SmartDeviceManagement(...);
 *   $devices = $smartdevicemanagementService->devices;
 *  </code>
 */
class Google_Service_SmartDeviceManagement_Resource_EnterprisesDevices extends Google_Service_Resource
{
  /**
   * Executes a command to device managed by the enterprise.
   * (devices.executeCommand)
   *
   * @param string $name The name of the device requested. For example:
   * "enterprises/XYZ/devices/123"
   * @param Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandResponse
   */
  public function executeCommand($name, Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('executeCommand', array($params), "Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandResponse");
  }
  /**
   * Gets a device managed by the enterprise. (devices.get)
   *
   * @param string $name The name of the device requested. For example:
   * "enterprises/XYZ/devices/123"
   * @param array $optParams Optional parameters.
   * @return Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1Device
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1Device");
  }
  /**
   * Lists devices managed by the enterprise. (devices.listEnterprisesDevices)
   *
   * @param string $parent The parent enterprise to list devices under. E.g.
   * "enterprises/XYZ".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional filter to list devices. Filters can be done
   * on: Device custom name (substring match): 'customName=wing'
   * @opt_param string pageToken Optional token of the page to retrieve.
   * @opt_param int pageSize Optional requested page size. Server may return fewer
   * devices than requested. If unspecified, server will pick an appropriate
   * default.
   * @return Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ListDevicesResponse
   */
  public function listEnterprisesDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ListDevicesResponse");
  }
}
