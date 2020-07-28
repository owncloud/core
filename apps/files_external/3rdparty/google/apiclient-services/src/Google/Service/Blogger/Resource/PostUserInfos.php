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
 * The "postUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $postUserInfos = $bloggerService->postUserInfos;
 *  </code>
 */
class Google_Service_Blogger_Resource_PostUserInfos extends Google_Service_Resource
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
   * @return Google_Service_Blogger_PostUserInfo
   */
  public function get($userId, $blogId, $postId, $optParams = array())
  {
    $params = array('userId' => $userId, 'blogId' => $blogId, 'postId' => $postId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Blogger_PostUserInfo");
  }
  /**
   * Lists post and user info pairs. (postUserInfos.listPostUserInfos)
   *
   * @param string $userId
   * @param string $blogId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate
   * @opt_param string labels
   * @opt_param string status
   * @opt_param string orderBy
   * @opt_param bool fetchBodies
   * @opt_param string startDate
   * @opt_param string maxResults
   * @opt_param string view
   * @opt_param string pageToken
   * @return Google_Service_Blogger_PostUserInfosList
   */
  public function listPostUserInfos($userId, $blogId, $optParams = array())
  {
    $params = array('userId' => $userId, 'blogId' => $blogId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Blogger_PostUserInfosList");
  }
}
