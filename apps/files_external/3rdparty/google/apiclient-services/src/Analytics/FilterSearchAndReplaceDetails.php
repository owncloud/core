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

namespace Google\Service\Analytics;

class FilterSearchAndReplaceDetails extends \Google\Model
{
  /**
   * @var bool
   */
  public $caseSensitive;
  /**
   * @var string
   */
  public $field;
  /**
   * @var int
   */
  public $fieldIndex;
  /**
   * @var string
   */
  public $replaceString;
  /**
   * @var string
   */
  public $searchString;

  /**
   * @param bool
   */
  public function setCaseSensitive($caseSensitive)
  {
    $this->caseSensitive = $caseSensitive;
  }
  /**
   * @return bool
   */
  public function getCaseSensitive()
  {
    return $this->caseSensitive;
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
   * @param int
   */
  public function setFieldIndex($fieldIndex)
  {
    $this->fieldIndex = $fieldIndex;
  }
  /**
   * @return int
   */
  public function getFieldIndex()
  {
    return $this->fieldIndex;
  }
  /**
   * @param string
   */
  public function setReplaceString($replaceString)
  {
    $this->replaceString = $replaceString;
  }
  /**
   * @return string
   */
  public function getReplaceString()
  {
    return $this->replaceString;
  }
  /**
   * @param string
   */
  public function setSearchString($searchString)
  {
    $this->searchString = $searchString;
  }
  /**
   * @return string
   */
  public function getSearchString()
  {
    return $this->searchString;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterSearchAndReplaceDetails::class, 'Google_Service_Analytics_FilterSearchAndReplaceDetails');
