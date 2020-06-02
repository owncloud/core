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
 * The "commentThreads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $commentThreads = $youtubeService->commentThreads;
 *  </code>
 */
class Google_Service_YouTube_Resource_CommentThreads extends Google_Service_Resource
{
  /**
   * Inserts a new resource into this collection. (commentThreads.insert)
   *
   * @param string|array $part The part parameter identifies the properties that
   * the API response will include. Set the parameter value to snippet. The
   * snippet part has a quota cost of 2 units.
   * @param Google_Service_YouTube_CommentThread $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_CommentThread
   */
  public function insert($part, Google_Service_YouTube_CommentThread $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_CommentThread");
  }
  /**
   * Retrieves a list of resources, possibly filtered.
   * (commentThreads.listCommentThreads)
   *
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more commentThread resource properties that the API response will
   * include.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string channelId Returns the comment threads for all the channel
   * comments (ie does not include comments left on videos).
   * @opt_param string moderationStatus Limits the returned comment threads to
   * those with the specified moderation status. Not compatible with the 'id'
   * filter. Valid values: published, heldForReview, likelySpam.
   * @opt_param string searchTerms Limits the returned comment threads to those
   * matching the specified key words. Not compatible with the 'id' filter.
   * @opt_param string textFormat The requested text format for the returned
   * comments.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param string allThreadsRelatedToChannelId Returns the comment threads of
   * all videos of the channel and the channel comments as well.
   * @opt_param string id Returns the comment threads with the given IDs for
   * Stubby or Apiary.
   * @opt_param string order
   * @opt_param string videoId Returns the comment threads of the specified video.
   * @return Google_Service_YouTube_CommentThreadListResponse
   */
  public function listCommentThreads($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_CommentThreadListResponse");
  }
  /**
   * Updates an existing resource. (commentThreads.update)
   *
   * @param string|array $part The part parameter specifies a comma-separated list
   * of commentThread resource properties that the API response will include. You
   * must at least include the snippet part in the parameter value since that part
   * contains all of the properties that the API request can update.
   * @param Google_Service_YouTube_CommentThread $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_CommentThread
   */
  public function update($part, Google_Service_YouTube_CommentThread $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_CommentThread");
  }
}
