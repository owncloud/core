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

namespace Google\Service\AnalyticsReporting;

class GoalData extends \Google\Model
{
  /**
   * @var string
   */
  public $goalCompletionLocation;
  /**
   * @var string
   */
  public $goalCompletions;
  /**
   * @var int
   */
  public $goalIndex;
  /**
   * @var string
   */
  public $goalName;
  /**
   * @var string
   */
  public $goalPreviousStep1;
  /**
   * @var string
   */
  public $goalPreviousStep2;
  /**
   * @var string
   */
  public $goalPreviousStep3;
  public $goalValue;

  /**
   * @param string
   */
  public function setGoalCompletionLocation($goalCompletionLocation)
  {
    $this->goalCompletionLocation = $goalCompletionLocation;
  }
  /**
   * @return string
   */
  public function getGoalCompletionLocation()
  {
    return $this->goalCompletionLocation;
  }
  /**
   * @param string
   */
  public function setGoalCompletions($goalCompletions)
  {
    $this->goalCompletions = $goalCompletions;
  }
  /**
   * @return string
   */
  public function getGoalCompletions()
  {
    return $this->goalCompletions;
  }
  /**
   * @param int
   */
  public function setGoalIndex($goalIndex)
  {
    $this->goalIndex = $goalIndex;
  }
  /**
   * @return int
   */
  public function getGoalIndex()
  {
    return $this->goalIndex;
  }
  /**
   * @param string
   */
  public function setGoalName($goalName)
  {
    $this->goalName = $goalName;
  }
  /**
   * @return string
   */
  public function getGoalName()
  {
    return $this->goalName;
  }
  /**
   * @param string
   */
  public function setGoalPreviousStep1($goalPreviousStep1)
  {
    $this->goalPreviousStep1 = $goalPreviousStep1;
  }
  /**
   * @return string
   */
  public function getGoalPreviousStep1()
  {
    return $this->goalPreviousStep1;
  }
  /**
   * @param string
   */
  public function setGoalPreviousStep2($goalPreviousStep2)
  {
    $this->goalPreviousStep2 = $goalPreviousStep2;
  }
  /**
   * @return string
   */
  public function getGoalPreviousStep2()
  {
    return $this->goalPreviousStep2;
  }
  /**
   * @param string
   */
  public function setGoalPreviousStep3($goalPreviousStep3)
  {
    $this->goalPreviousStep3 = $goalPreviousStep3;
  }
  /**
   * @return string
   */
  public function getGoalPreviousStep3()
  {
    return $this->goalPreviousStep3;
  }
  public function setGoalValue($goalValue)
  {
    $this->goalValue = $goalValue;
  }
  public function getGoalValue()
  {
    return $this->goalValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoalData::class, 'Google_Service_AnalyticsReporting_GoalData');
