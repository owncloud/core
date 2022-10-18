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

class AssistantApiSettingsSpeechSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $continuedConversationEnabled;
  /**
   * @var string
   */
  public $deviceModelType;
  /**
   * @var bool
   */
  public $dspAvailable;
  /**
   * @var string
   */
  public $hotwordInNavigationEnabled;
  /**
   * @var string
   */
  public $hotwordSetting;
  /**
   * @var bool
   */
  public $lockscreenEnabled;
  /**
   * @var string
   */
  public $opaEligibilityState;
  /**
   * @var bool
   */
  public $opaEligible;
  /**
   * @var int
   */
  public $sdkVersion;
  /**
   * @var bool
   */
  public $speakerIdModelPresent;
  /**
   * @var bool
   */
  public $speakerIdRecognitionEnabled;
  /**
   * @var bool
   */
  public $trustedVoiceEnabled;
  /**
   * @var bool
   */
  public $unlockWithHotwordAvailable;
  /**
   * @var bool
   */
  public $userMigratedToDeclined;
  /**
   * @var string
   */
  public $voiceMatchSetting;

  /**
   * @param bool
   */
  public function setContinuedConversationEnabled($continuedConversationEnabled)
  {
    $this->continuedConversationEnabled = $continuedConversationEnabled;
  }
  /**
   * @return bool
   */
  public function getContinuedConversationEnabled()
  {
    return $this->continuedConversationEnabled;
  }
  /**
   * @param string
   */
  public function setDeviceModelType($deviceModelType)
  {
    $this->deviceModelType = $deviceModelType;
  }
  /**
   * @return string
   */
  public function getDeviceModelType()
  {
    return $this->deviceModelType;
  }
  /**
   * @param bool
   */
  public function setDspAvailable($dspAvailable)
  {
    $this->dspAvailable = $dspAvailable;
  }
  /**
   * @return bool
   */
  public function getDspAvailable()
  {
    return $this->dspAvailable;
  }
  /**
   * @param string
   */
  public function setHotwordInNavigationEnabled($hotwordInNavigationEnabled)
  {
    $this->hotwordInNavigationEnabled = $hotwordInNavigationEnabled;
  }
  /**
   * @return string
   */
  public function getHotwordInNavigationEnabled()
  {
    return $this->hotwordInNavigationEnabled;
  }
  /**
   * @param string
   */
  public function setHotwordSetting($hotwordSetting)
  {
    $this->hotwordSetting = $hotwordSetting;
  }
  /**
   * @return string
   */
  public function getHotwordSetting()
  {
    return $this->hotwordSetting;
  }
  /**
   * @param bool
   */
  public function setLockscreenEnabled($lockscreenEnabled)
  {
    $this->lockscreenEnabled = $lockscreenEnabled;
  }
  /**
   * @return bool
   */
  public function getLockscreenEnabled()
  {
    return $this->lockscreenEnabled;
  }
  /**
   * @param string
   */
  public function setOpaEligibilityState($opaEligibilityState)
  {
    $this->opaEligibilityState = $opaEligibilityState;
  }
  /**
   * @return string
   */
  public function getOpaEligibilityState()
  {
    return $this->opaEligibilityState;
  }
  /**
   * @param bool
   */
  public function setOpaEligible($opaEligible)
  {
    $this->opaEligible = $opaEligible;
  }
  /**
   * @return bool
   */
  public function getOpaEligible()
  {
    return $this->opaEligible;
  }
  /**
   * @param int
   */
  public function setSdkVersion($sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  /**
   * @return int
   */
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
  /**
   * @param bool
   */
  public function setSpeakerIdModelPresent($speakerIdModelPresent)
  {
    $this->speakerIdModelPresent = $speakerIdModelPresent;
  }
  /**
   * @return bool
   */
  public function getSpeakerIdModelPresent()
  {
    return $this->speakerIdModelPresent;
  }
  /**
   * @param bool
   */
  public function setSpeakerIdRecognitionEnabled($speakerIdRecognitionEnabled)
  {
    $this->speakerIdRecognitionEnabled = $speakerIdRecognitionEnabled;
  }
  /**
   * @return bool
   */
  public function getSpeakerIdRecognitionEnabled()
  {
    return $this->speakerIdRecognitionEnabled;
  }
  /**
   * @param bool
   */
  public function setTrustedVoiceEnabled($trustedVoiceEnabled)
  {
    $this->trustedVoiceEnabled = $trustedVoiceEnabled;
  }
  /**
   * @return bool
   */
  public function getTrustedVoiceEnabled()
  {
    return $this->trustedVoiceEnabled;
  }
  /**
   * @param bool
   */
  public function setUnlockWithHotwordAvailable($unlockWithHotwordAvailable)
  {
    $this->unlockWithHotwordAvailable = $unlockWithHotwordAvailable;
  }
  /**
   * @return bool
   */
  public function getUnlockWithHotwordAvailable()
  {
    return $this->unlockWithHotwordAvailable;
  }
  /**
   * @param bool
   */
  public function setUserMigratedToDeclined($userMigratedToDeclined)
  {
    $this->userMigratedToDeclined = $userMigratedToDeclined;
  }
  /**
   * @return bool
   */
  public function getUserMigratedToDeclined()
  {
    return $this->userMigratedToDeclined;
  }
  /**
   * @param string
   */
  public function setVoiceMatchSetting($voiceMatchSetting)
  {
    $this->voiceMatchSetting = $voiceMatchSetting;
  }
  /**
   * @return string
   */
  public function getVoiceMatchSetting()
  {
    return $this->voiceMatchSetting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsSpeechSettings::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsSpeechSettings');
