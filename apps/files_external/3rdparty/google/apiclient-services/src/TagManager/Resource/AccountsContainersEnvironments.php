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

use Google\Service\TagManager\Environment;
use Google\Service\TagManager\ListEnvironmentsResponse;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $environments = $tagmanagerService->environments;
 *  </code>
 */
class AccountsContainersEnvironments extends \Google\Service\Resource
{
  /**
   * Creates a GTM Environment. (environments.create)
   *
   * @param string $parent GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param Environment $postBody
   * @param array $optParams Optional parameters.
   * @return Environment
   */
  public function create($parent, Environment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Environment::class);
  }
  /**
   * Deletes a GTM Environment. (environments.delete)
   *
   * @param string $path GTM Environment's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/environments/{environment_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a GTM Environment. (environments.get)
   *
   * @param string $path GTM Environment's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/environments/{environment_id}
   * @param array $optParams Optional parameters.
   * @return Environment
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Environment::class);
  }
  /**
   * Lists all GTM Environments of a GTM Container.
   * (environments.listAccountsContainersEnvironments)
   *
   * @param string $parent GTM Container's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListEnvironmentsResponse
   */
  public function listAccountsContainersEnvironments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEnvironmentsResponse::class);
  }
  /**
   * Re-generates the authorization code for a GTM Environment.
   * (environments.reauthorize)
   *
   * @param string $path GTM Environment's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/environments/{environment_id}
   * @param Environment $postBody
   * @param array $optParams Optional parameters.
   * @return Environment
   */
  public function reauthorize($path, Environment $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reauthorize', [$params], Environment::class);
  }
  /**
   * Updates a GTM Environment. (environments.update)
   *
   * @param string $path GTM Environment's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/environments/{environment_id}
   * @param Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the environment in storage.
   * @return Environment
   */
  public function update($path, Environment $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Environment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersEnvironments::class, 'Google_Service_TagManager_Resource_AccountsContainersEnvironments');
