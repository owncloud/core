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

class AttachedDiskInitializeParams extends \Google\Collection
{
  protected $collection_key = 'resourcePolicies';
  public $description;
  public $diskName;
  public $diskSizeGb;
  public $diskType;
  public $labels;
  public $onUpdateAction;
  public $provisionedIops;
  public $resourcePolicies;
  public $sourceImage;
  protected $sourceImageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceImageEncryptionKeyDataType = '';
  public $sourceSnapshot;
  protected $sourceSnapshotEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceSnapshotEncryptionKeyDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDiskName($diskName)
  {
    $this->diskName = $diskName;
  }
  public function getDiskName()
  {
    return $this->diskName;
  }
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }
  public function getDiskType()
  {
    return $this->diskType;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setOnUpdateAction($onUpdateAction)
  {
    $this->onUpdateAction = $onUpdateAction;
  }
  public function getOnUpdateAction()
  {
    return $this->onUpdateAction;
  }
  public function setProvisionedIops($provisionedIops)
  {
    $this->provisionedIops = $provisionedIops;
  }
  public function getProvisionedIops()
  {
    return $this->provisionedIops;
  }
  public function setResourcePolicies($resourcePolicies)
  {
    $this->resourcePolicies = $resourcePolicies;
  }
  public function getResourcePolicies()
  {
    return $this->resourcePolicies;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttachedDiskInitializeParams::class, 'Google_Service_Compute_AttachedDiskInitializeParams');
