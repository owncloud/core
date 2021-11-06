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

use Google\Service\AndroidPublisher\ConvertRegionPricesRequest;
use Google\Service\AndroidPublisher\ConvertRegionPricesResponse;

/**
 * The "pricing" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $pricing = $androidpublisherService->pricing;
 *  </code>
 */
class ApplicationsPricing extends \Google\Service\Resource
{
  /**
   * Calculates the region prices, using today's exchange rate and country-
   * specific pricing patterns, based on the price in the request for a set of
   * regions. (pricing.convertRegionPrices)
   *
   * @param string $packageName Required. The app package name.
   * @param ConvertRegionPricesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ConvertRegionPricesResponse
   */
  public function convertRegionPrices($packageName, ConvertRegionPricesRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('convertRegionPrices', [$params], ConvertRegionPricesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApplicationsPricing::class, 'Google_Service_AndroidPublisher_Resource_ApplicationsPricing');
