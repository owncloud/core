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

class Google_Service_Dataflow_WorkItemDetails extends Google_Collection
{
  protected $collection_key = 'metrics';
  public $attemptId;
  public $endTime;
  protected $metricsType = 'Google_Service_Dataflow_MetricUpdate';
  protected $metricsDataType = 'array';
  protected $progressType = 'Google_Service_Dataflow_ProgressTimeseries';
  protected $progressDataType = '';
  public $startTime;
  public $state;
  public $taskId;

  public function setAttemptId($attemptId)
  {
    $this->attemptId = $attemptId;
  }
  public function getAttemptId()
  {
    return $this->attemptId;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_Dataflow_MetricUpdate
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_Dataflow_MetricUpdate
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_Dataflow_ProgressTimeseries
   */
  public function setProgress(Google_Service_Dataflow_ProgressTimeseries $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return Google_Service_Dataflow_ProgressTimeseries
   */
  public function getProgress()
  {
    return $this->progress;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  public function getTaskId()
  {
    return $this->taskId;
  }
}
