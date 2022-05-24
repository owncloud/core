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

class MachineType extends \Google\Collection
{
  protected $collection_key = 'scratchDisks';
  protected $acceleratorsType = MachineTypeAccelerators::class;
  protected $acceleratorsDataType = 'array';
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
   * @var int
   */
  public $guestCpus;
  /**
   * @var string
   */
  public $id;
  /**
   * @var int
   */
  public $imageSpaceGb;
  /**
   * @var bool
   */
  public $isSharedCpu;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $maximumPersistentDisks;
  /**
   * @var string
   */
  public $maximumPersistentDisksSizeGb;
  /**
   * @var int
   */
  public $memoryMb;
  /**
   * @var string
   */
  public $name;
  protected $scratchDisksType = MachineTypeScratchDisks::class;
  protected $scratchDisksDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $zone;

  /**
   * @param MachineTypeAccelerators[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return MachineTypeAccelerators[]
   */
  public function getAccelerators()
  {
    return $this->accelerators;
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
   * @param int
   */
  public function setGuestCpus($guestCpus)
  {
    $this->guestCpus = $guestCpus;
  }
  /**
   * @return int
   */
  public function getGuestCpus()
  {
    return $this->guestCpus;
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
   * @param int
   */
  public function setImageSpaceGb($imageSpaceGb)
  {
    $this->imageSpaceGb = $imageSpaceGb;
  }
  /**
   * @return int
   */
  public function getImageSpaceGb()
  {
    return $this->imageSpaceGb;
  }
  /**
   * @param bool
   */
  public function setIsSharedCpu($isSharedCpu)
  {
    $this->isSharedCpu = $isSharedCpu;
  }
  /**
   * @return bool
   */
  public function getIsSharedCpu()
  {
    return $this->isSharedCpu;
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
   * @param int
   */
  public function setMaximumPersistentDisks($maximumPersistentDisks)
  {
    $this->maximumPersistentDisks = $maximumPersistentDisks;
  }
  /**
   * @return int
   */
  public function getMaximumPersistentDisks()
  {
    return $this->maximumPersistentDisks;
  }
  /**
   * @param string
   */
  public function setMaximumPersistentDisksSizeGb($maximumPersistentDisksSizeGb)
  {
    $this->maximumPersistentDisksSizeGb = $maximumPersistentDisksSizeGb;
  }
  /**
   * @return string
   */
  public function getMaximumPersistentDisksSizeGb()
  {
    return $this->maximumPersistentDisksSizeGb;
  }
  /**
   * @param int
   */
  public function setMemoryMb($memoryMb)
  {
    $this->memoryMb = $memoryMb;
  }
  /**
   * @return int
   */
  public function getMemoryMb()
  {
    return $this->memoryMb;
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
   * @param MachineTypeScratchDisks[]
   */
  public function setScratchDisks($scratchDisks)
  {
    $this->scratchDisks = $scratchDisks;
  }
  /**
   * @return MachineTypeScratchDisks[]
   */
  public function getScratchDisks()
  {
    return $this->scratchDisks;
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
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MachineType::class, 'Google_Service_Compute_MachineType');
