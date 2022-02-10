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

class GoogleCloudMlV1HyperparameterOutput extends \Google\Collection
{
  protected $collection_key = 'allMetrics';
  protected $allMetricsType = GoogleCloudMlV1HyperparameterOutputHyperparameterMetric::class;
  protected $allMetricsDataType = 'array';
  protected $builtInAlgorithmOutputType = GoogleCloudMlV1BuiltInAlgorithmOutput::class;
  protected $builtInAlgorithmOutputDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $finalMetricType = GoogleCloudMlV1HyperparameterOutputHyperparameterMetric::class;
  protected $finalMetricDataType = '';
  /**
   * @var string[]
   */
  public $hyperparameters;
  /**
   * @var bool
   */
  public $isTrialStoppedEarly;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $trialId;
  /**
   * @var string[]
   */
  public $webAccessUris;

  /**
   * @param GoogleCloudMlV1HyperparameterOutputHyperparameterMetric[]
   */
  public function setAllMetrics($allMetrics)
  {
    $this->allMetrics = $allMetrics;
  }
  /**
   * @return GoogleCloudMlV1HyperparameterOutputHyperparameterMetric[]
   */
  public function getAllMetrics()
  {
    return $this->allMetrics;
  }
  /**
   * @param GoogleCloudMlV1BuiltInAlgorithmOutput
   */
  public function setBuiltInAlgorithmOutput(GoogleCloudMlV1BuiltInAlgorithmOutput $builtInAlgorithmOutput)
  {
    $this->builtInAlgorithmOutput = $builtInAlgorithmOutput;
  }
  /**
   * @return GoogleCloudMlV1BuiltInAlgorithmOutput
   */
  public function getBuiltInAlgorithmOutput()
  {
    return $this->builtInAlgorithmOutput;
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
   * @param GoogleCloudMlV1HyperparameterOutputHyperparameterMetric
   */
  public function setFinalMetric(GoogleCloudMlV1HyperparameterOutputHyperparameterMetric $finalMetric)
  {
    $this->finalMetric = $finalMetric;
  }
  /**
   * @return GoogleCloudMlV1HyperparameterOutputHyperparameterMetric
   */
  public function getFinalMetric()
  {
    return $this->finalMetric;
  }
  /**
   * @param string[]
   */
  public function setHyperparameters($hyperparameters)
  {
    $this->hyperparameters = $hyperparameters;
  }
  /**
   * @return string[]
   */
  public function getHyperparameters()
  {
    return $this->hyperparameters;
  }
  /**
   * @param bool
   */
  public function setIsTrialStoppedEarly($isTrialStoppedEarly)
  {
    $this->isTrialStoppedEarly = $isTrialStoppedEarly;
  }
  /**
   * @return bool
   */
  public function getIsTrialStoppedEarly()
  {
    return $this->isTrialStoppedEarly;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTrialId($trialId)
  {
    $this->trialId = $trialId;
  }
  /**
   * @return string
   */
  public function getTrialId()
  {
    return $this->trialId;
  }
  /**
   * @param string[]
   */
  public function setWebAccessUris($webAccessUris)
  {
    $this->webAccessUris = $webAccessUris;
  }
  /**
   * @return string[]
   */
  public function getWebAccessUris()
  {
    return $this->webAccessUris;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1HyperparameterOutput::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutput');
