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
 * The "assignedInventorySources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $assignedInventorySources = $displayvideoService->assignedInventorySources;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_InventorySourceGroupsAssignedInventorySources extends Google_Service_Resource
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
   * @param Google_Service_DisplayVideo_BulkEditAssignedInventorySourcesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_BulkEditAssignedInventorySourcesResponse
   */
  public function bulkEdit($inventorySourceGroupId, Google_Service_DisplayVideo_BulkEditAssignedInventorySourcesRequest $postBody, $optParams = array())
  {
    $params = array('inventorySourceGroupId' => $inventorySourceGroupId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulkEdit', array($params), "Google_Service_DisplayVideo_BulkEditAssignedInventorySourcesResponse");
  }
  /**
   * Creates an assignment between an inventory source and an inventory source
   * group. (assignedInventorySources.create)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to which the assignment will be assigned.
   * @param Google_Service_DisplayVideo_AssignedInventorySource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the parent
   * inventory source group. Only this partner will have write access to this
   * assigned inventory source.
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * inventory source group. The parent partner will not have access to this
   * assigned inventory source.
   * @return Google_Service_DisplayVideo_AssignedInventorySource
   */
  public function create($inventorySourceGroupId, Google_Service_DisplayVideo_AssignedInventorySource $postBody, $optParams = array())
  {
    $params = array('inventorySourceGroupId' => $inventorySourceGroupId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_AssignedInventorySource");
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
   * @opt_param string partnerId The ID of the partner that owns the parent
   * inventory source group. Only this partner has write access to this assigned
   * inventory source.
   * @opt_param string advertiserId The ID of the advertiser that owns the parent
   * inventory source group. The parent partner does not have access to this
   * assigned inventory source.
   * @return Google_Service_DisplayVideo_DisplayvideoEmpty
   */
  public function delete($inventorySourceGroupId, $assignedInventorySourceId, $optParams = array())
  {
    $params = array('inventorySourceGroupId' => $inventorySourceGroupId, 'assignedInventorySourceId' => $assignedInventorySourceId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DisplayVideo_DisplayvideoEmpty");
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
   * @opt_param string partnerId The ID of the partner that has access to the
   * assignment. If the parent inventory source group is advertiser-owned, the
   * assignment cannot be accessed via a partner.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListAssignedInventorySources` method. If not specified,
   * the first page of results will be returned.
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
   * @return Google_Service_DisplayVideo_ListAssignedInventorySourcesResponse
   */
  public function listInventorySourceGroupsAssignedInventorySources($inventorySourceGroupId, $optParams = array())
  {
    $params = array('inventorySourceGroupId' => $inventorySourceGroupId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListAssignedInventorySourcesResponse");
  }
}
