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
 * The "blogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogs = $bloggerService->blogs;
 *  </code>
 */
class Google_Service_Blogger_Resource_Blogs extends Google_Service_Resource
{
  /**
   * Gets a blog by id. (blogs.get)
   *
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxPosts
   * @opt_param string view
   * @return Google_Service_Blogger_Blog
   */
  public function get($blogId, $optParams = array())
  {
    $params = array('blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_Blog");
  }
  /**
   * Gets a blog by url. (blogs.getByUrl)
   *
   * @param string $url
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view
   * @return Google_Service_Blogger_Blog
   */
  public function getByUrl($url, $optParams = array())
  {
    $params = array('url' => $url);
    $params = array_merge($params, $optParams);
    return $this->call('getByUrl', array($params), "Google_Service_Blogger_Blog");
  }
  /**
   * Lists blogs by user. (blogs.listByUser)
   *
   * @param string $userId
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool fetchUserInfo
   * @opt_param string role
   * @opt_param string view
   * @opt_param string status Default value of status is LIVE.
   * @return Google_Service_Blogger_BlogList
   */
  public function listByUser($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('listByUser', array($params), "Google_Service_Blogger_BlogList");
  }
}
