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

class GoogleCloudDatalabelingV1beta1EvaluationJob extends \Google\Collection
{
  protected $collection_key = 'attempts';
  /**
   * @var string
   */
  public $annotationSpecSet;
  protected $attemptsType = GoogleCloudDatalabelingV1beta1Attempt::class;
  protected $attemptsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  protected $evaluationJobConfigType = GoogleCloudDatalabelingV1beta1EvaluationJobConfig::class;
  protected $evaluationJobConfigDataType = '';
  /**
   * @var bool
   */
  public $labelMissingGroundTruth;
  /**
   * @var string
   */
  public $modelVersion;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $schedule;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setAnnotationSpecSet($annotationSpecSet)
  {
    $this->annotationSpecSet = $annotationSpecSet;
  }
  /**
   * @return string
   */
  public function getAnnotationSpecSet()
  {
    return $this->annotationSpecSet;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1Attempt[]
   */
  public function setAttempts($attempts)
  {
    $this->attempts = $attempts;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1Attempt[]
   */
  public function getAttempts()
  {
    return $this->attempts;
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1EvaluationJobConfig
   */
  public function setEvaluationJobConfig(GoogleCloudDatalabelingV1beta1EvaluationJobConfig $evaluationJobConfig)
  {
    $this->evaluationJobConfig = $evaluationJobConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1EvaluationJobConfig
   */
  public function getEvaluationJobConfig()
  {
    return $this->evaluationJobConfig;
  }
  /**
   * @param bool
   */
  public function setLabelMissingGroundTruth($labelMissingGroundTruth)
  {
    $this->labelMissingGroundTruth = $labelMissingGroundTruth;
  }
  /**
   * @return bool
   */
  public function getLabelMissingGroundTruth()
  {
    return $this->labelMissingGroundTruth;
  }
  /**
   * @param string
   */
  public function setModelVersion($modelVersion)
  {
    $this->modelVersion = $modelVersion;
  }
  /**
   * @return string
   */
  public function getModelVersion()
  {
    return $this->modelVersion;
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
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return string
   */
  public function getSchedule()
  {
    return $this->schedule;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1EvaluationJob::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJob');
