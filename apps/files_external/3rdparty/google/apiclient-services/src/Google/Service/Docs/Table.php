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

class Google_Service_Docs_Table extends Google_Collection
{
  protected $collection_key = 'tableRows';
  public $columns;
  public $rows;
  public $suggestedDeletionIds;
  public $suggestedInsertionIds;
  protected $tableRowsType = 'Google_Service_Docs_TableRow';
  protected $tableRowsDataType = 'array';
  protected $tableStyleType = 'Google_Service_Docs_TableStyle';
  protected $tableStyleDataType = '';

  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  public function getColumns()
  {
    return $this->columns;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setSuggestedDeletionIds($suggestedDeletionIds)
  {
    $this->suggestedDeletionIds = $suggestedDeletionIds;
  }
  public function getSuggestedDeletionIds()
  {
    return $this->suggestedDeletionIds;
  }
  public function setSuggestedInsertionIds($suggestedInsertionIds)
  {
    $this->suggestedInsertionIds = $suggestedInsertionIds;
  }
  public function getSuggestedInsertionIds()
  {
    return $this->suggestedInsertionIds;
  }
  /**
   * @param Google_Service_Docs_TableRow
   */
  public function setTableRows($tableRows)
  {
    $this->tableRows = $tableRows;
  }
  /**
   * @return Google_Service_Docs_TableRow
   */
  public function getTableRows()
  {
    return $this->tableRows;
  }
  /**
   * @param Google_Service_Docs_TableStyle
   */
  public function setTableStyle(Google_Service_Docs_TableStyle $tableStyle)
  {
    $this->tableStyle = $tableStyle;
  }
  /**
   * @return Google_Service_Docs_TableStyle
   */
  public function getTableStyle()
  {
    return $this->tableStyle;
  }
}
