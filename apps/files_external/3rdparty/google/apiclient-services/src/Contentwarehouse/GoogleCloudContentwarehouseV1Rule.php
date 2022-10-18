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

namespace Google\Service\Contentwarehouse;

class GoogleCloudContentwarehouseV1Rule extends \Google\Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = GoogleCloudContentwarehouseV1Action::class;
  protected $actionsDataType = 'array';
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
  public $ruleId;
  /**
   * @var string
   */
  public $triggerType;

  /**
   * @param GoogleCloudContentwarehouseV1Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1Action[]
   */
  public function getActions()
  {
    return $this->actions;
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
  public function setRuleId($ruleId)
  {
    $this->ruleId = $ruleId;
  }
  /**
   * @return string
   */
  public function getRuleId()
  {
    return $this->ruleId;
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
class_alias(GoogleCloudContentwarehouseV1Rule::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1Rule');
