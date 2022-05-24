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

namespace Google\Service\ServiceConsumerManagement;

class Field extends \Google\Collection
{
  protected $collection_key = 'options';
  /**
   * @var string
   */
  public $cardinality;
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
  public $kind;
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
  protected $optionsType = Option::class;
  protected $optionsDataType = 'array';
  /**
   * @var bool
   */
  public $packed;
  /**
   * @var string
   */
  public $typeUrl;

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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
   * @param Option[]
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return Option[]
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param bool
   */
  public function setPacked($packed)
  {
    $this->packed = $packed;
  }
  /**
   * @return bool
   */
  public function getPacked()
  {
    return $this->packed;
  }
  /**
   * @param string
   */
  public function setTypeUrl($typeUrl)
  {
    $this->typeUrl = $typeUrl;
  }
  /**
   * @return string
   */
  public function getTypeUrl()
  {
    return $this->typeUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Field::class, 'Google_Service_ServiceConsumerManagement_Field');
