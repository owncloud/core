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

namespace Google\Service\Spanner;

class Statement extends \Google\Model
{
  protected $paramTypesType = Type::class;
  protected $paramTypesDataType = 'map';
  /**
   * @var array[]
   */
  public $params;
  /**
   * @var string
   */
  public $sql;

  /**
   * @param Type[]
   */
  public function setParamTypes($paramTypes)
  {
    $this->paramTypes = $paramTypes;
  }
  /**
   * @return Type[]
   */
  public function getParamTypes()
  {
    return $this->paramTypes;
  }
  /**
   * @param array[]
   */
  public function setParams($params)
  {
    $this->params = $params;
  }
  /**
   * @return array[]
   */
  public function getParams()
  {
    return $this->params;
  }
  /**
   * @param string
   */
  public function setSql($sql)
  {
    $this->sql = $sql;
  }
  /**
   * @return string
   */
  public function getSql()
  {
    return $this->sql;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Statement::class, 'Google_Service_Spanner_Statement');
