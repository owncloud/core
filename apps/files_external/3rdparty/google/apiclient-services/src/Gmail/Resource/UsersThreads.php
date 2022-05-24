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

use Google\Service\Gmail\ListThreadsResponse;
use Google\Service\Gmail\ModifyThreadRequest;
use Google\Service\Gmail\Thread;

/**
 * The "threads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $threads = $gmailService->threads;
 *  </code>
 */
class UsersThreads extends \Google\Service\Resource
{
  /**
   * Immediately and permanently deletes the specified thread. Any messages that
   * belong to the thread are also deleted. This operation cannot be undone.
   * Prefer `threads.trash` instead. (threads.delete)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id ID of the Thread to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets the specified thread. (threads.get)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the thread to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string format The format to return the messages in.
   * @opt_param string metadataHeaders When given and format is METADATA, only
   * include headers specified.
   * @return Thread
   */
  public function get($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Thread::class);
  }
  /**
   * Lists the threads in the user's mailbox. (threads.listUsersThreads)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeSpamTrash Include threads from `SPAM` and `TRASH` in
   * the results.
   * @opt_param string labelIds Only return threads with labels that match all of
   * the specified label IDs.
   * @opt_param string maxResults Maximum number of threads to return. This field
   * defaults to 100. The maximum allowed value for this field is 500.
   * @opt_param string pageToken Page token to retrieve a specific page of results
   * in the list.
   * @opt_param string q Only return threads matching the specified query.
   * Supports the same query format as the Gmail search box. For example,
   * `"from:someuser@example.com rfc822msgid: is:unread"`. Parameter cannot be
   * used when accessing the api using the gmail.metadata scope.
   * @return ListThreadsResponse
   */
  public function listUsersThreads($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListThreadsResponse::class);
  }
  /**
   * Modifies the labels applied to the thread. This applies to all messages in
   * the thread. (threads.modify)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the thread to modify.
   * @param ModifyThreadRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Thread
   */
  public function modify($userId, $id, ModifyThreadRequest $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modify', [$params], Thread::class);
  }
  /**
   * Moves the specified thread to the trash. Any messages that belong to the
   * thread are also moved to the trash. (threads.trash)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the thread to Trash.
   * @param array $optParams Optional parameters.
   * @return Thread
   */
  public function trash($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('trash', [$params], Thread::class);
  }
  /**
   * Removes the specified thread from the trash. Any messages that belong to the
   * thread are also removed from the trash. (threads.untrash)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the thread to remove from Trash.
   * @param array $optParams Optional parameters.
   * @return Thread
   */
  public function untrash($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('untrash', [$params], Thread::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersThreads::class, 'Google_Service_Gmail_Resource_UsersThreads');
