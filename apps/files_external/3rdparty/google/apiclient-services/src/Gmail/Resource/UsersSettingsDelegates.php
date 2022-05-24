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

use Google\Service\Gmail\Delegate;
use Google\Service\Gmail\ListDelegatesResponse;

/**
 * The "delegates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $delegates = $gmailService->delegates;
 *  </code>
 */
class UsersSettingsDelegates extends \Google\Service\Resource
{
  /**
   * Adds a delegate with its verification status set directly to `accepted`,
   * without sending any verification email. The delegate user must be a member of
   * the same G Suite organization as the delegator user. Gmail imposes
   * limitations on the number of delegates and delegators each user in a G Suite
   * organization can have. These limits depend on your organization, but in
   * general each user can have up to 25 delegates and up to 10 delegators. Note
   * that a delegate user must be referred to by their primary email address, and
   * not an email alias. Also note that when a new delegate is created, there may
   * be up to a one minute delay before the new delegate is available for use.
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (delegates.create)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param Delegate $postBody
   * @param array $optParams Optional parameters.
   * @return Delegate
   */
  public function create($userId, Delegate $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Delegate::class);
  }
  /**
   * Removes the specified delegate (which can be of any verification status), and
   * revokes any verification that may have been required for using it. Note that
   * a delegate user must be referred to by their primary email address, and not
   * an email alias. This method is only available to service account clients that
   * have been delegated domain-wide authority. (delegates.delete)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $delegateEmail The email address of the user to be removed as a
   * delegate.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $delegateEmail, $optParams = [])
  {
    $params = ['userId' => $userId, 'delegateEmail' => $delegateEmail];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets the specified delegate. Note that a delegate user must be referred to by
   * their primary email address, and not an email alias. This method is only
   * available to service account clients that have been delegated domain-wide
   * authority. (delegates.get)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $delegateEmail The email address of the user whose delegate
   * relationship is to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Delegate
   */
  public function get($userId, $delegateEmail, $optParams = [])
  {
    $params = ['userId' => $userId, 'delegateEmail' => $delegateEmail];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Delegate::class);
  }
  /**
   * Lists the delegates for the specified account. This method is only available
   * to service account clients that have been delegated domain-wide authority.
   * (delegates.listUsersSettingsDelegates)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return ListDelegatesResponse
   */
  public function listUsersSettingsDelegates($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDelegatesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersSettingsDelegates::class, 'Google_Service_Gmail_Resource_UsersSettingsDelegates');
