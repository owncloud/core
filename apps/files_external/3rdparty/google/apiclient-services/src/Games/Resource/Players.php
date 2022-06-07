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

use Google\Service\Games\Player;
use Google\Service\Games\PlayerListResponse;
use Google\Service\Games\ScopedPlayerIds;

/**
 * The "players" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $players = $gamesService->players;
 *  </code>
 */
class Players extends \Google\Service\Resource
{
  /**
   * Retrieves the Player resource with the given ID. To retrieve the player for
   * the currently authenticated user, set `playerId` to `me`. (players.get)
   *
   * @param string $playerId A player ID. A value of `me` may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param string playerIdConsistencyToken Consistency token of the player
   * id. The call returns a 'not found' result when the token is present and
   * invalid. Empty value is ignored. See also GlobalPlayerIdConsistencyTokenProto
   * @return Player
   */
  public function get($playerId, $optParams = [])
  {
    $params = ['playerId' => $playerId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Player::class);
  }
  /**
   * Retrieves scoped player identifiers for currently authenticated user.
   * (players.getScopedPlayerIds)
   *
   * @param array $optParams Optional parameters.
   * @return ScopedPlayerIds
   */
  public function getScopedPlayerIds($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getScopedPlayerIds', [$params], ScopedPlayerIds::class);
  }
  /**
   * Get the collection of players for the currently authenticated user.
   * (players.listPlayers)
   *
   * @param string $collection Collection of players being retrieved
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of player resources to return in
   * the response, used for paging. For any response, the actual number of player
   * resources returned may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return PlayerListResponse
   */
  public function listPlayers($collection, $optParams = [])
  {
    $params = ['collection' => $collection];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PlayerListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Players::class, 'Google_Service_Games_Resource_Players');
