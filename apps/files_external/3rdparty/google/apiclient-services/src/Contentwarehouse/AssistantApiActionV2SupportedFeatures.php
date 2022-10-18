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

class AssistantApiActionV2SupportedFeatures extends \Google\Collection
{
  protected $collection_key = 'supportedActionType';
  /**
   * @var bool
   */
  public $expressUrlInSettingsResponseSupported;
  /**
   * @var bool
   */
  public $reconnectClientInputSupported;
  /**
   * @var bool
   */
  public $simpleActionV2PuntSupported;
  /**
   * @var string[]
   */
  public $supportedActionType;
  /**
   * @var bool
   */
  public $takeScreenshotSupported;
  /**
   * @var bool
   */
  public $voiceDelightImmersiveUiSupported;
  /**
   * @var bool
   */
  public $voiceDelightStickersSupported;
  /**
   * @var bool
   */
  public $voiceDelightSuggestionsSupported;

  /**
   * @param bool
   */
  public function setExpressUrlInSettingsResponseSupported($expressUrlInSettingsResponseSupported)
  {
    $this->expressUrlInSettingsResponseSupported = $expressUrlInSettingsResponseSupported;
  }
  /**
   * @return bool
   */
  public function getExpressUrlInSettingsResponseSupported()
  {
    return $this->expressUrlInSettingsResponseSupported;
  }
  /**
   * @param bool
   */
  public function setReconnectClientInputSupported($reconnectClientInputSupported)
  {
    $this->reconnectClientInputSupported = $reconnectClientInputSupported;
  }
  /**
   * @return bool
   */
  public function getReconnectClientInputSupported()
  {
    return $this->reconnectClientInputSupported;
  }
  /**
   * @param bool
   */
  public function setSimpleActionV2PuntSupported($simpleActionV2PuntSupported)
  {
    $this->simpleActionV2PuntSupported = $simpleActionV2PuntSupported;
  }
  /**
   * @return bool
   */
  public function getSimpleActionV2PuntSupported()
  {
    return $this->simpleActionV2PuntSupported;
  }
  /**
   * @param string[]
   */
  public function setSupportedActionType($supportedActionType)
  {
    $this->supportedActionType = $supportedActionType;
  }
  /**
   * @return string[]
   */
  public function getSupportedActionType()
  {
    return $this->supportedActionType;
  }
  /**
   * @param bool
   */
  public function setTakeScreenshotSupported($takeScreenshotSupported)
  {
    $this->takeScreenshotSupported = $takeScreenshotSupported;
  }
  /**
   * @return bool
   */
  public function getTakeScreenshotSupported()
  {
    return $this->takeScreenshotSupported;
  }
  /**
   * @param bool
   */
  public function setVoiceDelightImmersiveUiSupported($voiceDelightImmersiveUiSupported)
  {
    $this->voiceDelightImmersiveUiSupported = $voiceDelightImmersiveUiSupported;
  }
  /**
   * @return bool
   */
  public function getVoiceDelightImmersiveUiSupported()
  {
    return $this->voiceDelightImmersiveUiSupported;
  }
  /**
   * @param bool
   */
  public function setVoiceDelightStickersSupported($voiceDelightStickersSupported)
  {
    $this->voiceDelightStickersSupported = $voiceDelightStickersSupported;
  }
  /**
   * @return bool
   */
  public function getVoiceDelightStickersSupported()
  {
    return $this->voiceDelightStickersSupported;
  }
  /**
   * @param bool
   */
  public function setVoiceDelightSuggestionsSupported($voiceDelightSuggestionsSupported)
  {
    $this->voiceDelightSuggestionsSupported = $voiceDelightSuggestionsSupported;
  }
  /**
   * @return bool
   */
  public function getVoiceDelightSuggestionsSupported()
  {
    return $this->voiceDelightSuggestionsSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiActionV2SupportedFeatures::class, 'Google_Service_Contentwarehouse_AssistantApiActionV2SupportedFeatures');
