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

class Google_Service_Sasportal_SasPortalDeviceModel extends Google_Model
{
  public $firmwareVersion;
  public $hardwareVersion;
  public $name;
  public $softwareVersion;
  public $vendor;

  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }
  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }
  public function setHardwareVersion($hardwareVersion)
  {
    $this->hardwareVersion = $hardwareVersion;
  }
  public function getHardwareVersion()
  {
    return $this->hardwareVersion;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSoftwareVersion($softwareVersion)
  {
    $this->softwareVersion = $softwareVersion;
  }
  public function getSoftwareVersion()
  {
    return $this->softwareVersion;
  }
  public function setVendor($vendor)
  {
    $this->vendor = $vendor;
  }
  public function getVendor()
  {
    return $this->vendor;
  }
}
