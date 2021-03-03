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

class Google_Service_Sheets_DataSourceTable extends Google_Collection
{
  protected $collection_key = 'sortSpecs';
  public $columnSelectionType;
  protected $columnsType = 'Google_Service_Sheets_DataSourceColumnReference';
  protected $columnsDataType = 'array';
  protected $dataExecutionStatusType = 'Google_Service_Sheets_DataExecutionStatus';
  protected $dataExecutionStatusDataType = '';
  public $dataSourceId;
  protected $filterSpecsType = 'Google_Service_Sheets_FilterSpec';
  protected $filterSpecsDataType = 'array';
  public $rowLimit;
  protected $sortSpecsType = 'Google_Service_Sheets_SortSpec';
  protected $sortSpecsDataType = 'array';

  public function setColumnSelectionType($columnSelectionType)
  {
    $this->columnSelectionType = $columnSelectionType;
  }
  public function getColumnSelectionType()
  {
    return $this->columnSelectionType;
  }
  /**
   * @param Google_Service_Sheets_DataSourceColumnReference[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return Google_Service_Sheets_DataSourceColumnReference[]
   */
  public function getColumns()
  {
    return $this->columns;
  }
  /**
   * @param Google_Service_Sheets_DataExecutionStatus
   */
  public function setDataExecutionStatus(Google_Service_Sheets_DataExecutionStatus $dataExecutionStatus)
  {
    $this->dataExecutionStatus = $dataExecutionStatus;
  }
  /**
   * @return Google_Service_Sheets_DataExecutionStatus
   */
  public function getDataExecutionStatus()
  {
    return $this->dataExecutionStatus;
  }
  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  /**
   * @param Google_Service_Sheets_FilterSpec[]
   */
  public function setFilterSpecs($filterSpecs)
  {
    $this->filterSpecs = $filterSpecs;
  }
  /**
   * @return Google_Service_Sheets_FilterSpec[]
   */
  public function getFilterSpecs()
  {
    return $this->filterSpecs;
  }
  public function setRowLimit($rowLimit)
  {
    $this->rowLimit = $rowLimit;
  }
  public function getRowLimit()
  {
    return $this->rowLimit;
  }
  /**
   * @param Google_Service_Sheets_SortSpec[]
   */
  public function setSortSpecs($sortSpecs)
  {
    $this->sortSpecs = $sortSpecs;
  }
  /**
   * @return Google_Service_Sheets_SortSpec[]
   */
  public function getSortSpecs()
  {
    return $this->sortSpecs;
  }
}
