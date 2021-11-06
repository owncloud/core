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

namespace Google\Service\AdExchangeBuyer\Resource;

use Google\Service\AdExchangeBuyer\Account;
use Google\Service\AdExchangeBuyer\AccountsList;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $accounts = $adexchangebuyerService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Gets one account by ID. (accounts.get)
   *
   * @param int $id The account id
   * @param array $optParams Optional parameters.
   * @return Account
   */
  public function get($id, $optParams = [])
  {
    $params = ['id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Account::class);
  }
  /**
   * Retrieves the authenticated user's list of accounts. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   * @return AccountsList
   */
  public function listAccounts($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AccountsList::class);
  }
  /**
   * Updates an existing account. This method supports patch semantics.
   * (accounts.patch)
   *
   * @param int $id The account id
   * @param Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool confirmUnsafeAccountChange Confirmation for erasing bidder
   * and cookie matching urls.
   * @return Account
   */
  public function patch($id, Account $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Account::class);
  }
  /**
   * Updates an existing account. (accounts.update)
   *
   * @param int $id The account id
   * @param Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool confirmUnsafeAccountChange Confirmation for erasing bidder
   * and cookie matching urls.
   * @return Account
   */
  public function update($id, Account $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Account::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_AdExchangeBuyer_Resource_Accounts');
