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

class Google_Service_Sheets_BigQueryDataSourceSpec extends Google_Model
{
  public $projectId;
  protected $querySpecType = 'Google_Service_Sheets_BigQueryQuerySpec';
  protected $querySpecDataType = '';
  protected $tableSpecType = 'Google_Service_Sheets_BigQueryTableSpec';
  protected $tableSpecDataType = '';

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_Sheets_BigQueryQuerySpec
   */
  public function setQuerySpec(Google_Service_Sheets_BigQueryQuerySpec $querySpec)
  {
    $this->querySpec = $querySpec;
  }
  /**
   * @return Google_Service_Sheets_BigQueryQuerySpec
   */
  public function getQuerySpec()
  {
    return $this->querySpec;
  }
  /**
   * @param Google_Service_Sheets_BigQueryTableSpec
   */
  public function setTableSpec(Google_Service_Sheets_BigQueryTableSpec $tableSpec)
  {
    $this->tableSpec = $tableSpec;
  }
  /**
   * @return Google_Service_Sheets_BigQueryTableSpec
   */
  public function getTableSpec()
  {
    return $this->tableSpec;
  }
}
