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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\VideoFormat;
use Google\Service\Dfareporting\VideoFormatsListResponse;

/**
 * The "videoFormats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $videoFormats = $dfareportingService->videoFormats;
 *  </code>
 */
class VideoFormats extends \Google\Service\Resource
{
  /**
   * Gets one video format by ID. (videoFormats.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param int $id Video format ID.
   * @param array $optParams Optional parameters.
   * @return VideoFormat
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], VideoFormat::class);
  }
  /**
   * Lists available video formats. (videoFormats.listVideoFormats)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   * @return VideoFormatsListResponse
   */
  public function listVideoFormats($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], VideoFormatsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFormats::class, 'Google_Service_Dfareporting_Resource_VideoFormats');
