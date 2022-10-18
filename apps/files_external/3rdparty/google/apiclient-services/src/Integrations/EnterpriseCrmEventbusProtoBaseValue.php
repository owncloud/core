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

class EnterpriseCrmEventbusProtoBaseValue extends \Google\Model
{
  protected $baseFunctionType = EnterpriseCrmEventbusProtoFunction::class;
  protected $baseFunctionDataType = '';
  protected $literalValueType = EnterpriseCrmEventbusProtoParameterValueType::class;
  protected $literalValueDataType = '';
  /**
   * @var string
   */
  public $referenceValue;

  /**
   * @param EnterpriseCrmEventbusProtoFunction
   */
  public function setBaseFunction(EnterpriseCrmEventbusProtoFunction $baseFunction)
  {
    $this->baseFunction = $baseFunction;
  }
  /**
   * @return EnterpriseCrmEventbusProtoFunction
   */
  public function getBaseFunction()
  {
    return $this->baseFunction;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParameterValueType
   */
  public function setLiteralValue(EnterpriseCrmEventbusProtoParameterValueType $literalValue)
  {
    $this->literalValue = $literalValue;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParameterValueType
   */
  public function getLiteralValue()
  {
    return $this->literalValue;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoBaseValue::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoBaseValue');
