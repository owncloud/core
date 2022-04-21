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

class Backup extends \Google\Model
{
  /**
   * @var bool
   */
  public $allNamespaces;
  protected $clusterMetadataType = ClusterMetadata::class;
  protected $clusterMetadataDataType = '';
  /**
   * @var string
   */
  public $completeTime;
  /**
   * @var string
   */
  public $configBackupSizeBytes;
  /**
   * @var bool
   */
  public $containsSecrets;
  /**
   * @var bool
   */
  public $containsVolumeData;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var int
   */
  public $deleteLockDays;
  /**
   * @var string
   */
  public $deleteLockExpireTime;
  /**
   * @var string
   */
  public $description;
  protected $encryptionKeyType = EncryptionKey::class;
  protected $encryptionKeyDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var bool
   */
  public $manual;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $podCount;
  /**
   * @var int
   */
  public $resourceCount;
  /**
   * @var int
   */
  public $retainDays;
  /**
   * @var string
   */
  public $retainExpireTime;
  protected $selectedApplicationsType = NamespacedNames::class;
  protected $selectedApplicationsDataType = '';
  protected $selectedNamespacesType = Namespaces::class;
  protected $selectedNamespacesDataType = '';
  /**
   * @var string
   */
  public $sizeBytes;
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
  public $volumeCount;

  /**
   * @param bool
   */
  public function setAllNamespaces($allNamespaces)
  {
    $this->allNamespaces = $allNamespaces;
  }
  /**
   * @return bool
   */
  public function getAllNamespaces()
  {
    return $this->allNamespaces;
  }
  /**
   * @param ClusterMetadata
   */
  public function setClusterMetadata(ClusterMetadata $clusterMetadata)
  {
    $this->clusterMetadata = $clusterMetadata;
  }
  /**
   * @return ClusterMetadata
   */
  public function getClusterMetadata()
  {
    return $this->clusterMetadata;
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
  public function setConfigBackupSizeBytes($configBackupSizeBytes)
  {
    $this->configBackupSizeBytes = $configBackupSizeBytes;
  }
  /**
   * @return string
   */
  public function getConfigBackupSizeBytes()
  {
    return $this->configBackupSizeBytes;
  }
  /**
   * @param bool
   */
  public function setContainsSecrets($containsSecrets)
  {
    $this->containsSecrets = $containsSecrets;
  }
  /**
   * @return bool
   */
  public function getContainsSecrets()
  {
    return $this->containsSecrets;
  }
  /**
   * @param bool
   */
  public function setContainsVolumeData($containsVolumeData)
  {
    $this->containsVolumeData = $containsVolumeData;
  }
  /**
   * @return bool
   */
  public function getContainsVolumeData()
  {
    return $this->containsVolumeData;
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
   * @param int
   */
  public function setDeleteLockDays($deleteLockDays)
  {
    $this->deleteLockDays = $deleteLockDays;
  }
  /**
   * @return int
   */
  public function getDeleteLockDays()
  {
    return $this->deleteLockDays;
  }
  /**
   * @param string
   */
  public function setDeleteLockExpireTime($deleteLockExpireTime)
  {
    $this->deleteLockExpireTime = $deleteLockExpireTime;
  }
  /**
   * @return string
   */
  public function getDeleteLockExpireTime()
  {
    return $this->deleteLockExpireTime;
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
   * @param EncryptionKey
   */
  public function setEncryptionKey(EncryptionKey $encryptionKey)
  {
    $this->encryptionKey = $encryptionKey;
  }
  /**
   * @return EncryptionKey
   */
  public function getEncryptionKey()
  {
    return $this->encryptionKey;
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
   * @param bool
   */
  public function setManual($manual)
  {
    $this->manual = $manual;
  }
  /**
   * @return bool
   */
  public function getManual()
  {
    return $this->manual;
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
  public function setPodCount($podCount)
  {
    $this->podCount = $podCount;
  }
  /**
   * @return int
   */
  public function getPodCount()
  {
    return $this->podCount;
  }
  /**
   * @param int
   */
  public function setResourceCount($resourceCount)
  {
    $this->resourceCount = $resourceCount;
  }
  /**
   * @return int
   */
  public function getResourceCount()
  {
    return $this->resourceCount;
  }
  /**
   * @param int
   */
  public function setRetainDays($retainDays)
  {
    $this->retainDays = $retainDays;
  }
  /**
   * @return int
   */
  public function getRetainDays()
  {
    return $this->retainDays;
  }
  /**
   * @param string
   */
  public function setRetainExpireTime($retainExpireTime)
  {
    $this->retainExpireTime = $retainExpireTime;
  }
  /**
   * @return string
   */
  public function getRetainExpireTime()
  {
    return $this->retainExpireTime;
  }
  /**
   * @param NamespacedNames
   */
  public function setSelectedApplications(NamespacedNames $selectedApplications)
  {
    $this->selectedApplications = $selectedApplications;
  }
  /**
   * @return NamespacedNames
   */
  public function getSelectedApplications()
  {
    return $this->selectedApplications;
  }
  /**
   * @param Namespaces
   */
  public function setSelectedNamespaces(Namespaces $selectedNamespaces)
  {
    $this->selectedNamespaces = $selectedNamespaces;
  }
  /**
   * @return Namespaces
   */
  public function getSelectedNamespaces()
  {
    return $this->selectedNamespaces;
  }
  /**
   * @param string
   */
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  /**
   * @return string
   */
  public function getSizeBytes()
  {
    return $this->sizeBytes;
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
  public function setVolumeCount($volumeCount)
  {
    $this->volumeCount = $volumeCount;
  }
  /**
   * @return int
   */
  public function getVolumeCount()
  {
    return $this->volumeCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Backup::class, 'Google_Service_BackupforGKE_Backup');
