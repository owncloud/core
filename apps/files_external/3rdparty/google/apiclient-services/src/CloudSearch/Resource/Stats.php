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

namespace Google\Service\CloudSearch\Resource;

use Google\Service\CloudSearch\GetCustomerIndexStatsResponse;
use Google\Service\CloudSearch\GetCustomerQueryStatsResponse;
use Google\Service\CloudSearch\GetCustomerSearchApplicationStatsResponse;
use Google\Service\CloudSearch\GetCustomerSessionStatsResponse;
use Google\Service\CloudSearch\GetCustomerUserStatsResponse;

/**
 * The "stats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $stats = $cloudsearchService->stats;
 *  </code>
 */
class Stats extends \Google\Service\Resource
{
  /**
   * Gets indexed item statistics aggreggated across all data sources. This API
   * only returns statistics for previous dates; it doesn't return statistics for
   * the current day. **Note:** This API requires a standard end user account to
   * execute. (stats.getIndex)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int fromDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int fromDate.month Month of date. Must be from 1 to 12.
   * @opt_param int fromDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int toDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int toDate.month Month of date. Must be from 1 to 12.
   * @opt_param int toDate.year Year of date. Must be from 1 to 9999.
   * @return GetCustomerIndexStatsResponse
   */
  public function getIndex($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getIndex', [$params], GetCustomerIndexStatsResponse::class);
  }
  /**
   * Get the query statistics for customer. **Note:** This API requires a standard
   * end user account to execute. (stats.getQuery)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int fromDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int fromDate.month Month of date. Must be from 1 to 12.
   * @opt_param int fromDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int toDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int toDate.month Month of date. Must be from 1 to 12.
   * @opt_param int toDate.year Year of date. Must be from 1 to 9999.
   * @return GetCustomerQueryStatsResponse
   */
  public function getQuery($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getQuery', [$params], GetCustomerQueryStatsResponse::class);
  }
  /**
   * Get search application stats for customer. **Note:** This API requires a
   * standard end user account to execute. (stats.getSearchapplication)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int endDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int endDate.month Month of date. Must be from 1 to 12.
   * @opt_param int endDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int startDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int startDate.month Month of date. Must be from 1 to 12.
   * @opt_param int startDate.year Year of date. Must be from 1 to 9999.
   * @return GetCustomerSearchApplicationStatsResponse
   */
  public function getSearchapplication($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getSearchapplication', [$params], GetCustomerSearchApplicationStatsResponse::class);
  }
  /**
   * Get the # of search sessions, % of successful sessions with a click query
   * statistics for customer. **Note:** This API requires a standard end user
   * account to execute. (stats.getSession)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int fromDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int fromDate.month Month of date. Must be from 1 to 12.
   * @opt_param int fromDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int toDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int toDate.month Month of date. Must be from 1 to 12.
   * @opt_param int toDate.year Year of date. Must be from 1 to 9999.
   * @return GetCustomerSessionStatsResponse
   */
  public function getSession($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getSession', [$params], GetCustomerSessionStatsResponse::class);
  }
  /**
   * Get the users statistics for customer. **Note:** This API requires a standard
   * end user account to execute. (stats.getUser)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int fromDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int fromDate.month Month of date. Must be from 1 to 12.
   * @opt_param int fromDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int toDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int toDate.month Month of date. Must be from 1 to 12.
   * @opt_param int toDate.year Year of date. Must be from 1 to 9999.
   * @return GetCustomerUserStatsResponse
   */
  public function getUser($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getUser', [$params], GetCustomerUserStatsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Stats::class, 'Google_Service_CloudSearch_Resource_Stats');
