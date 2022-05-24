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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\ProductPurchase;
use Google\Service\AndroidPublisher\ProductPurchasesAcknowledgeRequest;

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $products = $androidpublisherService->products;
 *  </code>
 */
class PurchasesProducts extends \Google\Service\Resource
{
  /**
   * Acknowledges a purchase of an inapp item. (products.acknowledge)
   *
   * @param string $packageName The package name of the application the inapp
   * product was sold in (for example, 'com.some.thing').
   * @param string $productId The inapp product SKU (for example,
   * 'com.some.thing.inapp1').
   * @param string $token The token provided to the user's device when the inapp
   * product was purchased.
   * @param ProductPurchasesAcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function acknowledge($packageName, $productId, $token, ProductPurchasesAcknowledgeRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'token' => $token, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', [$params]);
  }
  /**
   * Checks the purchase and consumption status of an inapp item. (products.get)
   *
   * @param string $packageName The package name of the application the inapp
   * product was sold in (for example, 'com.some.thing').
   * @param string $productId The inapp product SKU (for example,
   * 'com.some.thing.inapp1').
   * @param string $token The token provided to the user's device when the inapp
   * product was purchased.
   * @param array $optParams Optional parameters.
   * @return ProductPurchase
   */
  public function get($packageName, $productId, $token, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'token' => $token];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ProductPurchase::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PurchasesProducts::class, 'Google_Service_AndroidPublisher_Resource_PurchasesProducts');
