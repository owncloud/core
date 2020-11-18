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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJob extends Google_Collection
{
  protected $collection_key = 'attempts';
  public $annotationSpecSet;
  protected $attemptsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Attempt';
  protected $attemptsDataType = 'array';
  public $createTime;
  public $description;
  protected $evaluationJobConfigType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobConfig';
  protected $evaluationJobConfigDataType = '';
  public $labelMissingGroundTruth;
  public $modelVersion;
  public $name;
  public $schedule;
  public $state;

  public function setAnnotationSpecSet($annotationSpecSet)
  {
    $this->annotationSpecSet = $annotationSpecSet;
  }
  public function getAnnotationSpecSet()
  {
    return $this->annotationSpecSet;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Attempt
   */
  public function setAttempts($attempts)
  {
    $this->attempts = $attempts;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Attempt
   */
  public function getAttempts()
  {
    return $this->attempts;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobConfig
   */
  public function setEvaluationJobConfig(Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobConfig $evaluationJobConfig)
  {
    $this->evaluationJobConfig = $evaluationJobConfig;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobConfig
   */
  public function getEvaluationJobConfig()
  {
    return $this->evaluationJobConfig;
  }
  public function setLabelMissingGroundTruth($labelMissingGroundTruth)
  {
    $this->labelMissingGroundTruth = $labelMissingGroundTruth;
  }
  public function getLabelMissingGroundTruth()
  {
    return $this->labelMissingGroundTruth;
  }
  public function setModelVersion($modelVersion)
  {
    $this->modelVersion = $modelVersion;
  }
  public function getModelVersion()
  {
    return $this->modelVersion;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
