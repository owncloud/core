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

namespace Google\Service\YouTubeReporting\Resource;

use Google\Service\YouTubeReporting\GdataMedia;

/**
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubereportingService = new Google\Service\YouTubeReporting(...);
 *   $media = $youtubereportingService->media;
 *  </code>
 */
class Media extends \Google\Service\Resource
{
  /**
   * Method for media download. Download is supported on the URI
   * `/v1/media/{+name}?alt=media`. (media.download)
   *
   * @param string $resourceName Name of the media that is being downloaded.
   * @param array $optParams Optional parameters.
   * @return GdataMedia
   */
  public function download($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('download', [$params], GdataMedia::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Media::class, 'Google_Service_YouTubeReporting_Resource_Media');
