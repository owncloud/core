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

namespace Google\Service\MyBusinessBusinessCalls\Resource;

use Google\Service\MyBusinessBusinessCalls\ListBusinessCallsInsightsResponse;

/**
 * The "businesscallsinsights" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinesscallsService = new Google\Service\MyBusinessBusinessCalls(...);
 *   $businesscallsinsights = $mybusinessbusinesscallsService->businesscallsinsights;
 *  </code>
 */
class LocationsBusinesscallsinsights extends \Google\Service\Resource
{
  /**
   * Returns insights for Business calls for a location.
   * (businesscallsinsights.listLocationsBusinesscallsinsights)
   *
   * @param string $parent Required. The parent location to fetch calls insights
   * for. Format: locations/{location_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter constraining the calls insights
   * to return. The response includes only entries that match the filter. If the
   * MetricType is not provided, AGGREGATE_COUNT is returned. If no end_date is
   * provided, the last date for which data is available is used. If no start_date
   * is provided, we will default to the first date for which data is available,
   * which is currently 6 months. If start_date is before the date when data is
   * available, data is returned starting from the date when it is available. At
   * this time we support following filters. 1. start_date="DATE" where date is in
   * YYYY-MM-DD format. 2. end_date="DATE" where date is in YYYY-MM-DD format. 3.
   * metric_type=XYZ where XYZ is a valid MetricType. 4. Conjunctions(AND) of all
   * of the above. e.g., "start_date=2021-08-01 AND end_date=2021-08-10 AND
   * metric_type=AGGREGATE_COUNT" The AGGREGATE_COUNT metric_type ignores the DD
   * part of the date.
   * @opt_param int pageSize Optional. The maximum number of BusinessCallsInsights
   * to return. If unspecified, at most 20 will be returned. Some of the
   * metric_types(e.g, AGGREGATE_COUNT) returns a single page. For these metrics,
   * the page_size is ignored.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListBusinessCallsInsights` call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * `ListBusinessCallsInsights` must match the call that provided the page token.
   * Some of the metric_types (e.g, AGGREGATE_COUNT) returns a single page. For
   * these metrics, the pake_token is ignored.
   * @return ListBusinessCallsInsightsResponse
   */
  public function listLocationsBusinesscallsinsights($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBusinessCallsInsightsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsBusinesscallsinsights::class, 'Google_Service_MyBusinessBusinessCalls_Resource_LocationsBusinesscallsinsights');
