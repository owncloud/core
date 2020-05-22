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

class Google_Service_BigtableAdmin_CreateTableRequest extends Google_Collection
{
  protected $collection_key = 'initialSplits';
  protected $initialSplitsType = 'Google_Service_BigtableAdmin_Split';
  protected $initialSplitsDataType = 'array';
  protected $tableType = 'Google_Service_BigtableAdmin_Table';
  protected $tableDataType = '';
  public $tableId;

  /**
   * @param Google_Service_BigtableAdmin_Split
   */
  public function setInitialSplits($initialSplits)
  {
    $this->initialSplits = $initialSplits;
  }
  /**
   * @return Google_Service_BigtableAdmin_Split
   */
  public function getInitialSplits()
  {
    return $this->initialSplits;
  }
  /**
   * @param Google_Service_BigtableAdmin_Table
   */
  public function setTable(Google_Service_BigtableAdmin_Table $table)
  {
    $this->table = $table;
  }
  /**
   * @return Google_Service_BigtableAdmin_Table
   */
  public function getTable()
  {
    return $this->table;
  }
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  public function getTableId()
  {
    return $this->tableId;
  }
}
