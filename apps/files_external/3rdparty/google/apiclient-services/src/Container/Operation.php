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

namespace Google\Service\Container;

class Operation extends \Google\Collection
{
  protected $collection_key = 'nodepoolConditions';
  protected $clusterConditionsType = StatusCondition::class;
  protected $clusterConditionsDataType = 'array';
  public $detail;
  public $endTime;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  public $location;
  public $name;
  protected $nodepoolConditionsType = StatusCondition::class;
  protected $nodepoolConditionsDataType = 'array';
  public $operationType;
  protected $progressType = OperationProgress::class;
  protected $progressDataType = '';
  public $selfLink;
  public $startTime;
  public $status;
  public $statusMessage;
  public $targetLink;
  public $zone;

  /**
   * @param StatusCondition[]
   */
  public function setClusterConditions($clusterConditions)
  {
    $this->clusterConditions = $clusterConditions;
  }
  /**
   * @return StatusCondition[]
   */
  public function getClusterConditions()
  {
    return $this->clusterConditions;
  }
  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  public function getDetail()
  {
    return $this->detail;
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
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param StatusCondition[]
   */
  public function setNodepoolConditions($nodepoolConditions)
  {
    $this->nodepoolConditions = $nodepoolConditions;
  }
  /**
   * @return StatusCondition[]
   */
  public function getNodepoolConditions()
  {
    return $this->nodepoolConditions;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param OperationProgress
   */
  public function setProgress(OperationProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return OperationProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  public function setTargetLink($targetLink)
  {
    $this->targetLink = $targetLink;
  }
  public function getTargetLink()
  {
    return $this->targetLink;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Operation::class, 'Google_Service_Container_Operation');
