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

class EnterpriseCrmFrontendsEventbusProtoTriggerConfig extends \Google\Collection
{
  protected $collection_key = 'startTasks';
  protected $alertConfigType = EnterpriseCrmEventbusProtoWorkflowAlertConfig::class;
  protected $alertConfigDataType = 'array';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $enabledClients;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $nextTasksExecutionPolicy;
  /**
   * @var bool
   */
  public $pauseWorkflowExecutions;
  protected $positionType = EnterpriseCrmEventbusProtoCoordinate::class;
  protected $positionDataType = '';
  /**
   * @var string[]
   */
  public $properties;
  protected $startTasksType = EnterpriseCrmEventbusProtoNextTask::class;
  protected $startTasksDataType = 'array';
  protected $triggerCriteriaType = EnterpriseCrmEventbusProtoTriggerCriteria::class;
  protected $triggerCriteriaDataType = '';
  /**
   * @var string
   */
  public $triggerId;
  /**
   * @var string
   */
  public $triggerNumber;
  /**
   * @var string
   */
  public $triggerType;

  /**
   * @param EnterpriseCrmEventbusProtoWorkflowAlertConfig[]
   */
  public function setAlertConfig($alertConfig)
  {
    $this->alertConfig = $alertConfig;
  }
  /**
   * @return EnterpriseCrmEventbusProtoWorkflowAlertConfig[]
   */
  public function getAlertConfig()
  {
    return $this->alertConfig;
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
   * @param string[]
   */
  public function setEnabledClients($enabledClients)
  {
    $this->enabledClients = $enabledClients;
  }
  /**
   * @return string[]
   */
  public function getEnabledClients()
  {
    return $this->enabledClients;
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
   * @param bool
   */
  public function setPauseWorkflowExecutions($pauseWorkflowExecutions)
  {
    $this->pauseWorkflowExecutions = $pauseWorkflowExecutions;
  }
  /**
   * @return bool
   */
  public function getPauseWorkflowExecutions()
  {
    return $this->pauseWorkflowExecutions;
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
   * @param string[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param EnterpriseCrmEventbusProtoNextTask[]
   */
  public function setStartTasks($startTasks)
  {
    $this->startTasks = $startTasks;
  }
  /**
   * @return EnterpriseCrmEventbusProtoNextTask[]
   */
  public function getStartTasks()
  {
    return $this->startTasks;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTriggerCriteria
   */
  public function setTriggerCriteria(EnterpriseCrmEventbusProtoTriggerCriteria $triggerCriteria)
  {
    $this->triggerCriteria = $triggerCriteria;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTriggerCriteria
   */
  public function getTriggerCriteria()
  {
    return $this->triggerCriteria;
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
  public function setTriggerNumber($triggerNumber)
  {
    $this->triggerNumber = $triggerNumber;
  }
  /**
   * @return string
   */
  public function getTriggerNumber()
  {
    return $this->triggerNumber;
  }
  /**
   * @param string
   */
  public function setTriggerType($triggerType)
  {
    $this->triggerType = $triggerType;
  }
  /**
   * @return string
   */
  public function getTriggerType()
  {
    return $this->triggerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoTriggerConfig::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoTriggerConfig');
