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

class Google_Service_AnalyticsReporting_ScreenviewData extends Google_Model
{
  public $appName;
  public $mobileDeviceBranding;
  public $mobileDeviceModel;
  public $screenName;

  public function setAppName($appName)
  {
    $this->appName = $appName;
  }
  public function getAppName()
  {
    return $this->appName;
  }
  public function setMobileDeviceBranding($mobileDeviceBranding)
  {
    $this->mobileDeviceBranding = $mobileDeviceBranding;
  }
  public function getMobileDeviceBranding()
  {
    return $this->mobileDeviceBranding;
  }
  public function setMobileDeviceModel($mobileDeviceModel)
  {
    $this->mobileDeviceModel = $mobileDeviceModel;
  }
  public function getMobileDeviceModel()
  {
    return $this->mobileDeviceModel;
  }
  public function setScreenName($screenName)
  {
    $this->screenName = $screenName;
  }
  public function getScreenName()
  {
    return $this->screenName;
  }
}
