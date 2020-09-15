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

class Google_Service_Sheets_DataSource extends Google_Collection
{
  protected $collection_key = 'calculatedColumns';
  protected $calculatedColumnsType = 'Google_Service_Sheets_DataSourceColumn';
  protected $calculatedColumnsDataType = 'array';
  public $dataSourceId;
  public $sheetId;
  protected $specType = 'Google_Service_Sheets_DataSourceSpec';
  protected $specDataType = '';

  /**
   * @param Google_Service_Sheets_DataSourceColumn
   */
  public function setCalculatedColumns($calculatedColumns)
  {
    $this->calculatedColumns = $calculatedColumns;
  }
  /**
   * @return Google_Service_Sheets_DataSourceColumn
   */
  public function getCalculatedColumns()
  {
    return $this->calculatedColumns;
  }
  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
  /**
   * @param Google_Service_Sheets_DataSourceSpec
   */
  public function setSpec(Google_Service_Sheets_DataSourceSpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return Google_Service_Sheets_DataSourceSpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
}
