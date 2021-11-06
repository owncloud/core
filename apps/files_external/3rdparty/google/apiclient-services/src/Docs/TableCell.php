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

class TableCell extends \Google\Collection
{
  protected $collection_key = 'suggestedInsertionIds';
  protected $contentType = StructuralElement::class;
  protected $contentDataType = 'array';
  public $endIndex;
  public $startIndex;
  public $suggestedDeletionIds;
  public $suggestedInsertionIds;
  protected $suggestedTableCellStyleChangesType = SuggestedTableCellStyle::class;
  protected $suggestedTableCellStyleChangesDataType = 'map';
  protected $tableCellStyleType = TableCellStyle::class;
  protected $tableCellStyleDataType = '';

  /**
   * @param StructuralElement[]
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return StructuralElement[]
   */
  public function getContent()
  {
    return $this->content;
  }
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
   * @param SuggestedTableCellStyle[]
   */
  public function setSuggestedTableCellStyleChanges($suggestedTableCellStyleChanges)
  {
    $this->suggestedTableCellStyleChanges = $suggestedTableCellStyleChanges;
  }
  /**
   * @return SuggestedTableCellStyle[]
   */
  public function getSuggestedTableCellStyleChanges()
  {
    return $this->suggestedTableCellStyleChanges;
  }
  /**
   * @param TableCellStyle
   */
  public function setTableCellStyle(TableCellStyle $tableCellStyle)
  {
    $this->tableCellStyle = $tableCellStyle;
  }
  /**
   * @return TableCellStyle
   */
  public function getTableCellStyle()
  {
    return $this->tableCellStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableCell::class, 'Google_Service_Docs_TableCell');
