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

class Google_Service_AnalyticsReporting_GoalData extends Google_Model
{
  public $goalCompletionLocation;
  public $goalCompletions;
  public $goalIndex;
  public $goalName;
  public $goalPreviousStep1;
  public $goalPreviousStep2;
  public $goalPreviousStep3;
  public $goalValue;

  public function setGoalCompletionLocation($goalCompletionLocation)
  {
    $this->goalCompletionLocation = $goalCompletionLocation;
  }
  public function getGoalCompletionLocation()
  {
    return $this->goalCompletionLocation;
  }
  public function setGoalCompletions($goalCompletions)
  {
    $this->goalCompletions = $goalCompletions;
  }
  public function getGoalCompletions()
  {
    return $this->goalCompletions;
  }
  public function setGoalIndex($goalIndex)
  {
    $this->goalIndex = $goalIndex;
  }
  public function getGoalIndex()
  {
    return $this->goalIndex;
  }
  public function setGoalName($goalName)
  {
    $this->goalName = $goalName;
  }
  public function getGoalName()
  {
    return $this->goalName;
  }
  public function setGoalPreviousStep1($goalPreviousStep1)
  {
    $this->goalPreviousStep1 = $goalPreviousStep1;
  }
  public function getGoalPreviousStep1()
  {
    return $this->goalPreviousStep1;
  }
  public function setGoalPreviousStep2($goalPreviousStep2)
  {
    $this->goalPreviousStep2 = $goalPreviousStep2;
  }
  public function getGoalPreviousStep2()
  {
    return $this->goalPreviousStep2;
  }
  public function setGoalPreviousStep3($goalPreviousStep3)
  {
    $this->goalPreviousStep3 = $goalPreviousStep3;
  }
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
