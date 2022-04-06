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

use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1QueryStuckBackgroundWakelockRateMetricSetRequest;
use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1QueryStuckBackgroundWakelockRateMetricSetResponse;
use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1StuckBackgroundWakelockRateMetricSet;

/**
 * The "stuckbackgroundwakelockrate" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playdeveloperreportingService = new Google\Service\Playdeveloperreporting(...);
 *   $stuckbackgroundwakelockrate = $playdeveloperreportingService->stuckbackgroundwakelockrate;
 *  </code>
 */
class VitalsStuckbackgroundwakelockrate extends \Google\Service\Resource
{
  /**
   * Describes the properties of the metric set. (stuckbackgroundwakelockrate.get)
   *
   * @param string $name Required. The resource name. Format:
   * apps/{app}/stuckBackgroundWakelockRateMetricSet
   * @param array $optParams Optional parameters.
   * @return GooglePlayDeveloperReportingV1beta1StuckBackgroundWakelockRateMetricSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GooglePlayDeveloperReportingV1beta1StuckBackgroundWakelockRateMetricSet::class);
  }
  /**
   * Queries the metrics in the metric set. (stuckbackgroundwakelockrate.query)
   *
   * @param string $name Required. The resource name. Format:
   * apps/{app}/stuckBackgroundWakelockRateMetricSet
   * @param GooglePlayDeveloperReportingV1beta1QueryStuckBackgroundWakelockRateMetricSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePlayDeveloperReportingV1beta1QueryStuckBackgroundWakelockRateMetricSetResponse
   */
  public function query($name, GooglePlayDeveloperReportingV1beta1QueryStuckBackgroundWakelockRateMetricSetRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('query', [$params], GooglePlayDeveloperReportingV1beta1QueryStuckBackgroundWakelockRateMetricSetResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VitalsStuckbackgroundwakelockrate::class, 'Google_Service_Playdeveloperreporting_Resource_VitalsStuckbackgroundwakelockrate');
