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

namespace Google\Service\Monitoring\Resource;

use Google\Service\Monitoring\ListUptimeCheckIpsResponse;

/**
 * The "uptimeCheckIps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $uptimeCheckIps = $monitoringService->uptimeCheckIps;
 *  </code>
 */
class UptimeCheckIps extends \Google\Service\Resource
{
  /**
   * Returns the list of IP addresses that checkers run from
   * (uptimeCheckIps.listUptimeCheckIps)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. The server may further constrain the maximum number of results
   * returned in a single page. If the page_size is <=0, the server will decide
   * the number of results to be returned. NOTE: this field is not yet implemented
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return more results from the previous method
   * call. NOTE: this field is not yet implemented
   * @return ListUptimeCheckIpsResponse
   */
  public function listUptimeCheckIps($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUptimeCheckIpsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UptimeCheckIps::class, 'Google_Service_Monitoring_Resource_UptimeCheckIps');
