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

class Google_Service_ChromePolicy_Proto2DescriptorProto extends Google_Collection
{
  protected $collection_key = 'oneofDecl';
  protected $enumTypeType = 'Google_Service_ChromePolicy_Proto2EnumDescriptorProto';
  protected $enumTypeDataType = 'array';
  protected $fieldType = 'Google_Service_ChromePolicy_Proto2FieldDescriptorProto';
  protected $fieldDataType = 'array';
  public $name;
  protected $nestedTypeType = 'Google_Service_ChromePolicy_Proto2DescriptorProto';
  protected $nestedTypeDataType = 'array';
  protected $oneofDeclType = 'Google_Service_ChromePolicy_Proto2OneofDescriptorProto';
  protected $oneofDeclDataType = 'array';

  /**
   * @param Google_Service_ChromePolicy_Proto2EnumDescriptorProto[]
   */
  public function setEnumType($enumType)
  {
    $this->enumType = $enumType;
  }
  /**
   * @return Google_Service_ChromePolicy_Proto2EnumDescriptorProto[]
   */
  public function getEnumType()
  {
    return $this->enumType;
  }
  /**
   * @param Google_Service_ChromePolicy_Proto2FieldDescriptorProto[]
   */
  public function setField($field)
  {
    $this->field = $field;
  }
  /**
   * @return Google_Service_ChromePolicy_Proto2FieldDescriptorProto[]
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
   * @param Google_Service_ChromePolicy_Proto2DescriptorProto[]
   */
  public function setNestedType($nestedType)
  {
    $this->nestedType = $nestedType;
  }
  /**
   * @return Google_Service_ChromePolicy_Proto2DescriptorProto[]
   */
  public function getNestedType()
  {
    return $this->nestedType;
  }
  /**
   * @param Google_Service_ChromePolicy_Proto2OneofDescriptorProto[]
   */
  public function setOneofDecl($oneofDecl)
  {
    $this->oneofDecl = $oneofDecl;
  }
  /**
   * @return Google_Service_ChromePolicy_Proto2OneofDescriptorProto[]
   */
  public function getOneofDecl()
  {
    return $this->oneofDecl;
  }
}
