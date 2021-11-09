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

use Google\Service\ShoppingContent\Promotion;

/**
 * The "promotions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $promotions = $contentService->promotions;
 *  </code>
 */
class Promotions extends \Google\Service\Resource
{
  /**
   * Inserts a promotion for your Merchant Center account. If the promotion
   * already exists, then it will update the promotion instead.
   * (promotions.create)
   *
   * @param string $merchantId Required. The ID of the account that contains the
   * collection.
   * @param Promotion $postBody
   * @param array $optParams Optional parameters.
   * @return Promotion
   */
  public function create($merchantId, Promotion $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Promotion::class);
  }
  /**
   * Retrieves a promotion from your Merchant Center account. (promotions.get)
   *
   * @param string $merchantId Required. The ID of the account that contains the
   * collection.
   * @param string $id Required. REST ID of the promotion to retrieve.
   * @param array $optParams Optional parameters.
   * @return Promotion
   */
  public function get($merchantId, $id, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Promotion::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Promotions::class, 'Google_Service_ShoppingContent_Resource_Promotions');
