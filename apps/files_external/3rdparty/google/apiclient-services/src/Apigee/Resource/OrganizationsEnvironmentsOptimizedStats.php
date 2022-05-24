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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1OptimizedStats;

/**
 * The "optimizedStats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $optimizedStats = $apigeeService->optimizedStats;
 *  </code>
 */
class OrganizationsEnvironmentsOptimizedStats extends \Google\Service\Resource
{
  /**
   * Similar to GetStats except that the response is less verbose.
   * (optimizedStats.get)
   *
   * @param string $name Required. Resource name for which the interactive query
   * will be executed. Use the following format in your request:
   * `organizations/{org}/environments/{env}/optimizedStats/{dimensions}`
   * Dimensions let you view metrics in meaningful groupings, such as `apiproxy`,
   * `target_host`. The value of `dimensions` should be a comma-separated list as
   * shown below:
   * `organizations/{org}/environments/{env}/optimizedStats/apiproxy,request_verb`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string accuracy No longer used by Apigee. Supported for backwards
   * compatibility.
   * @opt_param string aggTable Table name used to query custom aggregate tables.
   * If this parameter is skipped, then Apigee will try to retrieve the data from
   * fact tables which will be expensive.
   * @opt_param string filter Filter that enables you to drill-down on specific
   * dimension values.
   * @opt_param string limit Maximum number of result items to return. The default
   * and maximum value that can be returned is 14400.
   * @opt_param string offset Offset value. Use `offset` with `limit` to enable
   * pagination of results. For example, to display results 11-20, set limit to
   * `10` and offset to `10`.
   * @opt_param bool realtime No longer used by Apigee. Supported for backwards
   * compatibility.
   * @opt_param string select Required. Comma-separated list of metrics. For
   * example: `sum(message_count),sum(error_count)`
   * @opt_param bool sonar Routes the query to API Monitoring for the last hour.
   * @opt_param string sort Flag that specifies whether the sort order should be
   * ascending or descending. Valid values include `DESC` and `ASC`.
   * @opt_param string sortby Comma-separated list of columns to sort the final
   * result.
   * @opt_param string timeRange Required. Time interval for the interactive
   * query. Time range is specified in GMT as `start~end`. For example:
   * `04/15/2017 00:00~05/15/2017 23:59`
   * @opt_param string timeUnit Granularity of metrics returned. Valid values
   * include: `second`, `minute`, `hour`, `day`, `week`, or `month`.
   * @opt_param string topk Top number of results to return. For example, to
   * return the top 5 results, set `topk=5`.
   * @opt_param bool tsAscending Flag that specifies whether to list timestamps in
   * ascending (`true`) or descending (`false`) order. Apigee recommends setting
   * this value to `true` if you are using `sortby` with `sort=DESC`.
   * @opt_param string tzo Timezone offset value.
   * @return GoogleCloudApigeeV1OptimizedStats
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1OptimizedStats::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsOptimizedStats::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsOptimizedStats');
