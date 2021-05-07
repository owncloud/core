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

class Google_Service_AndroidManagement_AdvancedSecurityOverrides extends Google_Model
{
  public $commonCriteriaMode;
  public $developerSettings;
  public $googlePlayProtectVerifyApps;
  public $untrustedAppsPolicy;

  public function setCommonCriteriaMode($commonCriteriaMode)
  {
    $this->commonCriteriaMode = $commonCriteriaMode;
  }
  public function getCommonCriteriaMode()
  {
    return $this->commonCriteriaMode;
  }
  public function setDeveloperSettings($developerSettings)
  {
    $this->developerSettings = $developerSettings;
  }
  public function getDeveloperSettings()
  {
    return $this->developerSettings;
  }
  public function setGooglePlayProtectVerifyApps($googlePlayProtectVerifyApps)
  {
    $this->googlePlayProtectVerifyApps = $googlePlayProtectVerifyApps;
  }
  public function getGooglePlayProtectVerifyApps()
  {
    return $this->googlePlayProtectVerifyApps;
  }
  public function setUntrustedAppsPolicy($untrustedAppsPolicy)
  {
    $this->untrustedAppsPolicy = $untrustedAppsPolicy;
  }
  public function getUntrustedAppsPolicy()
  {
    return $this->untrustedAppsPolicy;
  }
}
