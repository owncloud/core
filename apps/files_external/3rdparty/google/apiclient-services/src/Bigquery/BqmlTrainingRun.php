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

namespace Google\Service\Bigquery;

class BqmlTrainingRun extends \Google\Collection
{
  protected $collection_key = 'iterationResults';
  protected $iterationResultsType = BqmlIterationResult::class;
  protected $iterationResultsDataType = 'array';
  public $startTime;
  public $state;
  protected $trainingOptionsType = BqmlTrainingRunTrainingOptions::class;
  protected $trainingOptionsDataType = '';

  /**
   * @param BqmlIterationResult[]
   */
  public function setIterationResults($iterationResults)
  {
    $this->iterationResults = $iterationResults;
  }
  /**
   * @return BqmlIterationResult[]
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
   * @param BqmlTrainingRunTrainingOptions
   */
  public function setTrainingOptions(BqmlTrainingRunTrainingOptions $trainingOptions)
  {
    $this->trainingOptions = $trainingOptions;
  }
  /**
   * @return BqmlTrainingRunTrainingOptions
   */
  public function getTrainingOptions()
  {
    return $this->trainingOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BqmlTrainingRun::class, 'Google_Service_Bigquery_BqmlTrainingRun');
