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
 * The "regionalinventory" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $regionalinventory = $contentService->regionalinventory;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Regionalinventory extends Google_Service_Resource
{
  /**
   * Updates regional inventory for multiple products or regions in a single
   * request. (regionalinventory.custombatch)
   *
   * @param Google_Service_ShoppingContent_RegionalinventoryCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_RegionalinventoryCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_RegionalinventoryCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_RegionalinventoryCustomBatchResponse");
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
   * @param Google_Service_ShoppingContent_RegionalInventory $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_RegionalInventory
   */
  public function insert($merchantId, $productId, Google_Service_ShoppingContent_RegionalInventory $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'productId' => $productId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ShoppingContent_RegionalInventory");
  }
}
