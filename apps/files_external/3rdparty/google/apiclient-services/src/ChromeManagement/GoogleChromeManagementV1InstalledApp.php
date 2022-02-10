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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1InstalledApp extends \Google\Collection
{
  protected $collection_key = 'permissions';
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $appInstallType;
  /**
   * @var string
   */
  public $appSource;
  /**
   * @var string
   */
  public $appType;
  /**
   * @var string
   */
  public $browserDeviceCount;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $homepageUri;
  /**
   * @var string
   */
  public $osUserCount;
  /**
   * @var string[]
   */
  public $permissions;

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
   * @param string
   */
  public function setAppInstallType($appInstallType)
  {
    $this->appInstallType = $appInstallType;
  }
  /**
   * @return string
   */
  public function getAppInstallType()
  {
    return $this->appInstallType;
  }
  /**
   * @param string
   */
  public function setAppSource($appSource)
  {
    $this->appSource = $appSource;
  }
  /**
   * @return string
   */
  public function getAppSource()
  {
    return $this->appSource;
  }
  /**
   * @param string
   */
  public function setAppType($appType)
  {
    $this->appType = $appType;
  }
  /**
   * @return string
   */
  public function getAppType()
  {
    return $this->appType;
  }
  /**
   * @param string
   */
  public function setBrowserDeviceCount($browserDeviceCount)
  {
    $this->browserDeviceCount = $browserDeviceCount;
  }
  /**
   * @return string
   */
  public function getBrowserDeviceCount()
  {
    return $this->browserDeviceCount;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setHomepageUri($homepageUri)
  {
    $this->homepageUri = $homepageUri;
  }
  /**
   * @return string
   */
  public function getHomepageUri()
  {
    return $this->homepageUri;
  }
  /**
   * @param string
   */
  public function setOsUserCount($osUserCount)
  {
    $this->osUserCount = $osUserCount;
  }
  /**
   * @return string
   */
  public function getOsUserCount()
  {
    return $this->osUserCount;
  }
  /**
   * @param string[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return string[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1InstalledApp::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1InstalledApp');
