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

class EnterpriseCrmFrontendsEventbusProtoTaskConfig extends \Google\Collection
{
  protected $collection_key = 'nextTasks';
  protected $alertConfigsType = EnterpriseCrmEventbusProtoTaskAlertConfig::class;
  protected $alertConfigsDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creatorEmail;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $disableStrictTypeValidation;
  protected $failurePolicyType = EnterpriseCrmEventbusProtoFailurePolicy::class;
  protected $failurePolicyDataType = '';
  /**
   * @var int
   */
  public $incomingEdgeCount;
  /**
   * @var string
   */
  public $jsonValidationOption;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $lastModifiedTime;
  protected $nextTasksType = EnterpriseCrmEventbusProtoNextTask::class;
  protected $nextTasksDataType = 'array';
  /**
   * @var string
   */
  public $nextTasksExecutionPolicy;
  protected $parametersType = EnterpriseCrmFrontendsEventbusProtoParameterEntry::class;
  protected $parametersDataType = 'map';
  protected $positionType = EnterpriseCrmEventbusProtoCoordinate::class;
  protected $positionDataType = '';
  /**
   * @var string
   */
  public $precondition;
  /**
   * @var string
   */
  public $preconditionLabel;
  protected $rollbackStrategyType = EnterpriseCrmFrontendsEventbusProtoRollbackStrategy::class;
  protected $rollbackStrategyDataType = '';
  protected $successPolicyType = EnterpriseCrmEventbusProtoSuccessPolicy::class;
  protected $successPolicyDataType = '';
  protected $synchronousCallFailurePolicyType = EnterpriseCrmEventbusProtoFailurePolicy::class;
  protected $synchronousCallFailurePolicyDataType = '';
  protected $taskEntityType = EnterpriseCrmFrontendsEventbusProtoTaskEntity::class;
  protected $taskEntityDataType = '';
  /**
   * @var string
   */
  public $taskExecutionStrategy;
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
  public $taskSpec;
  /**
   * @var string
   */
  public $taskTemplateName;
  /**
   * @var string
   */
  public $taskType;

  /**
   * @param EnterpriseCrmEventbusProtoTaskAlertConfig[]
   */
  public function setAlertConfigs($alertConfigs)
  {
    $this->alertConfigs = $alertConfigs;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTaskAlertConfig[]
   */
  public function getAlertConfigs()
  {
    return $this->alertConfigs;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCreatorEmail($creatorEmail)
  {
    $this->creatorEmail = $creatorEmail;
  }
  /**
   * @return string
   */
  public function getCreatorEmail()
  {
    return $this->creatorEmail;
  }
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
   * @param bool
   */
  public function setDisableStrictTypeValidation($disableStrictTypeValidation)
  {
    $this->disableStrictTypeValidation = $disableStrictTypeValidation;
  }
  /**
   * @return bool
   */
  public function getDisableStrictTypeValidation()
  {
    return $this->disableStrictTypeValidation;
  }
  /**
   * @param EnterpriseCrmEventbusProtoFailurePolicy
   */
  public function setFailurePolicy(EnterpriseCrmEventbusProtoFailurePolicy $failurePolicy)
  {
    $this->failurePolicy = $failurePolicy;
  }
  /**
   * @return EnterpriseCrmEventbusProtoFailurePolicy
   */
  public function getFailurePolicy()
  {
    return $this->failurePolicy;
  }
  /**
   * @param int
   */
  public function setIncomingEdgeCount($incomingEdgeCount)
  {
    $this->incomingEdgeCount = $incomingEdgeCount;
  }
  /**
   * @return int
   */
  public function getIncomingEdgeCount()
  {
    return $this->incomingEdgeCount;
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
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  /**
   * @param EnterpriseCrmEventbusProtoNextTask[]
   */
  public function setNextTasks($nextTasks)
  {
    $this->nextTasks = $nextTasks;
  }
  /**
   * @return EnterpriseCrmEventbusProtoNextTask[]
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
   * @param EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param EnterpriseCrmEventbusProtoCoordinate
   */
  public function setPosition(EnterpriseCrmEventbusProtoCoordinate $position)
  {
    $this->position = $position;
  }
  /**
   * @return EnterpriseCrmEventbusProtoCoordinate
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param string
   */
  public function setPrecondition($precondition)
  {
    $this->precondition = $precondition;
  }
  /**
   * @return string
   */
  public function getPrecondition()
  {
    return $this->precondition;
  }
  /**
   * @param string
   */
  public function setPreconditionLabel($preconditionLabel)
  {
    $this->preconditionLabel = $preconditionLabel;
  }
  /**
   * @return string
   */
  public function getPreconditionLabel()
  {
    return $this->preconditionLabel;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoRollbackStrategy
   */
  public function setRollbackStrategy(EnterpriseCrmFrontendsEventbusProtoRollbackStrategy $rollbackStrategy)
  {
    $this->rollbackStrategy = $rollbackStrategy;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoRollbackStrategy
   */
  public function getRollbackStrategy()
  {
    return $this->rollbackStrategy;
  }
  /**
   * @param EnterpriseCrmEventbusProtoSuccessPolicy
   */
  public function setSuccessPolicy(EnterpriseCrmEventbusProtoSuccessPolicy $successPolicy)
  {
    $this->successPolicy = $successPolicy;
  }
  /**
   * @return EnterpriseCrmEventbusProtoSuccessPolicy
   */
  public function getSuccessPolicy()
  {
    return $this->successPolicy;
  }
  /**
   * @param EnterpriseCrmEventbusProtoFailurePolicy
   */
  public function setSynchronousCallFailurePolicy(EnterpriseCrmEventbusProtoFailurePolicy $synchronousCallFailurePolicy)
  {
    $this->synchronousCallFailurePolicy = $synchronousCallFailurePolicy;
  }
  /**
   * @return EnterpriseCrmEventbusProtoFailurePolicy
   */
  public function getSynchronousCallFailurePolicy()
  {
    return $this->synchronousCallFailurePolicy;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoTaskEntity
   */
  public function setTaskEntity(EnterpriseCrmFrontendsEventbusProtoTaskEntity $taskEntity)
  {
    $this->taskEntity = $taskEntity;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoTaskEntity
   */
  public function getTaskEntity()
  {
    return $this->taskEntity;
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
  public function setTaskSpec($taskSpec)
  {
    $this->taskSpec = $taskSpec;
  }
  /**
   * @return string
   */
  public function getTaskSpec()
  {
    return $this->taskSpec;
  }
  /**
   * @param string
   */
  public function setTaskTemplateName($taskTemplateName)
  {
    $this->taskTemplateName = $taskTemplateName;
  }
  /**
   * @return string
   */
  public function getTaskTemplateName()
  {
    return $this->taskTemplateName;
  }
  /**
   * @param string
   */
  public function setTaskType($taskType)
  {
    $this->taskType = $taskType;
  }
  /**
   * @return string
   */
  public function getTaskType()
  {
    return $this->taskType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoTaskConfig::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoTaskConfig');
