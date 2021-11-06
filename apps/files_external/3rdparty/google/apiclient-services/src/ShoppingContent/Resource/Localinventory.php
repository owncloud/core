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

use Google\Service\ShoppingContent\LocalInventory as LocalInventoryModel;
use Google\Service\ShoppingContent\LocalinventoryCustomBatchRequest;
use Google\Service\ShoppingContent\LocalinventoryCustomBatchResponse;

/**
 * The "localinventory" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $localinventory = $contentService->localinventory;
 *  </code>
 */
class Localinventory extends \Google\Service\Resource
{
  /**
   * Updates local inventory for multiple products or stores in a single request.
   * (localinventory.custombatch)
   *
   * @param LocalinventoryCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return LocalinventoryCustomBatchResponse
   */
  public function custombatch(LocalinventoryCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], LocalinventoryCustomBatchResponse::class);
  }
  /**
   * Updates the local inventory of a product in your Merchant Center account.
   * (localinventory.insert)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product for which to update local
   * inventory.
   * @param LocalInventoryModel $postBody
   * @param array $optParams Optional parameters.
   * @return LocalInventoryModel
   */
  public function insert($merchantId, $productId, LocalInventoryModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], LocalInventoryModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Localinventory::class, 'Google_Service_ShoppingContent_Resource_Localinventory');
