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

namespace Google\Service\Baremetalsolution;

class Lun extends \Google\Model
{
  /**
   * @var bool
   */
  public $bootLun;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $multiprotocolType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $shareable;
  /**
   * @var string
   */
  public $sizeGb;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $storageType;
  /**
   * @var string
   */
  public $storageVolume;
  /**
   * @var string
   */
  public $wwid;

  /**
   * @param bool
   */
  public function setBootLun($bootLun)
  {
    $this->bootLun = $bootLun;
  }
  /**
   * @return bool
   */
  public function getBootLun()
  {
    return $this->bootLun;
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
   * @param string
   */
  public function setMultiprotocolType($multiprotocolType)
  {
    $this->multiprotocolType = $multiprotocolType;
  }
  /**
   * @return string
   */
  public function getMultiprotocolType()
  {
    return $this->multiprotocolType;
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
   * @param bool
   */
  public function setShareable($shareable)
  {
    $this->shareable = $shareable;
  }
  /**
   * @return bool
   */
  public function getShareable()
  {
    return $this->shareable;
  }
  /**
   * @param string
   */
  public function setSizeGb($sizeGb)
  {
    $this->sizeGb = $sizeGb;
  }
  /**
   * @return string
   */
  public function getSizeGb()
  {
    return $this->sizeGb;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStorageType($storageType)
  {
    $this->storageType = $storageType;
  }
  /**
   * @return string
   */
  public function getStorageType()
  {
    return $this->storageType;
  }
  /**
   * @param string
   */
  public function setStorageVolume($storageVolume)
  {
    $this->storageVolume = $storageVolume;
  }
  /**
   * @return string
   */
  public function getStorageVolume()
  {
    return $this->storageVolume;
  }
  /**
   * @param string
   */
  public function setWwid($wwid)
  {
    $this->wwid = $wwid;
  }
  /**
   * @return string
   */
  public function getWwid()
  {
    return $this->wwid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Lun::class, 'Google_Service_Baremetalsolution_Lun');
