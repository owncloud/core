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
 * The "optimizedHostStats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $optimizedHostStats = $apigeeService->optimizedHostStats;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsOptimizedHostStats extends Google_Service_Resource
{
  /**
   * This api is similar to GetHostStats except that the response is less verbose.
   * (optimizedHostStats.get)
   *
   * @param string $name Required. The resource name for which the interactive
   * query will be executed. Must be of the form
   * `organizations/{organization_id}/optimizedHostStats/{dimensions}`. Dimensions
   * let you view metrics in meaningful groupings. E.g. apiproxy, target_host. The
   * value of dimensions should be comma separated list as shown below
   * `organizations/{org}/optimizedHostStats/apiproxy,request_verb`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string accuracy Legacy field: not used anymore.
   * @opt_param string envgroupHostname Required. The hostname for which the
   * interactive query will be executed.
   * @opt_param string filter Enables drill-down on specific dimension values.
   * @opt_param string limit This parameter is used to limit the number of result
   * items. Default and the max value is 14400.
   * @opt_param string offset Use offset with limit to enable pagination of
   * results. For example, to display results 11-20, set limit to '10' and offset
   * to '10'.
   * @opt_param bool realtime Legacy field: not used anymore.
   * @opt_param string select Required. The select parameter contains a comma
   * separated list of metrics. E.g. sum(message_count),sum(error_count)
   * @opt_param string sort This parameter specifies if the sort order should be
   * ascending or descending Supported values are DESC and ASC.
   * @opt_param string sortby Comma separated list of columns to sort the final
   * result.
   * @opt_param string timeRange Required. Time interval for the interactive
   * query. Time range is specified as start~end. E.g 04/15/2017 00:00~05/15/2017
   * 23:59.
   * @opt_param string timeUnit A value of second, minute, hour, day, week, month.
   * Time Unit specifies the granularity of metrics returned.
   * @opt_param string topk Take 'top k' results from results, for example, to
   * return the top 5 results 'topk=5'.
   * @opt_param bool tsAscending Lists timestamps in ascending order if set to
   * true. Recommend setting this value to true if you are using sortby with
   * sort=DESC.
   * @opt_param string tzo This parameters contains the timezone offset value.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStats
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStats");
  }
}
