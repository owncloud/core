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

class Image extends \Google\Collection
{
  protected $collection_key = 'storageLocations';
  /**
   * @var string
   */
  public $architecture;
  /**
   * @var string
   */
  public $archiveSizeBytes;
  /**
   * @var string
   */
  public $creationTimestamp;
  protected $deprecatedType = DeprecationStatus::class;
  protected $deprecatedDataType = '';
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
  public $family;
  protected $guestOsFeaturesType = GuestOsFeature::class;
  protected $guestOsFeaturesDataType = 'array';
  /**
   * @var string
   */
  public $id;
  protected $imageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $imageEncryptionKeyDataType = '';
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
  public $name;
  protected $rawDiskType = ImageRawDisk::class;
  protected $rawDiskDataType = '';
  /**
   * @var bool
   */
  public $satisfiesPzs;
  /**
   * @var string
   */
  public $selfLink;
  protected $shieldedInstanceInitialStateType = InitialStateConfig::class;
  protected $shieldedInstanceInitialStateDataType = '';
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
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceImageEncryptionKeyDataType = '';
  /**
   * @var string
   */
  public $sourceImageId;
  /**
   * @var string
   */
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceSnapshotEncryptionKeyDataType = '';
  /**
   * @var string
   */
  public $sourceSnapshotId;
  /**
   * @var string
   */
  public $sourceType;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string[]
   */
  public $storageLocations;

  /**
   * @param string
   */
  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  /**
   * @return string
   */
  public function getArchitecture()
  {
    return $this->architecture;
  }
  /**
   * @param string
   */
  public function setArchiveSizeBytes($archiveSizeBytes)
  {
    $this->archiveSizeBytes = $archiveSizeBytes;
  }
  /**
   * @return string
   */
  public function getArchiveSizeBytes()
  {
    return $this->archiveSizeBytes;
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
   * @param DeprecationStatus
   */
  public function setDeprecated(DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }
  /**
   * @return DeprecationStatus
   */
  public function getDeprecated()
  {
    return $this->deprecated;
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
  public function setFamily($family)
  {
    $this->family = $family;
  }
  /**
   * @return string
   */
  public function getFamily()
  {
    return $this->family;
  }
  /**
   * @param GuestOsFeature[]
   */
  public function setGuestOsFeatures($guestOsFeatures)
  {
    $this->guestOsFeatures = $guestOsFeatures;
  }
  /**
   * @return GuestOsFeature[]
   */
  public function getGuestOsFeatures()
  {
    return $this->guestOsFeatures;
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
   * @param CustomerEncryptionKey
   */
  public function setImageEncryptionKey(CustomerEncryptionKey $imageEncryptionKey)
  {
    $this->imageEncryptionKey = $imageEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getImageEncryptionKey()
  {
    return $this->imageEncryptionKey;
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
   * @param ImageRawDisk
   */
  public function setRawDisk(ImageRawDisk $rawDisk)
  {
    $this->rawDisk = $rawDisk;
  }
  /**
   * @return ImageRawDisk
   */
  public function getRawDisk()
  {
    return $this->rawDisk;
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
   * @param InitialStateConfig
   */
  public function setShieldedInstanceInitialState(InitialStateConfig $shieldedInstanceInitialState)
  {
    $this->shieldedInstanceInitialState = $shieldedInstanceInitialState;
  }
  /**
   * @return InitialStateConfig
   */
  public function getShieldedInstanceInitialState()
  {
    return $this->shieldedInstanceInitialState;
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
  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }
  /**
   * @return string
   */
  public function getSourceImage()
  {
    return $this->sourceImage;
  }
  /**
   * @param CustomerEncryptionKey
   */
  public function setSourceImageEncryptionKey(CustomerEncryptionKey $sourceImageEncryptionKey)
  {
    $this->sourceImageEncryptionKey = $sourceImageEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getSourceImageEncryptionKey()
  {
    return $this->sourceImageEncryptionKey;
  }
  /**
   * @param string
   */
  public function setSourceImageId($sourceImageId)
  {
    $this->sourceImageId = $sourceImageId;
  }
  /**
   * @return string
   */
  public function getSourceImageId()
  {
    return $this->sourceImageId;
  }
  /**
   * @param string
   */
  public function setSourceSnapshot($sourceSnapshot)
  {
    $this->sourceSnapshot = $sourceSnapshot;
  }
  /**
   * @return string
   */
  public function getSourceSnapshot()
  {
    return $this->sourceSnapshot;
  }
  /**
   * @param CustomerEncryptionKey
   */
  public function setSourceSnapshotEncryptionKey(CustomerEncryptionKey $sourceSnapshotEncryptionKey)
  {
    $this->sourceSnapshotEncryptionKey = $sourceSnapshotEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getSourceSnapshotEncryptionKey()
  {
    return $this->sourceSnapshotEncryptionKey;
  }
  /**
   * @param string
   */
  public function setSourceSnapshotId($sourceSnapshotId)
  {
    $this->sourceSnapshotId = $sourceSnapshotId;
  }
  /**
   * @return string
   */
  public function getSourceSnapshotId()
  {
    return $this->sourceSnapshotId;
  }
  /**
   * @param string
   */
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  /**
   * @return string
   */
  public function getSourceType()
  {
    return $this->sourceType;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Image::class, 'Google_Service_Compute_Image');
