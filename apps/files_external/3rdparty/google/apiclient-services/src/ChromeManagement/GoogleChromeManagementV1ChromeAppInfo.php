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

class GoogleChromeManagementV1ChromeAppInfo extends \Google\Collection
{
  protected $collection_key = 'siteAccess';
  /**
   * @var bool
   */
  public $googleOwned;
  /**
   * @var bool
   */
  public $isCwsHosted;
  /**
   * @var bool
   */
  public $isTheme;
  /**
   * @var int
   */
  public $minUserCount;
  protected $permissionsType = GoogleChromeManagementV1ChromeAppPermission::class;
  protected $permissionsDataType = 'array';
  protected $siteAccessType = GoogleChromeManagementV1ChromeAppSiteAccess::class;
  protected $siteAccessDataType = 'array';
  /**
   * @var bool
   */
  public $supportEnabled;

  /**
   * @param bool
   */
  public function setGoogleOwned($googleOwned)
  {
    $this->googleOwned = $googleOwned;
  }
  /**
   * @return bool
   */
  public function getGoogleOwned()
  {
    return $this->googleOwned;
  }
  /**
   * @param bool
   */
  public function setIsCwsHosted($isCwsHosted)
  {
    $this->isCwsHosted = $isCwsHosted;
  }
  /**
   * @return bool
   */
  public function getIsCwsHosted()
  {
    return $this->isCwsHosted;
  }
  /**
   * @param bool
   */
  public function setIsTheme($isTheme)
  {
    $this->isTheme = $isTheme;
  }
  /**
   * @return bool
   */
  public function getIsTheme()
  {
    return $this->isTheme;
  }
  /**
   * @param int
   */
  public function setMinUserCount($minUserCount)
  {
    $this->minUserCount = $minUserCount;
  }
  /**
   * @return int
   */
  public function getMinUserCount()
  {
    return $this->minUserCount;
  }
  /**
   * @param GoogleChromeManagementV1ChromeAppPermission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return GoogleChromeManagementV1ChromeAppPermission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param GoogleChromeManagementV1ChromeAppSiteAccess[]
   */
  public function setSiteAccess($siteAccess)
  {
    $this->siteAccess = $siteAccess;
  }
  /**
   * @return GoogleChromeManagementV1ChromeAppSiteAccess[]
   */
  public function getSiteAccess()
  {
    return $this->siteAccess;
  }
  /**
   * @param bool
   */
  public function setSupportEnabled($supportEnabled)
  {
    $this->supportEnabled = $supportEnabled;
  }
  /**
   * @return bool
   */
  public function getSupportEnabled()
  {
    return $this->supportEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1ChromeAppInfo::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1ChromeAppInfo');
