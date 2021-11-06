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

namespace Google\Service\DatabaseMigrationService;

class ConnectionProfile extends \Google\Model
{
  protected $cloudsqlType = CloudSqlConnectionProfile::class;
  protected $cloudsqlDataType = '';
  public $createTime;
  public $displayName;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  public $labels;
  protected $mysqlType = MySqlConnectionProfile::class;
  protected $mysqlDataType = '';
  public $name;
  protected $postgresqlType = PostgreSqlConnectionProfile::class;
  protected $postgresqlDataType = '';
  public $provider;
  public $state;
  public $updateTime;

  /**
   * @param CloudSqlConnectionProfile
   */
  public function setCloudsql(CloudSqlConnectionProfile $cloudsql)
  {
    $this->cloudsql = $cloudsql;
  }
  /**
   * @return CloudSqlConnectionProfile
   */
  public function getCloudsql()
  {
    return $this->cloudsql;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param MySqlConnectionProfile
   */
  public function setMysql(MySqlConnectionProfile $mysql)
  {
    $this->mysql = $mysql;
  }
  /**
   * @return MySqlConnectionProfile
   */
  public function getMysql()
  {
    return $this->mysql;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PostgreSqlConnectionProfile
   */
  public function setPostgresql(PostgreSqlConnectionProfile $postgresql)
  {
    $this->postgresql = $postgresql;
  }
  /**
   * @return PostgreSqlConnectionProfile
   */
  public function getPostgresql()
  {
    return $this->postgresql;
  }
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  public function getProvider()
  {
    return $this->provider;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConnectionProfile::class, 'Google_Service_DatabaseMigrationService_ConnectionProfile');
