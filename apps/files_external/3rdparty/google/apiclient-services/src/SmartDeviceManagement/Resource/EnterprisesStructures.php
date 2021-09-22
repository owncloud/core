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

use Google\Service\SmartDeviceManagement\GoogleHomeEnterpriseSdmV1ListStructuresResponse;
use Google\Service\SmartDeviceManagement\GoogleHomeEnterpriseSdmV1Structure;

/**
 * The "structures" collection of methods.
 * Typical usage is:
 *  <code>
 *   $smartdevicemanagementService = new Google\Service\SmartDeviceManagement(...);
 *   $structures = $smartdevicemanagementService->structures;
 *  </code>
 */
class EnterprisesStructures extends \Google\Service\Resource
{
  /**
   * Gets a structure managed by the enterprise. (structures.get)
   *
   * @param string $name The name of the structure requested. For example:
   * "enterprises/XYZ/structures/ABC".
   * @param array $optParams Optional parameters.
   * @return GoogleHomeEnterpriseSdmV1Structure
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleHomeEnterpriseSdmV1Structure::class);
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
   * @opt_param int pageSize Requested page size. Server may return fewer
   * structures than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string pageToken The token of the page to retrieve.
   * @return GoogleHomeEnterpriseSdmV1ListStructuresResponse
   */
  public function listEnterprisesStructures($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleHomeEnterpriseSdmV1ListStructuresResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterprisesStructures::class, 'Google_Service_SmartDeviceManagement_Resource_EnterprisesStructures');
