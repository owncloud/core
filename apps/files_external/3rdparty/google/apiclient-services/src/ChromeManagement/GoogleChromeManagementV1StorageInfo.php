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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1StorageInfo extends \Google\Collection
{
  protected $collection_key = 'volume';
  /**
   * @var string
   */
  public $availableDiskBytes;
  /**
   * @var string
   */
  public $totalDiskBytes;
  protected $volumeType = GoogleChromeManagementV1StorageInfoDiskVolume::class;
  protected $volumeDataType = 'array';

  /**
   * @param string
   */
  public function setAvailableDiskBytes($availableDiskBytes)
  {
    $this->availableDiskBytes = $availableDiskBytes;
  }
  /**
   * @return string
   */
  public function getAvailableDiskBytes()
  {
    return $this->availableDiskBytes;
  }
  /**
   * @param string
   */
  public function setTotalDiskBytes($totalDiskBytes)
  {
    $this->totalDiskBytes = $totalDiskBytes;
  }
  /**
   * @return string
   */
  public function getTotalDiskBytes()
  {
    return $this->totalDiskBytes;
  }
  /**
   * @param GoogleChromeManagementV1StorageInfoDiskVolume[]
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return GoogleChromeManagementV1StorageInfoDiskVolume[]
   */
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1StorageInfo::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1StorageInfo');
