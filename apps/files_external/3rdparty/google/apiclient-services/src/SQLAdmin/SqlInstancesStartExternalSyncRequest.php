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

namespace Google\Service\SQLAdmin;

class SqlInstancesStartExternalSyncRequest extends \Google\Model
{
  protected $mysqlSyncConfigType = MySqlSyncConfig::class;
  protected $mysqlSyncConfigDataType = '';
  public $skipVerification;
  public $syncMode;

  /**
   * @param MySqlSyncConfig
   */
  public function setMysqlSyncConfig(MySqlSyncConfig $mysqlSyncConfig)
  {
    $this->mysqlSyncConfig = $mysqlSyncConfig;
  }
  /**
   * @return MySqlSyncConfig
   */
  public function getMysqlSyncConfig()
  {
    return $this->mysqlSyncConfig;
  }
  public function setSkipVerification($skipVerification)
  {
    $this->skipVerification = $skipVerification;
  }
  public function getSkipVerification()
  {
    return $this->skipVerification;
  }
  public function setSyncMode($syncMode)
  {
    $this->syncMode = $syncMode;
  }
  public function getSyncMode()
  {
    return $this->syncMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SqlInstancesStartExternalSyncRequest::class, 'Google_Service_SQLAdmin_SqlInstancesStartExternalSyncRequest');
