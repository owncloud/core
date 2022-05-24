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

namespace Google\Service\Sasportal;

class SasPortalDeviceModel extends \Google\Model
{
  /**
   * @var string
   */
  public $firmwareVersion;
  /**
   * @var string
   */
  public $hardwareVersion;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $softwareVersion;
  /**
   * @var string
   */
  public $vendor;

  /**
   * @param string
   */
  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }
  /**
   * @return string
   */
  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }
  /**
   * @param string
   */
  public function setHardwareVersion($hardwareVersion)
  {
    $this->hardwareVersion = $hardwareVersion;
  }
  /**
   * @return string
   */
  public function getHardwareVersion()
  {
    return $this->hardwareVersion;
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
   * @param string
   */
  public function setSoftwareVersion($softwareVersion)
  {
    $this->softwareVersion = $softwareVersion;
  }
  /**
   * @return string
   */
  public function getSoftwareVersion()
  {
    return $this->softwareVersion;
  }
  /**
   * @param string
   */
  public function setVendor($vendor)
  {
    $this->vendor = $vendor;
  }
  /**
   * @return string
   */
  public function getVendor()
  {
    return $this->vendor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalDeviceModel::class, 'Google_Service_Sasportal_SasPortalDeviceModel');
