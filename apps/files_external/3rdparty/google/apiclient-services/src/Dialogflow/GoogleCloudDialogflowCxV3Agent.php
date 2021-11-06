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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3Agent extends \Google\Collection
{
  protected $collection_key = 'supportedLanguageCodes';
  protected $advancedSettingsType = GoogleCloudDialogflowCxV3AdvancedSettings::class;
  protected $advancedSettingsDataType = '';
  public $avatarUri;
  public $defaultLanguageCode;
  public $description;
  public $displayName;
  public $enableSpellCorrection;
  public $enableStackdriverLogging;
  public $name;
  public $securitySettings;
  protected $speechToTextSettingsType = GoogleCloudDialogflowCxV3SpeechToTextSettings::class;
  protected $speechToTextSettingsDataType = '';
  public $startFlow;
  public $supportedLanguageCodes;
  public $timeZone;

  /**
   * @param GoogleCloudDialogflowCxV3AdvancedSettings
   */
  public function setAdvancedSettings(GoogleCloudDialogflowCxV3AdvancedSettings $advancedSettings)
  {
    $this->advancedSettings = $advancedSettings;
  }
  /**
   * @return GoogleCloudDialogflowCxV3AdvancedSettings
   */
  public function getAdvancedSettings()
  {
    return $this->advancedSettings;
  }
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
   * @param GoogleCloudDialogflowCxV3SpeechToTextSettings
   */
  public function setSpeechToTextSettings(GoogleCloudDialogflowCxV3SpeechToTextSettings $speechToTextSettings)
  {
    $this->speechToTextSettings = $speechToTextSettings;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SpeechToTextSettings
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
  public function setSupportedLanguageCodes($supportedLanguageCodes)
  {
    $this->supportedLanguageCodes = $supportedLanguageCodes;
  }
  public function getSupportedLanguageCodes()
  {
    return $this->supportedLanguageCodes;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Agent::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Agent');
