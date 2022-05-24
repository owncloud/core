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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\Building;
use Google\Service\Directory\Buildings;

/**
 * The "buildings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $buildings = $adminService->buildings;
 *  </code>
 */
class ResourcesBuildings extends \Google\Service\Resource
{
  /**
   * Deletes a building. (buildings.delete)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $buildingId The id of the building to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $buildingId, $optParams = [])
  {
    $params = ['customer' => $customer, 'buildingId' => $buildingId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a building. (buildings.get)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $buildingId The unique ID of the building to retrieve.
   * @param array $optParams Optional parameters.
   * @return Building
   */
  public function get($customer, $buildingId, $optParams = [])
  {
    $params = ['customer' => $customer, 'buildingId' => $buildingId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Building::class);
  }
  /**
   * Inserts a building. (buildings.insert)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param Building $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string coordinatesSource Source from which Building.coordinates
   * are derived.
   * @return Building
   */
  public function insert($customer, Building $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Building::class);
  }
  /**
   * Retrieves a list of buildings for an account.
   * (buildings.listResourcesBuildings)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @return Buildings
   */
  public function listResourcesBuildings($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Buildings::class);
  }
  /**
   * Patches a building. (buildings.patch)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $buildingId The id of the building to update.
   * @param Building $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string coordinatesSource Source from which Building.coordinates
   * are derived.
   * @return Building
   */
  public function patch($customer, $buildingId, Building $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'buildingId' => $buildingId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Building::class);
  }
  /**
   * Updates a building. (buildings.update)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $buildingId The id of the building to update.
   * @param Building $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string coordinatesSource Source from which Building.coordinates
   * are derived.
   * @return Building
   */
  public function update($customer, $buildingId, Building $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'buildingId' => $buildingId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Building::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcesBuildings::class, 'Google_Service_Directory_Resource_ResourcesBuildings');
