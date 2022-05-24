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

use Google\Service\AndroidPublisher\Testers;

/**
 * The "testers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $testers = $androidpublisherService->testers;
 *  </code>
 */
class EditsTesters extends \Google\Service\Resource
{
  /**
   * Gets testers. Note: Testers resource does not support email lists.
   * (testers.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track The track to read from.
   * @param array $optParams Optional parameters.
   * @return Testers
   */
  public function get($packageName, $editId, $track, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'track' => $track];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Testers::class);
  }
  /**
   * Patches testers. Note: Testers resource does not support email lists.
   * (testers.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track The track to update.
   * @param Testers $postBody
   * @param array $optParams Optional parameters.
   * @return Testers
   */
  public function patch($packageName, $editId, $track, Testers $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Testers::class);
  }
  /**
   * Updates testers. Note: Testers resource does not support email lists.
   * (testers.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $track The track to update.
   * @param Testers $postBody
   * @param array $optParams Optional parameters.
   * @return Testers
   */
  public function update($packageName, $editId, $track, Testers $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'track' => $track, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Testers::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsTesters::class, 'Google_Service_AndroidPublisher_Resource_EditsTesters');
