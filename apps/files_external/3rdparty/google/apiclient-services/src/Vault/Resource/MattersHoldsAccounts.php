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

namespace Google\Service\Vault\Resource;

use Google\Service\Vault\HeldAccount;
use Google\Service\Vault\ListHeldAccountsResponse;
use Google\Service\Vault\VaultEmpty;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google\Service\Vault(...);
 *   $accounts = $vaultService->accounts;
 *  </code>
 */
class MattersHoldsAccounts extends \Google\Service\Resource
{
  /**
   * Adds an account to a hold. Accounts can be added only to a hold that does not
   * have an organizational unit set. If you try to add an account to an
   * organizational unit-based hold, an error is returned. (accounts.create)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param HeldAccount $postBody
   * @param array $optParams Optional parameters.
   * @return HeldAccount
   */
  public function create($matterId, $holdId, HeldAccount $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], HeldAccount::class);
  }
  /**
   * Removes an account from a hold. (accounts.delete)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param string $accountId The ID of the account to remove from the hold.
   * @param array $optParams Optional parameters.
   * @return VaultEmpty
   */
  public function delete($matterId, $holdId, $accountId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId, 'accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], VaultEmpty::class);
  }
  /**
   * Lists the accounts covered by a hold. This can list only individually-
   * specified accounts covered by the hold. If the hold covers an organizational
   * unit, use the [Admin SDK](https://developers.google.com/admin-sdk/). to list
   * the members of the organizational unit on hold.
   * (accounts.listMattersHoldsAccounts)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param array $optParams Optional parameters.
   * @return ListHeldAccountsResponse
   */
  public function listMattersHoldsAccounts($matterId, $holdId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListHeldAccountsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MattersHoldsAccounts::class, 'Google_Service_Vault_Resource_MattersHoldsAccounts');
