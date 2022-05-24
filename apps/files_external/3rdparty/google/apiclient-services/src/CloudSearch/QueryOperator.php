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

namespace Google\Service\CloudSearch;

class QueryOperator extends \Google\Collection
{
  protected $collection_key = 'enumValues';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $enumValues;
  /**
   * @var string
   */
  public $greaterThanOperatorName;
  /**
   * @var bool
   */
  public $isFacetable;
  /**
   * @var bool
   */
  public $isRepeatable;
  /**
   * @var bool
   */
  public $isReturnable;
  /**
   * @var bool
   */
  public $isSortable;
  /**
   * @var bool
   */
  public $isSuggestable;
  /**
   * @var string
   */
  public $lessThanOperatorName;
  /**
   * @var string
   */
  public $objectType;
  /**
   * @var string
   */
  public $operatorName;
  /**
   * @var string
   */
  public $type;

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
   * @param string[]
   */
  public function setEnumValues($enumValues)
  {
    $this->enumValues = $enumValues;
  }
  /**
   * @return string[]
   */
  public function getEnumValues()
  {
    return $this->enumValues;
  }
  /**
   * @param string
   */
  public function setGreaterThanOperatorName($greaterThanOperatorName)
  {
    $this->greaterThanOperatorName = $greaterThanOperatorName;
  }
  /**
   * @return string
   */
  public function getGreaterThanOperatorName()
  {
    return $this->greaterThanOperatorName;
  }
  /**
   * @param bool
   */
  public function setIsFacetable($isFacetable)
  {
    $this->isFacetable = $isFacetable;
  }
  /**
   * @return bool
   */
  public function getIsFacetable()
  {
    return $this->isFacetable;
  }
  /**
   * @param bool
   */
  public function setIsRepeatable($isRepeatable)
  {
    $this->isRepeatable = $isRepeatable;
  }
  /**
   * @return bool
   */
  public function getIsRepeatable()
  {
    return $this->isRepeatable;
  }
  /**
   * @param bool
   */
  public function setIsReturnable($isReturnable)
  {
    $this->isReturnable = $isReturnable;
  }
  /**
   * @return bool
   */
  public function getIsReturnable()
  {
    return $this->isReturnable;
  }
  /**
   * @param bool
   */
  public function setIsSortable($isSortable)
  {
    $this->isSortable = $isSortable;
  }
  /**
   * @return bool
   */
  public function getIsSortable()
  {
    return $this->isSortable;
  }
  /**
   * @param bool
   */
  public function setIsSuggestable($isSuggestable)
  {
    $this->isSuggestable = $isSuggestable;
  }
  /**
   * @return bool
   */
  public function getIsSuggestable()
  {
    return $this->isSuggestable;
  }
  /**
   * @param string
   */
  public function setLessThanOperatorName($lessThanOperatorName)
  {
    $this->lessThanOperatorName = $lessThanOperatorName;
  }
  /**
   * @return string
   */
  public function getLessThanOperatorName()
  {
    return $this->lessThanOperatorName;
  }
  /**
   * @param string
   */
  public function setObjectType($objectType)
  {
    $this->objectType = $objectType;
  }
  /**
   * @return string
   */
  public function getObjectType()
  {
    return $this->objectType;
  }
  /**
   * @param string
   */
  public function setOperatorName($operatorName)
  {
    $this->operatorName = $operatorName;
  }
  /**
   * @return string
   */
  public function getOperatorName()
  {
    return $this->operatorName;
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
class_alias(QueryOperator::class, 'Google_Service_CloudSearch_QueryOperator');
