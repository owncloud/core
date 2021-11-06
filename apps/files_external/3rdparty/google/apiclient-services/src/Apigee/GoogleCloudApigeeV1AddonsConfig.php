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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1AddonsConfig extends \Google\Model
{
  protected $advancedApiOpsConfigType = GoogleCloudApigeeV1AdvancedApiOpsConfig::class;
  protected $advancedApiOpsConfigDataType = '';
  protected $connectorsPlatformConfigType = GoogleCloudApigeeV1ConnectorsPlatformConfig::class;
  protected $connectorsPlatformConfigDataType = '';
  protected $integrationConfigType = GoogleCloudApigeeV1IntegrationConfig::class;
  protected $integrationConfigDataType = '';
  protected $monetizationConfigType = GoogleCloudApigeeV1MonetizationConfig::class;
  protected $monetizationConfigDataType = '';

  /**
   * @param GoogleCloudApigeeV1AdvancedApiOpsConfig
   */
  public function setAdvancedApiOpsConfig(GoogleCloudApigeeV1AdvancedApiOpsConfig $advancedApiOpsConfig)
  {
    $this->advancedApiOpsConfig = $advancedApiOpsConfig;
  }
  /**
   * @return GoogleCloudApigeeV1AdvancedApiOpsConfig
   */
  public function getAdvancedApiOpsConfig()
  {
    return $this->advancedApiOpsConfig;
  }
  /**
   * @param GoogleCloudApigeeV1ConnectorsPlatformConfig
   */
  public function setConnectorsPlatformConfig(GoogleCloudApigeeV1ConnectorsPlatformConfig $connectorsPlatformConfig)
  {
    $this->connectorsPlatformConfig = $connectorsPlatformConfig;
  }
  /**
   * @return GoogleCloudApigeeV1ConnectorsPlatformConfig
   */
  public function getConnectorsPlatformConfig()
  {
    return $this->connectorsPlatformConfig;
  }
  /**
   * @param GoogleCloudApigeeV1IntegrationConfig
   */
  public function setIntegrationConfig(GoogleCloudApigeeV1IntegrationConfig $integrationConfig)
  {
    $this->integrationConfig = $integrationConfig;
  }
  /**
   * @return GoogleCloudApigeeV1IntegrationConfig
   */
  public function getIntegrationConfig()
  {
    return $this->integrationConfig;
  }
  /**
   * @param GoogleCloudApigeeV1MonetizationConfig
   */
  public function setMonetizationConfig(GoogleCloudApigeeV1MonetizationConfig $monetizationConfig)
  {
    $this->monetizationConfig = $monetizationConfig;
  }
  /**
   * @return GoogleCloudApigeeV1MonetizationConfig
   */
  public function getMonetizationConfig()
  {
    return $this->monetizationConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1AddonsConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1AddonsConfig');
