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

class VolumeRestore extends \Google\Model
{
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
  public $etag;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateMessage;
  protected $targetPvcType = NamespacedName::class;
  protected $targetPvcDataType = '';
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $volumeBackup;
  /**
   * @var string
   */
  public $volumeHandle;
  /**
   * @var string
   */
  public $volumeType;

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
  public function setStateMessage($stateMessage)
  {
    $this->stateMessage = $stateMessage;
  }
  /**
   * @return string
   */
  public function getStateMessage()
  {
    return $this->stateMessage;
  }
  /**
   * @param NamespacedName
   */
  public function setTargetPvc(NamespacedName $targetPvc)
  {
    $this->targetPvc = $targetPvc;
  }
  /**
   * @return NamespacedName
   */
  public function getTargetPvc()
  {
    return $this->targetPvc;
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
   * @param string
   */
  public function setVolumeBackup($volumeBackup)
  {
    $this->volumeBackup = $volumeBackup;
  }
  /**
   * @return string
   */
  public function getVolumeBackup()
  {
    return $this->volumeBackup;
  }
  /**
   * @param string
   */
  public function setVolumeHandle($volumeHandle)
  {
    $this->volumeHandle = $volumeHandle;
  }
  /**
   * @return string
   */
  public function getVolumeHandle()
  {
    return $this->volumeHandle;
  }
  /**
   * @param string
   */
  public function setVolumeType($volumeType)
  {
    $this->volumeType = $volumeType;
  }
  /**
   * @return string
   */
  public function getVolumeType()
  {
    return $this->volumeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeRestore::class, 'Google_Service_BackupforGKE_VolumeRestore');
