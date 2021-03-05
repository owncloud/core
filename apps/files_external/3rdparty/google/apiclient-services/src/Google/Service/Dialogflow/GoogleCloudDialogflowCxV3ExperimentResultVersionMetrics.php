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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultVersionMetrics extends Google_Collection
{
  protected $collection_key = 'metrics';
  protected $metricsType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultMetric';
  protected $metricsDataType = 'array';
  public $sessionCount;
  public $version;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setSessionCount($sessionCount)
  {
    $this->sessionCount = $sessionCount;
  }
  public function getSessionCount()
  {
    return $this->sessionCount;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
