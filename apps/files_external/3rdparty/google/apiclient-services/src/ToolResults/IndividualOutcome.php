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

namespace Google\Service\ToolResults;

class IndividualOutcome extends \Google\Model
{
  public $multistepNumber;
  public $outcomeSummary;
  protected $runDurationType = Duration::class;
  protected $runDurationDataType = '';
  public $stepId;

  public function setMultistepNumber($multistepNumber)
  {
    $this->multistepNumber = $multistepNumber;
  }
  public function getMultistepNumber()
  {
    return $this->multistepNumber;
  }
  public function setOutcomeSummary($outcomeSummary)
  {
    $this->outcomeSummary = $outcomeSummary;
  }
  public function getOutcomeSummary()
  {
    return $this->outcomeSummary;
  }
  /**
   * @param Duration
   */
  public function setRunDuration(Duration $runDuration)
  {
    $this->runDuration = $runDuration;
  }
  /**
   * @return Duration
   */
  public function getRunDuration()
  {
    return $this->runDuration;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndividualOutcome::class, 'Google_Service_ToolResults_IndividualOutcome');
