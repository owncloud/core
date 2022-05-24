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

use Google\Service\Blogger\Blog;
use Google\Service\Blogger\BlogList;

/**
 * The "blogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $blogs = $bloggerService->blogs;
 *  </code>
 */
class Blogs extends \Google\Service\Resource
{
  /**
   * Gets a blog by id. (blogs.get)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxPosts
   * @opt_param string view
   * @return Blog
   */
  public function get($blogId, $optParams = [])
  {
    $params = ['blogId' => $blogId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Blog::class);
  }
  /**
   * Gets a blog by url. (blogs.getByUrl)
   *
   * @param string $url
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view
   * @return Blog
   */
  public function getByUrl($url, $optParams = [])
  {
    $params = ['url' => $url];
    $params = array_merge($params, $optParams);
    return $this->call('getByUrl', [$params], Blog::class);
  }
  /**
   * Lists blogs by user. (blogs.listByUser)
   *
   * @param string $userId
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchUserInfo
   * @opt_param string role
   * @opt_param string status Default value of status is LIVE.
   * @opt_param string view
   * @return BlogList
   */
  public function listByUser($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('listByUser', [$params], BlogList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Blogs::class, 'Google_Service_Blogger_Resource_Blogs');
