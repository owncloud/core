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

namespace Google\Service\FirebaseDynamicLinks;

class GetIosPostInstallAttributionRequest extends \Google\Model
{
  public $appInstallationTime;
  public $bundleId;
  protected $deviceType = DeviceInfo::class;
  protected $deviceDataType = '';
  public $iosVersion;
  public $retrievalMethod;
  public $sdkVersion;
  public $uniqueMatchLinkToCheck;
  public $visualStyle;

  public function setAppInstallationTime($appInstallationTime)
  {
    $this->appInstallationTime = $appInstallationTime;
  }
  public function getAppInstallationTime()
  {
    return $this->appInstallationTime;
  }
  public function setBundleId($bundleId)
  {
    $this->bundleId = $bundleId;
  }
  public function getBundleId()
  {
    return $this->bundleId;
  }
  /**
   * @param DeviceInfo
   */
  public function setDevice(DeviceInfo $device)
  {
    $this->device = $device;
  }
  /**
   * @return DeviceInfo
   */
  public function getDevice()
  {
    return $this->device;
  }
  public function setIosVersion($iosVersion)
  {
    $this->iosVersion = $iosVersion;
  }
  public function getIosVersion()
  {
    return $this->iosVersion;
  }
  public function setRetrievalMethod($retrievalMethod)
  {
    $this->retrievalMethod = $retrievalMethod;
  }
  public function getRetrievalMethod()
  {
    return $this->retrievalMethod;
  }
  public function setSdkVersion($sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
  public function setUniqueMatchLinkToCheck($uniqueMatchLinkToCheck)
  {
    $this->uniqueMatchLinkToCheck = $uniqueMatchLinkToCheck;
  }
  public function getUniqueMatchLinkToCheck()
  {
    return $this->uniqueMatchLinkToCheck;
  }
  public function setVisualStyle($visualStyle)
  {
    $this->visualStyle = $visualStyle;
  }
  public function getVisualStyle()
  {
    return $this->visualStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetIosPostInstallAttributionRequest::class, 'Google_Service_FirebaseDynamicLinks_GetIosPostInstallAttributionRequest');
