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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\FreeListingsProgramStatus;
use Google\Service\ShoppingContent\RequestReviewFreeListingsRequest;

/**
 * The "freelistingsprogram" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $freelistingsprogram = $contentService->freelistingsprogram;
 *  </code>
 */
class Freelistingsprogram extends \Google\Service\Resource
{
  /**
   * Retrieves the status and review eligibility for the free listing program.
   * (freelistingsprogram.get)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param array $optParams Optional parameters.
   * @return FreeListingsProgramStatus
   */
  public function get($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FreeListingsProgramStatus::class);
  }
  /**
   * Requests a review of free listings in a specific region. This method is only
   * available to selected merchants. (freelistingsprogram.requestreview)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param RequestReviewFreeListingsRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function requestreview($merchantId, RequestReviewFreeListingsRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('requestreview', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Freelistingsprogram::class, 'Google_Service_ShoppingContent_Resource_Freelistingsprogram');
