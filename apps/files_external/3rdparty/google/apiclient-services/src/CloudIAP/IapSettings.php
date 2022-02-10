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

class IapSettings extends \Google\Model
{
  protected $accessSettingsType = AccessSettings::class;
  protected $accessSettingsDataType = '';
  protected $applicationSettingsType = ApplicationSettings::class;
  protected $applicationSettingsDataType = '';
  /**
   * @var string
   */
  public $name;

  /**
   * @param AccessSettings
   */
  public function setAccessSettings(AccessSettings $accessSettings)
  {
    $this->accessSettings = $accessSettings;
  }
  /**
   * @return AccessSettings
   */
  public function getAccessSettings()
  {
    return $this->accessSettings;
  }
  /**
   * @param ApplicationSettings
   */
  public function setApplicationSettings(ApplicationSettings $applicationSettings)
  {
    $this->applicationSettings = $applicationSettings;
  }
  /**
   * @return ApplicationSettings
   */
  public function getApplicationSettings()
  {
    return $this->applicationSettings;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IapSettings::class, 'Google_Service_CloudIAP_IapSettings');
