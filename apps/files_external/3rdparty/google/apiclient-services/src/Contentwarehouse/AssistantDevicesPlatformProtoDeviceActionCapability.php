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

class AssistantDevicesPlatformProtoDeviceActionCapability extends \Google\Collection
{
  protected $collection_key = 'traits';
  /**
   * @var bool
   */
  public $assistantDeviceInRoomOptOut;
  /**
   * @var string
   */
  public $builtInIntentMode;
  /**
   * @var string
   */
  public $customIntentMode;
  protected $defaultExecutionConfigType = AssistantDevicesPlatformProtoExecutionConfig::class;
  protected $defaultExecutionConfigDataType = '';
  protected $inlinedActionCapabilityType = AssistantDevicesPlatformProtoInlinedActionCapability::class;
  protected $inlinedActionCapabilityDataType = '';
  protected $intentsType = AssistantDevicesPlatformProtoIntent::class;
  protected $intentsDataType = 'array';
  protected $providedDataType = AssistantDevicesPlatformProtoProvidedData::class;
  protected $providedDataDataType = 'array';
  /**
   * @var string[]
   */
  public $traits;
  protected $understandingConfigType = AssistantDevicesPlatformProtoUnderstandingConfig::class;
  protected $understandingConfigDataType = '';

  /**
   * @param bool
   */
  public function setAssistantDeviceInRoomOptOut($assistantDeviceInRoomOptOut)
  {
    $this->assistantDeviceInRoomOptOut = $assistantDeviceInRoomOptOut;
  }
  /**
   * @return bool
   */
  public function getAssistantDeviceInRoomOptOut()
  {
    return $this->assistantDeviceInRoomOptOut;
  }
  /**
   * @param string
   */
  public function setBuiltInIntentMode($builtInIntentMode)
  {
    $this->builtInIntentMode = $builtInIntentMode;
  }
  /**
   * @return string
   */
  public function getBuiltInIntentMode()
  {
    return $this->builtInIntentMode;
  }
  /**
   * @param string
   */
  public function setCustomIntentMode($customIntentMode)
  {
    $this->customIntentMode = $customIntentMode;
  }
  /**
   * @return string
   */
  public function getCustomIntentMode()
  {
    return $this->customIntentMode;
  }
  /**
   * @param AssistantDevicesPlatformProtoExecutionConfig
   */
  public function setDefaultExecutionConfig(AssistantDevicesPlatformProtoExecutionConfig $defaultExecutionConfig)
  {
    $this->defaultExecutionConfig = $defaultExecutionConfig;
  }
  /**
   * @return AssistantDevicesPlatformProtoExecutionConfig
   */
  public function getDefaultExecutionConfig()
  {
    return $this->defaultExecutionConfig;
  }
  /**
   * @param AssistantDevicesPlatformProtoInlinedActionCapability
   */
  public function setInlinedActionCapability(AssistantDevicesPlatformProtoInlinedActionCapability $inlinedActionCapability)
  {
    $this->inlinedActionCapability = $inlinedActionCapability;
  }
  /**
   * @return AssistantDevicesPlatformProtoInlinedActionCapability
   */
  public function getInlinedActionCapability()
  {
    return $this->inlinedActionCapability;
  }
  /**
   * @param AssistantDevicesPlatformProtoIntent[]
   */
  public function setIntents($intents)
  {
    $this->intents = $intents;
  }
  /**
   * @return AssistantDevicesPlatformProtoIntent[]
   */
  public function getIntents()
  {
    return $this->intents;
  }
  /**
   * @param AssistantDevicesPlatformProtoProvidedData[]
   */
  public function setProvidedData($providedData)
  {
    $this->providedData = $providedData;
  }
  /**
   * @return AssistantDevicesPlatformProtoProvidedData[]
   */
  public function getProvidedData()
  {
    return $this->providedData;
  }
  /**
   * @param string[]
   */
  public function setTraits($traits)
  {
    $this->traits = $traits;
  }
  /**
   * @return string[]
   */
  public function getTraits()
  {
    return $this->traits;
  }
  /**
   * @param AssistantDevicesPlatformProtoUnderstandingConfig
   */
  public function setUnderstandingConfig(AssistantDevicesPlatformProtoUnderstandingConfig $understandingConfig)
  {
    $this->understandingConfig = $understandingConfig;
  }
  /**
   * @return AssistantDevicesPlatformProtoUnderstandingConfig
   */
  public function getUnderstandingConfig()
  {
    return $this->understandingConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoDeviceActionCapability::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoDeviceActionCapability');
