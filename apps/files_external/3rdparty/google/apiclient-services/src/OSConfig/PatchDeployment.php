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

namespace Google\Service\OSConfig;

class PatchDeployment extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $duration;
  protected $instanceFilterType = PatchInstanceFilter::class;
  protected $instanceFilterDataType = '';
  /**
   * @var string
   */
  public $lastExecuteTime;
  /**
   * @var string
   */
  public $name;
  protected $oneTimeScheduleType = OneTimeSchedule::class;
  protected $oneTimeScheduleDataType = '';
  protected $patchConfigType = PatchConfig::class;
  protected $patchConfigDataType = '';
  protected $recurringScheduleType = RecurringSchedule::class;
  protected $recurringScheduleDataType = '';
  protected $rolloutType = PatchRollout::class;
  protected $rolloutDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param PatchInstanceFilter
   */
  public function setInstanceFilter(PatchInstanceFilter $instanceFilter)
  {
    $this->instanceFilter = $instanceFilter;
  }
  /**
   * @return PatchInstanceFilter
   */
  public function getInstanceFilter()
  {
    return $this->instanceFilter;
  }
  /**
   * @param string
   */
  public function setLastExecuteTime($lastExecuteTime)
  {
    $this->lastExecuteTime = $lastExecuteTime;
  }
  /**
   * @return string
   */
  public function getLastExecuteTime()
  {
    return $this->lastExecuteTime;
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
   * @param OneTimeSchedule
   */
  public function setOneTimeSchedule(OneTimeSchedule $oneTimeSchedule)
  {
    $this->oneTimeSchedule = $oneTimeSchedule;
  }
  /**
   * @return OneTimeSchedule
   */
  public function getOneTimeSchedule()
  {
    return $this->oneTimeSchedule;
  }
  /**
   * @param PatchConfig
   */
  public function setPatchConfig(PatchConfig $patchConfig)
  {
    $this->patchConfig = $patchConfig;
  }
  /**
   * @return PatchConfig
   */
  public function getPatchConfig()
  {
    return $this->patchConfig;
  }
  /**
   * @param RecurringSchedule
   */
  public function setRecurringSchedule(RecurringSchedule $recurringSchedule)
  {
    $this->recurringSchedule = $recurringSchedule;
  }
  /**
   * @return RecurringSchedule
   */
  public function getRecurringSchedule()
  {
    return $this->recurringSchedule;
  }
  /**
   * @param PatchRollout
   */
  public function setRollout(PatchRollout $rollout)
  {
    $this->rollout = $rollout;
  }
  /**
   * @return PatchRollout
   */
  public function getRollout()
  {
    return $this->rollout;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PatchDeployment::class, 'Google_Service_OSConfig_PatchDeployment');
