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

namespace Google\Service\Spanner;

class Type extends \Google\Model
{
  protected $arrayElementTypeType = Type::class;
  protected $arrayElementTypeDataType = '';
  /**
   * @var string
   */
  public $code;
  protected $structTypeType = StructType::class;
  protected $structTypeDataType = '';
  /**
   * @var string
   */
  public $typeAnnotation;

  /**
   * @param Type
   */
  public function setArrayElementType(Type $arrayElementType)
  {
    $this->arrayElementType = $arrayElementType;
  }
  /**
   * @return Type
   */
  public function getArrayElementType()
  {
    return $this->arrayElementType;
  }
  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param StructType
   */
  public function setStructType(StructType $structType)
  {
    $this->structType = $structType;
  }
  /**
   * @return StructType
   */
  public function getStructType()
  {
    return $this->structType;
  }
  /**
   * @param string
   */
  public function setTypeAnnotation($typeAnnotation)
  {
    $this->typeAnnotation = $typeAnnotation;
  }
  /**
   * @return string
   */
  public function getTypeAnnotation()
  {
    return $this->typeAnnotation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Type::class, 'Google_Service_Spanner_Type');
