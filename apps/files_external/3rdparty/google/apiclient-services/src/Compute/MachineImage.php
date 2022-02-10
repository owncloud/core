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

class MachineImage extends \Google\Collection
{
  protected $collection_key = 'storageLocations';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $guestFlush;
  /**
   * @var string
   */
  public $id;
  protected $instancePropertiesType = InstanceProperties::class;
  protected $instancePropertiesDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $machineImageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $machineImageEncryptionKeyDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $satisfiesPzs;
  protected $savedDisksType = SavedDisk::class;
  protected $savedDisksDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  protected $sourceDiskEncryptionKeysType = SourceDiskEncryptionKey::class;
  protected $sourceDiskEncryptionKeysDataType = 'array';
  /**
   * @var string
   */
  public $sourceInstance;
  protected $sourceInstancePropertiesType = SourceInstanceProperties::class;
  protected $sourceInstancePropertiesDataType = '';
  /**
   * @var string
   */
  public $status;
  /**
   * @var string[]
   */
  public $storageLocations;
  /**
   * @var string
   */
  public $totalStorageBytes;

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
   * @param bool
   */
  public function setGuestFlush($guestFlush)
  {
    $this->guestFlush = $guestFlush;
  }
  /**
   * @return bool
   */
  public function getGuestFlush()
  {
    return $this->guestFlush;
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
   * @param InstanceProperties
   */
  public function setInstanceProperties(InstanceProperties $instanceProperties)
  {
    $this->instanceProperties = $instanceProperties;
  }
  /**
   * @return InstanceProperties
   */
  public function getInstanceProperties()
  {
    return $this->instanceProperties;
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
   * @param CustomerEncryptionKey
   */
  public function setMachineImageEncryptionKey(CustomerEncryptionKey $machineImageEncryptionKey)
  {
    $this->machineImageEncryptionKey = $machineImageEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getMachineImageEncryptionKey()
  {
    return $this->machineImageEncryptionKey;
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
   * @param SavedDisk[]
   */
  public function setSavedDisks($savedDisks)
  {
    $this->savedDisks = $savedDisks;
  }
  /**
   * @return SavedDisk[]
   */
  public function getSavedDisks()
  {
    return $this->savedDisks;
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
   * @param SourceDiskEncryptionKey[]
   */
  public function setSourceDiskEncryptionKeys($sourceDiskEncryptionKeys)
  {
    $this->sourceDiskEncryptionKeys = $sourceDiskEncryptionKeys;
  }
  /**
   * @return SourceDiskEncryptionKey[]
   */
  public function getSourceDiskEncryptionKeys()
  {
    return $this->sourceDiskEncryptionKeys;
  }
  /**
   * @param string
   */
  public function setSourceInstance($sourceInstance)
  {
    $this->sourceInstance = $sourceInstance;
  }
  /**
   * @return string
   */
  public function getSourceInstance()
  {
    return $this->sourceInstance;
  }
  /**
   * @param SourceInstanceProperties
   */
  public function setSourceInstanceProperties(SourceInstanceProperties $sourceInstanceProperties)
  {
    $this->sourceInstanceProperties = $sourceInstanceProperties;
  }
  /**
   * @return SourceInstanceProperties
   */
  public function getSourceInstanceProperties()
  {
    return $this->sourceInstanceProperties;
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
  /**
   * @param string
   */
  public function setTotalStorageBytes($totalStorageBytes)
  {
    $this->totalStorageBytes = $totalStorageBytes;
  }
  /**
   * @return string
   */
  public function getTotalStorageBytes()
  {
    return $this->totalStorageBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MachineImage::class, 'Google_Service_Compute_MachineImage');
