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

namespace Google\Service\AndroidEnterprise;

class AppRestrictionsSchemaRestriction extends \Google\Collection
{
  protected $collection_key = 'nestedRestriction';
  protected $defaultValueType = AppRestrictionsSchemaRestrictionRestrictionValue::class;
  protected $defaultValueDataType = '';
  public $description;
  public $entry;
  public $entryValue;
  public $key;
  protected $nestedRestrictionType = AppRestrictionsSchemaRestriction::class;
  protected $nestedRestrictionDataType = 'array';
  public $restrictionType;
  public $title;

  /**
   * @param AppRestrictionsSchemaRestrictionRestrictionValue
   */
  public function setDefaultValue(AppRestrictionsSchemaRestrictionRestrictionValue $defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  /**
   * @return AppRestrictionsSchemaRestrictionRestrictionValue
   */
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEntry($entry)
  {
    $this->entry = $entry;
  }
  public function getEntry()
  {
    return $this->entry;
  }
  public function setEntryValue($entryValue)
  {
    $this->entryValue = $entryValue;
  }
  public function getEntryValue()
  {
    return $this->entryValue;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param AppRestrictionsSchemaRestriction[]
   */
  public function setNestedRestriction($nestedRestriction)
  {
    $this->nestedRestriction = $nestedRestriction;
  }
  /**
   * @return AppRestrictionsSchemaRestriction[]
   */
  public function getNestedRestriction()
  {
    return $this->nestedRestriction;
  }
  public function setRestrictionType($restrictionType)
  {
    $this->restrictionType = $restrictionType;
  }
  public function getRestrictionType()
  {
    return $this->restrictionType;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppRestrictionsSchemaRestriction::class, 'Google_Service_AndroidEnterprise_AppRestrictionsSchemaRestriction');
