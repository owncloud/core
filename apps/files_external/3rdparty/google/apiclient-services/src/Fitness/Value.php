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

namespace Google\Service\Fitness;

class Value extends \Google\Collection
{
  protected $collection_key = 'mapVal';
  public $fpVal;
  /**
   * @var int
   */
  public $intVal;
  protected $mapValType = ValueMapValEntry::class;
  protected $mapValDataType = 'array';
  /**
   * @var string
   */
  public $stringVal;

  public function setFpVal($fpVal)
  {
    $this->fpVal = $fpVal;
  }
  public function getFpVal()
  {
    return $this->fpVal;
  }
  /**
   * @param int
   */
  public function setIntVal($intVal)
  {
    $this->intVal = $intVal;
  }
  /**
   * @return int
   */
  public function getIntVal()
  {
    return $this->intVal;
  }
  /**
   * @param ValueMapValEntry[]
   */
  public function setMapVal($mapVal)
  {
    $this->mapVal = $mapVal;
  }
  /**
   * @return ValueMapValEntry[]
   */
  public function getMapVal()
  {
    return $this->mapVal;
  }
  /**
   * @param string
   */
  public function setStringVal($stringVal)
  {
    $this->stringVal = $stringVal;
  }
  /**
   * @return string
   */
  public function getStringVal()
  {
    return $this->stringVal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Value::class, 'Google_Service_Fitness_Value');
