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
 * The "localinventory" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $localinventory = $contentService->localinventory;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Localinventory extends Google_Service_Resource
{
  /**
   * Updates local inventory for multiple products or stores in a single request.
   * (localinventory.custombatch)
   *
   * @param Google_Service_ShoppingContent_LocalinventoryCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_LocalinventoryCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_LocalinventoryCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_LocalinventoryCustomBatchResponse");
  }
  /**
   * Update the local inventory of a product in your Merchant Center account.
   * (localinventory.insert)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product for which to update local
   * inventory.
   * @param Google_Service_ShoppingContent_LocalInventory $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_LocalInventory
   */
  public function insert($merchantId, $productId, Google_Service_ShoppingContent_LocalInventory $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'productId' => $productId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ShoppingContent_LocalInventory");
  }
}
