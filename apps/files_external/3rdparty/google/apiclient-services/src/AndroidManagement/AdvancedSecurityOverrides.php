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

namespace Google\Service\AndroidManagement;

class AdvancedSecurityOverrides extends \Google\Collection
{
  protected $collection_key = 'personalAppsThatCanReadWorkNotifications';
  /**
   * @var string
   */
  public $commonCriteriaMode;
  /**
   * @var string
   */
  public $developerSettings;
  /**
   * @var string
   */
  public $googlePlayProtectVerifyApps;
  /**
   * @var string[]
   */
  public $personalAppsThatCanReadWorkNotifications;
  /**
   * @var string
   */
  public $untrustedAppsPolicy;

  /**
   * @param string
   */
  public function setCommonCriteriaMode($commonCriteriaMode)
  {
    $this->commonCriteriaMode = $commonCriteriaMode;
  }
  /**
   * @return string
   */
  public function getCommonCriteriaMode()
  {
    return $this->commonCriteriaMode;
  }
  /**
   * @param string
   */
  public function setDeveloperSettings($developerSettings)
  {
    $this->developerSettings = $developerSettings;
  }
  /**
   * @return string
   */
  public function getDeveloperSettings()
  {
    return $this->developerSettings;
  }
  /**
   * @param string
   */
  public function setGooglePlayProtectVerifyApps($googlePlayProtectVerifyApps)
  {
    $this->googlePlayProtectVerifyApps = $googlePlayProtectVerifyApps;
  }
  /**
   * @return string
   */
  public function getGooglePlayProtectVerifyApps()
  {
    return $this->googlePlayProtectVerifyApps;
  }
  /**
   * @param string[]
   */
  public function setPersonalAppsThatCanReadWorkNotifications($personalAppsThatCanReadWorkNotifications)
  {
    $this->personalAppsThatCanReadWorkNotifications = $personalAppsThatCanReadWorkNotifications;
  }
  /**
   * @return string[]
   */
  public function getPersonalAppsThatCanReadWorkNotifications()
  {
    return $this->personalAppsThatCanReadWorkNotifications;
  }
  /**
   * @param string
   */
  public function setUntrustedAppsPolicy($untrustedAppsPolicy)
  {
    $this->untrustedAppsPolicy = $untrustedAppsPolicy;
  }
  /**
   * @return string
   */
  public function getUntrustedAppsPolicy()
  {
    return $this->untrustedAppsPolicy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvancedSecurityOverrides::class, 'Google_Service_AndroidManagement_AdvancedSecurityOverrides');
