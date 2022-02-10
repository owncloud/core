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
  /**
   * @var string
   */
  public $bootOption;
  /**
   * @var string
   */
  public $committedStorageMb;
  /**
   * @var int
   */
  public $cpuCount;
  /**
   * @var string
   */
  public $datacenterDescription;
  /**
   * @var string
   */
  public $datacenterId;
  /**
   * @var int
   */
  public $diskCount;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $guestDescription;
  /**
   * @var int
   */
  public $memoryMb;
  /**
   * @var string
   */
  public $powerState;
  /**
   * @var string
   */
  public $uuid;
  /**
   * @var string
   */
  public $vmId;

  /**
   * @param string
   */
  public function setBootOption($bootOption)
  {
    $this->bootOption = $bootOption;
  }
  /**
   * @return string
   */
  public function getBootOption()
  {
    return $this->bootOption;
  }
  /**
   * @param string
   */
  public function setCommittedStorageMb($committedStorageMb)
  {
    $this->committedStorageMb = $committedStorageMb;
  }
  /**
   * @return string
   */
  public function getCommittedStorageMb()
  {
    return $this->committedStorageMb;
  }
  /**
   * @param int
   */
  public function setCpuCount($cpuCount)
  {
    $this->cpuCount = $cpuCount;
  }
  /**
   * @return int
   */
  public function getCpuCount()
  {
    return $this->cpuCount;
  }
  /**
   * @param string
   */
  public function setDatacenterDescription($datacenterDescription)
  {
    $this->datacenterDescription = $datacenterDescription;
  }
  /**
   * @return string
   */
  public function getDatacenterDescription()
  {
    return $this->datacenterDescription;
  }
  /**
   * @param string
   */
  public function setDatacenterId($datacenterId)
  {
    $this->datacenterId = $datacenterId;
  }
  /**
   * @return string
   */
  public function getDatacenterId()
  {
    return $this->datacenterId;
  }
  /**
   * @param int
   */
  public function setDiskCount($diskCount)
  {
    $this->diskCount = $diskCount;
  }
  /**
   * @return int
   */
  public function getDiskCount()
  {
    return $this->diskCount;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setGuestDescription($guestDescription)
  {
    $this->guestDescription = $guestDescription;
  }
  /**
   * @return string
   */
  public function getGuestDescription()
  {
    return $this->guestDescription;
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
  public function setPowerState($powerState)
  {
    $this->powerState = $powerState;
  }
  /**
   * @return string
   */
  public function getPowerState()
  {
    return $this->powerState;
  }
  /**
   * @param string
   */
  public function setUuid($uuid)
  {
    $this->uuid = $uuid;
  }
  /**
   * @return string
   */
  public function getUuid()
  {
    return $this->uuid;
  }
  /**
   * @param string
   */
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  /**
   * @return string
   */
  public function getVmId()
  {
    return $this->vmId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmwareVmDetails::class, 'Google_Service_VMMigrationService_VmwareVmDetails');
