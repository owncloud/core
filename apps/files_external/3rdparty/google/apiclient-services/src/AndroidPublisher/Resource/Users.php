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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\ListUsersResponse;
use Google\Service\AndroidPublisher\User;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $users = $androidpublisherService->users;
 *  </code>
 */
class Users extends \Google\Service\Resource
{
  /**
   * Grant access for a user to the given developer account. (users.create)
   *
   * @param string $parent Required. The developer account to add the user to.
   * Format: developers/{developer}
   * @param User $postBody
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function create($parent, User $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], User::class);
  }
  /**
   * Removes all access for the user to the given developer account.
   * (users.delete)
   *
   * @param string $name Required. The name of the user to delete. Format:
   * developers/{developer}/users/{email}
   * @param array $optParams Optional parameters.
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Lists all users with access to a developer account. (users.listUsers)
   *
   * @param string $parent Required. The developer account to fetch users from.
   * Format: developers/{developer}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return. This must be
   * set to -1 to disable pagination.
   * @opt_param string pageToken A token received from a previous call to this
   * method, in order to retrieve further results.
   * @return ListUsersResponse
   */
  public function listUsers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUsersResponse::class);
  }
  /**
   * Updates access for the user to the developer account. (users.patch)
   *
   * @param string $name Required. Resource name for this user, following the
   * pattern "developers/{developer}/users/{email}".
   * @param User $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The list of fields to be updated.
   * @return User
   */
  public function patch($name, User $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], User::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Users::class, 'Google_Service_AndroidPublisher_Resource_Users');
