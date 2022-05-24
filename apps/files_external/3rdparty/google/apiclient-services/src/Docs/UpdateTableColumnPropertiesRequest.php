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

namespace Google\Service\Docs;

class UpdateTableColumnPropertiesRequest extends \Google\Collection
{
  protected $collection_key = 'columnIndices';
  /**
   * @var int[]
   */
  public $columnIndices;
  /**
   * @var string
   */
  public $fields;
  protected $tableColumnPropertiesType = TableColumnProperties::class;
  protected $tableColumnPropertiesDataType = '';
  protected $tableStartLocationType = Location::class;
  protected $tableStartLocationDataType = '';

  /**
   * @param int[]
   */
  public function setColumnIndices($columnIndices)
  {
    $this->columnIndices = $columnIndices;
  }
  /**
   * @return int[]
   */
  public function getColumnIndices()
  {
    return $this->columnIndices;
  }
  /**
   * @param string
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return string
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param TableColumnProperties
   */
  public function setTableColumnProperties(TableColumnProperties $tableColumnProperties)
  {
    $this->tableColumnProperties = $tableColumnProperties;
  }
  /**
   * @return TableColumnProperties
   */
  public function getTableColumnProperties()
  {
    return $this->tableColumnProperties;
  }
  /**
   * @param Location
   */
  public function setTableStartLocation(Location $tableStartLocation)
  {
    $this->tableStartLocation = $tableStartLocation;
  }
  /**
   * @return Location
   */
  public function getTableStartLocation()
  {
    return $this->tableStartLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateTableColumnPropertiesRequest::class, 'Google_Service_Docs_UpdateTableColumnPropertiesRequest');
