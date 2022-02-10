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

namespace Google\Service\AndroidManagement;

class SoftwareInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $androidBuildNumber;
  /**
   * @var string
   */
  public $androidBuildTime;
  /**
   * @var int
   */
  public $androidDevicePolicyVersionCode;
  /**
   * @var string
   */
  public $androidDevicePolicyVersionName;
  /**
   * @var string
   */
  public $androidVersion;
  /**
   * @var string
   */
  public $bootloaderVersion;
  /**
   * @var string
   */
  public $deviceBuildSignature;
  /**
   * @var string
   */
  public $deviceKernelVersion;
  /**
   * @var string
   */
  public $primaryLanguageCode;
  /**
   * @var string
   */
  public $securityPatchLevel;
  protected $systemUpdateInfoType = SystemUpdateInfo::class;
  protected $systemUpdateInfoDataType = '';

  /**
   * @param string
   */
  public function setAndroidBuildNumber($androidBuildNumber)
  {
    $this->androidBuildNumber = $androidBuildNumber;
  }
  /**
   * @return string
   */
  public function getAndroidBuildNumber()
  {
    return $this->androidBuildNumber;
  }
  /**
   * @param string
   */
  public function setAndroidBuildTime($androidBuildTime)
  {
    $this->androidBuildTime = $androidBuildTime;
  }
  /**
   * @return string
   */
  public function getAndroidBuildTime()
  {
    return $this->androidBuildTime;
  }
  /**
   * @param int
   */
  public function setAndroidDevicePolicyVersionCode($androidDevicePolicyVersionCode)
  {
    $this->androidDevicePolicyVersionCode = $androidDevicePolicyVersionCode;
  }
  /**
   * @return int
   */
  public function getAndroidDevicePolicyVersionCode()
  {
    return $this->androidDevicePolicyVersionCode;
  }
  /**
   * @param string
   */
  public function setAndroidDevicePolicyVersionName($androidDevicePolicyVersionName)
  {
    $this->androidDevicePolicyVersionName = $androidDevicePolicyVersionName;
  }
  /**
   * @return string
   */
  public function getAndroidDevicePolicyVersionName()
  {
    return $this->androidDevicePolicyVersionName;
  }
  /**
   * @param string
   */
  public function setAndroidVersion($androidVersion)
  {
    $this->androidVersion = $androidVersion;
  }
  /**
   * @return string
   */
  public function getAndroidVersion()
  {
    return $this->androidVersion;
  }
  /**
   * @param string
   */
  public function setBootloaderVersion($bootloaderVersion)
  {
    $this->bootloaderVersion = $bootloaderVersion;
  }
  /**
   * @return string
   */
  public function getBootloaderVersion()
  {
    return $this->bootloaderVersion;
  }
  /**
   * @param string
   */
  public function setDeviceBuildSignature($deviceBuildSignature)
  {
    $this->deviceBuildSignature = $deviceBuildSignature;
  }
  /**
   * @return string
   */
  public function getDeviceBuildSignature()
  {
    return $this->deviceBuildSignature;
  }
  /**
   * @param string
   */
  public function setDeviceKernelVersion($deviceKernelVersion)
  {
    $this->deviceKernelVersion = $deviceKernelVersion;
  }
  /**
   * @return string
   */
  public function getDeviceKernelVersion()
  {
    return $this->deviceKernelVersion;
  }
  /**
   * @param string
   */
  public function setPrimaryLanguageCode($primaryLanguageCode)
  {
    $this->primaryLanguageCode = $primaryLanguageCode;
  }
  /**
   * @return string
   */
  public function getPrimaryLanguageCode()
  {
    return $this->primaryLanguageCode;
  }
  /**
   * @param string
   */
  public function setSecurityPatchLevel($securityPatchLevel)
  {
    $this->securityPatchLevel = $securityPatchLevel;
  }
  /**
   * @return string
   */
  public function getSecurityPatchLevel()
  {
    return $this->securityPatchLevel;
  }
  /**
   * @param SystemUpdateInfo
   */
  public function setSystemUpdateInfo(SystemUpdateInfo $systemUpdateInfo)
  {
    $this->systemUpdateInfo = $systemUpdateInfo;
  }
  /**
   * @return SystemUpdateInfo
   */
  public function getSystemUpdateInfo()
  {
    return $this->systemUpdateInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SoftwareInfo::class, 'Google_Service_AndroidManagement_SoftwareInfo');
