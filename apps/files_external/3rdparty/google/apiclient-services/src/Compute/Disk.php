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

class Disk extends \Google\Collection
{
  protected $collection_key = 'users';
  public $creationTimestamp;
  public $description;
  protected $diskEncryptionKeyType = CustomerEncryptionKey::class;
  protected $diskEncryptionKeyDataType = '';
  protected $guestOsFeaturesType = GuestOsFeature::class;
  protected $guestOsFeaturesDataType = 'array';
  public $id;
  public $kind;
  public $labelFingerprint;
  public $labels;
  public $lastAttachTimestamp;
  public $lastDetachTimestamp;
  public $licenseCodes;
  public $licenses;
  public $locationHint;
  public $name;
  public $options;
  public $physicalBlockSizeBytes;
  public $provisionedIops;
  public $region;
  public $replicaZones;
  public $resourcePolicies;
  public $satisfiesPzs;
  public $selfLink;
  public $sizeGb;
  public $sourceDisk;
  public $sourceDiskId;
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceImageEncryptionKeyDataType = '';
  public $sourceImageId;
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceSnapshotEncryptionKeyDataType = '';
  public $sourceSnapshotId;
  public $sourceStorageObject;
  public $status;
  public $type;
  public $users;
  public $zone;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param CustomerEncryptionKey
   */
  public function setDiskEncryptionKey(CustomerEncryptionKey $diskEncryptionKey)
  {
    $this->diskEncryptionKey = $diskEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getDiskEncryptionKey()
  {
    return $this->diskEncryptionKey;
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
  public function setLastAttachTimestamp($lastAttachTimestamp)
  {
    $this->lastAttachTimestamp = $lastAttachTimestamp;
  }
  public function getLastAttachTimestamp()
  {
    return $this->lastAttachTimestamp;
  }
  public function setLastDetachTimestamp($lastDetachTimestamp)
  {
    $this->lastDetachTimestamp = $lastDetachTimestamp;
  }
  public function getLastDetachTimestamp()
  {
    return $this->lastDetachTimestamp;
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
  public function setLocationHint($locationHint)
  {
    $this->locationHint = $locationHint;
  }
  public function getLocationHint()
  {
    return $this->locationHint;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setPhysicalBlockSizeBytes($physicalBlockSizeBytes)
  {
    $this->physicalBlockSizeBytes = $physicalBlockSizeBytes;
  }
  public function getPhysicalBlockSizeBytes()
  {
    return $this->physicalBlockSizeBytes;
  }
  public function setProvisionedIops($provisionedIops)
  {
    $this->provisionedIops = $provisionedIops;
  }
  public function getProvisionedIops()
  {
    return $this->provisionedIops;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setReplicaZones($replicaZones)
  {
    $this->replicaZones = $replicaZones;
  }
  public function getReplicaZones()
  {
    return $this->replicaZones;
  }
  public function setResourcePolicies($resourcePolicies)
  {
    $this->resourcePolicies = $resourcePolicies;
  }
  public function getResourcePolicies()
  {
    return $this->resourcePolicies;
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
  public function setSizeGb($sizeGb)
  {
    $this->sizeGb = $sizeGb;
  }
  public function getSizeGb()
  {
    return $this->sizeGb;
  }
  public function setSourceDisk($sourceDisk)
  {
    $this->sourceDisk = $sourceDisk;
  }
  public function getSourceDisk()
  {
    return $this->sourceDisk;
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
  public function setSourceStorageObject($sourceStorageObject)
  {
    $this->sourceStorageObject = $sourceStorageObject;
  }
  public function getSourceStorageObject()
  {
    return $this->sourceStorageObject;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUsers($users)
  {
    $this->users = $users;
  }
  public function getUsers()
  {
    return $this->users;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Disk::class, 'Google_Service_Compute_Disk');
