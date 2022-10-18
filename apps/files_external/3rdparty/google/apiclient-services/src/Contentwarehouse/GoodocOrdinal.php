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

class GoodocOrdinal extends \Google\Model
{
  /**
   * @var string
   */
  public $implicit;
  /**
   * @var string
   */
  public $sectionStringValue;
  /**
   * @var int
   */
  public $sectionValue;
  /**
   * @var string
   */
  public $sectionValueType;
  /**
   * @var string
   */
  public $stringValue;
  /**
   * @var int
   */
  public $value;
  /**
   * @var string
   */
  public $valueDelta;
  /**
   * @var string
   */
  public $valueType;

  /**
   * @param string
   */
  public function setImplicit($implicit)
  {
    $this->implicit = $implicit;
  }
  /**
   * @return string
   */
  public function getImplicit()
  {
    return $this->implicit;
  }
  /**
   * @param string
   */
  public function setSectionStringValue($sectionStringValue)
  {
    $this->sectionStringValue = $sectionStringValue;
  }
  /**
   * @return string
   */
  public function getSectionStringValue()
  {
    return $this->sectionStringValue;
  }
  /**
   * @param int
   */
  public function setSectionValue($sectionValue)
  {
    $this->sectionValue = $sectionValue;
  }
  /**
   * @return int
   */
  public function getSectionValue()
  {
    return $this->sectionValue;
  }
  /**
   * @param string
   */
  public function setSectionValueType($sectionValueType)
  {
    $this->sectionValueType = $sectionValueType;
  }
  /**
   * @return string
   */
  public function getSectionValueType()
  {
    return $this->sectionValueType;
  }
  /**
   * @param string
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
  /**
   * @param int
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return int
   */
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param string
   */
  public function setValueDelta($valueDelta)
  {
    $this->valueDelta = $valueDelta;
  }
  /**
   * @return string
   */
  public function getValueDelta()
  {
    return $this->valueDelta;
  }
  /**
   * @param string
   */
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  /**
   * @return string
   */
  public function getValueType()
  {
    return $this->valueType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocOrdinal::class, 'Google_Service_Contentwarehouse_GoodocOrdinal');
