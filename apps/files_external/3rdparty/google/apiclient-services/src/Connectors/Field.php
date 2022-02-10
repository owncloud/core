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
  /**
   * @var array[]
   */
  public $additionalDetails;
  /**
   * @var string
   */
  public $dataType;
  /**
   * @var array
   */
  public $defaultValue;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $field;
  /**
   * @var bool
   */
  public $key;
  /**
   * @var bool
   */
  public $nullable;
  /**
   * @var bool
   */
  public $readonly;

  /**
   * @param array[]
   */
  public function setAdditionalDetails($additionalDetails)
  {
    $this->additionalDetails = $additionalDetails;
  }
  /**
   * @return array[]
   */
  public function getAdditionalDetails()
  {
    return $this->additionalDetails;
  }
  /**
   * @param string
   */
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return string
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param array
   */
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return array
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setField($field)
  {
    $this->field = $field;
  }
  /**
   * @return string
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * @param bool
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return bool
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param bool
   */
  public function setNullable($nullable)
  {
    $this->nullable = $nullable;
  }
  /**
   * @return bool
   */
  public function getNullable()
  {
    return $this->nullable;
  }
  /**
   * @param bool
   */
  public function setReadonly($readonly)
  {
    $this->readonly = $readonly;
  }
  /**
   * @return bool
   */
  public function getReadonly()
  {
    return $this->readonly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Field::class, 'Google_Service_Connectors_Field');
