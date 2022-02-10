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

class GoogleCloudDialogflowCxV3RolloutState extends \Google\Model
{
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $step;
  /**
   * @var int
   */
  public $stepIndex;

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
  public function setStep($step)
  {
    $this->step = $step;
  }
  /**
   * @return string
   */
  public function getStep()
  {
    return $this->step;
  }
  /**
   * @param int
   */
  public function setStepIndex($stepIndex)
  {
    $this->stepIndex = $stepIndex;
  }
  /**
   * @return int
   */
  public function getStepIndex()
  {
    return $this->stepIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3RolloutState::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3RolloutState');
