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

namespace Google\Service\TagManager;

class Parameter extends \Google\Collection
{
  protected $collection_key = 'map';
  /**
   * @var string
   */
  public $key;
  protected $listType = Parameter::class;
  protected $listDataType = 'array';
  protected $mapType = Parameter::class;
  protected $mapDataType = 'array';
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Parameter[]
   */
  public function setList($list)
  {
    $this->list = $list;
  }
  /**
   * @return Parameter[]
   */
  public function getList()
  {
    return $this->list;
  }
  /**
   * @param Parameter[]
   */
  public function setMap($map)
  {
    $this->map = $map;
  }
  /**
   * @return Parameter[]
   */
  public function getMap()
  {
    return $this->map;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Parameter::class, 'Google_Service_TagManager_Parameter');
