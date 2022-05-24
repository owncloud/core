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

class WorkerMessage extends \Google\Model
{
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $time;
  protected $workerHealthReportType = WorkerHealthReport::class;
  protected $workerHealthReportDataType = '';
  protected $workerLifecycleEventType = WorkerLifecycleEvent::class;
  protected $workerLifecycleEventDataType = '';
  protected $workerMessageCodeType = WorkerMessageCode::class;
  protected $workerMessageCodeDataType = '';
  protected $workerMetricsType = ResourceUtilizationReport::class;
  protected $workerMetricsDataType = '';
  protected $workerShutdownNoticeType = WorkerShutdownNotice::class;
  protected $workerShutdownNoticeDataType = '';

  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param WorkerHealthReport
   */
  public function setWorkerHealthReport(WorkerHealthReport $workerHealthReport)
  {
    $this->workerHealthReport = $workerHealthReport;
  }
  /**
   * @return WorkerHealthReport
   */
  public function getWorkerHealthReport()
  {
    return $this->workerHealthReport;
  }
  /**
   * @param WorkerLifecycleEvent
   */
  public function setWorkerLifecycleEvent(WorkerLifecycleEvent $workerLifecycleEvent)
  {
    $this->workerLifecycleEvent = $workerLifecycleEvent;
  }
  /**
   * @return WorkerLifecycleEvent
   */
  public function getWorkerLifecycleEvent()
  {
    return $this->workerLifecycleEvent;
  }
  /**
   * @param WorkerMessageCode
   */
  public function setWorkerMessageCode(WorkerMessageCode $workerMessageCode)
  {
    $this->workerMessageCode = $workerMessageCode;
  }
  /**
   * @return WorkerMessageCode
   */
  public function getWorkerMessageCode()
  {
    return $this->workerMessageCode;
  }
  /**
   * @param ResourceUtilizationReport
   */
  public function setWorkerMetrics(ResourceUtilizationReport $workerMetrics)
  {
    $this->workerMetrics = $workerMetrics;
  }
  /**
   * @return ResourceUtilizationReport
   */
  public function getWorkerMetrics()
  {
    return $this->workerMetrics;
  }
  /**
   * @param WorkerShutdownNotice
   */
  public function setWorkerShutdownNotice(WorkerShutdownNotice $workerShutdownNotice)
  {
    $this->workerShutdownNotice = $workerShutdownNotice;
  }
  /**
   * @return WorkerShutdownNotice
   */
  public function getWorkerShutdownNotice()
  {
    return $this->workerShutdownNotice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkerMessage::class, 'Google_Service_Dataflow_WorkerMessage');
