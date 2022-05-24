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

use Google\Service\ShoppingContent\PosCustomBatchRequest;
use Google\Service\ShoppingContent\PosCustomBatchResponse;
use Google\Service\ShoppingContent\PosInventoryRequest;
use Google\Service\ShoppingContent\PosInventoryResponse;
use Google\Service\ShoppingContent\PosListResponse;
use Google\Service\ShoppingContent\PosSaleRequest;
use Google\Service\ShoppingContent\PosSaleResponse;
use Google\Service\ShoppingContent\PosStore;

/**
 * The "pos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $pos = $contentService->pos;
 *  </code>
 */
class Pos extends \Google\Service\Resource
{
  /**
   * Batches multiple POS-related calls in a single request. (pos.custombatch)
   *
   * @param PosCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PosCustomBatchResponse
   */
  public function custombatch(PosCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], PosCustomBatchResponse::class);
  }
  /**
   * Deletes a store for the given merchant. (pos.delete)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param string $storeCode A store code that is unique per merchant.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $targetMerchantId, $storeCode, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'storeCode' => $storeCode];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves information about the given store. (pos.get)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param string $storeCode A store code that is unique per merchant.
   * @param array $optParams Optional parameters.
   * @return PosStore
   */
  public function get($merchantId, $targetMerchantId, $storeCode, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'storeCode' => $storeCode];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PosStore::class);
  }
  /**
   * Creates a store for the given merchant. (pos.insert)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param PosStore $postBody
   * @param array $optParams Optional parameters.
   * @return PosStore
   */
  public function insert($merchantId, $targetMerchantId, PosStore $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], PosStore::class);
  }
  /**
   * Submit inventory for the given merchant. (pos.inventory)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param PosInventoryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PosInventoryResponse
   */
  public function inventory($merchantId, $targetMerchantId, PosInventoryRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('inventory', [$params], PosInventoryResponse::class);
  }
  /**
   * Lists the stores of the target merchant. (pos.listPos)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param array $optParams Optional parameters.
   * @return PosListResponse
   */
  public function listPos($merchantId, $targetMerchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PosListResponse::class);
  }
  /**
   * Submit a sale event for the given merchant. (pos.sale)
   *
   * @param string $merchantId The ID of the POS or inventory data provider.
   * @param string $targetMerchantId The ID of the target merchant.
   * @param PosSaleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PosSaleResponse
   */
  public function sale($merchantId, $targetMerchantId, PosSaleRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'targetMerchantId' => $targetMerchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('sale', [$params], PosSaleResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pos::class, 'Google_Service_ShoppingContent_Resource_Pos');
