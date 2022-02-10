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
  /**
   * @var int
   */
  public $multistepNumber;
  /**
   * @var string
   */
  public $outcomeSummary;
  protected $runDurationType = Duration::class;
  protected $runDurationDataType = '';
  /**
   * @var string
   */
  public $stepId;

  /**
   * @param int
   */
  public function setMultistepNumber($multistepNumber)
  {
    $this->multistepNumber = $multistepNumber;
  }
  /**
   * @return int
   */
  public function getMultistepNumber()
  {
    return $this->multistepNumber;
  }
  /**
   * @param string
   */
  public function setOutcomeSummary($outcomeSummary)
  {
    $this->outcomeSummary = $outcomeSummary;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  /**
   * @return string
   */
  public function getStepId()
  {
    return $this->stepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndividualOutcome::class, 'Google_Service_ToolResults_IndividualOutcome');
