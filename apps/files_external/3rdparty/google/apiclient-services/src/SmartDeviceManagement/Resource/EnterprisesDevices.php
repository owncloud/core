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

namespace Google\Service\SmartDeviceManagement\Resource;

use Google\Service\SmartDeviceManagement\GoogleHomeEnterpriseSdmV1Device;
use Google\Service\SmartDeviceManagement\GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest;
use Google\Service\SmartDeviceManagement\GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandResponse;
use Google\Service\SmartDeviceManagement\GoogleHomeEnterpriseSdmV1ListDevicesResponse;

/**
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $smartdevicemanagementService = new Google\Service\SmartDeviceManagement(...);
 *   $devices = $smartdevicemanagementService->devices;
 *  </code>
 */
class EnterprisesDevices extends \Google\Service\Resource
{
  /**
   * Executes a command to device managed by the enterprise.
   * (devices.executeCommand)
   *
   * @param string $name The name of the device requested. For example:
   * "enterprises/XYZ/devices/123"
   * @param GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandResponse
   */
  public function executeCommand($name, GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('executeCommand', [$params], GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandResponse::class);
  }
  /**
   * Gets a device managed by the enterprise. (devices.get)
   *
   * @param string $name The name of the device requested. For example:
   * "enterprises/XYZ/devices/123"
   * @param array $optParams Optional parameters.
   * @return GoogleHomeEnterpriseSdmV1Device
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleHomeEnterpriseSdmV1Device::class);
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
   * @opt_param int pageSize Optional requested page size. Server may return fewer
   * devices than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional token of the page to retrieve.
   * @return GoogleHomeEnterpriseSdmV1ListDevicesResponse
   */
  public function listEnterprisesDevices($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleHomeEnterpriseSdmV1ListDevicesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterprisesDevices::class, 'Google_Service_SmartDeviceManagement_Resource_EnterprisesDevices');
