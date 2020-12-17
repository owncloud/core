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
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $activities = $youtubeService->activities;
 *  </code>
 */
class Google_Service_YouTube_Resource_Activities extends Google_Service_Resource
{
  /**
   * Retrieves a list of resources, possibly filtered. (activities.listActivities)
   *
   * @param string|array $part The *part* parameter specifies a comma-separated
   * list of one or more activity resource properties that the API response will
   * include. If the parameter identifies a property that contains child
   * properties, the child properties will be included in the response. For
   * example, in an activity resource, the snippet property contains other
   * properties that identify the type of activity, a display title for the
   * activity, and so forth. If you set *part=snippet*, the API response will also
   * contain all of those nested properties.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string channelId
   * @opt_param bool home
   * @opt_param string maxResults The *maxResults* parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param bool mine
   * @opt_param string pageToken The *pageToken* parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param string publishedAfter
   * @opt_param string publishedBefore
   * @opt_param string regionCode
   * @return Google_Service_YouTube_ActivityListResponse
   */
  public function listActivities($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_ActivityListResponse");
  }
}
