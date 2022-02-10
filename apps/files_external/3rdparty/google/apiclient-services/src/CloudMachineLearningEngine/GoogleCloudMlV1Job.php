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

class GoogleCloudMlV1Job extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $jobId;
  /**
   * @var string
   */
  public $jobPosition;
  /**
   * @var string[]
   */
  public $labels;
  protected $predictionInputType = GoogleCloudMlV1PredictionInput::class;
  protected $predictionInputDataType = '';
  protected $predictionOutputType = GoogleCloudMlV1PredictionOutput::class;
  protected $predictionOutputDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  protected $trainingInputType = GoogleCloudMlV1TrainingInput::class;
  protected $trainingInputDataType = '';
  protected $trainingOutputType = GoogleCloudMlV1TrainingOutput::class;
  protected $trainingOutputDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  /**
   * @return string
   */
  public function getJobId()
  {
    return $this->jobId;
  }
  /**
   * @param string
   */
  public function setJobPosition($jobPosition)
  {
    $this->jobPosition = $jobPosition;
  }
  /**
   * @return string
   */
  public function getJobPosition()
  {
    return $this->jobPosition;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param GoogleCloudMlV1PredictionInput
   */
  public function setPredictionInput(GoogleCloudMlV1PredictionInput $predictionInput)
  {
    $this->predictionInput = $predictionInput;
  }
  /**
   * @return GoogleCloudMlV1PredictionInput
   */
  public function getPredictionInput()
  {
    return $this->predictionInput;
  }
  /**
   * @param GoogleCloudMlV1PredictionOutput
   */
  public function setPredictionOutput(GoogleCloudMlV1PredictionOutput $predictionOutput)
  {
    $this->predictionOutput = $predictionOutput;
  }
  /**
   * @return GoogleCloudMlV1PredictionOutput
   */
  public function getPredictionOutput()
  {
    return $this->predictionOutput;
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
   * @param GoogleCloudMlV1TrainingInput
   */
  public function setTrainingInput(GoogleCloudMlV1TrainingInput $trainingInput)
  {
    $this->trainingInput = $trainingInput;
  }
  /**
   * @return GoogleCloudMlV1TrainingInput
   */
  public function getTrainingInput()
  {
    return $this->trainingInput;
  }
  /**
   * @param GoogleCloudMlV1TrainingOutput
   */
  public function setTrainingOutput(GoogleCloudMlV1TrainingOutput $trainingOutput)
  {
    $this->trainingOutput = $trainingOutput;
  }
  /**
   * @return GoogleCloudMlV1TrainingOutput
   */
  public function getTrainingOutput()
  {
    return $this->trainingOutput;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Job::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job');
