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

use Google\Service\ShoppingContent\AccountReturnCarrier;
use Google\Service\ShoppingContent\ListAccountReturnCarrierResponse;

/**
 * The "returncarrier" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $returncarrier = $contentService->returncarrier;
 *  </code>
 */
class AccountsReturncarrier extends \Google\Service\Resource
{
  /**
   * Links return carrier to a merchant account. (returncarrier.create)
   *
   * @param string $accountId Required. The Merchant Center Account Id under which
   * the Return Carrier is to be linked.
   * @param AccountReturnCarrier $postBody
   * @param array $optParams Optional parameters.
   * @return AccountReturnCarrier
   */
  public function create($accountId, AccountReturnCarrier $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AccountReturnCarrier::class);
  }
  /**
   * Delete a return carrier in the merchant account. (returncarrier.delete)
   *
   * @param string $accountId Required. The Merchant Center Account Id under which
   * the Return Carrier is to be linked.
   * @param string $carrierAccountId Required. The Google-provided unique carrier
   * ID, used to update the resource.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $carrierAccountId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'carrierAccountId' => $carrierAccountId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Lists available return carriers in the merchant account.
   * (returncarrier.listAccountsReturncarrier)
   *
   * @param string $accountId Required. The Merchant Center Account Id under which
   * the Return Carrier is to be linked.
   * @param array $optParams Optional parameters.
   * @return ListAccountReturnCarrierResponse
   */
  public function listAccountsReturncarrier($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAccountReturnCarrierResponse::class);
  }
  /**
   * Updates a return carrier in the merchant account. (returncarrier.patch)
   *
   * @param string $accountId Required. The Merchant Center Account Id under which
   * the Return Carrier is to be linked.
   * @param string $carrierAccountId Required. The Google-provided unique carrier
   * ID, used to update the resource.
   * @param AccountReturnCarrier $postBody
   * @param array $optParams Optional parameters.
   * @return AccountReturnCarrier
   */
  public function patch($accountId, $carrierAccountId, AccountReturnCarrier $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'carrierAccountId' => $carrierAccountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], AccountReturnCarrier::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsReturncarrier::class, 'Google_Service_ShoppingContent_Resource_AccountsReturncarrier');
