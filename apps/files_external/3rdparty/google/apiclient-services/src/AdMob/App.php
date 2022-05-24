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

namespace Google\Service\AdMob;

class App extends \Google\Model
{
  /**
   * @var string
   */
  public $appId;
  protected $linkedAppInfoType = AppLinkedAppInfo::class;
  protected $linkedAppInfoDataType = '';
  protected $manualAppInfoType = AppManualAppInfo::class;
  protected $manualAppInfoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $platform;

  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param AppLinkedAppInfo
   */
  public function setLinkedAppInfo(AppLinkedAppInfo $linkedAppInfo)
  {
    $this->linkedAppInfo = $linkedAppInfo;
  }
  /**
   * @return AppLinkedAppInfo
   */
  public function getLinkedAppInfo()
  {
    return $this->linkedAppInfo;
  }
  /**
   * @param AppManualAppInfo
   */
  public function setManualAppInfo(AppManualAppInfo $manualAppInfo)
  {
    $this->manualAppInfo = $manualAppInfo;
  }
  /**
   * @return AppManualAppInfo
   */
  public function getManualAppInfo()
  {
    return $this->manualAppInfo;
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
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return string
   */
  public function getPlatform()
  {
    return $this->platform;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(App::class, 'Google_Service_AdMob_App');
