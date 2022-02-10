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

namespace Google\Service\CloudHealthcare;

class AttributeDefinition extends \Google\Collection
{
  protected $collection_key = 'consentDefaultValues';
  /**
   * @var string[]
   */
  public $allowedValues;
  /**
   * @var string
   */
  public $category;
  /**
   * @var string[]
   */
  public $consentDefaultValues;
  /**
   * @var string
   */
  public $dataMappingDefaultValue;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string[]
   */
  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  /**
   * @return string[]
   */
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string[]
   */
  public function setConsentDefaultValues($consentDefaultValues)
  {
    $this->consentDefaultValues = $consentDefaultValues;
  }
  /**
   * @return string[]
   */
  public function getConsentDefaultValues()
  {
    return $this->consentDefaultValues;
  }
  /**
   * @param string
   */
  public function setDataMappingDefaultValue($dataMappingDefaultValue)
  {
    $this->dataMappingDefaultValue = $dataMappingDefaultValue;
  }
  /**
   * @return string
   */
  public function getDataMappingDefaultValue()
  {
    return $this->dataMappingDefaultValue;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttributeDefinition::class, 'Google_Service_CloudHealthcare_AttributeDefinition');
