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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\CommentThread;
use Google\Service\YouTube\CommentThreadListResponse;

/**
 * The "commentThreads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $commentThreads = $youtubeService->commentThreads;
 *  </code>
 */
class CommentThreads extends \Google\Service\Resource
{
  /**
   * Inserts a new resource into this collection. (commentThreads.insert)
   *
   * @param string|array $part The *part* parameter identifies the properties that
   * the API response will include. Set the parameter value to snippet. The
   * snippet part has a quota cost of 2 units.
   * @param CommentThread $postBody
   * @param array $optParams Optional parameters.
   * @return CommentThread
   */
  public function insert($part, CommentThread $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CommentThread::class);
  }
  /**
   * Retrieves a list of resources, possibly filtered.
   * (commentThreads.listCommentThreads)
   *
   * @param string|array $part The *part* parameter specifies a comma-separated
   * list of one or more commentThread resource properties that the API response
   * will include.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string allThreadsRelatedToChannelId Returns the comment threads of
   * all videos of the channel and the channel comments as well.
   * @opt_param string channelId Returns the comment threads for all the channel
   * comments (ie does not include comments left on videos).
   * @opt_param string id Returns the comment threads with the given IDs for
   * Stubby or Apiary.
   * @opt_param string maxResults The *maxResults* parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string moderationStatus Limits the returned comment threads to
   * those with the specified moderation status. Not compatible with the 'id'
   * filter. Valid values: published, heldForReview, likelySpam.
   * @opt_param string order
   * @opt_param string pageToken The *pageToken* parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param string searchTerms Limits the returned comment threads to those
   * matching the specified key words. Not compatible with the 'id' filter.
   * @opt_param string textFormat The requested text format for the returned
   * comments.
   * @opt_param string videoId Returns the comment threads of the specified video.
   * @return CommentThreadListResponse
   */
  public function listCommentThreads($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CommentThreadListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommentThreads::class, 'Google_Service_YouTube_Resource_CommentThreads');
