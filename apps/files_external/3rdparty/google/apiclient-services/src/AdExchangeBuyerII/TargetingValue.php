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

namespace Google\Service\AdExchangeBuyerII;

class TargetingValue extends \Google\Model
{
  protected $creativeSizeValueType = CreativeSize::class;
  protected $creativeSizeValueDataType = '';
  protected $dayPartTargetingValueType = DayPartTargeting::class;
  protected $dayPartTargetingValueDataType = '';
  /**
   * @var string
   */
  public $longValue;
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param CreativeSize
   */
  public function setCreativeSizeValue(CreativeSize $creativeSizeValue)
  {
    $this->creativeSizeValue = $creativeSizeValue;
  }
  /**
   * @return CreativeSize
   */
  public function getCreativeSizeValue()
  {
    return $this->creativeSizeValue;
  }
  /**
   * @param DayPartTargeting
   */
  public function setDayPartTargetingValue(DayPartTargeting $dayPartTargetingValue)
  {
    $this->dayPartTargetingValue = $dayPartTargetingValue;
  }
  /**
   * @return DayPartTargeting
   */
  public function getDayPartTargetingValue()
  {
    return $this->dayPartTargetingValue;
  }
  /**
   * @param string
   */
  public function setLongValue($longValue)
  {
    $this->longValue = $longValue;
  }
  /**
   * @return string
   */
  public function getLongValue()
  {
    return $this->longValue;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetingValue::class, 'Google_Service_AdExchangeBuyerII_TargetingValue');
