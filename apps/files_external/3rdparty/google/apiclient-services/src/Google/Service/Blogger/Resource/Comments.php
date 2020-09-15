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
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $comments = $bloggerService->comments;
 *  </code>
 */
class Google_Service_Blogger_Resource_Comments extends Google_Service_Resource
{
  /**
   * Marks a comment as not spam by blog id, post id and comment id.
   * (comments.approve)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function approve($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('approve', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Deletes a comment by blog id, post id and comment id. (comments.delete)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
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
   * @return Google_Service_Blogger_Comment
   */
  public function get($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Lists comments. (comments.listComments)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * @opt_param string maxResults
   * @opt_param string startDate
   * @opt_param string endDate
   * @opt_param bool fetchBodies
   * @opt_param string status
   * @opt_param string view
   * @return Google_Service_Blogger_CommentList
   */
  public function listComments($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_CommentList");
  }
  /**
   * Lists comments by blog. (comments.listByBlog)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string status
   * @opt_param string endDate
   * @opt_param string pageToken
   * @opt_param string maxResults
   * @opt_param bool fetchBodies
   * @opt_param string startDate
   * @return Google_Service_Blogger_CommentList
   */
  public function listByBlog($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('listByBlog', array($params), "Google_Service_Blogger_CommentList");
  }
  /**
   * Marks a comment as spam by blog id, post id and comment id.
   * (comments.markAsSpam)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function markAsSpam($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('markAsSpam', array($params), "Google_Service_Blogger_Comment");
  }
  /**
   * Removes the content of a comment by blog id, post id and comment id.
   * (comments.removeContent)
   *
   * @param string $blogId
   * @param string $postId
   * @param string $commentId
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Comment
   */
  public function removeContent($blogId, $postId, $commentId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId);
    $params = array_merge($params, $optParams);
    return $this->call('removeContent', array($params), "Google_Service_Blogger_Comment");
  }
}
