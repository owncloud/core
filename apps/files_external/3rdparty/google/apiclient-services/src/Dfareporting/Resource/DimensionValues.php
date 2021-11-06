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

use Google\Service\Dfareporting\DimensionValueList;
use Google\Service\Dfareporting\DimensionValueRequest;

/**
 * The "dimensionValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $dimensionValues = $dfareportingService->dimensionValues;
 *  </code>
 */
class DimensionValues extends \Google\Service\Resource
{
  /**
   * Retrieves list of report dimension values for a list of filters.
   * (dimensionValues.query)
   *
   * @param string $profileId The Campaign Manager 360 user profile ID.
   * @param DimensionValueRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken The value of the nextToken from the previous
   * result page.
   * @return DimensionValueList
   */
  public function query($profileId, DimensionValueRequest $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('query', [$params], DimensionValueList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DimensionValues::class, 'Google_Service_Dfareporting_Resource_DimensionValues');
