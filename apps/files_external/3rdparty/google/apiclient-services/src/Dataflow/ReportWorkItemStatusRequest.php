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

class ReportWorkItemStatusRequest extends \Google\Collection
{
  protected $collection_key = 'workItemStatuses';
  /**
   * @var string
   */
  public $currentWorkerTime;
  /**
   * @var string
   */
  public $location;
  /**
   * @var array[]
   */
  public $unifiedWorkerRequest;
  protected $workItemStatusesType = WorkItemStatus::class;
  protected $workItemStatusesDataType = 'array';
  /**
   * @var string
   */
  public $workerId;

  /**
   * @param string
   */
  public function setCurrentWorkerTime($currentWorkerTime)
  {
    $this->currentWorkerTime = $currentWorkerTime;
  }
  /**
   * @return string
   */
  public function getCurrentWorkerTime()
  {
    return $this->currentWorkerTime;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param array[]
   */
  public function setUnifiedWorkerRequest($unifiedWorkerRequest)
  {
    $this->unifiedWorkerRequest = $unifiedWorkerRequest;
  }
  /**
   * @return array[]
   */
  public function getUnifiedWorkerRequest()
  {
    return $this->unifiedWorkerRequest;
  }
  /**
   * @param WorkItemStatus[]
   */
  public function setWorkItemStatuses($workItemStatuses)
  {
    $this->workItemStatuses = $workItemStatuses;
  }
  /**
   * @return WorkItemStatus[]
   */
  public function getWorkItemStatuses()
  {
    return $this->workItemStatuses;
  }
  /**
   * @param string
   */
  public function setWorkerId($workerId)
  {
    $this->workerId = $workerId;
  }
  /**
   * @return string
   */
  public function getWorkerId()
  {
    return $this->workerId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportWorkItemStatusRequest::class, 'Google_Service_Dataflow_ReportWorkItemStatusRequest');
