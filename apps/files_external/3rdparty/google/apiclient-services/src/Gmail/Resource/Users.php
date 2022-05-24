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

namespace Google\Service\Gmail\Resource;

use Google\Service\Gmail\Profile;
use Google\Service\Gmail\WatchRequest;
use Google\Service\Gmail\WatchResponse;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $users = $gmailService->users;
 *  </code>
 */
class Users extends \Google\Service\Resource
{
  /**
   * Gets the current user's Gmail profile. (users.getProfile)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function getProfile($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getProfile', [$params], Profile::class);
  }
  /**
   * Stop receiving push notifications for the given user mailbox. (users.stop)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   */
  public function stop($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params]);
  }
  /**
   * Set up or update a push notification watch on the given user mailbox.
   * (users.watch)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param WatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return WatchResponse
   */
  public function watch($userId, WatchRequest $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('watch', [$params], WatchResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Users::class, 'Google_Service_Gmail_Resource_Users');
