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

namespace Google\Service\Compute;

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
  public $ins;
  protected $logConfigsType = LogConfig::class;
  protected $logConfigsDataType = 'array';
  /**
   * @var string[]
   */
  public $notIns;
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
  public function setIns($ins)
  {
    $this->ins = $ins;
  }
  /**
   * @return string[]
   */
  public function getIns()
  {
    return $this->ins;
  }
  /**
   * @param LogConfig[]
   */
  public function setLogConfigs($logConfigs)
  {
    $this->logConfigs = $logConfigs;
  }
  /**
   * @return LogConfig[]
   */
  public function getLogConfigs()
  {
    return $this->logConfigs;
  }
  /**
   * @param string[]
   */
  public function setNotIns($notIns)
  {
    $this->notIns = $notIns;
  }
  /**
   * @return string[]
   */
  public function getNotIns()
  {
    return $this->notIns;
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
class_alias(Rule::class, 'Google_Service_Compute_Rule');
