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

class Google_Service_BigQueryConnectionService_ConnectionCredential extends Google_Model
{
  protected $cloudSqlType = 'Google_Service_BigQueryConnectionService_CloudSqlCredential';
  protected $cloudSqlDataType = '';

  /**
   * @param Google_Service_BigQueryConnectionService_CloudSqlCredential
   */
  public function setCloudSql(Google_Service_BigQueryConnectionService_CloudSqlCredential $cloudSql)
  {
    $this->cloudSql = $cloudSql;
  }
  /**
   * @return Google_Service_BigQueryConnectionService_CloudSqlCredential
   */
  public function getCloudSql()
  {
    return $this->cloudSql;
  }
}
