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

namespace Google\Service\Dataflow;

class WorkItemDetails extends \Google\Collection
{
  protected $collection_key = 'metrics';
  /**
   * @var string
   */
  public $attemptId;
  /**
   * @var string
   */
  public $endTime;
  protected $metricsType = MetricUpdate::class;
  protected $metricsDataType = 'array';
  protected $progressType = ProgressTimeseries::class;
  protected $progressDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  protected $stragglerInfoType = StragglerInfo::class;
  protected $stragglerInfoDataType = '';
  /**
   * @var string
   */
  public $taskId;

  /**
   * @param string
   */
  public function setAttemptId($attemptId)
  {
    $this->attemptId = $attemptId;
  }
  /**
   * @return string
   */
  public function getAttemptId()
  {
    return $this->attemptId;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param MetricUpdate[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return MetricUpdate[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param ProgressTimeseries
   */
  public function setProgress(ProgressTimeseries $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return ProgressTimeseries
   */
  public function getProgress()
  {
    return $this->progress;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param StragglerInfo
   */
  public function setStragglerInfo(StragglerInfo $stragglerInfo)
  {
    $this->stragglerInfo = $stragglerInfo;
  }
  /**
   * @return StragglerInfo
   */
  public function getStragglerInfo()
  {
    return $this->stragglerInfo;
  }
  /**
   * @param string
   */
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  /**
   * @return string
   */
  public function getTaskId()
  {
    return $this->taskId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkItemDetails::class, 'Google_Service_Dataflow_WorkItemDetails');
