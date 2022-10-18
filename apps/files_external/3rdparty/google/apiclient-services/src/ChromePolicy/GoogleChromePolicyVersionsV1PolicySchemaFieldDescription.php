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

class GoogleChromePolicyVersionsV1PolicySchemaFieldDescription extends \Google\Collection
{
  protected $collection_key = 'requiredItems';
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
  protected $fieldDependenciesType = GoogleChromePolicyVersionsV1PolicySchemaFieldDependencies::class;
  protected $fieldDependenciesDataType = 'array';
  /**
   * @var string
   */
  public $fieldDescription;
  /**
   * @var string
   */
  public $inputConstraint;
  protected $knownValueDescriptionsType = GoogleChromePolicyVersionsV1PolicySchemaFieldKnownValueDescription::class;
  protected $knownValueDescriptionsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $nestedFieldDescriptionsType = GoogleChromePolicyVersionsV1PolicySchemaFieldDescription::class;
  protected $nestedFieldDescriptionsDataType = 'array';
  protected $requiredItemsType = GoogleChromePolicyVersionsV1PolicySchemaRequiredItems::class;
  protected $requiredItemsDataType = 'array';

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
   * @param GoogleChromePolicyVersionsV1PolicySchemaFieldDependencies[]
   */
  public function setFieldDependencies($fieldDependencies)
  {
    $this->fieldDependencies = $fieldDependencies;
  }
  /**
   * @return GoogleChromePolicyVersionsV1PolicySchemaFieldDependencies[]
   */
  public function getFieldDependencies()
  {
    return $this->fieldDependencies;
  }
  /**
   * @param string
   */
  public function setFieldDescription($fieldDescription)
  {
    $this->fieldDescription = $fieldDescription;
  }
  /**
   * @return string
   */
  public function getFieldDescription()
  {
    return $this->fieldDescription;
  }
  /**
   * @param string
   */
  public function setInputConstraint($inputConstraint)
  {
    $this->inputConstraint = $inputConstraint;
  }
  /**
   * @return string
   */
  public function getInputConstraint()
  {
    return $this->inputConstraint;
  }
  /**
   * @param GoogleChromePolicyVersionsV1PolicySchemaFieldKnownValueDescription[]
   */
  public function setKnownValueDescriptions($knownValueDescriptions)
  {
    $this->knownValueDescriptions = $knownValueDescriptions;
  }
  /**
   * @return GoogleChromePolicyVersionsV1PolicySchemaFieldKnownValueDescription[]
   */
  public function getKnownValueDescriptions()
  {
    return $this->knownValueDescriptions;
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
   * @param GoogleChromePolicyVersionsV1PolicySchemaFieldDescription[]
   */
  public function setNestedFieldDescriptions($nestedFieldDescriptions)
  {
    $this->nestedFieldDescriptions = $nestedFieldDescriptions;
  }
  /**
   * @return GoogleChromePolicyVersionsV1PolicySchemaFieldDescription[]
   */
  public function getNestedFieldDescriptions()
  {
    return $this->nestedFieldDescriptions;
  }
  /**
   * @param GoogleChromePolicyVersionsV1PolicySchemaRequiredItems[]
   */
  public function setRequiredItems($requiredItems)
  {
    $this->requiredItems = $requiredItems;
  }
  /**
   * @return GoogleChromePolicyVersionsV1PolicySchemaRequiredItems[]
   */
  public function getRequiredItems()
  {
    return $this->requiredItems;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyVersionsV1PolicySchemaFieldDescription::class, 'Google_Service_ChromePolicy_GoogleChromePolicyVersionsV1PolicySchemaFieldDescription');
