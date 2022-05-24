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

use Google\Service\Blogger\Post;
use Google\Service\Blogger\PostList;

/**
 * The "posts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $posts = $bloggerService->posts;
 *  </code>
 */
class Posts extends \Google\Service\Resource
{
  /**
   * Deletes a post by blog id and post id. (posts.delete)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   */
  public function delete($blogId, $postId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a post by blog id and post id (posts.get)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody
   * @opt_param bool fetchImages
   * @opt_param string maxComments
   * @opt_param string view
   * @return Post
   */
  public function get($blogId, $postId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Post::class);
  }
  /**
   * Gets a post by path. (posts.getByPath)
   *
   * @param string $blogId
   * @param string $path
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments
   * @opt_param string view
   * @return Post
   */
  public function getByPath($blogId, $path, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('getByPath', [$params], Post::class);
  }
  /**
   * Inserts a post. (posts.insert)
   *
   * @param string $blogId
   * @param Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody
   * @opt_param bool fetchImages
   * @opt_param bool isDraft
   * @return Post
   */
  public function insert($blogId, Post $postBody, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Post::class);
  }
  /**
   * Lists posts. (posts.listPosts)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * @opt_param bool fetchBodies
   * @opt_param bool fetchImages
   * @opt_param string labels
   * @opt_param string maxResults
   * @opt_param string orderBy
   * @opt_param string pageToken
   * @opt_param string startDate
   * @opt_param string status
   * @opt_param string view
   * @return PostList
   */
  public function listPosts($blogId, $optParams = [])
  {
    $params = ['blogId' => $blogId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PostList::class);
  }
  /**
   * Patches a post. (posts.patch)
   *
   * @param string $blogId
   * @param string $postId
   * @param Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody
   * @opt_param bool fetchImages
   * @opt_param string maxComments
   * @opt_param bool publish
   * @opt_param bool revert
   * @return Post
   */
  public function patch($blogId, $postId, Post $postBody, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Post::class);
  }
  /**
   * Publishes a post. (posts.publish)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string publishDate
   * @return Post
   */
  public function publish($blogId, $postId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId];
    $params = array_merge($params, $optParams);
    return $this->call('publish', [$params], Post::class);
  }
  /**
   * Reverts a published or scheduled post to draft state. (posts.revert)
   *
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   * @return Post
   */
  public function revert($blogId, $postId, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId];
    $params = array_merge($params, $optParams);
    return $this->call('revert', [$params], Post::class);
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
   * @return PostList
   */
  public function search($blogId, $q, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'q' => $q];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], PostList::class);
  }
  /**
   * Updates a post by blog id and post id. (posts.update)
   *
   * @param string $blogId
   * @param string $postId
   * @param Post $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchBody
   * @opt_param bool fetchImages
   * @opt_param string maxComments
   * @opt_param bool publish
   * @opt_param bool revert
   * @return Post
   */
  public function update($blogId, $postId, Post $postBody, $optParams = [])
  {
    $params = ['blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Post::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Posts::class, 'Google_Service_Blogger_Resource_Posts');
