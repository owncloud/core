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
 * The "tracks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $tracks = $androidpublisherService->tracks;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsTracks extends Google_Service_Resource
{
  /**
   * Gets a track. (tracks.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track Identifier of the track.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Track
   */
  public function get($packageName, $editId, $track, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'track' => $track);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_Track");
  }
  /**
   * Lists all tracks. (tracks.listEditsTracks)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_TracksListResponse
   */
  public function listEditsTracks($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_TracksListResponse");
  }
  /**
   * Patches a track. (tracks.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track Identifier of the track.
   * @param Google_Service_AndroidPublisher_Track $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Track
   */
  public function patch($packageName, $editId, $track, Google_Service_AndroidPublisher_Track $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidPublisher_Track");
  }
  /**
   * Updates a track. (tracks.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track Identifier of the track.
   * @param Google_Service_AndroidPublisher_Track $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Track
   */
  public function update($packageName, $editId, $track, Google_Service_AndroidPublisher_Track $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidPublisher_Track");
  }
}
