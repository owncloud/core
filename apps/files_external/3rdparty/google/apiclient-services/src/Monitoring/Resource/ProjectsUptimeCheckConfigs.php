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

use Google\Service\Monitoring\ListUptimeCheckConfigsResponse;
use Google\Service\Monitoring\MonitoringEmpty;
use Google\Service\Monitoring\UptimeCheckConfig;

/**
 * The "uptimeCheckConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google\Service\Monitoring(...);
 *   $uptimeCheckConfigs = $monitoringService->uptimeCheckConfigs;
 *  </code>
 */
class ProjectsUptimeCheckConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new Uptime check configuration. (uptimeCheckConfigs.create)
   *
   * @param string $parent Required. The project
   * (https://cloud.google.com/monitoring/api/v3#project_name) in which to create
   * the Uptime check. The format is: projects/[PROJECT_ID_OR_NUMBER]
   * @param UptimeCheckConfig $postBody
   * @param array $optParams Optional parameters.
   * @return UptimeCheckConfig
   */
  public function create($parent, UptimeCheckConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], UptimeCheckConfig::class);
  }
  /**
   * Deletes an Uptime check configuration. Note that this method will fail if the
   * Uptime check configuration is referenced by an alert policy or other
   * dependent configs that would be rendered invalid by the deletion.
   * (uptimeCheckConfigs.delete)
   *
   * @param string $name Required. The Uptime check configuration to delete. The
   * format is:
   * projects/[PROJECT_ID_OR_NUMBER]/uptimeCheckConfigs/[UPTIME_CHECK_ID]
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
   * Gets a single Uptime check configuration. (uptimeCheckConfigs.get)
   *
   * @param string $name Required. The Uptime check configuration to retrieve. The
   * format is:
   * projects/[PROJECT_ID_OR_NUMBER]/uptimeCheckConfigs/[UPTIME_CHECK_ID]
   * @param array $optParams Optional parameters.
   * @return UptimeCheckConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UptimeCheckConfig::class);
  }
  /**
   * Lists the existing valid Uptime check configurations for the project (leaving
   * out any invalid configurations).
   * (uptimeCheckConfigs.listProjectsUptimeCheckConfigs)
   *
   * @param string $parent Required. The project
   * (https://cloud.google.com/monitoring/api/v3#project_name) whose Uptime check
   * configurations are listed. The format is: projects/[PROJECT_ID_OR_NUMBER]
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If provided, this field specifies the criteria that
   * must be met by uptime checks to be included in the response.For more details,
   * see Filtering syntax (https://cloud.google.com/monitoring/api/v3/sorting-and-
   * filtering#filter_syntax).
   * @opt_param int pageSize The maximum number of results to return in a single
   * response. The server may further constrain the maximum number of results
   * returned in a single page. If the page_size is <=0, the server will decide
   * the number of results to be returned.
   * @opt_param string pageToken If this field is not empty then it must contain
   * the nextPageToken value returned by a previous call to this method. Using
   * this field causes the method to return more results from the previous method
   * call.
   * @return ListUptimeCheckConfigsResponse
   */
  public function listProjectsUptimeCheckConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUptimeCheckConfigsResponse::class);
  }
  /**
   * Updates an Uptime check configuration. You can either replace the entire
   * configuration with a new one or replace only certain fields in the current
   * configuration by specifying the fields to be updated via updateMask. Returns
   * the updated configuration. (uptimeCheckConfigs.patch)
   *
   * @param string $name A unique resource name for this Uptime check
   * configuration. The format is:
   * projects/[PROJECT_ID_OR_NUMBER]/uptimeCheckConfigs/[UPTIME_CHECK_ID]
   * [PROJECT_ID_OR_NUMBER] is the Workspace host project associated with the
   * Uptime check.This field should be omitted when creating the Uptime check
   * configuration; on create, the resource name is assigned by the server and
   * included in the response.
   * @param UptimeCheckConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. If present, only the listed fields in
   * the current Uptime check configuration are updated with values from the new
   * configuration. If this field is empty, then the current configuration is
   * completely replaced with the new configuration.
   * @return UptimeCheckConfig
   */
  public function patch($name, UptimeCheckConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], UptimeCheckConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsUptimeCheckConfigs::class, 'Google_Service_Monitoring_Resource_ProjectsUptimeCheckConfigs');
