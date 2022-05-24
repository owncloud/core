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

use Google\Service\DisplayVideo\BulkEditLineItemAssignedTargetingOptionsRequest;
use Google\Service\DisplayVideo\BulkEditLineItemAssignedTargetingOptionsResponse;
use Google\Service\DisplayVideo\BulkListLineItemAssignedTargetingOptionsResponse;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\GenerateDefaultLineItemRequest;
use Google\Service\DisplayVideo\LineItem;
use Google\Service\DisplayVideo\ListLineItemsResponse;

/**
 * The "lineItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $lineItems = $displayvideoService->lineItems;
 *  </code>
 */
class AdvertisersLineItems extends \Google\Service\Resource
{
  /**
   * Bulk edits targeting options under a single line item. The operation will
   * delete the assigned targeting options provided in
   * BulkEditLineItemAssignedTargetingOptionsRequest.delete_requests and then
   * create the assigned targeting options provided in
   * BulkEditLineItemAssignedTargetingOptionsRequest.create_requests. Requests to
   * this endpoint cannot be made concurrently with the following requests
   * updating the same line item: * BulkEditLineItemAssignedTargetingOptions *
   * UpdateLineItem * CreateLineItemAssignedTargetingOption *
   * DeleteLineItemAssignedTargetingOption
   * (lineItems.bulkEditLineItemAssignedTargetingOptions)
   *
   * @param string $advertiserId Required. The ID of the advertiser the line item
   * belongs to.
   * @param string $lineItemId Required. The ID of the line item the assigned
   * targeting option will belong to.
   * @param BulkEditLineItemAssignedTargetingOptionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditLineItemAssignedTargetingOptionsResponse
   */
  public function bulkEditLineItemAssignedTargetingOptions($advertiserId, $lineItemId, BulkEditLineItemAssignedTargetingOptionsRequest $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'lineItemId' => $lineItemId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEditLineItemAssignedTargetingOptions', [$params], BulkEditLineItemAssignedTargetingOptionsResponse::class);
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
   * @return BulkListLineItemAssignedTargetingOptionsResponse
   */
  public function bulkListLineItemAssignedTargetingOptions($advertiserId, $lineItemId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'lineItemId' => $lineItemId];
    $params = array_merge($params, $optParams);
    return $this->call('bulkListLineItemAssignedTargetingOptions', [$params], BulkListLineItemAssignedTargetingOptionsResponse::class);
  }
  /**
   * Creates a new line item. Returns the newly created line item if successful.
   * (lineItems.create)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * line item belongs to.
   * @param LineItem $postBody
   * @param array $optParams Optional parameters.
   * @return LineItem
   */
  public function create($advertiserId, LineItem $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], LineItem::class);
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
   * @return DisplayvideoEmpty
   */
  public function delete($advertiserId, $lineItemId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'lineItemId' => $lineItemId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Creates a new line item with settings (including targeting) inherited from
   * the insertion order and an `ENTITY_STATUS_DRAFT` entity_status. Returns the
   * newly created line item if successful. There are default values based on the
   * three fields: * The insertion order's insertion_order_type * The insertion
   * order's automation_type * The given line_item_type
   * (lineItems.generateDefault)
   *
   * @param string $advertiserId Required. The ID of the advertiser this line item
   * belongs to.
   * @param GenerateDefaultLineItemRequest $postBody
   * @param array $optParams Optional parameters.
   * @return LineItem
   */
  public function generateDefault($advertiserId, GenerateDefaultLineItemRequest $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateDefault', [$params], LineItem::class);
  }
  /**
   * Gets a line item. (lineItems.get)
   *
   * @param string $advertiserId Required. The ID of the advertiser this line item
   * belongs to.
   * @param string $lineItemId Required. The ID of the line item to fetch.
   * @param array $optParams Optional parameters.
   * @return LineItem
   */
  public function get($advertiserId, $lineItemId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'lineItemId' => $lineItemId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], LineItem::class);
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
   * `updateTime` must be `GREATER THAN OR EQUAL TO (>=)` or `LESS THAN OR EQUAL
   * TO (<=)`. * The operator used on `warningMessages` must be `HAS (:)`. * The
   * operators used on all other fields must be `EQUALS (=)`. * Supported
   * properties: - `campaignId` - `displayName` - `insertionOrderId` -
   * `entityStatus` - `lineItemId` - `lineItemType` - `flight.dateRange.endDate`
   * (input formatted as YYYY-MM-DD) - `warningMessages` - `flight.triggerId` -
   * `updateTime` (input in ISO 8601 format, or YYYY-MM-DDTHH:MM:SSZ) -
   * `targetedChannelId` - `targetedNegativeKeywordListId` Examples: * All line
   * items under an insertion order: `insertionOrderId="1234"` * All
   * `ENTITY_STATUS_ACTIVE` or `ENTITY_STATUS_PAUSED` and
   * `LINE_ITEM_TYPE_DISPLAY_DEFAULT` line items under an advertiser:
   * `(entityStatus="ENTITY_STATUS_ACTIVE" OR entityStatus="ENTITY_STATUS_PAUSED")
   * AND lineItemType="LINE_ITEM_TYPE_DISPLAY_DEFAULT"` * All line items whose
   * flight dates end before March 28, 2019:
   * `flight.dateRange.endDate<"2019-03-28"` * All line items that have
   * `NO_VALID_CREATIVE` in `warningMessages`:
   * `warningMessages:"NO_VALID_CREATIVE"` * All line items with an update time
   * less than or equal to `2020-11-04T18:54:47Z (format of ISO 8601)`:
   * `updateTime<="2020-11-04T18:54:47Z"` * All line items with an update time
   * greater than or equal to `2020-11-04T18:54:47Z (format of ISO 8601)`:
   * `updateTime>="2020-11-04T18:54:47Z"` * All line items that are using both the
   * specified channel and specified negative keyword list in their targeting:
   * `targetedNegativeKeywordListId=789 AND targetedChannelId=12345` The length of
   * this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) * `entityStatus` * `flight.dateRange.endDate`
   * * `updateTime` The default sorting order is ascending. To specify descending
   * order for a field, a suffix "desc" should be added to the field name.
   * Example: `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListLineItems` method. If not specified, the first page
   * of results will be returned.
   * @return ListLineItemsResponse
   */
  public function listAdvertisersLineItems($advertiserId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLineItemsResponse::class);
  }
  /**
   * Updates an existing line item. Returns the updated line item if successful.
   * Requests to this endpoint cannot be made concurrently with the following
   * requests updating the same line item: *
   * BulkEditLineItemAssignedTargetingOptions * UpdateLineItem *
   * CreateLineItemAssignedTargetingOption * DeleteLineItemAssignedTargetingOption
   * (lineItems.patch)
   *
   * @param string $advertiserId Output only. The unique ID of the advertiser the
   * line item belongs to.
   * @param string $lineItemId Output only. The unique ID of the line item.
   * Assigned by the system.
   * @param LineItem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return LineItem
   */
  public function patch($advertiserId, $lineItemId, LineItem $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'lineItemId' => $lineItemId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], LineItem::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersLineItems::class, 'Google_Service_DisplayVideo_Resource_AdvertisersLineItems');
