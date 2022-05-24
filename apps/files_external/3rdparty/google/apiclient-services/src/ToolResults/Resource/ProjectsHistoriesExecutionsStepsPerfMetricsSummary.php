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

use Google\Service\ToolResults\PerfMetricsSummary;

/**
 * The "perfMetricsSummary" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google\Service\ToolResults(...);
 *   $perfMetricsSummary = $toolresultsService->perfMetricsSummary;
 *  </code>
 */
class ProjectsHistoriesExecutionsStepsPerfMetricsSummary extends \Google\Service\Resource
{
  /**
   * Creates a PerfMetricsSummary resource. Returns the existing one if it has
   * already been created. May return any of the following error code(s): -
   * NOT_FOUND - The containing Step does not exist (perfMetricsSummary.create)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param PerfMetricsSummary $postBody
   * @param array $optParams Optional parameters.
   * @return PerfMetricsSummary
   */
  public function create($projectId, $historyId, $executionId, $stepId, PerfMetricsSummary $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], PerfMetricsSummary::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsHistoriesExecutionsStepsPerfMetricsSummary::class, 'Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfMetricsSummary');
