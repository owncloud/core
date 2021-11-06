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

class GoogleCloudMlV1HyperparameterSpec extends \Google\Collection
{
  protected $collection_key = 'params';
  public $algorithm;
  public $enableTrialEarlyStopping;
  public $goal;
  public $hyperparameterMetricTag;
  public $maxFailedTrials;
  public $maxParallelTrials;
  public $maxTrials;
  protected $paramsType = GoogleCloudMlV1ParameterSpec::class;
  protected $paramsDataType = 'array';
  public $resumePreviousJobId;

  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  public function setEnableTrialEarlyStopping($enableTrialEarlyStopping)
  {
    $this->enableTrialEarlyStopping = $enableTrialEarlyStopping;
  }
  public function getEnableTrialEarlyStopping()
  {
    return $this->enableTrialEarlyStopping;
  }
  public function setGoal($goal)
  {
    $this->goal = $goal;
  }
  public function getGoal()
  {
    return $this->goal;
  }
  public function setHyperparameterMetricTag($hyperparameterMetricTag)
  {
    $this->hyperparameterMetricTag = $hyperparameterMetricTag;
  }
  public function getHyperparameterMetricTag()
  {
    return $this->hyperparameterMetricTag;
  }
  public function setMaxFailedTrials($maxFailedTrials)
  {
    $this->maxFailedTrials = $maxFailedTrials;
  }
  public function getMaxFailedTrials()
  {
    return $this->maxFailedTrials;
  }
  public function setMaxParallelTrials($maxParallelTrials)
  {
    $this->maxParallelTrials = $maxParallelTrials;
  }
  public function getMaxParallelTrials()
  {
    return $this->maxParallelTrials;
  }
  public function setMaxTrials($maxTrials)
  {
    $this->maxTrials = $maxTrials;
  }
  public function getMaxTrials()
  {
    return $this->maxTrials;
  }
  /**
   * @param GoogleCloudMlV1ParameterSpec[]
   */
  public function setParams($params)
  {
    $this->params = $params;
  }
  /**
   * @return GoogleCloudMlV1ParameterSpec[]
   */
  public function getParams()
  {
    return $this->params;
  }
  public function setResumePreviousJobId($resumePreviousJobId)
  {
    $this->resumePreviousJobId = $resumePreviousJobId;
  }
  public function getResumePreviousJobId()
  {
    return $this->resumePreviousJobId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1HyperparameterSpec::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec');
