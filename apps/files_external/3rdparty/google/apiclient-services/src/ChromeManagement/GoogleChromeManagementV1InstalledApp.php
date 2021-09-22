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
  public $appId;
  public $appInstallType;
  public $appSource;
  public $appType;
  public $browserDeviceCount;
  public $description;
  public $disabled;
  public $displayName;
  public $homepageUri;
  public $osUserCount;
  public $permissions;

  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setAppInstallType($appInstallType)
  {
    $this->appInstallType = $appInstallType;
  }
  public function getAppInstallType()
  {
    return $this->appInstallType;
  }
  public function setAppSource($appSource)
  {
    $this->appSource = $appSource;
  }
  public function getAppSource()
  {
    return $this->appSource;
  }
  public function setAppType($appType)
  {
    $this->appType = $appType;
  }
  public function getAppType()
  {
    return $this->appType;
  }
  public function setBrowserDeviceCount($browserDeviceCount)
  {
    $this->browserDeviceCount = $browserDeviceCount;
  }
  public function getBrowserDeviceCount()
  {
    return $this->browserDeviceCount;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHomepageUri($homepageUri)
  {
    $this->homepageUri = $homepageUri;
  }
  public function getHomepageUri()
  {
    return $this->homepageUri;
  }
  public function setOsUserCount($osUserCount)
  {
    $this->osUserCount = $osUserCount;
  }
  public function getOsUserCount()
  {
    return $this->osUserCount;
  }
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  public function getPermissions()
  {
    return $this->permissions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1InstalledApp::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1InstalledApp');
