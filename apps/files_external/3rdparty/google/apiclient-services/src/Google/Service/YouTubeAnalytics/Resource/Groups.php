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
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $groups = $youtubeAnalyticsService->groups;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_Resource_Groups extends Google_Service_Resource
{
  /**
   * Deletes a group. (groups.delete)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner This parameter can only be used in a
   * properly authorized request. **Note:** This parameter is intended exclusively
   * for YouTube content partners that own and manage many different YouTube
   * channels.
   *
   * The `onBehalfOfContentOwner` parameter indicates that the request's
   * authorization credentials identify a YouTube user who is acting on behalf of
   * the content owner specified in the parameter value. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The account that the user authenticates with must be linked to the
   * specified YouTube content owner.
   * @opt_param string id The `id` parameter specifies the YouTube group ID of the
   * group that is being deleted.
   * @return Google_Service_YouTubeAnalytics_EmptyResponse
   */
  public function delete($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_YouTubeAnalytics_EmptyResponse");
  }
  /**
   * Creates a group. (groups.insert)
   *
   * @param Google_Service_YouTubeAnalytics_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner This parameter can only be used in a
   * properly authorized request. **Note:** This parameter is intended exclusively
   * for YouTube content partners that own and manage many different YouTube
   * channels.
   *
   * The `onBehalfOfContentOwner` parameter indicates that the request's
   * authorization credentials identify a YouTube user who is acting on behalf of
   * the content owner specified in the parameter value. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The account that the user authenticates with must be linked to the
   * specified YouTube content owner.
   * @return Google_Service_YouTubeAnalytics_Group
   */
  public function insert(Google_Service_YouTubeAnalytics_Group $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTubeAnalytics_Group");
  }
  /**
   * Returns a collection of groups that match the API request parameters. For
   * example, you can retrieve all groups that the authenticated user owns, or you
   * can retrieve one or more groups by their unique IDs. (groups.listGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The `pageToken` parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * `nextPageToken` property identifies the next page that can be retrieved.
   * @opt_param string onBehalfOfContentOwner This parameter can only be used in a
   * properly authorized request. **Note:** This parameter is intended exclusively
   * for YouTube content partners that own and manage many different YouTube
   * channels.
   *
   * The `onBehalfOfContentOwner` parameter indicates that the request's
   * authorization credentials identify a YouTube user who is acting on behalf of
   * the content owner specified in the parameter value. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The account that the user authenticates with must be linked to the
   * specified YouTube content owner.
   * @opt_param string id The `id` parameter specifies a comma-separated list of
   * the YouTube group ID(s) for the resource(s) that are being retrieved. Each
   * group must be owned by the authenticated user. In a `group` resource, the
   * `id` property specifies the group's YouTube group ID.
   *
   * Note that if you do not specify a value for the `id` parameter, then you must
   * set the `mine` parameter to `true`.
   * @opt_param bool mine This parameter can only be used in a properly authorized
   * request. Set this parameter's value to true to retrieve all groups owned by
   * the authenticated user.
   * @return Google_Service_YouTubeAnalytics_ListGroupsResponse
   */
  public function listGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTubeAnalytics_ListGroupsResponse");
  }
  /**
   * Modifies a group. For example, you could change a group's title.
   * (groups.update)
   *
   * @param Google_Service_YouTubeAnalytics_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner This parameter can only be used in a
   * properly authorized request. **Note:** This parameter is intended exclusively
   * for YouTube content partners that own and manage many different YouTube
   * channels.
   *
   * The `onBehalfOfContentOwner` parameter indicates that the request's
   * authorization credentials identify a YouTube user who is acting on behalf of
   * the content owner specified in the parameter value. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The account that the user authenticates with must be linked to the
   * specified YouTube content owner.
   * @return Google_Service_YouTubeAnalytics_Group
   */
  public function update(Google_Service_YouTubeAnalytics_Group $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTubeAnalytics_Group");
  }
}
