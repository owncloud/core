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

class Google_Service_Container_Operation extends Google_Collection
{
  protected $collection_key = 'nodepoolConditions';
  protected $clusterConditionsType = 'Google_Service_Container_StatusCondition';
  protected $clusterConditionsDataType = 'array';
  public $detail;
  public $endTime;
  public $location;
  public $name;
  protected $nodepoolConditionsType = 'Google_Service_Container_StatusCondition';
  protected $nodepoolConditionsDataType = 'array';
  public $operationType;
  protected $progressType = 'Google_Service_Container_OperationProgress';
  protected $progressDataType = '';
  public $selfLink;
  public $startTime;
  public $status;
  public $statusMessage;
  public $targetLink;
  public $zone;

  /**
   * @param Google_Service_Container_StatusCondition[]
   */
  public function setClusterConditions($clusterConditions)
  {
    $this->clusterConditions = $clusterConditions;
  }
  /**
   * @return Google_Service_Container_StatusCondition[]
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
   * @param Google_Service_Container_StatusCondition[]
   */
  public function setNodepoolConditions($nodepoolConditions)
  {
    $this->nodepoolConditions = $nodepoolConditions;
  }
  /**
   * @return Google_Service_Container_StatusCondition[]
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
   * @param Google_Service_Container_OperationProgress
   */
  public function setProgress(Google_Service_Container_OperationProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return Google_Service_Container_OperationProgress
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
