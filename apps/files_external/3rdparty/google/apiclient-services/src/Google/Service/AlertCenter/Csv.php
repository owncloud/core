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

class Google_Service_AlertCenter_Csv extends Google_Collection
{
  protected $collection_key = 'headers';
  protected $dataRowsType = 'Google_Service_AlertCenter_CsvRow';
  protected $dataRowsDataType = 'array';
  public $headers;

  /**
   * @param Google_Service_AlertCenter_CsvRow
   */
  public function setDataRows($dataRows)
  {
    $this->dataRows = $dataRows;
  }
  /**
   * @return Google_Service_AlertCenter_CsvRow
   */
  public function getDataRows()
  {
    return $this->dataRows;
  }
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
}
