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

namespace Google\Service\BackupforGKE;

class BackupPlan extends \Google\Model
{
  protected $backupConfigType = BackupConfig::class;
  protected $backupConfigDataType = '';
  protected $backupScheduleType = Schedule::class;
  protected $backupScheduleDataType = '';
  /**
   * @var string
   */
  public $cluster;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var bool
   */
  public $deactivated;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $protectedPodCount;
  protected $retentionPolicyType = RetentionPolicy::class;
  protected $retentionPolicyDataType = '';
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param BackupConfig
   */
  public function setBackupConfig(BackupConfig $backupConfig)
  {
    $this->backupConfig = $backupConfig;
  }
  /**
   * @return BackupConfig
   */
  public function getBackupConfig()
  {
    return $this->backupConfig;
  }
  /**
   * @param Schedule
   */
  public function setBackupSchedule(Schedule $backupSchedule)
  {
    $this->backupSchedule = $backupSchedule;
  }
  /**
   * @return Schedule
   */
  public function getBackupSchedule()
  {
    return $this->backupSchedule;
  }
  /**
   * @param string
   */
  public function setCluster($cluster)
  {
    $this->cluster = $cluster;
  }
  /**
   * @return string
   */
  public function getCluster()
  {
    return $this->cluster;
  }
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
   * @param bool
   */
  public function setDeactivated($deactivated)
  {
    $this->deactivated = $deactivated;
  }
  /**
   * @return bool
   */
  public function getDeactivated()
  {
    return $this->deactivated;
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
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param int
   */
  public function setProtectedPodCount($protectedPodCount)
  {
    $this->protectedPodCount = $protectedPodCount;
  }
  /**
   * @return int
   */
  public function getProtectedPodCount()
  {
    return $this->protectedPodCount;
  }
  /**
   * @param RetentionPolicy
   */
  public function setRetentionPolicy(RetentionPolicy $retentionPolicy)
  {
    $this->retentionPolicy = $retentionPolicy;
  }
  /**
   * @return RetentionPolicy
   */
  public function getRetentionPolicy()
  {
    return $this->retentionPolicy;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
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
class_alias(BackupPlan::class, 'Google_Service_BackupforGKE_BackupPlan');
