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

use Google\Service\YouTube\ThumbnailSetResponse;

/**
 * The "thumbnails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $thumbnails = $youtubeService->thumbnails;
 *  </code>
 */
class Thumbnails extends \Google\Service\Resource
{
  /**
   * As this is not an insert in a strict sense (it supports uploading/setting of
   * a thumbnail for multiple videos, which doesn't result in creation of a single
   * resource), I use a custom verb here. (thumbnails.set)
   *
   * @param string $videoId Returns the Thumbnail with the given video IDs for
   * Stubby or Apiary.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The actual CMS account that the user authenticates with must be
   * linked to the specified YouTube content owner.
   * @return ThumbnailSetResponse
   */
  public function set($videoId, $optParams = [])
  {
    $params = ['videoId' => $videoId];
    $params = array_merge($params, $optParams);
    return $this->call('set', [$params], ThumbnailSetResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Thumbnails::class, 'Google_Service_YouTube_Resource_Thumbnails');
