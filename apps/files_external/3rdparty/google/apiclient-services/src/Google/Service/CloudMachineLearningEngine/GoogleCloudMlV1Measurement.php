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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement extends Google_Collection
{
  protected $collection_key = 'metrics';
  public $elapsedTime;
  protected $metricsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1MeasurementMetric';
  protected $metricsDataType = 'array';
  public $stepCount;

  public function setElapsedTime($elapsedTime)
  {
    $this->elapsedTime = $elapsedTime;
  }
  public function getElapsedTime()
  {
    return $this->elapsedTime;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1MeasurementMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1MeasurementMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setStepCount($stepCount)
  {
    $this->stepCount = $stepCount;
  }
  public function getStepCount()
  {
    return $this->stepCount;
  }
}
