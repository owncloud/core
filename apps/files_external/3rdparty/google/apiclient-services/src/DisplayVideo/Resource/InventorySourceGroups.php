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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\InventorySourceGroup;
use Google\Service\DisplayVideo\ListInventorySourceGroupsResponse;

/**
 * The "inventorySourceGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $inventorySourceGroups = $displayvideoService->inventorySourceGroups;
 *  </code>
 */
class InventorySourceGroups extends \Google\Service\Resource
{
  /**
   * Creates a new inventory source group. Returns the newly created inventory
   * source group if successful. (inventorySourceGroups.create)
   *
   * @param InventorySourceGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the
   * inventory source group. The parent partner will not have access to this
   * group.
   * @opt_param string partnerId The ID of the partner that owns the inventory
   * source group. Only this partner will have write access to this group. Only
   * advertisers to which this group is explicitly shared will have read access to
   * this group.
   * @return InventorySourceGroup
   */
  public function create(InventorySourceGroup $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], InventorySourceGroup::class);
  }
  /**
   * Deletes an inventory source group. (inventorySourceGroups.delete)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the
   * inventory source group. The parent partner does not have access to this
   * group.
   * @opt_param string partnerId The ID of the partner that owns the inventory
   * source group. Only this partner has write access to this group.
   * @return DisplayvideoEmpty
   */
  public function delete($inventorySourceGroupId, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Gets an inventory source group. (inventorySourceGroups.get)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the inventory source group. If an inventory source group is partner-owned,
   * only advertisers to which the group is explicitly shared can access the
   * group.
   * @opt_param string partnerId The ID of the partner that has access to the
   * inventory source group. A partner cannot access an advertiser-owned inventory
   * source group.
   * @return InventorySourceGroup
   */
  public function get($inventorySourceGroupId, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], InventorySourceGroup::class);
  }
  /**
   * Lists inventory source groups that are accessible to the current user. The
   * order is defined by the order_by parameter.
   * (inventorySourceGroups.listInventorySourceGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the inventory source group. If an inventory source group is partner-owned,
   * only advertisers to which the group is explicitly shared can access the
   * group.
   * @opt_param string filter Allows filtering by inventory source group
   * properties. Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by the logical operator `OR`. *
   * A restriction has the form of `{field} {operator} {value}`. * The operator
   * must be `EQUALS (=)`. * Supported fields: - `inventorySourceGroupId` The
   * length of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) * `inventorySourceGroupId` The default sorting
   * order is ascending. To specify descending order for a field, a suffix "desc"
   * should be added to the field name. For example, `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListInventorySources` method. If not specified, the
   * first page of results will be returned.
   * @opt_param string partnerId The ID of the partner that has access to the
   * inventory source group. A partner cannot access advertiser-owned inventory
   * source groups.
   * @return ListInventorySourceGroupsResponse
   */
  public function listInventorySourceGroups($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInventorySourceGroupsResponse::class);
  }
  /**
   * Updates an inventory source group. Returns the updated inventory source group
   * if successful. (inventorySourceGroups.patch)
   *
   * @param string $inventorySourceGroupId Output only. The unique ID of the
   * inventory source group. Assigned by the system.
   * @param InventorySourceGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the
   * inventory source group. The parent partner does not have access to this
   * group.
   * @opt_param string partnerId The ID of the partner that owns the inventory
   * source group. Only this partner has write access to this group.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return InventorySourceGroup
   */
  public function patch($inventorySourceGroupId, InventorySourceGroup $postBody, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], InventorySourceGroup::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySourceGroups::class, 'Google_Service_DisplayVideo_Resource_InventorySourceGroups');
