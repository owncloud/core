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

namespace Google\Service\VMMigrationService;

class VmwareVmDetails extends \Google\Model
{
  public $bootOption;
  public $committedStorageMb;
  public $cpuCount;
  public $datacenterDescription;
  public $datacenterId;
  public $diskCount;
  public $displayName;
  public $guestDescription;
  public $memoryMb;
  public $powerState;
  public $uuid;
  public $vmId;

  public function setBootOption($bootOption)
  {
    $this->bootOption = $bootOption;
  }
  public function getBootOption()
  {
    return $this->bootOption;
  }
  public function setCommittedStorageMb($committedStorageMb)
  {
    $this->committedStorageMb = $committedStorageMb;
  }
  public function getCommittedStorageMb()
  {
    return $this->committedStorageMb;
  }
  public function setCpuCount($cpuCount)
  {
    $this->cpuCount = $cpuCount;
  }
  public function getCpuCount()
  {
    return $this->cpuCount;
  }
  public function setDatacenterDescription($datacenterDescription)
  {
    $this->datacenterDescription = $datacenterDescription;
  }
  public function getDatacenterDescription()
  {
    return $this->datacenterDescription;
  }
  public function setDatacenterId($datacenterId)
  {
    $this->datacenterId = $datacenterId;
  }
  public function getDatacenterId()
  {
    return $this->datacenterId;
  }
  public function setDiskCount($diskCount)
  {
    $this->diskCount = $diskCount;
  }
  public function getDiskCount()
  {
    return $this->diskCount;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setGuestDescription($guestDescription)
  {
    $this->guestDescription = $guestDescription;
  }
  public function getGuestDescription()
  {
    return $this->guestDescription;
  }
  public function setMemoryMb($memoryMb)
  {
    $this->memoryMb = $memoryMb;
  }
  public function getMemoryMb()
  {
    return $this->memoryMb;
  }
  public function setPowerState($powerState)
  {
    $this->powerState = $powerState;
  }
  public function getPowerState()
  {
    return $this->powerState;
  }
  public function setUuid($uuid)
  {
    $this->uuid = $uuid;
  }
  public function getUuid()
  {
    return $this->uuid;
  }
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  public function getVmId()
  {
    return $this->vmId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmwareVmDetails::class, 'Google_Service_VMMigrationService_VmwareVmDetails');
