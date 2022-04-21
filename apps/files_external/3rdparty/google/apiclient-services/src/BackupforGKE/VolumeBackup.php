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

class VolumeBackup extends \Google\Model
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
  public $diskSizeBytes;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $name;
  protected $sourcePvcType = NamespacedName::class;
  protected $sourcePvcDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateMessage;
  /**
   * @var string
   */
  public $storageBytes;
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
  public $volumeBackupHandle;

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
  public function setDiskSizeBytes($diskSizeBytes)
  {
    $this->diskSizeBytes = $diskSizeBytes;
  }
  /**
   * @return string
   */
  public function getDiskSizeBytes()
  {
    return $this->diskSizeBytes;
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
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
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
   * @param NamespacedName
   */
  public function setSourcePvc(NamespacedName $sourcePvc)
  {
    $this->sourcePvc = $sourcePvc;
  }
  /**
   * @return NamespacedName
   */
  public function getSourcePvc()
  {
    return $this->sourcePvc;
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
   * @param string
   */
  public function setStorageBytes($storageBytes)
  {
    $this->storageBytes = $storageBytes;
  }
  /**
   * @return string
   */
  public function getStorageBytes()
  {
    return $this->storageBytes;
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
  public function setVolumeBackupHandle($volumeBackupHandle)
  {
    $this->volumeBackupHandle = $volumeBackupHandle;
  }
  /**
   * @return string
   */
  public function getVolumeBackupHandle()
  {
    return $this->volumeBackupHandle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeBackup::class, 'Google_Service_BackupforGKE_VolumeBackup');
