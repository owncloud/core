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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1BigQueryConnectionSpec extends \Google\Model
{
  protected $cloudSqlType = GoogleCloudDatacatalogV1CloudSqlBigQueryConnectionSpec::class;
  protected $cloudSqlDataType = '';
  /**
   * @var string
   */
  public $connectionType;
  /**
   * @var bool
   */
  public $hasCredential;

  /**
   * @param GoogleCloudDatacatalogV1CloudSqlBigQueryConnectionSpec
   */
  public function setCloudSql(GoogleCloudDatacatalogV1CloudSqlBigQueryConnectionSpec $cloudSql)
  {
    $this->cloudSql = $cloudSql;
  }
  /**
   * @return GoogleCloudDatacatalogV1CloudSqlBigQueryConnectionSpec
   */
  public function getCloudSql()
  {
    return $this->cloudSql;
  }
  /**
   * @param string
   */
  public function setConnectionType($connectionType)
  {
    $this->connectionType = $connectionType;
  }
  /**
   * @return string
   */
  public function getConnectionType()
  {
    return $this->connectionType;
  }
  /**
   * @param bool
   */
  public function setHasCredential($hasCredential)
  {
    $this->hasCredential = $hasCredential;
  }
  /**
   * @return bool
   */
  public function getHasCredential()
  {
    return $this->hasCredential;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1BigQueryConnectionSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1BigQueryConnectionSpec');
