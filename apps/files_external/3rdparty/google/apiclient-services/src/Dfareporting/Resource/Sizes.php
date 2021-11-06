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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\Size;
use Google\Service\Dfareporting\SizesListResponse;

/**
 * The "sizes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $sizes = $dfareportingService->sizes;
 *  </code>
 */
class Sizes extends \Google\Service\Resource
{
  /**
   * Gets one size by ID. (sizes.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Size ID.
   * @param array $optParams Optional parameters.
   * @return Size
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Size::class);
  }
  /**
   * Inserts a new size. (sizes.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Size $postBody
   * @param array $optParams Optional parameters.
   * @return Size
   */
  public function insert($profileId, Size $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Size::class);
  }
  /**
   * Retrieves a list of sizes, possibly filtered. Retrieved sizes are globally
   * unique and may include values not currently in use by your account. Due to
   * this, the list of sizes returned by this method may differ from the list seen
   * in the Trafficking UI. (sizes.listSizes)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int height Select only sizes with this height.
   * @opt_param bool iabStandard Select only IAB standard sizes.
   * @opt_param string ids Select only sizes with these IDs.
   * @opt_param int width Select only sizes with this width.
   * @return SizesListResponse
   */
  public function listSizes($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SizesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Sizes::class, 'Google_Service_Dfareporting_Resource_Sizes');
