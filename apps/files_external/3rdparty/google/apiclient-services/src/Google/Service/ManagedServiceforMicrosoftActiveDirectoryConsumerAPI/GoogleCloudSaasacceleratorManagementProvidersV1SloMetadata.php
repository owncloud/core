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

class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloMetadata extends Google_Collection
{
  protected $collection_key = 'nodes';
  protected $eligibilityType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloEligibility';
  protected $eligibilityDataType = '';
  protected $exclusionsType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloExclusion';
  protected $exclusionsDataType = 'array';
  protected $nodesType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1NodeSloMetadata';
  protected $nodesDataType = 'array';
  protected $perSliEligibilityType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1PerSliSloEligibility';
  protected $perSliEligibilityDataType = '';
  public $tier;

  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloEligibility
   */
  public function setEligibility(Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloEligibility $eligibility)
  {
    $this->eligibility = $eligibility;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloEligibility
   */
  public function getEligibility()
  {
    return $this->eligibility;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloExclusion[]
   */
  public function setExclusions($exclusions)
  {
    $this->exclusions = $exclusions;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloExclusion[]
   */
  public function getExclusions()
  {
    return $this->exclusions;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1NodeSloMetadata[]
   */
  public function setNodes($nodes)
  {
    $this->nodes = $nodes;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1NodeSloMetadata[]
   */
  public function getNodes()
  {
    return $this->nodes;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1PerSliSloEligibility
   */
  public function setPerSliEligibility(Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1PerSliSloEligibility $perSliEligibility)
  {
    $this->perSliEligibility = $perSliEligibility;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1PerSliSloEligibility
   */
  public function getPerSliEligibility()
  {
    return $this->perSliEligibility;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}
