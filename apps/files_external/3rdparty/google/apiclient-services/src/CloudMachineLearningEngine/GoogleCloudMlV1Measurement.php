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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1Measurement extends \Google\Collection
{
  protected $collection_key = 'metrics';
  /**
   * @var string
   */
  public $elapsedTime;
  protected $metricsType = GoogleCloudMlV1MeasurementMetric::class;
  protected $metricsDataType = 'array';
  /**
   * @var string
   */
  public $stepCount;

  /**
   * @param string
   */
  public function setElapsedTime($elapsedTime)
  {
    $this->elapsedTime = $elapsedTime;
  }
  /**
   * @return string
   */
  public function getElapsedTime()
  {
    return $this->elapsedTime;
  }
  /**
   * @param GoogleCloudMlV1MeasurementMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudMlV1MeasurementMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setStepCount($stepCount)
  {
    $this->stepCount = $stepCount;
  }
  /**
   * @return string
   */
  public function getStepCount()
  {
    return $this->stepCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Measurement::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Measurement');
