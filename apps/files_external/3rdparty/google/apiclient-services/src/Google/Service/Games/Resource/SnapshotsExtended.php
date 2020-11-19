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
 * The "snapshotsExtended" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $snapshotsExtended = $gamesService->snapshotsExtended;
 *  </code>
 */
class Google_Service_Games_Resource_SnapshotsExtended extends Google_Service_Resource
{
  /**
   * Resolves any potential conflicts according to the resolution policy specified
   * in the request and returns the snapshot head after the resolution.
   * (snapshotsExtended.resolveSnapshotHead)
   *
   * @param string $snapshotName Required. Name of the snapshot.
   * @param Google_Service_Games_ResolveSnapshotHeadRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Games_ResolveSnapshotHeadResponse
   */
  public function resolveSnapshotHead($snapshotName, Google_Service_Games_ResolveSnapshotHeadRequest $postBody, $optParams = array())
  {
    $params = array('snapshotName' => $snapshotName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resolveSnapshotHead', array($params), "Google_Service_Games_ResolveSnapshotHeadResponse");
  }
}
