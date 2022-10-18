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

use Google\Service\Monitoring\ListMetricDescriptorsResponse;
use Google\Service\Monitoring\MetricDescriptor;
use Google\Service\Monitoring\MonitoringEmpty;

/**
 * The "metricDescriptors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $metricDescriptors = $monitoringService->metricDescriptors;
 *  </code>
 */
class ProjectsMetricDescriptors extends \Google\Service\Resource
{
  /**
   * Creates a new metric descriptor. The creation is executed asynchronously.
   * User-created metric descriptors define custom metrics
   * (https://cloud.google.com/monitoring/custom-metrics). The metric descriptor
   * is updated if it already exists, except that metric labels are never removed.
   * (metricDescriptors.create)
   *
   * @param string $name Required. The project
   * (https://cloud.google.com/monitoring/api/v3#project_name) on which to execute
   * the request. The format is: 4 projects/PROJECT_ID_OR_NUMBER
   * @param MetricDescriptor $postBody
   * @param array $optParams Optional parameters.
   * @return MetricDescriptor
   */
  public function create($name, MetricDescriptor $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], MetricDescriptor::class);
  }
  /**
   * Deletes a metric descriptor. Only user-created custom metrics
   * (https://cloud.google.com/monitoring/custom-metrics) can be deleted.
   * (metricDescriptors.delete)
   *
   * @param string $name Required. The metric descriptor on which to execute the
   * request. The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/metricDescriptors/[METRIC_ID] An example of
   * [METRIC_ID] is: "custom.googleapis.com/my_test_metric".
   * @param array $optParams Optional parameters.
   * @return MonitoringEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], MonitoringEmpty::class);
  }
  /**
   * Gets a single metric descriptor. (metricDescriptors.get)
   *
   * @param string $name Required. The metric descriptor on which to execute the
   * request. The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/metricDescriptors/[METRIC_ID] An example
   * value of [METRIC_ID] is
   * "compute.googleapis.com/instance/disk/read_bytes_count".
   * @param array $optParams Optional parameters.
   * @return MetricDescriptor
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MetricDescriptor::class);
  }
  /**
   * Lists metric descriptors that match a filter.
   * (metricDescriptors.listProjectsMetricDescriptors)
   *
   * @param string $name Required. The project
   * (https://cloud.google.com/monitoring/api/v3#project_name) on which to execute
   * the request. The format is: projects/[PROJECT_ID_OR_NUMBER]
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If this field is empty, all custom and system-
   * defined metric descriptors are returned. Otherwise, the filter
   * (https://cloud.google.com/monitoring/api/v3/filters) specifies which metric
   * descriptors are to be returned. For example, the following filter matches all
   * custom metrics (https://cloud.google.com/monitoring/custom-metrics):
   * metric.type = starts_with("custom.googleapis.com/")
   * @opt_param int pageSize A positive number that is the maximum number of
   * results to return.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return additional results from the previous
   * method call.
   * @return ListMetricDescriptorsResponse
   */
  public function listProjectsMetricDescriptors($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMetricDescriptorsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsMetricDescriptors::class, 'Google_Service_Monitoring_Resource_ProjectsMetricDescriptors');
