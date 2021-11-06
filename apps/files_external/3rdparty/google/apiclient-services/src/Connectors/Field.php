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

namespace Google\Service\Connectors;

class Field extends \Google\Model
{
  public $additionalDetails;
  public $dataType;
  public $defaultValue;
  public $description;
  public $field;
  public $key;
  public $nullable;
  public $readonly;

  public function setAdditionalDetails($additionalDetails)
  {
    $this->additionalDetails = $additionalDetails;
  }
  public function getAdditionalDetails()
  {
    return $this->additionalDetails;
  }
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  public function getDataType()
  {
    return $this->dataType;
  }
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setField($field)
  {
    $this->field = $field;
  }
  public function getField()
  {
    return $this->field;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  public function setNullable($nullable)
  {
    $this->nullable = $nullable;
  }
  public function getNullable()
  {
    return $this->nullable;
  }
  public function setReadonly($readonly)
  {
    $this->readonly = $readonly;
  }
  public function getReadonly()
  {
    return $this->readonly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Field::class, 'Google_Service_Connectors_Field');
