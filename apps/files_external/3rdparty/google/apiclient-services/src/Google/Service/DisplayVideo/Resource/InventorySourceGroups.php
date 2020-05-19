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
 * The "inventorySourceGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $inventorySourceGroups = $displayvideoService->inventorySourceGroups;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_InventorySourceGroups extends Google_Service_Resource
{
  /**
   * Gets an inventory source group. (inventorySourceGroups.get)
   *
   * @param string $inventorySourceGroupId Required. The ID of the inventory
   * source group to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the inventory source group.
   *
   * If an inventory source group is partner-owned, only advertisers to which the
   * group is explicitly shared can access the group.
   * @opt_param string partnerId The ID of the partner that has access to the
   * inventory source group.
   *
   * A partner cannot access an advertiser-owned inventory source group.
   * @return Google_Service_DisplayVideo_InventorySourceGroup
   */
  public function get($inventorySourceGroupId, $optParams = array())
  {
    $params = array('inventorySourceGroupId' => $inventorySourceGroupId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_InventorySourceGroup");
  }
  /**
   * Lists inventory source groups that are accessible to the current user.
   *
   * The order is defined by the order_by parameter.
   * (inventorySourceGroups.listInventorySourceGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the inventory source group.
   *
   * If an inventory source group is partner-owned, only advertisers to which the
   * group is explicitly shared can access the group.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are:
   *
   * * `displayName` (default) * `inventorySourceGroupId`
   *
   * The default sorting order is ascending. To specify descending order for a
   * field, a suffix "desc" should be added to the field name. For example,
   * `displayName desc`.
   * @opt_param string partnerId The ID of the partner that has access to the
   * inventory source group.
   *
   * A partner cannot access advertiser-owned inventory source groups.
   * @opt_param string filter Allows filtering by inventory source group
   * properties.
   *
   * Supported syntax:
   *
   * * Filter expressions are made up of one or more restrictions. * Restrictions
   * can be combined by the logical operator `OR`. * A restriction has the form of
   * `{field} {operator} {value}`. * The operator must be `EQUALS (=)`. *
   * Supported fields:     - `inventorySourceGroupId`
   *
   * The length of this field should be no more than 500 characters.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListInventorySources` method. If not specified, the
   * first page of results will be returned.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @return Google_Service_DisplayVideo_ListInventorySourceGroupsResponse
   */
  public function listInventorySourceGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListInventorySourceGroupsResponse");
  }
}
