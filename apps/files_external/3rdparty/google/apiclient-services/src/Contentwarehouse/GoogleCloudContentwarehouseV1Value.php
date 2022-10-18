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

class GoogleCloudContentwarehouseV1Value extends \Google\Model
{
  /**
   * @var bool
   */
  public $booleanValue;
  protected $datetimeValueType = GoogleTypeDateTime::class;
  protected $datetimeValueDataType = '';
  protected $enumValueType = GoogleCloudContentwarehouseV1EnumValue::class;
  protected $enumValueDataType = '';
  /**
   * @var float
   */
  public $floatValue;
  /**
   * @var int
   */
  public $intValue;
  /**
   * @var string
   */
  public $stringValue;
  protected $timestampValueType = GoogleCloudContentwarehouseV1TimestampValue::class;
  protected $timestampValueDataType = '';

  /**
   * @param bool
   */
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  /**
   * @return bool
   */
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param GoogleTypeDateTime
   */
  public function setDatetimeValue(GoogleTypeDateTime $datetimeValue)
  {
    $this->datetimeValue = $datetimeValue;
  }
  /**
   * @return GoogleTypeDateTime
   */
  public function getDatetimeValue()
  {
    return $this->datetimeValue;
  }
  /**
   * @param GoogleCloudContentwarehouseV1EnumValue
   */
  public function setEnumValue(GoogleCloudContentwarehouseV1EnumValue $enumValue)
  {
    $this->enumValue = $enumValue;
  }
  /**
   * @return GoogleCloudContentwarehouseV1EnumValue
   */
  public function getEnumValue()
  {
    return $this->enumValue;
  }
  /**
   * @param float
   */
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  /**
   * @return float
   */
  public function getFloatValue()
  {
    return $this->floatValue;
  }
  /**
   * @param int
   */
  public function setIntValue($intValue)
  {
    $this->intValue = $intValue;
  }
  /**
   * @return int
   */
  public function getIntValue()
  {
    return $this->intValue;
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
   * @param GoogleCloudContentwarehouseV1TimestampValue
   */
  public function setTimestampValue(GoogleCloudContentwarehouseV1TimestampValue $timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  /**
   * @return GoogleCloudContentwarehouseV1TimestampValue
   */
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1Value::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1Value');
