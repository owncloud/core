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

class BigQueryDataSourceSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $projectId;
  protected $querySpecType = BigQueryQuerySpec::class;
  protected $querySpecDataType = '';
  protected $tableSpecType = BigQueryTableSpec::class;
  protected $tableSpecDataType = '';

  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param BigQueryQuerySpec
   */
  public function setQuerySpec(BigQueryQuerySpec $querySpec)
  {
    $this->querySpec = $querySpec;
  }
  /**
   * @return BigQueryQuerySpec
   */
  public function getQuerySpec()
  {
    return $this->querySpec;
  }
  /**
   * @param BigQueryTableSpec
   */
  public function setTableSpec(BigQueryTableSpec $tableSpec)
  {
    $this->tableSpec = $tableSpec;
  }
  /**
   * @return BigQueryTableSpec
   */
  public function getTableSpec()
  {
    return $this->tableSpec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigQueryDataSourceSpec::class, 'Google_Service_Sheets_BigQueryDataSourceSpec');
