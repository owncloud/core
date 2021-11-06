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

class ChromeOsDeviceTpmVersionInfo extends \Google\Model
{
  public $family;
  public $firmwareVersion;
  public $manufacturer;
  public $specLevel;
  public $tpmModel;
  public $vendorSpecific;

  public function setFamily($family)
  {
    $this->family = $family;
  }
  public function getFamily()
  {
    return $this->family;
  }
  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }
  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  public function getManufacturer()
  {
    return $this->manufacturer;
  }
  public function setSpecLevel($specLevel)
  {
    $this->specLevel = $specLevel;
  }
  public function getSpecLevel()
  {
    return $this->specLevel;
  }
  public function setTpmModel($tpmModel)
  {
    $this->tpmModel = $tpmModel;
  }
  public function getTpmModel()
  {
    return $this->tpmModel;
  }
  public function setVendorSpecific($vendorSpecific)
  {
    $this->vendorSpecific = $vendorSpecific;
  }
  public function getVendorSpecific()
  {
    return $this->vendorSpecific;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeOsDeviceTpmVersionInfo::class, 'Google_Service_Directory_ChromeOsDeviceTpmVersionInfo');
