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

namespace Google\Service\Fitness\Resource;

use Google\Service\Fitness\AggregateRequest;
use Google\Service\Fitness\AggregateResponse;

/**
 * The "dataset" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google\Service\Fitness(...);
 *   $dataset = $fitnessService->dataset;
 *  </code>
 */
class UsersDataset extends \Google\Service\Resource
{
  /**
   * Aggregates data of a certain type or stream into buckets divided by a given
   * type of boundary. Multiple data sets of multiple types and from multiple
   * sources can be aggregated into exactly one bucket type per request.
   * (dataset.aggregate)
   *
   * @param string $userId Aggregate data for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param AggregateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AggregateResponse
   */
  public function aggregate($userId, AggregateRequest $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('aggregate', [$params], AggregateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersDataset::class, 'Google_Service_Fitness_Resource_UsersDataset');
