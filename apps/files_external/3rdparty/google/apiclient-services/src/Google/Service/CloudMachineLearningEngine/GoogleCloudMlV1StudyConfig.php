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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfig extends Google_Collection
{
  protected $collection_key = 'parameters';
  public $algorithm;
  protected $automatedStoppingConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutomatedStoppingConfig';
  protected $automatedStoppingConfigDataType = '';
  protected $metricsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigMetricSpec';
  protected $metricsDataType = 'array';
  protected $parametersType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec';
  protected $parametersDataType = 'array';

  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutomatedStoppingConfig
   */
  public function setAutomatedStoppingConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutomatedStoppingConfig $automatedStoppingConfig)
  {
    $this->automatedStoppingConfig = $automatedStoppingConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutomatedStoppingConfig
   */
  public function getAutomatedStoppingConfig()
  {
    return $this->automatedStoppingConfig;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigMetricSpec[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigMetricSpec[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1StudyConfigParameterSpec[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}
