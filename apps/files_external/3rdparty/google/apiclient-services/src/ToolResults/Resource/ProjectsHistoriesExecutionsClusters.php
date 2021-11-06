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

use Google\Service\ToolResults\ListScreenshotClustersResponse;
use Google\Service\ToolResults\ScreenshotCluster;

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google\Service\ToolResults(...);
 *   $clusters = $toolresultsService->clusters;
 *  </code>
 */
class ProjectsHistoriesExecutionsClusters extends \Google\Service\Resource
{
  /**
   * Retrieves a single screenshot cluster by its ID (clusters.get)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId A History id. Required.
   * @param string $executionId An Execution id. Required.
   * @param string $clusterId A Cluster id Required.
   * @param array $optParams Optional parameters.
   * @return ScreenshotCluster
   */
  public function get($projectId, $historyId, $executionId, $clusterId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'clusterId' => $clusterId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ScreenshotCluster::class);
  }
  /**
   * Lists Screenshot Clusters Returns the list of screenshot clusters
   * corresponding to an execution. Screenshot clusters are created after the
   * execution is finished. Clusters are created from a set of screenshots.
   * Between any two screenshots, a matching score is calculated based off their
   * metadata that determines how similar they are. Screenshots are placed in the
   * cluster that has screens which have the highest matching scores.
   * (clusters.listProjectsHistoriesExecutionsClusters)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId A History id. Required.
   * @param string $executionId An Execution id. Required.
   * @param array $optParams Optional parameters.
   * @return ListScreenshotClustersResponse
   */
  public function listProjectsHistoriesExecutionsClusters($projectId, $historyId, $executionId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListScreenshotClustersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsHistoriesExecutionsClusters::class, 'Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsClusters');
