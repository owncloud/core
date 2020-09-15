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
 * The "posts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $posts = $bloggerService->posts;
 *  </code>
 */
class Google_Service_Blogger_Resource_Posts extends Google_Service_Resource
{
  /**
   * Deletes a post by blog id and post id. (posts.delete)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets a post by blog id and post id (posts.get)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments
   * @opt_param bool fetchBody
   * @opt_param string view
   * @opt_param bool fetchImages
   * @return Google_Service_Blogger_Post
   */
  public function get($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Gets a post by path. (posts.getByPath)
   *
   * @param string $blogId
   * @param string $path
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view
   * @opt_param string maxComments
   * @return Google_Service_Blogger_Post
   */
  public function getByPath($blogId, $path, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'path' => $path);
    $params = array_merge($params, $optParams);
    return $this->call('getByPath', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Inserts a post. (posts.insert)
   *
   * @param string $blogId
   * @param Google_Service_Blogger_Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchImages
   * @opt_param bool isDraft
   * @opt_param bool fetchBody
   * @return Google_Service_Blogger_Post
   */
  public function insert($blogId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Lists posts. (posts.listPosts)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * @opt_param string pageToken
   * @opt_param string maxResults
   * @opt_param string startDate
   * @opt_param string labels
   * @opt_param string status
   * @opt_param string orderBy
   * @opt_param string view
   * @opt_param bool fetchImages
   * @opt_param bool fetchBodies
   * @return Google_Service_Blogger_PostList
   */
  public function listPosts($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PostList");
  }
  /**
   * Patches a post. (posts.patch)
   *
   * @param string $blogId
   * @param string $postId
   * @param Google_Service_Blogger_Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool publish
   * @opt_param bool fetchBody
   * @opt_param string maxComments
   * @opt_param bool revert
   * @opt_param bool fetchImages
   * @return Google_Service_Blogger_Post
   */
  public function patch($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Publishes a post. (posts.publish)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string publishDate
   * @return Google_Service_Blogger_Post
   */
  public function publish($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Reverts a published or scheduled post to draft state. (posts.revert)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   * @return Google_Service_Blogger_Post
   */
  public function revert($blogId, $postId, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('revert', array($params), "Google_Service_Blogger_Post");
  }
  /**
   * Searches for posts matching given query terms in the specified blog.
   * (posts.search)
   *
   * @param string $blogId
   * @param string $q
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBodies
   * @opt_param string orderBy
   * @return Google_Service_Blogger_PostList
   */
  public function search($blogId, $q, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'q' => $q);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Blogger_PostList");
  }
  /**
   * Updates a post by blog id and post id. (posts.update)
   *
   * @param string $blogId
   * @param string $postId
   * @param Google_Service_Blogger_Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments
   * @opt_param bool publish
   * @opt_param bool fetchImages
   * @opt_param bool fetchBody
   * @opt_param bool revert
   * @return Google_Service_Blogger_Post
   */
  public function update($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = array())
  {
    $params = array('blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Blogger_Post");
  }
}
