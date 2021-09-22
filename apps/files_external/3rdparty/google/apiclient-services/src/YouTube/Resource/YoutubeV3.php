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

/**
 * The "v3" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $v3 = $youtubeService->v3;
 *  </code>
 */
class YoutubeV3 extends \Google\Service\Resource
{
  /**
   * Updates an existing resource. (v3.updateCommentThreads)
   *
   * @param CommentThread $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string part The *part* parameter specifies a comma-separated list
   * of commentThread resource properties that the API response will include. You
   * must at least include the snippet part in the parameter value since that part
   * contains all of the properties that the API request can update.
   * @return CommentThread
   */
  public function updateCommentThreads(CommentThread $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateCommentThreads', [$params], CommentThread::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YoutubeV3::class, 'Google_Service_YouTube_Resource_YoutubeV3');
