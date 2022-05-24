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

namespace Google\Service\Compute;

class Snapshot extends \Google\Collection
{
  protected $collection_key = 'storageLocations';
  /**
   * @var bool
   */
  public $autoCreated;
  /**
   * @var string
   */
  public $chainName;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $diskSizeGb;
  /**
   * @var string
   */
  public $downloadBytes;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $labelFingerprint;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string[]
   */
  public $licenseCodes;
  /**
   * @var string[]
   */
  public $licenses;
  /**
   * @var string
   */
  public $locationHint;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $satisfiesPzs;
  /**
   * @var string
   */
  public $selfLink;
  protected $snapshotEncryptionKeyType = CustomerEncryptionKey::class;
  protected $snapshotEncryptionKeyDataType = '';
  /**
   * @var string
   */
  public $sourceDisk;
  protected $sourceDiskEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceDiskEncryptionKeyDataType = '';
  /**
   * @var string
   */
  public $sourceDiskId;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $storageBytes;
  /**
   * @var string
   */
  public $storageBytesStatus;
  /**
   * @var string[]
   */
  public $storageLocations;

  /**
   * @param bool
   */
  public function setAutoCreated($autoCreated)
  {
    $this->autoCreated = $autoCreated;
  }
  /**
   * @return bool
   */
  public function getAutoCreated()
  {
    return $this->autoCreated;
  }
  /**
   * @param string
   */
  public function setChainName($chainName)
  {
    $this->chainName = $chainName;
  }
  /**
   * @return string
   */
  public function getChainName()
  {
    return $this->chainName;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
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
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  /**
   * @return string
   */
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  /**
   * @param string
   */
  public function setDownloadBytes($downloadBytes)
  {
    $this->downloadBytes = $downloadBytes;
  }
  /**
   * @return string
   */
  public function getDownloadBytes()
  {
    return $this->downloadBytes;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  /**
   * @return string
   */
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
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
   * @param string[]
   */
  public function setLicenseCodes($licenseCodes)
  {
    $this->licenseCodes = $licenseCodes;
  }
  /**
   * @return string[]
   */
  public function getLicenseCodes()
  {
    return $this->licenseCodes;
  }
  /**
   * @param string[]
   */
  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }
  /**
   * @return string[]
   */
  public function getLicenses()
  {
    return $this->licenses;
  }
  /**
   * @param string
   */
  public function setLocationHint($locationHint)
  {
    $this->locationHint = $locationHint;
  }
  /**
   * @return string
   */
  public function getLocationHint()
  {
    return $this->locationHint;
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
   * @param bool
   */
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  /**
   * @return bool
   */
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param CustomerEncryptionKey
   */
  public function setSnapshotEncryptionKey(CustomerEncryptionKey $snapshotEncryptionKey)
  {
    $this->snapshotEncryptionKey = $snapshotEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getSnapshotEncryptionKey()
  {
    return $this->snapshotEncryptionKey;
  }
  /**
   * @param string
   */
  public function setSourceDisk($sourceDisk)
  {
    $this->sourceDisk = $sourceDisk;
  }
  /**
   * @return string
   */
  public function getSourceDisk()
  {
    return $this->sourceDisk;
  }
  /**
   * @param CustomerEncryptionKey
   */
  public function setSourceDiskEncryptionKey(CustomerEncryptionKey $sourceDiskEncryptionKey)
  {
    $this->sourceDiskEncryptionKey = $sourceDiskEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getSourceDiskEncryptionKey()
  {
    return $this->sourceDiskEncryptionKey;
  }
  /**
   * @param string
   */
  public function setSourceDiskId($sourceDiskId)
  {
    $this->sourceDiskId = $sourceDiskId;
  }
  /**
   * @return string
   */
  public function getSourceDiskId()
  {
    return $this->sourceDiskId;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
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
  public function setStorageBytesStatus($storageBytesStatus)
  {
    $this->storageBytesStatus = $storageBytesStatus;
  }
  /**
   * @return string
   */
  public function getStorageBytesStatus()
  {
    return $this->storageBytesStatus;
  }
  /**
   * @param string[]
   */
  public function setStorageLocations($storageLocations)
  {
    $this->storageLocations = $storageLocations;
  }
  /**
   * @return string[]
   */
  public function getStorageLocations()
  {
    return $this->storageLocations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Snapshot::class, 'Google_Service_Compute_Snapshot');
