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

class AppendCellsRequest extends \Google\Collection
{
  protected $collection_key = 'rows';
  public $fields;
  protected $rowsType = RowData::class;
  protected $rowsDataType = 'array';
  public $sheetId;

  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param RowData[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return RowData[]
   */
  public function getRows()
  {
    return $this->rows;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppendCellsRequest::class, 'Google_Service_Sheets_AppendCellsRequest');
