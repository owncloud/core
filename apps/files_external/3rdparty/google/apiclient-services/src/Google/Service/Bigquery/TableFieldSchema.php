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

class Google_Service_Bigquery_TableFieldSchema extends Google_Collection
{
  protected $collection_key = 'fields';
  protected $categoriesType = 'Google_Service_Bigquery_TableFieldSchemaCategories';
  protected $categoriesDataType = '';
  public $description;
  protected $fieldsType = 'Google_Service_Bigquery_TableFieldSchema';
  protected $fieldsDataType = 'array';
  public $maxLength;
  public $mode;
  public $name;
  protected $policyTagsType = 'Google_Service_Bigquery_TableFieldSchemaPolicyTags';
  protected $policyTagsDataType = '';
  public $precision;
  public $scale;
  public $type;

  /**
   * @param Google_Service_Bigquery_TableFieldSchemaCategories
   */
  public function setCategories(Google_Service_Bigquery_TableFieldSchemaCategories $categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return Google_Service_Bigquery_TableFieldSchemaCategories
   */
  public function getCategories()
  {
    return $this->categories;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Bigquery_TableFieldSchema[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return Google_Service_Bigquery_TableFieldSchema[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  public function setMaxLength($maxLength)
  {
    $this->maxLength = $maxLength;
  }
  public function getMaxLength()
  {
    return $this->maxLength;
  }
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  public function getMode()
  {
    return $this->mode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Bigquery_TableFieldSchemaPolicyTags
   */
  public function setPolicyTags(Google_Service_Bigquery_TableFieldSchemaPolicyTags $policyTags)
  {
    $this->policyTags = $policyTags;
  }
  /**
   * @return Google_Service_Bigquery_TableFieldSchemaPolicyTags
   */
  public function getPolicyTags()
  {
    return $this->policyTags;
  }
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  public function getPrecision()
  {
    return $this->precision;
  }
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  public function getScale()
  {
    return $this->scale;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
