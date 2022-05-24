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

namespace Google\Service\MyBusinessBusinessInformation;

class AttributeMetadata extends \Google\Collection
{
  protected $collection_key = 'valueMetadata';
  /**
   * @var bool
   */
  public $deprecated;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $groupDisplayName;
  /**
   * @var string
   */
  public $parent;
  /**
   * @var bool
   */
  public $repeatable;
  protected $valueMetadataType = AttributeValueMetadata::class;
  protected $valueMetadataDataType = 'array';
  /**
   * @var string
   */
  public $valueType;

  /**
   * @param bool
   */
  public function setDeprecated($deprecated)
  {
    $this->deprecated = $deprecated;
  }
  /**
   * @return bool
   */
  public function getDeprecated()
  {
    return $this->deprecated;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setGroupDisplayName($groupDisplayName)
  {
    $this->groupDisplayName = $groupDisplayName;
  }
  /**
   * @return string
   */
  public function getGroupDisplayName()
  {
    return $this->groupDisplayName;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
  /**
   * @param bool
   */
  public function setRepeatable($repeatable)
  {
    $this->repeatable = $repeatable;
  }
  /**
   * @return bool
   */
  public function getRepeatable()
  {
    return $this->repeatable;
  }
  /**
   * @param AttributeValueMetadata[]
   */
  public function setValueMetadata($valueMetadata)
  {
    $this->valueMetadata = $valueMetadata;
  }
  /**
   * @return AttributeValueMetadata[]
   */
  public function getValueMetadata()
  {
    return $this->valueMetadata;
  }
  /**
   * @param string
   */
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  /**
   * @return string
   */
  public function getValueType()
  {
    return $this->valueType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttributeMetadata::class, 'Google_Service_MyBusinessBusinessInformation_AttributeMetadata');
