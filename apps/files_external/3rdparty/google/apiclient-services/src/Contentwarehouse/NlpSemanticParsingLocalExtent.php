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

class NlpSemanticParsingLocalExtent extends \Google\Model
{
  /**
   * @var bool
   */
  public $nonSpecificValue;
  /**
   * @var string
   */
  public $units;
  /**
   * @var string
   */
  public $unitsString;
  public $value;
  /**
   * @var string
   */
  public $valueString;

  /**
   * @param bool
   */
  public function setNonSpecificValue($nonSpecificValue)
  {
    $this->nonSpecificValue = $nonSpecificValue;
  }
  /**
   * @return bool
   */
  public function getNonSpecificValue()
  {
    return $this->nonSpecificValue;
  }
  /**
   * @param string
   */
  public function setUnits($units)
  {
    $this->units = $units;
  }
  /**
   * @return string
   */
  public function getUnits()
  {
    return $this->units;
  }
  /**
   * @param string
   */
  public function setUnitsString($unitsString)
  {
    $this->unitsString = $unitsString;
  }
  /**
   * @return string
   */
  public function getUnitsString()
  {
    return $this->unitsString;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param string
   */
  public function setValueString($valueString)
  {
    $this->valueString = $valueString;
  }
  /**
   * @return string
   */
  public function getValueString()
  {
    return $this->valueString;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalExtent::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalExtent');
