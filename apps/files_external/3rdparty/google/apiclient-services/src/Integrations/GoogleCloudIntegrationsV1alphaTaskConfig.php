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

class GoogleCloudIntegrationsV1alphaTaskConfig extends \Google\Collection
{
  protected $collection_key = 'nextTasks';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $failurePolicyType = GoogleCloudIntegrationsV1alphaFailurePolicy::class;
  protected $failurePolicyDataType = '';
  /**
   * @var string
   */
  public $jsonValidationOption;
  protected $nextTasksType = GoogleCloudIntegrationsV1alphaNextTask::class;
  protected $nextTasksDataType = 'array';
  /**
   * @var string
   */
  public $nextTasksExecutionPolicy;
  protected $parametersType = GoogleCloudIntegrationsV1alphaEventParameter::class;
  protected $parametersDataType = 'map';
  protected $successPolicyType = GoogleCloudIntegrationsV1alphaSuccessPolicy::class;
  protected $successPolicyDataType = '';
  protected $synchronousCallFailurePolicyType = GoogleCloudIntegrationsV1alphaFailurePolicy::class;
  protected $synchronousCallFailurePolicyDataType = '';
  /**
   * @var string
   */
  public $task;
  /**
   * @var string
   */
  public $taskExecutionStrategy;
  /**
   * @var string
   */
  public $taskId;
  /**
   * @var string
   */
  public $taskTemplate;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaFailurePolicy
   */
  public function setFailurePolicy(GoogleCloudIntegrationsV1alphaFailurePolicy $failurePolicy)
  {
    $this->failurePolicy = $failurePolicy;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaFailurePolicy
   */
  public function getFailurePolicy()
  {
    return $this->failurePolicy;
  }
  /**
   * @param string
   */
  public function setJsonValidationOption($jsonValidationOption)
  {
    $this->jsonValidationOption = $jsonValidationOption;
  }
  /**
   * @return string
   */
  public function getJsonValidationOption()
  {
    return $this->jsonValidationOption;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaNextTask[]
   */
  public function setNextTasks($nextTasks)
  {
    $this->nextTasks = $nextTasks;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaNextTask[]
   */
  public function getNextTasks()
  {
    return $this->nextTasks;
  }
  /**
   * @param string
   */
  public function setNextTasksExecutionPolicy($nextTasksExecutionPolicy)
  {
    $this->nextTasksExecutionPolicy = $nextTasksExecutionPolicy;
  }
  /**
   * @return string
   */
  public function getNextTasksExecutionPolicy()
  {
    return $this->nextTasksExecutionPolicy;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaEventParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaEventParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaSuccessPolicy
   */
  public function setSuccessPolicy(GoogleCloudIntegrationsV1alphaSuccessPolicy $successPolicy)
  {
    $this->successPolicy = $successPolicy;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaSuccessPolicy
   */
  public function getSuccessPolicy()
  {
    return $this->successPolicy;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaFailurePolicy
   */
  public function setSynchronousCallFailurePolicy(GoogleCloudIntegrationsV1alphaFailurePolicy $synchronousCallFailurePolicy)
  {
    $this->synchronousCallFailurePolicy = $synchronousCallFailurePolicy;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaFailurePolicy
   */
  public function getSynchronousCallFailurePolicy()
  {
    return $this->synchronousCallFailurePolicy;
  }
  /**
   * @param string
   */
  public function setTask($task)
  {
    $this->task = $task;
  }
  /**
   * @return string
   */
  public function getTask()
  {
    return $this->task;
  }
  /**
   * @param string
   */
  public function setTaskExecutionStrategy($taskExecutionStrategy)
  {
    $this->taskExecutionStrategy = $taskExecutionStrategy;
  }
  /**
   * @return string
   */
  public function getTaskExecutionStrategy()
  {
    return $this->taskExecutionStrategy;
  }
  /**
   * @param string
   */
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  /**
   * @return string
   */
  public function getTaskId()
  {
    return $this->taskId;
  }
  /**
   * @param string
   */
  public function setTaskTemplate($taskTemplate)
  {
    $this->taskTemplate = $taskTemplate;
  }
  /**
   * @return string
   */
  public function getTaskTemplate()
  {
    return $this->taskTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaTaskConfig::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaTaskConfig');
