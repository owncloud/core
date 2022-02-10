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

class GoogleChromePolicyV1PolicySchemaFieldDescription extends \Google\Collection
{
  protected $collection_key = 'nestedFieldDescriptions';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $field;
  protected $fieldDependenciesType = GoogleChromePolicyV1PolicySchemaFieldDependencies::class;
  protected $fieldDependenciesDataType = 'array';
  /**
   * @var string
   */
  public $inputConstraint;
  protected $knownValueDescriptionsType = GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription::class;
  protected $knownValueDescriptionsDataType = 'array';
  protected $nestedFieldDescriptionsType = GoogleChromePolicyV1PolicySchemaFieldDescription::class;
  protected $nestedFieldDescriptionsDataType = 'array';

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
   * @param GoogleChromePolicyV1PolicySchemaFieldDependencies[]
   */
  public function setFieldDependencies($fieldDependencies)
  {
    $this->fieldDependencies = $fieldDependencies;
  }
  /**
   * @return GoogleChromePolicyV1PolicySchemaFieldDependencies[]
   */
  public function getFieldDependencies()
  {
    return $this->fieldDependencies;
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
   * @param GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription[]
   */
  public function setKnownValueDescriptions($knownValueDescriptions)
  {
    $this->knownValueDescriptions = $knownValueDescriptions;
  }
  /**
   * @return GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription[]
   */
  public function getKnownValueDescriptions()
  {
    return $this->knownValueDescriptions;
  }
  /**
   * @param GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function setNestedFieldDescriptions($nestedFieldDescriptions)
  {
    $this->nestedFieldDescriptions = $nestedFieldDescriptions;
  }
  /**
   * @return GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function getNestedFieldDescriptions()
  {
    return $this->nestedFieldDescriptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyV1PolicySchemaFieldDescription::class, 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription');
