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

namespace Google\Service\Reports;

class NestedParameter extends \Google\Collection
{
  protected $collection_key = 'multiValue';
  /**
   * @var bool
   */
  public $boolValue;
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var bool[]
   */
  public $multiBoolValue;
  /**
   * @var string[]
   */
  public $multiIntValue;
  /**
   * @var string[]
   */
  public $multiValue;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $value;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param string
   */
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  /**
   * @return string
   */
  public function getIntValue()
  {
    return $this->intValue;
  }
  /**
   * @param bool[]
   */
  public function setMultiBoolValue($multiBoolValue)
  {
    $this->multiBoolValue = $multiBoolValue;
  }
  /**
   * @return bool[]
   */
  public function getMultiBoolValue()
  {
    return $this->multiBoolValue;
  }
  /**
   * @param string[]
   */
  public function setMultiIntValue($multiIntValue)
  {
    $this->multiIntValue = $multiIntValue;
  }
  /**
   * @return string[]
   */
  public function getMultiIntValue()
  {
    return $this->multiIntValue;
  }
  /**
   * @param string[]
   */
  public function setMultiValue($multiValue)
  {
    $this->multiValue = $multiValue;
  }
  /**
   * @return string[]
   */
  public function getMultiValue()
  {
    return $this->multiValue;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
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
class_alias(NestedParameter::class, 'Google_Service_Reports_NestedParameter');
