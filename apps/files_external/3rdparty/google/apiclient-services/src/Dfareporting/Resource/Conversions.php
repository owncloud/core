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

use Google\Service\Dfareporting\ConversionsBatchInsertRequest;
use Google\Service\Dfareporting\ConversionsBatchInsertResponse;
use Google\Service\Dfareporting\ConversionsBatchUpdateRequest;
use Google\Service\Dfareporting\ConversionsBatchUpdateResponse;

/**
 * The "conversions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $conversions = $dfareportingService->conversions;
 *  </code>
 */
class Conversions extends \Google\Service\Resource
{
  /**
   * Inserts conversions. (conversions.batchinsert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param ConversionsBatchInsertRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ConversionsBatchInsertResponse
   */
  public function batchinsert($profileId, ConversionsBatchInsertRequest $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchinsert', [$params], ConversionsBatchInsertResponse::class);
  }
  /**
   * Updates existing conversions. (conversions.batchupdate)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param ConversionsBatchUpdateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ConversionsBatchUpdateResponse
   */
  public function batchupdate($profileId, ConversionsBatchUpdateRequest $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchupdate', [$params], ConversionsBatchUpdateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Conversions::class, 'Google_Service_Dfareporting_Resource_Conversions');
