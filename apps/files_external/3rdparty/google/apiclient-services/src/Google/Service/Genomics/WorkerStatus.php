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

class Google_Service_Genomics_WorkerStatus extends Google_Model
{
  protected $attachedDisksType = 'Google_Service_Genomics_DiskStatus';
  protected $attachedDisksDataType = 'map';
  protected $bootDiskType = 'Google_Service_Genomics_DiskStatus';
  protected $bootDiskDataType = '';
  public $freeRamBytes;
  public $totalRamBytes;
  public $uptimeSeconds;

  /**
   * @param Google_Service_Genomics_DiskStatus[]
   */
  public function setAttachedDisks($attachedDisks)
  {
    $this->attachedDisks = $attachedDisks;
  }
  /**
   * @return Google_Service_Genomics_DiskStatus[]
   */
  public function getAttachedDisks()
  {
    return $this->attachedDisks;
  }
  /**
   * @param Google_Service_Genomics_DiskStatus
   */
  public function setBootDisk(Google_Service_Genomics_DiskStatus $bootDisk)
  {
    $this->bootDisk = $bootDisk;
  }
  /**
   * @return Google_Service_Genomics_DiskStatus
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
