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

use Google\Service\AdExchangeBuyerII\Client;
use Google\Service\AdExchangeBuyerII\ListClientsResponse;

/**
 * The "clients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google\Service\AdExchangeBuyerII(...);
 *   $clients = $adexchangebuyer2Service->clients;
 *  </code>
 */
class AccountsClients extends \Google\Service\Resource
{
  /**
   * Creates a new client buyer. (clients.create)
   *
   * @param string $accountId Unique numerical account ID for the buyer of which
   * the client buyer is a customer; the sponsor buyer to create a client for.
   * (required)
   * @param Client $postBody
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function create($accountId, Client $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Client::class);
  }
  /**
   * Gets a client buyer with a given client account ID. (clients.get)
   *
   * @param string $accountId Numerical account ID of the client's sponsor buyer.
   * (required)
   * @param string $clientAccountId Numerical account ID of the client buyer to
   * retrieve. (required)
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function get($accountId, $clientAccountId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'clientAccountId' => $clientAccountId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Client::class);
  }
  /**
   * Lists all the clients for the current sponsor buyer.
   * (clients.listAccountsClients)
   *
   * @param string $accountId Unique numerical account ID of the sponsor buyer to
   * list the clients for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * clients than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientsResponse.nextPageToken returned from the previous call to the
   * accounts.clients.list method.
   * @opt_param string partnerClientId Optional unique identifier (from the
   * standpoint of an Ad Exchange sponsor buyer partner) of the client to return.
   * If specified, at most one client will be returned in the response.
   * @return ListClientsResponse
   */
  public function listAccountsClients($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClientsResponse::class);
  }
  /**
   * Updates an existing client buyer. (clients.update)
   *
   * @param string $accountId Unique numerical account ID for the buyer of which
   * the client buyer is a customer; the sponsor buyer to update a client for.
   * (required)
   * @param string $clientAccountId Unique numerical account ID of the client to
   * update. (required)
   * @param Client $postBody
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function update($accountId, $clientAccountId, Client $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'clientAccountId' => $clientAccountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Client::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsClients::class, 'Google_Service_AdExchangeBuyerII_Resource_AccountsClients');
