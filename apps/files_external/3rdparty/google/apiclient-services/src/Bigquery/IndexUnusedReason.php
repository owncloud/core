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

namespace Google\Service\Bigquery;

class IndexUnusedReason extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "baseTable" => "base_table",
        "indexName" => "index_name",
  ];
  protected $baseTableType = TableReference::class;
  protected $baseTableDataType = '';
  /**
   * @var string
   */
  public $code;
  /**
   * @var string
   */
  public $indexName;
  /**
   * @var string
   */
  public $message;

  /**
   * @param TableReference
   */
  public function setBaseTable(TableReference $baseTable)
  {
    $this->baseTable = $baseTable;
  }
  /**
   * @return TableReference
   */
  public function getBaseTable()
  {
    return $this->baseTable;
  }
  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param string
   */
  public function setIndexName($indexName)
  {
    $this->indexName = $indexName;
  }
  /**
   * @return string
   */
  public function getIndexName()
  {
    return $this->indexName;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexUnusedReason::class, 'Google_Service_Bigquery_IndexUnusedReason');
