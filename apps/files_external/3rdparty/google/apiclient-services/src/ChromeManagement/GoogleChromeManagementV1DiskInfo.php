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

class GoogleChromeManagementV1DiskInfo extends \Google\Collection
{
  protected $collection_key = 'volumeIds';
  /**
   * @var string
   */
  public $bytesReadThisSession;
  /**
   * @var string
   */
  public $bytesWrittenThisSession;
  /**
   * @var string
   */
  public $discardTimeThisSession;
  /**
   * @var string
   */
  public $health;
  /**
   * @var string
   */
  public $ioTimeThisSession;
  /**
   * @var string
   */
  public $manufacturer;
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $readTimeThisSession;
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var string
   */
  public $sizeBytes;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string[]
   */
  public $volumeIds;
  /**
   * @var string
   */
  public $writeTimeThisSession;

  /**
   * @param string
   */
  public function setBytesReadThisSession($bytesReadThisSession)
  {
    $this->bytesReadThisSession = $bytesReadThisSession;
  }
  /**
   * @return string
   */
  public function getBytesReadThisSession()
  {
    return $this->bytesReadThisSession;
  }
  /**
   * @param string
   */
  public function setBytesWrittenThisSession($bytesWrittenThisSession)
  {
    $this->bytesWrittenThisSession = $bytesWrittenThisSession;
  }
  /**
   * @return string
   */
  public function getBytesWrittenThisSession()
  {
    return $this->bytesWrittenThisSession;
  }
  /**
   * @param string
   */
  public function setDiscardTimeThisSession($discardTimeThisSession)
  {
    $this->discardTimeThisSession = $discardTimeThisSession;
  }
  /**
   * @return string
   */
  public function getDiscardTimeThisSession()
  {
    return $this->discardTimeThisSession;
  }
  /**
   * @param string
   */
  public function setHealth($health)
  {
    $this->health = $health;
  }
  /**
   * @return string
   */
  public function getHealth()
  {
    return $this->health;
  }
  /**
   * @param string
   */
  public function setIoTimeThisSession($ioTimeThisSession)
  {
    $this->ioTimeThisSession = $ioTimeThisSession;
  }
  /**
   * @return string
   */
  public function getIoTimeThisSession()
  {
    return $this->ioTimeThisSession;
  }
  /**
   * @param string
   */
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  /**
   * @return string
   */
  public function getManufacturer()
  {
    return $this->manufacturer;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setReadTimeThisSession($readTimeThisSession)
  {
    $this->readTimeThisSession = $readTimeThisSession;
  }
  /**
   * @return string
   */
  public function getReadTimeThisSession()
  {
    return $this->readTimeThisSession;
  }
  /**
   * @param string
   */
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  /**
   * @return string
   */
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  /**
   * @param string
   */
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  /**
   * @return string
   */
  public function getSizeBytes()
  {
    return $this->sizeBytes;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string[]
   */
  public function setVolumeIds($volumeIds)
  {
    $this->volumeIds = $volumeIds;
  }
  /**
   * @return string[]
   */
  public function getVolumeIds()
  {
    return $this->volumeIds;
  }
  /**
   * @param string
   */
  public function setWriteTimeThisSession($writeTimeThisSession)
  {
    $this->writeTimeThisSession = $writeTimeThisSession;
  }
  /**
   * @return string
   */
  public function getWriteTimeThisSession()
  {
    return $this->writeTimeThisSession;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1DiskInfo::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1DiskInfo');
