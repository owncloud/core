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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ExperimentResultMetric extends \Google\Model
{
  protected $confidenceIntervalType = GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval::class;
  protected $confidenceIntervalDataType = '';
  public $count;
  /**
   * @var string
   */
  public $countType;
  public $ratio;
  /**
   * @var string
   */
  public $type;

  /**
   * @param GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval
   */
  public function setConfidenceInterval(GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval $confidenceInterval)
  {
    $this->confidenceInterval = $confidenceInterval;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ExperimentResultConfidenceInterval
   */
  public function getConfidenceInterval()
  {
    return $this->confidenceInterval;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setCountType($countType)
  {
    $this->countType = $countType;
  }
  /**
   * @return string
   */
  public function getCountType()
  {
    return $this->countType;
  }
  public function setRatio($ratio)
  {
    $this->ratio = $ratio;
  }
  public function getRatio()
  {
    return $this->ratio;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ExperimentResultMetric::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExperimentResultMetric');
