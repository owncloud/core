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
 * The "insertionOrders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $insertionOrders = $displayvideoService->insertionOrders;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_AdvertisersInsertionOrders extends Google_Service_Resource
{
  /**
   * Lists assigned targeting options of an insertion order across targeting
   * types. (insertionOrders.bulkListInsertionOrderAssignedTargetingOptions)
   *
   * @param string $advertiserId Required. The ID of the advertiser the insertion
   * order belongs to.
   * @param string $insertionOrderId Required. The ID of the insertion order to
   * list assigned targeting options for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by assigned targeting option
   * properties. Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by the logical operator `OR` on
   * the same field. * A restriction has the form of `{field} {operator} {value}`.
   * * The operator must be `EQUALS (=)`. * Supported fields: - `targetingType` -
   * `inheritance` Examples: * AssignedTargetingOptions of targeting type
   * TARGETING_TYPE_PROXIMITY_LOCATION_LIST or TARGETING_TYPE_CHANNEL
   * `targetingType="TARGETING_TYPE_PROXIMITY_LOCATION_LIST" OR
   * targetingType="TARGETING_TYPE_CHANNEL"` * AssignedTargetingOptions with
   * inheritance status of NOT_INHERITED or INHERITED_FROM_PARTNER
   * `inheritance="NOT_INHERITED" OR inheritance="INHERITED_FROM_PARTNER"` The
   * length of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `targetingType` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix "desc" should be added to the
   * field name. Example: `targetingType desc`.
   * @opt_param int pageSize Requested page size. The size must be an integer
   * between `1` and `5000`. If unspecified, the default is `5000`. Returns error
   * code `INVALID_ARGUMENT` if an invalid value is specified.
   * @opt_param string pageToken A token that lets the client fetch the next page
   * of results. Typically, this is the value of next_page_token returned from the
   * previous call to `BulkListInsertionOrderAssignedTargetingOptions` method. If
   * not specified, the first page of results will be returned.
   * @return Google_Service_DisplayVideo_BulkListInsertionOrderAssignedTargetingOptionsResponse
   */
  public function bulkListInsertionOrderAssignedTargetingOptions($advertiserId, $insertionOrderId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'insertionOrderId' => $insertionOrderId);
    $params = array_merge($params, $optParams);
    return $this->call('bulkListInsertionOrderAssignedTargetingOptions', array($params), "Google_Service_DisplayVideo_BulkListInsertionOrderAssignedTargetingOptionsResponse");
  }
  /**
   * Creates a new insertion order. Returns the newly created insertion order if
   * successful. (insertionOrders.create)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * insertion order belongs to.
   * @param Google_Service_DisplayVideo_InsertionOrder $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_InsertionOrder
   */
  public function create($advertiserId, Google_Service_DisplayVideo_InsertionOrder $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_InsertionOrder");
  }
  /**
   * Deletes an insertion order. Returns error code `NOT_FOUND` if the insertion
   * order does not exist. The insertion order should be archived first, i.e. set
   * entity_status to `ENTITY_STATUS_ARCHIVED`, to be able to delete it.
   * (insertionOrders.delete)
   *
   * @param string $advertiserId The ID of the advertiser this insertion order
   * belongs to.
   * @param string $insertionOrderId The ID of the insertion order we need to
   * delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_DisplayvideoEmpty
   */
  public function delete($advertiserId, $insertionOrderId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'insertionOrderId' => $insertionOrderId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DisplayVideo_DisplayvideoEmpty");
  }
  /**
   * Gets an insertion order. Returns error code `NOT_FOUND` if the insertion
   * order does not exist. (insertionOrders.get)
   *
   * @param string $advertiserId Required. The ID of the advertiser this insertion
   * order belongs to.
   * @param string $insertionOrderId Required. The ID of the insertion order to
   * fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_InsertionOrder
   */
  public function get($advertiserId, $insertionOrderId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'insertionOrderId' => $insertionOrderId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_InsertionOrder");
  }
  /**
   * Lists insertion orders in an advertiser. The order is defined by the order_by
   * parameter. If a filter by entity_status is not specified, insertion orders
   * with `ENTITY_STATUS_ARCHIVED` will not be included in the results.
   * (insertionOrders.listAdvertisersInsertionOrders)
   *
   * @param string $advertiserId Required. The ID of the advertiser to list
   * insertion orders for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by insertion order properties.
   * Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by `AND` or `OR` logical
   * operators. A sequence of restrictions implicitly uses `AND`. * A restriction
   * has the form of `{field} {operator} {value}`. * The operator used on
   * `budget.budget_segments.date_range.end_date` must be LESS THAN (<). * The
   * operator used on `updateTime` must be `GREATER THAN OR EQUAL TO (>=)` or
   * `LESS THAN OR EQUAL TO (<=)`. * The operators used on all other fields must
   * be `EQUALS (=)`. * Supported fields: - `campaignId` - `displayName` -
   * `entityStatus` - `budget.budget_segments.date_range.end_date` (input as YYYY-
   * MM-DD) - `updateTime` (input in ISO 8601 format, or YYYY-MM-DDTHH:MM:SSZ)
   * Examples: * All insertion orders under a campaign: `campaignId="1234"` * All
   * `ENTITY_STATUS_ACTIVE` or `ENTITY_STATUS_PAUSED` insertion orders under an
   * advertiser: `(entityStatus="ENTITY_STATUS_ACTIVE" OR
   * entityStatus="ENTITY_STATUS_PAUSED")` * All insertion orders whose budget
   * segments' dates end before March 28, 2019:
   * `budget.budget_segments.date_range.end_date<"2019-03-28"` * All insertion
   * orders with an update time less than or equal to `2020-11-04T18:54:47Z
   * (format of ISO 8601)`: `updateTime<="2020-11-04T18:54:47Z"` * All insertion
   * orders with an update time greater than or equal to `2020-11-04T18:54:47Z
   * (format of ISO 8601)`: `updateTime>="2020-11-04T18:54:47Z"` The length of
   * this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * "displayName" (default) * "entityStatus" * "updateTime" The default
   * sorting order is ascending. To specify descending order for a field, a suffix
   * "desc" should be added to the field name. Example: `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListInsertionOrders` method. If not specified, the
   * first page of results will be returned.
   * @return Google_Service_DisplayVideo_ListInsertionOrdersResponse
   */
  public function listAdvertisersInsertionOrders($advertiserId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListInsertionOrdersResponse");
  }
  /**
   * Updates an existing insertion order. Returns the updated insertion order if
   * successful. (insertionOrders.patch)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * insertion order belongs to.
   * @param string $insertionOrderId Output only. The unique ID of the insertion
   * order. Assigned by the system.
   * @param Google_Service_DisplayVideo_InsertionOrder $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Google_Service_DisplayVideo_InsertionOrder
   */
  public function patch($advertiserId, $insertionOrderId, Google_Service_DisplayVideo_InsertionOrder $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'insertionOrderId' => $insertionOrderId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DisplayVideo_InsertionOrder");
  }
}
