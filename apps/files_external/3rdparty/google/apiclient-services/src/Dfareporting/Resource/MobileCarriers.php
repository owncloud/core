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

use Google\Service\Dfareporting\MobileCarrier;
use Google\Service\Dfareporting\MobileCarriersListResponse;

/**
 * The "mobileCarriers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $mobileCarriers = $dfareportingService->mobileCarriers;
 *  </code>
 */
class MobileCarriers extends \Google\Service\Resource
{
  /**
   * Gets one mobile carrier by ID. (mobileCarriers.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Mobile carrier ID.
   * @param array $optParams Optional parameters.
   * @return MobileCarrier
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MobileCarrier::class);
  }
  /**
   * Retrieves a list of mobile carriers. (mobileCarriers.listMobileCarriers)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   * @return MobileCarriersListResponse
   */
  public function listMobileCarriers($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], MobileCarriersListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MobileCarriers::class, 'Google_Service_Dfareporting_Resource_MobileCarriers');
