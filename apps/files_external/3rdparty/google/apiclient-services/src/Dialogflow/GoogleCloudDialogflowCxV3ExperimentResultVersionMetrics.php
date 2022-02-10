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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ExperimentResultVersionMetrics extends \Google\Collection
{
  protected $collection_key = 'metrics';
  protected $metricsType = GoogleCloudDialogflowCxV3ExperimentResultMetric::class;
  protected $metricsDataType = 'array';
  /**
   * @var int
   */
  public $sessionCount;
  /**
   * @var string
   */
  public $version;

  /**
   * @param GoogleCloudDialogflowCxV3ExperimentResultMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ExperimentResultMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param int
   */
  public function setSessionCount($sessionCount)
  {
    $this->sessionCount = $sessionCount;
  }
  /**
   * @return int
   */
  public function getSessionCount()
  {
    return $this->sessionCount;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ExperimentResultVersionMetrics::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultVersionMetrics');
