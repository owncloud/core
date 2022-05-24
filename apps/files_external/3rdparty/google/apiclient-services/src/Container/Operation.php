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
  /**
   * @var string
   */
  public $detail;
  /**
   * @var string
   */
  public $endTime;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  protected $nodepoolConditionsType = StatusCondition::class;
  protected $nodepoolConditionsDataType = 'array';
  /**
   * @var string
   */
  public $operationType;
  protected $progressType = OperationProgress::class;
  protected $progressDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $statusMessage;
  /**
   * @var string
   */
  public $targetLink;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  /**
   * @return string
   */
  public function getDetail()
  {
    return $this->detail;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param string
   */
  public function setTargetLink($targetLink)
  {
    $this->targetLink = $targetLink;
  }
  /**
   * @return string
   */
  public function getTargetLink()
  {
    return $this->targetLink;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Operation::class, 'Google_Service_Container_Operation');
