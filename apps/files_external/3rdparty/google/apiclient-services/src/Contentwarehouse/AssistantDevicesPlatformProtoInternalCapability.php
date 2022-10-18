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

class AssistantDevicesPlatformProtoInternalCapability extends \Google\Collection
{
  protected $collection_key = 'allowedAssistantSdkAuthProjectIds';
  /**
   * @var string[]
   */
  public $allowedAssistantSdkAuthProjectIds;
  /**
   * @var bool
   */
  public $appCapabilitiesFromDeviceInstallApps;
  protected $cloudDeviceActionEndpointType = AssistantDevicesPlatformProtoCloudEndpoint::class;
  protected $cloudDeviceActionEndpointDataType = '';
  /**
   * @var bool
   */
  public $deviceActionsEligibleForHighConfidence;
  /**
   * @var bool
   */
  public $forceSignIn;
  /**
   * @var bool
   */
  public $forceThirdPartyDeviceIdForDeviceLookup;
  /**
   * @var bool
   */
  public $forceTransactionsAuthentication;
  /**
   * @var bool
   */
  public $hasCustomSearchResultsRendering;
  /**
   * @var string
   */
  public $overrideProjectIdForDeviceLookup;
  protected $stadiaAssistantConfigType = AssistantDevicesPlatformProtoInternalCapabilityStadiaAssistantConfig::class;
  protected $stadiaAssistantConfigDataType = '';
  /**
   * @var bool
   */
  public $telephoneAttribution;

  /**
   * @param string[]
   */
  public function setAllowedAssistantSdkAuthProjectIds($allowedAssistantSdkAuthProjectIds)
  {
    $this->allowedAssistantSdkAuthProjectIds = $allowedAssistantSdkAuthProjectIds;
  }
  /**
   * @return string[]
   */
  public function getAllowedAssistantSdkAuthProjectIds()
  {
    return $this->allowedAssistantSdkAuthProjectIds;
  }
  /**
   * @param bool
   */
  public function setAppCapabilitiesFromDeviceInstallApps($appCapabilitiesFromDeviceInstallApps)
  {
    $this->appCapabilitiesFromDeviceInstallApps = $appCapabilitiesFromDeviceInstallApps;
  }
  /**
   * @return bool
   */
  public function getAppCapabilitiesFromDeviceInstallApps()
  {
    return $this->appCapabilitiesFromDeviceInstallApps;
  }
  /**
   * @param AssistantDevicesPlatformProtoCloudEndpoint
   */
  public function setCloudDeviceActionEndpoint(AssistantDevicesPlatformProtoCloudEndpoint $cloudDeviceActionEndpoint)
  {
    $this->cloudDeviceActionEndpoint = $cloudDeviceActionEndpoint;
  }
  /**
   * @return AssistantDevicesPlatformProtoCloudEndpoint
   */
  public function getCloudDeviceActionEndpoint()
  {
    return $this->cloudDeviceActionEndpoint;
  }
  /**
   * @param bool
   */
  public function setDeviceActionsEligibleForHighConfidence($deviceActionsEligibleForHighConfidence)
  {
    $this->deviceActionsEligibleForHighConfidence = $deviceActionsEligibleForHighConfidence;
  }
  /**
   * @return bool
   */
  public function getDeviceActionsEligibleForHighConfidence()
  {
    return $this->deviceActionsEligibleForHighConfidence;
  }
  /**
   * @param bool
   */
  public function setForceSignIn($forceSignIn)
  {
    $this->forceSignIn = $forceSignIn;
  }
  /**
   * @return bool
   */
  public function getForceSignIn()
  {
    return $this->forceSignIn;
  }
  /**
   * @param bool
   */
  public function setForceThirdPartyDeviceIdForDeviceLookup($forceThirdPartyDeviceIdForDeviceLookup)
  {
    $this->forceThirdPartyDeviceIdForDeviceLookup = $forceThirdPartyDeviceIdForDeviceLookup;
  }
  /**
   * @return bool
   */
  public function getForceThirdPartyDeviceIdForDeviceLookup()
  {
    return $this->forceThirdPartyDeviceIdForDeviceLookup;
  }
  /**
   * @param bool
   */
  public function setForceTransactionsAuthentication($forceTransactionsAuthentication)
  {
    $this->forceTransactionsAuthentication = $forceTransactionsAuthentication;
  }
  /**
   * @return bool
   */
  public function getForceTransactionsAuthentication()
  {
    return $this->forceTransactionsAuthentication;
  }
  /**
   * @param bool
   */
  public function setHasCustomSearchResultsRendering($hasCustomSearchResultsRendering)
  {
    $this->hasCustomSearchResultsRendering = $hasCustomSearchResultsRendering;
  }
  /**
   * @return bool
   */
  public function getHasCustomSearchResultsRendering()
  {
    return $this->hasCustomSearchResultsRendering;
  }
  /**
   * @param string
   */
  public function setOverrideProjectIdForDeviceLookup($overrideProjectIdForDeviceLookup)
  {
    $this->overrideProjectIdForDeviceLookup = $overrideProjectIdForDeviceLookup;
  }
  /**
   * @return string
   */
  public function getOverrideProjectIdForDeviceLookup()
  {
    return $this->overrideProjectIdForDeviceLookup;
  }
  /**
   * @param AssistantDevicesPlatformProtoInternalCapabilityStadiaAssistantConfig
   */
  public function setStadiaAssistantConfig(AssistantDevicesPlatformProtoInternalCapabilityStadiaAssistantConfig $stadiaAssistantConfig)
  {
    $this->stadiaAssistantConfig = $stadiaAssistantConfig;
  }
  /**
   * @return AssistantDevicesPlatformProtoInternalCapabilityStadiaAssistantConfig
   */
  public function getStadiaAssistantConfig()
  {
    return $this->stadiaAssistantConfig;
  }
  /**
   * @param bool
   */
  public function setTelephoneAttribution($telephoneAttribution)
  {
    $this->telephoneAttribution = $telephoneAttribution;
  }
  /**
   * @return bool
   */
  public function getTelephoneAttribution()
  {
    return $this->telephoneAttribution;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoInternalCapability::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoInternalCapability');
