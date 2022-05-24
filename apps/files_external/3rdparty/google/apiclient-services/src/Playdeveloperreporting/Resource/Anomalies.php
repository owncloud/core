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

namespace Google\Service\Playdeveloperreporting\Resource;

use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1ListAnomaliesResponse;

/**
 * The "anomalies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playdeveloperreportingService = new Google\Service\Playdeveloperreporting(...);
 *   $anomalies = $playdeveloperreportingService->anomalies;
 *  </code>
 */
class Anomalies extends \Google\Service\Resource
{
  /**
   * Lists anomalies in any of the datasets. (anomalies.listAnomalies)
   *
   * @param string $parent Required. Parent app for which anomalies were detected.
   * Format: apps/{app}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filtering criteria for anomalies. For basic filter
   * guidance, please check: https://google.aip.dev/160. **Supported functions:**
   * * `activeBetween(startTime, endTime)`: If specified, only list anomalies that
   * were active in between `startTime` (inclusive) and `endTime` (exclusive).
   * Both parameters are expected to conform to an RFC-3339 formatted string (e.g.
   * `2012-04-21T11:30:00-04:00`). UTC offsets are supported. Both `startTime` and
   * `endTime` accept the special value `UNBOUNDED`, to signify intervals with no
   * lower or upper bound, respectively. Examples: *
   * `activeBetween("2021-04-21T11:30:00Z", "2021-07-21T00:00:00Z")` *
   * `activeBetween(UNBOUNDED, "2021-11-21T00:00:00-04:00")` *
   * `activeBetween("2021-07-21T00:00:00-04:00", UNBOUNDED)`
   * @opt_param int pageSize Maximum size of the returned data. If unspecified, at
   * most 10 anomalies will be returned. The maximum value is 100; values above
   * 100 will be coerced to 100.
   * @opt_param string pageToken A page token, received from a previous
   * `ListErrorReports` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListErrorReports` must match
   * the call that provided the page token.
   * @return GooglePlayDeveloperReportingV1beta1ListAnomaliesResponse
   */
  public function listAnomalies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GooglePlayDeveloperReportingV1beta1ListAnomaliesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Anomalies::class, 'Google_Service_Playdeveloperreporting_Resource_Anomalies');
