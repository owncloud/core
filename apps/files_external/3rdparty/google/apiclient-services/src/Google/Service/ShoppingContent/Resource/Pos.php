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
 * The "pos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $pos = $contentService->pos;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Pos extends Google_Service_Resource
{
  /**
   * Batches multiple POS-related calls in a single request. (pos.custombatch)
   *
   * @param Google_Service_ShoppingContent_PosCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PosCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_PosCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_PosCustomBatchResponse");
  }
  /**
   * Deletes a store for the given merchant. (pos.delete)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param string $storeCode A store code that is unique per merchant.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $targetMerchantId, $storeCode, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'storeCode' => $storeCode);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves information about the given store. (pos.get)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param string $storeCode A store code that is unique per merchant.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PosStore
   */
  public function get($merchantId, $targetMerchantId, $storeCode, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'storeCode' => $storeCode);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_PosStore");
  }
  /**
   * Creates a store for the given merchant. (pos.insert)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param Google_Service_ShoppingContent_PosStore $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PosStore
   */
  public function insert($merchantId, $targetMerchantId, Google_Service_ShoppingContent_PosStore $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ShoppingContent_PosStore");
  }
  /**
   * Submit inventory for the given merchant. (pos.inventory)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param Google_Service_ShoppingContent_PosInventoryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PosInventoryResponse
   */
  public function inventory($merchantId, $targetMerchantId, Google_Service_ShoppingContent_PosInventoryRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('inventory', array($params), "Google_Service_ShoppingContent_PosInventoryResponse");
  }
  /**
   * Lists the stores of the target merchant. (pos.listPos)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PosListResponse
   */
  public function listPos($merchantId, $targetMerchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_PosListResponse");
  }
  /**
   * Submit a sale event for the given merchant. (pos.sale)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param Google_Service_ShoppingContent_PosSaleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PosSaleResponse
   */
  public function sale($merchantId, $targetMerchantId, Google_Service_ShoppingContent_PosSaleRequest $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('sale', array($params), "Google_Service_ShoppingContent_PosSaleResponse");
  }
}
