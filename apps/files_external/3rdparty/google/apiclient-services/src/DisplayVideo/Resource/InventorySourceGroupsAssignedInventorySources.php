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

use Google\Service\DisplayVideo\AssignedInventorySource;
use Google\Service\DisplayVideo\BulkEditAssignedInventorySourcesRequest;
use Google\Service\DisplayVideo\BulkEditAssignedInventorySourcesResponse;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListAssignedInventorySourcesResponse;

/**
 * The "assignedInventorySources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $assignedInventorySources = $displayvideoService->assignedInventorySources;
 *  </code>
 */
class InventorySourceGroupsAssignedInventorySources extends \Google\Service\Resource
{
  /**
   * Bulk edits multiple assignments between inventory sources and a single
   * inventory source group. The operation will delete the assigned inventory
   * sources provided in
   * BulkEditAssignedInventorySourcesRequest.deleted_assigned_inventory_sources
   * and then create the assigned inventory sources provided in
   * BulkEditAssignedInventorySourcesRequest.created_assigned_inventory_sources.
   * (assignedInventorySources.bulkEdit)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to which the assignments are assigned.
   * @param BulkEditAssignedInventorySourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditAssignedInventorySourcesResponse
   */
  public function bulkEdit($inventorySourceGroupId, BulkEditAssignedInventorySourcesRequest $postBody, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEdit', [$params], BulkEditAssignedInventorySourcesResponse::class);
  }
  /**
   * Creates an assignment between an inventory source and an inventory source
   * group. (assignedInventorySources.create)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to which the assignment will be assigned.
   * @param AssignedInventorySource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * inventory source group. The parent partner will not have access to this
   * assigned inventory source.
   * @opt_param string partnerId The ID of the partner that owns the parent
   * inventory source group. Only this partner will have write access to this
   * assigned inventory source.
   * @return AssignedInventorySource
   */
  public function create($inventorySourceGroupId, AssignedInventorySource $postBody, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AssignedInventorySource::class);
  }
  /**
   * Deletes the assignment between an inventory source and an inventory source
   * group. (assignedInventorySources.delete)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to which this assignment is assigned.
   * @param string $assignedInventorySourceId Required. The ID of the assigned
   * inventory source to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * inventory source group. The parent partner does not have access to this
   * assigned inventory source.
   * @opt_param string partnerId The ID of the partner that owns the parent
   * inventory source group. Only this partner has write access to this assigned
   * inventory source.
   * @return DisplayvideoEmpty
   */
  public function delete($inventorySourceGroupId, $assignedInventorySourceId, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId, 'assignedInventorySourceId' => $assignedInventorySourceId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Lists inventory sources assigned to an inventory source group.
   * (assignedInventorySources.listInventorySourceGroupsAssignedInventorySources)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to which these assignments are assigned.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the assignment. If the parent inventory source group is partner-owned, only
   * advertisers to which the parent group is explicitly shared can access the
   * assigned inventory source.
   * @opt_param string filter Allows filtering by assigned inventory source
   * fields. Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by the logical operator `OR`. *
   * A restriction has the form of `{field} {operator} {value}`. * The operator
   * must be `EQUALS (=)`. * Supported fields: - `assignedInventorySourceId` The
   * length of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `assignedInventorySourceId` (default) The default sorting order is
   * ascending. To specify descending order for a field, a suffix " desc" should
   * be added to the field name. Example: `assignedInventorySourceId desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListAssignedInventorySources` method. If not specified,
   * the first page of results will be returned.
   * @opt_param string partnerId The ID of the partner that has access to the
   * assignment. If the parent inventory source group is advertiser-owned, the
   * assignment cannot be accessed via a partner.
   * @return ListAssignedInventorySourcesResponse
   */
  public function listInventorySourceGroupsAssignedInventorySources($inventorySourceGroupId, $optParams = [])
  {
    $params = ['inventorySourceGroupId' => $inventorySourceGroupId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAssignedInventorySourcesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySourceGroupsAssignedInventorySources::class, 'Google_Service_DisplayVideo_Resource_InventorySourceGroupsAssignedInventorySources');
