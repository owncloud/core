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

use Google\Service\TagManager\ListTriggersResponse;
use Google\Service\TagManager\RevertTriggerResponse;
use Google\Service\TagManager\Trigger;

/**
 * The "triggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $triggers = $tagmanagerService->triggers;
 *  </code>
 */
class AccountsContainersWorkspacesTriggers extends \Google\Service\Resource
{
  /**
   * Creates a GTM Trigger. (triggers.create)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Trigger $postBody
   * @param array $optParams Optional parameters.
   * @return Trigger
   */
  public function create($parent, Trigger $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Trigger::class);
  }
  /**
   * Deletes a GTM Trigger. (triggers.delete)
   *
   * @param string $path GTM Trigger's API relative path. Example: accounts/{accou
   * nt_id}/containers/{container_id}/workspaces/{workspace_id}/triggers/{trigger_
   * id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a GTM Trigger. (triggers.get)
   *
   * @param string $path GTM Trigger's API relative path. Example: accounts/{accou
   * nt_id}/containers/{container_id}/workspaces/{workspace_id}/triggers/{trigger_
   * id}
   * @param array $optParams Optional parameters.
   * @return Trigger
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Trigger::class);
  }
  /**
   * Lists all GTM Triggers of a Container.
   * (triggers.listAccountsContainersWorkspacesTriggers)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListTriggersResponse
   */
  public function listAccountsContainersWorkspacesTriggers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTriggersResponse::class);
  }
  /**
   * Reverts changes to a GTM Trigger in a GTM Workspace. (triggers.revert)
   *
   * @param string $path GTM Trigger's API relative path. Example: accounts/{accou
   * nt_id}/containers/{container_id}/workspaces/{workspace_id}/triggers/{trigger_
   * id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the trigger in storage.
   * @return RevertTriggerResponse
   */
  public function revert($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('revert', [$params], RevertTriggerResponse::class);
  }
  /**
   * Updates a GTM Trigger. (triggers.update)
   *
   * @param string $path GTM Trigger's API relative path. Example: accounts/{accou
   * nt_id}/containers/{container_id}/workspaces/{workspace_id}/triggers/{trigger_
   * id}
   * @param Trigger $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the trigger in storage.
   * @return Trigger
   */
  public function update($path, Trigger $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Trigger::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersWorkspacesTriggers::class, 'Google_Service_TagManager_Resource_AccountsContainersWorkspacesTriggers');
