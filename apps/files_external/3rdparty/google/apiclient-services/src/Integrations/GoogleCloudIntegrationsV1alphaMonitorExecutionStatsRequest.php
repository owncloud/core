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

class GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $endTime;
  protected $mashQueryType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery::class;
  protected $mashQueryDataType = '';
  /**
   * @var bool
   */
  public $metricFieldTable;
  /**
   * @var string
   */
  public $outputPeriod;
  /**
   * @var string
   */
  public $responseTemplate;

  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery
   */
  public function setMashQuery(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery $mashQuery)
  {
    $this->mashQuery = $mashQuery;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQuery
   */
  public function getMashQuery()
  {
    return $this->mashQuery;
  }
  /**
   * @param bool
   */
  public function setMetricFieldTable($metricFieldTable)
  {
    $this->metricFieldTable = $metricFieldTable;
  }
  /**
   * @return bool
   */
  public function getMetricFieldTable()
  {
    return $this->metricFieldTable;
  }
  /**
   * @param string
   */
  public function setOutputPeriod($outputPeriod)
  {
    $this->outputPeriod = $outputPeriod;
  }
  /**
   * @return string
   */
  public function getOutputPeriod()
  {
    return $this->outputPeriod;
  }
  /**
   * @param string
   */
  public function setResponseTemplate($responseTemplate)
  {
    $this->responseTemplate = $responseTemplate;
  }
  /**
   * @return string
   */
  public function getResponseTemplate()
  {
    return $this->responseTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequest::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequest');
