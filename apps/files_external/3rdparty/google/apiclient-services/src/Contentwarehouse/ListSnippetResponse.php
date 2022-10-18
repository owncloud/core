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

namespace Google\Service\Contentwarehouse;

class ListSnippetResponse extends \Google\Collection
{
  protected $collection_key = 'row';
  protected $headerType = ListSnippetResponseRow::class;
  protected $headerDataType = '';
  /**
   * @var bool
   */
  public $isTable;
  protected $rowType = ListSnippetResponseRow::class;
  protected $rowDataType = 'array';
  /**
   * @var int
   */
  public $totalRows;

  /**
   * @param ListSnippetResponseRow
   */
  public function setHeader(ListSnippetResponseRow $header)
  {
    $this->header = $header;
  }
  /**
   * @return ListSnippetResponseRow
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param bool
   */
  public function setIsTable($isTable)
  {
    $this->isTable = $isTable;
  }
  /**
   * @return bool
   */
  public function getIsTable()
  {
    return $this->isTable;
  }
  /**
   * @param ListSnippetResponseRow[]
   */
  public function setRow($row)
  {
    $this->row = $row;
  }
  /**
   * @return ListSnippetResponseRow[]
   */
  public function getRow()
  {
    return $this->row;
  }
  /**
   * @param int
   */
  public function setTotalRows($totalRows)
  {
    $this->totalRows = $totalRows;
  }
  /**
   * @return int
   */
  public function getTotalRows()
  {
    return $this->totalRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListSnippetResponse::class, 'Google_Service_Contentwarehouse_ListSnippetResponse');
