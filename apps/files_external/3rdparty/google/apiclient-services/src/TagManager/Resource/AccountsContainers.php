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

use Google\Service\TagManager\Container;
use Google\Service\TagManager\ListContainersResponse;

/**
 * The "containers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $containers = $tagmanagerService->containers;
 *  </code>
 */
class AccountsContainers extends \Google\Service\Resource
{
  /**
   * Creates a Container. (containers.create)
   *
   * @param string $parent GTM Account's API relative path. Example:
   * accounts/{account_id}.
   * @param Container $postBody
   * @param array $optParams Optional parameters.
   * @return Container
   */
  public function create($parent, Container $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Container::class);
  }
  /**
   * Deletes a Container. (containers.delete)
   *
   * @param string $path GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a Container. (containers.get)
   *
   * @param string $path GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   * @return Container
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Container::class);
  }
  /**
   * Lists all Containers that belongs to a GTM Account.
   * (containers.listAccountsContainers)
   *
   * @param string $parent GTM Accounts's API relative path. Example:
   * accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListContainersResponse
   */
  public function listAccountsContainers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListContainersResponse::class);
  }
  /**
   * Updates a Container. (containers.update)
   *
   * @param string $path GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param Container $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the container in storage.
   * @return Container
   */
  public function update($path, Container $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Container::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainers::class, 'Google_Service_TagManager_Resource_AccountsContainers');
