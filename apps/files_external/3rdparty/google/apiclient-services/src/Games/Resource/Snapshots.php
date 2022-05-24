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

use Google\Service\Games\Snapshot;
use Google\Service\Games\SnapshotListResponse;

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $snapshots = $gamesService->snapshots;
 *  </code>
 */
class Snapshots extends \Google\Service\Resource
{
  /**
   * Retrieves the metadata for a given snapshot ID. (snapshots.get)
   *
   * @param string $snapshotId The ID of the snapshot.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Snapshot
   */
  public function get($snapshotId, $optParams = [])
  {
    $params = ['snapshotId' => $snapshotId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Snapshot::class);
  }
  /**
   * Retrieves a list of snapshots created by your application for the player
   * corresponding to the player ID. (snapshots.listSnapshots)
   *
   * @param string $playerId A player ID. A value of `me` may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of snapshot resources to return
   * in the response, used for paging. For any response, the actual number of
   * snapshot resources returned may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return SnapshotListResponse
   */
  public function listSnapshots($playerId, $optParams = [])
  {
    $params = ['playerId' => $playerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SnapshotListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Snapshots::class, 'Google_Service_Games_Resource_Snapshots');
