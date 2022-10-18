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

namespace Google\Service\CloudIAP;

class ApplicationSettings extends \Google\Model
{
  protected $accessDeniedPageSettingsType = AccessDeniedPageSettings::class;
  protected $accessDeniedPageSettingsDataType = '';
  protected $attributePropagationSettingsType = AttributePropagationSettings::class;
  protected $attributePropagationSettingsDataType = '';
  /**
   * @var string
   */
  public $cookieDomain;
  protected $csmSettingsType = CsmSettings::class;
  protected $csmSettingsDataType = '';

  /**
   * @param AccessDeniedPageSettings
   */
  public function setAccessDeniedPageSettings(AccessDeniedPageSettings $accessDeniedPageSettings)
  {
    $this->accessDeniedPageSettings = $accessDeniedPageSettings;
  }
  /**
   * @return AccessDeniedPageSettings
   */
  public function getAccessDeniedPageSettings()
  {
    return $this->accessDeniedPageSettings;
  }
  /**
   * @param AttributePropagationSettings
   */
  public function setAttributePropagationSettings(AttributePropagationSettings $attributePropagationSettings)
  {
    $this->attributePropagationSettings = $attributePropagationSettings;
  }
  /**
   * @return AttributePropagationSettings
   */
  public function getAttributePropagationSettings()
  {
    return $this->attributePropagationSettings;
  }
  /**
   * @param string
   */
  public function setCookieDomain($cookieDomain)
  {
    $this->cookieDomain = $cookieDomain;
  }
  /**
   * @return string
   */
  public function getCookieDomain()
  {
    return $this->cookieDomain;
  }
  /**
   * @param CsmSettings
   */
  public function setCsmSettings(CsmSettings $csmSettings)
  {
    $this->csmSettings = $csmSettings;
  }
  /**
   * @return CsmSettings
   */
  public function getCsmSettings()
  {
    return $this->csmSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApplicationSettings::class, 'Google_Service_CloudIAP_ApplicationSettings');
