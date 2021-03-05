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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Agent extends Google_Model
{
  public $avatarUri;
  public $defaultLanguageCode;
  public $description;
  public $displayName;
  public $enableSpellCorrection;
  public $enableStackdriverLogging;
  public $name;
  public $securitySettings;
  protected $speechToTextSettingsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SpeechToTextSettings';
  protected $speechToTextSettingsDataType = '';
  public $startFlow;
  public $timeZone;

  public function setAvatarUri($avatarUri)
  {
    $this->avatarUri = $avatarUri;
  }
  public function getAvatarUri()
  {
    return $this->avatarUri;
  }
  public function setDefaultLanguageCode($defaultLanguageCode)
  {
    $this->defaultLanguageCode = $defaultLanguageCode;
  }
  public function getDefaultLanguageCode()
  {
    return $this->defaultLanguageCode;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnableSpellCorrection($enableSpellCorrection)
  {
    $this->enableSpellCorrection = $enableSpellCorrection;
  }
  public function getEnableSpellCorrection()
  {
    return $this->enableSpellCorrection;
  }
  public function setEnableStackdriverLogging($enableStackdriverLogging)
  {
    $this->enableStackdriverLogging = $enableStackdriverLogging;
  }
  public function getEnableStackdriverLogging()
  {
    return $this->enableStackdriverLogging;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSecuritySettings($securitySettings)
  {
    $this->securitySettings = $securitySettings;
  }
  public function getSecuritySettings()
  {
    return $this->securitySettings;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SpeechToTextSettings
   */
  public function setSpeechToTextSettings(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SpeechToTextSettings $speechToTextSettings)
  {
    $this->speechToTextSettings = $speechToTextSettings;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3SpeechToTextSettings
   */
  public function getSpeechToTextSettings()
  {
    return $this->speechToTextSettings;
  }
  public function setStartFlow($startFlow)
  {
    $this->startFlow = $startFlow;
  }
  public function getStartFlow()
  {
    return $this->startFlow;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
