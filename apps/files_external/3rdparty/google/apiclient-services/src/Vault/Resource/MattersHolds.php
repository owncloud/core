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

use Google\Service\Vault\AddHeldAccountsRequest;
use Google\Service\Vault\AddHeldAccountsResponse;
use Google\Service\Vault\Hold;
use Google\Service\Vault\ListHoldsResponse;
use Google\Service\Vault\RemoveHeldAccountsRequest;
use Google\Service\Vault\RemoveHeldAccountsResponse;
use Google\Service\Vault\VaultEmpty;

/**
 * The "holds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vaultService = new Google\Service\Vault(...);
 *   $holds = $vaultService->holds;
 *  </code>
 */
class MattersHolds extends \Google\Service\Resource
{
  /**
   * Adds accounts to a hold. Returns a list of accounts that have been
   * successfully added. Accounts can be added only to an existing account-based
   * hold. (holds.addHeldAccounts)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param AddHeldAccountsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AddHeldAccountsResponse
   */
  public function addHeldAccounts($matterId, $holdId, AddHeldAccountsRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addHeldAccounts', [$params], AddHeldAccountsResponse::class);
  }
  /**
   * Creates a hold in the specified matter. (holds.create)
   *
   * @param string $matterId The matter ID.
   * @param Hold $postBody
   * @param array $optParams Optional parameters.
   * @return Hold
   */
  public function create($matterId, Hold $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Hold::class);
  }
  /**
   * Removes the specified hold and releases the accounts or organizational unit
   * covered by the hold. If the data is not preserved by another hold or
   * retention rule, it might be purged. (holds.delete)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param array $optParams Optional parameters.
   * @return VaultEmpty
   */
  public function delete($matterId, $holdId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], VaultEmpty::class);
  }
  /**
   * Gets the specified hold. (holds.get)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The amount of detail to return for a hold.
   * @return Hold
   */
  public function get($matterId, $holdId, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Hold::class);
  }
  /**
   * Lists the holds in a matter. (holds.listMattersHolds)
   *
   * @param string $matterId The matter ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of holds to return in the response,
   * between 0 and 100 inclusive. Leaving this empty, or as 0, is the same as
   * **page_size** = 100.
   * @opt_param string pageToken The pagination token as returned in the response.
   * An empty token means start from the beginning.
   * @opt_param string view The amount of detail to return for a hold.
   * @return ListHoldsResponse
   */
  public function listMattersHolds($matterId, $optParams = [])
  {
    $params = ['matterId' => $matterId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListHoldsResponse::class);
  }
  /**
   * Removes the specified accounts from a hold. Returns a list of statuses in the
   * same order as the request. (holds.removeHeldAccounts)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The hold ID.
   * @param RemoveHeldAccountsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RemoveHeldAccountsResponse
   */
  public function removeHeldAccounts($matterId, $holdId, RemoveHeldAccountsRequest $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeHeldAccounts', [$params], RemoveHeldAccountsResponse::class);
  }
  /**
   * Updates the scope (organizational unit or accounts) and query parameters of a
   * hold. You cannot add accounts to a hold that covers an organizational unit,
   * nor can you add organizational units to a hold that covers individual
   * accounts. If you try, the unsupported values are ignored. (holds.update)
   *
   * @param string $matterId The matter ID.
   * @param string $holdId The ID of the hold.
   * @param Hold $postBody
   * @param array $optParams Optional parameters.
   * @return Hold
   */
  public function update($matterId, $holdId, Hold $postBody, $optParams = [])
  {
    $params = ['matterId' => $matterId, 'holdId' => $holdId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Hold::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MattersHolds::class, 'Google_Service_Vault_Resource_MattersHolds');
