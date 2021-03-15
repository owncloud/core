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

class Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription extends Google_Collection
{
  protected $collection_key = 'nestedFieldDescriptions';
  public $description;
  public $field;
  public $inputConstraint;
  protected $knownValueDescriptionsType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription';
  protected $knownValueDescriptionsDataType = 'array';
  protected $nestedFieldDescriptionsType = 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription';
  protected $nestedFieldDescriptionsDataType = 'array';

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
  public function setInputConstraint($inputConstraint)
  {
    $this->inputConstraint = $inputConstraint;
  }
  public function getInputConstraint()
  {
    return $this->inputConstraint;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription[]
   */
  public function setKnownValueDescriptions($knownValueDescriptions)
  {
    $this->knownValueDescriptions = $knownValueDescriptions;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription[]
   */
  public function getKnownValueDescriptions()
  {
    return $this->knownValueDescriptions;
  }
  /**
   * @param Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function setNestedFieldDescriptions($nestedFieldDescriptions)
  {
    $this->nestedFieldDescriptions = $nestedFieldDescriptions;
  }
  /**
   * @return Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function getNestedFieldDescriptions()
  {
    return $this->nestedFieldDescriptions;
  }
}
