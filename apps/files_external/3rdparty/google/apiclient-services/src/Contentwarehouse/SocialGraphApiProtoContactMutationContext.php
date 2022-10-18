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

namespace Google\Service\Contentwarehouse;

class SocialGraphApiProtoContactMutationContext extends \Google\Model
{
  protected $androidDeviceInfoType = SocialGraphApiProtoAndroidDeviceInfo::class;
  protected $androidDeviceInfoDataType = '';
  protected $hostAppInfoType = SocialGraphApiProtoHostAppInfo::class;
  protected $hostAppInfoDataType = '';
  /**
   * @var string
   */
  public $source;
  protected $thirdPartyInfoType = SocialGraphApiProtoThirdPartyInfo::class;
  protected $thirdPartyInfoDataType = '';
  /**
   * @var string
   */
  public $timestamp;

  /**
   * @param SocialGraphApiProtoAndroidDeviceInfo
   */
  public function setAndroidDeviceInfo(SocialGraphApiProtoAndroidDeviceInfo $androidDeviceInfo)
  {
    $this->androidDeviceInfo = $androidDeviceInfo;
  }
  /**
   * @return SocialGraphApiProtoAndroidDeviceInfo
   */
  public function getAndroidDeviceInfo()
  {
    return $this->androidDeviceInfo;
  }
  /**
   * @param SocialGraphApiProtoHostAppInfo
   */
  public function setHostAppInfo(SocialGraphApiProtoHostAppInfo $hostAppInfo)
  {
    $this->hostAppInfo = $hostAppInfo;
  }
  /**
   * @return SocialGraphApiProtoHostAppInfo
   */
  public function getHostAppInfo()
  {
    return $this->hostAppInfo;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param SocialGraphApiProtoThirdPartyInfo
   */
  public function setThirdPartyInfo(SocialGraphApiProtoThirdPartyInfo $thirdPartyInfo)
  {
    $this->thirdPartyInfo = $thirdPartyInfo;
  }
  /**
   * @return SocialGraphApiProtoThirdPartyInfo
   */
  public function getThirdPartyInfo()
  {
    return $this->thirdPartyInfo;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoContactMutationContext::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoContactMutationContext');
