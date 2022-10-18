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

class EnterpriseCrmEventbusProtoParameterValueType extends \Google\Model
{
  protected $booleanArrayType = EnterpriseCrmEventbusProtoBooleanParameterArray::class;
  protected $booleanArrayDataType = '';
  /**
   * @var bool
   */
  public $booleanValue;
  protected $doubleArrayType = EnterpriseCrmEventbusProtoDoubleParameterArray::class;
  protected $doubleArrayDataType = '';
  public $doubleValue;
  protected $intArrayType = EnterpriseCrmEventbusProtoIntParameterArray::class;
  protected $intArrayDataType = '';
  /**
   * @var string
   */
  public $intValue;
  protected $protoArrayType = EnterpriseCrmEventbusProtoProtoParameterArray::class;
  protected $protoArrayDataType = '';
  /**
   * @var array[]
   */
  public $protoValue;
  protected $serializedObjectValueType = EnterpriseCrmEventbusProtoSerializedObjectParameter::class;
  protected $serializedObjectValueDataType = '';
  protected $stringArrayType = EnterpriseCrmEventbusProtoStringParameterArray::class;
  protected $stringArrayDataType = '';
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param EnterpriseCrmEventbusProtoBooleanParameterArray
   */
  public function setBooleanArray(EnterpriseCrmEventbusProtoBooleanParameterArray $booleanArray)
  {
    $this->booleanArray = $booleanArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoBooleanParameterArray
   */
  public function getBooleanArray()
  {
    return $this->booleanArray;
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
   * @param EnterpriseCrmEventbusProtoDoubleParameterArray
   */
  public function setDoubleArray(EnterpriseCrmEventbusProtoDoubleParameterArray $doubleArray)
  {
    $this->doubleArray = $doubleArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoDoubleParameterArray
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
   * @param EnterpriseCrmEventbusProtoIntParameterArray
   */
  public function setIntArray(EnterpriseCrmEventbusProtoIntParameterArray $intArray)
  {
    $this->intArray = $intArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoIntParameterArray
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
   * @param EnterpriseCrmEventbusProtoProtoParameterArray
   */
  public function setProtoArray(EnterpriseCrmEventbusProtoProtoParameterArray $protoArray)
  {
    $this->protoArray = $protoArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoProtoParameterArray
   */
  public function getProtoArray()
  {
    return $this->protoArray;
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
   * @param EnterpriseCrmEventbusProtoSerializedObjectParameter
   */
  public function setSerializedObjectValue(EnterpriseCrmEventbusProtoSerializedObjectParameter $serializedObjectValue)
  {
    $this->serializedObjectValue = $serializedObjectValue;
  }
  /**
   * @return EnterpriseCrmEventbusProtoSerializedObjectParameter
   */
  public function getSerializedObjectValue()
  {
    return $this->serializedObjectValue;
  }
  /**
   * @param EnterpriseCrmEventbusProtoStringParameterArray
   */
  public function setStringArray(EnterpriseCrmEventbusProtoStringParameterArray $stringArray)
  {
    $this->stringArray = $stringArray;
  }
  /**
   * @return EnterpriseCrmEventbusProtoStringParameterArray
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
class_alias(EnterpriseCrmEventbusProtoParameterValueType::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoParameterValueType');
