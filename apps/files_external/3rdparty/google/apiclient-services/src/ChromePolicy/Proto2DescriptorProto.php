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

namespace Google\Service\ChromePolicy;

class Proto2DescriptorProto extends \Google\Collection
{
  protected $collection_key = 'oneofDecl';
  protected $enumTypeType = Proto2EnumDescriptorProto::class;
  protected $enumTypeDataType = 'array';
  protected $fieldType = Proto2FieldDescriptorProto::class;
  protected $fieldDataType = 'array';
  public $name;
  protected $nestedTypeType = Proto2DescriptorProto::class;
  protected $nestedTypeDataType = 'array';
  protected $oneofDeclType = Proto2OneofDescriptorProto::class;
  protected $oneofDeclDataType = 'array';

  /**
   * @param Proto2EnumDescriptorProto[]
   */
  public function setEnumType($enumType)
  {
    $this->enumType = $enumType;
  }
  /**
   * @return Proto2EnumDescriptorProto[]
   */
  public function getEnumType()
  {
    return $this->enumType;
  }
  /**
   * @param Proto2FieldDescriptorProto[]
   */
  public function setField($field)
  {
    $this->field = $field;
  }
  /**
   * @return Proto2FieldDescriptorProto[]
   */
  public function getField()
  {
    return $this->field;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Proto2DescriptorProto[]
   */
  public function setNestedType($nestedType)
  {
    $this->nestedType = $nestedType;
  }
  /**
   * @return Proto2DescriptorProto[]
   */
  public function getNestedType()
  {
    return $this->nestedType;
  }
  /**
   * @param Proto2OneofDescriptorProto[]
   */
  public function setOneofDecl($oneofDecl)
  {
    $this->oneofDecl = $oneofDecl;
  }
  /**
   * @return Proto2OneofDescriptorProto[]
   */
  public function getOneofDecl()
  {
    return $this->oneofDecl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Proto2DescriptorProto::class, 'Google_Service_ChromePolicy_Proto2DescriptorProto');
