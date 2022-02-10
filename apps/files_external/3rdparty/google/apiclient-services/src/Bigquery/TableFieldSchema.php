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

namespace Google\Service\Bigquery;

class TableFieldSchema extends \Google\Collection
{
  protected $collection_key = 'fields';
  protected $categoriesType = TableFieldSchemaCategories::class;
  protected $categoriesDataType = '';
  /**
   * @var string
   */
  public $collationSpec;
  /**
   * @var string
   */
  public $description;
  protected $fieldsType = TableFieldSchema::class;
  protected $fieldsDataType = 'array';
  /**
   * @var string
   */
  public $maxLength;
  /**
   * @var string
   */
  public $mode;
  /**
   * @var string
   */
  public $name;
  protected $policyTagsType = TableFieldSchemaPolicyTags::class;
  protected $policyTagsDataType = '';
  /**
   * @var string
   */
  public $precision;
  /**
   * @var string
   */
  public $scale;
  /**
   * @var string
   */
  public $type;

  /**
   * @param TableFieldSchemaCategories
   */
  public function setCategories(TableFieldSchemaCategories $categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return TableFieldSchemaCategories
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param string
   */
  public function setCollationSpec($collationSpec)
  {
    $this->collationSpec = $collationSpec;
  }
  /**
   * @return string
   */
  public function getCollationSpec()
  {
    return $this->collationSpec;
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
   * @param TableFieldSchema[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return TableFieldSchema[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param string
   */
  public function setMaxLength($maxLength)
  {
    $this->maxLength = $maxLength;
  }
  /**
   * @return string
   */
  public function getMaxLength()
  {
    return $this->maxLength;
  }
  /**
   * @param string
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
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
   * @param TableFieldSchemaPolicyTags
   */
  public function setPolicyTags(TableFieldSchemaPolicyTags $policyTags)
  {
    $this->policyTags = $policyTags;
  }
  /**
   * @return TableFieldSchemaPolicyTags
   */
  public function getPolicyTags()
  {
    return $this->policyTags;
  }
  /**
   * @param string
   */
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  /**
   * @return string
   */
  public function getPrecision()
  {
    return $this->precision;
  }
  /**
   * @param string
   */
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  /**
   * @return string
   */
  public function getScale()
  {
    return $this->scale;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableFieldSchema::class, 'Google_Service_Bigquery_TableFieldSchema');
