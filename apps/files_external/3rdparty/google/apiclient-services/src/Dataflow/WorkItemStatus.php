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

class WorkItemStatus extends \Google\Collection
{
  protected $collection_key = 'metricUpdates';
  /**
   * @var bool
   */
  public $completed;
  protected $counterUpdatesType = CounterUpdate::class;
  protected $counterUpdatesDataType = 'array';
  protected $dynamicSourceSplitType = DynamicSourceSplit::class;
  protected $dynamicSourceSplitDataType = '';
  protected $errorsType = Status::class;
  protected $errorsDataType = 'array';
  protected $metricUpdatesType = MetricUpdate::class;
  protected $metricUpdatesDataType = 'array';
  protected $progressType = ApproximateProgress::class;
  protected $progressDataType = '';
  /**
   * @var string
   */
  public $reportIndex;
  protected $reportedProgressType = ApproximateReportedProgress::class;
  protected $reportedProgressDataType = '';
  /**
   * @var string
   */
  public $requestedLeaseDuration;
  protected $sourceForkType = SourceFork::class;
  protected $sourceForkDataType = '';
  protected $sourceOperationResponseType = SourceOperationResponse::class;
  protected $sourceOperationResponseDataType = '';
  protected $stopPositionType = Position::class;
  protected $stopPositionDataType = '';
  public $totalThrottlerWaitTimeSeconds;
  /**
   * @var string
   */
  public $workItemId;

  /**
   * @param bool
   */
  public function setCompleted($completed)
  {
    $this->completed = $completed;
  }
  /**
   * @return bool
   */
  public function getCompleted()
  {
    return $this->completed;
  }
  /**
   * @param CounterUpdate[]
   */
  public function setCounterUpdates($counterUpdates)
  {
    $this->counterUpdates = $counterUpdates;
  }
  /**
   * @return CounterUpdate[]
   */
  public function getCounterUpdates()
  {
    return $this->counterUpdates;
  }
  /**
   * @param DynamicSourceSplit
   */
  public function setDynamicSourceSplit(DynamicSourceSplit $dynamicSourceSplit)
  {
    $this->dynamicSourceSplit = $dynamicSourceSplit;
  }
  /**
   * @return DynamicSourceSplit
   */
  public function getDynamicSourceSplit()
  {
    return $this->dynamicSourceSplit;
  }
  /**
   * @param Status[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Status[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param MetricUpdate[]
   */
  public function setMetricUpdates($metricUpdates)
  {
    $this->metricUpdates = $metricUpdates;
  }
  /**
   * @return MetricUpdate[]
   */
  public function getMetricUpdates()
  {
    return $this->metricUpdates;
  }
  /**
   * @param ApproximateProgress
   */
  public function setProgress(ApproximateProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return ApproximateProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  /**
   * @param string
   */
  public function setReportIndex($reportIndex)
  {
    $this->reportIndex = $reportIndex;
  }
  /**
   * @return string
   */
  public function getReportIndex()
  {
    return $this->reportIndex;
  }
  /**
   * @param ApproximateReportedProgress
   */
  public function setReportedProgress(ApproximateReportedProgress $reportedProgress)
  {
    $this->reportedProgress = $reportedProgress;
  }
  /**
   * @return ApproximateReportedProgress
   */
  public function getReportedProgress()
  {
    return $this->reportedProgress;
  }
  /**
   * @param string
   */
  public function setRequestedLeaseDuration($requestedLeaseDuration)
  {
    $this->requestedLeaseDuration = $requestedLeaseDuration;
  }
  /**
   * @return string
   */
  public function getRequestedLeaseDuration()
  {
    return $this->requestedLeaseDuration;
  }
  /**
   * @param SourceFork
   */
  public function setSourceFork(SourceFork $sourceFork)
  {
    $this->sourceFork = $sourceFork;
  }
  /**
   * @return SourceFork
   */
  public function getSourceFork()
  {
    return $this->sourceFork;
  }
  /**
   * @param SourceOperationResponse
   */
  public function setSourceOperationResponse(SourceOperationResponse $sourceOperationResponse)
  {
    $this->sourceOperationResponse = $sourceOperationResponse;
  }
  /**
   * @return SourceOperationResponse
   */
  public function getSourceOperationResponse()
  {
    return $this->sourceOperationResponse;
  }
  /**
   * @param Position
   */
  public function setStopPosition(Position $stopPosition)
  {
    $this->stopPosition = $stopPosition;
  }
  /**
   * @return Position
   */
  public function getStopPosition()
  {
    return $this->stopPosition;
  }
  public function setTotalThrottlerWaitTimeSeconds($totalThrottlerWaitTimeSeconds)
  {
    $this->totalThrottlerWaitTimeSeconds = $totalThrottlerWaitTimeSeconds;
  }
  public function getTotalThrottlerWaitTimeSeconds()
  {
    return $this->totalThrottlerWaitTimeSeconds;
  }
  /**
   * @param string
   */
  public function setWorkItemId($workItemId)
  {
    $this->workItemId = $workItemId;
  }
  /**
   * @return string
   */
  public function getWorkItemId()
  {
    return $this->workItemId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkItemStatus::class, 'Google_Service_Dataflow_WorkItemStatus');
