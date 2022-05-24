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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1CanaryEvaluation extends \Google\Model
{
  /**
   * @var string
   */
  public $control;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $endTime;
  protected $metricLabelsType = GoogleCloudApigeeV1CanaryEvaluationMetricLabels::class;
  protected $metricLabelsDataType = '';
  /**
   * @var string
   */
  public $name;
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
  public $treatment;
  /**
   * @var string
   */
  public $verdict;

  /**
   * @param string
   */
  public function setControl($control)
  {
    $this->control = $control;
  }
  /**
   * @return string
   */
  public function getControl()
  {
    return $this->control;
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
   * @param GoogleCloudApigeeV1CanaryEvaluationMetricLabels
   */
  public function setMetricLabels(GoogleCloudApigeeV1CanaryEvaluationMetricLabels $metricLabels)
  {
    $this->metricLabels = $metricLabels;
  }
  /**
   * @return GoogleCloudApigeeV1CanaryEvaluationMetricLabels
   */
  public function getMetricLabels()
  {
    return $this->metricLabels;
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
  public function setTreatment($treatment)
  {
    $this->treatment = $treatment;
  }
  /**
   * @return string
   */
  public function getTreatment()
  {
    return $this->treatment;
  }
  /**
   * @param string
   */
  public function setVerdict($verdict)
  {
    $this->verdict = $verdict;
  }
  /**
   * @return string
   */
  public function getVerdict()
  {
    return $this->verdict;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1CanaryEvaluation::class, 'Google_Service_Apigee_GoogleCloudApigeeV1CanaryEvaluation');
