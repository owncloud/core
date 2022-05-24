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

namespace Google\Service\YouTubeAnalytics;

class QueryResponse extends \Google\Collection
{
  protected $collection_key = 'rows';
  protected $columnHeadersType = ResultTableColumnHeader::class;
  protected $columnHeadersDataType = 'array';
  protected $errorsType = Errors::class;
  protected $errorsDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var array[]
   */
  public $rows;

  /**
   * @param ResultTableColumnHeader[]
   */
  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }
  /**
   * @return ResultTableColumnHeader[]
   */
  public function getColumnHeaders()
  {
    return $this->columnHeaders;
  }
  /**
   * @param Errors
   */
  public function setErrors(Errors $errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Errors
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param array[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return array[]
   */
  public function getRows()
  {
    return $this->rows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryResponse::class, 'Google_Service_YouTubeAnalytics_QueryResponse');
