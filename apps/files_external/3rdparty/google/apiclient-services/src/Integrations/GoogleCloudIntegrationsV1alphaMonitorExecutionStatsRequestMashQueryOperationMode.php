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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode extends \Google\Model
{
  protected $joinConfigType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeJoinConfig::class;
  protected $joinConfigDataType = '';
  /**
   * @var string
   */
  public $operationType;
  protected $unionConfigType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeUnionConfig::class;
  protected $unionConfigDataType = '';

  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeJoinConfig
   */
  public function setJoinConfig(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeJoinConfig $joinConfig)
  {
    $this->joinConfig = $joinConfig;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeJoinConfig
   */
  public function getJoinConfig()
  {
    return $this->joinConfig;
  }
  /**
   * @param string
   */
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  /**
   * @return string
   */
  public function getOperationType()
  {
    return $this->operationType;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeUnionConfig
   */
  public function setUnionConfig(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeUnionConfig $unionConfig)
  {
    $this->unionConfig = $unionConfig;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationModeUnionConfig
   */
  public function getUnionConfig()
  {
    return $this->unionConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode');
