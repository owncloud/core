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

use Google\Service\Blogger\PostUserInfo;
use Google\Service\Blogger\PostUserInfosList;

/**
 * The "postUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google\Service\Blogger(...);
 *   $postUserInfos = $bloggerService->postUserInfos;
 *  </code>
 */
class PostUserInfos extends \Google\Service\Resource
{
  /**
   * Gets one post and user info pair, by post_id and user_id. (postUserInfos.get)
   *
   * @param string $userId
   * @param string $blogId
   * @param string $postId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxComments
   * @return PostUserInfo
   */
  public function get($userId, $blogId, $postId, $optParams = [])
  {
    $params = ['userId' => $userId, 'blogId' => $blogId, 'postId' => $postId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PostUserInfo::class);
  }
  /**
   * Lists post and user info pairs. (postUserInfos.listPostUserInfos)
   *
   * @param string $userId
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * @opt_param bool fetchBodies
   * @opt_param string labels
   * @opt_param string maxResults
   * @opt_param string orderBy
   * @opt_param string pageToken
   * @opt_param string startDate
   * @opt_param string status
   * @opt_param string view
   * @return PostUserInfosList
   */
  public function listPostUserInfos($userId, $blogId, $optParams = [])
  {
    $params = ['userId' => $userId, 'blogId' => $blogId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PostUserInfosList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostUserInfos::class, 'Google_Service_Blogger_Resource_PostUserInfos');
