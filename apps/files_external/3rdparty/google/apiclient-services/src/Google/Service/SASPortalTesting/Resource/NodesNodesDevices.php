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
 *   $prod_tt_sasportalService = new Google_Service_SASPortalTesting(...);
 *   $devices = $prod_tt_sasportalService->devices;
 *  </code>
 */
class Google_Service_SASPortalTesting_Resource_NodesNodesDevices extends Google_Service_Resource
{
  /**
   * Creates a device under a node or customer. Returned devices are unordered.
   * (devices.bulk)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param Google_Service_SASPortalTesting_SasPortalBulkCreateDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalBulkCreateDeviceResponse
   */
  public function bulk($parent, Google_Service_SASPortalTesting_SasPortalBulkCreateDeviceRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulk', array($params), "Google_Service_SASPortalTesting_SasPortalBulkCreateDeviceResponse");
  }
  /**
   * Creates a device under a node or customer. (devices.create)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param Google_Service_SASPortalTesting_SasPortalDevice $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalDevice
   */
  public function create($parent, Google_Service_SASPortalTesting_SasPortalDevice $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_SASPortalTesting_SasPortalDevice");
  }
  /**
   * Creates a signed device under a node or customer. (devices.createSigned)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param Google_Service_SASPortalTesting_SasPortalCreateSignedDeviceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalDevice
   */
  public function createSigned($parent, Google_Service_SASPortalTesting_SasPortalCreateSignedDeviceRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createSigned', array($params), "Google_Service_SASPortalTesting_SasPortalDevice");
  }
  /**
   * Lists devices under a node or customer. (devices.listNodesNodesDevices)
   *
   * @param string $parent Required. The name of the parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListDevices that indicates where this listing should continue from.
   * @opt_param int pageSize The maximum number of devices to return in the
   * response. If empty or zero, all devices will be listed. Must be in the range
   * [0, 1000].
   * @opt_param string filter The filter expression. The filter should have one of
   * the following formats: "sn=123454" or "display_name=MyDevice". sn corresponds
   * to serial_number of the device. The filter is case insensitive.
   * @return Google_Service_SASPortalTesting_SasPortalListDevicesResponse
   */
  public function listNodesNodesDevices($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SASPortalTesting_SasPortalListDevicesResponse");
  }
}
