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

class Proto2FieldDescriptorProto extends \Google\Model
{
  /**
   * @var string
   */
  public $defaultValue;
  /**
   * @var string
   */
  public $jsonName;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $number;
  /**
   * @var int
   */
  public $oneofIndex;
  /**
   * @var bool
   */
  public $proto3Optional;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $typeName;

  /**
   * @param string
   */
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return string
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param string
   */
  public function setJsonName($jsonName)
  {
    $this->jsonName = $jsonName;
  }
  /**
   * @return string
   */
  public function getJsonName()
  {
    return $this->jsonName;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }
  /**
   * @return int
   */
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param int
   */
  public function setOneofIndex($oneofIndex)
  {
    $this->oneofIndex = $oneofIndex;
  }
  /**
   * @return int
   */
  public function getOneofIndex()
  {
    return $this->oneofIndex;
  }
  /**
   * @param bool
   */
  public function setProto3Optional($proto3Optional)
  {
    $this->proto3Optional = $proto3Optional;
  }
  /**
   * @return bool
   */
  public function getProto3Optional()
  {
    return $this->proto3Optional;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setTypeName($typeName)
  {
    $this->typeName = $typeName;
  }
  /**
   * @return string
   */
  public function getTypeName()
  {
    return $this->typeName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Proto2FieldDescriptorProto::class, 'Google_Service_ChromePolicy_Proto2FieldDescriptorProto');
