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

namespace Google\Service\AndroidManagement;

class ManagedProperty extends \Google\Collection
{
  protected $collection_key = 'nestedProperties';
  /**
   * @var array
   */
  public $defaultValue;
  /**
   * @var string
   */
  public $description;
  protected $entriesType = ManagedPropertyEntry::class;
  protected $entriesDataType = 'array';
  /**
   * @var string
   */
  public $key;
  protected $nestedPropertiesType = ManagedProperty::class;
  protected $nestedPropertiesDataType = 'array';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $type;

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
   * @param ManagedPropertyEntry[]
   */
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  /**
   * @return ManagedPropertyEntry[]
   */
  public function getEntries()
  {
    return $this->entries;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param ManagedProperty[]
   */
  public function setNestedProperties($nestedProperties)
  {
    $this->nestedProperties = $nestedProperties;
  }
  /**
   * @return ManagedProperty[]
   */
  public function getNestedProperties()
  {
    return $this->nestedProperties;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
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
class_alias(ManagedProperty::class, 'Google_Service_AndroidManagement_ManagedProperty');
