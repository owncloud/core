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
  public $allowedValues;
  public $category;
  public $consentDefaultValues;
  public $dataMappingDefaultValue;
  public $description;
  public $name;

  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setConsentDefaultValues($consentDefaultValues)
  {
    $this->consentDefaultValues = $consentDefaultValues;
  }
  public function getConsentDefaultValues()
  {
    return $this->consentDefaultValues;
  }
  public function setDataMappingDefaultValue($dataMappingDefaultValue)
  {
    $this->dataMappingDefaultValue = $dataMappingDefaultValue;
  }
  public function getDataMappingDefaultValue()
  {
    return $this->dataMappingDefaultValue;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttributeDefinition::class, 'Google_Service_CloudHealthcare_AttributeDefinition');
