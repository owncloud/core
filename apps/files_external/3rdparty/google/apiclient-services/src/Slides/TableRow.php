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

namespace Google\Service\Slides;

class TableRow extends \Google\Collection
{
  protected $collection_key = 'tableCells';
  protected $rowHeightType = Dimension::class;
  protected $rowHeightDataType = '';
  protected $tableCellsType = TableCell::class;
  protected $tableCellsDataType = 'array';
  protected $tableRowPropertiesType = TableRowProperties::class;
  protected $tableRowPropertiesDataType = '';

  /**
   * @param Dimension
   */
  public function setRowHeight(Dimension $rowHeight)
  {
    $this->rowHeight = $rowHeight;
  }
  /**
   * @return Dimension
   */
  public function getRowHeight()
  {
    return $this->rowHeight;
  }
  /**
   * @param TableCell[]
   */
  public function setTableCells($tableCells)
  {
    $this->tableCells = $tableCells;
  }
  /**
   * @return TableCell[]
   */
  public function getTableCells()
  {
    return $this->tableCells;
  }
  /**
   * @param TableRowProperties
   */
  public function setTableRowProperties(TableRowProperties $tableRowProperties)
  {
    $this->tableRowProperties = $tableRowProperties;
  }
  /**
   * @return TableRowProperties
   */
  public function getTableRowProperties()
  {
    return $this->tableRowProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableRow::class, 'Google_Service_Slides_TableRow');
