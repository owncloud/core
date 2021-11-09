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

class MigratingVm extends \Google\Model
{
  protected $computeEngineTargetDefaultsType = ComputeEngineTargetDefaults::class;
  protected $computeEngineTargetDefaultsDataType = '';
  public $createTime;
  protected $currentSyncInfoType = ReplicationCycle::class;
  protected $currentSyncInfoDataType = '';
  public $description;
  public $displayName;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  public $group;
  public $labels;
  protected $lastSyncType = ReplicationSync::class;
  protected $lastSyncDataType = '';
  public $name;
  protected $policyType = SchedulePolicy::class;
  protected $policyDataType = '';
  public $sourceVmId;
  public $state;
  public $stateTime;
  public $updateTime;

  /**
   * @param ComputeEngineTargetDefaults
   */
  public function setComputeEngineTargetDefaults(ComputeEngineTargetDefaults $computeEngineTargetDefaults)
  {
    $this->computeEngineTargetDefaults = $computeEngineTargetDefaults;
  }
  /**
   * @return ComputeEngineTargetDefaults
   */
  public function getComputeEngineTargetDefaults()
  {
    return $this->computeEngineTargetDefaults;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param ReplicationCycle
   */
  public function setCurrentSyncInfo(ReplicationCycle $currentSyncInfo)
  {
    $this->currentSyncInfo = $currentSyncInfo;
  }
  /**
   * @return ReplicationCycle
   */
  public function getCurrentSyncInfo()
  {
    return $this->currentSyncInfo;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  public function setGroup($group)
  {
    $this->group = $group;
  }
  public function getGroup()
  {
    return $this->group;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param ReplicationSync
   */
  public function setLastSync(ReplicationSync $lastSync)
  {
    $this->lastSync = $lastSync;
  }
  /**
   * @return ReplicationSync
   */
  public function getLastSync()
  {
    return $this->lastSync;
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
   * @param SchedulePolicy
   */
  public function setPolicy(SchedulePolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return SchedulePolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setSourceVmId($sourceVmId)
  {
    $this->sourceVmId = $sourceVmId;
  }
  public function getSourceVmId()
  {
    return $this->sourceVmId;
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
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MigratingVm::class, 'Google_Service_VMMigrationService_MigratingVm');
