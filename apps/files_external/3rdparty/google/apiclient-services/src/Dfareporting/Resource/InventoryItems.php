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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\InventoryItem;
use Google\Service\Dfareporting\InventoryItemsListResponse;

/**
 * The "inventoryItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $inventoryItems = $dfareportingService->inventoryItems;
 *  </code>
 */
class InventoryItems extends \Google\Service\Resource
{
  /**
   * Gets one inventory item by ID. (inventoryItems.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $projectId Project ID for order documents.
   * @param string $id Inventory item ID.
   * @param array $optParams Optional parameters.
   * @return InventoryItem
   */
  public function get($profileId, $projectId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'projectId' => $projectId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], InventoryItem::class);
  }
  /**
   * Retrieves a list of inventory items, possibly filtered. This method supports
   * paging. (inventoryItems.listInventoryItems)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $projectId Project ID for order documents.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only inventory items with these IDs.
   * @opt_param bool inPlan Select only inventory items that are in plan.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string orderId Select only inventory items that belong to
   * specified orders.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string siteId Select only inventory items that are associated with
   * these sites.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string type Select only inventory items with this type.
   * @return InventoryItemsListResponse
   */
  public function listInventoryItems($profileId, $projectId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], InventoryItemsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventoryItems::class, 'Google_Service_Dfareporting_Resource_InventoryItems');
