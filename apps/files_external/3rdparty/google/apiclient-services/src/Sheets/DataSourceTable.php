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

class DataSourceTable extends \Google\Collection
{
  protected $collection_key = 'sortSpecs';
  /**
   * @var string
   */
  public $columnSelectionType;
  protected $columnsType = DataSourceColumnReference::class;
  protected $columnsDataType = 'array';
  protected $dataExecutionStatusType = DataExecutionStatus::class;
  protected $dataExecutionStatusDataType = '';
  /**
   * @var string
   */
  public $dataSourceId;
  protected $filterSpecsType = FilterSpec::class;
  protected $filterSpecsDataType = 'array';
  /**
   * @var int
   */
  public $rowLimit;
  protected $sortSpecsType = SortSpec::class;
  protected $sortSpecsDataType = 'array';

  /**
   * @param string
   */
  public function setColumnSelectionType($columnSelectionType)
  {
    $this->columnSelectionType = $columnSelectionType;
  }
  /**
   * @return string
   */
  public function getColumnSelectionType()
  {
    return $this->columnSelectionType;
  }
  /**
   * @param DataSourceColumnReference[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return DataSourceColumnReference[]
   */
  public function getColumns()
  {
    return $this->columns;
  }
  /**
   * @param DataExecutionStatus
   */
  public function setDataExecutionStatus(DataExecutionStatus $dataExecutionStatus)
  {
    $this->dataExecutionStatus = $dataExecutionStatus;
  }
  /**
   * @return DataExecutionStatus
   */
  public function getDataExecutionStatus()
  {
    return $this->dataExecutionStatus;
  }
  /**
   * @param string
   */
  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  /**
   * @return string
   */
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  /**
   * @param FilterSpec[]
   */
  public function setFilterSpecs($filterSpecs)
  {
    $this->filterSpecs = $filterSpecs;
  }
  /**
   * @return FilterSpec[]
   */
  public function getFilterSpecs()
  {
    return $this->filterSpecs;
  }
  /**
   * @param int
   */
  public function setRowLimit($rowLimit)
  {
    $this->rowLimit = $rowLimit;
  }
  /**
   * @return int
   */
  public function getRowLimit()
  {
    return $this->rowLimit;
  }
  /**
   * @param SortSpec[]
   */
  public function setSortSpecs($sortSpecs)
  {
    $this->sortSpecs = $sortSpecs;
  }
  /**
   * @return SortSpec[]
   */
  public function getSortSpecs()
  {
    return $this->sortSpecs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSourceTable::class, 'Google_Service_Sheets_DataSourceTable');
