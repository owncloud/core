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

namespace Google\Service\OSConfig\Resource;

use Google\Service\OSConfig\Inventory;
use Google\Service\OSConfig\ListInventoriesResponse;

/**
 * The "inventories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google\Service\OSConfig(...);
 *   $inventories = $osconfigService->inventories;
 *  </code>
 */
class ProjectsLocationsInstancesInventories extends \Google\Service\Resource
{
  /**
   * Get inventory data for the specified VM instance. If the VM has no associated
   * inventory, the message `NOT_FOUND` is returned. (inventories.get)
   *
   * @param string $name Required. API resource name for inventory resource.
   * Format:
   * `projects/{project}/locations/{location}/instances/{instance}/inventory` For
   * `{project}`, either `project-number` or `project-id` can be provided. For
   * `{instance}`, either Compute Engine `instance-id` or `instance-name` can be
   * provided.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Inventory view indicating what information should be
   * included in the inventory resource. If unspecified, the default view is
   * BASIC.
   * @return Inventory
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Inventory::class);
  }
  /**
   * List inventory data for all VM instances in the specified zone.
   * (inventories.listProjectsLocationsInstancesInventories)
   *
   * @param string $parent Required. The parent resource name. Format:
   * `projects/{project}/locations/{location}/instances/-` For `{project}`, either
   * `project-number` or `project-id` can be provided.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If provided, this field specifies the criteria that
   * must be met by a `Inventory` API resource to be included in the response.
   * @opt_param int pageSize The maximum number of results to return.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to `ListInventories` that indicates where this listing should continue from.
   * @opt_param string view Inventory view indicating what information should be
   * included in the inventory resource. If unspecified, the default view is
   * BASIC.
   * @return ListInventoriesResponse
   */
  public function listProjectsLocationsInstancesInventories($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInventoriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstancesInventories::class, 'Google_Service_OSConfig_Resource_ProjectsLocationsInstancesInventories');
