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

namespace Google\Service\Genomics;

class WorkerStatus extends \Google\Model
{
  protected $attachedDisksType = DiskStatus::class;
  protected $attachedDisksDataType = 'map';
  protected $bootDiskType = DiskStatus::class;
  protected $bootDiskDataType = '';
  public $freeRamBytes;
  public $totalRamBytes;
  public $uptimeSeconds;

  /**
   * @param DiskStatus[]
   */
  public function setAttachedDisks($attachedDisks)
  {
    $this->attachedDisks = $attachedDisks;
  }
  /**
   * @return DiskStatus[]
   */
  public function getAttachedDisks()
  {
    return $this->attachedDisks;
  }
  /**
   * @param DiskStatus
   */
  public function setBootDisk(DiskStatus $bootDisk)
  {
    $this->bootDisk = $bootDisk;
  }
  /**
   * @return DiskStatus
   */
  public function getBootDisk()
  {
    return $this->bootDisk;
  }
  public function setFreeRamBytes($freeRamBytes)
  {
    $this->freeRamBytes = $freeRamBytes;
  }
  public function getFreeRamBytes()
  {
    return $this->freeRamBytes;
  }
  public function setTotalRamBytes($totalRamBytes)
  {
    $this->totalRamBytes = $totalRamBytes;
  }
  public function getTotalRamBytes()
  {
    return $this->totalRamBytes;
  }
  public function setUptimeSeconds($uptimeSeconds)
  {
    $this->uptimeSeconds = $uptimeSeconds;
  }
  public function getUptimeSeconds()
  {
    return $this->uptimeSeconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkerStatus::class, 'Google_Service_Genomics_WorkerStatus');
