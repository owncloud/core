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

namespace Google\Service\ToolResults\Resource;

use Google\Service\ToolResults\ListPerfSampleSeriesResponse;
use Google\Service\ToolResults\PerfSampleSeries;

/**
 * The "perfSampleSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google\Service\ToolResults(...);
 *   $perfSampleSeries = $toolresultsService->perfSampleSeries;
 *  </code>
 */
class ProjectsHistoriesExecutionsStepsPerfSampleSeries extends \Google\Service\Resource
{
  /**
   * Creates a PerfSampleSeries. May return any of the following error code(s): -
   * ALREADY_EXISTS - PerfMetricSummary already exists for the given Step -
   * NOT_FOUND - The containing Step does not exist (perfSampleSeries.create)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param PerfSampleSeries $postBody
   * @param array $optParams Optional parameters.
   * @return PerfSampleSeries
   */
  public function create($projectId, $historyId, $executionId, $stepId, PerfSampleSeries $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], PerfSampleSeries::class);
  }
  /**
   * Gets a PerfSampleSeries. May return any of the following error code(s): -
   * NOT_FOUND - The specified PerfSampleSeries does not exist
   * (perfSampleSeries.get)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param string $sampleSeriesId A sample series id
   * @param array $optParams Optional parameters.
   * @return PerfSampleSeries
   */
  public function get($projectId, $historyId, $executionId, $stepId, $sampleSeriesId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'sampleSeriesId' => $sampleSeriesId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PerfSampleSeries::class);
  }
  /**
   * Lists PerfSampleSeries for a given Step. The request provides an optional
   * filter which specifies one or more PerfMetricsType to include in the result;
   * if none returns all. The resulting PerfSampleSeries are sorted by ids. May
   * return any of the following canonical error codes: - NOT_FOUND - The
   * containing Step does not exist
   * (perfSampleSeries.listProjectsHistoriesExecutionsStepsPerfSampleSeries)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Specify one or more PerfMetricType values such as
   * CPU to filter the result
   * @return ListPerfSampleSeriesResponse
   */
  public function listProjectsHistoriesExecutionsStepsPerfSampleSeries($projectId, $historyId, $executionId, $stepId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPerfSampleSeriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsHistoriesExecutionsStepsPerfSampleSeries::class, 'Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfSampleSeries');
