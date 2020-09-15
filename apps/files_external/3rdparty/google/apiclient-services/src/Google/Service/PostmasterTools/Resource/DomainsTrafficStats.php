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
 * The "trafficStats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailpostmastertoolsService = new Google_Service_PostmasterTools(...);
 *   $trafficStats = $gmailpostmastertoolsService->trafficStats;
 *  </code>
 */
class Google_Service_PostmasterTools_Resource_DomainsTrafficStats extends Google_Service_Resource
{
  /**
   * Get traffic statistics for a domain on a specific date. Returns
   * PERMISSION_DENIED if user does not have permission to access TrafficStats for
   * the domain. (trafficStats.get)
   *
   * @param string $name The resource name of the traffic statistics to get. E.g.,
   * domains/mymail.mydomain.com/trafficStats/20160807.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PostmasterTools_TrafficStats
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PostmasterTools_TrafficStats");
  }
  /**
   * List traffic statistics for all available days. Returns PERMISSION_DENIED if
   * user does not have permission to access TrafficStats for the domain.
   * (trafficStats.listDomainsTrafficStats)
   *
   * @param string $parent The resource name of the domain whose traffic
   * statistics we'd like to list. It should have the form
   * `domains/{domain_name}`, where domain_name is the fully qualified domain
   * name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int startDate.month Month of year. Must be from 1 to 12, or 0 if
   * specifying a year without a month and day.
   * @opt_param int endDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month, or 0 if specifying a year by itself or a year and month
   * where the day is not significant.
   * @opt_param int endDate.year Year of date. Must be from 1 to 9999, or 0 if
   * specifying a date without a year.
   * @opt_param int startDate.year Year of date. Must be from 1 to 9999, or 0 if
   * specifying a date without a year.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any. This is the value of
   * ListTrafficStatsResponse.next_page_token returned from the previous call to
   * `ListTrafficStats` method.
   * @opt_param int startDate.day Day of month. Must be from 1 to 31 and valid for
   * the year and month, or 0 if specifying a year by itself or a year and month
   * where the day is not significant.
   * @opt_param int endDate.month Month of year. Must be from 1 to 12, or 0 if
   * specifying a year without a month and day.
   * @opt_param int pageSize Requested page size. Server may return fewer
   * TrafficStats than requested. If unspecified, server will pick an appropriate
   * default.
   * @return Google_Service_PostmasterTools_ListTrafficStatsResponse
   */
  public function listDomainsTrafficStats($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PostmasterTools_ListTrafficStatsResponse");
  }
}
