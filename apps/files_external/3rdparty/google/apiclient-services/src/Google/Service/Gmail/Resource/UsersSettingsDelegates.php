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

/**
 * The "delegates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $delegates = $gmailService->delegates;
 *  </code>
 */
class Google_Service_Gmail_Resource_UsersSettingsDelegates extends Google_Service_Resource
{
  /**
   * Adds a delegate with its verification status set directly to `accepted`,
   * without sending any verification email.  The delegate user must be a member
   * of the same G Suite organization as the delegator user.
   *
   * Gmail imposes limitations on the number of delegates and delegators each user
   * in a G Suite organization can have. These limits depend on your organization,
   * but in general each user can have up to 25 delegates and up to 10 delegators.
   *
   * Note that a delegate user must be referred to by their primary email address,
   * and not an email alias.
   *
   * Also note that when a new delegate is created, there may be up to a one
   * minute delay before the new delegate is available for use.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (delegates.create)
   *
   * @param string $userId User's email address.  The special value "me" can be
   * used to indicate the authenticated user.
   * @param Google_Service_Gmail_Delegate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Delegate
   */
  public function create($userId, Google_Service_Gmail_Delegate $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Gmail_Delegate");
  }
  /**
   * Removes the specified delegate (which can be of any verification status), and
   * revokes any verification that may have been required for using it.
   *
   * Note that a delegate user must be referred to by their primary email address,
   * and not an email alias.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (delegates.delete)
   *
   * @param string $userId User's email address.  The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $delegateEmail The email address of the user to be removed as a
   * delegate.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $delegateEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'delegateEmail' => $delegateEmail);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets the specified delegate.
   *
   * Note that a delegate user must be referred to by their primary email address,
   * and not an email alias.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (delegates.get)
   *
   * @param string $userId User's email address.  The special value "me" can be
   * used to indicate the authenticated user.
   * @param string $delegateEmail The email address of the user whose delegate
   * relationship is to be retrieved.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_Delegate
   */
  public function get($userId, $delegateEmail, $optParams = array())
  {
    $params = array('userId' => $userId, 'delegateEmail' => $delegateEmail);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Gmail_Delegate");
  }
  /**
   * Lists the delegates for the specified account.
   *
   * This method is only available to service account clients that have been
   * delegated domain-wide authority. (delegates.listUsersSettingsDelegates)
   *
   * @param string $userId User's email address.  The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Gmail_ListDelegatesResponse
   */
  public function listUsersSettingsDelegates($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Gmail_ListDelegatesResponse");
  }
}
