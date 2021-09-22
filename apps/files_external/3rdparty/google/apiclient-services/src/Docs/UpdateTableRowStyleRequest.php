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

class UpdateTableRowStyleRequest extends \Google\Collection
{
  protected $collection_key = 'rowIndices';
  public $fields;
  public $rowIndices;
  protected $tableRowStyleType = TableRowStyle::class;
  protected $tableRowStyleDataType = '';
  protected $tableStartLocationType = Location::class;
  protected $tableStartLocationDataType = '';

  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  public function setRowIndices($rowIndices)
  {
    $this->rowIndices = $rowIndices;
  }
  public function getRowIndices()
  {
    return $this->rowIndices;
  }
  /**
   * @param TableRowStyle
   */
  public function setTableRowStyle(TableRowStyle $tableRowStyle)
  {
    $this->tableRowStyle = $tableRowStyle;
  }
  /**
   * @return TableRowStyle
   */
  public function getTableRowStyle()
  {
    return $this->tableRowStyle;
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
class_alias(UpdateTableRowStyleRequest::class, 'Google_Service_Docs_UpdateTableRowStyleRequest');
