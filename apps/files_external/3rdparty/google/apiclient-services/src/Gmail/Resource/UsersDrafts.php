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

use Google\Service\Gmail\Draft;
use Google\Service\Gmail\ListDraftsResponse;
use Google\Service\Gmail\Message;

/**
 * The "drafts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $drafts = $gmailService->drafts;
 *  </code>
 */
class UsersDrafts extends \Google\Service\Resource
{
  /**
   * Creates a new draft with the `DRAFT` label. (drafts.create)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param Draft $postBody
   * @param array $optParams Optional parameters.
   * @return Draft
   */
  public function create($userId, Draft $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Draft::class);
  }
  /**
   * Immediately and permanently deletes the specified draft. Does not simply
   * trash it. (drafts.delete)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the draft to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets the specified draft. (drafts.get)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the draft to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string format The format to return the draft in.
   * @return Draft
   */
  public function get($userId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Draft::class);
  }
  /**
   * Lists the drafts in the user's mailbox. (drafts.listUsersDrafts)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeSpamTrash Include drafts from `SPAM` and `TRASH` in
   * the results.
   * @opt_param string maxResults Maximum number of drafts to return. This field
   * defaults to 100. The maximum allowed value for this field is 500.
   * @opt_param string pageToken Page token to retrieve a specific page of results
   * in the list.
   * @opt_param string q Only return draft messages matching the specified query.
   * Supports the same query format as the Gmail search box. For example,
   * `"from:someuser@example.com rfc822msgid: is:unread"`.
   * @return ListDraftsResponse
   */
  public function listUsersDrafts($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDraftsResponse::class);
  }
  /**
   * Sends the specified, existing draft to the recipients in the `To`, `Cc`, and
   * `Bcc` headers. (drafts.send)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param Draft $postBody
   * @param array $optParams Optional parameters.
   * @return Message
   */
  public function send($userId, Draft $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('send', [$params], Message::class);
  }
  /**
   * Replaces a draft's content. (drafts.update)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $id The ID of the draft to update.
   * @param Draft $postBody
   * @param array $optParams Optional parameters.
   * @return Draft
   */
  public function update($userId, $id, Draft $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Draft::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersDrafts::class, 'Google_Service_Gmail_Resource_UsersDrafts');
