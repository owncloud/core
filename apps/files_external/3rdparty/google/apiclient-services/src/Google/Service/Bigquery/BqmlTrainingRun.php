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

class Google_Service_Bigquery_BqmlTrainingRun extends Google_Collection
{
  protected $collection_key = 'iterationResults';
  protected $iterationResultsType = 'Google_Service_Bigquery_BqmlIterationResult';
  protected $iterationResultsDataType = 'array';
  public $startTime;
  public $state;
  protected $trainingOptionsType = 'Google_Service_Bigquery_BqmlTrainingRunTrainingOptions';
  protected $trainingOptionsDataType = '';

  /**
   * @param Google_Service_Bigquery_BqmlIterationResult
   */
  public function setIterationResults($iterationResults)
  {
    $this->iterationResults = $iterationResults;
  }
  /**
   * @return Google_Service_Bigquery_BqmlIterationResult
   */
  public function getIterationResults()
  {
    return $this->iterationResults;
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
  /**
   * @param Google_Service_Bigquery_BqmlTrainingRunTrainingOptions
   */
  public function setTrainingOptions(Google_Service_Bigquery_BqmlTrainingRunTrainingOptions $trainingOptions)
  {
    $this->trainingOptions = $trainingOptions;
  }
  /**
   * @return Google_Service_Bigquery_BqmlTrainingRunTrainingOptions
   */
  public function getTrainingOptions()
  {
    return $this->trainingOptions;
  }
}
