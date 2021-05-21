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

class Google_Service_AdMob_App extends Google_Model
{
  public $appId;
  protected $linkedAppInfoType = 'Google_Service_AdMob_AppLinkedAppInfo';
  protected $linkedAppInfoDataType = '';
  protected $manualAppInfoType = 'Google_Service_AdMob_AppManualAppInfo';
  protected $manualAppInfoDataType = '';
  public $name;
  public $platform;

  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param Google_Service_AdMob_AppLinkedAppInfo
   */
  public function setLinkedAppInfo(Google_Service_AdMob_AppLinkedAppInfo $linkedAppInfo)
  {
    $this->linkedAppInfo = $linkedAppInfo;
  }
  /**
   * @return Google_Service_AdMob_AppLinkedAppInfo
   */
  public function getLinkedAppInfo()
  {
    return $this->linkedAppInfo;
  }
  /**
   * @param Google_Service_AdMob_AppManualAppInfo
   */
  public function setManualAppInfo(Google_Service_AdMob_AppManualAppInfo $manualAppInfo)
  {
    $this->manualAppInfo = $manualAppInfo;
  }
  /**
   * @return Google_Service_AdMob_AppManualAppInfo
   */
  public function getManualAppInfo()
  {
    return $this->manualAppInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
}
