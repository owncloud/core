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

use Google\Service\TagManager\ListVariablesResponse;
use Google\Service\TagManager\RevertVariableResponse;
use Google\Service\TagManager\Variable;

/**
 * The "variables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $variables = $tagmanagerService->variables;
 *  </code>
 */
class AccountsContainersWorkspacesVariables extends \Google\Service\Resource
{
  /**
   * Creates a GTM Variable. (variables.create)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Variable $postBody
   * @param array $optParams Optional parameters.
   * @return Variable
   */
  public function create($parent, Variable $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Variable::class);
  }
  /**
   * Deletes a GTM Variable. (variables.delete)
   *
   * @param string $path GTM Variable's API relative path. Example: accounts/{acco
   * unt_id}/containers/{container_id}/workspaces/{workspace_id}/variables/{variab
   * le_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a GTM Variable. (variables.get)
   *
   * @param string $path GTM Variable's API relative path. Example: accounts/{acco
   * unt_id}/containers/{container_id}/workspaces/{workspace_id}/variables/{variab
   * le_id}
   * @param array $optParams Optional parameters.
   * @return Variable
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Variable::class);
  }
  /**
   * Lists all GTM Variables of a Container.
   * (variables.listAccountsContainersWorkspacesVariables)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListVariablesResponse
   */
  public function listAccountsContainersWorkspacesVariables($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVariablesResponse::class);
  }
  /**
   * Reverts changes to a GTM Variable in a GTM Workspace. (variables.revert)
   *
   * @param string $path GTM Variable's API relative path. Example: accounts/{acco
   * unt_id}/containers/{container_id}/workspaces/{workspace_id}/variables/{variab
   * le_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the variable in storage.
   * @return RevertVariableResponse
   */
  public function revert($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('revert', [$params], RevertVariableResponse::class);
  }
  /**
   * Updates a GTM Variable. (variables.update)
   *
   * @param string $path GTM Variable's API relative path. Example: accounts/{acco
   * unt_id}/containers/{container_id}/workspaces/{workspace_id}/variables/{variab
   * le_id}
   * @param Variable $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the variable in storage.
   * @return Variable
   */
  public function update($path, Variable $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Variable::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersWorkspacesVariables::class, 'Google_Service_TagManager_Resource_AccountsContainersWorkspacesVariables');
