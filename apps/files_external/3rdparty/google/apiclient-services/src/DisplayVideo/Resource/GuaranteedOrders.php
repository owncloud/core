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

use Google\Service\DisplayVideo\EditGuaranteedOrderReadAccessorsRequest;
use Google\Service\DisplayVideo\EditGuaranteedOrderReadAccessorsResponse;
use Google\Service\DisplayVideo\GuaranteedOrder;
use Google\Service\DisplayVideo\ListGuaranteedOrdersResponse;

/**
 * The "guaranteedOrders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $guaranteedOrders = $displayvideoService->guaranteedOrders;
 *  </code>
 */
class GuaranteedOrders extends \Google\Service\Resource
{
  /**
   * Creates a new guaranteed order. Returns the newly created guaranteed order if
   * successful. (guaranteedOrders.create)
   *
   * @param GuaranteedOrder $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that the request is
   * being made within.
   * @opt_param string partnerId The ID of the partner that the request is being
   * made within.
   * @return GuaranteedOrder
   */
  public function create(GuaranteedOrder $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GuaranteedOrder::class);
  }
  /**
   * Edits read advertisers of a guaranteed order.
   * (guaranteedOrders.editGuaranteedOrderReadAccessors)
   *
   * @param string $guaranteedOrderId Required. The ID of the guaranteed order to
   * edit. The ID is of the format `{exchange}-{legacy_guaranteed_order_id}`
   * @param EditGuaranteedOrderReadAccessorsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return EditGuaranteedOrderReadAccessorsResponse
   */
  public function editGuaranteedOrderReadAccessors($guaranteedOrderId, EditGuaranteedOrderReadAccessorsRequest $postBody, $optParams = [])
  {
    $params = ['guaranteedOrderId' => $guaranteedOrderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('editGuaranteedOrderReadAccessors', [$params], EditGuaranteedOrderReadAccessorsResponse::class);
  }
  /**
   * Gets a guaranteed order. (guaranteedOrders.get)
   *
   * @param string $guaranteedOrderId Required. The ID of the guaranteed order to
   * fetch. The ID is of the format `{exchange}-{legacy_guaranteed_order_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the guaranteed order.
   * @opt_param string partnerId The ID of the partner that has access to the
   * guaranteed order.
   * @return GuaranteedOrder
   */
  public function get($guaranteedOrderId, $optParams = [])
  {
    $params = ['guaranteedOrderId' => $guaranteedOrderId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GuaranteedOrder::class);
  }
  /**
   * Lists guaranteed orders that are accessible to the current user. The order is
   * defined by the order_by parameter. If a filter by entity_status is not
   * specified, guaranteed orders with entity status `ENTITY_STATUS_ARCHIVED` will
   * not be included in the results. (guaranteedOrders.listGuaranteedOrders)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the guaranteed order.
   * @opt_param string filter Allows filtering by guaranteed order properties. *
   * Filter expressions are made up of one or more restrictions. * Restrictions
   * can be combined by `AND` or `OR` logical operators. A sequence of
   * restrictions implicitly uses `AND`. * A restriction has the form of `{field}
   * {operator} {value}`. * The operator must be `EQUALS (=)`. * Supported fields:
   * - `guaranteed_order_id` - `exchange` - `display_name` - `status.entityStatus`
   * Examples: * All active guaranteed orders:
   * `status.entityStatus="ENTITY_STATUS_ACTIVE"` * Guaranteed orders belonging to
   * Google Ad Manager or Rubicon exchanges:
   * `exchange="EXCHANGE_GOOGLE_AD_MANAGER" OR exchange="EXCHANGE_RUBICON"` The
   * length of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix "desc" should be added to the
   * field name. For example, `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified or greater than `100` will default to `100`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListGuaranteedOrders` method. If not specified, the
   * first page of results will be returned.
   * @opt_param string partnerId The ID of the partner that has access to the
   * guaranteed order.
   * @return ListGuaranteedOrdersResponse
   */
  public function listGuaranteedOrders($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGuaranteedOrdersResponse::class);
  }
  /**
   * Updates an existing guaranteed order. Returns the updated guaranteed order if
   * successful. (guaranteedOrders.patch)
   *
   * @param string $guaranteedOrderId Output only. The unique identifier of the
   * guaranteed order. The guaranteed order IDs have the format
   * `{exchange}-{legacy_guaranteed_order_id}`.
   * @param GuaranteedOrder $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that the request is
   * being made within.
   * @opt_param string partnerId The ID of the partner that the request is being
   * made within.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return GuaranteedOrder
   */
  public function patch($guaranteedOrderId, GuaranteedOrder $postBody, $optParams = [])
  {
    $params = ['guaranteedOrderId' => $guaranteedOrderId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GuaranteedOrder::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GuaranteedOrders::class, 'Google_Service_DisplayVideo_Resource_GuaranteedOrders');
