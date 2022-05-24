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

namespace Google\Service\Datastore;

class PropertyFilter extends \Google\Model
{
  /**
   * @var string
   */
  public $op;
  protected $propertyType = PropertyReference::class;
  protected $propertyDataType = '';
  protected $valueType = Value::class;
  protected $valueDataType = '';

  /**
   * @param string
   */
  public function setOp($op)
  {
    $this->op = $op;
  }
  /**
   * @return string
   */
  public function getOp()
  {
    return $this->op;
  }
  /**
   * @param PropertyReference
   */
  public function setProperty(PropertyReference $property)
  {
    $this->property = $property;
  }
  /**
   * @return PropertyReference
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param Value
   */
  public function setValue(Value $value)
  {
    $this->value = $value;
  }
  /**
   * @return Value
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertyFilter::class, 'Google_Service_Datastore_PropertyFilter');
