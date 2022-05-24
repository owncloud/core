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

use Google\Service\TagManager\ListUserPermissionsResponse;
use Google\Service\TagManager\UserPermission;

/**
 * The "user_permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $user_permissions = $tagmanagerService->user_permissions;
 *  </code>
 */
class AccountsUserPermissions extends \Google\Service\Resource
{
  /**
   * Creates a user's Account & Container access. (user_permissions.create)
   *
   * @param string $parent GTM Account's API relative path. Example:
   * accounts/{account_id}
   * @param UserPermission $postBody
   * @param array $optParams Optional parameters.
   * @return UserPermission
   */
  public function create($parent, UserPermission $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], UserPermission::class);
  }
  /**
   * Removes a user from the account, revoking access to it and all of its
   * containers. (user_permissions.delete)
   *
   * @param string $path GTM UserPermission's API relative path. Example:
   * accounts/{account_id}/user_permissions/{user_permission_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a user's Account & Container access. (user_permissions.get)
   *
   * @param string $path GTM UserPermission's API relative path. Example:
   * accounts/{account_id}/user_permissions/{user_permission_id}
   * @param array $optParams Optional parameters.
   * @return UserPermission
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UserPermission::class);
  }
  /**
   * List all users that have access to the account along with Account and
   * Container user access granted to each of them.
   * (user_permissions.listAccountsUserPermissions)
   *
   * @param string $parent GTM Accounts's API relative path. Example:
   * accounts/{account_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListUserPermissionsResponse
   */
  public function listAccountsUserPermissions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUserPermissionsResponse::class);
  }
  /**
   * Updates a user's Account & Container access. (user_permissions.update)
   *
   * @param string $path GTM UserPermission's API relative path. Example:
   * accounts/{account_id}/user_permissions/{user_permission_id}
   * @param UserPermission $postBody
   * @param array $optParams Optional parameters.
   * @return UserPermission
   */
  public function update($path, UserPermission $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], UserPermission::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsUserPermissions::class, 'Google_Service_TagManager_Resource_AccountsUserPermissions');
