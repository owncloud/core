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

use Google\Service\ShoppingContent\Product;
use Google\Service\ShoppingContent\ProductsCustomBatchRequest;
use Google\Service\ShoppingContent\ProductsCustomBatchResponse;
use Google\Service\ShoppingContent\ProductsListResponse;

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $products = $contentService->products;
 *  </code>
 */
class Products extends \Google\Service\Resource
{
  /**
   * Retrieves, inserts, and deletes multiple products in a single request.
   * (products.custombatch)
   *
   * @param ProductsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ProductsCustomBatchResponse
   */
  public function custombatch(ProductsCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], ProductsCustomBatchResponse::class);
  }
  /**
   * Deletes a product from your Merchant Center account. (products.delete)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string feedId The Content API Supplemental Feed ID. If present
   * then product deletion applies to the data in a supplemental feed. If absent,
   * entire product will be deleted.
   */
  public function delete($merchantId, $productId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a product from your Merchant Center account. (products.get)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product.
   * @param array $optParams Optional parameters.
   * @return Product
   */
  public function get($merchantId, $productId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Product::class);
  }
  /**
   * Uploads a product to your Merchant Center account. If an item with the same
   * channel, contentLanguage, offerId, and targetCountry already exists, this
   * method updates that entry. (products.insert)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string feedId The Content API Supplemental Feed ID. If present
   * then product insertion applies to the data in a supplemental feed.
   * @return Product
   */
  public function insert($merchantId, Product $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Product::class);
  }
  /**
   * Lists the products in your Merchant Center account. The response might
   * contain fewer items than specified by maxResults. Rely on nextPageToken to
   * determine if there are more items to be requested. (products.listProducts)
   *
   * @param string $merchantId The ID of the account that contains the products.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of products to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return ProductsListResponse
   */
  public function listProducts($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ProductsListResponse::class);
  }
  /**
   * Updates an existing product in your Merchant Center account. Only updates
   * attributes provided in the request. (products.update)
   *
   * @param string $merchantId The ID of the account that contains the product.
   * This account cannot be a multi-client account.
   * @param string $productId The REST ID of the product for which to update.
   * @param Product $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The comma-separated list of product attributes
   * to be updated. Example: `"title,salePrice"`. Attributes specified in the
   * update mask without a value specified in the body will be deleted from the
   * product. Only top-level product attributes can be updated. If not defined,
   * product attributes with set values will be updated and other attributes will
   * stay unchanged.
   * @return Product
   */
  public function update($merchantId, $productId, Product $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Product::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Products::class, 'Google_Service_ShoppingContent_Resource_Products');
