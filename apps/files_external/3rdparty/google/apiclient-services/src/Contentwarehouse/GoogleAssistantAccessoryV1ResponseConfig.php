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

class GoogleAssistantAccessoryV1ResponseConfig extends \Google\Model
{
  protected $audioOutConfigType = GoogleAssistantAccessoryV1AudioOutConfig::class;
  protected $audioOutConfigDataType = '';
  protected $deviceConfigType = GoogleAssistantAccessoryV1DeviceConfig::class;
  protected $deviceConfigDataType = '';
  /**
   * @var string
   */
  public $deviceInteraction;
  protected $deviceStateType = GoogleAssistantAccessoryV1DeviceState::class;
  protected $deviceStateDataType = '';
  /**
   * @var int
   */
  public $initialAudioBytes;
  /**
   * @var bool
   */
  public $isNewConversation;
  /**
   * @var int
   */
  public $outputSampleRateHz;
  /**
   * @var string
   */
  public $responseType;
  protected $screenOutConfigType = GoogleAssistantAccessoryV1ScreenOutConfig::class;
  protected $screenOutConfigDataType = '';

  /**
   * @param GoogleAssistantAccessoryV1AudioOutConfig
   */
  public function setAudioOutConfig(GoogleAssistantAccessoryV1AudioOutConfig $audioOutConfig)
  {
    $this->audioOutConfig = $audioOutConfig;
  }
  /**
   * @return GoogleAssistantAccessoryV1AudioOutConfig
   */
  public function getAudioOutConfig()
  {
    return $this->audioOutConfig;
  }
  /**
   * @param GoogleAssistantAccessoryV1DeviceConfig
   */
  public function setDeviceConfig(GoogleAssistantAccessoryV1DeviceConfig $deviceConfig)
  {
    $this->deviceConfig = $deviceConfig;
  }
  /**
   * @return GoogleAssistantAccessoryV1DeviceConfig
   */
  public function getDeviceConfig()
  {
    return $this->deviceConfig;
  }
  /**
   * @param string
   */
  public function setDeviceInteraction($deviceInteraction)
  {
    $this->deviceInteraction = $deviceInteraction;
  }
  /**
   * @return string
   */
  public function getDeviceInteraction()
  {
    return $this->deviceInteraction;
  }
  /**
   * @param GoogleAssistantAccessoryV1DeviceState
   */
  public function setDeviceState(GoogleAssistantAccessoryV1DeviceState $deviceState)
  {
    $this->deviceState = $deviceState;
  }
  /**
   * @return GoogleAssistantAccessoryV1DeviceState
   */
  public function getDeviceState()
  {
    return $this->deviceState;
  }
  /**
   * @param int
   */
  public function setInitialAudioBytes($initialAudioBytes)
  {
    $this->initialAudioBytes = $initialAudioBytes;
  }
  /**
   * @return int
   */
  public function getInitialAudioBytes()
  {
    return $this->initialAudioBytes;
  }
  /**
   * @param bool
   */
  public function setIsNewConversation($isNewConversation)
  {
    $this->isNewConversation = $isNewConversation;
  }
  /**
   * @return bool
   */
  public function getIsNewConversation()
  {
    return $this->isNewConversation;
  }
  /**
   * @param int
   */
  public function setOutputSampleRateHz($outputSampleRateHz)
  {
    $this->outputSampleRateHz = $outputSampleRateHz;
  }
  /**
   * @return int
   */
  public function getOutputSampleRateHz()
  {
    return $this->outputSampleRateHz;
  }
  /**
   * @param string
   */
  public function setResponseType($responseType)
  {
    $this->responseType = $responseType;
  }
  /**
   * @return string
   */
  public function getResponseType()
  {
    return $this->responseType;
  }
  /**
   * @param GoogleAssistantAccessoryV1ScreenOutConfig
   */
  public function setScreenOutConfig(GoogleAssistantAccessoryV1ScreenOutConfig $screenOutConfig)
  {
    $this->screenOutConfig = $screenOutConfig;
  }
  /**
   * @return GoogleAssistantAccessoryV1ScreenOutConfig
   */
  public function getScreenOutConfig()
  {
    return $this->screenOutConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantAccessoryV1ResponseConfig::class, 'Google_Service_Contentwarehouse_GoogleAssistantAccessoryV1ResponseConfig');
