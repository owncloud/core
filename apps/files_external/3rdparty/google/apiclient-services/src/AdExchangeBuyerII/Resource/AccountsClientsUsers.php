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

namespace Google\Service\AdExchangeBuyerII\Resource;

use Google\Service\AdExchangeBuyerII\ClientUser;
use Google\Service\AdExchangeBuyerII\ListClientUsersResponse;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google\Service\AdExchangeBuyerII(...);
 *   $users = $adexchangebuyer2Service->users;
 *  </code>
 */
class AccountsClientsUsers extends \Google\Service\Resource
{
  /**
   * Retrieves an existing client user. (users.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user to be retrieved is associated with. (required)
   * @param string $userId Numerical identifier of the user to retrieve.
   * (required)
   * @param array $optParams Optional parameters.
   * @return ClientUser
   */
  public function get($accountId, $clientAccountId, $userId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ClientUser::class);
  }
  /**
   * Lists all the known client users for a specified sponsor buyer account ID.
   * (users.listAccountsClientsUsers)
   *
   * @param string $accountId Numerical account ID of the sponsor buyer of the
   * client to list users for. (required)
   * @param string $clientAccountId The account ID of the client buyer to list
   * users for. (required) You must specify either a string representation of a
   * numerical account identifier or the `-` character to list all the client
   * users for all the clients of a given sponsor buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * clients than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientUsersResponse.nextPageToken returned from the previous call to the
   * accounts.clients.users.list method.
   * @return ListClientUsersResponse
   */
  public function listAccountsClientsUsers($accountId, $clientAccountId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'clientAccountId' => $clientAccountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClientUsersResponse::class);
  }
  /**
   * Updates an existing client user. Only the user status can be changed on
   * update. (users.update)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer that
   * the user to be retrieved is associated with. (required)
   * @param string $userId Numerical identifier of the user to retrieve.
   * (required)
   * @param ClientUser $postBody
   * @param array $optParams Optional parameters.
   * @return ClientUser
   */
  public function update($accountId, $clientAccountId, $userId, ClientUser $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ClientUser::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsClientsUsers::class, 'Google_Service_AdExchangeBuyerII_Resource_AccountsClientsUsers');
