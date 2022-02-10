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

class LeaseWorkItemRequest extends \Google\Collection
{
  protected $collection_key = 'workerCapabilities';
  /**
   * @var string
   */
  public $currentWorkerTime;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $requestedLeaseDuration;
  /**
   * @var array[]
   */
  public $unifiedWorkerRequest;
  /**
   * @var string[]
   */
  public $workItemTypes;
  /**
   * @var string[]
   */
  public $workerCapabilities;
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
   * @param string[]
   */
  public function setWorkItemTypes($workItemTypes)
  {
    $this->workItemTypes = $workItemTypes;
  }
  /**
   * @return string[]
   */
  public function getWorkItemTypes()
  {
    return $this->workItemTypes;
  }
  /**
   * @param string[]
   */
  public function setWorkerCapabilities($workerCapabilities)
  {
    $this->workerCapabilities = $workerCapabilities;
  }
  /**
   * @return string[]
   */
  public function getWorkerCapabilities()
  {
    return $this->workerCapabilities;
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
class_alias(LeaseWorkItemRequest::class, 'Google_Service_Dataflow_LeaseWorkItemRequest');
