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

namespace Google\Service\Localservices\Resource;

use Google\Service\Localservices\GoogleAdsHomeservicesLocalservicesV1SearchDetailedLeadReportsResponse;

/**
 * The "detailedLeadReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $localservicesService = new Google\Service\Localservices(...);
 *   $detailedLeadReports = $localservicesService->detailedLeadReports;
 *  </code>
 */
class DetailedLeadReports extends \Google\Service\Resource
{
  /**
   * Get detailed lead reports containing leads that have been received by all
   * linked GLS accounts. Caller needs to provide their manager customer id and
   * the associated auth credential that allows them read permissions on their
   * linked accounts. (detailedLeadReports.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int endDate.day Day of a month. Must be from 1 to 31 and valid for
   * the year and month, or 0 to specify a year by itself or a year and month
   * where the day isn't significant.
   * @opt_param int endDate.month Month of a year. Must be from 1 to 12, or 0 to
   * specify a year without a month and day.
   * @opt_param int endDate.year Year of the date. Must be from 1 to 9999, or 0 to
   * specify a date without a year.
   * @opt_param int pageSize The maximum number of accounts to return. If the page
   * size is unset, page size will default to 1000. Maximum page_size is 10000.
   * Optional.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous request to SearchDetailedLeadReports that indicates where listing
   * should continue. Optional.
   * @opt_param string query A query string for searching for account reports.
   * Caller must provide a customer id of their MCC account with an associated
   * Gaia Mint that allows read permission on their linked accounts. Search
   * expressions are case insensitive. Example query: | Query | Description |
   * |-------------------------|-----------------------------------------------| |
   * manager_customer_id:123 | Get Detailed Lead Report for Manager with id | | |
   * 123. | Required.
   * @opt_param int startDate.day Day of a month. Must be from 1 to 31 and valid
   * for the year and month, or 0 to specify a year by itself or a year and month
   * where the day isn't significant.
   * @opt_param int startDate.month Month of a year. Must be from 1 to 12, or 0 to
   * specify a year without a month and day.
   * @opt_param int startDate.year Year of the date. Must be from 1 to 9999, or 0
   * to specify a date without a year.
   * @return GoogleAdsHomeservicesLocalservicesV1SearchDetailedLeadReportsResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleAdsHomeservicesLocalservicesV1SearchDetailedLeadReportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DetailedLeadReports::class, 'Google_Service_Localservices_Resource_DetailedLeadReports');
