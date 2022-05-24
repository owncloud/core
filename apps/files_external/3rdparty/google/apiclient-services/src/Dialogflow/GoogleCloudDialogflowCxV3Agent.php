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
  /**
   * @var string
   */
  public $avatarUri;
  /**
   * @var string
   */
  public $defaultLanguageCode;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $enableSpellCorrection;
  /**
   * @var bool
   */
  public $enableStackdriverLogging;
  /**
   * @var bool
   */
  public $locked;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $securitySettings;
  protected $speechToTextSettingsType = GoogleCloudDialogflowCxV3SpeechToTextSettings::class;
  protected $speechToTextSettingsDataType = '';
  /**
   * @var string
   */
  public $startFlow;
  /**
   * @var string[]
   */
  public $supportedLanguageCodes;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setAvatarUri($avatarUri)
  {
    $this->avatarUri = $avatarUri;
  }
  /**
   * @return string
   */
  public function getAvatarUri()
  {
    return $this->avatarUri;
  }
  /**
   * @param string
   */
  public function setDefaultLanguageCode($defaultLanguageCode)
  {
    $this->defaultLanguageCode = $defaultLanguageCode;
  }
  /**
   * @return string
   */
  public function getDefaultLanguageCode()
  {
    return $this->defaultLanguageCode;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
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
   * @param bool
   */
  public function setEnableSpellCorrection($enableSpellCorrection)
  {
    $this->enableSpellCorrection = $enableSpellCorrection;
  }
  /**
   * @return bool
   */
  public function getEnableSpellCorrection()
  {
    return $this->enableSpellCorrection;
  }
  /**
   * @param bool
   */
  public function setEnableStackdriverLogging($enableStackdriverLogging)
  {
    $this->enableStackdriverLogging = $enableStackdriverLogging;
  }
  /**
   * @return bool
   */
  public function getEnableStackdriverLogging()
  {
    return $this->enableStackdriverLogging;
  }
  /**
   * @param bool
   */
  public function setLocked($locked)
  {
    $this->locked = $locked;
  }
  /**
   * @return bool
   */
  public function getLocked()
  {
    return $this->locked;
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
  /**
   * @param string
   */
  public function setSecuritySettings($securitySettings)
  {
    $this->securitySettings = $securitySettings;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setStartFlow($startFlow)
  {
    $this->startFlow = $startFlow;
  }
  /**
   * @return string
   */
  public function getStartFlow()
  {
    return $this->startFlow;
  }
  /**
   * @param string[]
   */
  public function setSupportedLanguageCodes($supportedLanguageCodes)
  {
    $this->supportedLanguageCodes = $supportedLanguageCodes;
  }
  /**
   * @return string[]
   */
  public function getSupportedLanguageCodes()
  {
    return $this->supportedLanguageCodes;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Agent::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Agent');
