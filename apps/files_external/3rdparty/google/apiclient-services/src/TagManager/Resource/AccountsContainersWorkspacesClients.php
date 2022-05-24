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

namespace Google\Service\TagManager\Resource;

use Google\Service\TagManager\Client;
use Google\Service\TagManager\ListClientsResponse;
use Google\Service\TagManager\RevertClientResponse;

/**
 * The "clients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $clients = $tagmanagerService->clients;
 *  </code>
 */
class AccountsContainersWorkspacesClients extends \Google\Service\Resource
{
  /**
   * Creates a GTM Client. (clients.create)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
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
   * Deletes a GTM Client. (clients.delete)
   *
   * @param string $path GTM Client's API relative path. Example: accounts/{accoun
   * t_id}/containers/{container_id}/workspaces/{workspace_id}/clients/{client_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a GTM Client. (clients.get)
   *
   * @param string $path GTM Client's API relative path. Example: accounts/{accoun
   * t_id}/containers/{container_id}/workspaces/{workspace_id}/clients/{client_id}
   * @param array $optParams Optional parameters.
   * @return Client
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Client::class);
  }
  /**
   * Lists all GTM Clients of a GTM container workspace.
   * (clients.listAccountsContainersWorkspacesClients)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListClientsResponse
   */
  public function listAccountsContainersWorkspacesClients($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClientsResponse::class);
  }
  /**
   * Reverts changes to a GTM Client in a GTM Workspace. (clients.revert)
   *
   * @param string $path GTM Client's API relative path. Example: accounts/{accoun
   * t_id}/containers/{container_id}/workspaces/{workspace_id}/clients/{client_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the client in storage.
   * @return RevertClientResponse
   */
  public function revert($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('revert', [$params], RevertClientResponse::class);
  }
  /**
   * Updates a GTM Client. (clients.update)
   *
   * @param string $path GTM Client's API relative path. Example: accounts/{accoun
   * t_id}/containers/{container_id}/workspaces/{workspace_id}/clients/{client_id}
   * @param Client $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the client in storage.
   * @return Client
   */
  public function update($path, Client $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Client::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersWorkspacesClients::class, 'Google_Service_TagManager_Resource_AccountsContainersWorkspacesClients');
