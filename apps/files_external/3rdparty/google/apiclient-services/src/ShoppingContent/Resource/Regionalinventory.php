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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\RegionalInventory as RegionalInventoryModel;
use Google\Service\ShoppingContent\RegionalinventoryCustomBatchRequest;
use Google\Service\ShoppingContent\RegionalinventoryCustomBatchResponse;

/**
 * The "regionalinventory" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $regionalinventory = $contentService->regionalinventory;
 *  </code>
 */
class Regionalinventory extends \Google\Service\Resource
{
  /**
   * Updates regional inventory for multiple products or regions in a single
   * request. (regionalinventory.custombatch)
   *
   * @param RegionalinventoryCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RegionalinventoryCustomBatchResponse
   */
  public function custombatch(RegionalinventoryCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], RegionalinventoryCustomBatchResponse::class);
  }
  /**
   * Update the regional inventory of a product in your Merchant Center account.
   * If a regional inventory with the same region ID already exists, this method
   * updates that entry. (regionalinventory.insert)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product for which to update the
   * regional inventory.
   * @param RegionalInventoryModel $postBody
   * @param array $optParams Optional parameters.
   * @return RegionalInventoryModel
   */
  public function insert($merchantId, $productId, RegionalInventoryModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], RegionalInventoryModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Regionalinventory::class, 'Google_Service_ShoppingContent_Resource_Regionalinventory');
