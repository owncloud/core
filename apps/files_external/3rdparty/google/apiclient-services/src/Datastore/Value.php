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

namespace Google\Service\Datastore;

class Value extends \Google\Model
{
  protected $arrayValueType = ArrayValue::class;
  protected $arrayValueDataType = '';
  /**
   * @var string
   */
  public $blobValue;
  /**
   * @var bool
   */
  public $booleanValue;
  public $doubleValue;
  protected $entityValueType = Entity::class;
  protected $entityValueDataType = '';
  /**
   * @var bool
   */
  public $excludeFromIndexes;
  protected $geoPointValueType = LatLng::class;
  protected $geoPointValueDataType = '';
  /**
   * @var string
   */
  public $integerValue;
  protected $keyValueType = Key::class;
  protected $keyValueDataType = '';
  /**
   * @var int
   */
  public $meaning;
  /**
   * @var string
   */
  public $nullValue;
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
   * @param string
   */
  public function setBlobValue($blobValue)
  {
    $this->blobValue = $blobValue;
  }
  /**
   * @return string
   */
  public function getBlobValue()
  {
    return $this->blobValue;
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
  public function setDoubleValue($doubleValue)
  {
    $this->doubleValue = $doubleValue;
  }
  public function getDoubleValue()
  {
    return $this->doubleValue;
  }
  /**
   * @param Entity
   */
  public function setEntityValue(Entity $entityValue)
  {
    $this->entityValue = $entityValue;
  }
  /**
   * @return Entity
   */
  public function getEntityValue()
  {
    return $this->entityValue;
  }
  /**
   * @param bool
   */
  public function setExcludeFromIndexes($excludeFromIndexes)
  {
    $this->excludeFromIndexes = $excludeFromIndexes;
  }
  /**
   * @return bool
   */
  public function getExcludeFromIndexes()
  {
    return $this->excludeFromIndexes;
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
   * @param Key
   */
  public function setKeyValue(Key $keyValue)
  {
    $this->keyValue = $keyValue;
  }
  /**
   * @return Key
   */
  public function getKeyValue()
  {
    return $this->keyValue;
  }
  /**
   * @param int
   */
  public function setMeaning($meaning)
  {
    $this->meaning = $meaning;
  }
  /**
   * @return int
   */
  public function getMeaning()
  {
    return $this->meaning;
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
class_alias(Value::class, 'Google_Service_Datastore_Value');
