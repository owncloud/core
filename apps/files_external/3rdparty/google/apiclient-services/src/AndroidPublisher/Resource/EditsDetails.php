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

use Google\Service\AndroidPublisher\AppDetails;

/**
 * The "details" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $details = $androidpublisherService->details;
 *  </code>
 */
class EditsDetails extends \Google\Service\Resource
{
  /**
   * Gets details of an app. (details.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return AppDetails
   */
  public function get($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AppDetails::class);
  }
  /**
   * Patches details of an app. (details.patch)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param AppDetails $postBody
   * @param array $optParams Optional parameters.
   * @return AppDetails
   */
  public function patch($packageName, $editId, AppDetails $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], AppDetails::class);
  }
  /**
   * Updates details of an app. (details.update)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param AppDetails $postBody
   * @param array $optParams Optional parameters.
   * @return AppDetails
   */
  public function update($packageName, $editId, AppDetails $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], AppDetails::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsDetails::class, 'Google_Service_AndroidPublisher_Resource_EditsDetails');
