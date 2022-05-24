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

namespace Google\Service\Datastream;

class MysqlTable extends \Google\Collection
{
  protected $collection_key = 'mysqlColumns';
  protected $mysqlColumnsType = MysqlColumn::class;
  protected $mysqlColumnsDataType = 'array';
  /**
   * @var string
   */
  public $table;

  /**
   * @param MysqlColumn[]
   */
  public function setMysqlColumns($mysqlColumns)
  {
    $this->mysqlColumns = $mysqlColumns;
  }
  /**
   * @return MysqlColumn[]
   */
  public function getMysqlColumns()
  {
    return $this->mysqlColumns;
  }
  /**
   * @param string
   */
  public function setTable($table)
  {
    $this->table = $table;
  }
  /**
   * @return string
   */
  public function getTable()
  {
    return $this->table;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MysqlTable::class, 'Google_Service_Datastream_MysqlTable');
