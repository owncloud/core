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

namespace Google\Service\AuthorizedBuyersMarketplace\Resource;

use Google\Service\AuthorizedBuyersMarketplace\ActivateClientRequest;
use Google\Service\AuthorizedBuyersMarketplace\Client;
use Google\Service\AuthorizedBuyersMarketplace\DeactivateClientRequest;
use Google\Service\AuthorizedBuyersMarketplace\ListClientsResponse;

/**
 * The "clients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $authorizedbuyersmarketplaceService = new Google\Service\AuthorizedBuyersMarketplace(...);
 *   $clients = $authorizedbuyersmarketplaceService->clients;
 *  </code>
 */
class BuyersClients extends \Google\Service\Resource
{
  /**
   * Activates an existing client. The state of the client will be updated to
   * "ACTIVE". This method has no effect if the client is already in "ACTIVE"
   * state. (clients.activate)
   *
   * @param string $name Required. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}`
   * @param ActivateClientRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function activate($name, ActivateClientRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], Client::class);
  }
  /**
   * Creates a new client. (clients.create)
   *
   * @param string $parent Required. The name of the buyer. Format:
   * `buyers/{accountId}`
   * @param Client $postBody
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function create($parent, Client $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Client::class);
  }
  /**
   * Deactivates an existing client. The state of the client will be updated to
   * "INACTIVE". This method has no effect if the client is already in "INACTIVE"
   * state. (clients.deactivate)
   *
   * @param string $name Required. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}`
   * @param DeactivateClientRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function deactivate($name, DeactivateClientRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deactivate', [$params], Client::class);
  }
  /**
   * Gets a client with a given resource name. (clients.get)
   *
   * @param string $name Required. Format:
   * `buyers/{accountId}/clients/{clientAccountId}`
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Client::class);
  }
  /**
   * Lists all the clients for the current buyer. (clients.listBuyersClients)
   *
   * @param string $parent Required. The name of the buyer. Format:
   * `buyers/{accountId}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Query string using the [Filtering
   * Syntax](https://developers.google.com/authorized-buyers/apis/guides/v2/list-
   * filters) Supported fields for filtering are: * partnerClientId Use this field
   * to filter the clients by the partnerClientId. For example, if the
   * partnerClientId of the client is "1234", the value of this field should be
   * `partnerClientId = "1234"`, in order to get only the client whose
   * partnerClientId is "1234" in the response.
   * @opt_param int pageSize Requested page size. If left blank, a default page
   * size of 500 will be applied.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientsResponse.nextPageToken returned from the previous call to the list
   * method.
   * @return ListClientsResponse
   */
  public function listBuyersClients($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClientsResponse::class);
  }
  /**
   * Updates an existing client. (clients.patch)
   *
   * @param string $name Output only. The resource name of the client. Format:
   * `buyers/{accountId}/clients/{clientAccountId}`
   * @param Client $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated. If empty or
   * unspecified, the service will update all fields populated in the update
   * request excluding the output only fields and primitive fields with default
   * value. Note that explicit field mask is required in order to reset a
   * primitive field back to its default value, for example, false for boolean
   * fields, 0 for integer fields. A special field mask consisting of a single
   * path "*" can be used to indicate full replacement(the equivalent of PUT
   * method), updatable fields unset or unspecified in the input will be cleared
   * or set to default value. Output only fields will be ignored regardless of the
   * value of updateMask.
   * @return Client
   */
  public function patch($name, Client $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Client::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyersClients::class, 'Google_Service_AuthorizedBuyersMarketplace_Resource_BuyersClients');
