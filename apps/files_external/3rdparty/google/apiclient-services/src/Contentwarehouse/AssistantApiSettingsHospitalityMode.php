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

namespace Google\Service\Contentwarehouse;

class AssistantApiSettingsHospitalityMode extends \Google\Collection
{
  protected $collection_key = 'promotedLanguages';
  /**
   * @var string[]
   */
  public $aogContextId;
  /**
   * @var string
   */
  public $aogInvocationPhrase;
  protected $brandingType = AssistantApiSettingsHospitalityModeBranding::class;
  protected $brandingDataType = '';
  protected $cardSettingsType = AssistantApiSettingsHospitalityCardSettings::class;
  protected $cardSettingsDataType = '';
  protected $deviceClearRequestType = AssistantApiTimestamp::class;
  protected $deviceClearRequestDataType = '';
  /**
   * @var string
   */
  public $dialogTtlOverrideMicros;
  /**
   * @var string
   */
  public $enterpriseId;
  /**
   * @var bool
   */
  public $hospitalityModeEnabled;
  protected $lastDeviceClearType = AssistantApiTimestamp::class;
  protected $lastDeviceClearDataType = '';
  protected $lastModifiedTimestampType = AssistantApiTimestamp::class;
  protected $lastModifiedTimestampDataType = '';
  protected $lastWelcomedType = AssistantApiTimestamp::class;
  protected $lastWelcomedDataType = '';
  /**
   * @var bool
   */
  public $manualResetRequired;
  /**
   * @var string[]
   */
  public $promotedLanguages;
  /**
   * @var string
   */
  public $type;
  /**
   * @var bool
   */
  public $verbalResetSupported;
  protected $welcomeRequestType = AssistantApiTimestamp::class;
  protected $welcomeRequestDataType = '';

  /**
   * @param string[]
   */
  public function setAogContextId($aogContextId)
  {
    $this->aogContextId = $aogContextId;
  }
  /**
   * @return string[]
   */
  public function getAogContextId()
  {
    return $this->aogContextId;
  }
  /**
   * @param string
   */
  public function setAogInvocationPhrase($aogInvocationPhrase)
  {
    $this->aogInvocationPhrase = $aogInvocationPhrase;
  }
  /**
   * @return string
   */
  public function getAogInvocationPhrase()
  {
    return $this->aogInvocationPhrase;
  }
  /**
   * @param AssistantApiSettingsHospitalityModeBranding
   */
  public function setBranding(AssistantApiSettingsHospitalityModeBranding $branding)
  {
    $this->branding = $branding;
  }
  /**
   * @return AssistantApiSettingsHospitalityModeBranding
   */
  public function getBranding()
  {
    return $this->branding;
  }
  /**
   * @param AssistantApiSettingsHospitalityCardSettings
   */
  public function setCardSettings(AssistantApiSettingsHospitalityCardSettings $cardSettings)
  {
    $this->cardSettings = $cardSettings;
  }
  /**
   * @return AssistantApiSettingsHospitalityCardSettings
   */
  public function getCardSettings()
  {
    return $this->cardSettings;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setDeviceClearRequest(AssistantApiTimestamp $deviceClearRequest)
  {
    $this->deviceClearRequest = $deviceClearRequest;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getDeviceClearRequest()
  {
    return $this->deviceClearRequest;
  }
  /**
   * @param string
   */
  public function setDialogTtlOverrideMicros($dialogTtlOverrideMicros)
  {
    $this->dialogTtlOverrideMicros = $dialogTtlOverrideMicros;
  }
  /**
   * @return string
   */
  public function getDialogTtlOverrideMicros()
  {
    return $this->dialogTtlOverrideMicros;
  }
  /**
   * @param string
   */
  public function setEnterpriseId($enterpriseId)
  {
    $this->enterpriseId = $enterpriseId;
  }
  /**
   * @return string
   */
  public function getEnterpriseId()
  {
    return $this->enterpriseId;
  }
  /**
   * @param bool
   */
  public function setHospitalityModeEnabled($hospitalityModeEnabled)
  {
    $this->hospitalityModeEnabled = $hospitalityModeEnabled;
  }
  /**
   * @return bool
   */
  public function getHospitalityModeEnabled()
  {
    return $this->hospitalityModeEnabled;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setLastDeviceClear(AssistantApiTimestamp $lastDeviceClear)
  {
    $this->lastDeviceClear = $lastDeviceClear;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getLastDeviceClear()
  {
    return $this->lastDeviceClear;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setLastModifiedTimestamp(AssistantApiTimestamp $lastModifiedTimestamp)
  {
    $this->lastModifiedTimestamp = $lastModifiedTimestamp;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getLastModifiedTimestamp()
  {
    return $this->lastModifiedTimestamp;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setLastWelcomed(AssistantApiTimestamp $lastWelcomed)
  {
    $this->lastWelcomed = $lastWelcomed;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getLastWelcomed()
  {
    return $this->lastWelcomed;
  }
  /**
   * @param bool
   */
  public function setManualResetRequired($manualResetRequired)
  {
    $this->manualResetRequired = $manualResetRequired;
  }
  /**
   * @return bool
   */
  public function getManualResetRequired()
  {
    return $this->manualResetRequired;
  }
  /**
   * @param string[]
   */
  public function setPromotedLanguages($promotedLanguages)
  {
    $this->promotedLanguages = $promotedLanguages;
  }
  /**
   * @return string[]
   */
  public function getPromotedLanguages()
  {
    return $this->promotedLanguages;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param bool
   */
  public function setVerbalResetSupported($verbalResetSupported)
  {
    $this->verbalResetSupported = $verbalResetSupported;
  }
  /**
   * @return bool
   */
  public function getVerbalResetSupported()
  {
    return $this->verbalResetSupported;
  }
  /**
   * @param AssistantApiTimestamp
   */
  public function setWelcomeRequest(AssistantApiTimestamp $welcomeRequest)
  {
    $this->welcomeRequest = $welcomeRequest;
  }
  /**
   * @return AssistantApiTimestamp
   */
  public function getWelcomeRequest()
  {
    return $this->welcomeRequest;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsHospitalityMode::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsHospitalityMode');
