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
  /**
   * @var string
   */
  public $argument;
  /**
   * @var string
   */
  public $callLogLevel;
  /**
   * @var string
   */
  public $endTime;
  protected $errorType = Error::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $result;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $workflowRevisionId;

  /**
   * @param string
   */
  public function setArgument($argument)
  {
    $this->argument = $argument;
  }
  /**
   * @return string
   */
  public function getArgument()
  {
    return $this->argument;
  }
  /**
   * @param string
   */
  public function setCallLogLevel($callLogLevel)
  {
    $this->callLogLevel = $callLogLevel;
  }
  /**
   * @return string
   */
  public function getCallLogLevel()
  {
    return $this->callLogLevel;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setResult($result)
  {
    $this->result = $result;
  }
  /**
   * @return string
   */
  public function getResult()
  {
    return $this->result;
  }
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
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setWorkflowRevisionId($workflowRevisionId)
  {
    $this->workflowRevisionId = $workflowRevisionId;
  }
  /**
   * @return string
   */
  public function getWorkflowRevisionId()
  {
    return $this->workflowRevisionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Execution::class, 'Google_Service_WorkflowExecutions_Execution');
