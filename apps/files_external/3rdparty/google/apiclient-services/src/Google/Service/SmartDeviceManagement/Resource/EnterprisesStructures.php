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
 * The "structures" collection of methods.
 * Typical usage is:
 *  <code>
 *   $smartdevicemanagementService = new Google_Service_SmartDeviceManagement(...);
 *   $structures = $smartdevicemanagementService->structures;
 *  </code>
 */
class Google_Service_SmartDeviceManagement_Resource_EnterprisesStructures extends Google_Service_Resource
{
  /**
   * Gets a structure managed by the enterprise. (structures.get)
   *
   * @param string $name The name of the structure requested. For example:
   * "enterprises/XYZ/structures/ABC".
   * @param array $optParams Optional parameters.
   * @return Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1Structure
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1Structure");
  }
  /**
   * Lists structures managed by the enterprise.
   * (structures.listEnterprisesStructures)
   *
   * @param string $parent The parent enterprise to list structures under. E.g.
   * "enterprises/XYZ".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional filter to list structures.
   * @opt_param string pageToken The token of the page to retrieve.
   * @opt_param int pageSize Requested page size. Server may return fewer
   * structures than requested. If unspecified, server will pick an appropriate
   * default.
   * @return Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ListStructuresResponse
   */
  public function listEnterprisesStructures($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ListStructuresResponse");
  }
}
