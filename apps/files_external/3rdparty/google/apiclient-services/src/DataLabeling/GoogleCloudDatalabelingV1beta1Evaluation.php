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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1Evaluation extends \Google\Model
{
  /**
   * @var string
   */
  public $annotationType;
  protected $configType = GoogleCloudDatalabelingV1beta1EvaluationConfig::class;
  protected $configDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $evaluatedItemCount;
  /**
   * @var string
   */
  public $evaluationJobRunTime;
  protected $evaluationMetricsType = GoogleCloudDatalabelingV1beta1EvaluationMetrics::class;
  protected $evaluationMetricsDataType = '';
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  /**
   * @return string
   */
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function setConfig(GoogleCloudDatalabelingV1beta1EvaluationConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
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
  public function setEvaluatedItemCount($evaluatedItemCount)
  {
    $this->evaluatedItemCount = $evaluatedItemCount;
  }
  /**
   * @return string
   */
  public function getEvaluatedItemCount()
  {
    return $this->evaluatedItemCount;
  }
  /**
   * @param string
   */
  public function setEvaluationJobRunTime($evaluationJobRunTime)
  {
    $this->evaluationJobRunTime = $evaluationJobRunTime;
  }
  /**
   * @return string
   */
  public function getEvaluationJobRunTime()
  {
    return $this->evaluationJobRunTime;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1EvaluationMetrics
   */
  public function setEvaluationMetrics(GoogleCloudDatalabelingV1beta1EvaluationMetrics $evaluationMetrics)
  {
    $this->evaluationMetrics = $evaluationMetrics;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1EvaluationMetrics
   */
  public function getEvaluationMetrics()
  {
    return $this->evaluationMetrics;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1Evaluation::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Evaluation');
