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

namespace Google\Service\GameServices;

class Rule extends \Google\Collection
{
  protected $collection_key = 'permissions';
  /**
   * @var string
   */
  public $action;
  protected $conditionsType = Condition::class;
  protected $conditionsDataType = 'array';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $in;
  protected $logConfigType = LogConfig::class;
  protected $logConfigDataType = 'array';
  /**
   * @var string[]
   */
  public $notIn;
  /**
   * @var string[]
   */
  public $permissions;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
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
  public function setIn($in)
  {
    $this->in = $in;
  }
  /**
   * @return string[]
   */
  public function getIn()
  {
    return $this->in;
  }
  /**
   * @param LogConfig[]
   */
  public function setLogConfig($logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return LogConfig[]
   */
  public function getLogConfig()
  {
    return $this->logConfig;
  }
  /**
   * @param string[]
   */
  public function setNotIn($notIn)
  {
    $this->notIn = $notIn;
  }
  /**
   * @return string[]
   */
  public function getNotIn()
  {
    return $this->notIn;
  }
  /**
   * @param string[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return string[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Rule::class, 'Google_Service_GameServices_Rule');
