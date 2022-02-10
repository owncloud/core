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

class WorkItemServiceState extends \Google\Collection
{
  protected $collection_key = 'metricShortId';
  protected $completeWorkStatusType = Status::class;
  protected $completeWorkStatusDataType = '';
  /**
   * @var array[]
   */
  public $harnessData;
  protected $hotKeyDetectionType = HotKeyDetection::class;
  protected $hotKeyDetectionDataType = '';
  /**
   * @var string
   */
  public $leaseExpireTime;
  protected $metricShortIdType = MetricShortId::class;
  protected $metricShortIdDataType = 'array';
  /**
   * @var string
   */
  public $nextReportIndex;
  /**
   * @var string
   */
  public $reportStatusInterval;
  protected $splitRequestType = ApproximateSplitRequest::class;
  protected $splitRequestDataType = '';
  protected $suggestedStopPointType = ApproximateProgress::class;
  protected $suggestedStopPointDataType = '';
  protected $suggestedStopPositionType = Position::class;
  protected $suggestedStopPositionDataType = '';

  /**
   * @param Status
   */
  public function setCompleteWorkStatus(Status $completeWorkStatus)
  {
    $this->completeWorkStatus = $completeWorkStatus;
  }
  /**
   * @return Status
   */
  public function getCompleteWorkStatus()
  {
    return $this->completeWorkStatus;
  }
  /**
   * @param array[]
   */
  public function setHarnessData($harnessData)
  {
    $this->harnessData = $harnessData;
  }
  /**
   * @return array[]
   */
  public function getHarnessData()
  {
    return $this->harnessData;
  }
  /**
   * @param HotKeyDetection
   */
  public function setHotKeyDetection(HotKeyDetection $hotKeyDetection)
  {
    $this->hotKeyDetection = $hotKeyDetection;
  }
  /**
   * @return HotKeyDetection
   */
  public function getHotKeyDetection()
  {
    return $this->hotKeyDetection;
  }
  /**
   * @param string
   */
  public function setLeaseExpireTime($leaseExpireTime)
  {
    $this->leaseExpireTime = $leaseExpireTime;
  }
  /**
   * @return string
   */
  public function getLeaseExpireTime()
  {
    return $this->leaseExpireTime;
  }
  /**
   * @param MetricShortId[]
   */
  public function setMetricShortId($metricShortId)
  {
    $this->metricShortId = $metricShortId;
  }
  /**
   * @return MetricShortId[]
   */
  public function getMetricShortId()
  {
    return $this->metricShortId;
  }
  /**
   * @param string
   */
  public function setNextReportIndex($nextReportIndex)
  {
    $this->nextReportIndex = $nextReportIndex;
  }
  /**
   * @return string
   */
  public function getNextReportIndex()
  {
    return $this->nextReportIndex;
  }
  /**
   * @param string
   */
  public function setReportStatusInterval($reportStatusInterval)
  {
    $this->reportStatusInterval = $reportStatusInterval;
  }
  /**
   * @return string
   */
  public function getReportStatusInterval()
  {
    return $this->reportStatusInterval;
  }
  /**
   * @param ApproximateSplitRequest
   */
  public function setSplitRequest(ApproximateSplitRequest $splitRequest)
  {
    $this->splitRequest = $splitRequest;
  }
  /**
   * @return ApproximateSplitRequest
   */
  public function getSplitRequest()
  {
    return $this->splitRequest;
  }
  /**
   * @param ApproximateProgress
   */
  public function setSuggestedStopPoint(ApproximateProgress $suggestedStopPoint)
  {
    $this->suggestedStopPoint = $suggestedStopPoint;
  }
  /**
   * @return ApproximateProgress
   */
  public function getSuggestedStopPoint()
  {
    return $this->suggestedStopPoint;
  }
  /**
   * @param Position
   */
  public function setSuggestedStopPosition(Position $suggestedStopPosition)
  {
    $this->suggestedStopPosition = $suggestedStopPosition;
  }
  /**
   * @return Position
   */
  public function getSuggestedStopPosition()
  {
    return $this->suggestedStopPosition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkItemServiceState::class, 'Google_Service_Dataflow_WorkItemServiceState');
