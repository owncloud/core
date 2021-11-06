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
  public $bootLun;
  public $multiprotocolType;
  public $name;
  public $shared;
  public $sizeGb;
  public $state;
  public $storageType;
  public $storageVolume;

  public function setBootLun($bootLun)
  {
    $this->bootLun = $bootLun;
  }
  public function getBootLun()
  {
    return $this->bootLun;
  }
  public function setMultiprotocolType($multiprotocolType)
  {
    $this->multiprotocolType = $multiprotocolType;
  }
  public function getMultiprotocolType()
  {
    return $this->multiprotocolType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setShared($shared)
  {
    $this->shared = $shared;
  }
  public function getShared()
  {
    return $this->shared;
  }
  public function setSizeGb($sizeGb)
  {
    $this->sizeGb = $sizeGb;
  }
  public function getSizeGb()
  {
    return $this->sizeGb;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStorageType($storageType)
  {
    $this->storageType = $storageType;
  }
  public function getStorageType()
  {
    return $this->storageType;
  }
  public function setStorageVolume($storageVolume)
  {
    $this->storageVolume = $storageVolume;
  }
  public function getStorageVolume()
  {
    return $this->storageVolume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Lun::class, 'Google_Service_Baremetalsolution_Lun');
