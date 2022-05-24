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

namespace Google\Service\AnalyticsHub\Resource;

use Google\Service\AnalyticsHub\ListOrgDataExchangesResponse;

/**
 * The "dataExchanges" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticshubService = new Google\Service\AnalyticsHub(...);
 *   $dataExchanges = $analyticshubService->dataExchanges;
 *  </code>
 */
class OrganizationsLocationsDataExchanges extends \Google\Service\Resource
{
  /**
   * Lists all data exchanges from projects in a given organization and location.
   * (dataExchanges.listOrganizationsLocationsDataExchanges)
   *
   * @param string $organization Required. The organization resource path of the
   * projects containing DataExchanges. e.g. `organizations/myorg/locations/US`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response page. Leverage the page tokens to iterate through the entire
   * collection.
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results.
   * @return ListOrgDataExchangesResponse
   */
  public function listOrganizationsLocationsDataExchanges($organization, $optParams = [])
  {
    $params = ['organization' => $organization];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOrgDataExchangesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsLocationsDataExchanges::class, 'Google_Service_AnalyticsHub_Resource_OrganizationsLocationsDataExchanges');
