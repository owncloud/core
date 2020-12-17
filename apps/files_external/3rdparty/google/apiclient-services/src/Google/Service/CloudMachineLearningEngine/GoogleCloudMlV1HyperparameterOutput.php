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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutput extends Google_Collection
{
  protected $collection_key = 'allMetrics';
  protected $allMetricsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric';
  protected $allMetricsDataType = 'array';
  protected $builtInAlgorithmOutputType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1BuiltInAlgorithmOutput';
  protected $builtInAlgorithmOutputDataType = '';
  public $endTime;
  protected $finalMetricType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric';
  protected $finalMetricDataType = '';
  public $hyperparameters;
  public $isTrialStoppedEarly;
  public $startTime;
  public $state;
  public $trialId;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric[]
   */
  public function setAllMetrics($allMetrics)
  {
    $this->allMetrics = $allMetrics;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric[]
   */
  public function getAllMetrics()
  {
    return $this->allMetrics;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1BuiltInAlgorithmOutput
   */
  public function setBuiltInAlgorithmOutput(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1BuiltInAlgorithmOutput $builtInAlgorithmOutput)
  {
    $this->builtInAlgorithmOutput = $builtInAlgorithmOutput;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1BuiltInAlgorithmOutput
   */
  public function getBuiltInAlgorithmOutput()
  {
    return $this->builtInAlgorithmOutput;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric
   */
  public function setFinalMetric(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric $finalMetric)
  {
    $this->finalMetric = $finalMetric;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterOutputHyperparameterMetric
   */
  public function getFinalMetric()
  {
    return $this->finalMetric;
  }
  public function setHyperparameters($hyperparameters)
  {
    $this->hyperparameters = $hyperparameters;
  }
  public function getHyperparameters()
  {
    return $this->hyperparameters;
  }
  public function setIsTrialStoppedEarly($isTrialStoppedEarly)
  {
    $this->isTrialStoppedEarly = $isTrialStoppedEarly;
  }
  public function getIsTrialStoppedEarly()
  {
    return $this->isTrialStoppedEarly;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTrialId($trialId)
  {
    $this->trialId = $trialId;
  }
  public function getTrialId()
  {
    return $this->trialId;
  }
}
