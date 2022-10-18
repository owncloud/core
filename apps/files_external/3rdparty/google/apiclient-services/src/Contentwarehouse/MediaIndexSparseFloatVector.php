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

namespace Google\Service\Contentwarehouse;

class MediaIndexSparseFloatVector extends \Google\Collection
{
  protected $collection_key = 'values';
  /**
   * @var string[]
   */
  public $columns;
  /**
   * @var string
   */
  public $columnsInt16;
  /**
   * @var int[]
   */
  public $columnsInt32;
  /**
   * @var string[]
   */
  public $columnsInt64;
  /**
   * @var string
   */
  public $columnsInt8;
  /**
   * @var float[]
   */
  public $values;

  /**
   * @param string[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return string[]
   */
  public function getColumns()
  {
    return $this->columns;
  }
  /**
   * @param string
   */
  public function setColumnsInt16($columnsInt16)
  {
    $this->columnsInt16 = $columnsInt16;
  }
  /**
   * @return string
   */
  public function getColumnsInt16()
  {
    return $this->columnsInt16;
  }
  /**
   * @param int[]
   */
  public function setColumnsInt32($columnsInt32)
  {
    $this->columnsInt32 = $columnsInt32;
  }
  /**
   * @return int[]
   */
  public function getColumnsInt32()
  {
    return $this->columnsInt32;
  }
  /**
   * @param string[]
   */
  public function setColumnsInt64($columnsInt64)
  {
    $this->columnsInt64 = $columnsInt64;
  }
  /**
   * @return string[]
   */
  public function getColumnsInt64()
  {
    return $this->columnsInt64;
  }
  /**
   * @param string
   */
  public function setColumnsInt8($columnsInt8)
  {
    $this->columnsInt8 = $columnsInt8;
  }
  /**
   * @return string
   */
  public function getColumnsInt8()
  {
    return $this->columnsInt8;
  }
  /**
   * @param float[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return float[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediaIndexSparseFloatVector::class, 'Google_Service_Contentwarehouse_MediaIndexSparseFloatVector');
