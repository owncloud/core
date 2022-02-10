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

class BqmlIterationResult extends \Google\Model
{
  /**
   * @var string
   */
  public $durationMs;
  public $evalLoss;
  /**
   * @var int
   */
  public $index;
  public $learnRate;
  public $trainingLoss;

  /**
   * @param string
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return string
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  public function setEvalLoss($evalLoss)
  {
    $this->evalLoss = $evalLoss;
  }
  public function getEvalLoss()
  {
    return $this->evalLoss;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  public function setLearnRate($learnRate)
  {
    $this->learnRate = $learnRate;
  }
  public function getLearnRate()
  {
    return $this->learnRate;
  }
  public function setTrainingLoss($trainingLoss)
  {
    $this->trainingLoss = $trainingLoss;
  }
  public function getTrainingLoss()
  {
    return $this->trainingLoss;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BqmlIterationResult::class, 'Google_Service_Bigquery_BqmlIterationResult');
