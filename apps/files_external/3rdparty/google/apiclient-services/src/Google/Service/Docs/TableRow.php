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

class Google_Service_Docs_TableRow extends Google_Collection
{
  protected $collection_key = 'tableCells';
  public $endIndex;
  public $startIndex;
  public $suggestedDeletionIds;
  public $suggestedInsertionIds;
  protected $suggestedTableRowStyleChangesType = 'Google_Service_Docs_SuggestedTableRowStyle';
  protected $suggestedTableRowStyleChangesDataType = 'map';
  protected $tableCellsType = 'Google_Service_Docs_TableCell';
  protected $tableCellsDataType = 'array';
  protected $tableRowStyleType = 'Google_Service_Docs_TableRowStyle';
  protected $tableRowStyleDataType = '';

  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  public function getStartIndex()
  {
    return $this->startIndex;
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
   * @param Google_Service_Docs_SuggestedTableRowStyle[]
   */
  public function setSuggestedTableRowStyleChanges($suggestedTableRowStyleChanges)
  {
    $this->suggestedTableRowStyleChanges = $suggestedTableRowStyleChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedTableRowStyle[]
   */
  public function getSuggestedTableRowStyleChanges()
  {
    return $this->suggestedTableRowStyleChanges;
  }
  /**
   * @param Google_Service_Docs_TableCell[]
   */
  public function setTableCells($tableCells)
  {
    $this->tableCells = $tableCells;
  }
  /**
   * @return Google_Service_Docs_TableCell[]
   */
  public function getTableCells()
  {
    return $this->tableCells;
  }
  /**
   * @param Google_Service_Docs_TableRowStyle
   */
  public function setTableRowStyle(Google_Service_Docs_TableRowStyle $tableRowStyle)
  {
    $this->tableRowStyle = $tableRowStyle;
  }
  /**
   * @return Google_Service_Docs_TableRowStyle
   */
  public function getTableRowStyle()
  {
    return $this->tableRowStyle;
  }
}
