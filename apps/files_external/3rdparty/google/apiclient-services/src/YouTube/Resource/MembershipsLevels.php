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

use Google\Service\YouTube\MembershipsLevelListResponse;

/**
 * The "membershipsLevels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $membershipsLevels = $youtubeService->membershipsLevels;
 *  </code>
 */
class MembershipsLevels extends \Google\Service\Resource
{
  /**
   * Retrieves a list of all pricing levels offered by a creator to the fans.
   * (membershipsLevels.listMembershipsLevels)
   *
   * @param string|array $part The *part* parameter specifies the membershipsLevel
   * resource parts that the API response will include. Supported values are id
   * and snippet.
   * @param array $optParams Optional parameters.
   * @return MembershipsLevelListResponse
   */
  public function listMembershipsLevels($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], MembershipsLevelListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipsLevels::class, 'Google_Service_YouTube_Resource_MembershipsLevels');
