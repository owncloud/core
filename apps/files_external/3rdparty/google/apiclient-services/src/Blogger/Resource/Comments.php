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

use Google\Service\Blogger\Comment;
use Google\Service\Blogger\CommentList;

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $comments = $bloggerService->comments;
 *  </code>
 */
class Comments extends \Google\Service\Resource
{
  /**
   * Marks a comment as not spam by blog id, post id and comment id.
   * (comments.approve)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   * @return Comment
   */
  public function approve($blogId, $postId, $commentId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
    $params = array_merge($params, $optParams);
    return $this->call('approve', [$params], Comment::class);
  }
  /**
   * Deletes a comment by blog id, post id and comment id. (comments.delete)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $commentId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a comment by id. (comments.get)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view
   * @return Comment
   */
  public function get($blogId, $postId, $commentId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Comment::class);
  }
  /**
   * Lists comments. (comments.listComments)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * @opt_param bool fetchBodies
   * @opt_param string maxResults
   * @opt_param string pageToken
   * @opt_param string startDate
   * @opt_param string status
   * @opt_param string view
   * @return CommentList
   */
  public function listComments($blogId, $postId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CommentList::class);
  }
  /**
   * Lists comments by blog. (comments.listByBlog)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * @opt_param bool fetchBodies
   * @opt_param string maxResults
   * @opt_param string pageToken
   * @opt_param string startDate
   * @opt_param string status
   * @return CommentList
   */
  public function listByBlog($blogId, $optParams = [])
  {
    $params = ['blogId' => $blogId];
    $params = array_merge($params, $optParams);
    return $this->call('listByBlog', [$params], CommentList::class);
  }
  /**
   * Marks a comment as spam by blog id, post id and comment id.
   * (comments.markAsSpam)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   * @return Comment
   */
  public function markAsSpam($blogId, $postId, $commentId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
    $params = array_merge($params, $optParams);
    return $this->call('markAsSpam', [$params], Comment::class);
  }
  /**
   * Removes the content of a comment by blog id, post id and comment id.
   * (comments.removeContent)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   * @return Comment
   */
  public function removeContent($blogId, $postId, $commentId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
    $params = array_merge($params, $optParams);
    return $this->call('removeContent', [$params], Comment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Comments::class, 'Google_Service_Blogger_Resource_Comments');
