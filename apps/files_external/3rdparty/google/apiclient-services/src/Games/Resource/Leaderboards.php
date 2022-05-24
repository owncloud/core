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

namespace Google\Service\Games\Resource;

use Google\Service\Games\Leaderboard;
use Google\Service\Games\LeaderboardListResponse;

/**
 * The "leaderboards" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $leaderboards = $gamesService->leaderboards;
 *  </code>
 */
class Leaderboards extends \Google\Service\Resource
{
  /**
   * Retrieves the metadata of the leaderboard with the given ID.
   * (leaderboards.get)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Leaderboard
   */
  public function get($leaderboardId, $optParams = [])
  {
    $params = ['leaderboardId' => $leaderboardId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Leaderboard::class);
  }
  /**
   * Lists all the leaderboard metadata for your application.
   * (leaderboards.listLeaderboards)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboards to return in the
   * response. For any response, the actual number of leaderboards returned may be
   * less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return LeaderboardListResponse
   */
  public function listLeaderboards($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], LeaderboardListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Leaderboards::class, 'Google_Service_Games_Resource_Leaderboards');
