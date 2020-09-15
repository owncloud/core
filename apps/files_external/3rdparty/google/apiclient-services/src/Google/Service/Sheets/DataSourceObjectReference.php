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

class Google_Service_Sheets_DataSourceObjectReference extends Google_Model
{
  public $chartId;
  protected $dataSourceFormulaCellType = 'Google_Service_Sheets_GridCoordinate';
  protected $dataSourceFormulaCellDataType = '';
  protected $dataSourcePivotTableAnchorCellType = 'Google_Service_Sheets_GridCoordinate';
  protected $dataSourcePivotTableAnchorCellDataType = '';
  protected $dataSourceTableAnchorCellType = 'Google_Service_Sheets_GridCoordinate';
  protected $dataSourceTableAnchorCellDataType = '';
  public $sheetId;

  public function setChartId($chartId)
  {
    $this->chartId = $chartId;
  }
  public function getChartId()
  {
    return $this->chartId;
  }
  /**
   * @param Google_Service_Sheets_GridCoordinate
   */
  public function setDataSourceFormulaCell(Google_Service_Sheets_GridCoordinate $dataSourceFormulaCell)
  {
    $this->dataSourceFormulaCell = $dataSourceFormulaCell;
  }
  /**
   * @return Google_Service_Sheets_GridCoordinate
   */
  public function getDataSourceFormulaCell()
  {
    return $this->dataSourceFormulaCell;
  }
  /**
   * @param Google_Service_Sheets_GridCoordinate
   */
  public function setDataSourcePivotTableAnchorCell(Google_Service_Sheets_GridCoordinate $dataSourcePivotTableAnchorCell)
  {
    $this->dataSourcePivotTableAnchorCell = $dataSourcePivotTableAnchorCell;
  }
  /**
   * @return Google_Service_Sheets_GridCoordinate
   */
  public function getDataSourcePivotTableAnchorCell()
  {
    return $this->dataSourcePivotTableAnchorCell;
  }
  /**
   * @param Google_Service_Sheets_GridCoordinate
   */
  public function setDataSourceTableAnchorCell(Google_Service_Sheets_GridCoordinate $dataSourceTableAnchorCell)
  {
    $this->dataSourceTableAnchorCell = $dataSourceTableAnchorCell;
  }
  /**
   * @return Google_Service_Sheets_GridCoordinate
   */
  public function getDataSourceTableAnchorCell()
  {
    return $this->dataSourceTableAnchorCell;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
}
