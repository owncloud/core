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
  public $blobValue;
  public $booleanValue;
  public $doubleValue;
  protected $entityValueType = Entity::class;
  protected $entityValueDataType = '';
  public $excludeFromIndexes;
  protected $geoPointValueType = LatLng::class;
  protected $geoPointValueDataType = '';
  public $integerValue;
  protected $keyValueType = Key::class;
  protected $keyValueDataType = '';
  public $meaning;
  public $nullValue;
  public $stringValue;
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
  public function setBlobValue($blobValue)
  {
    $this->blobValue = $blobValue;
  }
  public function getBlobValue()
  {
    return $this->blobValue;
  }
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
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
  public function setExcludeFromIndexes($excludeFromIndexes)
  {
    $this->excludeFromIndexes = $excludeFromIndexes;
  }
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
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
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
  public function setMeaning($meaning)
  {
    $this->meaning = $meaning;
  }
  public function getMeaning()
  {
    return $this->meaning;
  }
  public function setNullValue($nullValue)
  {
    $this->nullValue = $nullValue;
  }
  public function getNullValue()
  {
    return $this->nullValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Value::class, 'Google_Service_Datastore_Value');
