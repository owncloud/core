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
 * The "membershipsLevels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $membershipsLevels = $youtubeService->membershipsLevels;
 *  </code>
 */
class Google_Service_YouTube_Resource_MembershipsLevels extends Google_Service_Resource
{
  /**
   * Lists pricing levels for a channel. (membershipsLevels.listMembershipsLevels)
   *
   * @param string $part The part parameter specifies the membershipsLevel
   * resource parts that the API response will include. Supported values are id
   * and snippet.
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_MembershipsLevelListResponse
   */
  public function listMembershipsLevels($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_MembershipsLevelListResponse");
  }
}
