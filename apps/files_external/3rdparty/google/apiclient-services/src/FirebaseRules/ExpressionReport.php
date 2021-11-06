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

namespace Google\Service\FirebaseRules;

class ExpressionReport extends \Google\Collection
{
  protected $collection_key = 'values';
  protected $childrenType = ExpressionReport::class;
  protected $childrenDataType = 'array';
  protected $sourcePositionType = SourcePosition::class;
  protected $sourcePositionDataType = '';
  protected $valuesType = ValueCount::class;
  protected $valuesDataType = 'array';

  /**
   * @param ExpressionReport[]
   */
  public function setChildren($children)
  {
    $this->children = $children;
  }
  /**
   * @return ExpressionReport[]
   */
  public function getChildren()
  {
    return $this->children;
  }
  /**
   * @param SourcePosition
   */
  public function setSourcePosition(SourcePosition $sourcePosition)
  {
    $this->sourcePosition = $sourcePosition;
  }
  /**
   * @return SourcePosition
   */
  public function getSourcePosition()
  {
    return $this->sourcePosition;
  }
  /**
   * @param ValueCount[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return ValueCount[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExpressionReport::class, 'Google_Service_FirebaseRules_ExpressionReport');
