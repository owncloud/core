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

class Google_Service_OSConfig_PatchDeployment extends Google_Model
{
  public $createTime;
  public $description;
  public $duration;
  protected $instanceFilterType = 'Google_Service_OSConfig_PatchInstanceFilter';
  protected $instanceFilterDataType = '';
  public $lastExecuteTime;
  public $name;
  protected $oneTimeScheduleType = 'Google_Service_OSConfig_OneTimeSchedule';
  protected $oneTimeScheduleDataType = '';
  protected $patchConfigType = 'Google_Service_OSConfig_PatchConfig';
  protected $patchConfigDataType = '';
  protected $recurringScheduleType = 'Google_Service_OSConfig_RecurringSchedule';
  protected $recurringScheduleDataType = '';
  protected $rolloutType = 'Google_Service_OSConfig_PatchRollout';
  protected $rolloutDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param Google_Service_OSConfig_PatchInstanceFilter
   */
  public function setInstanceFilter(Google_Service_OSConfig_PatchInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return Google_Service_OSConfig_PatchInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
  }
  public function setLastExecuteTime($lastExecuteTime)
  {
    $this->lastExecuteTime = $lastExecuteTime;
  }
  public function getLastExecuteTime()
  {
    return $this->lastExecuteTime;
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
   * @param Google_Service_OSConfig_OneTimeSchedule
   */
  public function setOneTimeSchedule(Google_Service_OSConfig_OneTimeSchedule $oneTimeSchedule)
  {
    $this->oneTimeSchedule = $oneTimeSchedule;
  }
  /**
   * @return Google_Service_OSConfig_OneTimeSchedule
   */
  public function getOneTimeSchedule()
  {
    return $this->oneTimeSchedule;
  }
  /**
   * @param Google_Service_OSConfig_PatchConfig
   */
  public function setPatchConfig(Google_Service_OSConfig_PatchConfig $patchConfig)
  {
    $this->patchConfig = $patchConfig;
  }
  /**
   * @return Google_Service_OSConfig_PatchConfig
   */
  public function getPatchConfig()
  {
    return $this->patchConfig;
  }
  /**
   * @param Google_Service_OSConfig_RecurringSchedule
   */
  public function setRecurringSchedule(Google_Service_OSConfig_RecurringSchedule $recurringSchedule)
  {
    $this->recurringSchedule = $recurringSchedule;
  }
  /**
   * @return Google_Service_OSConfig_RecurringSchedule
   */
  public function getRecurringSchedule()
  {
    return $this->recurringSchedule;
  }
  /**
   * @param Google_Service_OSConfig_PatchRollout
   */
  public function setRollout(Google_Service_OSConfig_PatchRollout $rollout)
  {
    $this->rollout = $rollout;
  }
  /**
   * @return Google_Service_OSConfig_PatchRollout
   */
  public function getRollout()
  {
    return $this->rollout;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
