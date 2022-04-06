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

use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1AnrRateMetricSet;
use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1QueryAnrRateMetricSetRequest;
use Google\Service\Playdeveloperreporting\GooglePlayDeveloperReportingV1beta1QueryAnrRateMetricSetResponse;

/**
 * The "anrrate" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playdeveloperreportingService = new Google\Service\Playdeveloperreporting(...);
 *   $anrrate = $playdeveloperreportingService->anrrate;
 *  </code>
 */
class VitalsAnrrate extends \Google\Service\Resource
{
  /**
   * Describes the properties of the metric set. (anrrate.get)
   *
   * @param string $name Required. The resource name. Format:
   * apps/{app}/anrRateMetricSet
   * @param array $optParams Optional parameters.
   * @return GooglePlayDeveloperReportingV1beta1AnrRateMetricSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GooglePlayDeveloperReportingV1beta1AnrRateMetricSet::class);
  }
  /**
   * Queries the metrics in the metric set. (anrrate.query)
   *
   * @param string $name Required. The resource name. Format:
   * apps/{app}/anrRateMetricSet
   * @param GooglePlayDeveloperReportingV1beta1QueryAnrRateMetricSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePlayDeveloperReportingV1beta1QueryAnrRateMetricSetResponse
   */
  public function query($name, GooglePlayDeveloperReportingV1beta1QueryAnrRateMetricSetRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('query', [$params], GooglePlayDeveloperReportingV1beta1QueryAnrRateMetricSetResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VitalsAnrrate::class, 'Google_Service_Playdeveloperreporting_Resource_VitalsAnrrate');
