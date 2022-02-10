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

namespace Google\Service\AnalyticsReporting;

class ScreenviewData extends \Google\Model
{
  /**
   * @var string
   */
  public $appName;
  /**
   * @var string
   */
  public $mobileDeviceBranding;
  /**
   * @var string
   */
  public $mobileDeviceModel;
  /**
   * @var string
   */
  public $screenName;

  /**
   * @param string
   */
  public function setAppName($appName)
  {
    $this->appName = $appName;
  }
  /**
   * @return string
   */
  public function getAppName()
  {
    return $this->appName;
  }
  /**
   * @param string
   */
  public function setMobileDeviceBranding($mobileDeviceBranding)
  {
    $this->mobileDeviceBranding = $mobileDeviceBranding;
  }
  /**
   * @return string
   */
  public function getMobileDeviceBranding()
  {
    return $this->mobileDeviceBranding;
  }
  /**
   * @param string
   */
  public function setMobileDeviceModel($mobileDeviceModel)
  {
    $this->mobileDeviceModel = $mobileDeviceModel;
  }
  /**
   * @return string
   */
  public function getMobileDeviceModel()
  {
    return $this->mobileDeviceModel;
  }
  /**
   * @param string
   */
  public function setScreenName($screenName)
  {
    $this->screenName = $screenName;
  }
  /**
   * @return string
   */
  public function getScreenName()
  {
    return $this->screenName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScreenviewData::class, 'Google_Service_AnalyticsReporting_ScreenviewData');
