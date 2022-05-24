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

class TableRow extends \Google\Collection
{
  protected $collection_key = 'tableCells';
  /**
   * @var int
   */
  public $endIndex;
  /**
   * @var int
   */
  public $startIndex;
  /**
   * @var string[]
   */
  public $suggestedDeletionIds;
  /**
   * @var string[]
   */
  public $suggestedInsertionIds;
  protected $suggestedTableRowStyleChangesType = SuggestedTableRowStyle::class;
  protected $suggestedTableRowStyleChangesDataType = 'map';
  protected $tableCellsType = TableCell::class;
  protected $tableCellsDataType = 'array';
  protected $tableRowStyleType = TableRowStyle::class;
  protected $tableRowStyleDataType = '';

  /**
   * @param int
   */
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  /**
   * @return int
   */
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
  public function getStartIndex()
  {
    return $this->startIndex;
  }
  /**
   * @param string[]
   */
  public function setSuggestedDeletionIds($suggestedDeletionIds)
  {
    $this->suggestedDeletionIds = $suggestedDeletionIds;
  }
  /**
   * @return string[]
   */
  public function getSuggestedDeletionIds()
  {
    return $this->suggestedDeletionIds;
  }
  /**
   * @param string[]
   */
  public function setSuggestedInsertionIds($suggestedInsertionIds)
  {
    $this->suggestedInsertionIds = $suggestedInsertionIds;
  }
  /**
   * @return string[]
   */
  public function getSuggestedInsertionIds()
  {
    return $this->suggestedInsertionIds;
  }
  /**
   * @param SuggestedTableRowStyle[]
   */
  public function setSuggestedTableRowStyleChanges($suggestedTableRowStyleChanges)
  {
    $this->suggestedTableRowStyleChanges = $suggestedTableRowStyleChanges;
  }
  /**
   * @return SuggestedTableRowStyle[]
   */
  public function getSuggestedTableRowStyleChanges()
  {
    return $this->suggestedTableRowStyleChanges;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableRow::class, 'Google_Service_Docs_TableRow');
