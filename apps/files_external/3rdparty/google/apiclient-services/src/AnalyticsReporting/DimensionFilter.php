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

namespace Google\Service\AnalyticsReporting;

class DimensionFilter extends \Google\Collection
{
  protected $collection_key = 'expressions';
  /**
   * @var bool
   */
  public $caseSensitive;
  /**
   * @var string
   */
  public $dimensionName;
  /**
   * @var string[]
   */
  public $expressions;
  /**
   * @var bool
   */
  public $not;
  /**
   * @var string
   */
  public $operator;

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
  public function setDimensionName($dimensionName)
  {
    $this->dimensionName = $dimensionName;
  }
  /**
   * @return string
   */
  public function getDimensionName()
  {
    return $this->dimensionName;
  }
  /**
   * @param string[]
   */
  public function setExpressions($expressions)
  {
    $this->expressions = $expressions;
  }
  /**
   * @return string[]
   */
  public function getExpressions()
  {
    return $this->expressions;
  }
  /**
   * @param bool
   */
  public function setNot($not)
  {
    $this->not = $not;
  }
  /**
   * @return bool
   */
  public function getNot()
  {
    return $this->not;
  }
  /**
   * @param string
   */
  public function setOperator($operator)
  {
    $this->operator = $operator;
  }
  /**
   * @return string
   */
  public function getOperator()
  {
    return $this->operator;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DimensionFilter::class, 'Google_Service_AnalyticsReporting_DimensionFilter');
