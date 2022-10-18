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

namespace Google\Service\Datastream;

class PostgresqlColumn extends \Google\Model
{
  /**
   * @var string
   */
  public $column;
  /**
   * @var string
   */
  public $dataType;
  /**
   * @var int
   */
  public $length;
  /**
   * @var bool
   */
  public $nullable;
  /**
   * @var int
   */
  public $ordinalPosition;
  /**
   * @var int
   */
  public $precision;
  /**
   * @var bool
   */
  public $primaryKey;
  /**
   * @var int
   */
  public $scale;

  /**
   * @param string
   */
  public function setColumn($column)
  {
    $this->column = $column;
  }
  /**
   * @return string
   */
  public function getColumn()
  {
    return $this->column;
  }
  /**
   * @param string
   */
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return string
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param int
   */
  public function setLength($length)
  {
    $this->length = $length;
  }
  /**
   * @return int
   */
  public function getLength()
  {
    return $this->length;
  }
  /**
   * @param bool
   */
  public function setNullable($nullable)
  {
    $this->nullable = $nullable;
  }
  /**
   * @return bool
   */
  public function getNullable()
  {
    return $this->nullable;
  }
  /**
   * @param int
   */
  public function setOrdinalPosition($ordinalPosition)
  {
    $this->ordinalPosition = $ordinalPosition;
  }
  /**
   * @return int
   */
  public function getOrdinalPosition()
  {
    return $this->ordinalPosition;
  }
  /**
   * @param int
   */
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  /**
   * @return int
   */
  public function getPrecision()
  {
    return $this->precision;
  }
  /**
   * @param bool
   */
  public function setPrimaryKey($primaryKey)
  {
    $this->primaryKey = $primaryKey;
  }
  /**
   * @return bool
   */
  public function getPrimaryKey()
  {
    return $this->primaryKey;
  }
  /**
   * @param int
   */
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  /**
   * @return int
   */
  public function getScale()
  {
    return $this->scale;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PostgresqlColumn::class, 'Google_Service_Datastream_PostgresqlColumn');
