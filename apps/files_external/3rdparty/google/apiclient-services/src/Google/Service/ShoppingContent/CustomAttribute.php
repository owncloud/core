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

class Google_Service_ShoppingContent_CustomAttribute extends Google_Collection
{
  protected $collection_key = 'groupValues';
  protected $groupValuesType = 'Google_Service_ShoppingContent_CustomAttribute';
  protected $groupValuesDataType = 'array';
  public $name;
  public $value;

  /**
   * @param Google_Service_ShoppingContent_CustomAttribute
   */
  public function setGroupValues($groupValues)
  {
    $this->groupValues = $groupValues;
  }
  /**
   * @return Google_Service_ShoppingContent_CustomAttribute
   */
  public function getGroupValues()
  {
    return $this->groupValues;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
}
