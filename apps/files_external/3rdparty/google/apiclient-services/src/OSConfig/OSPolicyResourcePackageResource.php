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

namespace Google\Service\OSConfig;

class OSPolicyResourcePackageResource extends \Google\Model
{
  protected $aptType = OSPolicyResourcePackageResourceAPT::class;
  protected $aptDataType = '';
  protected $debType = OSPolicyResourcePackageResourceDeb::class;
  protected $debDataType = '';
  /**
   * @var string
   */
  public $desiredState;
  protected $googetType = OSPolicyResourcePackageResourceGooGet::class;
  protected $googetDataType = '';
  protected $msiType = OSPolicyResourcePackageResourceMSI::class;
  protected $msiDataType = '';
  protected $rpmType = OSPolicyResourcePackageResourceRPM::class;
  protected $rpmDataType = '';
  protected $yumType = OSPolicyResourcePackageResourceYUM::class;
  protected $yumDataType = '';
  protected $zypperType = OSPolicyResourcePackageResourceZypper::class;
  protected $zypperDataType = '';

  /**
   * @param OSPolicyResourcePackageResourceAPT
   */
  public function setApt(OSPolicyResourcePackageResourceAPT $apt)
  {
    $this->apt = $apt;
  }
  /**
   * @return OSPolicyResourcePackageResourceAPT
   */
  public function getApt()
  {
    return $this->apt;
  }
  /**
   * @param OSPolicyResourcePackageResourceDeb
   */
  public function setDeb(OSPolicyResourcePackageResourceDeb $deb)
  {
    $this->deb = $deb;
  }
  /**
   * @return OSPolicyResourcePackageResourceDeb
   */
  public function getDeb()
  {
    return $this->deb;
  }
  /**
   * @param string
   */
  public function setDesiredState($desiredState)
  {
    $this->desiredState = $desiredState;
  }
  /**
   * @return string
   */
  public function getDesiredState()
  {
    return $this->desiredState;
  }
  /**
   * @param OSPolicyResourcePackageResourceGooGet
   */
  public function setGooget(OSPolicyResourcePackageResourceGooGet $googet)
  {
    $this->googet = $googet;
  }
  /**
   * @return OSPolicyResourcePackageResourceGooGet
   */
  public function getGooget()
  {
    return $this->googet;
  }
  /**
   * @param OSPolicyResourcePackageResourceMSI
   */
  public function setMsi(OSPolicyResourcePackageResourceMSI $msi)
  {
    $this->msi = $msi;
  }
  /**
   * @return OSPolicyResourcePackageResourceMSI
   */
  public function getMsi()
  {
    return $this->msi;
  }
  /**
   * @param OSPolicyResourcePackageResourceRPM
   */
  public function setRpm(OSPolicyResourcePackageResourceRPM $rpm)
  {
    $this->rpm = $rpm;
  }
  /**
   * @return OSPolicyResourcePackageResourceRPM
   */
  public function getRpm()
  {
    return $this->rpm;
  }
  /**
   * @param OSPolicyResourcePackageResourceYUM
   */
  public function setYum(OSPolicyResourcePackageResourceYUM $yum)
  {
    $this->yum = $yum;
  }
  /**
   * @return OSPolicyResourcePackageResourceYUM
   */
  public function getYum()
  {
    return $this->yum;
  }
  /**
   * @param OSPolicyResourcePackageResourceZypper
   */
  public function setZypper(OSPolicyResourcePackageResourceZypper $zypper)
  {
    $this->zypper = $zypper;
  }
  /**
   * @return OSPolicyResourcePackageResourceZypper
   */
  public function getZypper()
  {
    return $this->zypper;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResourcePackageResource::class, 'Google_Service_OSConfig_OSPolicyResourcePackageResource');
