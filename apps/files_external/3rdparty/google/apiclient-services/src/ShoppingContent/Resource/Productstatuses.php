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

use Google\Service\ShoppingContent\ProductStatus;
use Google\Service\ShoppingContent\ProductstatusesCustomBatchRequest;
use Google\Service\ShoppingContent\ProductstatusesCustomBatchResponse;
use Google\Service\ShoppingContent\ProductstatusesListResponse;

/**
 * The "productstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $productstatuses = $contentService->productstatuses;
 *  </code>
 */
class Productstatuses extends \Google\Service\Resource
{
  /**
   * Gets the statuses of multiple products in a single request.
   * (productstatuses.custombatch)
   *
   * @param ProductstatusesCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ProductstatusesCustomBatchResponse
   */
  public function custombatch(ProductstatusesCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], ProductstatusesCustomBatchResponse::class);
  }
  /**
   * Gets the status of a product from your Merchant Center account.
   * (productstatuses.get)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinations If set, only issues for the specified
   * destinations are returned, otherwise only issues for the Shopping
   * destination.
   * @return ProductStatus
   */
  public function get($merchantId, $productId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ProductStatus::class);
  }
  /**
   * Lists the statuses of the products in your Merchant Center account.
   * (productstatuses.listProductstatuses)
   *
   * @param string $merchantId The ID of the account that contains the products.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinations If set, only issues for the specified
   * destinations are returned, otherwise only issues for the Shopping
   * destination.
   * @opt_param string maxResults The maximum number of product statuses to return
   * in the response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return ProductstatusesListResponse
   */
  public function listProductstatuses($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ProductstatusesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Productstatuses::class, 'Google_Service_ShoppingContent_Resource_Productstatuses');
