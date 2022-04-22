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

use Google\Service\ShoppingContent\Account;

/**
 * The "accountsbyexternalsellerid" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $accountsbyexternalsellerid = $contentService->accountsbyexternalsellerid;
 *  </code>
 */
class Accountsbyexternalsellerid extends \Google\Service\Resource
{
  /**
   * Gets data of the account with the specified external_seller_id belonging to
   * the MCA with the specified merchant_id. (accountsbyexternalsellerid.get)
   *
   * @param string $merchantId Required. The ID of the MCA containing the seller.
   * @param string $externalSellerId Required. The External Seller ID of the
   * seller account to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Account
   */
  public function get($merchantId, $externalSellerId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'externalSellerId' => $externalSellerId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Account::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accountsbyexternalsellerid::class, 'Google_Service_ShoppingContent_Resource_Accountsbyexternalsellerid');
