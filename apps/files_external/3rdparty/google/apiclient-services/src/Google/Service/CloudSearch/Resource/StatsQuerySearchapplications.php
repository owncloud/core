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

/**
 * The "searchapplications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google_Service_CloudSearch(...);
 *   $searchapplications = $cloudsearchService->searchapplications;
 *  </code>
 */
class Google_Service_CloudSearch_Resource_StatsQuerySearchapplications extends Google_Service_Resource
{
  /**
   * Get the query statistics for search application.
   *
   * **Note:** This API requires a standard end user account to execute.
   * (searchapplications.get)
   *
   * @param string $name The resource id of the search application query stats, in
   * the following format: searchapplications/{application_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int fromDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int toDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @opt_param int toDate.month Month of date. Must be from 1 to 12.
   * @opt_param int toDate.year Year of date. Must be from 1 to 9999.
   * @opt_param int fromDate.month Month of date. Must be from 1 to 12.
   * @opt_param int fromDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month.
   * @return Google_Service_CloudSearch_GetSearchApplicationQueryStatsResponse
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudSearch_GetSearchApplicationQueryStatsResponse");
  }
}
