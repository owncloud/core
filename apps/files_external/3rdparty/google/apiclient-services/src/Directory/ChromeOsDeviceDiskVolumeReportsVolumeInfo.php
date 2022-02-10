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

namespace Google\Service\Directory;

class ChromeOsDeviceDiskVolumeReportsVolumeInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $storageFree;
  /**
   * @var string
   */
  public $storageTotal;
  /**
   * @var string
   */
  public $volumeId;

  /**
   * @param string
   */
  public function setStorageFree($storageFree)
  {
    $this->storageFree = $storageFree;
  }
  /**
   * @return string
   */
  public function getStorageFree()
  {
    return $this->storageFree;
  }
  /**
   * @param string
   */
  public function setStorageTotal($storageTotal)
  {
    $this->storageTotal = $storageTotal;
  }
  /**
   * @return string
   */
  public function getStorageTotal()
  {
    return $this->storageTotal;
  }
  /**
   * @param string
   */
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  /**
   * @return string
   */
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeOsDeviceDiskVolumeReportsVolumeInfo::class, 'Google_Service_Directory_ChromeOsDeviceDiskVolumeReportsVolumeInfo');
