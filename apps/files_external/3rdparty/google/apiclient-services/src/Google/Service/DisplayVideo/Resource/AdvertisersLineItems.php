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
 * The "lineItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $lineItems = $displayvideoService->lineItems;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_AdvertisersLineItems extends Google_Service_Resource
{
  /**
   * Bulk edits targeting options under a single line item. The operation will
   * delete the assigned targeting options provided in
   * BulkEditLineItemAssignedTargetingOptionsRequest.delete_requests and then
   * create the assigned targeting options provided in
   * BulkEditLineItemAssignedTargetingOptionsRequest.create_requests .
   * (lineItems.bulkEditLineItemAssignedTargetingOptions)
   *
   * @param string $advertiserId Required. The ID of the advertiser the line item
   * belongs to.
   * @param string $lineItemId Required. The ID of the line item the assigned
   * targeting option will belong to.
   * @param Google_Service_DisplayVideo_BulkEditLineItemAssignedTargetingOptionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_BulkEditLineItemAssignedTargetingOptionsResponse
   */
  public function bulkEditLineItemAssignedTargetingOptions($advertiserId, $lineItemId, Google_Service_DisplayVideo_BulkEditLineItemAssignedTargetingOptionsRequest $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'lineItemId' => $lineItemId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulkEditLineItemAssignedTargetingOptions', array($params), "Google_Service_DisplayVideo_BulkEditLineItemAssignedTargetingOptionsResponse");
  }
  /**
   * Lists assigned targeting options of a line item across targeting types.
   * (lineItems.bulkListLineItemAssignedTargetingOptions)
   *
   * @param string $advertiserId Required. The ID of the advertiser the line item
   * belongs to.
   * @param string $lineItemId Required. The ID of the line item to list assigned
   * targeting options for.
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
   * between `1` and `5000`. If unspecified, the default is '5000'. Returns error
   * code `INVALID_ARGUMENT` if an invalid value is specified.
   * @opt_param string pageToken A token that lets the client fetch the next page
   * of results. Typically, this is the value of next_page_token returned from the
   * previous call to `BulkListLineItemAssignedTargetingOptions` method. If not
   * specified, the first page of results will be returned.
   * @return Google_Service_DisplayVideo_BulkListLineItemAssignedTargetingOptionsResponse
   */
  public function bulkListLineItemAssignedTargetingOptions($advertiserId, $lineItemId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'lineItemId' => $lineItemId);
    $params = array_merge($params, $optParams);
    return $this->call('bulkListLineItemAssignedTargetingOptions', array($params), "Google_Service_DisplayVideo_BulkListLineItemAssignedTargetingOptionsResponse");
  }
  /**
   * Creates a new line item. Returns the newly created line item if successful.
   * (lineItems.create)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * line item belongs to.
   * @param Google_Service_DisplayVideo_LineItem $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_LineItem
   */
  public function create($advertiserId, Google_Service_DisplayVideo_LineItem $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_LineItem");
  }
  /**
   * Deletes a line item. Returns error code `NOT_FOUND` if the line item does not
   * exist. The line item should be archived first, i.e. set entity_status to
   * `ENTITY_STATUS_ARCHIVED`, to be able to delete it. (lineItems.delete)
   *
   * @param string $advertiserId The ID of the advertiser this line item belongs
   * to.
   * @param string $lineItemId The ID of the line item we need to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_DisplayvideoEmpty
   */
  public function delete($advertiserId, $lineItemId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'lineItemId' => $lineItemId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DisplayVideo_DisplayvideoEmpty");
  }
  /**
   * Gets a line item. (lineItems.get)
   *
   * @param string $advertiserId Required. The ID of the advertiser this line item
   * belongs to.
   * @param string $lineItemId Required. The ID of the line item to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_LineItem
   */
  public function get($advertiserId, $lineItemId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'lineItemId' => $lineItemId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_LineItem");
  }
  /**
   * Lists line items in an advertiser. The order is defined by the order_by
   * parameter. If a filter by entity_status is not specified, line items with
   * `ENTITY_STATUS_ARCHIVED` will not be included in the results.
   * (lineItems.listAdvertisersLineItems)
   *
   * @param string $advertiserId Required. The ID of the advertiser to list line
   * items for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by line item properties. Supported
   * syntax: * Filter expressions are made up of one or more restrictions. *
   * Restrictions can be combined by `AND` or `OR` logical operators. A sequence
   * of restrictions implicitly uses `AND`. * A restriction has the form of
   * `{field} {operator} {value}`. * The operator used on
   * `flight.dateRange.endDate` must be LESS THAN (<). * The operator used on
   * `warningMessages` must be `HAS (:)`. * The operators used on all other fields
   * must be `EQUALS (=)`. * Supported fields: - `campaignId` - `displayName` -
   * `insertionOrderId` - `entityStatus` - `lineItemId` - `lineItemType` -
   * `flight.dateRange.endDate` (input formatted as YYYY-MM-DD) -
   * `warningMessages` - `flight.triggerId` Examples: * All line items under an
   * insertion order: `insertionOrderId="1234"` * All `ENTITY_STATUS_ACTIVE` or
   * `ENTITY_STATUS_PAUSED` and `LINE_ITEM_TYPE_DISPLAY_DEFAULT` line items under
   * an advertiser: `(entityStatus="ENTITY_STATUS_ACTIVE" OR
   * entityStatus="ENTITY_STATUS_PAUSED") AND
   * lineItemType="LINE_ITEM_TYPE_DISPLAY_DEFAULT"` * All line items whose flight
   * dates end before March 28, 2019: `flight.dateRange.endDate<"2019-03-28"` *
   * All line items that have `NO_VALID_CREATIVE` in `warningMessages`:
   * `warningMessages:"NO_VALID_CREATIVE"` The length of this field should be no
   * more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * "displayName" (default) * "entityStatus" * “flight.dateRange.endDate”
   * The default sorting order is ascending. To specify descending order for a
   * field, a suffix "desc" should be added to the field name. Example:
   * `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListLineItems` method. If not specified, the first page
   * of results will be returned.
   * @return Google_Service_DisplayVideo_ListLineItemsResponse
   */
  public function listAdvertisersLineItems($advertiserId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListLineItemsResponse");
  }
  /**
   * Updates an existing line item. Returns the updated line item if successful.
   * (lineItems.patch)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * line item belongs to.
   * @param string $lineItemId Output only. The unique ID of the line item.
   * Assigned by the system.
   * @param Google_Service_DisplayVideo_LineItem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Google_Service_DisplayVideo_LineItem
   */
  public function patch($advertiserId, $lineItemId, Google_Service_DisplayVideo_LineItem $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'lineItemId' => $lineItemId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DisplayVideo_LineItem");
  }
}
