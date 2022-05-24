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

namespace Google\Service\Directory;

class MobileDeviceApplications extends \Google\Collection
{
  protected $collection_key = 'permission';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string[]
   */
  public $permission;
  /**
   * @var int
   */
  public $versionCode;
  /**
   * @var string
   */
  public $versionName;

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
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param string[]
   */
  public function setPermission($permission)
  {
    $this->permission = $permission;
  }
  /**
   * @return string[]
   */
  public function getPermission()
  {
    return $this->permission;
  }
  /**
   * @param int
   */
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  /**
   * @return int
   */
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  /**
   * @param string
   */
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  /**
   * @return string
   */
  public function getVersionName()
  {
    return $this->versionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MobileDeviceApplications::class, 'Google_Service_Directory_MobileDeviceApplications');
