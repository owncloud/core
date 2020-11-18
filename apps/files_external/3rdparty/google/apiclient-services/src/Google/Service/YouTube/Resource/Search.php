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
 * The "search" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $search = $youtubeService->search;
 *  </code>
 */
class Google_Service_YouTube_Resource_Search extends Google_Service_Resource
{
  /**
   * Retrieves a list of search resources (search.listSearch)
   *
   * @param string|array $part The *part* parameter specifies a comma-separated
   * list of one or more search resource properties that the API response will
   * include. Set the parameter value to snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string channelType Add a filter on the channel search.
   * @opt_param string regionCode Display the content as seen by viewers in this
   * country.
   * @opt_param bool forMine Search for the private videos of the authenticated
   * user.
   * @opt_param string videoDefinition Filter on the definition of the videos.
   * @opt_param string pageToken The *pageToken* parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param bool forContentOwner Search owned by a content owner.
   * @opt_param string videoEmbeddable Filter on embeddable videos.
   * @opt_param string locationRadius Filter on distance from the location
   * (specified above).
   * @opt_param string q Textual search terms to match.
   * @opt_param string maxResults The *maxResults* parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string channelId Filter on resources belonging to this channelId.
   * @opt_param string relatedToVideoId Search related to a resource.
   * @opt_param string location Filter on location of the video
   * @opt_param string order Sort order of the results.
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The CMS account that the user authenticates with must be linked to
   * the specified YouTube content owner.
   * @opt_param string videoDimension Filter on 3d videos.
   * @opt_param string publishedBefore Filter on resources published before this
   * date.
   * @opt_param string safeSearch Indicates whether the search results should
   * include restricted content as well as standard content.
   * @opt_param string videoSyndicated Filter on syndicated videos.
   * @opt_param string eventType Filter on the livestream status of the videos.
   * @opt_param string videoType Filter on videos of a specific type.
   * @opt_param string type Restrict results to a particular set of resource types
   * from One Platform.
   * @opt_param string videoLicense Filter on the license of the videos.
   * @opt_param string publishedAfter Filter on resources published after this
   * date.
   * @opt_param string videoDuration Filter on the duration of the videos.
   * @opt_param bool forDeveloper Restrict the search to only retrieve videos
   * uploaded using the project id of the authenticated user.
   * @opt_param string relevanceLanguage Return results relevant to this language.
   * @opt_param string videoCaption Filter on the presence of captions on the
   * videos.
   * @opt_param string videoCategoryId Filter on videos in a specific category.
   * @opt_param string topicId Restrict results to a particular topic.
   * @return Google_Service_YouTube_SearchListResponse
   */
  public function listSearch($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_SearchListResponse");
  }
}
