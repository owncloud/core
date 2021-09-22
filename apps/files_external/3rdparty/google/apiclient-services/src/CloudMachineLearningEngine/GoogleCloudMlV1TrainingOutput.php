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

class GoogleCloudMlV1TrainingOutput extends \Google\Collection
{
  protected $collection_key = 'trials';
  protected $builtInAlgorithmOutputType = GoogleCloudMlV1BuiltInAlgorithmOutput::class;
  protected $builtInAlgorithmOutputDataType = '';
  public $completedTrialCount;
  public $consumedMLUnits;
  public $hyperparameterMetricTag;
  public $isBuiltInAlgorithmJob;
  public $isHyperparameterTuningJob;
  protected $trialsType = GoogleCloudMlV1HyperparameterOutput::class;
  protected $trialsDataType = 'array';
  public $webAccessUris;

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
  public function setCompletedTrialCount($completedTrialCount)
  {
    $this->completedTrialCount = $completedTrialCount;
  }
  public function getCompletedTrialCount()
  {
    return $this->completedTrialCount;
  }
  public function setConsumedMLUnits($consumedMLUnits)
  {
    $this->consumedMLUnits = $consumedMLUnits;
  }
  public function getConsumedMLUnits()
  {
    return $this->consumedMLUnits;
  }
  public function setHyperparameterMetricTag($hyperparameterMetricTag)
  {
    $this->hyperparameterMetricTag = $hyperparameterMetricTag;
  }
  public function getHyperparameterMetricTag()
  {
    return $this->hyperparameterMetricTag;
  }
  public function setIsBuiltInAlgorithmJob($isBuiltInAlgorithmJob)
  {
    $this->isBuiltInAlgorithmJob = $isBuiltInAlgorithmJob;
  }
  public function getIsBuiltInAlgorithmJob()
  {
    return $this->isBuiltInAlgorithmJob;
  }
  public function setIsHyperparameterTuningJob($isHyperparameterTuningJob)
  {
    $this->isHyperparameterTuningJob = $isHyperparameterTuningJob;
  }
  public function getIsHyperparameterTuningJob()
  {
    return $this->isHyperparameterTuningJob;
  }
  /**
   * @param GoogleCloudMlV1HyperparameterOutput[]
   */
  public function setTrials($trials)
  {
    $this->trials = $trials;
  }
  /**
   * @return GoogleCloudMlV1HyperparameterOutput[]
   */
  public function getTrials()
  {
    return $this->trials;
  }
  public function setWebAccessUris($webAccessUris)
  {
    $this->webAccessUris = $webAccessUris;
  }
  public function getWebAccessUris()
  {
    return $this->webAccessUris;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1TrainingOutput::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingOutput');
