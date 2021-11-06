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
  public $archiveSizeBytes;
  public $creationTimestamp;
  protected $deprecatedType = DeprecationStatus::class;
  protected $deprecatedDataType = '';
  public $description;
  public $diskSizeGb;
  public $family;
  protected $guestOsFeaturesType = GuestOsFeature::class;
  protected $guestOsFeaturesDataType = 'array';
  public $id;
  protected $imageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $imageEncryptionKeyDataType = '';
  public $kind;
  public $labelFingerprint;
  public $labels;
  public $licenseCodes;
  public $licenses;
  public $name;
  protected $rawDiskType = ImageRawDisk::class;
  protected $rawDiskDataType = '';
  public $satisfiesPzs;
  public $selfLink;
  protected $shieldedInstanceInitialStateType = InitialStateConfig::class;
  protected $shieldedInstanceInitialStateDataType = '';
  public $sourceDisk;
  protected $sourceDiskEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceDiskEncryptionKeyDataType = '';
  public $sourceDiskId;
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceImageEncryptionKeyDataType = '';
  public $sourceImageId;
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceSnapshotEncryptionKeyDataType = '';
  public $sourceSnapshotId;
  public $sourceType;
  public $status;
  public $storageLocations;

  public function setArchiveSizeBytes($archiveSizeBytes)
  {
    $this->archiveSizeBytes = $archiveSizeBytes;
  }
  public function getArchiveSizeBytes()
  {
    return $this->archiveSizeBytes;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  public function setFamily($family)
  {
    $this->family = $family;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLicenseCodes($licenseCodes)
  {
    $this->licenseCodes = $licenseCodes;
  }
  public function getLicenseCodes()
  {
    return $this->licenseCodes;
  }
  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }
  public function getLicenses()
  {
    return $this->licenses;
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
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
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
  public function setSourceDisk($sourceDisk)
  {
    $this->sourceDisk = $sourceDisk;
  }
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
  public function setSourceDiskId($sourceDiskId)
  {
    $this->sourceDiskId = $sourceDiskId;
  }
  public function getSourceDiskId()
  {
    return $this->sourceDiskId;
  }
  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }
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
  public function setSourceImageId($sourceImageId)
  {
    $this->sourceImageId = $sourceImageId;
  }
  public function getSourceImageId()
  {
    return $this->sourceImageId;
  }
  public function setSourceSnapshot($sourceSnapshot)
  {
    $this->sourceSnapshot = $sourceSnapshot;
  }
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
  public function setSourceSnapshotId($sourceSnapshotId)
  {
    $this->sourceSnapshotId = $sourceSnapshotId;
  }
  public function getSourceSnapshotId()
  {
    return $this->sourceSnapshotId;
  }
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  public function getSourceType()
  {
    return $this->sourceType;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setStorageLocations($storageLocations)
  {
    $this->storageLocations = $storageLocations;
  }
  public function getStorageLocations()
  {
    return $this->storageLocations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Image::class, 'Google_Service_Compute_Image');
