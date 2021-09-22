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
  public $control;
  public $createTime;
  public $endTime;
  protected $metricLabelsType = GoogleCloudApigeeV1CanaryEvaluationMetricLabels::class;
  protected $metricLabelsDataType = '';
  public $name;
  public $startTime;
  public $state;
  public $treatment;
  public $verdict;

  public function setControl($control)
  {
    $this->control = $control;
  }
  public function getControl()
  {
    return $this->control;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
  public function setTreatment($treatment)
  {
    $this->treatment = $treatment;
  }
  public function getTreatment()
  {
    return $this->treatment;
  }
  public function setVerdict($verdict)
  {
    $this->verdict = $verdict;
  }
  public function getVerdict()
  {
    return $this->verdict;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1CanaryEvaluation::class, 'Google_Service_Apigee_GoogleCloudApigeeV1CanaryEvaluation');
