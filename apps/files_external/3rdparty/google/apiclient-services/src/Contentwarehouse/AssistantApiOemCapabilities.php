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

class AssistantApiOemCapabilities extends \Google\Model
{
  protected $cloudCapabilityType = AssistantDevicesPlatformProtoCloudCapability::class;
  protected $cloudCapabilityDataType = '';
  /**
   * @var array[]
   */
  public $cloudDeviceCapabilities;
  /**
   * @var string
   */
  public $deviceModelId;
  /**
   * @var string
   */
  public $deviceModelRevisionId;
  /**
   * @var string
   */
  public $deviceSpecificData;
  protected $internalCapabilityType = AssistantDevicesPlatformProtoInternalCapability::class;
  protected $internalCapabilityDataType = '';
  protected $thirdPartyActionConfigType = AssistantApiThirdPartyActionConfig::class;
  protected $thirdPartyActionConfigDataType = '';

  /**
   * @param AssistantDevicesPlatformProtoCloudCapability
   */
  public function setCloudCapability(AssistantDevicesPlatformProtoCloudCapability $cloudCapability)
  {
    $this->cloudCapability = $cloudCapability;
  }
  /**
   * @return AssistantDevicesPlatformProtoCloudCapability
   */
  public function getCloudCapability()
  {
    return $this->cloudCapability;
  }
  /**
   * @param array[]
   */
  public function setCloudDeviceCapabilities($cloudDeviceCapabilities)
  {
    $this->cloudDeviceCapabilities = $cloudDeviceCapabilities;
  }
  /**
   * @return array[]
   */
  public function getCloudDeviceCapabilities()
  {
    return $this->cloudDeviceCapabilities;
  }
  /**
   * @param string
   */
  public function setDeviceModelId($deviceModelId)
  {
    $this->deviceModelId = $deviceModelId;
  }
  /**
   * @return string
   */
  public function getDeviceModelId()
  {
    return $this->deviceModelId;
  }
  /**
   * @param string
   */
  public function setDeviceModelRevisionId($deviceModelRevisionId)
  {
    $this->deviceModelRevisionId = $deviceModelRevisionId;
  }
  /**
   * @return string
   */
  public function getDeviceModelRevisionId()
  {
    return $this->deviceModelRevisionId;
  }
  /**
   * @param string
   */
  public function setDeviceSpecificData($deviceSpecificData)
  {
    $this->deviceSpecificData = $deviceSpecificData;
  }
  /**
   * @return string
   */
  public function getDeviceSpecificData()
  {
    return $this->deviceSpecificData;
  }
  /**
   * @param AssistantDevicesPlatformProtoInternalCapability
   */
  public function setInternalCapability(AssistantDevicesPlatformProtoInternalCapability $internalCapability)
  {
    $this->internalCapability = $internalCapability;
  }
  /**
   * @return AssistantDevicesPlatformProtoInternalCapability
   */
  public function getInternalCapability()
  {
    return $this->internalCapability;
  }
  /**
   * @param AssistantApiThirdPartyActionConfig
   */
  public function setThirdPartyActionConfig(AssistantApiThirdPartyActionConfig $thirdPartyActionConfig)
  {
    $this->thirdPartyActionConfig = $thirdPartyActionConfig;
  }
  /**
   * @return AssistantApiThirdPartyActionConfig
   */
  public function getThirdPartyActionConfig()
  {
    return $this->thirdPartyActionConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiOemCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiOemCapabilities');
