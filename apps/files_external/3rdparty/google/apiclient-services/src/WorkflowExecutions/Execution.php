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

namespace Google\Service\WorkflowExecutions;

class Execution extends \Google\Model
{
  public $argument;
  public $callLogLevel;
  public $endTime;
  protected $errorType = Error::class;
  protected $errorDataType = '';
  public $name;
  public $result;
  public $startTime;
  public $state;
  public $workflowRevisionId;

  public function setArgument($argument)
  {
    $this->argument = $argument;
  }
  public function getArgument()
  {
    return $this->argument;
  }
  public function setCallLogLevel($callLogLevel)
  {
    $this->callLogLevel = $callLogLevel;
  }
  public function getCallLogLevel()
  {
    return $this->callLogLevel;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Error
   */
  public function setError(Error $error)
  {
    $this->error = $error;
  }
  /**
   * @return Error
   */
  public function getError()
  {
    return $this->error;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResult($result)
  {
    $this->result = $result;
  }
  public function getResult()
  {
    return $this->result;
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
  public function setWorkflowRevisionId($workflowRevisionId)
  {
    $this->workflowRevisionId = $workflowRevisionId;
  }
  public function getWorkflowRevisionId()
  {
    return $this->workflowRevisionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Execution::class, 'Google_Service_WorkflowExecutions_Execution');
