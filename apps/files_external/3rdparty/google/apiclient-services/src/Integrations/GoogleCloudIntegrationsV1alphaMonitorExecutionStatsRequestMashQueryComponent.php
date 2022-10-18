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

class GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent extends \Google\Collection
{
  protected $collection_key = 'fetchFilters';
  /**
   * @var string
   */
  public $borgTaskMetric;
  /**
   * @var string[]
   */
  public $dataFilters;
  /**
   * @var string[]
   */
  public $fetchFilters;
  protected $groupByType = GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestGroupBy::class;
  protected $groupByDataType = '';
  /**
   * @var string
   */
  public $pointOperation;
  /**
   * @var string
   */
  public $timeDelta;

  /**
   * @param string
   */
  public function setBorgTaskMetric($borgTaskMetric)
  {
    $this->borgTaskMetric = $borgTaskMetric;
  }
  /**
   * @return string
   */
  public function getBorgTaskMetric()
  {
    return $this->borgTaskMetric;
  }
  /**
   * @param string[]
   */
  public function setDataFilters($dataFilters)
  {
    $this->dataFilters = $dataFilters;
  }
  /**
   * @return string[]
   */
  public function getDataFilters()
  {
    return $this->dataFilters;
  }
  /**
   * @param string[]
   */
  public function setFetchFilters($fetchFilters)
  {
    $this->fetchFilters = $fetchFilters;
  }
  /**
   * @return string[]
   */
  public function getFetchFilters()
  {
    return $this->fetchFilters;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestGroupBy
   */
  public function setGroupBy(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestGroupBy $groupBy)
  {
    $this->groupBy = $groupBy;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestGroupBy
   */
  public function getGroupBy()
  {
    return $this->groupBy;
  }
  /**
   * @param string
   */
  public function setPointOperation($pointOperation)
  {
    $this->pointOperation = $pointOperation;
  }
  /**
   * @return string
   */
  public function getPointOperation()
  {
    return $this->pointOperation;
  }
  /**
   * @param string
   */
  public function setTimeDelta($timeDelta)
  {
    $this->timeDelta = $timeDelta;
  }
  /**
   * @return string
   */
  public function getTimeDelta()
  {
    return $this->timeDelta;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaMonitorExecutionStatsRequestMashQueryComponent');
