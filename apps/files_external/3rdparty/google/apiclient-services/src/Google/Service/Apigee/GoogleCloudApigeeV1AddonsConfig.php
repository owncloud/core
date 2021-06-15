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

class Google_Service_Apigee_GoogleCloudApigeeV1AddonsConfig extends Google_Model
{
  protected $advancedApiOpsConfigType = 'Google_Service_Apigee_GoogleCloudApigeeV1AdvancedApiOpsConfig';
  protected $advancedApiOpsConfigDataType = '';
  protected $integrationConfigType = 'Google_Service_Apigee_GoogleCloudApigeeV1IntegrationConfig';
  protected $integrationConfigDataType = '';
  protected $monetizationConfigType = 'Google_Service_Apigee_GoogleCloudApigeeV1MonetizationConfig';
  protected $monetizationConfigDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AdvancedApiOpsConfig
   */
  public function setAdvancedApiOpsConfig(Google_Service_Apigee_GoogleCloudApigeeV1AdvancedApiOpsConfig $advancedApiOpsConfig)
  {
    $this->advancedApiOpsConfig = $advancedApiOpsConfig;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AdvancedApiOpsConfig
   */
  public function getAdvancedApiOpsConfig()
  {
    return $this->advancedApiOpsConfig;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1IntegrationConfig
   */
  public function setIntegrationConfig(Google_Service_Apigee_GoogleCloudApigeeV1IntegrationConfig $integrationConfig)
  {
    $this->integrationConfig = $integrationConfig;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1IntegrationConfig
   */
  public function getIntegrationConfig()
  {
    return $this->integrationConfig;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1MonetizationConfig
   */
  public function setMonetizationConfig(Google_Service_Apigee_GoogleCloudApigeeV1MonetizationConfig $monetizationConfig)
  {
    $this->monetizationConfig = $monetizationConfig;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1MonetizationConfig
   */
  public function getMonetizationConfig()
  {
    return $this->monetizationConfig;
  }
}
