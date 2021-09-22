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

namespace Google\Service\DisplayVideo;

class PerformanceGoal extends \Google\Model
{
  public $performanceGoalAmountMicros;
  public $performanceGoalPercentageMicros;
  public $performanceGoalString;
  public $performanceGoalType;

  public function setPerformanceGoalAmountMicros($performanceGoalAmountMicros)
  {
    $this->performanceGoalAmountMicros = $performanceGoalAmountMicros;
  }
  public function getPerformanceGoalAmountMicros()
  {
    return $this->performanceGoalAmountMicros;
  }
  public function setPerformanceGoalPercentageMicros($performanceGoalPercentageMicros)
  {
    $this->performanceGoalPercentageMicros = $performanceGoalPercentageMicros;
  }
  public function getPerformanceGoalPercentageMicros()
  {
    return $this->performanceGoalPercentageMicros;
  }
  public function setPerformanceGoalString($performanceGoalString)
  {
    $this->performanceGoalString = $performanceGoalString;
  }
  public function getPerformanceGoalString()
  {
    return $this->performanceGoalString;
  }
  public function setPerformanceGoalType($performanceGoalType)
  {
    $this->performanceGoalType = $performanceGoalType;
  }
  public function getPerformanceGoalType()
  {
    return $this->performanceGoalType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerformanceGoal::class, 'Google_Service_DisplayVideo_PerformanceGoal');
