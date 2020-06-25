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

class Google_Service_CloudIAP_ApplicationSettings extends Google_Model
{
  protected $accessDeniedPageSettingsType = 'Google_Service_CloudIAP_AccessDeniedPageSettings';
  protected $accessDeniedPageSettingsDataType = '';
  public $cookieDomain;
  protected $csmSettingsType = 'Google_Service_CloudIAP_CsmSettings';
  protected $csmSettingsDataType = '';

  /**
   * @param Google_Service_CloudIAP_AccessDeniedPageSettings
   */
  public function setAccessDeniedPageSettings(Google_Service_CloudIAP_AccessDeniedPageSettings $accessDeniedPageSettings)
  {
    $this->accessDeniedPageSettings = $accessDeniedPageSettings;
  }
  /**
   * @return Google_Service_CloudIAP_AccessDeniedPageSettings
   */
  public function getAccessDeniedPageSettings()
  {
    return $this->accessDeniedPageSettings;
  }
  public function setCookieDomain($cookieDomain)
  {
    $this->cookieDomain = $cookieDomain;
  }
  public function getCookieDomain()
  {
    return $this->cookieDomain;
  }
  /**
   * @param Google_Service_CloudIAP_CsmSettings
   */
  public function setCsmSettings(Google_Service_CloudIAP_CsmSettings $csmSettings)
  {
    $this->csmSettings = $csmSettings;
  }
  /**
   * @return Google_Service_CloudIAP_CsmSettings
   */
  public function getCsmSettings()
  {
    return $this->csmSettings;
  }
}
