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

namespace Google\Service\ToolResults;

class PerfMetricsSummary extends \Google\Collection
{
  protected $collection_key = 'perfMetrics';
  protected $appStartTimeType = AppStartTime::class;
  protected $appStartTimeDataType = '';
  public $executionId;
  protected $graphicsStatsType = GraphicsStats::class;
  protected $graphicsStatsDataType = '';
  public $historyId;
  protected $perfEnvironmentType = PerfEnvironment::class;
  protected $perfEnvironmentDataType = '';
  public $perfMetrics;
  public $projectId;
  public $stepId;

  /**
   * @param AppStartTime
   */
  public function setAppStartTime(AppStartTime $appStartTime)
  {
    $this->appStartTime = $appStartTime;
  }
  /**
   * @return AppStartTime
   */
  public function getAppStartTime()
  {
    return $this->appStartTime;
  }
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
  }
  /**
   * @param GraphicsStats
   */
  public function setGraphicsStats(GraphicsStats $graphicsStats)
  {
    $this->graphicsStats = $graphicsStats;
  }
  /**
   * @return GraphicsStats
   */
  public function getGraphicsStats()
  {
    return $this->graphicsStats;
  }
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  public function getHistoryId()
  {
    return $this->historyId;
  }
  /**
   * @param PerfEnvironment
   */
  public function setPerfEnvironment(PerfEnvironment $perfEnvironment)
  {
    $this->perfEnvironment = $perfEnvironment;
  }
  /**
   * @return PerfEnvironment
   */
  public function getPerfEnvironment()
  {
    return $this->perfEnvironment;
  }
  public function setPerfMetrics($perfMetrics)
  {
    $this->perfMetrics = $perfMetrics;
  }
  public function getPerfMetrics()
  {
    return $this->perfMetrics;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerfMetricsSummary::class, 'Google_Service_ToolResults_PerfMetricsSummary');
