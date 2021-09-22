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

class AllocationSpecificSKUAllocationReservedInstanceProperties extends \Google\Collection
{
  protected $collection_key = 'localSsds';
  protected $guestAcceleratorsType = AcceleratorConfig::class;
  protected $guestAcceleratorsDataType = 'array';
  protected $localSsdsType = AllocationSpecificSKUAllocationAllocatedInstancePropertiesReservedDisk::class;
  protected $localSsdsDataType = 'array';
  public $locationHint;
  public $machineType;
  public $minCpuPlatform;

  /**
   * @param AcceleratorConfig[]
   */
  public function setGuestAccelerators($guestAccelerators)
  {
    $this->guestAccelerators = $guestAccelerators;
  }
  /**
   * @return AcceleratorConfig[]
   */
  public function getGuestAccelerators()
  {
    return $this->guestAccelerators;
  }
  /**
   * @param AllocationSpecificSKUAllocationAllocatedInstancePropertiesReservedDisk[]
   */
  public function setLocalSsds($localSsds)
  {
    $this->localSsds = $localSsds;
  }
  /**
   * @return AllocationSpecificSKUAllocationAllocatedInstancePropertiesReservedDisk[]
   */
  public function getLocalSsds()
  {
    return $this->localSsds;
  }
  public function setLocationHint($locationHint)
  {
    $this->locationHint = $locationHint;
  }
  public function getLocationHint()
  {
    return $this->locationHint;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  public function setMinCpuPlatform($minCpuPlatform)
  {
    $this->minCpuPlatform = $minCpuPlatform;
  }
  public function getMinCpuPlatform()
  {
    return $this->minCpuPlatform;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AllocationSpecificSKUAllocationReservedInstanceProperties::class, 'Google_Service_Compute_AllocationSpecificSKUAllocationReservedInstanceProperties');
