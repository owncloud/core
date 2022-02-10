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

class DeviceInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $deviceModelName;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $languageCodeFromWebview;
  /**
   * @var string
   */
  public $languageCodeRaw;
  /**
   * @var string
   */
  public $screenResolutionHeight;
  /**
   * @var string
   */
  public $screenResolutionWidth;
  /**
   * @var string
   */
  public $timezone;

  /**
   * @param string
   */
  public function setDeviceModelName($deviceModelName)
  {
    $this->deviceModelName = $deviceModelName;
  }
  /**
   * @return string
   */
  public function getDeviceModelName()
  {
    return $this->deviceModelName;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setLanguageCodeFromWebview($languageCodeFromWebview)
  {
    $this->languageCodeFromWebview = $languageCodeFromWebview;
  }
  /**
   * @return string
   */
  public function getLanguageCodeFromWebview()
  {
    return $this->languageCodeFromWebview;
  }
  /**
   * @param string
   */
  public function setLanguageCodeRaw($languageCodeRaw)
  {
    $this->languageCodeRaw = $languageCodeRaw;
  }
  /**
   * @return string
   */
  public function getLanguageCodeRaw()
  {
    return $this->languageCodeRaw;
  }
  /**
   * @param string
   */
  public function setScreenResolutionHeight($screenResolutionHeight)
  {
    $this->screenResolutionHeight = $screenResolutionHeight;
  }
  /**
   * @return string
   */
  public function getScreenResolutionHeight()
  {
    return $this->screenResolutionHeight;
  }
  /**
   * @param string
   */
  public function setScreenResolutionWidth($screenResolutionWidth)
  {
    $this->screenResolutionWidth = $screenResolutionWidth;
  }
  /**
   * @return string
   */
  public function getScreenResolutionWidth()
  {
    return $this->screenResolutionWidth;
  }
  /**
   * @param string
   */
  public function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }
  /**
   * @return string
   */
  public function getTimezone()
  {
    return $this->timezone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceInfo::class, 'Google_Service_FirebaseDynamicLinks_DeviceInfo');
