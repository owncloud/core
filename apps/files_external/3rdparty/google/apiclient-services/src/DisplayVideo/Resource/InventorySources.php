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

use Google\Service\DisplayVideo\EditInventorySourceReadWriteAccessorsRequest;
use Google\Service\DisplayVideo\InventorySource;
use Google\Service\DisplayVideo\InventorySourceAccessors;
use Google\Service\DisplayVideo\ListInventorySourcesResponse;

/**
 * The "inventorySources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $inventorySources = $displayvideoService->inventorySources;
 *  </code>
 */
class InventorySources extends \Google\Service\Resource
{
  /**
   * Creates a new inventory source. Returns the newly created inventory source if
   * successful. (inventorySources.create)
   *
   * @param InventorySource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that the request is
   * being made within.
   * @opt_param string partnerId The ID of the partner that the request is being
   * made within.
   * @return InventorySource
   */
  public function create(InventorySource $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], InventorySource::class);
  }
  /**
   * Edits read/write accessors of an inventory source. Returns the updated
   * read_write_accessors for the inventory source.
   * (inventorySources.editInventorySourceReadWriteAccessors)
   *
   * @param string $inventorySourceId Required. The ID of inventory source to
   * update.
   * @param EditInventorySourceReadWriteAccessorsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return InventorySourceAccessors
   */
  public function editInventorySourceReadWriteAccessors($inventorySourceId, EditInventorySourceReadWriteAccessorsRequest $postBody, $optParams = [])
  {
    $params = ['inventorySourceId' => $inventorySourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('editInventorySourceReadWriteAccessors', [$params], InventorySourceAccessors::class);
  }
  /**
   * Gets an inventory source. (inventorySources.get)
   *
   * @param string $inventorySourceId Required. The ID of the inventory source to
   * fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId Required. The ID of the DV360 partner to which
   * the fetched inventory source is permissioned.
   * @return InventorySource
   */
  public function get($inventorySourceId, $optParams = [])
  {
    $params = ['inventorySourceId' => $inventorySourceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], InventorySource::class);
  }
  /**
   * Lists inventory sources that are accessible to the current user. The order is
   * defined by the order_by parameter. If a filter by entity_status is not
   * specified, inventory sources with entity status `ENTITY_STATUS_ARCHIVED` will
   * not be included in the results. (inventorySources.listInventorySources)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that has access to
   * the inventory source.
   * @opt_param string filter Allows filtering by inventory source properties.
   * Supported syntax: * Filter expressions are made up of one or more
   * restrictions. * Restrictions can be combined by `AND` or `OR` logical
   * operators. A sequence of restrictions implicitly uses `AND`. * A restriction
   * has the form of `{field} {operator} {value}`. * The operator must be `EQUALS
   * (=)`. * Supported fields: - `status.entityStatus` - `commitment` -
   * `deliveryMethod` - `rateDetails.rateType` - `exchange` Examples: * All active
   * inventory sources: `status.entityStatus="ENTITY_STATUS_ACTIVE"` * Inventory
   * sources belonging to Google Ad Manager or Rubicon exchanges:
   * `exchange="EXCHANGE_GOOGLE_AD_MANAGER" OR exchange="EXCHANGE_RUBICON"` The
   * length of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix "desc" should be added to the
   * field name. For example, `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListInventorySources` method. If not specified, the
   * first page of results will be returned.
   * @opt_param string partnerId The ID of the partner that has access to the
   * inventory source.
   * @return ListInventorySourcesResponse
   */
  public function listInventorySources($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListInventorySourcesResponse::class);
  }
  /**
   * Updates an existing inventory source. Returns the updated inventory source if
   * successful. (inventorySources.patch)
   *
   * @param string $inventorySourceId Output only. The unique ID of the inventory
   * source. Assigned by the system.
   * @param InventorySource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that the request is
   * being made within.
   * @opt_param string partnerId The ID of the partner that the request is being
   * made within.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return InventorySource
   */
  public function patch($inventorySourceId, InventorySource $postBody, $optParams = [])
  {
    $params = ['inventorySourceId' => $inventorySourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], InventorySource::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySources::class, 'Google_Service_DisplayVideo_Resource_InventorySources');
