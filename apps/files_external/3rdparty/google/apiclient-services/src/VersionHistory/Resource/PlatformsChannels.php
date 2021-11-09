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

namespace Google\Service\VersionHistory\Resource;

use Google\Service\VersionHistory\ListChannelsResponse;

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $versionhistoryService = new Google\Service\VersionHistory(...);
 *   $channels = $versionhistoryService->channels;
 *  </code>
 */
class PlatformsChannels extends \Google\Service\Resource
{
  /**
   * Returns list of channels that are available for a given platform.
   * (channels.listPlatformsChannels)
   *
   * @param string $parent Required. The platform, which owns this collection of
   * channels. Format: {product}/platforms/{platform}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Optional limit on the number of channels to
   * include in the response. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListChannels` call. Provide this to retrieve the subsequent page.
   * @return ListChannelsResponse
   */
  public function listPlatformsChannels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListChannelsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlatformsChannels::class, 'Google_Service_VersionHistory_Resource_PlatformsChannels');
