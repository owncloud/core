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

use Google\Service\YouTube\VideoAbuseReportReasonListResponse;

/**
 * The "videoAbuseReportReasons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $videoAbuseReportReasons = $youtubeService->videoAbuseReportReasons;
 *  </code>
 */
class VideoAbuseReportReasons extends \Google\Service\Resource
{
  /**
   * Retrieves a list of resources, possibly filtered.
   * (videoAbuseReportReasons.listVideoAbuseReportReasons)
   *
   * @param string|array $part The *part* parameter specifies the videoCategory
   * resource parts that the API response will include. Supported values are id
   * and snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * @return VideoAbuseReportReasonListResponse
   */
  public function listVideoAbuseReportReasons($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VideoAbuseReportReasonListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoAbuseReportReasons::class, 'Google_Service_YouTube_Resource_VideoAbuseReportReasons');
