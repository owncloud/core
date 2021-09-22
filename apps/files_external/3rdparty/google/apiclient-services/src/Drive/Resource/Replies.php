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

namespace Google\Service\Drive\Resource;

use Google\Service\Drive\Reply;
use Google\Service\Drive\ReplyList;

/**
 * The "replies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google\Service\Drive(...);
 *   $replies = $driveService->replies;
 *  </code>
 */
class Replies extends \Google\Service\Resource
{
  /**
   * Creates a new reply to a comment. (replies.create)
   *
   * @param string $fileId The ID of the file.
   * @param string $commentId The ID of the comment.
   * @param Reply $postBody
   * @param array $optParams Optional parameters.
   * @return Reply
   */
  public function create($fileId, $commentId, Reply $postBody, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'commentId' => $commentId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Reply::class);
  }
  /**
   * Deletes a reply. (replies.delete)
   *
   * @param string $fileId The ID of the file.
   * @param string $commentId The ID of the comment.
   * @param string $replyId The ID of the reply.
   * @param array $optParams Optional parameters.
   */
  public function delete($fileId, $commentId, $replyId, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a reply by ID. (replies.get)
   *
   * @param string $fileId The ID of the file.
   * @param string $commentId The ID of the comment.
   * @param string $replyId The ID of the reply.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeDeleted Whether to return deleted replies. Deleted
   * replies will not include their original content.
   * @return Reply
   */
  public function get($fileId, $commentId, $replyId, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Reply::class);
  }
  /**
   * Lists a comment's replies. (replies.listReplies)
   *
   * @param string $fileId The ID of the file.
   * @param string $commentId The ID of the comment.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeDeleted Whether to include deleted replies. Deleted
   * replies will not include their original content.
   * @opt_param int pageSize The maximum number of replies to return per page.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of 'nextPageToken' from the
   * previous response.
   * @return ReplyList
   */
  public function listReplies($fileId, $commentId, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'commentId' => $commentId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ReplyList::class);
  }
  /**
   * Updates a reply with patch semantics. (replies.update)
   *
   * @param string $fileId The ID of the file.
   * @param string $commentId The ID of the comment.
   * @param string $replyId The ID of the reply.
   * @param Reply $postBody
   * @param array $optParams Optional parameters.
   * @return Reply
   */
  public function update($fileId, $commentId, $replyId, Reply $postBody, $optParams = [])
  {
    $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Reply::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Replies::class, 'Google_Service_Drive_Resource_Replies');
