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

class Google_Service_CloudIAP_IapSettings extends Google_Model
{
  protected $accessSettingsType = 'Google_Service_CloudIAP_AccessSettings';
  protected $accessSettingsDataType = '';
  protected $applicationSettingsType = 'Google_Service_CloudIAP_ApplicationSettings';
  protected $applicationSettingsDataType = '';
  public $name;

  /**
   * @param Google_Service_CloudIAP_AccessSettings
   */
  public function setAccessSettings(Google_Service_CloudIAP_AccessSettings $accessSettings)
  {
    $this->accessSettings = $accessSettings;
  }
  /**
   * @return Google_Service_CloudIAP_AccessSettings
   */
  public function getAccessSettings()
  {
    return $this->accessSettings;
  }
  /**
   * @param Google_Service_CloudIAP_ApplicationSettings
   */
  public function setApplicationSettings(Google_Service_CloudIAP_ApplicationSettings $applicationSettings)
  {
    $this->applicationSettings = $applicationSettings;
  }
  /**
   * @return Google_Service_CloudIAP_ApplicationSettings
   */
  public function getApplicationSettings()
  {
    return $this->applicationSettings;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
