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

class EnterpriseCrmEventbusProtoField extends \Google\Model
{
  /**
   * @var string
   */
  public $cardinality;
  protected $defaultValueType = EnterpriseCrmEventbusProtoParameterValueType::class;
  protected $defaultValueDataType = '';
  /**
   * @var string
   */
  public $fieldType;
  /**
   * @var string
   */
  public $protoDefPath;
  /**
   * @var string
   */
  public $referenceKey;
  protected $transformExpressionType = EnterpriseCrmEventbusProtoTransformExpression::class;
  protected $transformExpressionDataType = '';

  /**
   * @param string
   */
  public function setCardinality($cardinality)
  {
    $this->cardinality = $cardinality;
  }
  /**
   * @return string
   */
  public function getCardinality()
  {
    return $this->cardinality;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParameterValueType
   */
  public function setDefaultValue(EnterpriseCrmEventbusProtoParameterValueType $defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParameterValueType
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param string
   */
  public function setFieldType($fieldType)
  {
    $this->fieldType = $fieldType;
  }
  /**
   * @return string
   */
  public function getFieldType()
  {
    return $this->fieldType;
  }
  /**
   * @param string
   */
  public function setProtoDefPath($protoDefPath)
  {
    $this->protoDefPath = $protoDefPath;
  }
  /**
   * @return string
   */
  public function getProtoDefPath()
  {
    return $this->protoDefPath;
  }
  /**
   * @param string
   */
  public function setReferenceKey($referenceKey)
  {
    $this->referenceKey = $referenceKey;
  }
  /**
   * @return string
   */
  public function getReferenceKey()
  {
    return $this->referenceKey;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTransformExpression
   */
  public function setTransformExpression(EnterpriseCrmEventbusProtoTransformExpression $transformExpression)
  {
    $this->transformExpression = $transformExpression;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTransformExpression
   */
  public function getTransformExpression()
  {
    return $this->transformExpression;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoField::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoField');
