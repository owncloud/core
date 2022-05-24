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
  /**
   * @var string
   */
  public $algorithm;
  /**
   * @var bool
   */
  public $enableTrialEarlyStopping;
  /**
   * @var string
   */
  public $goal;
  /**
   * @var string
   */
  public $hyperparameterMetricTag;
  /**
   * @var int
   */
  public $maxFailedTrials;
  /**
   * @var int
   */
  public $maxParallelTrials;
  /**
   * @var int
   */
  public $maxTrials;
  protected $paramsType = GoogleCloudMlV1ParameterSpec::class;
  protected $paramsDataType = 'array';
  /**
   * @var string
   */
  public $resumePreviousJobId;

  /**
   * @param string
   */
  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  /**
   * @return string
   */
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  /**
   * @param bool
   */
  public function setEnableTrialEarlyStopping($enableTrialEarlyStopping)
  {
    $this->enableTrialEarlyStopping = $enableTrialEarlyStopping;
  }
  /**
   * @return bool
   */
  public function getEnableTrialEarlyStopping()
  {
    return $this->enableTrialEarlyStopping;
  }
  /**
   * @param string
   */
  public function setGoal($goal)
  {
    $this->goal = $goal;
  }
  /**
   * @return string
   */
  public function getGoal()
  {
    return $this->goal;
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
   * @param int
   */
  public function setMaxFailedTrials($maxFailedTrials)
  {
    $this->maxFailedTrials = $maxFailedTrials;
  }
  /**
   * @return int
   */
  public function getMaxFailedTrials()
  {
    return $this->maxFailedTrials;
  }
  /**
   * @param int
   */
  public function setMaxParallelTrials($maxParallelTrials)
  {
    $this->maxParallelTrials = $maxParallelTrials;
  }
  /**
   * @return int
   */
  public function getMaxParallelTrials()
  {
    return $this->maxParallelTrials;
  }
  /**
   * @param int
   */
  public function setMaxTrials($maxTrials)
  {
    $this->maxTrials = $maxTrials;
  }
  /**
   * @return int
   */
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
  /**
   * @param string
   */
  public function setResumePreviousJobId($resumePreviousJobId)
  {
    $this->resumePreviousJobId = $resumePreviousJobId;
  }
  /**
   * @return string
   */
  public function getResumePreviousJobId()
  {
    return $this->resumePreviousJobId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1HyperparameterSpec::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec');
