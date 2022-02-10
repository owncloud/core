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
  /**
   * @var string
   */
  public $appInstallationTime;
  /**
   * @var string
   */
  public $bundleId;
  protected $deviceType = DeviceInfo::class;
  protected $deviceDataType = '';
  /**
   * @var string
   */
  public $iosVersion;
  /**
   * @var string
   */
  public $retrievalMethod;
  /**
   * @var string
   */
  public $sdkVersion;
  /**
   * @var string
   */
  public $uniqueMatchLinkToCheck;
  /**
   * @var string
   */
  public $visualStyle;

  /**
   * @param string
   */
  public function setAppInstallationTime($appInstallationTime)
  {
    $this->appInstallationTime = $appInstallationTime;
  }
  /**
   * @return string
   */
  public function getAppInstallationTime()
  {
    return $this->appInstallationTime;
  }
  /**
   * @param string
   */
  public function setBundleId($bundleId)
  {
    $this->bundleId = $bundleId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setIosVersion($iosVersion)
  {
    $this->iosVersion = $iosVersion;
  }
  /**
   * @return string
   */
  public function getIosVersion()
  {
    return $this->iosVersion;
  }
  /**
   * @param string
   */
  public function setRetrievalMethod($retrievalMethod)
  {
    $this->retrievalMethod = $retrievalMethod;
  }
  /**
   * @return string
   */
  public function getRetrievalMethod()
  {
    return $this->retrievalMethod;
  }
  /**
   * @param string
   */
  public function setSdkVersion($sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  /**
   * @return string
   */
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
  /**
   * @param string
   */
  public function setUniqueMatchLinkToCheck($uniqueMatchLinkToCheck)
  {
    $this->uniqueMatchLinkToCheck = $uniqueMatchLinkToCheck;
  }
  /**
   * @return string
   */
  public function getUniqueMatchLinkToCheck()
  {
    return $this->uniqueMatchLinkToCheck;
  }
  /**
   * @param string
   */
  public function setVisualStyle($visualStyle)
  {
    $this->visualStyle = $visualStyle;
  }
  /**
   * @return string
   */
  public function getVisualStyle()
  {
    return $this->visualStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetIosPostInstallAttributionRequest::class, 'Google_Service_FirebaseDynamicLinks_GetIosPostInstallAttributionRequest');
