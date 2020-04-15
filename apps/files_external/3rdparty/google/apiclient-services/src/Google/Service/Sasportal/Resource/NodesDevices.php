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
 *   $sasportalService = new Google_Service_Sasportal(...);
 *   $devices = $sasportalService->devices;
 *  </code>
 */
class Google_Service_Sasportal_Resource_NodesDevices extends Google_Service_Resource
{
  /**
   * Creates a device under a node or customer. Returned devices are unordered.
   * (devices.bulk)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param Google_Service_Sasportal_SasPortalBulkCreateDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalBulkCreateDeviceResponse
   */
  public function bulk($parent, Google_Service_Sasportal_SasPortalBulkCreateDeviceRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulk', array($params), "Google_Service_Sasportal_SasPortalBulkCreateDeviceResponse");
  }
  /**
   * Creates a device under a node or customer. (devices.create)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param Google_Service_Sasportal_SasPortalDevice $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalDevice
   */
  public function create($parent, Google_Service_Sasportal_SasPortalDevice $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Sasportal_SasPortalDevice");
  }
  /**
   * Creates a signed device under a node or customer. (devices.createSigned)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param Google_Service_Sasportal_SasPortalCreateSignedDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalDevice
   */
  public function createSigned($parent, Google_Service_Sasportal_SasPortalCreateSignedDeviceRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createSigned', array($params), "Google_Service_Sasportal_SasPortalDevice");
  }
  /**
   * Deletes a device. (devices.delete)
   *
   * @param string $name Required. The name of the device.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Sasportal_SasPortalEmpty");
  }
  /**
   * Gets details about a device. (devices.get)
   *
   * @param string $name Required. The name of the device.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalDevice
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Sasportal_SasPortalDevice");
  }
  /**
   * Lists devices under a node or customer. (devices.listNodesDevices)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListDevices that indicates where this listing should continue from.
   * @opt_param int pageSize The maximum number of devices to return in the
   * response.
   * @opt_param string filter The filter expression. The filter should have one of
   * the following formats: "sn=123454" or "display_name=MyDevice". sn corresponds
   * to serial_number of the device. The filter is case insensitive.
   * @return Google_Service_Sasportal_SasPortalListDevicesResponse
   */
  public function listNodesDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Sasportal_SasPortalListDevicesResponse");
  }
  /**
   * Moves a device under another node or customer. (devices.move)
   *
   * @param string $name Required. The name of the device to move.
   * @param Google_Service_Sasportal_SasPortalMoveDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalOperation
   */
  public function move($name, Google_Service_Sasportal_SasPortalMoveDeviceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_Sasportal_SasPortalOperation");
  }
  /**
   * Updates a device. (devices.patch)
   *
   * @param string $name Output only. The resource path name.
   * @param Google_Service_Sasportal_SasPortalDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated.
   * @return Google_Service_Sasportal_SasPortalDevice
   */
  public function patch($name, Google_Service_Sasportal_SasPortalDevice $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Sasportal_SasPortalDevice");
  }
  /**
   * Signs a device. (devices.signDevice)
   *
   * @param string $name Output only. The resource path name.
   * @param Google_Service_Sasportal_SasPortalSignDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalEmpty
   */
  public function signDevice($name, Google_Service_Sasportal_SasPortalSignDeviceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('signDevice', array($params), "Google_Service_Sasportal_SasPortalEmpty");
  }
  /**
   * Updates a signed device. (devices.updateSigned)
   *
   * @param string $name Required. The name of the device to update.
   * @param Google_Service_Sasportal_SasPortalUpdateSignedDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalDevice
   */
  public function updateSigned($name, Google_Service_Sasportal_SasPortalUpdateSignedDeviceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateSigned', array($params), "Google_Service_Sasportal_SasPortalDevice");
  }
}
