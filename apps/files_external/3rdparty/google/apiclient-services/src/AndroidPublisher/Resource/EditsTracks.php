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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\Track;
use Google\Service\AndroidPublisher\TracksListResponse;

/**
 * The "tracks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $tracks = $androidpublisherService->tracks;
 *  </code>
 */
class EditsTracks extends \Google\Service\Resource
{
  /**
   * Gets a track. (tracks.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track Identifier of the track.
   * @param array $optParams Optional parameters.
   * @return Track
   */
  public function get($packageName, $editId, $track, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'track' => $track];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Track::class);
  }
  /**
   * Lists all tracks. (tracks.listEditsTracks)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return TracksListResponse
   */
  public function listEditsTracks($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TracksListResponse::class);
  }
  /**
   * Patches a track. (tracks.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track Identifier of the track.
   * @param Track $postBody
   * @param array $optParams Optional parameters.
   * @return Track
   */
  public function patch($packageName, $editId, $track, Track $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Track::class);
  }
  /**
   * Updates a track. (tracks.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track Identifier of the track.
   * @param Track $postBody
   * @param array $optParams Optional parameters.
   * @return Track
   */
  public function update($packageName, $editId, $track, Track $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Track::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsTracks::class, 'Google_Service_AndroidPublisher_Resource_EditsTracks');
