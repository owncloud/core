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

class Restore extends \Google\Model
{
  /**
   * @var string
   */
  public $backup;
  /**
   * @var string
   */
  public $cluster;
  /**
   * @var string
   */
  public $completeTime;
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
  public $resourcesExcludedCount;
  /**
   * @var int
   */
  public $resourcesFailedCount;
  /**
   * @var int
   */
  public $resourcesRestoredCount;
  protected $restoreConfigType = RestoreConfig::class;
  protected $restoreConfigDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateReason;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var int
   */
  public $volumesRestoredCount;

  /**
   * @param string
   */
  public function setBackup($backup)
  {
    $this->backup = $backup;
  }
  /**
   * @return string
   */
  public function getBackup()
  {
    return $this->backup;
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
  public function setCompleteTime($completeTime)
  {
    $this->completeTime = $completeTime;
  }
  /**
   * @return string
   */
  public function getCompleteTime()
  {
    return $this->completeTime;
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
  public function setResourcesExcludedCount($resourcesExcludedCount)
  {
    $this->resourcesExcludedCount = $resourcesExcludedCount;
  }
  /**
   * @return int
   */
  public function getResourcesExcludedCount()
  {
    return $this->resourcesExcludedCount;
  }
  /**
   * @param int
   */
  public function setResourcesFailedCount($resourcesFailedCount)
  {
    $this->resourcesFailedCount = $resourcesFailedCount;
  }
  /**
   * @return int
   */
  public function getResourcesFailedCount()
  {
    return $this->resourcesFailedCount;
  }
  /**
   * @param int
   */
  public function setResourcesRestoredCount($resourcesRestoredCount)
  {
    $this->resourcesRestoredCount = $resourcesRestoredCount;
  }
  /**
   * @return int
   */
  public function getResourcesRestoredCount()
  {
    return $this->resourcesRestoredCount;
  }
  /**
   * @param RestoreConfig
   */
  public function setRestoreConfig(RestoreConfig $restoreConfig)
  {
    $this->restoreConfig = $restoreConfig;
  }
  /**
   * @return RestoreConfig
   */
  public function getRestoreConfig()
  {
    return $this->restoreConfig;
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
  public function setStateReason($stateReason)
  {
    $this->stateReason = $stateReason;
  }
  /**
   * @return string
   */
  public function getStateReason()
  {
    return $this->stateReason;
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
  /**
   * @param int
   */
  public function setVolumesRestoredCount($volumesRestoredCount)
  {
    $this->volumesRestoredCount = $volumesRestoredCount;
  }
  /**
   * @return int
   */
  public function getVolumesRestoredCount()
  {
    return $this->volumesRestoredCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Restore::class, 'Google_Service_BackupforGKE_Restore');
