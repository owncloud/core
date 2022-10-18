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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1QueryTabularStatsRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1QueryTabularStatsResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1QueryTimeSeriesStatsRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1QueryTimeSeriesStatsResponse;

/**
 * The "securityStats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $securityStats = $apigeeService->securityStats;
 *  </code>
 */
class OrganizationsEnvironmentsSecurityStats extends \Google\Service\Resource
{
  /**
   * Retrieve security statistics as tabular rows.
   * (securityStats.queryTabularStats)
   *
   * @param string $orgenv Required. Should be of the form
   * organizations//environments/.
   * @param GoogleCloudApigeeV1QueryTabularStatsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1QueryTabularStatsResponse
   */
  public function queryTabularStats($orgenv, GoogleCloudApigeeV1QueryTabularStatsRequest $postBody, $optParams = [])
  {
    $params = ['orgenv' => $orgenv, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('queryTabularStats', [$params], GoogleCloudApigeeV1QueryTabularStatsResponse::class);
  }
  /**
   * Retrieve security statistics as a collection of time series.
   * (securityStats.queryTimeSeriesStats)
   *
   * @param string $orgenv Required. Should be of the form
   * organizations//environments/.
   * @param GoogleCloudApigeeV1QueryTimeSeriesStatsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1QueryTimeSeriesStatsResponse
   */
  public function queryTimeSeriesStats($orgenv, GoogleCloudApigeeV1QueryTimeSeriesStatsRequest $postBody, $optParams = [])
  {
    $params = ['orgenv' => $orgenv, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('queryTimeSeriesStats', [$params], GoogleCloudApigeeV1QueryTimeSeriesStatsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsSecurityStats::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsSecurityStats');
