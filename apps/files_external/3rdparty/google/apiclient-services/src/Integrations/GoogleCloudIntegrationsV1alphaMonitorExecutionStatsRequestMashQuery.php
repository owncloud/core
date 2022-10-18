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

class GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery extends \Google\Model
{
  protected $firstQueryType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent::class;
  protected $firstQueryDataType = '';
  protected $operationModeType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode::class;
  protected $operationModeDataType = '';
  protected $secondQueryType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent::class;
  protected $secondQueryDataType = '';

  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent
   */
  public function setFirstQuery(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent $firstQuery)
  {
    $this->firstQuery = $firstQuery;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent
   */
  public function getFirstQuery()
  {
    return $this->firstQuery;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode
   */
  public function setOperationMode(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode $operationMode)
  {
    $this->operationMode = $operationMode;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryOperationMode
   */
  public function getOperationMode()
  {
    return $this->operationMode;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent
   */
  public function setSecondQuery(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent $secondQuery)
  {
    $this->secondQuery = $secondQuery;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent
   */
  public function getSecondQuery()
  {
    return $this->secondQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery');
