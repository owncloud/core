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

use Google\Service\ShoppingContent\ProductDeliveryTime as ProductDeliveryTimeModel;

/**
 * The "productdeliverytime" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $productdeliverytime = $contentService->productdeliverytime;
 *  </code>
 */
class Productdeliverytime extends \Google\Service\Resource
{
  /**
   * Creates or updates the delivery time of a product.
   * (productdeliverytime.create)
   *
   * @param string $merchantId The Google merchant ID of the account that contains
   * the product. This account cannot be a multi-client account.
   * @param ProductDeliveryTimeModel $postBody
   * @param array $optParams Optional parameters.
   * @return ProductDeliveryTimeModel
   */
  public function create($merchantId, ProductDeliveryTimeModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ProductDeliveryTimeModel::class);
  }
  /**
   * Deletes the delivery time of a product. (productdeliverytime.delete)
   *
   * @param string $merchantId Required. The Google merchant ID of the account
   * that contains the product. This account cannot be a multi-client account.
   * @param string $productId Required. The Content API ID of the product, in the
   * form `channel:contentLanguage:targetCountry:offerId`.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $productId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets `productDeliveryTime` by `productId`. (productdeliverytime.get)
   *
   * @param string $merchantId Required. The Google merchant ID of the account
   * that contains the product. This account cannot be a multi-client account.
   * @param string $productId Required. The Content API ID of the product, in the
   * form `channel:contentLanguage:targetCountry:offerId`.
   * @param array $optParams Optional parameters.
   * @return ProductDeliveryTimeModel
   */
  public function get($merchantId, $productId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ProductDeliveryTimeModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Productdeliverytime::class, 'Google_Service_ShoppingContent_Resource_Productdeliverytime');
