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

namespace Google\Service\BusinessProfilePerformance\Resource;

use Google\Service\BusinessProfilePerformance\ListSearchKeywordImpressionsMonthlyResponse;

/**
 * The "monthly" collection of methods.
 * Typical usage is:
 *  <code>
 *   $businessprofileperformanceService = new Google\Service\BusinessProfilePerformance(...);
 *   $monthly = $businessprofileperformanceService->monthly;
 *  </code>
 */
class LocationsSearchkeywordsImpressionsMonthly extends \Google\Service\Resource
{
  /**
   * Returns the search keywords used to find a business in search or maps. Each
   * search keyword is accompanied by impressions which are aggregated on a
   * monthly basis. Example request: `GET https://businessprofileperformance.googl
   * eapis.com/v1/locations/12345/searchkeywords/impressions/monthly?monthly_range
   * .start_month.year=2022_range.start_month.month=1_range.end_month.year=2022_ra
   * nge.end_month.month=3`
   * (monthly.listLocationsSearchkeywordsImpressionsMonthly)
   *
   * @param string $parent Required. The location for which the time series should
   * be fetched. Format: locations/{location_id} where location_id is an
   * unobfuscated listing id.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int monthlyRange.endMonth.day Day of a month. Must be from 1 to 31
   * and valid for the year and month, or 0 to specify a year by itself or a year
   * and month where the day isn't significant.
   * @opt_param int monthlyRange.endMonth.month Month of a year. Must be from 1 to
   * 12, or 0 to specify a year without a month and day.
   * @opt_param int monthlyRange.endMonth.year Year of the date. Must be from 1 to
   * 9999, or 0 to specify a date without a year.
   * @opt_param int monthlyRange.startMonth.day Day of a month. Must be from 1 to
   * 31 and valid for the year and month, or 0 to specify a year by itself or a
   * year and month where the day isn't significant.
   * @opt_param int monthlyRange.startMonth.month Month of a year. Must be from 1
   * to 12, or 0 to specify a year without a month and day.
   * @opt_param int monthlyRange.startMonth.year Year of the date. Must be from 1
   * to 9999, or 0 to specify a date without a year.
   * @opt_param int pageSize Optional. The number of results requested. The
   * default page size is 100. Page size can be set to a maximum of 100.
   * @opt_param string pageToken Optional. A token indicating the next paginated
   * result to be returned.
   * @return ListSearchKeywordImpressionsMonthlyResponse
   */
  public function listLocationsSearchkeywordsImpressionsMonthly($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSearchKeywordImpressionsMonthlyResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsSearchkeywordsImpressionsMonthly::class, 'Google_Service_BusinessProfilePerformance_Resource_LocationsSearchkeywordsImpressionsMonthly');
