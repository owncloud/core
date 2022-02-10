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

namespace Google\Service\Firestore;

class Value extends \Google\Model
{
  protected $arrayValueType = ArrayValue::class;
  protected $arrayValueDataType = '';
  /**
   * @var bool
   */
  public $booleanValue;
  /**
   * @var string
   */
  public $bytesValue;
  public $doubleValue;
  protected $geoPointValueType = LatLng::class;
  protected $geoPointValueDataType = '';
  /**
   * @var string
   */
  public $integerValue;
  protected $mapValueType = MapValue::class;
  protected $mapValueDataType = '';
  /**
   * @var string
   */
  public $nullValue;
  /**
   * @var string
   */
  public $referenceValue;
  /**
   * @var string
   */
  public $stringValue;
  /**
   * @var string
   */
  public $timestampValue;

  /**
   * @param ArrayValue
   */
  public function setArrayValue(ArrayValue $arrayValue)
  {
    $this->arrayValue = $arrayValue;
  }
  /**
   * @return ArrayValue
   */
  public function getArrayValue()
  {
    return $this->arrayValue;
  }
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
   * @param string
   */
  public function setBytesValue($bytesValue)
  {
    $this->bytesValue = $bytesValue;
  }
  /**
   * @return string
   */
  public function getBytesValue()
  {
    return $this->bytesValue;
  }
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  /**
   * @param LatLng
   */
  public function setGeoPointValue(LatLng $geoPointValue)
  {
    $this->geoPointValue = $geoPointValue;
  }
  /**
   * @return LatLng
   */
  public function getGeoPointValue()
  {
    return $this->geoPointValue;
  }
  /**
   * @param string
   */
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
  /**
   * @return string
   */
  public function getIntegerValue()
  {
    return $this->integerValue;
  }
  /**
   * @param MapValue
   */
  public function setMapValue(MapValue $mapValue)
  {
    $this->mapValue = $mapValue;
  }
  /**
   * @return MapValue
   */
  public function getMapValue()
  {
    return $this->mapValue;
  }
  /**
   * @param string
   */
  public function setNullValue($nullValue)
  {
    $this->nullValue = $nullValue;
  }
  /**
   * @return string
   */
  public function getNullValue()
  {
    return $this->nullValue;
  }
  /**
   * @param string
   */
  public function setReferenceValue($referenceValue)
  {
    $this->referenceValue = $referenceValue;
  }
  /**
   * @return string
   */
  public function getReferenceValue()
  {
    return $this->referenceValue;
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
   * @param string
   */
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  /**
   * @return string
   */
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Value::class, 'Google_Service_Firestore_Value');
