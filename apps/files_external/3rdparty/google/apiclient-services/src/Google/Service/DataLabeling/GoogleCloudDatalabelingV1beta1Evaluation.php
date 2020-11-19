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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Evaluation extends Google_Model
{
  public $annotationType;
  protected $configType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig';
  protected $configDataType = '';
  public $createTime;
  public $evaluatedItemCount;
  public $evaluationJobRunTime;
  protected $evaluationMetricsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationMetrics';
  protected $evaluationMetricsDataType = '';
  public $name;

  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function setConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEvaluatedItemCount($evaluatedItemCount)
  {
    $this->evaluatedItemCount = $evaluatedItemCount;
  }
  public function getEvaluatedItemCount()
  {
    return $this->evaluatedItemCount;
  }
  public function setEvaluationJobRunTime($evaluationJobRunTime)
  {
    $this->evaluationJobRunTime = $evaluationJobRunTime;
  }
  public function getEvaluationJobRunTime()
  {
    return $this->evaluationJobRunTime;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationMetrics
   */
  public function setEvaluationMetrics(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationMetrics $evaluationMetrics)
  {
    $this->evaluationMetrics = $evaluationMetrics;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationMetrics
   */
  public function getEvaluationMetrics()
  {
    return $this->evaluationMetrics;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
