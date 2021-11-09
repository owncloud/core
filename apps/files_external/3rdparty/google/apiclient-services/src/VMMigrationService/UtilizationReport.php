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

namespace Google\Service\VMMigrationService;

class UtilizationReport extends \Google\Collection
{
  protected $collection_key = 'vms';
  public $createTime;
  public $displayName;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  public $frameEndTime;
  public $name;
  public $state;
  public $stateTime;
  public $timeFrame;
  public $vmCount;
  protected $vmsType = VmUtilizationInfo::class;
  protected $vmsDataType = 'array';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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
  public function setFrameEndTime($frameEndTime)
  {
    $this->frameEndTime = $frameEndTime;
  }
  public function getFrameEndTime()
  {
    return $this->frameEndTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateTime($stateTime)
  {
    $this->stateTime = $stateTime;
  }
  public function getStateTime()
  {
    return $this->stateTime;
  }
  public function setTimeFrame($timeFrame)
  {
    $this->timeFrame = $timeFrame;
  }
  public function getTimeFrame()
  {
    return $this->timeFrame;
  }
  public function setVmCount($vmCount)
  {
    $this->vmCount = $vmCount;
  }
  public function getVmCount()
  {
    return $this->vmCount;
  }
  /**
   * @param VmUtilizationInfo[]
   */
  public function setVms($vms)
  {
    $this->vms = $vms;
  }
  /**
   * @return VmUtilizationInfo[]
   */
  public function getVms()
  {
    return $this->vms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UtilizationReport::class, 'Google_Service_VMMigrationService_UtilizationReport');
