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

class Google_Service_Compute_Image extends Google_Collection
{
  protected $collection_key = 'storageLocations';
  public $archiveSizeBytes;
  public $creationTimestamp;
  protected $deprecatedType = 'Google_Service_Compute_DeprecationStatus';
  protected $deprecatedDataType = '';
  public $description;
  public $diskSizeGb;
  public $family;
  protected $guestOsFeaturesType = 'Google_Service_Compute_GuestOsFeature';
  protected $guestOsFeaturesDataType = 'array';
  public $id;
  protected $imageEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $imageEncryptionKeyDataType = '';
  public $kind;
  public $labelFingerprint;
  public $labels;
  public $licenseCodes;
  public $licenses;
  public $name;
  protected $rawDiskType = 'Google_Service_Compute_ImageRawDisk';
  protected $rawDiskDataType = '';
  public $selfLink;
  protected $shieldedInstanceInitialStateType = 'Google_Service_Compute_InitialStateConfig';
  protected $shieldedInstanceInitialStateDataType = '';
  public $sourceDisk;
  protected $sourceDiskEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $sourceDiskEncryptionKeyDataType = '';
  public $sourceDiskId;
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
  protected $sourceImageEncryptionKeyDataType = '';
  public $sourceImageId;
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = 'Google_Service_Compute_CustomerEncryptionKey';
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
   * @param Google_Service_Compute_DeprecationStatus
   */
  public function setDeprecated(Google_Service_Compute_DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }
  /**
   * @return Google_Service_Compute_DeprecationStatus
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
   * @param Google_Service_Compute_GuestOsFeature[]
   */
  public function setGuestOsFeatures($guestOsFeatures)
  {
    $this->guestOsFeatures = $guestOsFeatures;
  }
  /**
   * @return Google_Service_Compute_GuestOsFeature[]
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
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setImageEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $imageEncryptionKey)
  {
    $this->imageEncryptionKey = $imageEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
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
   * @param Google_Service_Compute_ImageRawDisk
   */
  public function setRawDisk(Google_Service_Compute_ImageRawDisk $rawDisk)
  {
    $this->rawDisk = $rawDisk;
  }
  /**
   * @return Google_Service_Compute_ImageRawDisk
   */
  public function getRawDisk()
  {
    return $this->rawDisk;
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
   * @param Google_Service_Compute_InitialStateConfig
   */
  public function setShieldedInstanceInitialState(Google_Service_Compute_InitialStateConfig $shieldedInstanceInitialState)
  {
    $this->shieldedInstanceInitialState = $shieldedInstanceInitialState;
  }
  /**
   * @return Google_Service_Compute_InitialStateConfig
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
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceDiskEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceDiskEncryptionKey)
  {
    $this->sourceDiskEncryptionKey = $sourceDiskEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
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
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceImageEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceImageEncryptionKey)
  {
    $this->sourceImageEncryptionKey = $sourceImageEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
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
   * @param Google_Service_Compute_CustomerEncryptionKey
   */
  public function setSourceSnapshotEncryptionKey(Google_Service_Compute_CustomerEncryptionKey $sourceSnapshotEncryptionKey)
  {
    $this->sourceSnapshotEncryptionKey = $sourceSnapshotEncryptionKey;
  }
  /**
   * @return Google_Service_Compute_CustomerEncryptionKey
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
