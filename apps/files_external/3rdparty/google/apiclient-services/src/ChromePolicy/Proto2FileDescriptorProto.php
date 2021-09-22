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

class Proto2FileDescriptorProto extends \Google\Collection
{
  protected $collection_key = 'messageType';
  protected $enumTypeType = Proto2EnumDescriptorProto::class;
  protected $enumTypeDataType = 'array';
  protected $messageTypeType = Proto2DescriptorProto::class;
  protected $messageTypeDataType = 'array';
  public $name;
  public $package;
  public $syntax;

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
   * @param Proto2DescriptorProto[]
   */
  public function setMessageType($messageType)
  {
    $this->messageType = $messageType;
  }
  /**
   * @return Proto2DescriptorProto[]
   */
  public function getMessageType()
  {
    return $this->messageType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPackage($package)
  {
    $this->package = $package;
  }
  public function getPackage()
  {
    return $this->package;
  }
  public function setSyntax($syntax)
  {
    $this->syntax = $syntax;
  }
  public function getSyntax()
  {
    return $this->syntax;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Proto2FileDescriptorProto::class, 'Google_Service_ChromePolicy_Proto2FileDescriptorProto');
