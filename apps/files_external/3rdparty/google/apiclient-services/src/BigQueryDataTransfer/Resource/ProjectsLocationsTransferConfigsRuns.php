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

namespace Google\Service\BigQueryDataTransfer\Resource;

use Google\Service\BigQueryDataTransfer\BigquerydatatransferEmpty;
use Google\Service\BigQueryDataTransfer\ListTransferRunsResponse;
use Google\Service\BigQueryDataTransfer\TransferRun;

/**
 * The "runs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigquerydatatransferService = new Google\Service\BigQueryDataTransfer(...);
 *   $runs = $bigquerydatatransferService->runs;
 *  </code>
 */
class ProjectsLocationsTransferConfigsRuns extends \Google\Service\Resource
{
  /**
   * Deletes the specified transfer run. (runs.delete)
   *
   * @param string $name Required. The field will contain name of the resource
   * requested, for example:
   * `projects/{project_id}/transferConfigs/{config_id}/runs/{run_id}` or `project
   * s/{project_id}/locations/{location_id}/transferConfigs/{config_id}/runs/{run_
   * id}`
   * @param array $optParams Optional parameters.
   * @return BigquerydatatransferEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigquerydatatransferEmpty::class);
  }
  /**
   * Returns information about the particular transfer run. (runs.get)
   *
   * @param string $name Required. The field will contain name of the resource
   * requested, for example:
   * `projects/{project_id}/transferConfigs/{config_id}/runs/{run_id}` or `project
   * s/{project_id}/locations/{location_id}/transferConfigs/{config_id}/runs/{run_
   * id}`
   * @param array $optParams Optional parameters.
   * @return TransferRun
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TransferRun::class);
  }
  /**
   * Returns information about running and completed transfer runs.
   * (runs.listProjectsLocationsTransferConfigsRuns)
   *
   * @param string $parent Required. Name of transfer configuration for which
   * transfer runs should be retrieved. Format of transfer configuration resource
   * name is: `projects/{project_id}/transferConfigs/{config_id}` or
   * `projects/{project_id}/locations/{location_id}/transferConfigs/{config_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Page size. The default page size is the maximum value
   * of 1000 results.
   * @opt_param string pageToken Pagination token, which can be used to request a
   * specific page of `ListTransferRunsRequest` list results. For multiple-page
   * results, `ListTransferRunsResponse` outputs a `next_page` token, which can be
   * used as the `page_token` value to request the next page of list results.
   * @opt_param string runAttempt Indicates how run attempts are to be pulled.
   * @opt_param string states When specified, only transfer runs with requested
   * states are returned.
   * @return ListTransferRunsResponse
   */
  public function listProjectsLocationsTransferConfigsRuns($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTransferRunsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTransferConfigsRuns::class, 'Google_Service_BigQueryDataTransfer_Resource_ProjectsLocationsTransferConfigsRuns');
