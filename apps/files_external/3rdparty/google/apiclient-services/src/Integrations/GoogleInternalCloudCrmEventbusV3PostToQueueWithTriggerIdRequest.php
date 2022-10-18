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

class GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var bool
   */
  public $ignoreErrorIfNoActiveWorkflow;
  protected $parametersType = EnterpriseCrmEventbusProtoEventParameters::class;
  protected $parametersDataType = '';
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $requestId;
  /**
   * @var string
   */
  public $scheduledTime;
  /**
   * @var bool
   */
  public $testMode;
  /**
   * @var string
   */
  public $triggerId;
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
   * @param bool
   */
  public function setIgnoreErrorIfNoActiveWorkflow($ignoreErrorIfNoActiveWorkflow)
  {
    $this->ignoreErrorIfNoActiveWorkflow = $ignoreErrorIfNoActiveWorkflow;
  }
  /**
   * @return bool
   */
  public function getIgnoreErrorIfNoActiveWorkflow()
  {
    return $this->ignoreErrorIfNoActiveWorkflow;
  }
  /**
   * @param EnterpriseCrmEventbusProtoEventParameters
   */
  public function setParameters(EnterpriseCrmEventbusProtoEventParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return EnterpriseCrmEventbusProtoEventParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
  /**
   * @param string
   */
  public function setScheduledTime($scheduledTime)
  {
    $this->scheduledTime = $scheduledTime;
  }
  /**
   * @return string
   */
  public function getScheduledTime()
  {
    return $this->scheduledTime;
  }
  /**
   * @param bool
   */
  public function setTestMode($testMode)
  {
    $this->testMode = $testMode;
  }
  /**
   * @return bool
   */
  public function getTestMode()
  {
    return $this->testMode;
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
class_alias(GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest::class, 'Google_Service_Integrations_GoogleInternalCloudCrmEventbusV3PostToQueueWithTriggerIdRequest');
