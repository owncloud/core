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

namespace Google\Service\AccessContextManager;

class BasicLevel extends \Google\Collection
{
  protected $collection_key = 'conditions';
  public $combiningFunction;
  protected $conditionsType = Condition::class;
  protected $conditionsDataType = 'array';

  public function setCombiningFunction($combiningFunction)
  {
    $this->combiningFunction = $combiningFunction;
  }
  public function getCombiningFunction()
  {
    return $this->combiningFunction;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasicLevel::class, 'Google_Service_AccessContextManager_BasicLevel');
