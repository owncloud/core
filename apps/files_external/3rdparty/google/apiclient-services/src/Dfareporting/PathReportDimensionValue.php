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

namespace Google\Service\Dfareporting;

class PathReportDimensionValue extends \Google\Collection
{
  protected $collection_key = 'values';
  /**
   * @var string
   */
  public $dimensionName;
  /**
   * @var string[]
   */
  public $ids;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $matchType;
  /**
   * @var string[]
   */
  public $values;

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
  public function setIds($ids)
  {
    $this->ids = $ids;
  }
  /**
   * @return string[]
   */
  public function getIds()
  {
    return $this->ids;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setMatchType($matchType)
  {
    $this->matchType = $matchType;
  }
  /**
   * @return string
   */
  public function getMatchType()
  {
    return $this->matchType;
  }
  /**
   * @param string[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return string[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PathReportDimensionValue::class, 'Google_Service_Dfareporting_PathReportDimensionValue');
