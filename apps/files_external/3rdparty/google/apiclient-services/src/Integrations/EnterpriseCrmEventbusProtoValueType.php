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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoValueType extends \Google\Model
{
  /**
   * @var bool
   */
  public $booleanValue;
  protected $doubleArrayType = EnterpriseCrmEventbusProtoDoubleArray::class;
  protected $doubleArrayDataType = '';
  public $doubleValue;
  protected $intArrayType = EnterpriseCrmEventbusProtoIntArray::class;
  protected $intArrayDataType = '';
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var array[]
   */
  public $protoValue;
  protected $stringArrayType = EnterpriseCrmEventbusProtoStringArray::class;
  protected $stringArrayDataType = '';
  /**
   * @var string
   */
  public $stringValue;

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
   * @param EnterpriseCrmEventbusProtoDoubleArray
   */
  public function setDoubleArray(EnterpriseCrmEventbusProtoDoubleArray $doubleArray)
  {
    $this->doubleArray = $doubleArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoDoubleArray
   */
  public function getDoubleArray()
  {
    return $this->doubleArray;
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
   * @param EnterpriseCrmEventbusProtoIntArray
   */
  public function setIntArray(EnterpriseCrmEventbusProtoIntArray $intArray)
  {
    $this->intArray = $intArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoIntArray
   */
  public function getIntArray()
  {
    return $this->intArray;
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
   * @param array[]
   */
  public function setProtoValue($protoValue)
  {
    $this->protoValue = $protoValue;
  }
  /**
   * @return array[]
   */
  public function getProtoValue()
  {
    return $this->protoValue;
  }
  /**
   * @param EnterpriseCrmEventbusProtoStringArray
   */
  public function setStringArray(EnterpriseCrmEventbusProtoStringArray $stringArray)
  {
    $this->stringArray = $stringArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoStringArray
   */
  public function getStringArray()
  {
    return $this->stringArray;
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
class_alias(EnterpriseCrmEventbusProtoValueType::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoValueType');
