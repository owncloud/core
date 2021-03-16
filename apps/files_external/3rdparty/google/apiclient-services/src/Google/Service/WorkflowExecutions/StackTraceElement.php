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

class Google_Service_WorkflowExecutions_StackTraceElement extends Google_Model
{
  protected $positionType = 'Google_Service_WorkflowExecutions_Position';
  protected $positionDataType = '';
  public $routine;
  public $step;

  /**
   * @param Google_Service_WorkflowExecutions_Position
   */
  public function setPosition(Google_Service_WorkflowExecutions_Position $position)
  {
    $this->position = $position;
  }
  /**
   * @return Google_Service_WorkflowExecutions_Position
   */
  public function getPosition()
  {
    return $this->position;
  }
  public function setRoutine($routine)
  {
    $this->routine = $routine;
  }
  public function getRoutine()
  {
    return $this->routine;
  }
  public function setStep($step)
  {
    $this->step = $step;
  }
  public function getStep()
  {
    return $this->step;
  }
}
