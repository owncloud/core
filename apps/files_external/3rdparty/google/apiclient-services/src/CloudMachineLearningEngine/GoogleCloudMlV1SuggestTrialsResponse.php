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

class GoogleCloudMlV1SuggestTrialsResponse extends \Google\Collection
{
  protected $collection_key = 'trials';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $studyState;
  protected $trialsType = GoogleCloudMlV1Trial::class;
  protected $trialsDataType = 'array';

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
  public function setStudyState($studyState)
  {
    $this->studyState = $studyState;
  }
  /**
   * @return string
   */
  public function getStudyState()
  {
    return $this->studyState;
  }
  /**
   * @param GoogleCloudMlV1Trial[]
   */
  public function setTrials($trials)
  {
    $this->trials = $trials;
  }
  /**
   * @return GoogleCloudMlV1Trial[]
   */
  public function getTrials()
  {
    return $this->trials;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1SuggestTrialsResponse::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1SuggestTrialsResponse');
