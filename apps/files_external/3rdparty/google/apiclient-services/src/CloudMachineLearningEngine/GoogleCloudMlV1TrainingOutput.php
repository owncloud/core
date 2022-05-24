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
  /**
   * @var string
   */
  public $completedTrialCount;
  public $consumedMLUnits;
  /**
   * @var string
   */
  public $hyperparameterMetricTag;
  /**
   * @var bool
   */
  public $isBuiltInAlgorithmJob;
  /**
   * @var bool
   */
  public $isHyperparameterTuningJob;
  protected $trialsType = GoogleCloudMlV1HyperparameterOutput::class;
  protected $trialsDataType = 'array';
  /**
   * @var string[]
   */
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
  /**
   * @param string
   */
  public function setCompletedTrialCount($completedTrialCount)
  {
    $this->completedTrialCount = $completedTrialCount;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setHyperparameterMetricTag($hyperparameterMetricTag)
  {
    $this->hyperparameterMetricTag = $hyperparameterMetricTag;
  }
  /**
   * @return string
   */
  public function getHyperparameterMetricTag()
  {
    return $this->hyperparameterMetricTag;
  }
  /**
   * @param bool
   */
  public function setIsBuiltInAlgorithmJob($isBuiltInAlgorithmJob)
  {
    $this->isBuiltInAlgorithmJob = $isBuiltInAlgorithmJob;
  }
  /**
   * @return bool
   */
  public function getIsBuiltInAlgorithmJob()
  {
    return $this->isBuiltInAlgorithmJob;
  }
  /**
   * @param bool
   */
  public function setIsHyperparameterTuningJob($isHyperparameterTuningJob)
  {
    $this->isHyperparameterTuningJob = $isHyperparameterTuningJob;
  }
  /**
   * @return bool
   */
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
class_alias(GoogleCloudMlV1TrainingOutput::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingOutput');
