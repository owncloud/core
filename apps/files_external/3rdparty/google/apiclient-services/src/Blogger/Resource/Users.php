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

namespace Google\Service\Blogger\Resource;

use Google\Service\Blogger\User;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $users = $bloggerService->users;
 *  </code>
 */
class Users extends \Google\Service\Resource
{
  /**
   * Gets one user by user_id. (users.get)
   *
   * @param string $userId
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function get($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], User::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Users::class, 'Google_Service_Blogger_Resource_Users');
