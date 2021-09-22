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

namespace Google\Service\Sheets;

class GridData extends \Google\Collection
{
  protected $collection_key = 'rowMetadata';
  protected $columnMetadataType = DimensionProperties::class;
  protected $columnMetadataDataType = 'array';
  protected $rowDataType = RowData::class;
  protected $rowDataDataType = 'array';
  protected $rowMetadataType = DimensionProperties::class;
  protected $rowMetadataDataType = 'array';
  public $startColumn;
  public $startRow;

  /**
   * @param DimensionProperties[]
   */
  public function setColumnMetadata($columnMetadata)
  {
    $this->columnMetadata = $columnMetadata;
  }
  /**
   * @return DimensionProperties[]
   */
  public function getColumnMetadata()
  {
    return $this->columnMetadata;
  }
  /**
   * @param RowData[]
   */
  public function setRowData($rowData)
  {
    $this->rowData = $rowData;
  }
  /**
   * @return RowData[]
   */
  public function getRowData()
  {
    return $this->rowData;
  }
  /**
   * @param DimensionProperties[]
   */
  public function setRowMetadata($rowMetadata)
  {
    $this->rowMetadata = $rowMetadata;
  }
  /**
   * @return DimensionProperties[]
   */
  public function getRowMetadata()
  {
    return $this->rowMetadata;
  }
  public function setStartColumn($startColumn)
  {
    $this->startColumn = $startColumn;
  }
  public function getStartColumn()
  {
    return $this->startColumn;
  }
  public function setStartRow($startRow)
  {
    $this->startRow = $startRow;
  }
  public function getStartRow()
  {
    return $this->startRow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GridData::class, 'Google_Service_Sheets_GridData');
