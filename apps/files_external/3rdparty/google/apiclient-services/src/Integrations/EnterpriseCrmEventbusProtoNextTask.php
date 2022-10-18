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

class EnterpriseCrmEventbusProtoNextTask extends \Google\Collection
{
  protected $collection_key = 'combinedConditions';
  protected $combinedConditionsType = EnterpriseCrmEventbusProtoCombinedCondition::class;
  protected $combinedConditionsDataType = 'array';
  /**
   * @var string
   */
  public $condition;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $taskConfigId;
  /**
   * @var string
   */
  public $taskNumber;

  /**
   * @param EnterpriseCrmEventbusProtoCombinedCondition[]
   */
  public function setCombinedConditions($combinedConditions)
  {
    $this->combinedConditions = $combinedConditions;
  }
  /**
   * @return EnterpriseCrmEventbusProtoCombinedCondition[]
   */
  public function getCombinedConditions()
  {
    return $this->combinedConditions;
  }
  /**
   * @param string
   */
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return string
   */
  public function getCondition()
  {
    return $this->condition;
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
  public function setTaskConfigId($taskConfigId)
  {
    $this->taskConfigId = $taskConfigId;
  }
  /**
   * @return string
   */
  public function getTaskConfigId()
  {
    return $this->taskConfigId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoNextTask::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoNextTask');
