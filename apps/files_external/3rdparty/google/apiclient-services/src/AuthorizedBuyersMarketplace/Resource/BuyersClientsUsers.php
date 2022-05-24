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

use Google\Service\AuthorizedBuyersMarketplace\ActivateClientUserRequest;
use Google\Service\AuthorizedBuyersMarketplace\AuthorizedbuyersmarketplaceEmpty;
use Google\Service\AuthorizedBuyersMarketplace\ClientUser;
use Google\Service\AuthorizedBuyersMarketplace\DeactivateClientUserRequest;
use Google\Service\AuthorizedBuyersMarketplace\ListClientUsersResponse;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $authorizedbuyersmarketplaceService = new Google\Service\AuthorizedBuyersMarketplace(...);
 *   $users = $authorizedbuyersmarketplaceService->users;
 *  </code>
 */
class BuyersClientsUsers extends \Google\Service\Resource
{
  /**
   * Activates an existing client user. The state of the client user will be
   * updated from "INACTIVE" to "ACTIVE". This method has no effect if the client
   * user is already in "ACTIVE" state. An error will be returned if the client
   * user to activate is still in "INVITED" state. (users.activate)
   *
   * @param string $name Required. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}/clientUsers/{userId}`
   * @param ActivateClientUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClientUser
   */
  public function activate($name, ActivateClientUserRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], ClientUser::class);
  }
  /**
   * Creates a new client user in "INVITED" state. An email invitation will be
   * sent to the new user, once accepted the user will become active.
   * (users.create)
   *
   * @param string $parent Required. The name of the client. Format:
   * `buyers/{accountId}/clients/{clientAccountId}`
   * @param ClientUser $postBody
   * @param array $optParams Optional parameters.
   * @return ClientUser
   */
  public function create($parent, ClientUser $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ClientUser::class);
  }
  /**
   * Deactivates an existing client user. The state of the client user will be
   * updated from "ACTIVE" to "INACTIVE". This method has no effect if the client
   * user is already in "INACTIVE" state. An error will be returned if the client
   * user to deactivate is still in "INVITED" state. (users.deactivate)
   *
   * @param string $name Required. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}/clientUsers/{userId}`
   * @param DeactivateClientUserRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ClientUser
   */
  public function deactivate($name, DeactivateClientUserRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deactivate', [$params], ClientUser::class);
  }
  /**
   * Deletes an existing client user. The client user will lose access to the
   * Authorized Buyers UI. Note that if a client user is deleted, the user's
   * access to the UI can't be restored unless a new client user is created and
   * activated. (users.delete)
   *
   * @param string $name Required. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}/clientUsers/{userId}`
   * @param array $optParams Optional parameters.
   * @return AuthorizedbuyersmarketplaceEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AuthorizedbuyersmarketplaceEmpty::class);
  }
  /**
   * Retrieves an existing client user. (users.get)
   *
   * @param string $name Required. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}/clientUsers/{userId}`
   * @param array $optParams Optional parameters.
   * @return ClientUser
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ClientUser::class);
  }
  /**
   * Lists all client users for a specified client. (users.listBuyersClientsUsers)
   *
   * @param string $parent Required. The name of the client. Format:
   * `buyers/{buyerAccountId}/clients/{clientAccountId}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. If left blank, a default page
   * size of 500 will be applied.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListClientUsersResponse.nextPageToken returned from the previous call to the
   * list method.
   * @return ListClientUsersResponse
   */
  public function listBuyersClientsUsers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClientUsersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyersClientsUsers::class, 'Google_Service_AuthorizedBuyersMarketplace_Resource_BuyersClientsUsers');
