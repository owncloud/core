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

class EnterpriseCrmFrontendsEventbusProtoParameterValueType extends \Google\Model
{
  protected $booleanArrayType = EnterpriseCrmFrontendsEventbusProtoBooleanParameterArray::class;
  protected $booleanArrayDataType = '';
  /**
   * @var bool
   */
  public $booleanValue;
  protected $doubleArrayType = EnterpriseCrmFrontendsEventbusProtoDoubleParameterArray::class;
  protected $doubleArrayDataType = '';
  public $doubleValue;
  protected $intArrayType = EnterpriseCrmFrontendsEventbusProtoIntParameterArray::class;
  protected $intArrayDataType = '';
  /**
   * @var string
   */
  public $intValue;
  /**
   * @var string
   */
  public $jsonValue;
  protected $protoArrayType = EnterpriseCrmFrontendsEventbusProtoProtoParameterArray::class;
  protected $protoArrayDataType = '';
  /**
   * @var array[]
   */
  public $protoValue;
  protected $serializedObjectValueType = EnterpriseCrmFrontendsEventbusProtoSerializedObjectParameter::class;
  protected $serializedObjectValueDataType = '';
  protected $stringArrayType = EnterpriseCrmFrontendsEventbusProtoStringParameterArray::class;
  protected $stringArrayDataType = '';
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param EnterpriseCrmFrontendsEventbusProtoBooleanParameterArray
   */
  public function setBooleanArray(EnterpriseCrmFrontendsEventbusProtoBooleanParameterArray $booleanArray)
  {
    $this->booleanArray = $booleanArray;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoBooleanParameterArray
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
   * @param EnterpriseCrmFrontendsEventbusProtoDoubleParameterArray
   */
  public function setDoubleArray(EnterpriseCrmFrontendsEventbusProtoDoubleParameterArray $doubleArray)
  {
    $this->doubleArray = $doubleArray;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoDoubleParameterArray
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
   * @param EnterpriseCrmFrontendsEventbusProtoIntParameterArray
   */
  public function setIntArray(EnterpriseCrmFrontendsEventbusProtoIntParameterArray $intArray)
  {
    $this->intArray = $intArray;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoIntParameterArray
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
   * @param string
   */
  public function setJsonValue($jsonValue)
  {
    $this->jsonValue = $jsonValue;
  }
  /**
   * @return string
   */
  public function getJsonValue()
  {
    return $this->jsonValue;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoProtoParameterArray
   */
  public function setProtoArray(EnterpriseCrmFrontendsEventbusProtoProtoParameterArray $protoArray)
  {
    $this->protoArray = $protoArray;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoProtoParameterArray
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
   * @param EnterpriseCrmFrontendsEventbusProtoSerializedObjectParameter
   */
  public function setSerializedObjectValue(EnterpriseCrmFrontendsEventbusProtoSerializedObjectParameter $serializedObjectValue)
  {
    $this->serializedObjectValue = $serializedObjectValue;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoSerializedObjectParameter
   */
  public function getSerializedObjectValue()
  {
    return $this->serializedObjectValue;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoStringParameterArray
   */
  public function setStringArray(EnterpriseCrmFrontendsEventbusProtoStringParameterArray $stringArray)
  {
    $this->stringArray = $stringArray;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoStringParameterArray
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
class_alias(EnterpriseCrmFrontendsEventbusProtoParameterValueType::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoParameterValueType');
