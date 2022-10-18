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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusStatsDimensions extends \Google\Model
{
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $enumFilterType;
  /**
   * @var string
   */
  public $errorEnumString;
  /**
   * @var string
   */
  public $retryAttempt;
  /**
   * @var string
   */
  public $taskName;
  /**
   * @var string
   */
  public $taskNumber;
  /**
   * @var string
   */
  public $triggerId;
  /**
   * @var string
   */
  public $warningEnumString;
  /**
   * @var string
   */
  public $workflowId;
  /**
   * @var string
   */
  public $workflowName;

  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setEnumFilterType($enumFilterType)
  {
    $this->enumFilterType = $enumFilterType;
  }
  /**
   * @return string
   */
  public function getEnumFilterType()
  {
    return $this->enumFilterType;
  }
  /**
   * @param string
   */
  public function setErrorEnumString($errorEnumString)
  {
    $this->errorEnumString = $errorEnumString;
  }
  /**
   * @return string
   */
  public function getErrorEnumString()
  {
    return $this->errorEnumString;
  }
  /**
   * @param string
   */
  public function setRetryAttempt($retryAttempt)
  {
    $this->retryAttempt = $retryAttempt;
  }
  /**
   * @return string
   */
  public function getRetryAttempt()
  {
    return $this->retryAttempt;
  }
  /**
   * @param string
   */
  public function setTaskName($taskName)
  {
    $this->taskName = $taskName;
  }
  /**
   * @return string
   */
  public function getTaskName()
  {
    return $this->taskName;
  }
  /**
   * @param string
   */
  public function setTaskNumber($taskNumber)
  {
    $this->taskNumber = $taskNumber;
  }
  /**
   * @return string
   */
  public function getTaskNumber()
  {
    return $this->taskNumber;
  }
  /**
   * @param string
   */
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  /**
   * @return string
   */
  public function getTriggerId()
  {
    return $this->triggerId;
  }
  /**
   * @param string
   */
  public function setWarningEnumString($warningEnumString)
  {
    $this->warningEnumString = $warningEnumString;
  }
  /**
   * @return string
   */
  public function getWarningEnumString()
  {
    return $this->warningEnumString;
  }
  /**
   * @param string
   */
  public function setWorkflowId($workflowId)
  {
    $this->workflowId = $workflowId;
  }
  /**
   * @return string
   */
  public function getWorkflowId()
  {
    return $this->workflowId;
  }
  /**
   * @param string
   */
  public function setWorkflowName($workflowName)
  {
    $this->workflowName = $workflowName;
  }
  /**
   * @return string
   */
  public function getWorkflowName()
  {
    return $this->workflowName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusStatsDimensions::class, 'Google_Service_Integrations_EnterpriseCrmEventbusStatsDimensions');
