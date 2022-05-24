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

class SqlInstancesVerifyExternalSyncSettingsRequest extends \Google\Model
{
  protected $mysqlSyncConfigType = MySqlSyncConfig::class;
  protected $mysqlSyncConfigDataType = '';
  /**
   * @var string
   */
  public $syncMode;
  /**
   * @var bool
   */
  public $verifyConnectionOnly;
  /**
   * @var bool
   */
  public $verifyReplicationOnly;

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
  /**
   * @param string
   */
  public function setSyncMode($syncMode)
  {
    $this->syncMode = $syncMode;
  }
  /**
   * @return string
   */
  public function getSyncMode()
  {
    return $this->syncMode;
  }
  /**
   * @param bool
   */
  public function setVerifyConnectionOnly($verifyConnectionOnly)
  {
    $this->verifyConnectionOnly = $verifyConnectionOnly;
  }
  /**
   * @return bool
   */
  public function getVerifyConnectionOnly()
  {
    return $this->verifyConnectionOnly;
  }
  /**
   * @param bool
   */
  public function setVerifyReplicationOnly($verifyReplicationOnly)
  {
    $this->verifyReplicationOnly = $verifyReplicationOnly;
  }
  /**
   * @return bool
   */
  public function getVerifyReplicationOnly()
  {
    return $this->verifyReplicationOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SqlInstancesVerifyExternalSyncSettingsRequest::class, 'Google_Service_SQLAdmin_SqlInstancesVerifyExternalSyncSettingsRequest');
